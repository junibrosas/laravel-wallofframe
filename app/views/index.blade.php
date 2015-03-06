@extends('layout.default')
@section('footer')
    {{ link_js('assets/rwdImageMaps/jQuery.rwdImageMaps.js') }}
    <script>
        $(function(){
            $('img[usemap]').rwdImageMaps();
            $('.owl-spotlight').owlCarousel({
                autoPlay: 5000,
                navigation : false, // Show next and prev buttons
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem:true
            });
        });
    </script>
@stop
@section('content')
    <!-- Header -->
    <!-- Spotlight Images -->
    @include('components.carousels.carousel-main')

    <section id="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="">
                    <img id="Image-Maps-Com-image-maps-2015-01-09-040324" src="http://www.image-maps.com/m/private/0/15c0pofi2us334m2ehadpbuaa6_fullframe.jpg" border="0" width="1050" height="931" orgWidth="1050" orgHeight="931" usemap="#image-maps-2015-01-09-040324" alt="" class="img-responsive elem-center"/>
                    <map name="image-maps-2015-01-09-040324" id="ImageMapsCom-image-maps-2015-01-09-040324">
                    <area id="asd" alt="asd" title="asd" href="{{ route('selling') }}" shape="rect" coords="355,0,692,296" style="outline:none;" target="_self"    data-maphilight='asd' />
                    <area id="asd" alt="asd" title="asd" href="{{ route('browse.type',   ['canvas']) }}" shape="rect" coords="714,633,1049,930" style="outline:none;" target="_self"    data-maphilight='asd' />
                    <area id="asd" alt="asd" title="asd" href="{{ route('browse.type', ['art']) }}" shape="rect" coords="0,315,335,612" style="outline:none;" target="_self"    data-maphilight='asd' />
                    <area shape="rect" coords="1048,929,1050,931" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
                    </map>
                    </div>
                    {{--<img src="{{ asset('img/frames/fullframe.jpg') }}" class="img-responsive elem-center">--}}
                </div>
            </div>
        </div>
    </section>


    <!-- Collections Section -->
    <section id="collections" class="border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center space-sm">
                    <h2 class="section-heading">Collections</h2>
                </div>
            </div>
            <div class="row frames">
                @if( $products->count() > 0 )
                    @foreach($products as $i => $product)
                        <div class="col-md-3 col-sm-6 col-xs-6  item ">
                            @include('listing.product')
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger alert-sm" role="alert">
                        <b>{{ PRODUCT_EMPTY }}</b>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 text-center space-md">
                        <a href="{{ $url_collection }}" class="btn btn-default btn-lg">Browse</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="border-top border-bottom" id="must-have">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 item border-right">
                        <h2 class="section-heading">Must Have</h2>

                        <div class="row">
                            @if( $mustHaves->count() > 0)
                                @foreach($mustHaves as $i => $product)


                                    <div class="col-md-6">
                                        <a href="{{ $product->present()->url }}"><img src="{{ $product->present()->image('square') }}" class="img-responsive elem-center"></a>
                                        <h4 class="title"><a href="{{ $product->present()->url }}" class="normal-link">{{ $product->present()->title }}</a></h4>
                                        <div class="description">
                                            <p>{{ $product->present()->excerpt(60) }}</p>
                                        </div>
                                    </div>
                                    @if( $i % 2 == 1 )
                                        <div class="col-md-12"></div>
                                    @endif
                                @endforeach
                            @endif



                        </div>
                        <div class="col-md-12 text-center space-sm">
                            <a href="{{ route('arrivals') }}" class="btn btn-default btn-lg">Browse</a>
                        </div>
                    </div>
                    <div class="col-md-5 item">
                        <h2 class="section-heading">Frame of the Week</h2>
                        <a href="{{ $product->present()->url }}"><img src="{{ $product->present()->image }}" class="img-responsive"></a>
                        {{--<ul class="list-inline pull-right">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>--}}
                        <h4 class="title"><a href="{{ $product->present()->url }}" class="normal-link">{{ $product->present()->title }}</a></h4>
                        <div class="description">
                            <p>{{ $product->present()->excerpt() }}</p>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </section>


        <section id="testimony">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="content">
                            <img src="{{ asset('img/qoute-left.png') }}" class="qoute-left">
                            Wallframe is the Middle East’s Home of luxury brands for your Home Designs and Framing.
                            <img src="{{ asset('img/qoute-right.png') }}" class="qoute-right">
                        </p>
                    </div>
                </div>
            </div>
        </section>
@stop