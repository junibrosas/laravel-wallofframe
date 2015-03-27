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
    <div class="item" ng-repeat="frame in frameList">
        <img ng-src="@{{ frame.imagePath }}"  alt="@{{ frame.name }}" style="cursor: pointer" ng-click="setCurrentFrame( frame )">
    </div>
</div>
