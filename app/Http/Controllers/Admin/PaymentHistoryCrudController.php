<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PaymentHistoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PaymentHistoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PaymentHistoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\PaymentHistory::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/payment-history');
        CRUD::setEntityNameStrings('payment history', 'payment histories');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {


        $totalSales = \DB::table('payments')->sum('amount');

        $totalNumberOfPending = \DB::table('payments')->where('payment_status', 'pending')->count();
        $totalNumberOfPaid = \DB::table('payments')->where('payment_status', 'paid')->count();

        $totalNumberOfGcash = \DB::table('payments')->where('payment_method', 'Gcash')->count();
        $totalNumberOfCash = \DB::table('payments')->where('payment_method', 'Cash')->count();


        \Backpack\CRUD\app\Library\Widget::add([
            'type' => 'div',
            'class' => 'row mb-5 mt-3',
            'content' => [
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'mx-4 col-md-2 '],
                    'content' => [

                        'header' => 'Total Sales',
                        'body' => "
                        <div class='display-5 '>

                             ₱ " . number_format($totalSales, 2, '.', ',') . "
                        </div>
                        ",
                    ]

                ],
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'mx-4 col-md-2 '],
                    'content' => [

                        'header' => 'Total Payment in Cash',
                        'body' => "
                        <div class='display-5'>
                            <i class='la la-money-bill-alt'></i> $totalNumberOfCash
                        </div>
                        ",
                    ]

                ],
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'mx-4 col-md-2 '],
                    'content' => [

                        'header' => 'Total Payment in GCash',
                        'body' => "
                        <div class='display-5'>
                            <svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='40' height='40' viewBox='0 0 100 100'>
                                <path fill='#78a1d1' d='M82.189,26.498c-0.547,0-1.089,0.13-1.59,0.386c-1.718,0.879-2.401,2.992-1.522,4.71	C82.012,37.332,83.5,43.525,83.5,50c0,6.477-1.487,12.669-4.422,18.406c-0.427,0.833-0.503,1.781-0.216,2.67	c0.288,0.89,0.904,1.614,1.736,2.04c0.5,0.256,1.036,0.385,1.592,0.385c1.322,0,2.518-0.73,3.118-1.907	C88.754,64.863,90.5,57.598,90.5,50c0-7.595-1.746-14.86-5.19-21.594c-0.426-0.833-1.15-1.449-2.041-1.737	C82.915,26.555,82.551,26.498,82.189,26.498z'></path><path fill='#4a5397' d='M43,85C23.701,85,8,69.299,8,50s15.701-35,35-35c7.843,0,15.262,2.543,21.454,7.355	c1.744,1.355,2.06,3.869,0.704,5.613c-1.354,1.744-3.868,2.061-5.612,0.705C54.771,24.961,49.049,23,43,23	c-14.888,0-27,12.112-27,27s12.112,27,27,27c6.049,0,11.771-1.961,16.546-5.672c1.745-1.357,4.258-1.04,5.612,0.704	c1.355,1.745,1.041,4.257-0.704,5.613C58.262,82.457,50.844,85,43,85z'></path><path fill='#78a1d1' d='M71.142,33.498c-0.501,0-1.001,0.109-1.47,0.326c-1.751,0.811-2.517,2.896-1.706,4.647	C69.647,42.104,70.5,45.983,70.5,50s-0.853,7.896-2.534,11.53c-0.811,1.751-0.045,3.836,1.706,4.647	c0.466,0.215,0.959,0.324,1.467,0.324c1.36,0,2.608-0.797,3.179-2.031C76.43,59.908,77.5,55.04,77.5,50s-1.07-9.908-3.183-14.47	c-0.392-0.849-1.091-1.493-1.968-1.815C71.956,33.569,71.548,33.498,71.142,33.498z'></path><path fill='#e3e2e3' d='M43,29.5c-11.304,0-20.5,9.196-20.5,20.5S31.696,70.5,43,70.5S63.5,61.304,63.5,50	c0-1.93-1.57-3.5-3.5-3.5H48c-1.93,0-3.5,1.57-3.5,3.5s1.57,3.5,3.5,3.5h8.058l-0.212,0.654C54.034,59.744,48.872,63.5,43,63.5	c-7.444,0-13.5-6.056-13.5-13.5S35.556,36.5,43,36.5c2.86,0,5.604,0.899,7.938,2.601c0.756,0.551,1.681,0.774,2.603,0.631	c0.924-0.144,1.736-0.64,2.287-1.395c1.138-1.56,0.795-3.753-0.765-4.891C51.524,30.864,47.354,29.5,43,29.5z'></path><path fill='#1f212b' d='M82.19,74.001c-0.637,0-1.249-0.148-1.819-0.44c-0.95-0.486-1.655-1.314-1.984-2.331	c-0.328-1.018-0.241-2.102,0.246-3.052C81.53,62.514,83,56.398,83,50c0-6.395-1.47-12.511-4.368-18.179	c-1.004-1.963-0.224-4.378,1.74-5.383c0.95-0.484,2.044-0.571,3.051-0.245c1.017,0.328,1.846,1.033,2.332,1.985	C89.235,34.983,91,42.325,91,50c0,7.679-1.765,15.021-5.246,21.822C85.067,73.166,83.702,74.001,82.19,74.001z M82.189,26.998	c-0.474,0-0.933,0.111-1.362,0.331c-1.473,0.753-2.058,2.564-1.305,4.037C82.493,37.176,84,43.445,84,50	c0,6.558-1.506,12.827-4.477,18.633c-0.366,0.713-0.432,1.526-0.186,2.29c0.247,0.762,0.775,1.383,1.488,1.748	c0.429,0.219,0.888,0.331,1.364,0.331c1.134,0,2.158-0.626,2.673-1.634C88.271,64.707,90,57.519,90,50	c0-7.516-1.728-14.704-5.136-21.366c-0.365-0.713-0.986-1.242-1.749-1.489C82.813,27.047,82.503,26.998,82.189,26.998z'></path><path fill='#1f212b' d='M43,86C23.149,86,7,69.851,7,50s16.149-36,36-36c8.067,0,15.698,2.616,22.067,7.565	c1.055,0.819,1.728,2,1.894,3.326s-0.193,2.636-1.013,3.69c-0.819,1.054-2,1.727-3.325,1.893c-1.327,0.167-2.636-0.194-3.691-1.013	C54.334,25.889,48.825,24,43,24c-14.337,0-26,11.664-26,26s11.663,26,26,26c5.825,0,11.334-1.889,15.933-5.462	c1.055-0.819,2.366-1.181,3.69-1.014c1.325,0.167,2.506,0.839,3.325,1.894s1.179,2.365,1.013,3.69	c-0.166,1.325-0.839,2.506-1.894,3.326C58.698,83.384,51.067,86,43,86z M43,16C24.252,16,9,31.252,9,50s15.252,34,34,34	c7.619,0,14.825-2.471,20.841-7.146c0.633-0.492,1.036-1.2,1.136-1.995c0.1-0.795-0.116-1.582-0.608-2.214	c-0.491-0.633-1.199-1.037-1.994-1.136c-0.793-0.1-1.582,0.116-2.214,0.608C55.207,75.966,49.273,78,43,78	c-15.439,0-28-12.561-28-28s12.561-28,28-28c6.273,0,12.207,2.034,17.159,5.883c0.634,0.492,1.421,0.708,2.214,0.607	c0.796-0.1,1.504-0.503,1.995-1.136c0.492-0.633,0.708-1.419,0.608-2.214c-0.1-0.795-0.503-1.504-1.136-1.996	C57.825,18.471,50.618,16,43,16z'></path><path fill='#1f212b' d='M71.139,67.001c-0.58,0-1.144-0.125-1.676-0.37c-2.002-0.927-2.877-3.31-1.951-5.311	C69.163,57.753,70,53.944,70,50s-0.837-7.753-2.488-11.32c-0.926-2.001-0.051-4.384,1.95-5.311c0.965-0.447,2.063-0.491,3.061-0.125	c1.003,0.369,1.802,1.105,2.249,2.075C76.914,39.947,78,44.886,78,50s-1.086,10.053-3.229,14.68	C74.119,66.09,72.693,67.001,71.139,67.001z M71.142,33.998c-0.435,0-0.858,0.094-1.26,0.279c-1.501,0.695-2.157,2.482-1.462,3.983	C70.132,41.959,71,45.91,71,50s-0.868,8.041-2.58,11.74c-0.695,1.501-0.039,3.288,1.462,3.983c1.472,0.678,3.312-0.012,3.981-1.463	C75.944,59.766,77,54.968,77,50s-1.056-9.766-3.137-14.26c-0.335-0.727-0.935-1.28-1.687-1.556	C71.842,34.06,71.493,33.998,71.142,33.998z'></path><path fill='#1f212b' d='M43,71c-11.579,0-21-9.42-21-21s9.421-21,21-21c4.46,0,8.733,1.397,12.357,4.042	c0.862,0.629,1.428,1.557,1.593,2.614s-0.09,2.114-0.719,2.976c-0.63,0.864-1.559,1.43-2.614,1.595	c-1.059,0.165-2.112-0.092-2.975-0.721C48.396,37.866,45.753,37,43,37c-7.168,0-13,5.832-13,13s5.832,13,13,13	c5.654,0,10.626-3.617,12.37-9H48c-2.206,0-4-1.794-4-4s1.794-4,4-4h12c2.206,0,4,1.794,4,4C64,61.58,54.579,71,43,71z M43,30	c-11.028,0-20,8.972-20,20s8.972,20,20,20s20-8.972,20-20c0-1.654-1.346-3-3-3H48c-1.654,0-3,1.346-3,3s1.346,3,3,3h7.37	c0.319,0,0.622,0.154,0.81,0.413c0.188,0.259,0.24,0.594,0.142,0.897C54.442,60.105,49.089,64,43,64c-7.72,0-14-6.28-14-14	s6.28-14,14-14c2.967,0,5.813,0.933,8.232,2.697c0.646,0.472,1.439,0.667,2.23,0.541c0.792-0.124,1.488-0.548,1.96-1.195	c0.976-1.337,0.682-3.218-0.655-4.193C51.316,31.331,47.247,30,43,30z'></path><path fill='#1f212b' d='M43,60c-0.487,0-1.004-0.044-1.579-0.136c-0.272-0.043-0.458-0.3-0.415-0.572	c0.044-0.273,0.293-0.463,0.573-0.415C42.101,58.959,42.565,59,43,59c0.793,0,1.589-0.108,2.367-0.322	c0.271-0.072,0.541,0.083,0.615,0.35c0.073,0.266-0.084,0.542-0.35,0.614C44.768,59.88,43.882,60,43,60z'></path><path fill='#1f212b' d='M38.5,58.867c-0.08,0-0.162-0.019-0.237-0.06C35.017,57.058,33,53.683,33,50c0-5.514,4.486-10,10-10	c2.083,0,4.085,0.642,5.79,1.856c0.225,0.16,0.277,0.472,0.117,0.697c-0.16,0.226-0.473,0.278-0.697,0.117	C46.676,41.578,44.874,41,43,41c-4.963,0-9,4.038-9,9c0,3.314,1.815,6.352,4.737,7.927c0.243,0.131,0.334,0.434,0.203,0.677	C38.85,58.772,38.678,58.867,38.5,58.867z'></path><path fill='#1f212b' d='M47.5,58.858c-0.177,0-0.349-0.095-0.439-0.262c-0.132-0.243-0.042-0.546,0.201-0.678	c0.44-0.239,0.86-0.513,1.248-0.814c0.215-0.17,0.53-0.131,0.701,0.088c0.17,0.218,0.13,0.532-0.088,0.702	c-0.431,0.334-0.896,0.638-1.385,0.903C47.662,58.839,47.581,58.858,47.5,58.858z'></path>
                            </svg>
                             $totalNumberOfGcash
                        </div>
                        ",
                    ]

                ],
                [
                    'type' => 'card',
                    'wrapper' => ['class' => ' mx-4 col-md-2 '],
                    'content' => [

                        'header' => 'Total Pending Payment',
                        'body' => "
                        <div class='display-5'>
                        <i class='las la-spinner'></i>
                             $totalNumberOfPending
                        </div>
                        ",
                    ]

                ],
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'mx-4 col-md-2 '],
                    'content' => [

                        'header' => 'Total Paid Payment',
                        'body' => "
                        <div class='display-5'>
                        <i class='las la-receipt'></i>
                             $totalNumberOfPaid
                        </div>
                        ",
                    ]

                ],



            ],
        ])->to('before_content');



        $this->crud->query = $this->crud->query
            ->join('orders', 'orders.id', '=', 'payments.order_id')
            ->join('products', 'products.id', '=', 'payments.product_id')
            ->join('users', 'users.id', '=', 'payments.user_id')
            ->select(
                'users.name as name',
                'products.image as image',
                'products.name as product_name',
                'payments.amount as amount',
                'payments.payment_method as payment_method',
                'payments.payment_status as payment_status',
                'payments.gcash_number as gcash_number',
                'payments.gcash_transaction_id as gcash_transaction_id',
                'payments.created_at as created_at',
                // 'order'
                // 'payments.'
            )
            ->where('products.user_id', backpack_user()->id);
        // CRUD::setFromDb(); // set columns from db columns.
        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */


        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Full Name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'Product Image',
            'type' => 'image',
            'prefix' => 'storage/uploads/products/',
            'height' => '40px',
            'width' => '40px',
        ]);

        $this->crud->addColumn([
            'name' => 'amount',
            'label' => 'amount',
            'type' => 'text',
            'prefix' => '₱ ',

        ]);

        $this->crud->addColumn(
            [
                'name' => 'payment_method',
                'label' => 'Payment Method',
                'type' => 'text',
            
            ]
        );

        $this->crud->addColumn(
            [
                'name' => 'payment_status',
                'label' => 'Payment Status',
                'type' => 'text',
            
            ]
        );

        $this->crud->addColumn(
            [
                'name' => 'gcash_number',
                'label' => 'GCash Number',
                'type' => 'text',
            
            ]
        );

        $this->crud->addColumn(
            [
                'name' => 'gcash_transaction_id',
                'label' => 'GCash Transaction ID',
                'type' => 'text',
            
            ]
        );

        $this->crud->addColumn(
            [
                'name' => 'created_at',
                'label' => 'Date',
                'type' => 'text',
            
            ]
        );


    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PaymentHistoryRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
