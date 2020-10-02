{{-- for admin warroom --}}
@extends('frontoffice.layout.warroom-monitoring')

{{-- style --}}
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

{{-- JavaScript --}}
@section('script')
<!-- main library -->
<script src="{{ asset('vendor/bower_components/vue/dist/vue.js') }}"></script>
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
<script src="{{ asset('resources/js/frontoffice/warroom/map/map_config_rainfall24h_home.js') }}"></script>
<script src="{{ asset('resources/js/map.js') }}"></script>
<!-- // custom map script -->

<!-- custom datatable script -->
<script src="{{ asset('resources/js/frontoffice/warroom/rainfall24h_home.js') }}"></script>
<!-- // custom datatable script -->

<script type="text/javascript">
$(document).ready(function(){
    initmap(cfg);   // init map config
});
</script>
@stop

<div class="row">
    <!-- map -->
    <div class="col-md-6">
        <div id="map" style="width:100%;height:500px"></div>
    </div>
    
    <div class="col-md-6">
      <header><h3> ฝน 24 ชม. (ย้อนหลัง)</h3></header>
      <table class="table table-striped table-hover" id="rainfall24h_home">
         <thead>
            <tr>
                <th>ชื่อสถานี</th>
                <th>จังหวัด</th>
                <th>ฝนล่าสุด</th>
                <th>ฝนสะสม (มม.)</th>
            </tr>
        </thead> 
      </table>
    </div>
</div>
<center style="margin-top:30px;">view 14/50 </center>
<hr style="margin:20px;border-color: #000;border-style: dotted;">
