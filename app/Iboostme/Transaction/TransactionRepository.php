<?php namespace Iboostme\Transaction;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Iboostme\Product\Cart\CartRepository;
use Transaction;
use TransactionStatus;

class TransactionRepository {
    public function getUserTransaction(){
        return Transaction::where('user_id', Auth::id())->get();
    }
    public function add( $data ){
        $cartRepo  = new CartRepository();
        $products = $cartRepo->getCartItems( Session::get('product_bag') );
        $total_amount = $cartRepo->getTotalAmount( $products );

        Transaction::create([
            'user_id' => Auth::id(),
            'tracking_number' => generateUniqueId(),
            'shipping_address_id' => Session::get('billingAddress'),
            'payment_method_id' => Session::get('paymentMethodId'),
            'products' => json_encode( Session::get('product_bag') ),
            'total_amount' => $total_amount,
            'transaction_status_id' => TransactionStatus::where('slug', 'in-delivery')->first()->id,
            'payment_response' => $data['payment_response']
        ]);
    }
} 