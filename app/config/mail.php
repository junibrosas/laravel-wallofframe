<?php

/*return array(
    'driver' => getenv('email_driver'),
    'host' => 'smtp.googlemail.com',
    'port' => 587, //  25 or 465, 587.
    'from' => array('address' => getenv('email_address'), 'name' => 'Wall of Frame'),
    'encryption' => getenv('email_encryption'), // tls
    'username' => getenv('email_address'),
    'password' => getenv('email_password'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => getenv('email_pretend'),
);*/

return array(
    'driver' => 'mandrill',
    /*'host' => 'smtp.googlemail.com',
    'port' => 587, //  25 or 465, 587.
    'from' => array('address' => getenv('email_address'), 'name' => 'Wall of Frame'),
    'encryption' => getenv('email_encryption'), // tls
    'username' => getenv('email_address'),
    'password' => getenv('email_password'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => getenv('email_pretend'),*/
);