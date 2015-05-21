<?php

// Administrator Routes
Route::group( [ 'before' => ['auth', 'auth.admin.only'], 'prefix' => 'media', 'namespace' => 'Media' ], function (){

    // Media
    Route::get('/', ['as' => 'media.index', 'uses' => 'MediaController@index']);
    Route::post('upload', ['as' => 'media.upload', 'uses' => 'MediaController@store']);
});