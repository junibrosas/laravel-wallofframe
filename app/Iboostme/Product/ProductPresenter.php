<?php namespace Iboostme\Product;
use Illuminate\Support\Str;
use Laracasts\Presenter\Presenter;
use Iboostme\Product\Wishlist\WishlistRepository;
use Illuminate\Support\Facades\Form;

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
    public function category(){
        return ucfirst($this->entity->category->name);
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
                $class = ' ribbon-green';
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
    public function image( $type = '' ){
        if($type)
            $type = $this->entity->image_type;

        if( !$this->entity->image )
            return asset('img/frame1.jpg');

        if($type){
            return asset('uploads/products/designs/'.$type.'/' . $this->entity->image);
        }

        return asset('uploads/products/designs/thumbs/' . $this->entity->image);
    }
    public function imageWithType( $type ){
        return asset('uploads/products/designs/'.$type.'/' . $this->entity->image);
    }
    public function imagePreview(){
        return asset('uploads/products/designs/preview/' . $this->entity->image);
    }
    public function imageType(){
        return $this->entity->image_type;
    }
    public function imageOriginalType(){
        return $this->entity->image_original_type;
    }

    // url based9 image manipulation cache through Intervention Image
    public function imageCachePreview(){
        return url('images/frame-medium/', $this->entity->image);
    }
}
