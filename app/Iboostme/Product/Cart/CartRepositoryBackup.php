<?php

namespace Iboostme\Product\Cart;

use Illuminate\Database\Eloquent\Collection;
use Product;
use ProductPackage;
use Illuminate\Support\Facades\Session;
class CartRepositoryBackup {

    public function getCartItems( $items ){
        $bag = $items;
        $items = array_fetch($items, 'product'); // map bag items into an array of product ids.

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
            $packages = $this->mapBagItemToPackage($bag, $product);

            $product->quantity = $quantity[$product->id]; // calculate quantity of each product.
            $product->stocks = 30; // number of stocks of each product.
            $packages->each(function($package) use ($product){
                $product->size .= $package->width.'x'.$package->height.', ';
            });

            $product->price = $package->gloss;
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

    private function mapBagItemToPackage($bag, Product $product){
        $packageIds = array();
        if(count($bag) > 0){
            foreach($bag as $item){

                if($item['product'] == $product->id){
                    $packageIds[] = $item['package'];
                }
            }
        }

        return ProductPackage::whereIn('id', $packageIds)->get();
    }

    private function product(){
        return Product::with(['status', 'category', 'type']);
    }
} 