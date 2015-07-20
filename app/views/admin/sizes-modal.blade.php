<div class="row text-left">
    <div class="col-md-12">
        <h1>Sizes</h1>
    </div>

    <div class="col-md-8 orders space-top-sm">
        {{ Form::open(['route'=>'admin.size.custom.delete', 'method' => 'post' ]) }}
            {{ Form::hidden('product_id', $product_id) }}
            {{--Sizes Table--}}
            @if(count($sizes) > 0)
                <table class="table table-striped ng-table-responsive">
                    <thead>
                    <tr>
                        <th>Width</th>
                        <th>Height</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($sizes as $size)
                            <tr ng-repeat="size in tableData" style="cursor: pointer;">
                                <td class="text-left">{{ $size->width }}</td>
                                <td class="text-left">{{ $size->height }}</td>
                                <td class="text-left">{{ $size->price }}</td>
                                <td><button type="submit" name="size_id" value="{{ $size->id }}"class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger " ng-show="tableData <= 0">
                    No data available
                </div>
            @endif
        {{ Form::close() }}
    </div>

    <div class="col-md-4">
        <h5>Add New Size</h5>

        {{--Add Form--}}
        {{ Form::open(['route'=>'admin.size.custom.add', 'method' => 'post' ]) }}
            {{ Form::hidden('product_id', $product_id) }}
            <div class="form-group">
                <label for="width">Width</label>
                <input class="form-control" type="text" name="width">
            </div>
            <div class="form-group">
                <label for="height">Height</label>
                <input class="form-control" type="text" name="height">
            </div>
            <div class="form-group">
                <label for="password">Price</label>
                <input class="form-control" type="text" name="price">
            </div>

            <button type="submit" class="btn btn-default"> Create </button>
        {{ Form::close() }}
    </div>
</div>