<?php
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Transaction extends \Eloquent {
	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'transactions';
	protected $presenter = 'Iboostme\Transaction\TransactionPresenter';
	protected $dates = ['deleted_at'];
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

	// create a list of statuses
	public static function listStatus(){
		$list[''] = "Bulk Action";
		if(Request::segment(3) == 'archive'){
			$list['restore'] = 'Restore';
		}else{

			foreach( TransactionStatus::get() as $status ){
				$list[$status->slug] = $status->name;
			}
			$list['move-archive'] = "Move to Archive";
		}



		return $list;
	}

	// create a list of filters
	public static function listFilter(){
		$list = array();
		$list[''] = "Filter Display";
		foreach( TransactionStatus::get() as $status ){
			$list[$status->slug] = $status->name;
		}
		$list['archive'] = "Archive";

		return $list;
	}
}