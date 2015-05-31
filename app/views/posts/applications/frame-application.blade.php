<div class="row sell" >
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="frame-preview" ng-class="is">
                    <div class="elem-center" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); width: @{{ (currentSize.width+300) }}};">
                        <img ng-src="{{ url('images/frame-size/'.$product->filename.'?') }}@{{ 'width=' +(currentSize.width+300) +'&height='+(currentSize.height+300) }}"
                            alt="{{ $product->present()->title }}"
                            data-zoom-image="{{ $product->attachment->url }}"
                            class="frame-preview-image img-responsive custom-border" />
                    </div>

                    {{--<div class="" ng-class="">
                        <img ng-src="{{ url('images/frame-size/'.$product->filename.'?') }}@{{ 'width=' +(currentSize.width+300) +'&height='+(currentSize.height+300) }}"
                            alt="{{ $product->present()->title }}"
                            data-zoom-image="{{ $product->attachment->url }}"
                            class="frame-preview-image img-responsive elem-center" />
                    </div>--}}

                </div>
            </div>
            <div class="col-md-12">
                <div class="text-right" style="padding-top: 20px;">
                    <a href="#" class="art-on-wall-btn"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span> View art on a wall</a>
                </div>
                <div class="row frame-types">
                    <div class="col-sm-2 frame-type-selected">
                        <h5 class="frame-type-title">Framed Print</h5>
                        <img src="{{ asset('img/frame-type/product-FP.jpg') }}" alt="" class="frame-type-img  img-responsive"/>
                    </div>
                    <div class="col-sm-2">
                        <h5 class="frame-type-title">Canvas</h5>
                        <img src="{{ asset('img/frame-type/product-S.jpg') }}" alt="" class="frame-type-img img-responsive"/>
                    </div>
                    <div class="col-sm-2">
                        <h5 class="frame-type-title">Art Print</h5>
                        <img src="{{ asset('img/frame-type/product-PO.jpg') }}" alt="" class="frame-type-img img-responsive"/>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="space-md"></div>
    <div class="col-md-4">
        @include('posts.fragments.product-details')
    </div>
</div>