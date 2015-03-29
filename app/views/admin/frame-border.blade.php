@extends('layout.admin')

@section('content')
{{ Form::open(['route' => 'admin.frame.border.manage', 'method' => 'post']) }}
    <div class="row frame-border-list" ng-controller="FrameBorderController" ng-init='initialData = {{ json_encode($frameList) }}'>
        <div class="col-md-12">
            <ul class="list list-inline pull-right">
                <li><a href="{{ route('admin.frame.border.create') }}" class="btn btn-default"> <i class="fa fa-arrow-circle-o-up"></i> Create</a></li>
            </ul>
            <h2 class="side-heading space-bottom-md">Frame Borders </h2>
            <ul class="list-inline">
                <li><a href="{{ route('admin.frame.border') }}" class="btn btn-success" >All <span class="badge">{{ count($frameGroup['all']) }}</span></a></li>
                <li><a href="{{ route('admin.frame.border', ['status' => 'active']) }}" class="btn btn-success" >Active <span class="badge">{{ count($frameGroup['active']) }}</span></a></li>
                @if(isset($frameGroup['trash']) && count($frameGroup['trash']) > 0)
                    <li><a href="{{ route('admin.frame.border', ['status' => 'trash']) }}" class="btn btn-success" >Trash <span class="badge">{{ count($frameGroup['trash']) }}</span></a></li>
                @endif

            </ul>
            <div class="col-md-3 no-pad-left">
                <div class="form-group">
                    <select class="form-control col-md-8" name="bulk_action">
                        <option value="-1">Bulk Action</option>
                        <option value="activate">Activate</option>
                        <option value="deactivate">Deactivate</option>
                        @if(isset($frameGroup['trash']) && count($frameGroup['trash']) > 0)
                            <option value="restore">Restore</option>
                        @else
                            <option value="move_to_trash">Move to Trash</option>
                        @endif
                    </select>

                </div>
            </div>
            <div class="col-md-9 no-right">
                  <button type="submit" name="apply" class="btn btn-default">Apply</button>
            </div>
            <div class="col-md-12"></div>
            <div ng-controller="TableController" class="space-top-sm">
                <div ng-show="tableData.length > 0">
                    <div class="col-md-8 no-pad-left">
                        @include('components.tables.table-borders')
                    </div>
                    <div class="col-md-4">
                        <h4 class="label-heading">Preview</h4>
                        <img ng-src="@{{ currentItem.imagePath }}" class="img-responsive" alt="@{{ currentItem.name }}" style="cursor: pointer">
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
{{ Form::close() }}
@stop