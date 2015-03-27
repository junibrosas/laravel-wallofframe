@extends('layout.default')
@section('header')
    <meta property="og:title" content="{{ $product->present()->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="{{ $product->present()->url }}" />
    <meta property="og:description" content="{{ $product->present()->excerpt }}" />
@stop
@section('footer')
    @parent
    {{--{{ link_js('assets/elevatezoom/jquery.elevateZoom-3.0.8.min.js') }}--}}
@stop
@section('content')
    <section>
        <div class="container">

            @include('posts.applications.frame-application')

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @include('posts.fragments.related')

                </div>
            </div>
        </div>
    </section>
@stop