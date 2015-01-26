<?php namespace Iboostme\Product\Brand;
use Laracasts\Presenter\Presenter;

class BrandPresenter extends Presenter {
    public function url(){
        return route('brand', [ $this->entity->id, $this->entity->slug ]);
    }
    public function image(){
        return asset('uploads/brands/'.$this->entity->image);
    }
} 