<?php
use Laracasts\Presenter\PresentableTrait;
class Transaction extends \Eloquent {
	use PresentableTrait;

	protected $table = 'transactions';
	protected $presenter = 'Iboostme\Transaction\TransactionPresenter';
	protected $fillable = [
		'user_id',
		'tracking_number',
		'payment_method_id',
		'transaction_status_id',
		'total_amount',
		'products',
		'payment_response',
		'shippingAddress'
	];

	public function user(){
		return $this->hasOne('User', 'id', 'user_id');
	}



	public function transactionStatus(){
		return $this->hasOne('TransactionStatus', 'id', 'transaction_status_id');
	}

	public function paymentMethod(){
		return $this->hasOne('PaymentMethod', 'id', 'payment_method_id');
	}
}