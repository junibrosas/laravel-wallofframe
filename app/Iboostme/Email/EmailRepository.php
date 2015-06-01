<?php namespace Iboostme\Email;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use User;
use Transaction;

class EmailRepository {
    public function newUserWithPassword( User $user, $password ){
        Mail::send('emails.auth.generated', array('user' => $user, 'password' => $password), function($message) use ($user)
        {
            $message->to( $user->email, $user->present()->name )->subject('Welcome to Wall of Frame!');
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
        $adminData = array(
            'trackingNumber' => $transaction->tracking_number,
            'totalAmount' => $transaction->total_amount,
            'userFullName' => $transaction->user->present()->name,
            'userEmail' => $transaction->user->present()->email,
            'currency' => $transaction->currency
        );

        // Administrator
        Mail::queueOn('default', 'emails.admin-new-order', $adminData, function($message) use ($transaction)
        {
            $message->to( Config::get('site.administrator_email'), 'Wall Of Frame Administrator' )->subject('New Order Received.');
        });

        $customerData = array(
            'trackingNumber' => $transaction->tracking_number,
            'totalAmount' => $transaction->total_amount,
            'userFullName' => $transaction->user->present()->name,
            'currency' => $transaction->currency
        );
        // Customer
        Mail::queueOn('default', 'emails.customer-new-order', $customerData, function($message) use ($transaction)
        {
            $message->to( $transaction->user->present()->email, $transaction->user->present()->name )->subject('New Order Received.');
        });
    }

    // send a new contact message
    public function newContact( $input ){
        $data = array(
            'customerName' => array($input, 'first_name').' '.array($input, 'last_name'),
            'email' => array_get($input, 'email'),
            'contactMessage' => array_get($input, 'message'),
        );
        Mail::queueOn('default', 'emails.contact-message', $data, function($message) use ($data)
        {
            $message->to( $data['email'], $data['customerName'] )->subject($data['customerName'].' sent you a message.');
        });
    }
} 