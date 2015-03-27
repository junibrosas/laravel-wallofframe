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
            <h2 class="side-heading">Frame Borders <span class="badge">@{{ frameList.length }} items</span></h2>

            {{--<div ng-repeat="frame in frameList">
                <div class="col-md-2 equalized space-bottom-sm">
                    <img ng-src="@{{ frame.imagePath }}" class="img-responsive" alt="@{{ frame.name }}" style="cursor: pointer" ng-click="selected(frame)">
                </div>
            </div>--}}
            <div class="col-md-8">
                <table class="table">
                    <caption>Optional table caption.</caption>
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Borders</th>
                            <th>Active</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="frame in frameList">
                            <th scope="row"> <input type="checkbox"></th>
                            <td ><img width="60" ng-src="@{{ frame.imagePath }}" class="img-responsive" alt="@{{ frame.name }}" style="cursor: pointer" ng-click="setCurrentItem(frame)"></td>
                            <td>
                                <button class="btn btn-success btn-sm" ng-show="frame.is_active == 1 ? true : false">active</button>
                                <button class="btn btn-danger btn-sm" ng-show="frame.is_active == 0 ? true : false">active</button>
                            </td>
                            <td>@{{ frame.date_human }}</td>
                            <td class="pull-right">
                                <form action="#" method="post">
                                    <button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash-o"></i>  </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h3>Preview</h3>
                <img ng-src="@{{ currentItem.imagePath }}" class="img-responsive" alt="@{{ currentItem.name }}" style="cursor: pointer">
            </div>
        </div>
    </div>
@stop