
{{-- JavaScript --}}
@section('script')
<script src="{{ asset('vendor/bower_components/socket.io-client/socket.io.min.js') }}"></script>
<script src="{{ asset('resources/js/util.js') }}"></script>
<script src="{{ asset('resources/js/frontoffice/warroom/rainfall.js') }}"></script>
@stop

<!-- RAINFALL -->

    <div class="col-md-3 col-sm-3">
        <!-- BEGIN REGIONAL STATS PORTLET-->
          <div class="portlet light "  style="height: 462px">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase">ปริมาณฝน 24 ชม.</span>
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
                      <p class="btn-circle grey-salsa btn-xs text-center"> {{ date('Y-m-d') }} วันจันทร์, 02 สิงหาคม 2559  09:00 น.
                      </p>
                   <!-- BEGIN WIDGET THUMB -->
                      <div class="tab-content" id="rainfall">

                      </div>
                      <ul class="nav nav-tabs text-center" id="nav-rainfall">
                      </ul>
                      <!-- END WIDGET THUMB -->
              </div>
          </div>
        <!-- END REGIONAL STATS PORTLET-->

</div>
<!-- END RAINFALL --> 
