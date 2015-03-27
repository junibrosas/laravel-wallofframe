@extends('layout.admin')
@section('header')
    @parent

@stop
@section('footer')
    @parent

@stop
@section('content')
    <div class="row frame-border-list" ng-controller="FrameBorderController">
        <div class="col-md-12">
            <ul class="list list-inline pull-right">
                <li><a href="{{ route('admin.frame.border.create') }}" class="btn btn-default"> <i class="fa fa-arrow-circle-o-up"></i> Create</a></li>
            </ul>
            <h2 class="side-heading">Frame Borders <span class="badge">42 items</span></h2>

            <div ng-repeat="frame in frameList">
                <div class="col-md-2 equalized space-bottom-sm">
                    <img ng-src="@{{ frame.imagePath }}" class="img-responsive" alt="@{{ frame.name }}" style="cursor: pointer">
                </div>

            </div>
        </div>
    </div>
@stop