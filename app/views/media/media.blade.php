@extends('layout.admin')

@include('media.components.media-assets')

@section('content')
    <a href="#media-modal" class="alert drag-drop-box media-add-btn text-center btn-block" >Add Frame Designs</a>

    <div ng-controller="MediaController as media">
        <div class="row">
            <div class="col-md-12">

                <div class="remodal" data-remodal-id="media-modal" id="media-modal">
                    @include('media.media-upload')
                </div>

                {{ Form::open(['route' => 'admin.design.upload', 'method' => "post"]) }}
                    <div class="col-md-2" ng-repeat="item in mediaSelectedItems">
                        <input type="hidden" name="designs[]" value="@{{ item.id }}"/>
                        @include('media/components/list-media')
                    </div>
                    <div class="col-md-2 col-md-offset-10">
                        <button class="btn btn-success btn-block">
                            Save
                        </button>
                    </div>
                {{ Form::close(); }}
            </div>
        </div>
    </div>
@stop