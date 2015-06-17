<?php namespace Iboostme\Product;
use Illuminate\Support\Str;
use Laracasts\Presenter\Presenter;
use Iboostme\Product\Wishlist\WishlistRepository;
use Illuminate\Support\Facades\Form;
use ProductCategory;

class ProductPresenter extends Presenter{
    public function url(){
        return route('post.single', [$this->entity->id, $this->entity->slug]);
    }
    public function title(){
        if($this->entity->title){
            $title = preg_replace( "/^\.+|\.+$/", "", $this->entity->title );
            return Str::limit(ucwords($title), 40, '');
        }

        return 'Untitled';

    }
    public function category( $delimiter = ', '){
        $categories = $this->entity->categories;
        if(!$categories){
            return '';
        }
        $categoryStorage = array();
        if(count($categories) > 0){
            foreach($categories as $category){
                $categoryStorage[] = $category->name;
            }
        }
        return implode($delimiter, $categoryStorage);
    }
    public function categories(){
        $ids = array();
        $categories = $this->entity->categories;
        if(count($categories) > 0){
            foreach($categories as $category){
                $ids[] = $category->id;
            }
        }
        return ProductCategory::find($ids);
    }

    public function brand(){
        if($this->entity->brand){
            return ucfirst($this->entity->brand->name);
        }

    }
    public function size(){
        return $this->entity->width . 'x' . $this->entity->height;
    }
    public function price(){
        return $this->entity->price;
    }
    public function priceMark(){
        return "{{ main.currencyConvert(".$this->entity->price.", main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}";
    }
    public function totalAmount(){
        return "{{ main.currencyConvert(".$this->entity->price.", main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}";
    }

    public function totalPrice( $quantity ){
        return $quantity * $this->entity->price;
    }
    public function excerpt($limit = 100){
        $excerpt = $this->entity->content;
        if($this->entity->excerpt){
            $excerpt = $this->entity->excerpt;
        }

        return Str::limit($excerpt, $limit, '');
    }
    public function content(){
        $content = $this->entity->content;
        return $content;
    }
    public function type(){
        return ucfirst($this->entity->type->name) . ' Frame';
    }
    public function status(){
        return $this->entity->status->name;
    }
    public function statusClass(){
        $class = '';
        switch($this->entity->status->slug){
            case 'new':
                $class = '';
                //$class = ' ribbon-green';
                break;
            case 'feature';
                $class = ' ribbon-red';
                break;
        }
        return $class;
    }
    public function wishlistLabel(){
        $repo = new WishlistRepository();
        $output = '';
        if($repo->isExists($this->entity)) {
            $output .= Form::hidden('action', 'remove');
            $output .= '<button class="btn btn-default btn-vivid btn-lg btn-block btn-purchase"><i class="fa fa-heart"></i> Remove to Wishlist</button>';
        }else{
            $output .= Form::hidden('action', 'add');
            $output .= '<button class="btn btn-default btn-vivid btn-lg btn-block btn-purchase"><i class="fa fa-heart"></i> Add to Wishlist</button>';
        }
        return $output;
    }
    public function wishlistDate(){
        return date('m-d-Y', strtotime($this->entity->wishlist->created_at));
    }
    public function imageWithType( $type ){
        return asset('uploads/products/designs/'.$type.'/' . $this->entity->filename);
    }

    // Settings
    public function watermarkColor(){
        if($this->entity->watermark_color){
            return '#'.$this->entity->watermark_color;
        }
    }

    // url based image manipulation cache through Intervention Image
    public function imageCachePreview(){
        return url('images/frame-preview/'.$this->entity->filename);
    }

    public function imageCacheSquare(){
        return url('images/frame-square/'.$this->entity->image);
    }

    public function imageCacheHorizontal(){
        return url('images/frame-horizontal/'.$this->entity->image);
    }

    public function imageCacheVertical(){
        return url('images/frame-vertical/'.$this->entity->image);
    }
}
