<?php
use Iboostme\Email\EmailRepository;
use Iboostme\Product\ProductRepository;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Intervention\Image\Facades\Image;
use Iboostme\Product\ProductFormatter;
use Iboostme\Transaction\TransactionRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use ProductCategory;
use Iboostme\Product\Size\ProductSizeRepository;
Route::get('test', function(){
    $sizeRepository = new  ProductSizeRepository();
    $sizes = $sizeRepository->getAll();
    trace($sizes);

});
