<?php
use Iboostme\Email\EmailRepository;
use Iboostme\Product\ProductRepository;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Intervention\Image\Facades\Image;
Route::get('test', function(){
    $repo = App::make('UserRepository');
    $repo->signup(Input::all());

});
