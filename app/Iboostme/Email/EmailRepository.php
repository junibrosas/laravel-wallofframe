<?php namespace Iboostme\Email;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use User;
use Transaction;

class EmailRepository {

    // sends email about a new user successfully registered.
    public function newUser( User $user ){
        $data = array(
            'username' => $user->username,
            'name' => $user->present()->name,
            'email' => $user->present()->email
        );
        // To Administrator
        Mail::queueOn('default', 'emails.admin-new-user', $data, function($message) use ($user)
        {
            $message->to( Config::get('site.administrator_email'), 'Wall Of Frame Administrator' )
                ->subject('Wall of Frame - New user is registered');
        });

        // To Customer
        Mail::queueOn('default', 'emails.customer-new-user', $data, function($message) use ($user)
        {
            $message->to( $user->present()->email, $user->present()->name )
                ->subject('Welcome to Wall Of Frame. Thank you for registering your profile.');
        });

    }

    // sends email about a new successful order.
    public function newOrder( Transaction $transaction ){
        $data = array(
            'trackingNumber' => $transaction->tracking_number,
            'totalAmount' => $transaction->total_amount,
            'userFullName' => $transaction->user->present()->name,
            'userEmail' => $transaction->user->present()->email,
            'currency' => $transaction->currency
        );

        // Administrator
        Mail::queueOn('default', 'emails.admin-new-order', $data, function($message) use ($transaction)
        {
            $message->to( Config::get('site.administrator_email'), 'Wall Of Frame Administrator' )
                ->subject('Wall of Frame - New Order Received.');
        });

        // Customer
        Mail::queueOn('default', 'emails.customer-new-order', $data, function($message) use ($transaction)
        {
            $message->to( $transaction->user->present()->email, $transaction->user->present()->name )
                ->subject('Thank you for your order.');
        });
    }

    // send a new contact message
    public function newContact( $input ){
        $data = array(
            'customerName' => array_get($input, 'first_name').' '.array_get($input, 'last_name'),
            'email' => array_get($input, 'email'),
            'company' => array_get($input, 'company'),
            'contactMessage' => array_get($input, 'message'),
        );

        // Administrator
        Mail::queueOn('default', 'emails.contact-message', $data, function($message) use ($data)
        {
            $message
                ->to( Config::get('site.administrator_email'), 'Wall Of Frame Administrator'  )
                ->replyTo($data['email'],  $data['customerName'])
                ->subject('Wall of Frame Contact Form - '.$data['customerName'].' sent you a message.');
        });

        // Customer
        Mail::queueOn('default', 'emails.customer-contact-reply', $data, function($message) use ($data)
        {
            $message->to( $data['email'],  $data['customerName'] )
                ->subject('Thank you for contacting with us.');
        });
    }
} 