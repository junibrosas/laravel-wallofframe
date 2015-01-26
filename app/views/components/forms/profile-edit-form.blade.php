<div class="clearfix"></div>
{{ Form::open(['route' => 'customer.account.update', 'method' => 'post', 'class'=>'mainbox space-sm']) }}

    <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email Address" value="{{ $user->email }}" reqiored="required">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ $user->getProfile()->first_name }}" reqiored="required">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ $user->getProfile()->last_name }}" reqiored="required">
    </div>

    <div class="form-actions form-group">
        <button type="submit" class="btn btn-default btn-sm btn-purchase pull-right">Submit</button>
    </div>
{{ Form::close() }}