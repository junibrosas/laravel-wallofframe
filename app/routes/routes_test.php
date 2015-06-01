<?php
Route::get('test', function(){
    $data = array(
        'first_name' => 'Julius',
        'last_name' => 'Caesar',
        'email' => 'justignite1992@gmail.com',
        'message' => 'Hello there.',
    );
    $repo = new \Iboostme\Email\EmailRepository();
    $repo->newContact( $data );
});
