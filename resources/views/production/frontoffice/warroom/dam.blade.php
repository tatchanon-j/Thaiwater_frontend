{{-- @author   Thitiporn Meeprasert <thitiporn@haii.or.th> --}}

{{-- JavaScript --}}
@section('script')
<script src="{{ asset('vendor/bower_components/socket.io-client/socket.io.min.js') }}"></script>
<script src="{{ asset('resources/js/util.js') }}"></script>
<script src="{{ asset('resources/js/frontoffice/warroom/dam.js') }}"></script>
@stop


<!-- DAM -->
<div class="col-md-3 col-sm-3">
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

            <div class="tab-content">
                <!-- BEGIN WIDGET THUMB -->
                <div class="tab-pane active" id="tab_1_2_1">
                  <div class="widget-thumb text-center">
                      <h4 id="name1" class="text-center white"> เขื่อนภูมิพล, <small class="white-gray">จ.ตาก </small> </h4>
                      <div class="widget-thumb-wrap">
                          <div class="widget-thumb-body">
                              <h1 id="dam_storage_percent1" style="font-size:5em;" class="widget-thumb-body-stat" data-counter="counterup" data-value="91">91</h1>
                              <span class="widget-thumb-subtitle">(กักเก็บ % รนก.)</span>
                          </div>
                          <div class="widget-thumb-body" style="width: 50%;float: left">
                              <span id="dam_inflow1" class="widget-thumb-body-stat" data-counter="counterup" data-value="8.4">0</span>
                              <span class="widget-thumb-subtitle">น้ำไหลเข้า</span>
                          </div>
                          <div class="widget-thumb-body" style="width: 49%;">
                              <span id="dam_released1" class="widget-thumb-body-stat" data-counter="counterup" data-value="7.2">0</span>
                              <span class="widget-thumb-subtitle">น้ำไหลออก</span>
                          </div>
                      </div>
                  </div>
                </div>
                 <!-- END WIDGET THUMB -->
                <div class="tab-pane" id="tab_1_2_2">
                  <div class="widget-thumb text-center">
                      <h4 id="name2" class="text-center white"> สิริกิติ์, <small class="white-gray"></small> </h4>
                      <div class="widget-thumb-wrap">
                          <div class="widget-thumb-body">
                              <h1 id="dam_storage_percent2" style="font-size:5em;" class="widget-thumb-body-stat" data-counter="counterup" data-value="81">81</h1>
                              <span class="widget-thumb-subtitle">(กักเก็บ % รนก.)</span>
                          </div>
                          <div class="widget-thumb-body" style="width: 50%;float: left">
                              <span  id="dam_inflow2" class="widget-thumb-body-stat" data-counter="counterup" data-value="8.4">0</span>
                              <span class="widget-thumb-subtitle">น้ำไหลเข้า</span>
                          </div>
                          <div class="widget-thumb-body" style="width: 49%;">
                              <span  id="dam_released2" class="widget-thumb-body-stat" data-counter="counterup" data-value="7.2">0</span>
                              <span class="widget-thumb-subtitle">น้ำไหลออก</span>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_1_2_3">
                    <div class="widget-thumb text-center">
                      <h4 id="name3" class="text-center white"> แควน้อย, <small class="white-gray">จ.เชียงใหม่ </small> </h4>
                      <div class="widget-thumb-wrap">
                          <div class="widget-thumb-body">
                              <h1 id="dam_storage_percent3" style="font-size:5em;" class="widget-thumb-body-stat" data-counter="counterup" data-value="52">52</h1>
                              <span class="widget-thumb-subtitle">(กักเก็บ % รนก.)</span>
                          </div>
                          <div class="widget-thumb-body" style="width: 50%;float: left">
                              <span id="dam_inflow3"  class="widget-thumb-body-stat" data-counter="counterup" data-value="8.4">0</span>
                              <span class="widget-thumb-subtitle">น้ำไหลเข้า</span>
                          </div>
                          <div class="widget-thumb-body" style="width: 49%;">
                              <span  id="dam_released3" class="widget-thumb-body-stat" data-counter="counterup" data-value="7.2">0</span>
                              <span class="widget-thumb-subtitle">น้ำไหลออก</span>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_1_2_4">
                    <div class="widget-thumb text-center">
                      <h4 id="name4" class="text-center white"> ป่าสัก, <small class="white-gray">จ.ตาก </small> </h4>
                      <div class="widget-thumb-wrap">
                          <div class="widget-thumb-body">
                              <h1 id="dam_storage_percent4" style="font-size:5em;" class="widget-thumb-body-stat" data-counter="counterup" data-value="32">32</h1>
                              <span class="widget-thumb-subtitle">(กักเก็บ % รนก.)</span>
                          </div>
                          <div class="widget-thumb-body" style="width: 50%;float: left">
                              <span  id="dam_inflow4" class="widget-thumb-body-stat" data-counter="counterup" data-value="8.4">0</span>
                              <span class="widget-thumb-subtitle">น้ำไหลเข้า</span>
                          </div>
                          <div class="widget-thumb-body" style="width: 49%;">
                              <span  id="dam_released4" class="widget-thumb-body-stat" data-counter="counterup" data-value="7.2">0</span>
                              <span class="widget-thumb-subtitle">น้ำไหลออก</span>
                          </div>
                      </div>
                    </div>
                </div>
                <ul class="nav nav-tabs text-center">
                    <li class="active">
                        <a href="#tab_1_2_1" data-toggle="tab" id="list1">
                            <small>ภูมิพล</small>
                         </a>
                    </li>
                    <li>
                        <a href="#tab_1_2_2" data-toggle="tab" id="list2">
                        <small>สิริกิติ์</small>
                        </a>
                    </li>
                    <li>
                        <a href="#tab_1_2_3" data-toggle="tab" id="list3">
                        <small>แควน้อย</small>
                        </a>
                    </li>
                    <li>
                        <a href="#tab_1_2_4" data-toggle="tab" id="list4">
                        <small>นอ้ย</small>
                        </a>
                    </li>
                </ul>
            </div>
          </div>
      </div>
    <!-- END REGIONAL STATS PORTLET-->
</div>
<!-- END DAM -->

