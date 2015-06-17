<div id="animatedModal">
    <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID  class="close-animatedModal" -->
    <div id="closebt-container">
        <a href="#" class="close-animatedModal">
            <img class="closebt" src="{{ asset('img/closebt.svg') }}">
        </a>
    </div>

    <div class="modal-content stage-modal-content">
        <!--Your modal content goes here-->
        <div class="frame-preview" style="padding-top: 60px;" >
            {{--Framed Image--}}
            <div class="elem-center box-shadow-frame-light"
                ng-show="currentFrameType == frameTypes[0]"
                style="border-width: 9px !important;@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); width: @{{ (currentSize.width+100) }}};">
                <img ng-src="{{ url('images/frame-size/'.$product->filename.'?') }}@{{ 'width=' +(currentSize.width+100) +'&height='+(currentSize.height+100) }}"
                    alt="{{ $product->present()->title }}"
                    data-zoom-image="{{ $product->attachment->url }}"
                    class="img-responsive custom-border" />
                <div class="logo-watermark" style="  bottom: 55%;
                                                     left: 52.5%;">
                    <span style="font-size: 5px;">Wall Of <br/> Frame</span>
                </div>
            </div>

            {{--Canvas Image--}}
            <div>
                <div ng-show="currentFrameType == frameTypes[1]" class="canvas-2d-effect art-mode" style=" margin: 0 auto; width: @{{ currentSize.width+100 }}px">
                    <div  class="canvas-texture-to-image">
                        <img ng-src="{{ url('images/frame-size/'.$product->filename.'?') }}@{{ 'width=' +(currentSize.width+100) +'&height='+(currentSize.height+100) }}"
                            alt="{{ $product->present()->title }}"
                            data-zoom-image="{{ $product->attachment->url }}"
                            class="img-responsive elem-center " />
                    </div>
                </div>
            </div>


            {{--Art Image--}}
            <div ng-show="currentFrameType == frameTypes[2]">
                <img ng-src="{{ url('images/frame-size/'.$product->filename.'?') }}@{{ 'width=' +(currentSize.width+100) +'&height='+(currentSize.height+100) }}"
                    alt="{{ $product->present()->title }}"
                    data-zoom-image="{{ $product->attachment->url }}"
                    class="img-responsive elem-center" />
            </div>
        </div>




        {{--Modal Cart Form--}}
        <div class="modal-cart-form">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-inline frame-types">
                        <li ng-click="selectedFrameType( frameTypes[0] )"
                            ng-class="currentFrameType == frameTypes[0] ? 'frame-type-selected'  : ''">
                               <a href="" class="frame-type-title">Framed Print</a>
                        </li>
                        <li ng-click="selectedFrameType( frameTypes[1] )"
                            ng-class="currentFrameType == frameTypes[1] ? 'frame-type-selected'  : ''">
                               <a href="" class="frame-type-title">Canvas</a>
                        </li>
                        {{--<li ng-click="selectedFrameType( frameTypes[2] )"
                            ng-class="currentFrameType == frameTypes[2] ? 'frame-type-selected'  : ''">
                               <a href="" class="frame-type-title">Art</a>
                        </li>--}}
                    </ul>
                </div>
                <div class="col-md-2" >
                    <select
                        ng-show="currentFrameType != frameTypes[1]"
                        ng-model="currentFrame"
                        ng-init="frame == frameList[0]"
                        ng-options="frame.name for frame in frameList"
                        class="form-control">
                    </select>
                </div>
                <div class="col-md-2">
                    <select
                        ng-model="currentSize"
                        ng-init="size == frameSizes[0]"
                        ng-options="size.width +'&quot; x '+ size.height+'&quot;' for size in frameSizes"
                        class="form-control">
                    </select>
                </div>
                <div class="col-md-2">
                    <div class="">
                        <a href="#" class="selling-price"><i class="fa fa-tag"></i> @{{main.currencyConvert(currentSize.price, main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }} </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('add-bag/'.$product->id.'?size=') }}@{{ currentSize.id }}" class="btn btn-default btn-block btn-lg btn-purchase"> Add to Bag</a>
                </div>
            </div>
        </div>
    </div>
</div>