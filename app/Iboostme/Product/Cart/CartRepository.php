<?php

namespace Iboostme\Product\Cart;

use Illuminate\Database\Eloquent\Collection;
use Product;
use ProductPackage;
use Illuminate\Support\Facades\Session;
class CartRepository {

    // get the total of the given cart items.
    public function total( $products ){
        $total = 0;
        if( count($products) > 0 ){
            foreach($products as $product){
                $total += $product->subtotal;
            }
        }
        return $total;
    }
}