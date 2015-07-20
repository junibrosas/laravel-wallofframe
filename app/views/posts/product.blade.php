@extends('layout.default')
@section('header')
    <meta property="og:title" content="{{ $product->present()->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ $product->attachment->url }}" />
    <meta property="og:url" content="{{ $product->present()->url }}" />
    <meta property="og:description" content="{{ $product->present()->content }}" />
    {{ link_css('js/jqNailThumb/jquery.nailthumb.1.1.min.css') }}
    {{ link_css('js/jqLightbox/css/lightbox.css') }}
    {{ link_css('css/animate.min.css') }}
    <style type="text/css">
        .zoomWindowContainer > div{
            margin-left: 20px !important;
        }
    </style>
@stop
@section('footer')
    @parent
    {{ link_js('js/jqFullModal/animatedModal.min.js') }}
    {{ link_js('assets/elevatezoom/jquery.elevateZoom-3.0.8.min.js') }}
    {{ link_js('js/jqLightbox/js/lightbox.min.js') }}
    <script>
        $(function(){
            $(".frame-preview-image").elevateZoom({
                easing : true
            });
            $("#stage-modal").animatedModal({
                animatedIn: 'zoomIn',
                animatedOut: 'zoomOut'
            });
        });

    </script>
@stop
@section('content')
    <section ng-controller="FrameAppController">
        <div class="container">

            {{--Application Modal--}}
            @include('posts.stage-modal.artModal')

            {{--Application Page--}}
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