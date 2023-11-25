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


        Widget::add([
            'type' => 'div'
        ]);

        Widget::add([
            'type'          => 'card',
            'viewNamespace' => 'package::widgets',
            'wrapper'       => ['class' => 'col-sm-6 col-md-4'],
            'class'         => 'card text-white bg-primary text-center',
            'content'       => [
                // 'header' => 'Another card title',
                'body'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>, ornare quis aliquet ut, volutpat et lectus. Aliquam a egestas elit.',
            ],
        ]);
        // <div class="col-12">
        //         <div class="row row-cards">
        //           <div class="col-sm-6 col-lg-3">
        //             <div class="card card-sm">
        //               <div class="card-body">
        //                 <div class="row align-items-center">
        //                   <div class="col-auto">
        //                     <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
        //                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
        //                     </span>
        //                   </div>
        //                   <div class="col">
        //                     <div class="font-weight-medium">
        //                       132 Sales
        //                     </div>
        //                     <div class="text-secondary">
        //                       12 waiting payments
        //                     </div>
        //                   </div>
        //                 </div>
        //               </div>
        //             </div>
        //           </div>
        //           <div class="col-sm-6 col-lg-3">
        //             <div class="card card-sm">
        //               <div class="card-body">
        //                 <div class="row align-items-center">
        //                   <div class="col-auto">
        //                     <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
        //                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
        //                     </span>
        //                   </div>
        //                   <div class="col">
        //                     <div class="font-weight-medium">
        //                       78 Orders
        //                     </div>
        //                     <div class="text-secondary">
        //                       32 shipped
        //                     </div>
        //                   </div>
        //                 </div>
        //               </div>
        //             </div>
        //           </div>
        //           <div class="col-sm-6 col-lg-3">
        //             <div class="card card-sm">
        //               <div class="card-body">
        //                 <div class="row align-items-center">
        //                   <div class="col-auto">
        //                     <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
        //                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z"></path></svg>
        //                     </span>
        //                   </div>
        //                   <div class="col">
        //                     <div class="font-weight-medium">
        //                       623 Shares
        //                     </div>
        //                     <div class="text-secondary">
        //                       16 today
        //                     </div>
        //                   </div>
        //                 </div>
        //               </div>
        //             </div>
        //           </div>
        //           <div class="col-sm-6 col-lg-3">
        //             <div class="card card-sm">
        //               <div class="card-body">
        //                 <div class="row align-items-center">
        //                   <div class="col-auto">
        //                     <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
        //                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path></svg>
        //                     </span>
        //                   </div>
        //                   <div class="col">
        //                     <div class="font-weight-medium">
        //                       132 Likes
        //                     </div>
        //                     <div class="text-secondary">
        //                       21 today
        //                     </div>
        //                   </div>
        //                 </div>
        //               </div>
        //             </div>
        //           </div>
        //         </div>
        //       </div>
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
