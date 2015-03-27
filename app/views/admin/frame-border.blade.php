@extends('layout.admin')
@section('header')
    @parent
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
    {{ link_css('assets/border-image-generator/css/border-image-generator.css') }}
    {{--{{ link_css('assets/border-image-generator/css/border-image-generator-standalone.css') }}--}}
@stop
@section('footer')
    @parent
    {{ link_js('assets/border-image-generator/lib/json2.js') }}
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    {{--{{ link_js('assets/border-image-generator/lib/jquery.ui.resizable.min.js') }}--}}
    {{ link_js('assets/border-image-generator/lib/user-image-cache/user-image-cache.js') }}
    {{ link_js('assets/border-image-generator/history-handler.js') }}
    {{ link_js('assets/border-image-generator/expander.js') }}
    {{ link_js('assets/border-image-generator/border-image-generator.js') }}
@stop
@section('content')
    @include('posts.applications.border-generator')
@stop