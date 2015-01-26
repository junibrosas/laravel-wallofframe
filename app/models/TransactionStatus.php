<?php

class TransactionStatus extends \Eloquent {
	protected $table = 'transaction_statuses';
	protected $fillable = [
		'name',
		'slug'
	];
}