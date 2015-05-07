<?php namespace Iboostme\Transaction;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Iboostme\Product\Cart\CartRepository;
use Transaction;
use TransactionStatus;
use Product;
use Gloudemans\Shoppingcart\Facades\Cart;
class TransactionRepository {

    // retrieve products with quantity.
    public function getProductsWithQuantity( $productArray ){
        $ids = array();
        if( count($productArray) > 0 ){
            foreach( $productArray as $product){
                $ids[] = $product->id;
            }
        }
        $quantity = array_count_values($ids);
        $products = Product::whereIn('id', $ids)->get();
        $products->each(function($product) use($quantity){
            $product->quantity = $quantity[$product->id];
        });

        return $products;
    }

    public function getTransactions(){
        return $this->transaction()->get();
    }

    public function getByTrackingNumber( $trackingNumber ){
        return $this->transaction()->where('tracking_number', $trackingNumber)->first();
    }

    // retrieve transaction per user logged in.
    public function getByUser(){
        return $this->transaction()->where('user_id', Auth::id())->get();
    }

    // User side add a new transaction or order.
    public function add( $data = array() ){
        $totalAmount = Cart::total();
        $cartContent = Cart::content();

        $input['user_id'] =  Auth::id();
        $input['shipping_address_id'] = Session::get('billingAddress');
        $input['payment_method_id'] = Session::get('paymentMethodId');
        $input['payment_response'] = array_get($data, 'payment_response');
        $input['total_amount'] = $totalAmount;
        $input['cart_content'] = $cartContent;
        return $this->newTransaction( $input );
    }

    // add new transaction.
    public function newTransaction( $data ){
        $totalAmount = 0;
        $transaction = new Transaction();
        $transaction->tracking_number = generateUniqueId();
        $transaction->user_id = array_get($data, 'user_id');
        $transaction->shipping_address_id = array_get($data, 'shipping_address_id');
        $transaction->payment_method_id = array_get($data, 'payment_method_id');
        $transaction->transaction_status_id = TransactionStatus::where('slug', 'in-process')->first()->id;
        $transaction->total_amount = $totalAmount;
        $transaction->products = json_encode(array_get($data, 'cart_content'));
        $transaction->payment_response = array_get($data, 'payment_response');

        $transaction->save();

        return $transaction;
    }

    // model extension.
    private function transaction(){
        return Transaction::orderby('created_at', 'desc');
    }
} 