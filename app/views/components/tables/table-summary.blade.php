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
                            <a href="{{ $product->options->url }}">
                                <img src='{{ $product->options->image }}'  class="img-responsive" width="80"/>
                                <div class="logo-watermark" style="  bottom: 3%; right: 17%;">
                                    <span style="font-size: 4px;">Wall Of <br/> Frame</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    <div>
                        <h6>{{ $product->name }}</h6>
                        <ul class="list-unstyled list-detail">
                            <li>Type: {{ $product->options->type }}</li>
                            <li>{{ $product->options->category ? 'Category: ' . $product->options->category : '' }}</li>
                            <li>Size: {{ $product->options->width .'x'.$product->options->height }}</li>
                        </ul>
                    </div>
                </td>
                <td class="text-center">
                    {{ $product->qty }}
                </td>
                <td>
                    <div class="amount">{{ ngTotalAmount($product->subtotal) }}</div>
                </td>
            </tr>
        @endforeach
    </table>
@else
<div class="alert alert-danger alert-sm space-sm" role="alert">
    <b>Your cart is empty.</b>
</div>
@endif
