<?php
//Contact
Route::group( [ 'before' => 'auth', 'prefix' => 'admin/contact', 'namespace' => 'Admin' ], function () {
    Route::get('/', [ 'before' => 'auth', 'as' => 'contacts.index', 'uses' => 'ContactController@index' ]);
    Route::get('message/{id}/{title?}', [ 'before' => 'auth', 'as' => 'contacts.message', 'uses' => 'ContactController@read' ]);
    Route::get('edit/{id}', [ 'before' => 'auth', 'as' => 'contacts.edit', 'uses' => 'ContactController@edit' ]);
    Route::post('store', [ 'before' => 'auth', 'as' => 'contacts.store', 'uses' => 'ContactController@store' ]);
    Route::post('update', [ 'before' => 'auth', 'as' => 'contacts.update', 'uses' => 'ContactController@update' ]);
    Route::post('delete', [ 'before' => 'auth', 'as' => 'contacts.delete', 'uses' => 'ContactController@destroy' ]);
    Route::post('actions', [ 'before' => 'auth', 'as' => 'contacts.actions', 'uses' => 'ContactController@postActions' ]);
} );