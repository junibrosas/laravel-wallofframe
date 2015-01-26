<div class="{{ isset($type) ? '' : 'clearfix' }}"></div>
<?php $form_class = isset($type) ? '' : 'space-sm'; ?>

{{ Form::open(['route' => 'checkout.shipping.add', 'method' => 'post', 'class' => 'mainbox '.$form_class ]) }}
    {{ Form::hidden('shipping_address', $address->id) }}
    <div class="form-group">
        <label for="">Email Address</label>
        <input class="form-control" placeholder="" type="email" name="email" required="required" value="{{ Input::old('email') }}">
    </div>
    <div class="form-group">
         <label for="">First Name</label>
        <input class="form-control" placeholder="" type="text" name="first_name" required="required" value="{{ Input::old('first_name') }}">
    </div>
    <div class="form-group">
        <label for="">Last Name</label>
        <input class="form-control" placeholder="" type="text" name="last_name" required="required" value="{{ Input::old('last_name') }}">
    </div>
    <div class="form-group">
        <label for="">Mobile Number</label>
        <input class="form-control" placeholder="" type="text" name="mobile_number" required="required" value="{{ Input::old('mobile_number') }}">
    </div>
    <div class="form-group">
        <label for="">Address</label>
        <input class="form-control" placeholder="" type="text" name="address" required="required" value="{{ Input::old('address') }}">
    </div>
    <div class="form-group">
        <label for="">Landmark</label>
        <input class="form-control" placeholder="" type="text" name="landmark" value="{{ Input::old('landmark') }}">
    </div>
    <div class="form-actions form-group  {{ isset($type) ? '' : 'clearfix' }}">
        <button type="submit" class="btn btn-default btn-sm btn-purchase pull-right">Continue</button>
    </div>
    <div class="col-md-12"></div>
{{ Form::close() }}