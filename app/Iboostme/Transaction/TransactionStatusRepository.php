<?php namespace Iboostme\Transaction;

use Transaction;
use TransactionStatus;
class TransactionStatusRepository {
    public function changeStatus( $transactionIds, $statusSlug ){
        $transactions = Transaction::whereIn('id', $transactionIds)->get();
        if($transactions->count() > 0){
            foreach($transactions as $transaction){
                $transaction->transaction_status_id = $this->getBySlug($statusSlug)->id;

                //save
                $transaction->save();
            }
        }
    }



    public function getBySlug( $slug ){
        $status = TransactionStatus::where('slug', $slug)->first();
        if($status){
            return $status;
        }
    }
} 