@extends('layout.master')
@section('header')
    @parent
    {{ link_css('assets/icheck/skins/flat/red.css') }}
@stop
@section('footer')
    {{ link_js('iboostme/wallofframe/profile.js') }}
    {{ link_js('assets/icheck/icheck.min.js') }}
    {{ link_js('iboostme/wallofframe/angular/TableController.js') }}
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
                   <div class="col-md-3">
                       @include('sidebars.sidebar-account')
                   </div>
                   <div class="col-md-9">
                        @yield('content')
                   </div>
               </div>
           </div>
        </section>
   @include('components.front.footer')
@stop
