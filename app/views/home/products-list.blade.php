 @if( $products->count() > 0 )
    @foreach($products as $i => $product)
        <div class="col-md-4 col-sm-6 col-xs-6  item ">
            @include('listing.product')
        </div>
    @endforeach

@else
    <div class="col-md-12">
        <div class="alert alert-danger alert-sm" role="alert">
            <b>{{ PRODUCT_EMPTY }}</b>
        </div>
    </div>
@endif
<script>
$(function(){
    $('.frames .item').hover(function(e){
            var content = $(this).find('.content');
            var detail = $(this).find('.detail');
            var isContentDisable = $(this).data('content');

            if( isContentDisable == undefined ){
                content.attr('style', 'opacity:1; transition: all ease .3s;');
                detail.attr('style', 'opacity:0; transition: all ease .3s;');
            }
        },function(e){
            var detail = $(this).find('.detail');
            var content = $(this).find('.content');

            content.attr('style', 'opacity:0; transition: all ease .3s;');
            detail.attr('style', 'opacity:1; transition: all ease .3s;');
        });
});
</script>