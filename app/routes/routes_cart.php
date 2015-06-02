<?php
// Public Routes
Route::get('add-bag/{id}', ['as' => 'bag.add', 'uses' => 'CartController@addToBag']);

Route::group( ['prefix' => 'cart'], function () {
    Route::get('/', ['as' => 'cart.index', 'uses' => 'CartController@index' ]);
    Route::post('update', ['as' => 'cart.update', 'uses' => 'CartController@update' ]);
    Route::post('remove', ['as' => 'cart.remove', 'uses' => 'CartController@removeItem' ]);
    Route::post('change-quantity', ['as' => 'cart.quantity.change', 'uses' => 'CartController@changeQuantity' ]);
});
