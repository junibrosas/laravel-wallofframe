<?php
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
class BaseController extends Controller {

	protected $data = [];

	public function __construct() {
		$this->beforeFilter(function()
		{
			//Event::fire('clockwork.controller.start');
		});

		$this->afterFilter(function()
		{
			//Event::fire('clockwork.controller.end');
		});
	}

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

		// data that are usable in every page.
		$oc = Session::get('out_currency');
		JavaScript::put([
			'out_currency' => isset($oc) ? $oc : 'USD'
		]);
		$this->data['categories'] = ProductCategory::get();
		$this->data['bag_items'] = count(Session::get('product_bag'));
	}
}
