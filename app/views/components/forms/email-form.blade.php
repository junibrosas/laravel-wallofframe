{{ Form::open(['class' => 'form-horizontal', 'method'=>'get']) }}
    {{ Form::hidden('code', $code) }}
    <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
        <input id="login-username" type="text" class="form-control" name="replacement_email" value="" placeholder="Enter working email address">
    </div>

    <div style="margin-top:10px" class="form-group">
        <div class="col-sm-12 controls">
          <button type="submit" class="btn btn-success pull-right">Continue</button>
        </div>
    </div>
{{ Form::close() }}
