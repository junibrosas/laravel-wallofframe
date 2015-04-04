@extends('layout.profile')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="label-heading">Tracking Order</h4>
        </div>
    </div>

    <div ng-controller="TableController" ng-init='initialData = {{ json_encode($orders) }}'>
        @include('components.tables.table-orders')
    </div>
    {{--@include('components.tables.table-tracking')--}}
@stop