@extends('layout.default')
@section('header')
    <!-- cubeportfolio -->
    {{ link_css('js/cubeportfolio/cubeportfolio.min.css') }}
@stop
@section('footer')
    {{ link_js('assets/rwdImageMaps/jQuery.rwdImageMaps.js') }}
    {{ link_js('js/cubeportfolio/jquery.cubeportfolio.min.js') }}
    {{ link_js('js/cubeportfolio/main30.js') }}
    {{ link_js('js/cubeportfolio/main35.js') }}
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


    <section id="feature" style="padding-bottom: 0;">
        <div class="container">
            <div class="col-md-12">
                @include('home.parts.feature-boxes')
            </div>
        </div>
    </section>

    <section id="feature-designs" class="dashed-divider">
        
        @include('home.parts.feature-designs')

    </section>

    <section id="testimony">
        
        @include('home.parts.feature-testimony')

    </section>

    



    
@stop