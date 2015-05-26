<div ng-controller="ContactFormController">
    <form method="post" id="contact-form" ng-submit="contactFormSubmit()">
        <div class="row">
            <div  class="col-sm-12">
                <div class="alert alert-success" id="contact-ajax-response" role="alert">
                </div>
            </div>
        </div>
        <h2>Contact Us</h2>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" ng-model="contact.first_name" name="first_name" placeholder="First Name *"  required="required">
                <div class="label label-danger" ng-show="errors.first_name[0]">@{{ errors.first_name.toString()}}</div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" ng-model="contact.last_name" name="last_name" placeholder="Last Name *"  required="required">
                <div class="label label-danger" ng-show="errors.last_name[0]">@{{ errors.last_name.toString()}}</div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="email" class="form-control" ng-model="contact.email" name="email" placeholder="Email Address *"  required="required">
                <div class="label label-danger" ng-show="errors.email[0]">@{{ errors.email.toString()}}</div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" ng-model="contact.company" name="company" placeholder="Company">
                <div class="label label-danger" ng-show="errors.company[0]">@{{ errors.company.toString()}}</div>
            </div>
        </div>
        <div class="col-md-12">
            <textarea class="form-control" ng-model="contact.message" name="message" placeholder="Message *" required="required"></textarea>
            <div class="label label-danger" ng-show="errors.message[0]">@{{ errors.message.toString()}}</div>
        </div>
        <div class="col-md-12 space-sm">
            <button class="btn btn-submit pull-right">Send</button>
        </div>
    </form>
</div>
