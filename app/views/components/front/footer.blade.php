<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="title">Wall of Frame</h2>
                <p class="desc">
                    Wall of Frame is the Middle East’s Home of luxury brands for your Home Designs and Framing.
                </p>
            </div>
            <div class="col-md-3">
                <h2>Categories</h2>
                <ul class="list-unstyled">
                    @foreach( $categories as $category )
                        {{ HTML::menu_active('category', $category->name, array($category->slug), ['class'=>'page-scroll']) }}
                    @endforeach
                </ul>
            </div>
            <div class="col-md-5">
                @include('components.forms.contact-form')
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <span class="copyright">Copyright &copy; Wall Of Frame 2015</span>
            </div>
            <div class="col-md-3">
                <ul class="list-inline social-buttons">
                    <li><a href="https://www.facebook.com/pages/Wall-Of-Frame/903348669675279?fref=ts"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 ">
                <ul class="list-inline quicklinks pull-right">
                    <li><a href="#">Privacy Policy</a>
                    </li>
                    <li><a href="#">Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>