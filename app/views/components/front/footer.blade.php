<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h2 class="title">Wall of Frames</h2>
                    <p class="desc">
                        Wallframe is the Middle East’s Home of luxury brands for your Home Designs and Framing.
                    </p>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="list-inline pull-right social-buttons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4" id="rss-area">
                    <h2>Categories</h2>
                    <ul class="list-unstyled">
                        @foreach( $categories as $category )
                            {{ HTML::menu_active('category', $category->name, array($category->slug), ['class'=>'page-scroll']) }}
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-8 col-sm-8 no-pad" id="contact-area">
                    @include('components.forms.contact-form')
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; WallOfFrames 2014</span>
                </div>
                <div class="col-md-4"></div>
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