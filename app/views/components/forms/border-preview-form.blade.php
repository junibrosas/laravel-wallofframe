{{ Form::open(['route' => 'admin.frame.border.store', 'method' => 'post']) }}
    <input type="hidden" name="border" value="@{{ currentItem.id }}"/>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="@{{ currentItem.name }}" class="form-control "/>
    </div>

    <img ng-src="@{{ currentItem.imagePath }}" class="img-responsive space-bottom-xs" alt="@{{ currentItem.name }}" style="cursor: pointer">
    <button type="submit" class="btn btn-default pull-right">Save</button>
{{ Form::close() }}