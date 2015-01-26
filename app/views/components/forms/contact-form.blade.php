{{ Form::open(['route' => 'contacts.create', 'method' => 'post', 'id' => 'contact-form']) }}
    <h2>Contact Us</h2>
    <div class="col-sm-6">
        <div class="form-group">
            <input type="text" class="form-control" name="first_name" placeholder="First Name *"  required="required">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <input type="text" class="form-control" name="last_name" placeholder="Last Name *"  required="required">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email Address *"  required="required">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <input type="text" class="form-control" name="company" placeholder="Company">
        </div>
    </div>
    <div class="col-md-12">
        <textarea class="form-control" name="message" placeholder="Message *" required="required"></textarea>
    </div>
    <div class="col-md-12 space-sm">
        <button class="btn btn-submit pull-right">Send</button>
    </div>
{{ Form::close() }}