<?php
Route::get('checkout/shipping', ['as' => 'checkout.shipping', 'uses' => 'CheckoutController@getShippingForm' ]);
Route::post('checkout/shipping', ['as' => 'checkout.shipping.add', 'before'=>['csrf'], 'uses' => 'CheckoutController@postShipping' ]);

Route::group( ['prefix' => 'checkout', 'before' => ['auth']], function () {
    Route::get('/', ['as' => 'checkout.cart',  'uses' => 'CheckoutController@index' ]);
    Route::post('order', ['as' => 'checkout.order', 'before'=>['csrf'], 'uses' => 'CheckoutController@postOrder' ]);
});