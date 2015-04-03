<?php
// angularJS alert template
HTML::macro('ngAlertTemplate', function(){
    ?>
    <div ng-class="status.status == 'error' ? 'alert alert-danger' : 'alert alert-success'" ng-show="hasStatus == true ? true : false">
        {{ status.message }}
    </div><?php
});