<?php namespace Iboostme\Product\Search;

use Iboostme\Product\ProductRepository;
use Product;

class SearchRepository {
    protected $productRepo;
    public function __construct( ProductRepository $productRepository ){
        $this->productRepo = $productRepository;
    }

    public function search($input){
        $keyword = array_get($input, 'keyword');
        $priceMin = array_get($input, 'price_min');
        $priceMax = array_get($input, 'price_max');

        $categoryIds = $this->getCategoryIds( array_get($input, 'category') ); // array of category
        $typeIds = $this->getTypeIds( array_get($input, 'type') );

        // Advanced Searching
        return Product::where( function( $query ) use ( $keyword, $categoryIds, $typeIds, $priceMin, $priceMax ) {
            if($keyword){
                $query->where( function($q) use ($keyword){
                    $q->where('title', 'like', "$keyword%")->orWhere('content', 'like', "$keyword%");
                });
            }
            if($priceMin > 0){
                $query->whereRaw('products.price >= '.$priceMin)->whereRaw('products.price <= '.$priceMax);
            }

            if($categoryIds)
                $query->whereIn('category_id', $categoryIds);
            if($typeIds)
                $query->whereIn('type_id', $typeIds);
        });
    }


    // retrieve ids by specifying slugs
    private function getCategoryIds( $slugs ){
        $data = array();
        if( count( $slugs ) > 0 ){
            foreach($slugs as $slug){
                $data[] = $this->productRepo->category( $slug )->id;
            }
        }
        return $data;
    }

    // retrieve ids by specifying slugs
    private function getTypeIds( $slugs ){
        $data = array();
        if( count( $slugs ) > 0 ){
            foreach($slugs as $slug){
                $data[] = $this->productRepo->type( $slug )->id;
            }
        }
        return $data;
    }
} 