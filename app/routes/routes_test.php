<?php
Route::get('test', function(){
    $data['email'] = 'powerlogic1992@gmail.com';
    $data['customerName'] = 'Juni Brosas';
    Mail::queueOn('default', 'emails.customer-contact-reply', $data, function($message) use ($data)
    {
        $message->to( $data['email'],  $data['customerName'] )
            ->subject('Thank you for contacting with us.');
    });
});
