@extends('layout.admin')

@section('header')
    @parent
    {{ link_css('js/jqModal/jquery.remodal.css') }}
    {{ link_css('js/media-library/ngMedia.css') }}
    {{ link_css('js/jqNailThumb/jquery.nailthumb.1.1.min.css') }}
@stop
@section('footer')
    @parent
    {{ link_js('js/jqModal/jquery.remodal.js') }}
    {{ link_js('js/media-library/ngMedia.js') }}
    {{ link_js('js/jqNailThumb/jquery.nailthumb.1.1.min.js') }} {{--NailThumb--}}

    <script>
        window.remodalGlobals = {
            namespace: "modal",
            closeOnAnyClick: false,
            defaults: {
                hashTracking: false
            }
        };
    </script>
@stop

@section('content')
    <div>
        <div class="row">
            {{ Form::open(['route' => 'admin.design.store', 'method' => "post"]) }}

                <div class="col-md-8" ng-controller="MediaController as media">
                    <a href="#mediaModal" data-template="{{ route('media.modal')  }}" class="alert drag-drop-box media-add-btn text-center btn-block" >Add Frame Designs</a>

                    <div class="remodal" data-remodal-id="mediaModal" id="mediaModal">
                        @include('media.media-upload')
                    </div>
                    <div class="col-md-2" ng-repeat="item in mediaSelectedItems">
                        <input type="hidden" name="designs[]" value="@{{ item.id }}"/>

                        <!-- Selected Thumbnails markup -->
                        <div class="nailthumb-container square-thumb" ng-click="itemSelected( item )" style="width: 100px;height: 100px; margin-bottom: 17px;">
                            <a style="cursor: pointer">
                                <img ng-src="@{{ item.url }}" class="img-responsive "/>
                            </a>
                        </div>
                        <script type="text/javascript">
                            $(function(){
                                $('.nailthumb-container').nailthumb();
                            });
                        </script>
                        <!-- Selected Thumbnails markup -->

                    </div>
                    <div class="col-md-2 col-md-offset-10">
                        <button class="btn btn-success btn-block">
                            Save
                        </button>
                    </div>
                </div>
                <div class="col-md-4" ng-controller="FrameUploadController as frameUpload">
                    <input type="hidden" name="category" value="@{{ config.category.slug }}"/>
                    <input type="hidden" name="brand" value="@{{ config.brand.slug }}"/>
                    <input type="hidden" name="type" value="@{{ config.type.slug }}"/>
                    <div class="mainbox">
                        <div class="form-group">
                            <label>Select Category:</label>
                            <select ng-model="config.category" ng-options="category.name for category in categories" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label>Select Brand:</label>
                            <select ng-model="config.brand" ng-options="brand.name for brand in brands" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label>Select Type:</label>
                            <select ng-model="config.type" ng-options="type.name for type in types" class="form-control"></select>
                        </div>
                    </div>
                </div>
            {{ Form::close(); }}
        </div>
    </div>
@stop