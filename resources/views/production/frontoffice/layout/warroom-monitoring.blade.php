<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>
            @section('title')
                Thaiwater Monitoring
            @show
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- font-awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/bower_components/font-awesome/css/font-awesome.min.css') }}">

        <!-- template of warroom-admin -->
        <link rel="stylesheet" href="{{ asset('resources/themes/warroom/apps/css/style-warroom-admin.css') }}">

        <!-- Custom styles for this template app -->

        <link href="{{ asset('resources/themes/warroom/global/css/components.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/themes/warroom/global/css/plugins.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/themes/warroom/global/css/plugins.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/themes/warroom/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/themes/warroom/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet">
        
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/DataTables/1.10.11/css/jquery.dataTables.min.css') }}" >
        <!-- Custom styles for this template app -->

        @section('style')
        @show
    </head>

    <body>
        <!-- container -->
        <div class="container-fluid" id="main-container">
            <!-- Content -->
            @yield('content')
            <!-- // content -->
        </div>
        <!-- // container -->

        <!-- Javascripts  -->
        <script src="{{ asset('vendor/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('vendor/DataTables/1.10.11/js/jquery.dataTables.min.js') }}"></script>
        
        @section('script')
        @show
    </body>
</html>