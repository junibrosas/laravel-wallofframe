<?php
use Product;
Route::get('test', function(){
    /*$slug = 'limited-edition';
    $productRepo = new \Iboostme\Product\ProductRepository();
    $category = $productRepo->category($slug);
    $products = $productRepo->getProductsByCategory( $category )->get();

    trace($products);*/

    trace(Product::find(8)->present()->category);
});
