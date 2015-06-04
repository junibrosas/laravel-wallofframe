<?php
use Illuminate\Support\Facades\Mail;
Route::get('test', function(){
    $data['email'] = 'info@wallofframe.com';
    $data['customerName'] = 'This is a test';
    Mail::queueOn('default', 'emails.customer-contact-reply', $data, function($message) use ($data)
    {
        $message->to( $data['email'],  $data['customerName'] )
            ->subject('Thank you for contacting with us.');
    });
});
