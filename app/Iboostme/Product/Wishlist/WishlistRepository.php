<?php
namespace Iboostme\Product\Wishlist;

use Wishlist;
use Product;
use Illuminate\Support\Facades\Auth;

class WishlistRepository {
    public function add( Product $product ){
        Wishlist::create([
            'product_id' => $product->id,
            'user_id' => Auth::id()
        ]);
    }
    public function remove( Product $product ){
        $wishlist = $this->getWishList( $product );
        $wishlist->delete();
    }

    public function isExists( Product $product ){
        $wishlist = $this->getWishList( $product );
        if( $wishlist )
            return true;
        return false;
    }

    private function getWishList( Product $product ){
        return Wishlist::where('product_id', $product->id)->where('user_id', Auth::id())->first();
    }
} 