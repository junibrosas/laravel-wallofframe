{{ Form::open(['route' => 'users.store', 'method' => 'post', 'class'=>'form-horizontal', 'id' => 'signupform', 'role'=>'form']) }}

    <div id="signupalert" style="display:none" class="alert alert-danger">
        <p>Error:</p>
        <span></span>
    </div>

    <div class="form-group">
        <label for="email" class="col-md-3 control-label">Username</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $user->username }}">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-md-3 control-label">Email</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="email" placeholder="Email Address" value="{{ $user->email }}">
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-md-3 control-label">First Name</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ $user->getProfile()->first_name }}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-md-3 control-label">Last Name</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ $user->getProfile()->last_name }}">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-md-3 control-label">Password</label>
        <div class="col-md-9">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-md-3 control-label">Retype </label>
        <div class="col-md-9">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
        </div>
    </div>

    <div class="form-group">
        <!-- Button -->
        <div class="col-md-offset-3 col-md-9">
            <button id="btn-signup" type="submit" class="btn btn-success"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
            <a href="{{ route('fb.signup') }}" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</a>
        </div>
    </div>

    <div  class="form-group">
        <div class="col-md-12">
            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                Already have an account?
            <a href="{{ route('login') }}" class="signup-link">
                Sign in here!
            </a>
            </div>
        </div>
    </div>
{{ Form::close() }}