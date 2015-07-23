<?php namespace Iboostme\Product\Size;
use Product;
use ProductPackage;
class ProductSizeRepository {

    /** Get all general sizes and specify what sizes to exclude by category.
     * @param Product $product
     * @return mixed
     */
    public function getSizes( Product $product){
        // if there are specific sizes to a product return those sizes.
        if( count($product->sizes()) > 0){
            return $product->sizes();
        }


        // if the product has the category that the product package set to be prioritized, return those prioritized sizes.
        if(count($product->categories) > 0){
            foreach($product->categories as $category){
                $hasCategoryInTheSizes = ProductPackage::where('category_id', $category->id)->first();
                if($hasCategoryInTheSizes){
                    return ProductPackage::where('category_id', $category->id)->get();
                }
            }
        }

        // return sizes that are not prioritized.
        return ProductPackage::where('category_id', null)->get();
    }

    public function selectableSizes(){
        $category = null;

        return ProductPackage::get();
    }
}