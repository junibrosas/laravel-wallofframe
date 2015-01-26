<?php namespace Payment;
use Iboostme\Product\Cart\CartRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use Iboostme\Transaction\TransactionRepository;


class PaypalController extends \BaseController {
	private $_api_context;

	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function postPayment(){
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$cartRepo  = new CartRepository();
		$products = $cartRepo->getCartItems( Session::get('product_bag') );
		$items = array();
		$total_amount = $cartRepo->getTotalAmount( $products );

		if($products->count() > 0){
			// get items
			foreach( $products as $product ){
				$item = new Item();
				$item->setName( $product->present()->title ) // item name
				->setCurrency('USD')
					->setQuantity( $product->quantity )
					->setSku($product->id)
					->setPrice( $product->price ); // unit price

				$items[] = $item;
			}
		}

		// add item to list
		$item_list = new ItemList();
		$item_list->setItems( $items );

		$amount = new Amount();
		$amount->setCurrency('USD')
			->setTotal($total_amount);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Your transaction description');

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(URL::route('paypal.payment.status'))
			->setCancelUrl(URL::route('paypal.payment.status'));

		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				trace($err_data);
				exit;
			} else {
				die('Some error occur, sorry for inconvenient');
			}
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		Session::put('paypal_payment_id', $payment->getId());

		if(isset($redirect_url)) {
			// redirect to paypal
			return Redirect::away($redirect_url);
		}

		return Redirect::route('original.route')
			->with('error', 'Unknown error occurred');
	}

	public function getPaymentStatus(){
		// Get the payment ID before session clear
		$payment_id = Session::get('paypal_payment_id');

		// clear the session payment ID
		Session::forget('paypal_payment_id');
		$payer_id = Input::get('PayerID');
		$token = Input::get('token');
		if (empty($payer_id) || empty($token)) {
			return Redirect::route('checkout.cart')
				->with('error', 'Payment failed');
		}

		$payment = Payment::get($payment_id, $this->_api_context);

		// PaymentExecution object includes information necessary
		// to execute a PayPal account payment.
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(Input::get('PayerID'));

		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);

		if ($result->getState() == 'approved') { // payment made

			// process payment
			$this->saveTransaction( json_decode($result) );
			$this->removeSessions();

			return Redirect::route('customer.track.order')
				->with('success', 'Payment success');
		}
		return Redirect::route('checkout.cart')
			->with('error', 'Payment failed');
	}

	private function saveTransaction( $result ){
		$repo = new TransactionRepository();
		$data['payment_response'] = json_encode( $result );
		$repo->add( $data );
	}

	private function removeSessions(){
		Session::forget('billingAddress');
		Session::forget('paymentMethodId');
		Session::forget('product_bag');
	}
}