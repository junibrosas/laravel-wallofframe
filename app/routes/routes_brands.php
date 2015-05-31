<?php
Route::group( [ 'before' => ['auth', 'auth.admin.only'], 'prefix' => 'admin', 'namespace' => 'Admin' ], function (){
    Route::get('brands', ['as' => 'admin.brands.index', 'uses' => 'BrandController@index' ]);
    Route::post('brand/update', ['as' => 'admin.brand.update', 'uses' => 'BrandController@update' ]);
    Route::post('brand/actions', ['as' => 'admin.brand.actions', 'uses' => 'BrandController@postActions']);
} );