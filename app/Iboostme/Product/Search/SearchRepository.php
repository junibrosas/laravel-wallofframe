<?php namespace Iboostme\Product\Search;

use Iboostme\Product\ProductRepository;
use Product;

class SearchRepository {
    public function search($input){

        $repo = new ProductRepository();
        $categoryId = isset( $input['category']) ?  $repo->category($input['category'])->id : '';
        $typeId = isset($input['type']) ? $repo->type($input['type'])->id : '';
        $keyword = isset($input['keyword']) ? $input['keyword']: '';
        $priceMin = isset($input['price_min']) ? $input['price_min']: 0;
        $priceMax = isset($input['price_max']) ? $input['price_max']: 0;



        // Advanced Searching
        return Product::where( function( $query ) use ( $keyword, $categoryId, $typeId, $priceMin, $priceMax ) {
            if($keyword){
                $query->where( function($q) use ($keyword){
                    $q->where('title', 'like', "$keyword%")->orWhere('content', 'like', "$keyword%");
                });
            }
            if($priceMin > 0){
                $query->whereRaw('products.price >= '.$priceMin)->whereRaw('products.price <= '.$priceMax);
            }
            if($categoryId)
                $query->where('category_id', $categoryId);
            if($typeId)
                $query->where('type_id', $typeId);
        });
    }
} 