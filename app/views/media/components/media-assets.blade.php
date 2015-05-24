@section('header')
    @parent
    {{ link_css('js/jqModal/jquery.remodal.css') }}
    {{ link_css('js/media-library/ngMedia.css') }}
    {{ link_css('js/jqNailThumb/jquery.nailthumb.1.1.min.css') }}
@stop
@section('footer')
    @parent
    {{ link_js('js/jqModal/jquery.remodal.js') }}
    {{ link_js('js/media-library/ngMedia.js') }}
    {{ link_js('js/jqNailThumb/jquery.nailthumb.1.1.min.js') }} {{--NailThumb--}}

    <script>
        window.remodalGlobals = {
            namespace: "modal",
            closeOnAnyClick: false,
            defaults: {
                hashTracking: false
            }
        };
    </script>
@stop