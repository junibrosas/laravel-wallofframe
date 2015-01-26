<?php

Route::group( [
    'prefix' => 'paypal',
    'before' => ['auth'],
    'namespace' => 'Payment',
], function () {

    Route::get('payment', array(
        'as' => 'paypal.payment',
        'uses' => 'PaypalController@postPayment',
    ));

    // this is after make the payment, PayPal redirect back to your site
    Route::get('payment/status', [
        'as' => 'paypal.payment.status',
        'uses' => 'PaypalController@getPaymentStatus'
    ]);
});

