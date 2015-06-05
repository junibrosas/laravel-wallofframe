<!DOCTYPE html>
<html lang="en" ng-app="wallOfFrame">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ isset($pageTitle) ? $pageTitle . ' |' : '' }}  Wall of Frame</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    {{ link_css('assets/datatables/jquery.dataTables.css') }}
    {{ link_css('css/style.css') }}
    {{ link_css('css/utils.css') }}
    {{ link_css('css/media.css') }}
    {{ link_css('css/range.css') }}
    {{ link_css('css/borders.css') }}
    {{ link_css('css/animate.min.css') }}
    {{ link_css('assets/font-awesome/css/font-awesome.min.css') }}
    {{ link_css('assets/owl-carousel/owl.carousel.css') }}
    {{ link_css('assets/owl-carousel/owl.theme.css') }}
    {{ link_css('iboostme/js/angular/ngTable/ng-table.css') }}
    {{ link_css('assets/icheck/skins/flat/red.css') }}
    {{ link_css('js/jqNailThumb/jquery.nailthumb.1.1.min.css') }}
    {{ link_js('js/jquery.js') }} {{--jQuery--}}

    <!-- Digital Countdown Timer -->
    {{ link_js('assets/countdown/countdown.js') }}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Components specific for this page -->
    @yield('header')

</head>
    <body ng-controller="MainController as main" ng-cloak>
        @yield('layout')
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> {{--Bootstrap--}}

        {{ link_js('js/grids.js') }}
        {{ link_js('iboostme/js/angular/angular.js') }}{{--AngularJS--}}
        {{ link_js('assets/owl-carousel/owl.carousel.js') }} {{--OwlCarousel--}}
        {{ link_js('assets/datatables/jquery.dataTables.min.js') }} {{--DataTables--}}
        {{ link_js('assets/icheck/icheck.min.js') }} {{--iCheck--}}
        {{ link_js('js/jqNailThumb/jquery.nailthumb.1.1.min.js') }} {{--NailThumb--}}
        {{ link_js('iboostme/wallofframe/main.js') }}

        <!-- Specific Angular Modules -->
        @yield('modules')

        {{--Angular Modules--}}
        {{ link_js('iboostme/js/angular/angular-slider/angular-slider.js') }}
        {{ link_js('iboostme/js/angular/currency/finance.js') }}
        {{ link_js('iboostme/js/angular/ngFlow/ng-flow.js') }}
        {{ link_js('iboostme/js/angular/ngFlow/ng-flow-standalone.js') }}
        {{ link_js('iboostme/js/angular/ngTable/ng-table.min.js') }}
        {{ link_js('iboostme/js/angular/ngCheckList/checklist-model.js') }}
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,700italic,700,600,400' rel='stylesheet' type='text/css'>
        {{ link_js('iboostme/wallofframe/app.js')}}

        <script>
            var mainApp = {};
            mainApp.baseUrl = "{{ url() }}";
            mainApp.publicPath = '{{ asset('') }}';
        </script>

        {{--Angular Controllers--}}
        {{ link_js('iboostme/wallofframe/angular/MainController.js') }}

        {{--Angular Services--}}
        {{ link_js('iboostme/wallofframe/angular/services/ProductService.js') }}

        <!-- Components specific for this page -->
        @yield('footer')

    </body>
</html>