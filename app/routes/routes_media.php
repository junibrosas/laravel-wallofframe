<?php

// Administrator Routes
Route::group( [ 'before' => ['auth', 'auth.admin.only'], 'prefix' => 'media', 'namespace' => 'Media' ], function (){

    // Media
    Route::get('/', ['as' => 'media.index', 'uses' => 'MediaUploadController@index']);

});