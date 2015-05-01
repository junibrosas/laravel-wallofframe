<?php

namespace Iboostme\Product\Cart;

use Illuminate\Database\Eloquent\Collection;
use Product;
use ProductPackage;
use Illuminate\Support\Facades\Session;
class CartRepository {

    public function getCartItems( $items ){
        $bag = $items;
        $items = $this->mapBagItemToProduct($bag); // map bag items into an array of product ids.

        $quantity = array_count_values($items);
        $products = $this->product()->find($items);

        // reverse an array so that the latest pushed data will be in the top order.
        $ids = array_reverse($items);

        // sort collection by the order of IDs because the collection returns result by the order of when they are inserted.
        $products->sortBy(function($model) use ($ids){
            return array_search($model->getKey(), $ids);
        });

        // loop through each of the product.
        $products->each(function($product) use($quantity, $bag){
            $package = $this->mapBagItemToPackage($bag, $product);
            $product->quantity = $quantity[$product->id]; // calculate quantity of each product.
            $product->stocks = 30; // number of stocks of each product.
            $product->size = $package->width.'x'.$package->height;
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


    private function mapBagItemToProduct($items){
        $data = array();
        if(count($items) > 0){
            foreach($items as $item){

                if( is_array(json_decode($item))){
                    $id = json_decode($item)[0]; // retrieve the product id.
                }else{
                    $id = $item;
                }
                $data[] = $id;
            }
        }
        return $data;
    }

    private function mapBagItemToPackage($bag, Product $product){

        if(count($bag) > 0){
            foreach($bag as $item){

                if(json_decode($item)[0] == $product->id){
                    $package = ProductPackage::find(json_decode($item)[1]);

                    if($package) return $package;
                }
            }
        }
    }

    private function product(){
        return Product::with(['status', 'category', 'type']);
    }
} 