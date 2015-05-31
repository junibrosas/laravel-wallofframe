<ul class="nav nav-pills nav-stacked nav-user">
    {{--{{ HTML::menu_active('admin.dashboard.index', 'My Account', array(), ['class'=>'page-scroll']) }}--}}

    {{ HTML::menu_active('admin.customers', 'Customers', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('contacts.index', 'Inbox', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('admin.orders', 'Orders', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('admin.design.manage', 'Designs', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('admin.frame.border', 'Borders', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('admin.frame.sizes', 'Sizes', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('admin.brands.index', 'Brands', array(), ['class'=>'page-scroll']) }}

</ul>