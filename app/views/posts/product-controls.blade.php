@section('footer')
    @parent
    <script>
        $(document).ready(function() {
            $(".owl-product-controls").owlCarousel({
                //autoPlay: 3000, //Set AutoPlay to 3 seconds
                navigation : true, // Show next and prev buttons
                navigationText: [
                      '<i class="fa fa-chevron-left"></i>',
                      '<i class="fa fa-chevron-right"></i>'
                      ],
                items : 6,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3]
            });
        });
    </script>
@stop

<div class="owl-product-controls">
    <div class="item"><img src="http://lorempixel.com/400/300/" alt="Owl Image"></div>
    <div class="item"><img src="http://lorempixel.com/400/300/" alt="Owl Image"></div>
    <div class="item"><img src="http://lorempixel.com/400/300/" alt="Owl Image"></div>
    <div class="item"><img src="http://lorempixel.com/400/300/" alt="Owl Image"></div>
    <div class="item"><img src="http://lorempixel.com/400/300/" alt="Owl Image"></div>
    <div class="item"><img src="http://lorempixel.com/400/300/" alt="Owl Image"></div>
    <div class="item"><img src="http://lorempixel.com/400/300/" alt="Owl Image"></div>
    <div class="item"><img src="http://lorempixel.com/400/300/" alt="Owl Image"></div>
    <div class="item"><img src="http://lorempixel.com/400/300/" alt="Owl Image"></div>
    <div class="item"><img src="http://lorempixel.com/400/300/" alt="Owl Image"></div>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>