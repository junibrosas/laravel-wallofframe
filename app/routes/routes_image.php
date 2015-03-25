<?php

Route::get('img-frame/{imageName?}', function($imageName = ''){
    if (!File::exists( public_path('uploads/products/designs/original/').$imageName )) return Response::view('errors.missing', array(), 404);

    /*$img = Image::cache(function($image) use ($imageName) {

    }, 10080);*/
    $image = new \Intervention\Image\Facades\Image();
    $image->make( public_path('uploads/products/designs/original/').$imageName);
    /*$image->resize(600, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });*/

    return Response::make($image, 200, array('Content-Type' => 'image/jpg'));
});
