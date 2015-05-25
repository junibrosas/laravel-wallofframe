<?php
namespace Iboostme\Product;

use Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Transaction;
use ProductCategory;
use ProductType;
use ProductBrand;
use ProductStatus;

class ProductRepository {

    public function getAll(){
        return $this->product()->get();
    }
    public function getViews(){
        $products = $this->product()->orderby('views','desc')->where('views', '!=', 0)->get();
        return $products;
    }
    public function getNewArrivals(){
        $query = $this->product();
        return $query;
    }
    public function getWishlist(){
        $products = Product::leftJoin('wishlists', 'products.id', '=', 'wishlists.product_id')
            ->where('wishlists.user_id', Auth::id())
            ->select(DB::raw('products.*'))
            ->get();
        return $products;
    }
    public function getBestSelling(){
        $products = array();

        //TODO:: Transaction will be queried per weekly
        $transactions = Transaction::get();
        foreach($transactions as $transaction){
            foreach(json_decode($transaction->products) as $product){
                $products[] = $product->id; // collect product ids.
            }
        }
        $products = array_count_values($products); // returns an array of product ids
        return Product::whereIn('id', $products);
    }

    public function getHighestSelling(){
        $products = array();

        //TODO:: Transaction will be queried per weekly
        $transactions = Transaction::get();
        foreach($transactions as $transaction){
            foreach(json_decode($transaction->products) as $product_id){
                $products[] = $product_id;
            }
        }

        $products = array_count_values($products);

        $highest = 0;
        foreach($products as $occurrence => $product_id ){
            $current = $occurrence;
            if($current > $highest){
                $highest = $current;
            }

        }

        return Product::find($products[$highest]);
    }
    public function getRelatedProducts( Product $product ){
        $products = Product::leftJoin('product_categories', 'products.category_id', '=', 'product_categories.id')
            ->where('products.category_id', $product->category_id )
            ->take(10)
            ->orderby(DB::raw('rand()'))
            ->select(DB::raw('products.*'))->get();
        return $products;
    }
    public function getProductsByCategory( ProductCategory $category ){
        $query = $this->product()->where('category_id', $category->id);
        return $query;
    }
    public function getProductsByBrand( ProductBrand $brand ){
        $query = $this->product()->where('brand_id', $brand->id);
        return $query;
    }
    public function getProductsByType( ProductType $type ){
        $query = $this->product()->where('type_id', $type->id);
        return $query;
    }
    public function getProductsByStatus( ProductStatus $status ){
        return $this->product()->where('status_id', $status->id);
    }
    public function getByRandom( $take ){
        return $this->product()->orderByRaw("RAND()")->take( $take );
    }

    public function find($id){
        return $this->product()->whereId($id)->first();
    }
    private function product(){
        return Product::with(['status', 'category', 'type'])->where('is_available', '1')->orderBy('created_at', 'DESC');
    }
    public function category($slug){
        return ProductCategory::where('slug', $slug)->first();
    }
    public function type( $slug ){
        return ProductType::where('slug', $slug)->first();
    }
    public function brand( $slug ){
        return ProductBrand::where('slug', $slug)->first();
    }
    public function status( $slug ){
        return ProductStatus::where('slug', $slug)->first();
    }

    //Helpers

    // record a new user view.
    public function setView($id){

        $product = Product::find($id);
        if(!$product)
            return null;

        if( Session::get('post_viewed') && !in_array($id, Session::get('post_viewed')) ){
            $product->views += 1;
            $product->save();
        }
        Session::push('post_viewed', $id);
        Session::put('post_viewed', array_unique(Session::get('post_viewed')));
    }

    // add a new item to product bag
    public function addToBag(Product $product){
        if(is_null(Session::get('product_bag'))){
            Session::put('product_bag', []);
        }

        //compile data to be inserted in the bag item.
        $productBag =[
            'product' => $product->id,
            'package' => $product->package_id
        ];

        Session::push('product_bag', $productBag);
        return Session::get('product_bag');
    }

    // empty a product bag
    public function emptyBag(){
        Session::forget('product_bag');
    }

    // get an image type by size specified.
    public function getImageSizeType( $width, $height ){
        if( $width == $height ){
            return 'square';
        }
        else if ( $width > $height ){
            return 'horizontal';
        }
        else if ( $width < $height ){
            return 'vertical';
        }
    }
} 