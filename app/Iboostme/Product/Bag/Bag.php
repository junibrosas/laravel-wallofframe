<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/19/2014
 * Time: 2:51 PM
 */

namespace Iboostme\Product\Bag;
use Product;

class Bag {
    public $bag;
    public function __construct(array $bag){
        $this->bag = $bag;
    }

    public function getBag(){
        return $this->bag;
    }

    public function addItemId(Product $product){
        $this->bag[] = $product->id;
        return $this->bag;
    }

    public function addItem(Product $product){
        if(!$this->hasItem($product)){
            $this->bag[] = $product;
        }
        $this->bag[] = $product;
        return $this->bag;
    }
    public function hasItem(Product $product){
        if(count($this->bag) > 0){
            foreach($this->bag as $item){
                if($item->id == $product->id)
                    return true;
            }
        }
        return false;
    }
} 