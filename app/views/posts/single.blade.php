@extends('layout.default')
@section('header')
    <meta property="og:title" content="{{ $product->present()->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="{{ $product->present()->url }}" />
    <meta property="og:description" content="{{ $product->present()->excerpt }}" />
@stop
@section('footer')
    @parent
    {{ link_js('assets/elevatezoom/jquery.elevateZoom-3.0.8.min.js') }}
    {{ link_js('iboostme/wallofframe/elevate.js') }}
    {{ link_js('iboostme/wallofframe/frame.js') }}
    
@stop
@section('content')
    <section>
        <div class="container">
            <div class="row sell space-sm">
                <div class="col-md-8">
                    <div class="row" ng-controller="FrameAppController">
                        @include('listing.frame')
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="detail">
                        <div style="min-height: 43px">
                            <h4 class="title"><a href="{{ $product->present()->url }}">{{ $product->present()->title }} <span>{{ $product->present()->size }}</span></a></h4>
                            <div class="subhead">{{ $product->present()->type }}</div>
                        </div>
                        <div class="price"><a href="#"><i class="fa fa-tag"></i> {{ $product->present()->priceMark }}</a></div>
                    </div>
                    <div class="description">
                        {{ Str::limit($product->present()->content, 280  ) }}
                    </div>
                    <a href="{{ route('bag.add', $product->id) }}" class="btn btn-default btn-lg btn-block btn-purchase"> Add to Bag</a>
                    {{ Form::open(['route' => 'customer.wishlist.add', 'method' => 'get']) }}
                        {{ Form::hidden('product', $product->id) }}
                        {{ $product->present()->wishlistLabel() }}
                    {{ Form::close() }}
                    <div class="clearfix">
                        @include('components.buttons.sharing')
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('posts.related')
                </div>
            </div>
        </div>
    </section>
@stop