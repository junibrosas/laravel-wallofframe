@extends('layout.admin')

@section('content')
{{ Form::open(['route' => 'admin.frame.border.manage', 'method' => 'post']) }}
    <div class="row frame-border-list" ng-controller="FrameBorderController" ng-init='initialData = {{ json_encode($frameList) }}'>
        <div class="col-md-12">
            <ul class="list list-inline pull-right">
                <li><a href="{{ route('admin.frame.border.create') }}" class="btn btn-default"> <i class="fa fa-arrow-circle-o-up"></i> Create</a></li>
            </ul>
            <h2 class="side-heading space-bottom-md">Frame Borders <span class="badge">@{{ totalItems }} items</span></h2>

            <div class="col-md-3 no-pad-left">
                <div class="form-group">
                    <select class="form-control col-md-8" name="bulk_action">
                        <option value="-1">Bulk Action</option>
                        <option value="activate">Activate</option>
                        <option value="deactivate">Deactivate</option>
                        <option value="move_to_trash">Move to Trash</option>
                    </select>

                </div>
            </div>
            <div class="col-md-9 no-right">
                  <button type="submit" name="apply" class="btn btn-default">Apply</button>
            </div>
            <div class="col-md-12"></div>
            <div class="col-md-8">
                <table class="table ng-table-responsive" ng-table="tableParams" ng-controller="TableController"  template-pagination="custom/pager" >
                    <thead>
                        <tr>
                            <th width="5%"><input type="checkbox" class="iCheck-all icheck"/></th>
                            <th>Borders</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="frame in tableData">
                            <th  scope="row"> <input class="icheck" name="selectedFrames[]" type="checkbox" value="@{{ frame.id }}"></th>
                            <td  data-title="'Border'"><img width="60" ng-src="@{{ frame.imagePath }}" class="img-responsive" alt="@{{ frame.name }}" style="cursor: pointer" ng-click="setCurrentItem(frame)"></td>
                            <td  data-title="'Date'">
                                <i class="fa fa-clock-o"></i> <span style="font-size: 13px;">@{{ frame.date_human }}</span>
                            </td>
                            <td  data-title="'Status'" class="text-center">
                                <a class="btn btn-success btn-sm" ng-show="frame.is_active == 1 ? true : false" style="cursor: pointer">active</a>
                                <a class="btn btn-danger btn-sm" ng-show="frame.is_active == 0 ? true : false" style="cursor: pointer">inactive</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h4 class="label-heading">Preview</h4>
                <img ng-src="@{{ currentItem.imagePath }}" class="img-responsive" alt="@{{ currentItem.name }}" style="cursor: pointer">
            </div>
        </div>
    </div>
{{ Form::close() }}
@stop