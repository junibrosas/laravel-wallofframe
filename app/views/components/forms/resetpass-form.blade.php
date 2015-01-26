{{ Form::open(['route' => 'users.reset.password', 'method' => 'post']) }}
    {{ Form::hidden('token', $token) }}
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" placeholder="Password" type="password" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" id="password_confirmation">
    </div>

    <div class="form-actions form-group">
        <button type="submit" class="btn btn-primary pull-right">Continue</button>
    </div>
{{ Form::close() }}