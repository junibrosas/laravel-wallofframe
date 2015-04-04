@if( count($products) > 0 )
    <table class="table table-striped table-product">
        <tr>
            <th>Item(s)</th>
            <th></th>
            <th>Quantity</th>
            <th class="text-right">Price</th>
        </tr>
        @foreach( $products as $product )
            <tr>
                <td>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ $product->present()->url }}">
                            <img src='{{ $product->present()->image('square') }}' data-zoom-image="{{ asset('uploads/products/large/frame2.jpg') }}" class="img-responsive" width="80"/>
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    <div>
                        <h6>{{ $product->present()->title }}</h6>
                        <ul class="list-unstyled list-detail">
                            <li>Type: {{ $product->present()->type }}</li>
                            <li>Category: {{ $product->present()->category }}</li>
                            <li>Size: {{ $product->present()->size }}</li>
                        </ul>
                    </div>
                </td>
                <td class="text-center">
                    {{ $product->quantity }}
                </td>
                <td>
                    <div class="amount">{{ ngTotalAmount($product->present()->totalPrice( $product->quantity )) }}</div>
                </td>
            </tr>
        @endforeach
    </table>
@else
<div class="alert alert-danger alert-sm space-sm" role="alert">
    <b>Your cart is empty.</b>
</div>
@endif
