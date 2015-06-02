@extends('layout.default')
@section('header')
    {{ link_css('iboostme/js/angular/angular-slider/angular-slider.css') }}
@stop
@section('footer')
    {{ link_js('js/jqNotify/notify.min.js') }}
    {{ link_js('assets/jscroll/jquery.jscroll.min.js') }}
    {{ link_js('iboostme/wallofframe/angular/PriceSliderController.js') }}
    {{ link_js('iboostme/wallofframe/angular/ProductBrowseController.js') }}
@stop
@section('content')
    <section >
        <div class="container">
            <div class="row border-bottom" >
                {{--<div class="col-md-4">
                    @include('sidebars.search')
                    <div class="space-sm"></div>
                </div>--}}
                <div class="col-md-12" ng-controller="ProductBrowseController" id="pbApp">
                    <h2 class="page-heading">{{ $heading }}</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div ng-show="showLoadingText" class="text-center">loading...</div>
                        </div>
                    </div>
                    <div class="row frames frames-small space-md" id="product-list">

                        @include('listing.productNg')

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            @include('components.paginates.controls')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop