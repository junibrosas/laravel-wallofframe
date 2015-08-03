<?php
namespace Iboostme\Product;

use Illuminate\Support\Collection;
use Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Transaction;
use ProductCategory;
use ProductType;
use ProductBrand;
use ProductStatus;
use ProductPackage;
use ProductPivotCategory;
use ProductMeta;
use Attachment;

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
        return Product::leftJoin('product_pivot_categories', 'products.id', '=', 'product_pivot_categories.product_id')
            ->leftJoin('product_categories', 'product_pivot_categories.product_category_id', '=', 'product_categories.id')
            ->where('product_pivot_categories.product_category_id', $category->id)
            ->select(DB::raw('products.*'));
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

    // create new product
    public function create( Attachment $attachment, Collection $categories, $input){

        // store to database.
        $product = new Product();
        $product->status_id = $this->status('published')->id;
        $product->brand_id = array_get($input, 'brand_id') ? $this->brand(array_get($input, 'brand_id'))->id : '';
        $product->filename = $attachment->filename;
        $product->attachment_id = $attachment->id;
        $product->title = array_get($input, 'title') ? array_get($input, 'title') : $attachment->name;
        $product->content = array_get($input, 'content') ? array_get($input, 'content') : '';
        $product->slug = Str::slug( $product->title );
        $product->is_available = 1;
        $product->save();


        // create new product categories
        if(count($categories) > 0){
            foreach($categories as $category){
                $productPivotCategory = new ProductPivotCategory();
                $productPivotCategory->product_id = $product->id;
                $productPivotCategory->product_category_id = $category->id;
                $productPivotCategory->save();
            }
        }


        // create new custom sizes

        if(isset($input['sizes'])){
            $this->removeAndAddSizes($product->id, $input['sizes']);
        }


        return $product;
    }

    // updated a product
    public function update($input){
        $product_id = $input['id'];
        $input['slug'] = Str::slug(array_get($input, 'title'));
        $isUpdated = Product::find( $product_id )->update( $input );


        // current product categories delete
        $categories = $input['categories'];
        ProductPivotCategory::where('product_id', $product_id )->delete();

        // create new product categories
        if(count($categories) > 0){
            foreach($categories as $category){
                $productPivotCategory = new ProductPivotCategory();
                $productPivotCategory->product_id = $product_id;
                $productPivotCategory->product_category_id = $category['id'];
                $productPivotCategory->save();
            }
        }

        // create new custom sizes
        if(isset($input['sizes'])){
            $this->removeAndAddSizes($product_id, $input['sizes']);
        }

        return $isUpdated;
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

    public function removeAndAddSizes( $product_id, $sizes ){
        // remove first existing rows
        ProductMeta::where('product_id', $product_id )->where('meta', 'product_packages_id')->delete();

        //save custom product sizes
        $sizesSelected = ProductPackage::find(array_fetch($sizes, 'id'));
        if($sizesSelected && count($sizesSelected) > 0){
            foreach($sizesSelected as $sizes){
                $meta = new ProductMeta();
                $meta->product_id = $product_id;
                $meta->meta = 'product_packages_id';
                $meta->value = $sizes->id;
                $meta->save();
            }
        }

    }
} 