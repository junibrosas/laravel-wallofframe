@extends('layout.default')

@section('content')
    <section>
        <div class="container">
            <div class="row sell border-bottom space-sm">
                <div class="col-md-5">
                    <img src="{{ asset('img/frames/wallframe1.jpg')}}" alt="" class="img-responsive elem-center"/>
                    <ul class="list-inline space-sm">
                        <li><a href="#"><img src="{{ asset('img/frames/smallframe1.jpg')}}" alt=""/></a></li>
                        <li><a href="#"><img src="{{ asset('img/frames/smallframe1.jpg')}}" alt=""/></a></li>
                        <li><a href="#"><img src="{{ asset('img/frames/smallframe1.jpg')}}" alt=""/></a></li>
                    </ul>
                    <div role="tabpanel" class="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                            {{--<li role="presentation"><a href="#delivery" aria-controls="profile" role="tab" data-toggle="tab">Delivery</a></li>
                            <li role="presentation" ><a href="#returns" aria-controls="messages" role="tab" data-toggle="tab">Returns</a></li>--}}
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                {{ $product->present()->content }}
                            </div>
                            {{--<div role="tabpanel" class="tab-pane" id="delivery">...</div>
                            <div role="tabpanel" class="tab-pane " id="returns">
                            <p> You have 28 days, from receipt of cancellable goods, to notify the seller if you wish to cancel your order or exchange an item.</p>
                                                            <p>Please note: goods that are personalised, bespoke or made-to-order to your specific requirements, perishable products and personal items sold with a hygiene seal (cosmetics, underwear) in instances where the seal is broken are non-refundable, unless faulty.</p>
                                                            <p>Read more about our returns policy. Should you choose to return or exchange your order you will need to deliver the item(s) to the UK, where this seller is based.</p>
                            </div>--}}
                        </div>

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="border-bottom clearfix heading">
                        <h2 class="title"><a href="{{ $product->present()->url }}">{{ $product->present()->title }}</a></h2>
                        <div class="row">
                            <div class="col-md-3 no-pad-right">
                            <h3 class="price">{{ $product->present()->price }} <span>AED</span></h3>
                            </div>
                            {{--<div class="col-md-9">
                                <ul class="list-inline stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </ul>
                                5 customer reviews
                            </div>--}}
                        </div>
                    </div>
                    <div class="description border-bottom">
                        {{ $product->present()->excerpt }}
                    </div>
                    <div>
                        <div class="clearfix">
                            @include('components.buttons.sharing')
                        </div>
                        {{--<form action="#" class="">
                            <div class="form-group">
                                <label for="usr">Size:</label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 no-pad-left">
                                <label for="usr">Quantity:</label>
                                <input type="text" class="form-control " id="usr" name="quantity" value="1">
                            </div>
                            <div class="text-center col-md-10 no-pad">
                                <button class="btn btn-default btn-lg btn-block btn-purchase"><i class="fa fa-shopping-cart"></i> Purchage</button>
                            </div>
                        </form>--}}
                        <a href="{{ $product->present()->url }}" class="btn btn-default btn-lg btn-block btn-purchase"><i class="fa fa-eye"></i> View</a>
                    </div>
                    <div class="col-md-12 space-sm  no-pad">
                        @include('posts.fragments.recommended')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{--@include('posts.popular')--}}
                </div>
            </div>
        </div>
    </section>
@stop