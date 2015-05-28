<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="title">Wall of Frame</h2>
                <p class="desc">
                    Wall OF Frame is the Middle East’s Home of luxury brands for your Home Designs and Framing.
                </p>
                <!-- INSTANSIVE WIDGET -->
                <div class="space-md"></div>
                <h2 class="title">Instagram Photos</h2>
                <script src="//instansive.com/widget/js/instansive.js"></script>
                <!-- INSTANSIVE WIDGET --><script src="//instansive.com/widget/js/instansive.js"></script><iframe src="//instansive.com/widgets/28fc0f9148e0ce4c46f712da3ab7db1629f31528.html" id="instansive_28fc0f9148" name="instansive_28fc0f9148"  scrolling="no" allowtransparency="true" class="instansive-widget" style="width: 70%; border: 0; overflow: hidden;"></iframe>
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
                    <li><a href="{{ Config::get('site.social_facebook') }}"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{ Config::get('site.social_instagram') }}"><i class="fa fa-instagram"></i></a></li>
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