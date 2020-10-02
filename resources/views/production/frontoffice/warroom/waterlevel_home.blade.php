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
<script src="{{ asset('resources/js/frontoffice/warroom/map/map_config_waterlevel.js') }}"></script>
<script src="{{ asset('resources/js/map.js') }}"></script>
<!-- // custom map script -->

<!-- custom datatable script -->
<script src="{{ asset('resources/js/frontoffice/warroom/waterlevel_home.js') }}"></script>
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
   <h3>น้ำในลำน้ำ</h3>
      <table class="table table-striped table-hover" id="waterlevel_home">
         <thead>
            <tr>
               <th>ขื่อสถานี</th>
               <th>วันที่ </th>
               <th>เวลา </th>
               <th>น้ำลึก <br><em>(ม.)</em></th>
               <th>ระดับน้ำ <br><em>(ม.รทก)</em></th>
               <th>ความจุลำน้ำ <br><em>(ม.รทก)</em></th>
               <th>สถานะการณ์น้ำ</th>
               <th>สถานะ</th>
            </tr>
           </thead>
      </table>
      <div id="">
         %ความจุลำน้ำ
         <span class="label label-default btn-xs" style="background:#DB802B"><=10
         น้ำน้อยวิกฤติ</span>
         <span class="label label-default btn-xs" style="background:#FFC000">>10-30
         น้ำน้อย</span>
         <span class="label label-default btn-xs" style="background:#00B050">>30-70
         น้ำปกติ</span>
         <span class="label label-default btn-xs" style="background:#003CFA">>70-100
         น้ำมาก</span>
         <span class="label label-default btn-xs" style="background:#FF0000">>100
         น้ำล้นตลิ่ง</span>
      </div>
   </div>
</div>
<center style="margin-top:30px;">view 21/50 </center>
<hr style="margin:20px;border-color: #000;border-style: dotted;">
