@extends('layout.admin')

@section('content')
    <div class="frame-upload">
        <div class="row" ng-controller="DragNDropController">
            <div class="col-md-8">
                @include('angularapps.images.upload-bulk')
            </div>
            <div class="col-md-4">
                <div class="mainbox">
                    <div class="form-group">
                        <label>Select Category:</label>
                        <select ng-model="currentCategory" ng-options="category.name for category in categories" ng-change="selectionChanged()" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label>Select Brand:</label>
                        <select name="" ng-model="currentBrand" ng-options="brand.name for brand in brands" ng-change="selectionChanged()" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label>Select Type:</label>
                        <select name="" ng-model="currentType" ng-options="type.name for type in types" ng-change="selectionChanged()" class="form-control"></select>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop