<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    // Route::crud('my-store', 'MyStoreCrudController');
    // Route::get('chat', 'ChatController@index')->name('page.chat.index');
    Route::get('activity', 'ActivityController@index')->name('page.activity.index');
    // Route::get('productsearch', 'ProductsearchController@index')->name('page.productsearch.index');
    Route::get('message', 'MessageController@index')->name('page.message.index');
    // Route::crud('myproduct', 'MyproductCrudController');
    // Route::crud('my-product', 'MyProductCrudController');
    Route::get('myorder', 'MyorderController@index')->name('page.myorder.index');
    Route::post('myorder/store', 'MyorderController@store')->name('page.myorder.store');
    Route::post('myorder/update', 'MyorderController@update')->name('page.myorder.update');
    Route::post('myorder/{id}/cancel', 'MyorderController@cancel')->name('page.myorder.cancel');
    // Route::post('myorder/{id}/confirm', 'MyorderController@confirm')->name('page.myorder.confirm');
    Route::post('myorder/{id}/received', 'MyorderController@received')->name('page.myorder.received');

    Route::crud('customer-order', 'CustomerOrderCrudController');
    Route::crud('product', 'ProductCrudController');
    
    Route::get('search_product', 'SearchProductController@index')->name('page.search_product.index');
    Route::crud('product-approval', 'ProductApprovalCrudController');

    Route::get('view_product', 'ViewProductController@index')->name('page.view_product.index');
    Route::post('view_product', 'ViewProductController@store')->name('page.view_product.store');
    Route::get('view_product/{id}', 'ViewProductController@show')->name('page.view_product.show');
    
    Route::get('mycart', 'MycartController@index')->name('page.mycart.index');
    Route::post('mycart', 'MycartController@store')->name('page.mycart.store');
    Route::delete('mycart/{id}', 'MycartController@destroy')->name('page.mycart.destroy');
    
    
    Route::get('market', 'MarketController@index')->name('page.market.index');
    Route::get('market_search', 'MarketController@search')->name('page.market.search');

    Route::post('address', 'AddressController@store')->name('page.address.store');
    Route::put('address/{id}', 'AddressController@update')->name('page.address.update');
    Route::delete('address/{id}', 'AddressController@destroy')->name('page.address.destroy');
    // Route::get('customer-order', 'CustomerOrderCrudController@index')->name('page.customer-order.index');
    Route::crud('payment-history', 'PaymentHistoryCrudController');
}); // this should be the absolute last line of this file