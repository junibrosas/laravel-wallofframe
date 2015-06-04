@extends('layout.default')
@section('content')
    <section ng-controller="CartController">
        <div class="container cart">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="side-heading">Shopping Bag</h2>
                    <div class="row">
                         <div class="col-md-12">
                            @include('components.tables.table-cart')
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2 class="side-heading">Summary</h2>
                    <div class="row cart-total">
                        <div class="col-xs-6 side">
                            <div class="cart-title">Total incl. all taxes</div>
                            <div>Shipping</div>
                        </div>
                        <div class="col-xs-6 side">
                            <div class="cart-value">@{{ main.currencyConvert( totalAmount , main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}</div>
                            <div>Free</div>
                        </div>
                    </div>
                    <div class="row cart-amount">
                        <div class="col-xs-6">
                            <div class="cart-title">Final Total</div>
                        </div>
                        <div class="col-xs-6">
                             <div class="cart-value">@{{ main.currencyConvert( totalAmount , main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}</div>
                        </div>
                    </div>
                    @if( count($products) > 0 )
                        <div class="row cart-buttons">
                            <div class="col-md-6">
                                <a href="{{ $continueShoppingUrl }}" class="btn btn-default btn-vivid btn-sm btn-block btn-purchase"><i class="fa fa-shopping-cart"></i> Continue Shopping</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-default btn-sm btn-block btn-purchase" ng-click="checkout(tableData)">
                                    <i class="fa fa-check"></i> Secure Checkout
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-unstyled space-sm">
                                <li>30 DAYS FREE RETURNS</li>
                                <li>SECURE PAYMENT</li>
                                <li>CASH ON DELIVERY</li>
                                <li>CONTACT US at {{ Config::get('site.contact_email') }}</li>
                            </ul>
                            <h5>AVAILABLE PAYMENT METHODS</h5>
                            <div class="row">
                                <?php
                                $methods = PaymentMethod::get();
                                $methods->each(function( $method ){ ?>
                                    <div class="col-md-6" style="padding-right: 0">
                                        <img src="{{ asset('img/payments/'.$method->image) }}" alt="{{ $method->name }} Method" class="img-responsive" style="margin: auto 0;"/>
                                    </div>
                                <?php });
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop