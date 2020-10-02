
<script src="{{ asset('vendor/jquery/3.5.1/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/4.4.1/js/bootstrap.min.js') }}"></script>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() { 
        var url_cpy = $("#cpy_url").val();
        var url_swan = $("#swan_url").val();
        
        $('#ex_cpy').load(url_cpy, function(){
          cpyFillStatusColor();
        });

        $('#ex_swan').load(url_swan, function(){
          swanFillStatusColor();
        });
        
    });

    function cpyFillStatusColor() {
        $.ajax({
            type: "GET",
            url: "{{ url('warroom/cpy/data') }}",
            dataType: "json",
            
            success: function (data) {
                   for(var i in data) {
                      var obj = data[i];
                      for(var key in obj) {
                        d3.select("svg#svg3075").select("g#"+obj["station_id"]).style("visibility", "visible");
                        d3.select("svg#svg3075").select("g#"+obj["station_id"]).style("fill", obj["status_color"]);
                      }
                   }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }

    function swanFillStatusColor() {
        d3.select("svg#svg3076").select("path#path5215").style("fill", "pink");
        d3.select("svg#svg3076").select("path#path5225").style("fill", "white");
        d3.select("svg#svg3076").select("path#path5223").style("fill", "purple");
        d3.select("svg#svg3076").select("path#path5217").style("fill", "orange");
    }
</script>


<div class="col-md-3 col-sm-3">
    <!-- BEGIN REGIONAL STATS PORTLET-->
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase">คาดการณ์ระดับน้ำ</span>
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
                <!--<img id="ex_cpy" src="{{ asset('resources/themes/warroom/vector/fc-water.svg') }}" alt="map" width="100%">-->
                  <div id="ex_cpy"></div>
                  <input type="hidden" id="cpy_url" value="{{ url('/resources/themes/warroom/vector/fc-water.svg') }}">
        </div>
    </div>
    <!-- END REGIONAL STATS PORTLET-->
</div>

