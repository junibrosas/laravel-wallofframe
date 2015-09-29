@extends('layout.default')
@section('header')
    <!-- cubeportfolio -->
    {{ link_css('js/cubeportfolio/cubeportfolio.min.css') }}
    {{ link_css('assets/owl-carousel/owl.custom.theme.css') }}
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


    <section id="feature" style="padding-bottom: 80px;" class="dashed-divider">
        <div class="container">
            <div class="col-md-12">
                @include('home.parts.feature-boxes')
            </div>
        </div>
    </section>

    <section id="home-product-tabs" class="dashed-divider" style="padding-bottom: 80px;" >
    	<script type="text/javascript">
			$(function(){
				var tabCarousel = $(".product-tab-owl-carousel").owlCarousel({
	            	pagination: false,
	            	navigation: false,
	            	items: 1
	            });

	            var brandCarousel = $(".product-tab-brands-carousel").owlCarousel({
	            	pagination: false,
	            	navigation: false,
	            	items: 10
	            });

	            $(".custom-navigations .next").click(function(){
					tabCarousel.trigger('owl.next');
				});
				$(".custom-navigations .prev").click(function(){
					tabCarousel.trigger('owl.prev');
				});
			});
		</script>
    	<div class="container">
			<div class="row">
				<!-- Nav tabs -->
				<div class="centered-pills">
					<ul class="nav nav-tabs nav" role="tablist">
						<li role="presentation" class="active"><a href="#new-arrivals" aria-controls="home" role="tab" data-toggle="tab"> New Arrivals</a></li>
						<li role="presentation"><a href="#best-seller" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-area-chart"></i> Best Seller</a></li>
						<li role="presentation"><a href="#featured-products" aria-controls="messages" role="tab" data-toggle="tab"> Featured Designs</a></li>
					</ul>
				</div>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="new-arrivals">
						<?php $products = Product::orderBy(DB::raw("RAND()"))->take(8)->get(); ?>
						@include('components.carousels.carousel-home', ['products' => $products])
					</div>

					<div role="tabpanel" class="tab-pane" id="best-seller">
						<?php $products = Product::orderBy(DB::raw("RAND()"))->take(8)->get(); ?>
						@include('components.carousels.carousel-home', ['products' => $products])
					</div>

					<div role="tabpanel" class="tab-pane" id="featured-products">
						<?php $products = Product::orderBy(DB::raw("RAND()"))->take(8)->get(); ?>
						@include('components.carousels.carousel-home', ['products' => $products])
					</div>
				</div>
			</div>
		</div>
    </section>


    <section id="testimony">
    	
        @include('home.parts.feature-testimony')

    </section>
@stop