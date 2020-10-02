{{-- @author   Thitiporn Meeprasert <thitiporn@haii.or.th> --}}



{{-- JavaScript --}}
@section('script')
<script src="{{ asset('vendor/bower_components/socket.io-client/socket.io.min.js') }}"></script>
<script src="{{ asset('resources/js/util.js') }}"></script>
<script src="{{ asset('resources/js/frontoffice/warroom/salinity.js') }}"></script>
@stop


<!-- SALINITY -->
<div class="col-md-3 col-sm-3">
    <!-- BEGIN REGIONAL STATS PORTLET-->
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase">คุณภาพน้ำ</span>
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
          <p id="date" class="btn-circle grey-salsa btn-xs text-center"> วันจันทร์, 02 สิงหาคม 2559  09:00 น.
          </p>
          <div class="tab-content">
              <!-- BEGIN WIDGET THUMB -->
              <div class="tab-pane active" id="tab_1_2_1">
                <div class="widget-thumb text-center">
                    <h4 class="text-center white"> สำแล <small class="white-gray">จ.ตาก </small> </h4>
                    <div class="widget-thumb-wrap">
                        <div class="widget-thumb-body">
                            <h1 id="salinity" style="font-size:5em;" class="widget-thumb-body-stat" data-counter="counterup" data-value="91">91</h1>
                            <span class="widget-thumb-subtitle">Salinity (g/L)</span>
                        </div>
                     </div>
                </div>
              </div>
               <!-- END WIDGET THUMB -->
              <div class="tab-pane" id="tab_1_2_2">
                <div class="widget-thumb text-center">
                    <h4 class="text-center white"> ศิริราช <small class="white-gray"></small> </h4>
                    <div class="widget-thumb-wrap">
                        <div class="widget-thumb-body">
                            <h1 id="salinity" style="font-size:5em;" class="widget-thumb-body-stat" data-counter="counterup" data-value="81">81</h1>
                            <span class="widget-thumb-subtitle">Salinity (g/L)</span>
                        </div>
                    </div>
                </div>
              </div>
              <div class="tab-pane" id="tab_1_2_3">
                  <div class="widget-thumb text-center">
                    <h4 class="text-center white"> สะพานกรุงเทพ <small class="white-gray">จ.เชียงใหม่ </small> </h4>
                        <div class="widget-thumb-wrap">
                            <div class="widget-thumb-body">
                                <h1 id="salinity" style="font-size:5em;" class="widget-thumb-body-stat" data-counter="counterup" data-value="52">52</h1>
                                <span class="widget-thumb-subtitle">Salinity (g/L)</span>
                            </div>
                        </div>
                	</div>
              </div>
              <ul class="nav nav-tabs text-center">
                  <li class="active">
                      <a href="#tab_1_2_1" data-toggle="tab" id="list1">
                          <small>สำแล</small>
                       </a>
                  </li>
                  <li>
                      <a href="#tab_1_2_2" data-toggle="tab" id="list2">
                      <small>ศิริราช</small>
                      </a>
                  </li>
                  <li>
                      <a href="#tab_1_2_3" data-toggle="tab" id="list3">
                      <small>สะพานกรุงเทพ</small>
                      </a>
                  </li>
              </ul>
        </div>
    </div>
    <!-- END REGIONAL STATS PORTLET-->
</div>
<!-- END SALINITY -->

