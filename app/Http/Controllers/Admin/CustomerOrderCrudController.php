<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerOrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CustomerOrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerOrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customer-order');
        CRUD::setEntityNameStrings('customer order', 'customer orders');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */

        // CRUD::setFromDb(); // set columns from db columns.


        $totalOrders = \DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('products.user_id', '=', backpack_user()->id)
            ->count()
        ;

        $totalOrdersQuantity = \DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->join('carts', 'orders.cart_id', '=', 'carts.id')
        ->where('products.user_id', '=', backpack_user()->id)
        ->sum('carts.quantity');


        $totalDeliveredOrders = \DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('products.user_id', '=', backpack_user()->id)
            ->where('orders.is_delivered', '=', 1)
            ->count();

        $totalPendingOrders = \DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('products.user_id', '=', backpack_user()->id)
            ->where('orders.is_delivered', '=', 0)
            ->count();

        \Backpack\CRUD\app\Library\Widget::add([
            'type' => 'div',
            'class' => 'row mb-5 mt-3',
            'content' => [
                [
                    'type' => 'progress_white',
                    'wrapper' => ['class' => 'col-md-4'],
                    'class' => 'card mb-2',
                    'value' => $totalOrdersQuantity,
                    'description' => 'Total Orders',
                    'progress' => $totalOrdersQuantity, // integer
                    'progressClass' => 'progress-bar bg-primary',
                    'hint' => (100 * $totalOrdersQuantity) - $totalOrdersQuantity . ' more until next milestone.',
                ],
                [
                    'type' => 'progress_white',
                    'wrapper' => ['class' => 'col-md-4'],
                    'class' => 'card mb-2',
                    'value' => $totalDeliveredOrders,
                    'description' => 'Total Delivered Orders',
                    'progress' => $totalDeliveredOrders, // integer
                    'progressClass' => 'progress-bar bg-success',
                    'hint' => (100 * $totalDeliveredOrders) - $totalDeliveredOrders . ' more until next milestone.',
                ],
                [
                    'type' => 'progress_white',
                    'wrapper' => ['class' => 'col-md-4'],
                    'class' => 'card mb-2',
                    'value' => $totalPendingOrders,
                    'description' => 'Total Pending Orders',
                    'progress' => ($totalPendingOrders / $totalOrders) * 100, // integer
                    'progressClass' => 'progress-bar bg-warning',
                    'hint' => $totalPendingOrders . ' left.',
                ],
               
            ],
        ])->to('before_content');





        $this->crud->query = $this->crud->query
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('addresses', 'orders.address_id', '=', 'addresses.id')
            ->join('carts', 'orders.cart_id', '=', 'carts.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select(
                'carts.quantity as quantity',
                'orders.id as id',
                'orders.total_amount as total_amount',
                'orders.status as order_status',
                'orders.is_delivered as is_delivered',
                'orders.is_cancelled as is_cancelled',
                'products.name as product_name',
                'products.image as product_image',
                'addresses.fullname as fullname',
                'addresses.address as address',
                'addresses.contact_number as contact_number',
                'addresses.email as email',


            )
            ->where('orders.product_id', '=', function ($query) {
                $query->select('products.id')
                    // ->from('products')
                    ->where('products.user_id', '=', backpack_user()->id)
                    ->limit(1);
            });

        $this->crud->addColumn([
            'name' => 'product_image',
            'label' => 'Product Image',
            'type' => 'image',
            'prefix' => 'storage/uploads/products/',
            'height' => '40px',
            'width' => '40px',
        ]);

        $this->crud->addColumn([
            'name' => 'product_name',
            'label' => 'Product Name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'quantity',
            'label' => 'Quantity',
            'type' => 'number',
        ]);

        $this->crud->addColumn([
            'name' => 'total_amount',
            'label' => 'Total Amount',
            'type' => 'number',
        ]);

        $this->crud->addColumn([
            'name' => 'fullname',
            'label' => 'Full Name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'contact_number',
            'label' => 'Contact Number',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
        ]);
        $this->crud->addColumn([
            'name' => 'order_status',
            'label' => 'Order Status',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'is_delivered',
            'label' => 'Is Delivered',
            'type' => 'boolean',
        ]);

        $this->crud->addColumn([
            'name' => 'is_cancelled',
            'label' => 'Is Cancelled',
            'type' => 'boolean',
        ]);





    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CustomerOrderRequest::class);
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
        // $this->setupCreateOperation();

        $this->crud->setValidation
        (CustomerOrderRequest::class);

        $this->crud->query = $this->crud->query
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('addresses', 'orders.address_id', '=', 'addresses.id')
            ->join('carts', 'orders.cart_id', '=', 'carts.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select(
                'carts.quantity as quantity',
                'orders.id as id',
                'orders.total_amount as total_amount',
                'orders.status as order_status',
                'orders.is_delivered as is_delivered',
                'orders.is_cancelled as is_cancelled',
                'products.name as product_name',
                'products.image as product_image',
                'addresses.fullname as fullname',
                'addresses.address as address',
                'addresses.contact_number as contact_number',
                'addresses.email as email',


            )
            ->where('orders.id', '=', $this->crud->getCurrentEntryId());


        $this->crud->addFields([
            [
                'name' => 'fullname',
                'label' => 'Full Name',
                'type' => 'text',
                'attribute' => [
                    'readonly' => true,
                ]

            ],

            // [
            //     'name' => 'address',
            //     'label' => 'Address',
            //     'type' => 'text',
            //     'attribute' => [
            //         'readonly' => true,
            //     ]
            // ],

            [
                'name' => 'product_name',
                'label' => 'Product Name',
                'type' => 'text',
                'attribute' => [
                    'readonly' => true,
                ]
            ],

            // [
            //     'name' => 'quantity',
            //     'label' => 'Quantity',
            //     'type' => 'number',
            //     'attribute' => [
            //         'readonly' => true,
            //     ]
            // ],

            [
                'name' => 'total_amount',
                'label' => 'Total Amount',
                'type' => 'number',
                'prefix' => '₱',
                'attribute' => [
                    'readonly' => true,
                ]
            ],

            [
                'name' => 'status',
                'label' => 'Order Status',
                'type' => 'select_from_array',
                'options' => [
                    'To Ship' => 'To Ship',
                    'To Receive' => 'To Receive',
                    'Delivered' => 'Delivered',
                ],
            ],

            [
                'name' => 'is_delivered',
                'label' => 'Is Delivered',
                'type' => 'checkbox',
            ],

            [
                'name' => 'is_cancelled',
                'label' => 'Is Cancelled',
                'type' => 'checkbox',

            ],
        ]);
    }

    protected function setupShowOperation()
    {
        $this->crud->query = $this->crud->query
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('addresses', 'orders.address_id', '=', 'addresses.id')
            ->join('carts', 'orders.cart_id', '=', 'carts.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select(
                'carts.quantity as quantity',
                'orders.id as id',
                'orders.total_amount as total_amount',
                'orders.status as order_status',
                'orders.is_delivered as is_delivered',
                'orders.is_cancelled as is_cancelled',
                'products.name as product_name',
                'products.image as product_image',
                'addresses.fullname as fullname',
                'addresses.address as address',
                'addresses.contact_number as contact_number',
                'addresses.email as email',


            )
            ->where('orders.id', '=', $this->crud->getCurrentEntryId());

        $this->crud->addColumn([
            'name' => 'product_image',
            'label' => 'Product Image',
            'type' => 'image',
            'prefix' => 'storage/uploads/products/',
            'height' => '300px',
            'width' => '300px',
        ]);
        $this->crud->addColumn([
            'name' => 'product_name',
            'label' => 'Product Name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'quantity',
            'label' => 'Quantity',
            'type' => 'number',
        ]);

        $this->crud->addColumn([
            'name' => 'total_amount',
            'label' => 'Total Amount',
            'type' => 'number',
            'prefix' => '₱ ',
        ]);

        $this->crud->addColumn([
            'name' => 'fullname',
            'label' => 'Full Name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'contact_number',
            'label' => 'Contact Number',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
        ]);
        $this->crud->addColumn([
            'name' => 'order_status',
            'label' => 'Order Status',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'is_delivered',
            'label' => 'Is Delivered',
            'type' => 'boolean',
        ]);

        $this->crud->addColumn([
            'name' => 'is_cancelled',
            'label' => 'Is Cancelled',
            'type' => 'boolean',
        ]);



    }

}
