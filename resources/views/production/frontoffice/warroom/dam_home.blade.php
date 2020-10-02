

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
<script src="{{ asset('resources/js/frontoffice/warroom/map/map_config_dam.js') }}"></script> <!-- damSample.json for show map -->
<script src="{{ asset('resources/js/mapDam.js') }}"></script> <!-- thailand77.json map thailand -->
<!-- // custom map script -->

<!-- custom datatable script -->
<script src="{{ asset('resources/js/frontoffice/warroom/dam_datatable.js') }}"></script> <!-- data show datatable -->
<!-- // custom datatable script -->

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
    <div class="col-md-6">
        <h3>ข้อมูลน้ำในเขื่อน</h3>
        <table class="table table-striped table-hover" id="dam_home">
            <thead align="center">
                <tr>
                    <th width="93px">เขื่อน</th>
                    <th width="93px">น้ำไหลลงอ่าง<br><small>(ล้าน ลบ.ม/วัน)</small></th> 
                    <th width="112px">ปริมาณน้ำในอ่าง<br><small>(%เทียบกับ รนก.)</small></th>
                    <th width="98px">ใช้การได้จริง<br><small>(%เทียบกับ รนก.)</small></th> 
                    <th width="93px">น้ำระบาย<br><small>(ล้าน ลบ.ม/วัน)</small></th>
                </tr>
            </thead>
            <tbody align="center"></tbody>
        </table>

        <div>
            %รนก. &nbsp;
            <span class="label radius" style="background:#ffc000"> <=30 น้ำน้อยวิกฤติ </span>&nbsp;
            <span class="label radius" style="background:#00B050"> >30-50 น้ำน้อย </span>&nbsp;
            <span class="label radius" style="background:#003CFA"> >50-80 น้ำปานกลาง </span>&nbsp;
            <span class="label radius" style="background:#FF0000"> >80-100 น้ำมาก </span>&nbsp;
            <span class="label radius" style="background:#C70000"> >100 เกินความจุเก็บกัก </span>
        </div>
    </div>
</div>
@stop

