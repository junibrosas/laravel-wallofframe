<div id="grid-container" class="cbp-l-grid-masonry">
    <div class="cbp-item identity motion">
        <a class="cbp-caption ">
            <img src="{{ asset('img/framebox/boxframe1.jpg') }}" alt="">
        </a>
    </div>

    <div class="cbp-item web-design">
        <a class="cbp-caption " data-title="The Gang Blue<br>by GSRthemes9" href="{{ route('brands') }}">
            <div class="cbp-caption-defaultWrap">
                <img src="{{ asset('img/framebox/boxframe2.jpg') }}" alt="">
            </div>
            <div class="cbp-caption-activeWrap wrap-with-picture" style="background: url( {{ asset('img/framebox/boxframe2.jpg') }} ) no-repeat top center; ">
                <div class="cbp-l-caption-alignCenter">
                    <div class="cbp-l-caption-body">
                        <div class="cbp-l-caption-desc">Brands</div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="cbp-item graphic logos">
        <a class="cbp-caption " data-title="Tiger<br>by GSRthemes9">
            <img src="{{ asset('img/framebox/boxframe3.jpg') }}" alt="">
        </a>
    </div>

    <div class="cbp-item logos motion">
        <a class="cbp-caption " href="{{ route('category', 'fashion') }}">
            <div class="cbp-caption-defaultWrap">
                <img src="{{ asset('img/framebox/boxframe4.jpg') }}" alt="">
            </div>
            <div class="cbp-caption-activeWrap wrap-with-picture" style="background: url( {{ asset('img/framebox/boxframe4.jpg') }} ) no-repeat top center; ">
                <div class="cbp-l-caption-alignCenter">
                    <div class="cbp-l-caption-body">
                        <div class="cbp-l-caption-title">Exclusive</div>
                        <div class="cbp-l-caption-desc">Fashion <br /> Illustrations</div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="cbp-item identity">
        <a class="cbp-caption "  href="{{ route('category', 'cosmic-quotes') }}" >
            <div class="cbp-caption-defaultWrap">
                <img src="{{ asset('img/framebox/boxframe5.jpg') }}" alt="">
            </div>
            <div class="cbp-caption-activeWrap wrap-with-picture" style="background: url( {{ asset('img/framebox/boxframe5.jpg') }} ) no-repeat top center; ">
                <div class="cbp-l-caption-alignCenter">
                    <div class="cbp-l-caption-body">
                    <div class="cbp-l-caption-title">Cosmic</div>
                        <div class="cbp-l-caption-desc">Quotes</div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="cbp-item graphic motion">
        <a class="cbp-caption ">
            <img src="{{ asset('img/framebox/boxframe6.jpg') }}" alt="">
        </a>
    </div>

    <div class="cbp-item web-design logos">
        <a class="cbp-caption " >
            <img src="{{ asset('img/framebox/boxframe7.jpg') }}" alt="">
        </a>
    </div>

    <div class="cbp-item identity">
        <a class="cbp-caption "  href="{{ route('category', 'home-family') }}">
            <div class="cbp-caption-defaultWrap">
                <img src="{{ asset('img/framebox/boxframe8.jpg') }}" alt="">
            </div>
            <div class="cbp-caption-activeWrap wrap-with-picture" style="background: url( {{ asset('img/framebox/boxframe8.jpg') }} ) no-repeat top center; ">
                <div class="cbp-l-caption-alignCenter">
                    <div class="cbp-l-caption-body">
                        <div class="cbp-l-caption-desc">Home <br/><small>&</small><br/> Family </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<style type="text/css">
    .wrap-with-picture{
        background-size: cover;
    }
    .wrap-with-picture .cbp-l-caption-alignCenter{
        background: rgba(0,0,0,0.6);
    }
</style>