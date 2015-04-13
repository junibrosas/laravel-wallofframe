<?php

namespace Iboostme\Product\Cart;

use Illuminate\Database\Eloquent\Collection;
use Product;
use Illuminate\Support\Facades\Session;
class CartRepository {

    public function getCartItems( $ids ){
        $quantity = array_count_values($ids);
        $products = $this->product()->whereIn('id', $ids)->get();
        $products->each(function($product) use($quantity){
            $product->quantity = $quantity[$product->id]; // calculate quantity of each product.
            $product->stocks = 30; // number of stocks of each product.
        });

        return $products;
    }

    public function getTotalAmount(Collection $products){
        $amount = 0;
        foreach($products as $product){
            $amount += $product->price * $product->quantity;
        }
        return $amount;
    }

    public function removeItem(array $bag, Product $product){
        $bag = array_diff($bag, array($product->id)); // remove specified product ids
        return $bag;
    }

    public function changeQuantity(array $bag, $quantity = 1, Product $product){
        $bag = $this->removeItem($bag, $product);
        for($i = 0; $i < $quantity; $i++){
            $bag[] = $product->id; // add product id by number of quantity
        }

        return $bag;
    }

    public function isCartEmpty(){
        if( Session::get('product_bag') == false || count( Session::get('product_bag')) <= 0){
            return true;
        }
        return false;
    }

    private function product(){
        return Product::with(['status', 'category', 'type']);
    }
} 