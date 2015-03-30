<?php
// Administrator Routes
Route::group( [ 'before' => ['auth', 'auth.admin.only'], 'prefix' => 'admin', 'namespace' => 'Admin' ], function (){
    // Orders
    Route::get('orders', ['as' => 'admin.orders', 'uses' => 'OrderController@orders']);
    Route::get('orders/{number}', ['as' => 'admin.order', 'uses' => 'OrderController@order']);

    Route::post('orders/actions', ['as' => 'admin.orders.action', 'uses' => 'OrderController@postBulkActions']);
});