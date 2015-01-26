<?php
Route::group( ['prefix' => 'cart'], function () {
    Route::get('/', ['as' => 'cart.index', 'uses' => 'CartController@index' ]);
    Route::post('remove', ['as' => 'cart.remove', 'before'=>['csrf'], 'uses' => 'CartController@removeItem' ]);
    Route::post('change-quantity', ['as' => 'cart.quantity.change', 'before'=>['csrf'], 'uses' => 'CartController@changeQuantity' ]);

});
