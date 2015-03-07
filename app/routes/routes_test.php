<?php
use Iboostme\Email\EmailRepository;
use Iboostme\Product\ProductRepository;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Intervention\Image\Facades\Image;
use Iboostme\Product\ProductFormatter;

Route::get('test', function(){
    $productFormatter = new ProductFormatter();
    $frames = $productFormatter->frameBulkFormat(ProductFrame::where('is_active', 1)->get());

    trace( $frames );
});
