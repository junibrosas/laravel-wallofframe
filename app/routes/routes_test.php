<?php
use Iboostme\Email\EmailRepository;
use Iboostme\Product\ProductRepository;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Intervention\Image\Facades\Image;
use Iboostme\Product\ProductFormatter;

Route::get('test', function(){
    $shipAddress = ShippingAddress::where('user_id', 5)->get();
    trace($shipAddress);
});
