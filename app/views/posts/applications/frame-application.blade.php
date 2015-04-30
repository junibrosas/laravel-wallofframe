<div class="row sell" ng-controller="FrameAppController">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-10">
                <div class="frame-preview" style="margin-bottom: 20px;">
                    {{--<img ng-show="currentMode == frameModes[2]" ng-src="{{ $product->present()->imageCacheSquare }}" alt="Original Image" class="img-responsive elem-center custom-border" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); " />
                    <img ng-show="currentMode == frameModes[1]" ng-src="{{ $product->present()->imageCacheVertical }}" alt="Original Image" class="img-responsive elem-center custom-border" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); " />
                    <img ng-show="currentMode == frameModes[0]" ng-src="{{ $product->present()->imageCacheHorizontal }}" alt="Original Image" class="img-responsive elem-center custom-border" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); " />
                    <img ng-show="currentMode == frameModes[3]" ng-src="{{ $product->present()->imageCachePreview }}" alt="Original Image" class="img-responsive elem-center custom-border" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); " />--}}
                    <img ng-src="{{ $product->present()->imageCachePreview }}" alt="Original Image" class="img-responsive elem-center custom-border" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); " width="200"/>
                </div>
            </div>
            <div class="col-md-2">
                <ul class="list-unstyled mode-list" style="margin-bottom: 20px;">
                    <li ng-repeat="size in frameSizes" ng-click="selectedtSize( size )" ng-class="currentSize === size ? 'active-mode' : '' " ng-click="setPreviewMode( mode )">
                        @{{ size.width +'x'+ size.height }}
                    </li>
                    {{--<li ng-repeat="mode in frameModes | reverse" ng-click="setPreviewMode( mode )" ng-class="currentMode == mode ? 'active-mode' : '' " >@{{ mode }}</li>--}}
                </ul>
            </div>
        </div>

        @include('posts.fragments.product-controls')
    </div>
    <div class="col-md-4">
        @include('posts.fragments.product-details')

    </div>
</div>