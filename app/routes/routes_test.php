<?php
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
Route::get('test', function(){
    $data = array(
        'customerName' => 'Jayde Guevarra',
        'email' => 'justignite1992@gmail.com',
        'contactMessage' => 'Hello there.',
    );
    Mail::queueOn('default', 'emails.contact-message', $data, function($message) use ($data)
    {
        $message->from($data['email'],  $data['customerName'])
            ->to( Config::get('site.administrator_email'), 'Wall Of Frame Administrator'  )
            ->subject($data['customerName'].' sent you a message.');
    });
});
