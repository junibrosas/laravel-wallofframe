@if( count($products) > 0 )
    <table class="table table-striped table-product">
        <tr>
            <th>Item(s)</th>
            <th>Date</th>
        </tr>
        @foreach( $products as $product )
            <tr>
                <td>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ $product->present()->url }}">
                            <img src='{{ $product->present()->imageWithType('square') }}' class="img-responsive" width="150"/>
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
                             </ul>
                        </div>
                    </div>
                </td>
                <td>
                    {{ $product->present()->wishlistDate }}
                </td>
            </tr>
        @endforeach
    </table>
@else
<div class="alert alert-danger" role="alert">
    <b>Your wishlist is empty.</b>
</div>
@endif
