<?php
use Iboostme\Email\EmailRepository;
use Iboostme\Product\ProductRepository;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Intervention\Image\Facades\Image;
use Iboostme\Product\ProductFormatter;

Route::get('test', function(){
    $productIds = [81,81,81];


    trace(json_encode($products));
    trace($totalAmount);
});
