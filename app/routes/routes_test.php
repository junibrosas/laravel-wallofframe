<?php
use Iboostme\Email\EmailRepository;
use Iboostme\Product\ProductRepository;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Intervention\Image\Facades\Image;
Route::get('test', function(){
    return trace(Session::get('frame_data'));

    Bugsnag::notifyError('ErrorType', 'Test Error');
});
