<?php namespace Iboostme\Transaction;

use Iboostme\Product\Cart\CartRepository;
use Laracasts\Presenter\Presenter;
use Product;

class TransactionPresenter extends Presenter{
    public function orderUrl(){
        return route('single.order', $this->entity->tracking_number);
    }

    public function trackingNumber(){
        return $this->entity->tracking_number;
    }

    public function paymentMethod(){
        return $this->entity->paymentMethod->name;
    }

    public function shippingAddress(){
        $address = '';
        $address .= $this->entity->shippingAddress->first_name . ' ';
        $address .= $this->entity->shippingAddress->last_name . ', ';
        $address .= $this->entity->shippingAddress->mobile_number . ', ';
        $address .= $this->entity->shippingAddress->address . ' ';
        $address .= $this->entity->shippingAddress->landmark . ' ';
        return $address;
    }

    /*public function totalAmount(){
        $cartRepo = new CartRepository();
        $products = $cartRepo->getCartItems( json_decode($this->entity->products) ); // retrieve products from this order.
        $total_amount = $cartRepo->getTotalAmount( $products ); // products with quantity property

        return $total_amount;
    }*/

    public function totalAmount(){
        return $this->entity->total_amount;
    }

    public function date(){
        return date('m-d-Y', strtotime($this->entity->created_at));
    }

    public function productNames(){
        $product_ids = json_decode( $this->entity->products );
        $products = Product::whereIn('id', $product_ids)->get();
        $productNames = '';
        if( $products->count() > 0 ){
            foreach( $products as $product ){
                $productNames .= '<a class="normal-link" href="'.$product->present()->url.'">'.$product->present()->title.'</a><br>';
            }
        }
        return $productNames;
    }

    public function status(){
        return $this->entity->transactionStatus->name;
    }
}