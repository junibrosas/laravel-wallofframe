@extends('layout.admin')

@section('content')
<div class="row" ng-controller="NewOrderController">
    <div class="col-md-12 space-bottom-sm"><h2 class="side-heading">New Orders</h2></div>

    <div class="col-md-6">

        @include('components.tables.table-products')

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Customer</label>
            <select ng-model="user" ng-change="userSelected( user )" ng-options="user.name for user in users" class="form-control">
                <option value="">Select A Buyer</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Shipping Address</label>
            <select ng-model="transaction.shipmentAddress" ng-change="shipmentSelected( shipment )" ng-options="shipment.details for shipment in userShipments" class="form-control">
                <option value="">Select Shipping Address</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Payment Method</label>
            <select ng-model="transaction.paymentMethod" ng-options="method.name for method in paymentMethods" class="form-control">
                <option value="">Select Payment Method</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Products Selected</label>
            @include('components.tables.table-products-minimal')
        </div>
    </div>
    <div class="pull-right">
        <button class="btn btn-default" ng-click="update()">Save</button>
    </div>
</div>
@stop