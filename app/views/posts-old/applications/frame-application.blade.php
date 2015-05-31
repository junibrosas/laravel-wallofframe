<div class="row sell" ng-controller="FrameAppController">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-10">
                <div class="frame-preview" >
                    <div class="elem-center" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); width: @{{ (currentSize.width+60) }}};">
                        <img ng-src="{{ url('images/frame-size/'.$product->filename.'?') }}@{{ 'width=' +(currentSize.width+60) +'&height='+(currentSize.height+60) }}"
                            alt="{{ $product->present()->title }}"
                            data-zoom-image="{{ $product->attachment->url }}"
                            class="frame-preview-image img-responsive  custom-border" />
                    </div>

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