@extends('layout.admin')

@section('content')
    <div ng-controller="FrameAppController">
        <div class="row">
            <div class="col-md-10 ">
                @include('listing.frame')
            </div>
            <div class="col-md-2 no-pad"></div>
        </div>
        <div class="row">
            <div class="col-md-2 no-pad">
                <h6>Select Frame Part</h6>
                <div class="mainbox product-update">
                    <div class="form-group">
                        <select ng-model="currentPart" ng-options="part.name for part in frameParts" class="form-control" ng-change="selectionChanged()"></select>
                    </div>
                    {{--<div class="form-group" ng-show="currentPart.slug == frameParts[0].slug">--}}
                        {{--<select ng-model="currentType" ng-options="type.name for type in types" class="form-control" ng-change="selectionChanged()"></select>--}}
                    {{--</div>--}}
                </div>
                <div>@include('angularapps.images.upload-bulk-minimal')</div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="cuteTitle">@{{ currentPart.name }} <span>@{{ currentList.length }} items</span></h4>
                        <div class="space-sm" ng-repeat="item in currentList">
                            <div class="col-md-2 space-bottom-sm" >
                                <img ng-src="@{{ item.imagePath }}" alt="" class="img-responsive"/>
                                <div class="row">
                                    <div class="col-md-6 no-pad-right">
                                        <div ng-show="item.is_active == 0">
                                             <button class="btn btn-block btn-danger btn-xs" 
                                             ng-click="imageActivate($index)"><i class="fa fa-plus"></i></button>
                                        </div>
                                        <div ng-show="item.is_active == 1">
                                            <button class="btn btn-block btn-danger btn-xs"
                                            ng-click="imageActivate($index)"><i class="fa fa-check"></i></button>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 no-pad-left">
                                        <button class="btn btn-block btn-danger btn-xs" ng-click="imageDelete($index)"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" ng-show="$index % 6 == 5"></div>
                        </div>
                    </div>
                </div>
                <div class="row" id="bf-list" style="display:none;">
                    <div class="col-md-12">
                        <h4 class="cuteTitle">Items Added</h4>
                        <div class="space-sm">
                            <div id="background-and-frame-list"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop