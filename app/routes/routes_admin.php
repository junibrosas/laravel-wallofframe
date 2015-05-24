<?php
//Public Routes
Route::group( [ 'namespace' => 'Admin' ], function () {
    Route::post('contact/send', [ 'before' => 'csrf', 'as' => 'contacts.create', 'uses' => 'ContactController@create' ]);
} );

// Administrator Routes
Route::group( [ 'before' => ['auth', 'auth.admin.only'], 'prefix' => 'admin', 'namespace' => 'Admin' ], function (){
    //Dashboard
    Route::get('account', ['as' => 'admin.dashboard.index', 'uses' => 'DashboardController@index' ]);

    // Customers
    Route::get('customers', ['as' => 'admin.customers', 'uses' => 'CustomerController@index' ]);

    // Frame Design
    Route::get('frame-design', ['as' => 'admin.design.manage', 'uses' => 'FrameController@getDesigns']);
    //Route::get('design/upload', ['as' => 'admin.design.upload', 'uses' => 'FrameController@uploadFrameParts']);


    // Frame Border
    Route::get('frame-border', ['as' => 'admin.frame.border', 'uses' => 'FrameController@getBorders']);
    Route::get('frame-border/create', ['as' => 'admin.frame.border.create', 'uses' => 'FrameController@uploadFrameBorder']);
    Route::post('frame-border/create', ['as' => 'admin.frame.border.create', 'uses' => 'FrameController@postCreateFrameBorder']);
    Route::post('frame-border/manage', ['as' => 'admin.frame.border.manage', 'uses' => 'FrameController@postManageFrameBorders']);
    Route::post('frame-border/store', ['as' => 'admin.frame.border.store', 'uses' => 'FrameController@postStoreFrameBorder']);

    // Frame Sizes
    Route::get('frame-sizes', ['as' => 'admin.frame.sizes', 'uses' => 'FrameSizeController@index']);
    Route::post('sizes/add', ['as' => 'admin.frame.sizes.add', 'uses' => 'FrameSizeController@store']);
    Route::post('sizes/update', ['as' => 'admin.frame.sizes.update', 'uses' => 'FrameSizeController@update']);
    Route::post('sizes/actions', ['as' => 'admin.frame.sizes.actions', 'uses' => 'FrameSizeController@postActions']);

    /*Route::post('design/upload', ['as'=>'admin.frame.doUpload', 'uses' => 'FrameController@postUploadFrameParts']);*/

    Route::post('frame/selection', ['as'=>'admin.frame.saveSelection', 'uses' => 'FrameController@postSaveSelection']);
    Route::post('frame/update', ['as' => 'admin.frame.update', 'uses' => 'FrameController@postUpdateProduct']);
    Route::post('frame/delete', ['as' => 'admin.frame.delete', 'uses' => 'FrameController@postDeleteProduct']);
    Route::post('part/delete', ['as' => 'admin.part.delete', 'uses' => 'FrameController@postFrameDelete']);
    Route::post('part/activate', ['as' => 'admin.part.activate', 'uses' => 'FrameController@postFramePartActivation']);



    // Frame Upload
    Route::get('design/upload', ['as' => 'admin.design.upload', 'uses' => 'FrameUploadController@index']);
    Route::post('design-upload', ['as'=>'admin.design.store', 'uses' => 'FrameUploadController@store']);
    Route::post('upload-config', ['as' => 'frame.upload.config', 'uses' => 'FrameUploadController@config']);
});

//Contact
Route::group( [ 'before' => 'auth', 'prefix' => 'admin/contact', 'namespace' => 'Admin' ], function () {
    Route::get('/', [ 'before' => 'auth', 'as' => 'contacts.index', 'uses' => 'ContactController@index' ]);
    Route::get('message/{id}/{title?}', [ 'before' => 'auth', 'as' => 'contacts.message', 'uses' => 'ContactController@read' ]);
    Route::get('edit/{id}', [ 'before' => 'auth', 'as' => 'contacts.edit', 'uses' => 'ContactController@edit' ]);
    Route::post('store', [ 'before' => 'auth', 'as' => 'contacts.store', 'uses' => 'ContactController@store' ]);
    Route::post('update', [ 'before' => 'auth', 'as' => 'contacts.update', 'uses' => 'ContactController@update' ]);
    Route::post('delete', [ 'before' => 'auth', 'as' => 'contacts.delete', 'uses' => 'ContactController@destroy' ]);
} );