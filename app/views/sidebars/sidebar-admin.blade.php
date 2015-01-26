<ul class="nav nav-pills nav-stacked nav-user">
    {{ HTML::menu_active('admin.dashboard.index', 'My Account', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('admin.design.manage', 'Manage Designs', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('admin.frameApp.manage', 'Manage Application', array(), ['class'=>'page-scroll']) }}
</ul>