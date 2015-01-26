<?php
Route::group( ['prefix' => 'fb'], function () {
    // Confide routes
    Route::get('login',                              ['as' => 'fb.login', 'uses' => 'FacebookController@login']);
    Route::get('signup',                             ['as' => 'fb.signup', 'uses' => 'FacebookController@signup']);
    Route::get('login/callback',                     ['as' => 'fb.login.callback', 'uses' => 'FacebookController@loginCallback']);
    Route::get('signup/callback',                    ['as' => 'fb.signup.callback', 'uses' => 'FacebookController@signupCallback']);
} );

