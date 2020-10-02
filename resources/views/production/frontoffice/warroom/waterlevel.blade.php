{{-- @author   Permporn Kuibumrung <permporn@haii.or.th> --}}
@extends('frontoffice.layout.warroom')
{{-- JavaScript --}}
@section('script')
<!-- main library -->
<script src="{{ asset('vendor/bower_components/vue/dist/vue.js') }}"></script>
<!-- // main library -->

<!-- custom script -->
<script src="{{ asset('resources/js/util.js') }}"></script>
<script src="{{ asset('resources/js/frontoffice/warroom/waterlevel_vue.js') }}"></script>
<!-- // custom script -->

@stop

<div class="col-md-3 col-sm-3" id="waterlevel">
    <!-- BEGIN REGIONAL STATS PORTLET-->
      <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase">ปริมาณน้ำในแม่น้ำ</span>
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
              <p id="date" class="btn-circle grey-salsa btn-xs text-center"> วันจันทร์, 02 สิงหาคม 2559  09:00 น.</p>
                 <!-- BEGIN WIDGET THUMB -->
                  <div class="tab-content" v-for="data in list" v-cloak>
                      <div class="tab-pane " v-bind:class="{ active: tab == data.tele_station_id }">
                        <div class="widget-thumb ">
                            <h4 class="text-center white"> @{{ data.tele_station_name }} <small class="white-gray"> @{{ data.province_name }} </small> </h4>
                            <div class="widget-thumb-wrap">
                                <div class="widget-thumb-body text-center">
                                    <h1 style="font-size:5em;" class="widget-thumb-body-stat " data-counter="counterup" data-value="">@{{ data.water_level }}</h1>
                                    <span class="widget-thumb-subtitle">(ม.รทก.)</span>
                                </div>
                                <div class="widget-thumb-body text-center">
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value=""> @{{ data.percent }}  <small>(%)</small></span>
                                    <span class="widget-thumb-subtitle">(เทียบความจุลำน้ำ)</span>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <!-- END WIDGET THUMB -->
                  <ul class="nav nav-tabs text-center">
                      <li v-bind:class="{ active: tab == data.tele_station_id}" v-for="data in list" v-on:click="tab = data.tele_station_id">
                      	<a><small>@{{ data.wl_tele_time }}</small><h5><i class="fa fa-tint"></i></h5><h5>@{{ data.water_level }}</h5></a>
                      </li>
                  </ul>
          </div>
      </div>
    <!-- END REGIONAL STATS PORTLET-->
</div>  


