<?php

Route::get('img-frame/{imageName?}', function($imageName = ''){
    if (!File::exists( public_path('uploads/products/designs/original/').$imageName )) return Response::view('errors.missing', array(), 404);

    $img = Image::cache(function($image) use ($imageName) {
        $image->make( public_path('uploads/products/designs/original/').$imageName);
        /*$image->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });*/
    }, 10080);

    return Response::make($img, 200, array('Content-Type' => 'image/jpg'));
});
