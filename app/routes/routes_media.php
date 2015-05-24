<?php

// Administrator Routes
Route::group( [ 'before' => ['auth', 'auth.admin.only'], 'prefix' => 'media', 'namespace' => 'Media' ], function (){

    // Media
    Route::get('/', ['as' => 'media.index', 'uses' => 'MediaController@index']);
    Route::get('modal', ['as' => 'media.modal', 'uses' => 'MediaController@modal']);

    Route::get('upload', ['as' => 'media.library', 'uses' => 'MediaController@upload']);
    Route::post('upload', ['as' => 'media.upload', 'uses' => 'MediaController@store']);
    Route::post('items', ['as' => 'media.items', 'uses' => 'MediaController@ajaxGetItems']);
});