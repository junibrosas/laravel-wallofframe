<?php
Route::get('/', ['before'=>['auth.admin'], 'as' => 'home.index', 'uses' => 'HomeController@index' ]);



