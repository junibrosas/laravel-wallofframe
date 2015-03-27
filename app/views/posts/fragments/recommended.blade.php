<h4>You may also like</h4>
<div class="row frames frames-small owl-carousel" id="owl-recommended" >
    @if( count($products) > 0 )
        @foreach( $products as $product )
            <div class="item"  data-content="false">
                <a href="{{ $product->present()->url }}">
                    <img src="{{ asset('img/frame1.jpg') }}" class="img-responsive">
                    <div class="detail">
                        <div style="min-height: 43px">
                            <h4 class="title"><a href="{{ $product->present()->url }}">{{ $product->present()->title }} <span>{{ $product->present()->size }}</span></a></h4>
                            <div class="subhead">{{ $product->present()->type }}</div>
                        </div>
                        <div class="description"><a href="#"><i class="fa fa-tag"></i> {{ $product->present()->price }} AED</a></div>
                    </div>
                </a>
            </div>
        @endforeach
    @endif
    @for($i = 0; $i < 4; $i++)

    @endfor
</div>