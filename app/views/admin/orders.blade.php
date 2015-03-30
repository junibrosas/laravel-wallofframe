@extends('layout.admin')

@section('content')

    <div  ng-controller="TableController" class="space-top-sm" ng-init='initialData = {{ json_encode($orders) }}'>
        @include('components.tables.table-orders')
    </div>

@stop