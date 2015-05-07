<?php
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
class BaseController extends Controller {

	protected $data = [];
	protected $outCurrency;

	public function __construct() {

	}

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

		// data that are usable in every page.
		$oc = Session::get('out_currency');
		$this->outCurrency = isset( $oc ) ? $oc : 'AED';
		JavaScript::put([
			'out_currency' => $this->outCurrency,
			'cartTotalItems' => Cart::count()
		]);
		$this->data['categories'] = ProductCategory::get();
	}
}
