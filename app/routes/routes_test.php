<?php
use Illuminate\Support\Facades\Mail;
use ProductCategory;
Route::get('test', function(){
    $categories = array(
        ['id'=>1, 'name' => 'Hello'],
        ['id'=>3, 'name' => 'Hello'],
    );

    trace();

});
