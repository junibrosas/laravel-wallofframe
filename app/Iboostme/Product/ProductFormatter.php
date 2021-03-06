<?php namespace Iboostme\Product;

use Product;
use ProductFrame;
use ProductBackground;
use Iboostme\Product\Wishlist\WishlistRepository;
use Iboostme\Product\Size\ProductSizeRepository;
class ProductFormatter {
    public $wishListRepo;
    public $productSizeRepo;
    public function __construct( WishlistRepository $wishlistRepository, ProductSizeRepository $productSizeRepository){
        $this->wishListRepo = $wishlistRepository;
        $this->productSizeRepo = $productSizeRepository;
    }

    public function bulkFormat( $products ){
        $result = array();
        if(count($products) > 0){
            foreach($products as $i => $product){
                $result[] = $this->format($product);
            }
        }
        return $result;
    }
    public function frameBulkFormat( $list ){
        $result = array();
        if(count($list) > 0){
            foreach($list as $i => $item){
                $result[] = $this->frameFormat($item);
            }
        }
        return $result;
    }

    public function backgroundBulkFormat( $list ){
        $result = array();
        if(count($list) > 0){
            foreach($list as $i => $item){
                $result[] = $this->backgroundFormat($item);
            }
        }
        return $result;
    }

    public function format( Product $product ){
        $result  = [
            'id' => $product->id,
            'url' => $product->present()->url,
            'addToBagUrl' => route('bag.add', $product->id),
            'type_id' => $product->type_id,
            'brand_id' => $product->brand_id,
            'status_id' => $product->status_id,
            'title' => $product->present()->title,
            'category_id' => $product->category_id,
            'categories' => $product->present()->categories,
            'sizes' => $this->productSizeRepo->getSizes($product),
            'category' => $product->present()->category,
            'content' => $product->present()->content,
            'statusClass' => $product->present()->statusClass,
            'status' => $product->present()->status,
            'statusObject' => $product->status,
            'watermarkColor' => $product->present()->watermarkColor,
            'watermarkHex' => $product->watermark_color,
            'is_available' => $product->is_available,
            'isInWishList' => $this->wishListRepo->isExists( $product ),
            'imageSquare' => $product->present()->imageWithType('square'),
            'imageHorizontal' => $product->present()->imageWithType('horizontal'),
            'imageVertical' => $product->present()->imageWithType('vertical'),
        ];

        return $result;
    }
    public function frameFormat( ProductFrame $frame ){
        return [
            'id' => $frame->id,
            'name' => $frame->name ? $frame->name : 'Untitled',
            'slug' => $frame->slug,
            'is_active' => $frame->is_active,
            'image' => $frame->image,
            'imagePath' => asset('uploads/products/frames/' . $frame->image),
            'borderStyle' => $frame->border_style,
            'date' => $frame->created_at,
            'date_human' => $frame->created_at->diffForHumans()
        ];
        return $result;
    }
    public function backgroundFormat( ProductBackground $background ){
        return [
            'id' => $background->id,
            'name' => $background->name,
            'slug' => $background->slug,
            'is_active' => $background->is_active,
            'imagePath' => asset('uploads/products/backgrounds/'.$background->image)
        ];
        return $result;
    }




} 