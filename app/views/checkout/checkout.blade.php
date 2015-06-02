@extends('layout.default')
@section('header')
    @parent
     {{ link_css('js/jqModal/jquery.remodal.css') }}
     <style type="text/css">
        .remodal { max-width: 500px !important; }
     </style>
@stop
@section('footer')
    @parent
    {{ link_js('js/jqModal/jquery.remodal.js') }}
    {{ link_js('iboostme/wallofframe/cart.js') }}
@stop
@section('content')
    <section>
        <div class="container checkout">
            {{ Form::open(['route' => 'checkout.order', 'method' => 'post', 'class' => '', 'role' => 'form' ]) }}
                <div class="row">
                    <div class="col-md-4">
                        @include('checkout.parts.customer')
                    </div>
                    <div class="col-md-3">
                        @include('checkout.parts.method')
                    </div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-default btn-sm btn-purchase pull-right"> Order Now</button>
                        <h2 class="side-heading space-bottom-md">Summary</h2>
                        @include('checkout.parts.summary')
                        <button type="submit" class="btn btn-default btn-sm btn-purchase pull-right"> Order Now</button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </section>



<div class="remodal" data-remodal-id="newShippingAddress">
    <h4>Shipping Address</h4>
        @if(Session::has('shipping_error'))
            <div class="alert alert-danger" role="alert">
                <b>{{ Session::get('shipping_error') }} </b>
                <div class="space-xs"></div>
            </div>
        @endif

        @include('components.forms.ship-alternative-checkout', ['address'=>new ShippingAddress()])
    <br>
</div>
@stop