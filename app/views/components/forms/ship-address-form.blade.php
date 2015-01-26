<div class="{{ isset($type) ? '' : 'clearfix' }}"></div>
<?php $form_class = isset($type) ? '' : 'space-sm'; ?>

{{ Form::open(['route' => 'customer.address.add', 'method' => 'post', 'class' => 'mainbox '.$form_class ]) }}
    {{ Form::hidden('shipping_address', $address->id) }}
    <div class="form-group">
        <input class="form-control" placeholder="First Name" type="text" name="first_name" required="required" value="{{ $address->first_name }}">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="Last Name" type="text" name="last_name" required="required" value="{{ $address->last_name }}">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="Mobile Number" type="text" name="mobile_number" required="required" value="{{ $address->mobile_number }}">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="Address" type="text" name="address" required="required" value="{{ $address->address }}">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="Landmark" type="text" name="landmark" value="{{ $address->landmark }}">
    </div>
    <div class="form-actions form-group  {{ isset($type) ? '' : 'clearfix' }}">
        <button type="submit" class="btn btn-default btn-sm btn-purchase pull-right">Continue</button>
    </div>
    <div class="col-md-12"></div>
{{ Form::close() }}