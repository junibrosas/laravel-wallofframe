@extends('layout.default')
@section('header')
    <!-- cubeportfolio -->
    {{ link_css('js/cubeportfolio/cubeportfolio.min.css') }}
@stop
@section('footer')
    {{ link_js('assets/rwdImageMaps/jQuery.rwdImageMaps.js') }}
    {{ link_js('js/cubeportfolio/jquery.cubeportfolio.min.js') }}
    {{ link_js('js/cubeportfolio/main30.js') }}
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


    <section id="feature" class="dashed-divider">
        <div class="container">
            <div class="col-md-12">
                @include('home.parts.feature-boxes')
            </div>
        </div>
    </section>

    <section id="testimony">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="content">
                        <img src="{{ asset('img/qoute-left.png') }}" class="qoute-left">
                        Wall Of Frame is the Middle East’s Home of luxury brands for your Home Designs and Framing.
                        <img src="{{ asset('img/qoute-right.png') }}" class="qoute-right">
                    </p>
                </div>
            </div>
        </div>
    </section>
@stop