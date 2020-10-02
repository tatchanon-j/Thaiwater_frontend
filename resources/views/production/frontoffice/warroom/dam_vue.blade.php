{{-- @author   Thitiporn Meeprasert <thitiporn@haii.or.th> --}}

@extends('frontoffice.layout.warroom')

{{-- JavaScript --}}
@section('script')
<!-- main library -->
<script src="{{ asset('vendor/bower_components/vue/dist/vue.js') }}"></script>
<!-- // main library -->

<!-- custom script -->
<script src="{{ asset('resources/js/util.js') }}"></script>
<script src="{{ asset('resources/js/frontoffice/warroom/dam_vue.js') }}"></script>
<!-- // custom script -->

@stop

{{-- Content --}}
@section('content')
<!-- DAM -->
<div class="col-md-3 col-sm-3" id="dam">
    <!-- BEGIN REGIONAL STATS PORTLET-->
      <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase">ปริมาณน้ำในเขื่อน</span>
            </div>
            <div class="actions">
              <div class="btn-group btn-group-devided" data-toggle="buttons">
                <label class="btn btn-circle btn-transparent bg-green btn-xs active">
                </label>
                <label class="btn btn-circle btn-transparent bg-warning btn-xs active">
                  <input id="option1" class="toggle" type="radio" name="options">
                </label>
                <label class="btn btn-circle btn-transparent btn-danger btn-xs active">
                </label>
              </div>
                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
            </div>
        </div>
          <div class="portlet-body">
            <p id="date"  class="btn-circle grey-salsa btn-xs text-center"> วันจันทร์, 02 สิงหาคม 2559  09:00 น.
            </p>
            <div class="tab-content" v-for="data in list" v-cloak>
              <!-- BEGIN WIDGET THUMB -->
              <div class="tab-pane " v-bind:class="{ active: tab == data.dam_id}">
                <div class="widget-thumb text-center">
                  <h4 class="text-center white"> @{{ data.dam_name }} <small class="white-gray">@{{ data.province_name }}</small> </h4>
                  <div class="widget-thumb-wrap">
                    <div class="widget-thumb-body">
                        <h1 style="font-size:5em;" class="widget-thumb-body-stat" data-counter="counterup" data-value="91" >@{{ data.dam_storage_percent }}</h1>
                        <span class="widget-thumb-subtitle">(กักเก็บ % รนก.)</span>
                    </div>
                    <div class="widget-thumb-body" style="width: 50%;float: left">
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="8.4">@{{ data.dam_inflow | numberFormat }}</span>
                        <span class="widget-thumb-subtitle">น้ำไหลเข้า</span>
                    </div>
                    <div class="widget-thumb-body" style="width: 49%;">
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7.2">@{{ data.dam_released | numberFormat }}</span>
                        <span class="widget-thumb-subtitle">น้ำไหลออก</span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
          <ul class="nav nav-tabs text-center">
            <li v-bind:class="{ active: tab == data.dam_id}" v-for="data in list" v-on:click="tab = data.dam_id">
              <a><small> @{{ data.dam_name }} </small></a>
            </li>
          </ul>
      </div>
  </div>
    <!-- END REGIONAL STATS PORTLET-->
</div>
<!-- END DAM -->
@stop
