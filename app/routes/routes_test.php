<?php
Route::get('test', function(){
    $products = Product::all();
    foreach($products as $product){
        $pivotCategory = new ProductPivotCategory();
        $pivotCategory->product_category_id = $product->category_id;
        $pivotCategory->product_id = $product->id;
        $pivotCategory->save();
    }

});
