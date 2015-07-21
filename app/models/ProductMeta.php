<?php

class ProductMeta extends \Eloquent {
	protected $table = 'product_meta';
	protected $fillable = ['product_id', 'meta', 'value'];

    public function product(){
        return $this->hasOne('Product', 'id', 'product_id');
    }
}