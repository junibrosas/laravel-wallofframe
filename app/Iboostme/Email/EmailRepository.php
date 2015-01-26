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
} 