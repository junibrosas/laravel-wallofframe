@if( count($products) > 0 )
    <table class="table table-striped table-product">
        <tr>
            <th>Item(s)</th>
            <th></th>
            <th>Quantity</th>
            <th class="text-right">Price</th>
        </tr>
        @foreach( $products as $product )
            {{ $product->options->watermarkColor  }}
            <tr>
                <td>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ $product->options->url }}">
                                <div style="position: relative; width: 80px">
                                    <img src='{{ $product->options->image }}'  class="img-responsive" width="80"/>

                                    {{--Logo Watermark--}}
                                    <div class="watermark" style="bottom: 3%;right: 4%;">
                                        <img src="{{ asset('img/watermark-black.png') }}" alt="Wall Of Frame Watermark" width="20" style="box-shadow: none;">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    <div>
                        <h6>{{ $product->name }}</h6>
                        <ul class="list-unstyled list-detail">
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
