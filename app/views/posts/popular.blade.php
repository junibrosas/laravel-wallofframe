<h4>More Popular Searches</h4>
<div class="row frames frames-small">
    @if( count($products) > 0 )
        @foreach( $products as $product )
            <div class="item col-md-3 space-sm"  data-content="false">
                <img src="{{ asset('img/frame1.jpg') }}" class="img-responsive">
                <div class="detail">
                    <div style="min-height: 43px">
                        <h4 class="title"><a href="{{ $product->present()->url }}">{{ $product->present()->title }} <span>{{ $product->present()->size }}</span></a></h4>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>