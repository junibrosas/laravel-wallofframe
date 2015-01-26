{{ Form::open(['route' => 'password.update', 'method' => 'post', 'class' => 'mainbox']) }}
    <div class="form-group">
        <input class="form-control" placeholder="Current Password" type="password" name="old_password" id="password">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="New Password" type="password" name="new_password" id="password">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="Confirm New Password" type="password" name="new_password_confirmation" id="password_confirmation">
    </div>

    <div class="form-actions form-group">
        <button type="submit" class="btn btn-default btn-sm btn-purchase pull-right">Submit</button>
    </div>
{{ Form::close() }}