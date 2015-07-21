<?php namespace Iboostme\Product\Size;
use Product;
use ProductPackage;
use ProductCategory;
class ProductSizeRepository {

    // get all general sizes and specify what sizes to exclude by category.
    /*public function getSizes( $product_id = '', $categoryIdOrSlug = ''){
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
    }*/

    /**
     * @param string $product_id
     * @param string $categoryIdOrSlug
     * @return mixed
     */
    public function getSizes($product_id = '', $categoryIdOrSlug = ''){
        // check if there is custom sizes
        // if there is, use it.

        $product = Product::find($product_id);
        if( count($product->sizes()) > 0){
            return $product->sizes();
        }


        // if there is no custom sizes, use the general sizes.
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



    public function selectableSizes(){
        $category = null;

        return ProductPackage::get();
    }
}