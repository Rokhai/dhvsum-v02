<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

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
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */

        CRUD::column('name')->type('text');
        CRUD::column('stock')->type('number');
        CRUD::column('price')->type('number');
        CRUD::column('description')->type('text');
        CRUD::column('category_id')->type('number');
        // CRUD::column('image')->type('image')->upload(true)->disk('public')->prunable()->width(400)->height(400);
        
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

        // CRUD::column('name')->type('text');
        // CRUD::column('stock')->type('number');
        // CRUD::column('price')->type('number');
        // CRUD::column('description')->type('text');
        // CRUD::column('category_id')->type('number');
        // CRUD::column('image')->type('image')->upload(true)->disk('public')->prunable()->width(400)->height(400);
        // CRUD::columns([
        //     [
        //         // select_from_array
        //         'name'    => 'status',
        //         'label'   => 'Status',
        //         'type'    => 'select_from_array',
        //         'options' => ['draft' => 'Draft (invisible)', 'published' => 'Published (visible)'],
        //     ],
        // ]);
        $fillableFields = \App\Models\Product::getFillable();

        foreach ($fillableFields as $field) {
            CRUD::field($field)->type('text');
        }
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
