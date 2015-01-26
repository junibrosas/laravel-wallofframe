<div class="col-md-2 no-pad">
    {{--Background Gallery--}}
    <div id="product_background_gallery" class="frame-thumbs pull-right" ng-repeat="bg in bg_images">
        <a ng-click="changeBgImage( bg.imagePath );" style="cursor: pointer">
            <img ng-src="@{{ bg.imagePath }}" alt="" width="60" style="margin: 0" class="img-responsive" />
        </a>
    </div>
</div>

{{--Original Image--}}
<div class="ng-hide product-original product-original-{{ $product->present()->imageOriginalType }}"
    ng-show="showOriginal">
    <img src="{{ $product->present()->imagePreview }}" alt="" />
</div>

<div class="col-md-10">
    {{--Background Images--}}
    <div style="padding-top: 10px;">
        <img id="product_background"
            src='{{ asset('uploads/products/backgrounds/bg1.jpg') }}' class="img-responsive elem-center" />

        {{--Design Image--}}
        <img id="product_design"
            data-image="{{ $product->image }}"
            data-category="{{ $product->category->slug }}"
            ng-src='{{ $product->present()->imageWithType('square') }}'
            alt="" class="img-responsive elem-center product-design"
            ng-mouseover="hoverIn()"
            ng-mouseleave="hoverOut()"
            imagecenter />

        {{--Frame Image--}}

        <img id="product_frame"
            data-imagetype="{{ $product->present()->imageType }}"
            ng-src='{{ asset('uploads/products/frames/square/1.jpg') }}?random={{ Str::random(20) }}'
            class="img-responsive elem-center product-frame"
            imagecenter />
    </div>

    {{--Frame Gallery--}}
    <div id="product_frame_gallery" class="frame-thumbs text-center" ng-repeat="frame in frame_images">
        <a data-id="@{{ $index }}" ng-click="changeFrameImage( frame.imagePath ); setWidthByIndex( $index ); " style="cursor: pointer">
            <img ng-src="@{{ frame.imagePath }}" alt="" width="60"  />
        </a>
    </div>
</div>
