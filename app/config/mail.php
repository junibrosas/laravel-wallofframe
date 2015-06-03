<?php

return array(

    'driver' => 'smtp',

    'host' => 'smtp.googlemail.com',

    'port' => 587, //  25 or 465, 587.

    'from' => array('address' => getenv('email_address'), 'name' => 'Wall of Frame'),


    'encryption' => 'ssl', // tls


    'username' => getenv('email_address'),


    'password' => getenv('email_password'),

    'sendmail' => '/usr/sbin/sendmail -bs',

    'pretend' => false,

);