@extends('layout.admin')

@section('content')

<div>
    <div class="logo pull-left">
        <a href="{{ route('home.index') }}"><img src="{{ asset('img/logo.png') }}"></a>
    </div>
    <div class="pull-right">
        <span>#{{ $order->present()->trackingNumber }} </span> <br/>
        <span>{{ date('F d, Y', strtotime( $order->created_at )) }}</span>
    </div>
    <div class="clearfix"></div>

    @include('components.tables.table-invoice-header')

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

@stop