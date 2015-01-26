@extends('layout.master')

@section('footer')
    {{ link_js('iboostme/wallofframe/profile.js') }}
    {{ link_js('iboostme/wallofframe/angular/FrameManageController.js') }}
    {{ link_js('iboostme/wallofframe/angular/FrameAppController.js') }}
    {{ link_js('iboostme/wallofframe/angular/ProductBrowseController.js') }}
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
