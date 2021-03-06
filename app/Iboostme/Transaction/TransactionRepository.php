<?php namespace Iboostme\Transaction;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Iboostme\Product\Cart\CartRepository;
use Transaction;
use TransactionStatus;
use Product;
use ShippingAddress;
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

    public function filterTransaction( $filter ){
        if($filter){
            if($filter == 'archive')
                return $this->archive();
            else
                return $this->filter( $filter );
        }else{
            $transactions = $this->transaction()->get();
        }

        return $transactions;
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
        $transaction = new Transaction();
        $shippingAddressId = array_get($data, 'shipping_address_id');

        $transaction->tracking_number = generateTrackingNumber();
        $transaction->user_id = array_get($data, 'user_id');
        $transaction->payment_method_id = array_get($data, 'payment_method_id');
        $transaction->transaction_status_id = TransactionStatus::where('slug', 'in-process')->first()->id;
        $transaction->total_amount = array_get($data, 'total_amount');
        $transaction->products = json_encode(array_get($data, 'cart_content'));
        $transaction->payment_response = array_get($data, 'payment_response');
        $transaction->shippingAddress = ShippingAddress::find( $shippingAddressId )->toJson();

        $transaction->save();

        return $transaction;
    }

    // delete transactions by specified id.
    public function delete( $transactionIds ){
        Transaction::whereIn('id', $transactionIds)->delete();
    }

    public function restore( $transactionIds ){
        Transaction::whereIn('id', $transactionIds)->restore();
    }

    private function archive(){
        return $this->transaction()->onlyTrashed()->get();
    }

    private function filter( $filter ){
        $transactions = $this->transaction()->get();
        $transactions = $transactions->filter(function( $transaction ) use ( $filter ){
            if( $filter == $transaction->transactionStatus->slug ){
                return $transaction;
            }
        });

        return $transactions;
    }

    // model extension.
    private function transaction(){
        return Transaction::orderby('created_at', 'desc');
    }
} 