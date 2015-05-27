<div id="smart-header">
        <div class="container">
        <div class="col-md-6 hidden-xs">
        </div>
        <div class="col-md-6">
            <ul class="list-inline pull-right list-smart">
                @if(Auth::check() == false)
                    <li><a class="link" href="{{ route('signup') }}">Register</a></li>
                    <li><a class="link" href="{{ route('login') }}">Sign in</a></li>
                @else
                    <li><a class="link" href="{{ route('customer.account') }}">Hi {{ Auth::user()->username }}</a></li>
                @endif
                <li class="dropdown">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle link" style="cursor: pointer">@{{ main.outCurrency  }} <b class="caret"></b></a>
                    <ul class="dropdown-menu" >
                        <li ng-repeat="currency in main.currencies">
                            <a href="#" ng-click="main.getSelectedCurrency(currency)">@{{ currency }}</a>
                        </li>
                    </ul>
                </li>

                <li><a class="link" href="{{ route('cart.index') }}">My Bag (<span id="cart-item-count"></span>) <i class="fa fa-shopping-cart"></i></a></li>
                @if(Auth::check())
                    <li><a class="link" href="{{ route('logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
    </div>

    <div class="text-center logo">
        <a href="{{ route('home.index') }}"><img src="{{ asset('img/logo.png') }}"></a>
    </div>


    <!-- Navigation -->
    <div class="border-top border-full-bottom">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                </div>


                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="nav navbar-nav ">

                        <li><a href="{{ route('home.index') }}" class="page-scroll home-icon"><i class='fa fa-home'></i></a></li>
                        {{ HTML::menu_active('arrivals', 'New Arrivals', array(), ['class'=>'page-scroll']) }}
                        {{--{{ HTML::menu_active('selling', 'Best Selling', array(), ['class'=>'page-scroll']) }}--}}
                        {{ HTML::menu_active('brands', 'Brands', array(), ['class'=>'page-scroll']) }}
                        @foreach( $categories as $category )
                            {{ HTML::menu_active('category', $category->name, array($category->slug), ['class'=>'page-scroll']) }}
                        @endforeach
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>  
    </div>