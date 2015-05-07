<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/1/2015
 * Time: 12:14 PM
 */

namespace Iboostme\Checkout;

use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
class CheckoutRepository {

    public function removeSessions(){
        Session::forget('billingAddress');
        Session::forget('paymentMethodId');
        Cart::destroy();
    }
} 