@if( count($products) > 0 )
    <table class="table table-striped table-product">
        <tr>
            <th>Item(s)</th>
            <th>Quantity</th>
            <th class="text-right">Price</th>
        </tr>
        @foreach( $products as $product )
            <tr>
                <td>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ $product->present()->url }}">
                            <img src='{{ $product->present()->image('square') }}' data-zoom-image="{{ asset('uploads/products/large/frame2.jpg') }}" class="img-responsive" width="150"/>
                            </a>
                            {{ Form::open(['route' => 'cart.remove']) }}
                                {{ Form::hidden('product', $product->id) }}
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
                    {{ Form::open(['route' => 'cart.quantity.change']) }}
                        {{ Form::hidden('product', $product->id) }}
                        {{ Form::select('quantity', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4'], $product->quantity, ['class'=>'select-quantity'] ) }}
                    {{ Form::close() }}
                </td>
                <td>
                    <div class="amount">{{ $product->quantity }} x {{ $product->present()->priceMark }}</div>
                </td>
            </tr>
        @endforeach
    </table>
@else
<div class="alert alert-danger alert-sm space-sm" role="alert">
    <b>Your cart is empty.</b>
</div>
@endif
