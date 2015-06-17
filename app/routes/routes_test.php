<?php
use Illuminate\Support\Facades\Mail;
Route::get('test', function(){
    $product = Product::first();
    trace($product->present()->watermarkColor);
});
