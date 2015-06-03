<?php
use Iboostme\Product\Cart\CartRepository;
use Iboostme\User\Customer\ShippingAddressRepository;
use Iboostme\Email\EmailRepository;
use Iboostme\Transaction\TransactionRepository;
use Iboostme\Checkout\CheckoutRepository;
class CheckoutController extends \BaseController {
	public $cartRepo;
	public $shippingRepo;
	public $emailRepo;
	public $checkoutRepo;

	public function __construct(CartRepository $cartRepo,
								CheckoutRepository $checkoutRepository,
								ShippingAddressRepository $shippingRepo,
								EmailRepository $emailRepo){
		$this->cartRepo = $cartRepo;
		$this->shippingRepo = $shippingRepo;
		$this->emailRepo = $emailRepo;
		$this->checkoutRepo = $checkoutRepository;
	}
	public function index()
	{
		if( Cart::count() < 1 )  return Redirect::route('cart.index')->with('error', CHECKOUT_EMPTY_BAG);



		$products = Cart::content();
		$total_amount = Cart::total(); // products with quantity property

		$this->data['user'] = Auth::user();
		$this->data['total_amount'] = $total_amount;
		$this->data['products'] = $products;

		return View::make('checkout.checkout', $this->data);
	}

	public function getShippingForm(){
		if( Auth::check() ) return Redirect::route('checkout.cart');

		// set a redirection url after login is successful.
		Session::put('redirectAfterLogin', route('checkout.cart'));

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

		if(!$user->id) return Redirect::back()->withInput()->with('error', 'Unable to create a new user. Please try again.');

		// sending email about new user
		$emailRepo = new \Iboostme\Email\EmailRepository();
		$emailRepo->newUser($user);

		// Manually Logging In User
		Auth::login($user);

		return Redirect::route('checkout.cart')->with('success', CHECKOUT_ADDED_ADDRESS);
	}


	// process new orders
	public function postOrder(){
		if( !$this->shippingRepo->hasAddresses( Auth::user() ))  return Redirect::route('checkout.cart',['#newShippingAddress'])->with('shipping_error', CHECKOUT_EMPTY_ADDRESS);

		$inputs =  Input::all();

		Session::put('billingAddress', $inputs['billingAddress']);
		Session::put('paymentMethodId', PaymentMethod::getIdBySlug( Input::get('paymentMethod')) );

		if(  $inputs['paymentMethod'] == 'paypal' ){
			return Redirect::route('paypal.payment');
		}
		else if($inputs['paymentMethod'] == 'cash-on-delivery'){
			// add a new transaction
			$repo = new TransactionRepository();
			$transaction = $repo->add();

			//add transaction currency that is used.
			$transaction->currency = $this->outCurrency;

			// remove sessions
			$this->checkoutRepo->removeSessions();

			// send email confirmation to both admin and user
			$this->emailRepo->newOrder( $transaction );

			return Redirect::route('customer.track.order')
				->with('success', TRANSACTION_COMPLETE);
		}
		return Redirect::back()->with('error', 'Unexpected Error: You have not selected a payment method');
	}
}