<h4>CUSTOMERS WHO VIEWED SIMILAR ITEMS ALSO VIEWED</h4>
<div class="row frames frames-small owl-carousel" id="owl-related">
    @if( $products->count() > 0 )
        @foreach($products as $i => $product)
        <div class="item"  data-content="false">
            <a href="{{ $product->present()->url }}" class="frame-link">
                <img src="{{ $product->present()->imageWithType('vertical') }}" class="img-responsive">
                <div class="detail">
                    <div style="min-height: 43px">
                        <h4 class="title">{{ $product->present()->title }}</h4>
                        <div class="subhead">{{ $product->present()->brand }} | {{ $product->present()->category }}</div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    @else
        <div class="alert alert-danger alert-sm" role="alert">
            <b>{{ PRODUCT_EMPTY }}</b>
        </div>
    @endif
</div>