<?php
// Product
Route::group( ['prefix' => '/'], function () {
    Route::get('preview/{id}/{slug?}', ['as' => 'post.single', 'uses' => 'ProductController@index' ]);

    Route::get('best-selling', ['as' => 'selling', 'uses' => 'ProductController@getBestSelling' ]);
    Route::get('category/{slug}', ['as' => 'category', 'uses' => 'ProductController@getByCategory' ]);
    Route::get('type/{slug}', ['as' => 'browse.type', 'uses' => 'ProductController@getByType' ]);
    Route::get('new-arrivals', ['as' => 'arrivals', 'uses' => 'ProductController@getNewArrivals' ]);
    Route::get('brands', ['as' => 'brands', 'uses' => 'ProductController@getBrands' ]);
    Route::get('brands/{id}/{slug}', ['as' => 'brand', 'uses' => 'ProductController@getByBrands' ]);
    Route::post('changeCurrency', ['as' => 'currency.change', 'uses' => 'ProductController@getCurrencyAndChange' ]);
});

// Product Search
Route::group( ['prefix' => 'product/search', 'namespace' => 'Product'], function () {
    Route::get('/', ['as' => 'search.get', 'uses' => 'SearchController@getSearch' ]);
});


// Product API
Route::group( ['prefix' => 'api/product', 'namespace' => 'Api'], function () {
    Route::get('new-arrivals', ['as' => 'product.api.arrivals', 'uses' => 'ProductAPIController@getNewArrivals' ]);
    Route::get('best-selling', ['as' => 'product.api.bestSelling', 'uses' => 'ProductAPIController@getBestSelling' ]);
    Route::get('category/{slug}', ['as' => 'product.api.category', 'uses' => 'ProductAPIController@getCategory' ]);
    Route::get('type/{slug}', ['as' => 'product.api.type', 'uses' => 'ProductAPIController@getByType' ]);
    Route::get('brand/{slug}', ['as' => 'product.api.brand', 'uses' => 'ProductAPIController@getByBrand' ]);
    Route::get('search', ['as' => 'product.api.search', 'uses' => 'ProductAPIController@getBySearch' ]);


    // for admin only
    Route::get('status', ['before' => 'auth.admin.only', 'as' => 'product.api.status', 'uses' => 'ProductAPIController@getByStatus' ]);
    Route::get('frame-navigation', ['before' => 'auth.admin.only', 'as' => 'product.api.nav', 'uses' => 'ProductAPIController@getFrameNavigation' ]);

});
