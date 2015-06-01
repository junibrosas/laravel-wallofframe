<?php namespace Iboostme\Email;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use User;
use Transaction;

class EmailRepository {
    public function newUserWithPassword( User $user, $password ){
        Mail::send('emails.auth.generated', array('user' => $user, 'password' => $password), function($message) use ($user)
        {
            $message->to( $user->email, $user->present()->name )->subject('Welcome to Wall of Frames!');
        });
    }

    public function newUser( User $user ){
        $data = array(
            'username' => $user->name,
            'name' => $user->present()->name,
            'email' => $user->present()->email
        );
        Mail::queueOn('default', 'emails.new-user', $data, function($message) use ($user)
        {
            $message->to( Config::get('site.administrator_email'), 'Wall Of Frame Administrator' )->subject('New user is registered');
        });
    }

    public function newOrder( Transaction $transaction ){
        // Administrator
        Mail::queueOn('default', 'emails.admin-new-order', array('transaction' => $transaction), function($message) use ($transaction)
        {
            $message->to( Config::get('site.administrator_email'), 'Wall Of Frame Administrator' )->subject('New Order Received.');
        });

        // Customer
        Mail::queueOn('default', 'emails.customer-new-order', array('transaction' => $transaction), function($message) use ($transaction)
        {
            $message->to( $transaction->user->present()->email, $transaction->user->present()->name )->subject('New Order Received.');
        });
    }
} 