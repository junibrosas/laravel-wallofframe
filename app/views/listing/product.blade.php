<a href="{{ $product->present()->url }}" class="frame-link">
    @if(isset($no_ribbon) == false)
        @if(!empty($product->present()->statusClass))
            <div class="ribbon-wrapper">
                <div class="ribbon {{ $product->present()->statusClass }}">{{ $product->present()->status }}</div>
            </div>
        @endif
    @endif

    <img src="{{ $product->present()->image }}" class="img-responsive img-frame">

    <div class="detail">
        <div style="min-height: 45px">
            <h4 class="title">{{ $product->present()->title }} <span>{{ $product->present()->size }}</span></h4>
            <div class="subhead">{{ $product->present()->category }}</div>
        </div>
        <div class="description" ><a href="#"><i class="fa fa-tag"></i> {{$product->present()->priceMark}}</a></div>
    </div>

    <div class="content hidden-xs" style="display:none" >
        <a href="{{ $product->present()->url }}" class="frame-link">
            <h4 class="title">{{ $product->present()->type }}</h4>
            <div class="description">
                <p>{{ $product->present()->excerpt }}</p>
            </div>
        </a>
    </div>
</a>
