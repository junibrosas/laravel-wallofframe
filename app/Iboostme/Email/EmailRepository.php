<?php namespace Iboostme\Email;

use Illuminate\Support\Facades\Mail;
use User;

class EmailRepository {
    public function newUserWithPassword( User $user, $password ){
        Mail::send('emails.auth.generated', array('user' => $user, 'password' => $password), function($message) use ($user)
        {
            $message->to( $user->email, $user->present()->name )->subject('Welcome to Wall of Frames!');
        });
    }

    public function newUser( User $user ){
        Mail::queueOn('default', 'emails.auth.new-user', array('user' => $user), function($message) use ($user)
        {
            $message->to( Config::get('site.administrator_email'), 'Wall Of Frame Administrator' )->subject('New user is available');
        });
    }
} 