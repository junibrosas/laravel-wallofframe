<div class="space-sm"></div>
{{ Form::open(['route' => 'customer.address.add', 'method' => 'post', 'class' => 'mainbox space-sm' ]) }}
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
    <div class="form-actions form-group  clearfix">
        <button type="submit" class="remodal-confirm">Add</button>
    </div>
    <div class="col-md-12"></div>
{{ Form::close() }}