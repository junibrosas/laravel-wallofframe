{{ Form::open(['route' => 'users.auth', 'class' => 'form-horizontal']) }}
    @if( isset( $redirect ) )
        {{ Form::hidden('redirect', $redirect) }}
    @endif

    @if( isset( $product_id ) )
        {{ Form::hidden('redirect', $redirect) }}
    @endif
    <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">
    </div>

    <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
    </div>

    <div class="input-group">
        <div class="checkbox">
        <label>
            <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
        </label>
        </div>
    </div>
    <div style="margin-top:10px" class="form-group">
        <div class="col-sm-12 controls">
          <button type="submit" class="btn btn-success">Login</button>
          <a id="btn-fblogin" href="{{ route('fb.login') }}" class="btn btn-primary">Login with Facebook</a>

        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12 control">
            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                Don't have an account!
            <a href="{{ route('signup') }}" class="signup-link">
                Sign up Here
            </a>
            </div>
        </div>
    </div>
{{ Form::close() }}
