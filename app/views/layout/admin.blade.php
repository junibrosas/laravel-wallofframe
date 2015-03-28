@extends('layout.master')
@section('header')
    @parent
    {{ link_css('assets/icheck/skins/flat/red.css') }}
@stop
@section('footer')
    {{ link_js('assets/icheck/icheck.min.js') }}
    {{ link_js('iboostme/wallofframe/profile.js') }}
    {{ link_js('iboostme/wallofframe/angular/FrameManageController.js') }}
    {{ link_js('iboostme/wallofframe/angular/FrameAppController.js') }}
    {{ link_js('iboostme/wallofframe/angular/ProductBrowseController.js') }}
    {{ link_js('iboostme/wallofframe/angular/TableController.js') }}
    <script type="text/ng-template" id="custom/pager">
        <ul class="pager ng-cloak">
            <li ng-repeat="page in pages"
                ng-class="{'disabled': !page.active, 'previous': page.type == 'prev', 'next': page.type == 'next'}"
                ng-show="page.type == 'prev' || page.type == 'next'" ng-switch="page.type">
                <a ng-switch-when="prev" ng-click="params.page(page.number)" href="">&laquo; Previous</a>
                <a ng-switch-when="next" ng-click="params.page(page.number)" href="">Next &raquo;</a>
            </li>
            <li>
                <div class="btn-group">
                    <button type="button" ng-class="{'active':params.count() == 10}" ng-click="params.count(10)" class="btn btn-default">10</button>
                    <button type="button" ng-class="{'active':params.count() == 25}" ng-click="params.count(25)" class="btn btn-default">25</button>
                    <button type="button" ng-class="{'active':params.count() == 50}" ng-click="params.count(50)" class="btn btn-default">50</button>
                    <button type="button" ng-class="{'active':params.count() == 100}" ng-click="params.count(100)" class="btn btn-default">100</button>
                </div>
            </li>
        </ul>
    </script>
@stop

@section('layout')
    @include('components.front.header')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('components.alerts.session')
                </div>
            </div>
        </div>
        <section>
           <div class="container">
               <div class="row user-content">
                   <div class="col-md-2">
                       @include('sidebars.sidebar-admin')
                   </div>
                   <div class="col-md-10">
                        @yield('content')
                   </div>
               </div>
           </div>
        </section>
   @include('components.front.footer')
@stop
