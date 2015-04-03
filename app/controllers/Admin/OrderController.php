<?php
namespace Admin;
use Iboostme\Formatter\TransactionFormatter;
use Iboostme\Formatter\UserFormatter;
use Iboostme\Product\ProductFormatter;
use Iboostme\Product\ProductRepository;
use Iboostme\Transaction\TransactionRepository;
use Iboostme\Product\Cart\CartRepository;
use Iboostme\Transaction\TransactionStatusRepository;
use Iboostme\User\UserRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Transaction;

class OrderController extends \BaseController{
    public $transactionRepo;
    public $cartRepo;
    public $transactionStatusRepo;
    public $productRepo;
    public $productFormat;
    public $userRepo;
    public function __construct( TransactionRepository $transactionRepository,
                                 CartRepository $cartRepository,
                                 TransactionStatusRepository $transactionStatusRepository,
                                 ProductRepository $productRepository,
                                 ProductFormatter $productFormatter, UserRepository $userRepository ){
        $this->transactionRepo = $transactionRepository;
        $this->cartRepo = $cartRepository;
        $this->transactionStatusRepo = $transactionStatusRepository;
        $this->productRepo = $productRepository;
        $this->productFormat = $productFormatter;
        $this->userRepo = $userRepository;
    }


    // Retrieves all the orders from an administrator's perspective.
    public function orders(){
        $format = new TransactionFormatter();
        $transactions = $this->transactionRepo->getTransactions();

        $orders = $format->bulkFormat(  $transactions );

        $this->data['orders'] = $orders;
        $this->data['pageTitle'] = 'Orders';

        return View::make('admin.orders', $this->data);
    }

    // Retrieve a single order
    public function order( $trackingNumber ){
        $order = $this->transactionRepo->getByTrackingNumber( $trackingNumber ); // retrieve a single order
        $products = $this->cartRepo->getCartItems( json_decode($order->products) ); // retrieve products from this order.
        $total_amount = $order->present()->totalAmount; // products with quantity property

        $this->data['total_amount'] = $total_amount;
        $this->data['order'] = $order;
        $this->data['products'] = $products;
        $this->data['pageTitle'] = 'Order ' . $order->tracking_number;
        return View::make('admin.order', $this->data);
    }

    // Creates a new order.
    public function newOrder(){
        $userFormat = new UserFormatter();
        $products = $this->productRepo->getAll();
        $users = $this->userRepo->getCustomers();


        $this->data['pageTitle'] = 'New Order'; // give page a title
        JavaScript::put([
            'users' => $userFormat->bulkFormat($users),
            'paymentMethods' => \PaymentMethod::get(),
            'products' => $this->productFormat->bulkFormat($products)

        ]);

        return View::make('admin.order-new', $this->data);
    }


    // change order status by bulk action.
    public function postBulkActions(){
        $transactions = Input::get('transactions'); $actions = Input::get('bulk_action');
        if(!$transactions) return Redirect::back()->with('error', 'No transactions has been selected.');
        if(!$actions) return Redirect::back()->with('error', 'No action has been selected.');

        // Change status
        $this->transactionStatusRepo->changeStatus( Input::get('transactions'), Input::get('bulk_action') );

        return Redirect::back()->with('success', DONE);
    }

    // store a new order
    public function postStoreNewOrder(){
        $user = Input::get('user');
        $paymentMethod = Input::get('paymentMethod');
        $shipmentAddress = Input::get('shipmentAddress');
        $products = Input::get('products');

        if(!isset($user['id'])) return ['status' => 'error', 'message' => 'Please select a buyer.'];

        if(!isset($paymentMethod['id'])) return ['status' => 'error', 'message' => 'Please select a payment method.'];

        if(!isset($shipmentAddress['id'])) return ['status' => 'error', 'message' => 'Please select a shipping address.'];

        if(count($products) <= 0) return ['status' => 'error', 'message' => 'Please select a product(s).'];

        // clone the product id depending on the quantity.
        $productIds = array();
        foreach($products as $product){
            if(isset($product['quantity'])){
                for($i = 0; $i < $product['quantity']; $i++){
                    $productIds[] = $product['id'];
                }
            }
        }

        // Saves a new transaction.
        $transaction['user_id'] = $user['id'];
        $transaction['payment_method_id'] = $paymentMethod['id'];
        $transaction['shipping_address_id'] = $shipmentAddress['id'];
        $transaction['productIds'] = $productIds;

        $this->transactionRepo->newTransaction( $transaction );

        return [ 'status' => 'success', 'message' => 'Saved successfully.'];
    }
} 