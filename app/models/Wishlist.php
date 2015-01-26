<?php

class Wishlist extends \Eloquent {
	protected $table = 'wishlists';
	protected $fillable = ['user_id', 'product_id'];


	public function user(){
		return $this->hasOne('User', 'id', 'user_id');
	}
	public function product(){
		return $this->hasOne('Product', 'id', 'product_id');
	}
}