<?php
use Iboostme\Email\EmailRepository;
use Iboostme\Product\ProductRepository;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Intervention\Image\Facades\Image;
Route::get('test', function(){
    trace( getenv('db_name') );
    trace( getenv('db_user') );
    trace( getenv('db_password') );



});
