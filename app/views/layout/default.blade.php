@extends('layout.master')

@section('footer')
    {{ link_js('iboostme/wallofframe/angular/FrameAppController.js') }}
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
        @yield('content')
    @include('components.front.footer')
@stop




