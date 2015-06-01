<?php
use Illuminate\Support\Facades\View;
Route::get('test', function(){
    $repo = new \Iboostme\Email\EmailRepository();
    $repo->newUser( User::first() );
});
