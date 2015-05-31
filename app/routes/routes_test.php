<?php
Route::get('test', function(){
    $emailRepo = new \Iboostme\Email\EmailRepository();
    $emailRepo->newUser( User::find(51) );
});
