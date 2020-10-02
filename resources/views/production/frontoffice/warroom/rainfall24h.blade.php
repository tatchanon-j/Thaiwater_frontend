@extends('frontoffice.layout.warroom-monitoring')

@section('style')
<link rel="stylesheet" href="{{ asset('vendor/bower_components/leaflet/dist/leaflet.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bower_components/Leaflet.awesome-markers/dist/leaflet.awesome-markers.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bower_components/leaflet.loading/src/Control.Loading.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bower_components/Leaflet.defaultextent/dist/leaflet.defaultextent.css') }}">
<style>
[v-cloak] {
    display: none;
}
</style>
@stop

@section('script')
<!-- main library -->
<script src="{{ asset('vendor/bower_components/vue/dist/vue.js') }}"></script>
<script src="{{ asset('vendor/bower_components/vue-resource/dist/vue-resource.js') }}"></script>
<script src="{{ asset('vendor/bower_components/geojson/geojson.min.js') }}"></script>
<!-- // main library -->

<!-- leaflet -->
<script src="{{ asset('vendor/bower_components/leaflet/dist/leaflet.js') }}"></script>
<script src="{{ asset('vendor/bower_components/leaflet-ajax/dist/leaflet.ajax.min.js') }}"></script>
<script src="{{ asset('vendor/bower_components/Leaflet.awesome-markers/dist/leaflet.awesome-markers.js') }}"></script>
<script src="{{ asset('vendor/bower_components/leaflet-providers/leaflet-providers.js') }}"></script>
<script src="{{ asset('vendor/bower_components/leaflet.loading/src/Control.Loading.js') }}"></script>
<script src="{{ asset('vendor/bower_components/Leaflet.defaultextent/dist/leaflet.defaultextent.js') }}"></script>
<!-- // leaflet -->

<!-- custom map script -->
<script src="{{ asset('resources/js/frontoffice/warroom/map/map_config_rainfall24h.js') }}"></script>
<script src="{{ asset('resources/js/map.js') }}"></script>
<!-- // custom map script -->

<script type="text/javascript">
$(document).ready(function(){
    initmap(cfg);   // init map config
});
</script>
@stop

@section('content')
<div class="row">
    <!-- map -->
    <div class="col-md-6">
        <div id="map" style="width:100%;height:500px"></div>
    </div>

    <!-- data list -->
    <div class="col-md-6" id="rainfall24h">
        <h3>ฝน 24 ชม.</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ชื่อสถานี</th>
                    <th>จังหวัด</th>
                    <th>เวลา</th>
                    <th>ฝน 24 ชม. (มม.)</th>
                    <th>&nbsp;</th>
                </tr>
                <tr v-for="data in limit(list,10)" v-cloak>
                    <td>
                        <a @click="linkToMarker(data.tele_station_id, data.tele_station_lat, data.tele_station_long)">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            @{{ data.tele_station_name }}
                        </a>
                    </td>
                    <td>@{{ data.province_name }}</td>
                    <td>@{{ data.rainfall24h_time }}</td>
                    <td><span :style="'color:' + color(data.rainfall24h)">@{{ data.rainfall24h }}</span></td>
                    <td>
                        <a :href="'chart/' + data.tele_station_id">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            </thead>
        </table>

        <div v-cloak>
            <span class="label radius" v-for="color in colors" :style="'margin-right:3px;background:' + color.color"> @{{ color.text }} </span>
        </div>
    </div>
</div>
@stop