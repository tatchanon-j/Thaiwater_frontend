<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>
            @section('title')
            warroom
            @show
        </title>

         <!-- font-awesome -->
        <link href="{{ asset('vendor/Font-Awesome/4.6.1/css/font-awesome.min.css') }}" rel="stylesheet">


        <!-- bootstrap -->
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/4.4.1/css/bootstrap.min.css') }}">

        <!-- template of warroom-->
        <link rel="stylesheet" href="{{ asset('resources/themes/warroom/apps/css/style-warroom.css') }}">

        <!-- Custom styles for this template app -->

        <link href="{{ asset('resources/themes/warroom/global/css/components.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/themes/warroom/global/css/plugins.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/themes/warroom/global/css/plugins.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/themes/warroom/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/themes/warroom/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet">


        <link href="{{ asset('resources/themes/warroom/layouts/layout2/css/layout-day.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/themes/warroom/layouts/layout2/css/themes/blue.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/themes/warroom/layouts/layout2/css/layout.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/themes/warroom/layouts/layout2/css/custom.min.css') }}" rel="stylesheet">
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 
        <!-- END HEAD -->

    </head>

  <body class="page-container-bg-solid bg-image-night">



  <div class="page-content-bac">
        <!--[if lt IE 8]>
        <p>You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience.</p>
        <![endif]-->

        <!-- Container -->
         <!-- banner -->

            <!--/ banner -->

            <!-- Content -->
            @yield('content')
            <!-- // content -->

            <!-- Modal -->
          
            <!-- // Modal -->
      
        <!-- // container -->

        <!-- Javascripts
        ================================================== -->
        <script src="{{ asset('resources/themes/warroom/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
                <script src="{{ asset('resources/themes/warroom/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset('resources/themes/warroom/global/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/amcharts/amcharts/amcharts.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/amcharts/amcharts/serial.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/amcharts/amcharts/pie.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/amcharts/amcharts/radar.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/amcharts/amcharts/themes/light.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/amcharts/amcharts/themes/patterns.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/amcharts/amcharts/themes/chalk.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/amcharts/ammap/ammap.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/amcharts/amstockcharts/amstock.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('resources/themes/warroom/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('resources/themes/warroom/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('resources/themes/warroom/layouts/layout2/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/layouts/layout2/scripts/demo.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('resources/themes/warroom/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <script src="{{ asset('vendor/jquery/3.5.1/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/4.4.1/js/bootstrap.min.js') }}"></script>


        @section('script')
        @show
    </body>
</html>