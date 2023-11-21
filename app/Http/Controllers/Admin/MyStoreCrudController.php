<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MyStoreRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Product;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class MyStoreCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MyStoreCrudController extends CrudController
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
        CRUD::setModel(\App\Models\MyStore::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/my-store');
        CRUD::setEntityNameStrings('my store', 'my stores');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         * 
         */

        // Widget::add()
        //     ->to('before_content')
        //     ->type('card')
        //     ->heading('How to use this page');
         CRUD::setColumns([
            'image', 'name', 'stock', 'price','description'
        ]);
        // CRUD::column('image')->type('upload')->withFiles();

        Widget::add(
            [
                'type' => 'card',
                'content' => [
                    'heading' => 'How to use this page',
                    'body' => '
                        <p>Use this page to create new products for your store.</p>
                        <p>Products are the items you sell in your store. You can add as many products as you want.</p>
                        <p>Products can be physical or digital. You can also add services as products.</p>
                        <p>Products can be grouped into categories. You can add as many categories as you want.</p>
                    ',
                
                ]
            ]
        )->to('before_content');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {


        Widget::add()
            ->to('before_content')
            ->type('card')
            ->heading('How to use this page')
            ->content('
                <p>Use this page to create new products for your store.</p>
                <p>Products are the items you sell in your store. You can add as many products as you want.</p>
                <p>Products can be physical or digital. You can also add services as products.</p>
                <p>Products can be grouped into categories. You can add as many categories as you want.</p>
                <p>Products can be grouped into categories. You can add as many categories as you want.</p>
                <p>Products can be grouped into categories. You can add as many categories as you want.</p>
                <p>Products can be grouped into categories. You can add as many categories as you want.</p>
                <p>Products can be grouped into categories. You can add as many categories as you want.</p>
                <p>Products can be grouped into categories. You can add as many categories as you want.</p>
                <p>Products can be grouped into categories. You can add as many categories as you want.</p>
            ');    

        CRUD::setValidation(MyStoreRequest::class);
        CRUD::field([
            'name' => 'user_id',
            'type' => 'hidden',
            'value' => backpack_user()->user_id,
        ]);
        CRUD::field('name')->type('text');
        CRUD::field('stock')->type('number');
        CRUD::field('price')->type('number');
        CRUD::field('price')->prefix('$');
        CRUD::field('image')
            ->type('upload')
            ->withFiles([
                'disk' => 'public',
                'path' => 'uploads',
            ]);
        CRUD::field('description')->type('textarea');
        Product::creating(function($entry){
        // CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
            $entry->user_id = backpack_user()->id;



        });
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
