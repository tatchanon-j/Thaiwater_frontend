<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>IGIS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="{{ asset('vendor/bower_components/font-awesome/css/font-awesome.min.css') }}">

        <link rel="stylesheet" href="{{ asset('vendor/bower_components/leaflet/dist/leaflet.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bower_components/Leaflet.awesome-markers/dist/leaflet.awesome-markers.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bower_components/leaflet.loading/src/Control.Loading.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bower_components/Leaflet.defaultextent/dist/leaflet.defaultextent.css') }}">

        <style>
        body {
            padding: 0;
            margin: 0;
        }
        html, body, #map {
            height: 100%;
            width: 100%;
        }

        /* info box on top-right of map */
        .info {
            padding: 6px 8px;
            font: 14px/16px sans-serif, Arial, Helvetica;
            background: rgba(255,255,255,0.8);
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 5px;
        }
        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }
        .info .title-container {
            margin-bottom: 20px;
        }
        .info .title {
            float: left;
            font-weight: bold;
        }
        .info .button {
            float: right;
            width: 40px;
            right: 0;
        }
        </style>
    </head>

    <body>
        <div id="map"></div>

        <!-- Javascripts
        ================================================== -->
        <script src="{{ asset('vendor/jquery/3.5.1/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('vendor/bower_components/geojson/geojson.min.js') }}"></script>

        <script src="{{ asset('vendor/bower_components/leaflet/dist/leaflet.js') }}"></script>
        <script src="{{ asset('vendor/bower_components/leaflet-ajax/dist/leaflet.ajax.min.js') }}"></script>
        <script src="{{ asset('vendor/bower_components/Leaflet.awesome-markers/dist/leaflet.awesome-markers.js') }}"></script>
        <script src="{{ asset('vendor/bower_components/leaflet-providers/leaflet-providers.js') }}"></script>
        <script src="{{ asset('vendor/bower_components/leaflet.loading/src/Control.Loading.js') }}"></script>
        <script src="{{ asset('vendor/bower_components/Leaflet.defaultextent/dist/leaflet.defaultextent.js') }}"></script>

        <script src="{{ asset('resources/js/map_config.js') }}"></script>
        <script src="{{ asset('resources/js/map.js') }}"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            initmap(cfg);
        });
        </script>
    </body>
</html>
