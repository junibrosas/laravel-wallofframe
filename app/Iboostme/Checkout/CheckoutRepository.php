<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/1/2015
 * Time: 12:14 PM
 */

namespace Iboostme\Checkout;


class CheckoutRepository {
    public function removeSessions(){
        Session::forget('billingAddress');
        Session::forget('paymentMethodId');
        Session::forget('product_bag');
    }
} 