<?php namespace Iboostme\Product\Size;
use ProductPackage;
use ProductCategory;
class ProductSizeRepository {
    public function getAll( $slug = '' ){
        if($slug){
            $categoryId = ProductCategory::where('slug', $slug)->first()->id;
            $sizes = ProductPackage::where('category_id', $categoryId)->get();
        }else{
            $sizes = ProductPackage::where('category_id', null)->get();
        }
        return $sizes;
    }
} 