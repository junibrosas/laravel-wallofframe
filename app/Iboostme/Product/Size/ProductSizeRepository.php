<?php namespace Iboostme\Product\Size;
use ProductPackage;
use ProductCategory;
class ProductSizeRepository {

    // get all general sizes and specify what sizes to exclude by category.
    public function getSizes( $product_id = '', $categoryIdOrSlug = ''){
        $category = '';
        if(is_numeric($categoryIdOrSlug)){
            $category = ProductCategory::find($categoryIdOrSlug);
        }else{
            $category = ProductCategory::where('slug', $categoryIdOrSlug)->first();
        }
        if($category){
            $category = $category->id;
        }

        $sizes = ProductPackage::where('is_global', 1)->where('category_id', $category)->orWhere(function($query) use ( $product_id )
        {
            $query->where('product_id', $product_id);
        })->get();

        return $sizes;
    }
}