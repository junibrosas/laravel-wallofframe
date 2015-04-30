<?php
use Iboostme\Product\Cart\CartRepository;
use Iboostme\User\Customer\ShippingAddressRepository;
use Iboostme\Email\EmailRepository;
use Iboostme\Transaction\TransactionRepository;
class CheckoutController extends \BaseController {
	public $cartRepo;
	public $shippingRepo;
	public $emailRepo;

	public function __construct(CartRepository $cartRepo,
								ShippingAddressRepository $shippingRepo,
								EmailRepository $emailRepo){
		$this->cartRepo = $cartRepo;
		$this->shippingRepo = $shippingRepo;
		$this->emailRepo = $emailRepo;
	}
	public function index()
	{
		if( $this->cartRepo->isCartEmpty() )  return Redirect::route('cart.index')->with('error', CHECKOUT_EMPTY_BAG);

		if( !$this->shippingRepo->hasAddresses( Auth::user() ))  return Redirect::route('cart.index')->with('error', CHECKOUT_EMPTY_ADDRESS);

		$products = $this->cartRepo->getCartItems( Session::get('product_bag') );
		$total_amount = $this->cartRepo->getTotalAmount( $products ); // products with quantity property

		$this->data['user'] = Auth::user();
		$this->data['total_amount'] = $total_amount;
		$this->data['products'] = $products;

		return View::make('checkout.checkout', $this->data);
	}

	public function getShippingForm(){
		if( Auth::check() ) return Redirect::route('checkout.cart');

		$this->data['heading'] = 'Shipping Information';
		$this->data['pageTitle'] = $this->data['heading'];
		return View::make('checkout.shipping', $this->data);
	}

	public function postShipping(){
		$input = Input::all();
		$rules = array(
			'email' => 'required|email|unique:users',
			'mobile_number' => 'required|numeric',
			'first_name' => 'required', 'last_name' => 'required', 'address' => 'required',
		);

		// validate
		$validator = Validator::make($input, $rules);
		if($validator->fails())
			return Redirect::back()->withInput()->withErrors( $validator );


		// add new user
		$user = $this->shippingRepo->addUser( $input );

		// Manually Logging In User
		Auth::login($user);

		return Redirect::route('checkout.cart')->with('success', CHECKOUT_ADDED_ADDRESS . ' Be noticed that your username is '. $user->username .'and your temporary password is your email address. ' );
	}

	public function postOrder(){
		$inputs =  Input::all();
		Session::put('billingAddress', $inputs['billingAddress']);
		Session::put('paymentMethodId', PaymentMethod::getIdBySlug( Input::get('paymentMethod')) );

		if(  $inputs['paymentMethod'] == 'paypal' ){
			return Redirect::route('paypal.payment');
		}
		else if($inputs['paymentMethod'] == 'cash-on-delivery'){
			$repo = new TransactionRepository();
			$repo->add(); // add a new transaction

			return Redirect::route('customer.track.order')
				->with('success', 'Transaction has been completed.');
		}
		die();
		return Redirect::back()->with('error', 'Unexpected Error: You have not selected a payment method');
	}
}