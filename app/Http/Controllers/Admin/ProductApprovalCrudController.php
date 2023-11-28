<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductApprovalRequest;
use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductApprovalCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductApprovalCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
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
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product-approval');
        CRUD::setEntityNameStrings('product approval', 'product approvals');
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
        CRUD::addColumns([
            [
                'name' => 'user_id',
                'label' => 'User ID',
                'type' => 'select',
                'entity' => 'user',
                'attribute' => 'name',
                'model' => "App\Models\User",
            ],
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
                'label' => 'Status',
                'type' => 'boolean',
            ],
            [
                'name' => 'is_approved',
                'label' => 'Approval Status',
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

        

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
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
