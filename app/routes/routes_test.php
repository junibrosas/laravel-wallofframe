<?php
Route::get('test', function(){
    $emailRepo = new \Iboostme\Email\EmailRepository();
    $user = User::find(51);
    trace($user);

    $emailRepo->newUser(  $user );
});
