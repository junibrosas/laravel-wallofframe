{{--Table Form--}}
{{ Form::open(['route' => 'admin.frame.border.manage', 'method' => 'post']) }}

    {{--Form Actions--}}
    <div class="col-md-3 no-pad-left">
        <div class="form-group">
            <select class="form-control col-md-8" name="bulk_action">
                <option value="-1">Bulk Action</option>
                <option value="activate">Activate</option>
                <option value="deactivate">Deactivate</option>
                <option value="delete">Delete Permanently</option>
            </select>
        </div>
    </div>
    <div class="col-md-9 no-right">
          <button type="submit" name="apply" class="btn btn-default">Apply</button>
    </div>

    {{--Table Frame Borders--}}
    @include('components.tables.table-borders')
{{ Form::close() }}