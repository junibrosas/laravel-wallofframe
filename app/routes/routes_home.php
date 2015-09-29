<?php
Route::get('/', ['before'=>['auth.admin'], 'as' => 'home.index', 'uses' => 'HomeController@index' ]);
Route::get('/home-better', ['before'=>['auth.admin'], 'as' => 'home.better', 'uses' => 'HomeController@homeBetter' ]);




