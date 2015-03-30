@extends('layout.admin')

@section('content')

    <div  ng-controller="TableController" class="orders space-top-sm" ng-init='initialData = {{ json_encode($orders) }}'>
        <ul class="list list-inline pull-right">
            <li><a href="#" class="btn btn-default"> <i class="fa fa-plus"></i> New Order</a></li>
        </ul>
        <h2 class="side-heading">Orders</h2>
        @include('components.tables.table-orders')
    </div>

@stop