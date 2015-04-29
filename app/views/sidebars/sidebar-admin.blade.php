<ul class="nav nav-pills nav-stacked nav-user">
    {{--{{ HTML::menu_active('admin.dashboard.index', 'My Account', array(), ['class'=>'page-scroll']) }}--}}
    {{ HTML::menu_active('admin.customers', 'Customers', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('admin.orders', 'Orders', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('admin.design.manage', 'Frame Designs', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('admin.frameApp.manage', 'Frame Application', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('admin.frame.border', 'Frame Borders', array(), ['class'=>'page-scroll']) }}

</ul>