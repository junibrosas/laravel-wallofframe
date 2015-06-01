<?php
use Illuminate\Support\Facades\View;
Route::get('test', function(){
    $repo = new \Iboostme\Email\EmailRepository();
    return View::make('emails.new-user', ['user'=> User::first()]);
    //$repo->newUser( User::first() );
});
