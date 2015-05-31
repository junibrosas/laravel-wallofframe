<?php

Route::get('test', function(){
    Mail::send('emails.email-test-message', array('key' => 'value'), function($message)
    {
        $message->to('powerlogic1992@gmail.com', 'John Smith')->subject('Welcome!');
    });
});
