<?php namespace Iboostme\Transaction;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Iboostme\Product\Cart\CartRepository;
use Transaction;
use TransactionStatus;
use Product;

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
    public function add( $data ){
        $cartRepo  = new CartRepository();
        $products = $cartRepo->getCartItems( Session::get('product_bag') );
        $total_amount = $cartRepo->getTotalAmount( $products );

        $input['user_id'] =  Auth::id();
        $input['shipping_address_id'] = Session::get('billingAddress');
        $input['payment_method_id'] = Session::get('paymentMethodId');
        $input['productsIds'] = json_encode( Session::get('product_bag') );
        $input['payment_response'] = $data['payment_response'];
        $input['total_amount'] = $total_amount;

        $this->newTransaction( $input );
    }

    // add new transaction.
    public function newTransaction( $data ){
        $totalAmount = 0; $products = array();
        if( count($data['productIds']) ){
            foreach($data['productIds'] as $id){
                $product = Product::find($id);
                if($product){
                    // get total amount by each product.
                    $totalAmount += $product->price;

                    // collect the product
                    $products[] = $product;
                }
            }
        }


        $transaction = new Transaction();
        $transaction->tracking_number = generateUniqueId();
        $transaction->user_id = array_get($data, 'user_id');
        $transaction->shipping_address_id = array_get($data, 'shipping_address_id');
        $transaction->payment_method_id = array_get($data, 'payment_method_id');
        $transaction->transaction_status_id = TransactionStatus::where('slug', 'in-process')->first()->id;
        $transaction->total_amount = $totalAmount;
        $transaction->products = json_encode($products);
        $transaction->payment_response = array_get($data, 'payment_response');

        $transaction->save();
    }

    // model extension.
    private function transaction(){
        return Transaction::orderby('created_at', 'desc');
    }
} 