@extends('layout.admin')

@section('content')

    <div class="row frame-border-list" ng-controller="FrameBorderController" ng-init='initialData = {{ json_encode($frameList) }}'>
        <div class="col-md-12">
            <ul class="list list-inline pull-right">
                <li><a href="{{ route('admin.frame.border.create') }}" class="btn btn-default"> <i class="fa fa-plus"></i> New Border</a></li>
            </ul>
            <h2 class="side-heading space-bottom-md">Frame Borders </h2>

            {{--Tabs--}}
            <ul class="list-inline">
                <li><a href="{{ route('admin.frame.border') }}" class="btn btn-success" >All <span class="badge">{{ count($frameGroup['all']) }}</span></a></li>
                <li><a href="{{ route('admin.frame.border', ['status' => 'active']) }}" class="btn btn-success" >Active <span class="badge">{{ count($frameGroup['active']) }}</span></a></li>
                @if(isset($frameGroup['trash']) && count($frameGroup['trash']) > 0)
                    <li><a href="{{ route('admin.frame.border', ['status' => 'trash']) }}" class="btn btn-success" >Trash <span class="badge">{{ count($frameGroup['trash']) }}</span></a></li>
                @endif
            </ul>



            <div ng-controller="TableController" class="space-top-sm">
                <div ng-show="tableData.length > 0">
                    <div class="col-md-8 no-pad-left">

                        {{--Table Form--}}
                        @include('components.forms.border-table-form')
                    </div>

                    <div class="col-md-4">
                        <h4 class="label-heading">Preview</h4>

                        @include('components.forms.border-preview-form')

                    </div>
                </div>
                <div ng-show="tableData.length <= 0" class="col-md-12 no-pad space-top-sm">
                    <div class="alert alert-danger">
                        No data available
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop