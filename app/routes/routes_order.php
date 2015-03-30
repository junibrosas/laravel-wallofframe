<?php
// Administrator Routes
Route::group( [ 'before' => ['auth', 'auth.admin.only'], 'prefix' => 'admin', 'namespace' => 'Admin' ], function (){
    // Orders
    Route::get('orders', ['as' => 'admin.orders', 'uses' => 'OrderController@orders']);
    Route::get('order/{number}', ['as' => 'admin.order', 'uses' => 'OrderController@order']);
});