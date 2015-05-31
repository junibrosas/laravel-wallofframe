<?php

Route::get('test', function(){
    Mail::queueOn('default', 'emails.auth.new-user', array('user' => $user), function($message) use ($user)
    {
        $message->to( Config::get('site.administrator_email'), 'Wall Of Frame Administrator' )->subject('New user is available');
    });
});
