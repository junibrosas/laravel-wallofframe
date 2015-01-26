<?php
return array(

    // set your paypal credential
    'client_id' => 'AcUk4xB_t_CUs78kCgZC5aA6tSiJEZpOdOqHYUy2A8Wi06LTIaSz8BUEEYtq',
    'secret' => 'ELbPTxDva1jNE2Q_bPD_2nLH-YUjq0cMfOSHQL_hy3wCOqtQ8jFinSL4Y6Id',


    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);