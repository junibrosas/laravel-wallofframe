<h4 class="side-heading">My Account</h4>
<ul class="nav nav-pills nav-stacked nav-user">
    {{ HTML::menu_active('customer.account', 'My Account', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('customer.track.order', 'Tracking Order', array(), ['class'=>'page-scroll']) }}
    {{ HTML::menu_active('customer.wishlist', 'Wishlist', array(), ['class'=>'page-scroll']) }}
</ul>