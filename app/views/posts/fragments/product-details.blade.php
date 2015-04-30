

<div class="detail">
    <div style="min-height: 43px">
        <h4 class="title"><a href="{{ $product->present()->url }}">{{ $product->present()->title }} <span>{{ $product->present()->size }}</span></a></h4>
        <div class="subhead">{{ $product->present()->type }}</div>
    </div>
    <div class="price"><span class="title">Glossy</span> <a href="#"><i class="fa fa-tag"></i> @{{ main.currencyConvert(currentSize.gloss, main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}</a></div>
    <div class="price"><span class="title">Matte</span> <a href="#"><i class="fa fa-tag"></i> @{{ main.currencyConvert(currentSize.matte, main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}</a></div>
</div>
<div class="description">
    {{ Str::limit($product->present()->content, 280  ) }}
</div>

<a href="{{ route('bag.add', $product->id) }}" class="btn btn-default btn-lg btn-block btn-purchase"> Add to Bag</a>
{{ Form::open(['route' => 'customer.wishlist.add', 'method' => 'get']) }}
    {{ Form::hidden('product', $product->id) }}
    {{ $product->present()->wishlistLabel() }}
{{ Form::close() }}
<div class="clearfix">
    @include('components.buttons.sharing')
</div>