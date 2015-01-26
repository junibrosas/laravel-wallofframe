<?php

//Public Routes
Route::group( [ 'namespace' => 'Admin' ], function () {
    Route::post('contact/send', [ 'before' => 'csrf', 'as' => 'contacts.create', 'uses' => 'ContactController@create' ]);
} );

Route::group( [ 'before' => ['auth', 'auth.admin.only'], 'prefix' => 'admin', 'namespace' => 'Admin' ], function (){
    //Dashboard
    Route::get('account', ['as' => 'admin.dashboard.index', 'uses' => 'DashboardController@index' ]);

    //Frame Manage
    Route::get('design/manage', ['as' => 'admin.design.manage', 'uses' => 'FrameController@designManage']);
    Route::get('app/manage', ['as' => 'admin.frameApp.manage', 'uses' => 'FrameController@appManage']);
    Route::get('design/upload', ['as' => 'admin.design.upload', 'uses' => 'FrameController@uploadFrameParts']);

    Route::post('design/upload', ['as'=>'admin.frame.doUpload', 'uses' => 'FrameController@postUploadFrameParts']);
    Route::post('frame/selection', ['as'=>'admin.frame.saveSelection', 'uses' => 'FrameController@postSaveSelection']);
    Route::post('frame/update', ['as' => 'admin.frame.update', 'uses' => 'FrameController@postUpdateProduct']);
    Route::post('frame/delete', ['as' => 'admin.frame.delete', 'uses' => 'FrameController@postDeleteProduct']);
    Route::post('part/delete', ['as' => 'admin.part.delete', 'uses' => 'FrameController@postFramePartDelete']);
    Route::post('part/activate', ['as' => 'admin.part.activate', 'uses' => 'FrameController@postFramePartActivation']);
});

//Contact
Route::group( [ 'before' => 'auth', 'prefix' => 'admin/contact', 'namespace' => 'Admin' ], function () {
    Route::get('/', [ 'before' => 'auth', 'as' => 'contacts.index', 'uses' => 'ContactController@index' ]);
    Route::get('edit/{id}', [ 'before' => 'auth', 'as' => 'contacts.edit', 'uses' => 'ContactController@edit' ]);
    Route::post('store', [ 'before' => 'auth', 'as' => 'contacts.store', 'uses' => 'ContactController@store' ]);
    Route::post('update', [ 'before' => 'auth', 'as' => 'contacts.update', 'uses' => 'ContactController@update' ]);
    Route::post('delete', [ 'before' => 'auth', 'as' => 'contacts.delete', 'uses' => 'ContactController@destroy' ]);
} );