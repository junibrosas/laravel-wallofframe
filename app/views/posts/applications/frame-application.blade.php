<div class="row sell" >
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="frame-preview">
                    {{--Framed Image--}}
                    <div class="elem-center box-shadow-frame"
                        ng-show="currentFrameType == frameTypes[0]"
                        style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); width: 550px;">
                        <img
                            ng-src="{{ $product->present()->imageWithType('square') }}"
                            width="550"
                            alt="{{ $product->present()->title }}"
                            class="img-responsive custom-border" />
                    </div>

                    {{--Canvas Image--}}
                    <div class="canvas-2d-effect" ng-show="currentFrameType == frameTypes[1]" >
                        <div class="canvas-texture-to-image ">
                            <img
                                ng-src="{{ $product->present()->imageWithType('square') }}"
                                width="550"
                                alt="{{ $product->present()->title }}"
                                class="img-responsive elem-center " />
                        </div>
                    </div>


                    {{--Art Image--}}
                    <div ng-show="currentFrameType == frameTypes[2]">
                        <img
                            ng-src="{{ $product->present()->imageWithType('square') }}"
                            width="550"
                            alt="{{ $product->present()->title }}"
                            class="img-responsive elem-center" />
                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <div class="text-center" style="padding-top: 20px;">
                    <a id="stage-modal" href="#animatedModal" class="art-on-wall-btn"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span> Preview Art on Wall</a>
                </div>
                <div class="space-sm"></div>
                <div class="row frame-types">
                    <div class="col-sm-2 col-md-offset-4" ng-class="currentFrameType == frameTypes[0] ? 'frame-type-selected'  : ''">
                        <img src="{{ asset('img/frame-type/product-FP.jpg') }}"
                            ng-click="selectedFrameType( frameTypes[0] )"
                            ng-class="currentFrameType == frameTypes[0]"
                            alt=""
                            class="frame-type-img  img-responsive"/>
                        <h5 class="frame-type-title">Framed Print</h5>
                    </div>
                    <div class="col-sm-2" ng-class="currentFrameType == frameTypes[1] ? 'frame-type-selected' : ''">
                        <img src="{{ asset('img/frame-type/product-S.jpg') }}"
                            ng-click="selectedFrameType(frameTypes[1])"
                            alt=""
                            class="frame-type-img img-responsive"/>
                        <h5 class="frame-type-title">Canvas</h5>
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