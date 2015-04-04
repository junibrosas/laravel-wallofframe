<ul class="nav nav-pills nav-stacked nav-user">
    {{ HTML::menu_active('customer.account', 'My Account', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('customer.track.order', 'My Orders', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('customer.wishlist', 'My Wishlist', array(), ['class'=>'page-scroll']) }}
</ul>