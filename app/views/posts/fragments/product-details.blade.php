
{{--Description--}}
<div class="detail">
    <div style="min-height: 43px">
        <h4 class="title"><a href="{{ $product->present()->url }}">{{ $product->present()->title }} <span>@{{ currentSize.width +'x'+currentSize.height }}</span></a></h4>
        <div class="subhead">{{ $product->present()->brand }} | {{ $product->present()->category(' | ') }}</div>
    </div>
</div>
<div class="description">
    {{ Str::limit($product->present()->content, 280  ) }}
</div>

{{--Buttons--}}
<a href="{{ url('add-bag/'.$product->id.'?size=') }}@{{ currentSize.id }}" class="btn btn-default btn-lg btn-block btn-purchase"> Add to Bag</a>
{{ Form::open(['route' => 'customer.wishlist.add', 'method' => 'get']) }}
    {{ Form::hidden('product', $product->id) }}
    {{ $product->present()->wishlistLabel() }}
{{ Form::close() }}

{{--Sharing--}}
<div class="clearfix">
    @include('components.buttons.sharing')
</div>

<div class="space-md"></div>

{{--Price--}}
<div class="">
    <a href="#" class="selling-price"><i class="fa fa-tag"></i> @{{main.currencyConvert(currentSize.price, main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }} </a>
</div>


{{--Sizes--}}
<div class="space-sm"></div>

<label for="size">Sizes</label>
<select
    ng-model="currentSize"
    ng-init="size == frameSizes[0]"
    ng-options="size.width +'&quot; x '+ size.height+'&quot;' for size in frameSizes"
    class="form-control">
</select>

<div class="space-sm"></div>

{{--Frames--}}
<label for="frame">Frame</label>
<select
    ng-model="currentFrame"
    ng-init="frame == frameList[0]"
    ng-options="frame.name for frame in frameList"
    class="form-control">
</select>