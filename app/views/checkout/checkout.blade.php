@extends('...layout.default')
@section('footer')
    {{ link_js('iboostme/wallofframe/cart.js') }}
@stop
@section('content')
    <section>
        <div class="container checkout">
            {{ Form::open(['route' => 'checkout.order', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form' ]) }}
                <div class="row">
                    <div class="col-md-4">
                        @include('checkout.parts.customer')
                    </div>
                    <div class="col-md-3">
                        @include('checkout.parts.method')
                    </div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-default btn-sm btn-purchase pull-right"> Order Now</button>
                        @include('checkout.parts.summary')
                        <button type="submit" class="btn btn-default btn-sm btn-purchase pull-right"> Order Now</button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </section>

@stop