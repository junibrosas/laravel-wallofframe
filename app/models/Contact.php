<?php
use Illuminate\Support\Facades\Validator;

class Contact extends \Eloquent {
	protected $table = 'contacts';
	protected $rules = [
		'first_name' => 'required',
		'last_name' => 'required',
		'email' => 'required|email',
		'number' => 'alpha_num',
		'message' => 'required|between:10, 500'
	];
	protected $fillable = [
		'first_name',
		'last_name',
		'number',
		'email',
		'company',
		'subject',
		'message'
	];

	public function validate(){
		$validator = Validator::make(Input::all(), $this->rules);
		return $validator;
	}
}