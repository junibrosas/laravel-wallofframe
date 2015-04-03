<?php
// sample usage {{ HTML::menu_active('home', 'Home') }}
HTML::macro('menu_active', function($route, $title, array $parameters = array(), array $attributes = array())
{
    $url = str_replace(Request::root() . '/', '', route($route));

    if ( Request::is( $url ) || Request::is( $url . '/*') ) {
        $active ='<li class="active">' . link_to_route($route, $title, $parameters, $attributes) . '</li>';
    }
    else {
        $active ='<li>' . link_to_route($route, $title, $parameters, $attributes) . '</li>';
    }

    return $active;
});

