

{{-- JavaScript --}}
@section('script')
<script src="{{ asset('resources/js/frontoffice/warroom/swan.js') }}"></script>
<script src="{{ asset('vendor/bower_components/d3/d3.min.js') }}"></script>
@stop

<div class="col-md-3 col-sm-3">
    <!-- BEGIN REGIONAL STATS PORTLET-->
    <div class="portlet light"  style="height: 621px">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase">คาดการณ์คลื่น</span>
                <!--<span class="caption-helper">ความสูงและทิศทาง</span> -->
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
            <p class=" btn-circle grey-salsa btn-xs text-center"> วันจันทร์, 02 สิงหาคม 2559  09:00 น.
            </p>
            <!--<img src="{{ asset('resources/themes/warroom/vector/fc-swan.svg') }}" alt="map" width="100%">-->
            <div id="ex_swan"></div>
            <input type="hidden" id="swan_url" value="{{ url('/resources/themes/warroom/vector/fc-swan.svg') }}">
        </div>
    </div>
    <!-- END REGIONAL STATS PORTLET-->
</div>
