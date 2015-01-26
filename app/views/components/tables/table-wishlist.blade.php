@if( count($products) > 0 )
    <table class="table table-striped table-product">
        <tr>
            <th>Item(s)</th>
            <th>Date</th>
            <th class="text-right">Price</th>
            <th></th>
        </tr>
        @foreach( $products as $product )
            <tr>
                <td>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ $product->present()->url }}">
                            <img src='{{ $product->present()->image('square') }}' data-zoom-image="{{ asset('uploads/products/large/frame2.jpg') }}" class="img-responsive" width="150"/>
                            </a>
                            {{ Form::open(['route' => 'customer.wishlist.add', 'method'=>'get']) }}
                                {{ Form::hidden('product', $product->id) }}
                                {{ Form::hidden('action', 'remove') }}
                                <button type="submit" class="btn btn-danger btn-xs space-xs btn-block">remove</button>
                            {{ Form::close() }}
                        </div>
                        <div class="col-md-9 no-pad">
                            <h6>{{ $product->present()->title }}</h6>
                            <ul class="list-unstyled list-detail">
                                <li>Type: {{ $product->present()->type }}</li>
                                <li>Category: {{ $product->present()->category }}</li>
                                <li>Size: {{ $product->present()->size }}</li>
                             </ul>
                        </div>
                    </div>
                </td>
                <td>
                    {{ $product->present()->wishlistDate }}
                </td>
                <td>
                    <div class="amount">{{ $product->present()->priceMark }}</div>
                </td>
                <td style="width: 5%">
                    <a href="{{ route('bag.add', $product->id) }}" class="btn btn-default btn-xs btn-block btn-purchase"> Add to Bag</a>
                </td>
            </tr>
        @endforeach
    </table>
@else
<div class="alert alert-danger alert-sm space-sm" role="alert">
    <b>Your wishlist is empty.</b>
</div>
@endif
