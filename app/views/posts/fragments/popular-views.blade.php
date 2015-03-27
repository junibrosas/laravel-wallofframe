<h4>Most Popular Items</h4>
<div class="row frames frames-small owl-carousel" id="owl-related">
    @foreach($items as $product)
        <div class="item"  data-content="false">
            @include('......listing.product', ['no_ribbon' => true])
        </div>
    @endforeach
</div>