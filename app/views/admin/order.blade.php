@extends('layout.admin')

@section('content')
<div class="row">
    <div class="orders col-md-12">
        <div class="logo pull-left">
            <a href="{{ route('home.index') }}"><img src="{{ asset('img/logo.png') }}"></a>
        </div>
        <div class="pull-right text-right space-top-sm">
            <h4><b>Tracking Number</b></h4>
            <span>#{{ $order->present()->trackingNumber }} </span> <br/>
            <span>{{ date('F d, Y', strtotime( $order->created_at )) }}</span> <br/>
        </div>
        <div class="clearfix"></div>

        {{--Shipping Address--}}
        <div class="">
            <p class="lead">Shipping Address</p>
            <p style="font-weight: bold; font-size: 16px;">{{ $order->user->present()->name }}</p>
            <address class="margin-none">
                {{ $order->present()->shippingAddress }}
            </address>
        </div>

        @include('components.tables.table-summary')

        <div class="row">
            <div class="amount col-md-6 col-md-offset-6">
                <div class="row">
                    <div class="col-xs-6"><h6>Shipping</h6></div>
                    <div class="col-xs-6"><h6>Free</h6></div>
                </div>
                <div class="row">
                    <div class="col-xs-6">Subtotal</div>
                    <div class="col-xs-6">{{ ngTotalAmount($total_amount) }}</div>
                </div>
                <div class="row bg-info total">
                    <div class="col-xs-6"><b>Total</b></div>
                    <div class="col-xs-6 "><b>{{ ngTotalAmount($total_amount) }}</b></div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop