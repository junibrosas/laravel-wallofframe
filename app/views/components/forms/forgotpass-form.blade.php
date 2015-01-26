{{ Form::open(['route' => 'users.forgot.password', 'method' => 'post', 'class' => 'form-horizontal']) }}
    <div class="col-md-12 no-pad" style="margin-bottom: 25px">
        <p><b>Please type in your email address. We send you a link to change the password.</b></p>
    </div>
    <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="email address">
    </div>
     <div style="margin-top:10px" class="form-group">
        <div class="col-sm-12 controls">
          <button type="submit" class="btn btn-success pull-right">Continue</button>
        </div>
    </div>
{{ Form::close() }}