<?php
use User;
use Transaction;
Route::get('test', function(){
    $transaction = Transaction::first();

    return \Illuminate\Support\Facades\View::make('emails.customer-new-order', ['transaction' => $transaction]);
    //$emailRepo->newUser(  $user );
});
