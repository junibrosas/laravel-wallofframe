<div class="row sell" ng-controller="FrameAppController">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-10">
                <div class="frame-preview">
                    <img ng-src="{{ url('images/frame-size/'.$product->image.'?') }}@{{ 'width=' +(currentSize.width+60) +'&height='+(currentSize.height+60) }}" data-zoom-image="{{ $product->present()->imageCachePreview }}" alt="Original Image" class="frame-preview-image img-responsive elem-center custom-border" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); width: @{{ (currentSize.width+60) }}};" />
                </div>
            </div>
            <div class="col-md-2">
                <ul class="list-unstyled mode-list" style="margin-bottom: 20px;">
                    <li ng-repeat="size in frameSizes" ng-click="selectedtSize( size )" ng-class="currentSize === size ? 'active-mode' : ''">
                        @{{ size.width +'x'+ size.height }}
                    </li>
                </ul>
            </div>
        </div>

        @include('posts.fragments.product-controls')
    </div>
    <div class="col-md-4">
        @include('posts.fragments.product-details')

    </div>
</div>