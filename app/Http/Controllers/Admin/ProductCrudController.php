<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        // Only Student can access this
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */

    protected function setupShowOperation()
    {
        // Other setup code...

        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'Product Image',
            'type' => 'image',
            'prefix' => 'storage/uploads/products/',
            'height' => '200px',
            'width' => '200px',
        ]);

        // Other setup code...
    }

    protected function setupListOperation()
    {


        $total_products = \DB::table('products')->where('user_id', backpack_user()->id)->count();

        $total_approve_products = \DB::table('products')->where('user_id', backpack_user()->id)->where('is_approved', 1)->count();
        $total_active_products = \DB::table('products')->where('user_id', backpack_user()->id)->where('is_active', 1)->count();

        // CRUD::setFromDb(); // set columns from db columns.
        $this->crud->addClause('where', 'user_id', backpack_user()->id);
        Widget::add([
            'type' => 'div',
            'class' => 'row mb-5 mt-3',
            // 'style' => 'height: 17rem;',
            'content' => [
                [
                    'type' => 'card',
                    // 'style' => 'height: 100%;',
                    'wrapper' => ['class' => 'col-md-4 '],
                    'content' => [

                        'header' => 'Total Number of Active Products',
                        'body' => "
                        <div class='display-5 text-center'>

                        <i class='la la-tag me-2'>{$total_active_products}</i>
                        </div>
                        ",
                    ]

                ],
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'col-md-4 '],
                    'content' => [
                        'header' => 'Total Number of Approved Products',
                        'body' => "
                            <div class='display-5 text-center'>

                            <i class='la la-tag me-2'>{$total_approve_products}</i>
                            </div>
                        ",
                    ]

                ],
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'col-md-4 '],
                    'content' => [
                        'header' => 'Total Number of Products',
                        'body' => "
                            <div class='display-5 text-center'>

                            <i class='la la-tag me-2'>{$total_products}</i>
                            </div>
                        ",
                    ]

                ],


            ],
        ])->to('before_content');

        CRUD::addColumns([
            [
                'name' => 'image',
                'label' => 'Product Image',
                'type' => 'image',
                'prefix' => 'storage/uploads/products/',
                'height' => '100px',
                'width' => '100px',
            ],
            [
                'name' => 'name',
                'label' => 'Product Name',
                'type' => 'text',
            ],
            [
                'name' => 'stock',
                'label' => 'Stock',
                'type' => 'number',
                'prefix' => 'Qty: '
            ],
            [
                'name' => 'price',
                'label' => 'Price',
                'type' => 'number',
                'prefix' => '₱',
            ],
            [
                'name' => 'description',
                'label' => 'Product Description',
                'type' => 'text',
            ],
            [
                'name' => 'is_active',
                'label' => 'is_active',
                'type' => 'boolean',
            ],
            [
                'name' => 'is_approved',
                'label' => 'is_approved',
                'type' => 'boolean',
            ],
            [
                'name' => 'category_id',
                'label' => 'Category',
                'type' => 'select',
                'entity' => 'category',
                'attribute' => 'name',
                'model' => "App\Models\Category",
            ],

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
        CRUD::setValidation(ProductRequest::class);
        // CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */


        CRUD::field('user_id')->type('hidden')->value(backpack_user()->id);

        CRUD::field('is_active')->type('hidden')->value('1');
        CRUD::field('is_active')->type('hidden')->value('0');

        CRUD::field('name')->type('text')->label('Product Name');

        // CRUD::field('name')->type('text');
        CRUD::field('stock')->type('number')->label('Stock')->prefix('Qty: ')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('price')->type('number')->prefix('Qty: ')->wrapper(['class' => 'form-group col-md-6'])->label('Price')->attributes(['step' => '0.01', 'min' => '0'])->prefix('₱');

        CRUD::field('category_id')->type('hidden')->value('0');

        CRUD::field('category_id')
            ->type('select')
            ->label('Category')
            ->entity('category')
            ->attribute('name')
            ->model('App\Models\Category')
            ->pivot(true)
            ->options(function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            });



        CRUD::field('description')->type('textarea')->label('Product Description')->wrapper(['class' => 'form-group col-md-12']);



        $this->crud->addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'upload_image_preview',
            'upload' => true,
        ]);


        CRUD::field('image')
            ->type('upload')
            ->label('Photo:')
            ->wrapper(['class' => 'form-group col-md-12'])
            ->hint('Upload a product image here.')

            ->withFiles([
                'file_name_generator' => \Backpack\CRUD\app\Library\Uploaders\Support\FileNameGenerator::class,
                'disk' => 'products',
                'url' => '/storage/uploads/products/',
            ])->preview(true);
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

    protected function setupDeleteOperation()
    {
        CRUD::field('image')->type('upload')->withFiles();

    }
}
