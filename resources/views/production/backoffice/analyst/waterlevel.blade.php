@extends('frontoffice/layout/home')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);
$image_url = env('API_SERVER') . '/thaiwater30/shared/image?_csrf=' . urlencode($csrf) . '&image=';
$default_radar = $view->buildResourceSrc('/resources/images/default_radar.jpg');

// $view->option('main-menu-mode', 'admin');
$scrollspy = array(
    array(
        'target' => 'rain',
        'text' =>  '<label class="user-icon icon-rain"></label>'
    ),
    array(
        'target' => 'waterlevel',
        'text' =>  '<label class="user-icon icon-water-level"></label>'
    ),
    array(
        'target' => 'dam',
        'text' =>  '<label class="user-icon icon-dam"></label>'
    ),
    array(
        'target' => 'waterquality',
        'text' =>  '<label class="user-icon icon-water-quality"></label>'
    ),
    array(
        'target' => 'storm',
        'text' =>  '<label class="user-icon icon-storm"></label>'
    ),
    array(
        'target' => 'predict_rain',
        'text' =>  '<label class="user-icon icon-rain-forcast"></label>'
    ),
    array(
        'target' => 'predict_wave',
        'text' =>  '<label class="user-icon icon-wave"></label>'
    ),
    array(
        'target' => 'risk',
        'text' =>  '<label class="user-icon icon-info"></label>'
    ),
);

$breadcrumb = array(
    array(
        'href' => 'http://www.thaiwater.net/v3/archive_report',
        'text' => trans('frontoffice/home/master.main-breadcrumb-report'),
    ),
    array(
        'href' => 'http://www.thaiwater.net/v3/archive',
        'text' => trans('frontoffice/home/master.main-breadcrumb-history'),
    ),
    array(
        'href' => 'http://www2.haii.or.th/wiki/index.php/%E0%B8%AB%E0%B8%99%E0%B9%89%E0%B8%B2%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%81',
        'text' => trans('frontoffice/home/master.main-breadcrumb-wiki'),
    ),
);

$view->option('breadcrumb' , $breadcrumb);
$view->option('breadcrumb_footer' , $breadcrumb);
$view->option('js-init','waterlevel.init(group_Translator)');
$view->option('page_name', trans('frontoffice/home/master.main-breadcrumb-report'));
$view->option('title', trans('frontoffice/layout/menu.main-menu-thailand'));

$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit', 'leaflet',
'FontAwesome', 'Lightbox','JsonHelper','DataTables-fixedheader') ;
$view->resource('js','js/backoffice/analyst/waterlevel.js') ;
$view->resource('js','js/frontoffice/home/thailandFunc.min.js') ;
$view->resource('js','js/frontoffice/home/jquery.maphilight.min.js') ;
$view->resource('js','js/frontoffice/home/overlib_mini.js') ;
?>

@section('extra_head')
@stop


@section('content-center')
<ul id="scrollspy" class="nav nav-pills nav-stacked nav-scrollspy" >
    @foreach($scrollspy as $ss)
    <li ><a href="{{ '#box-'.$ss['target'] }}" data-box="{{ $ss['target'] }}">{!! $ss['text'] !!}</a></li>
    @endforeach
</ul>

<!-- modal -->
<!-- @include('frontoffice/home/modal.storm') -->
<!-- modal-waterlevel -->
<div class="bootbox modal fade" id="modal-waterlevel" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <iframe width="100%" height="700" scrolling="no" frameBorder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- box -->
<div class="box box-default" id="box-waterlevel">
    <div class="col-md-12 header">
        <h3>
          {{ trans('frontoffice/home/index.waterlevel') }}
        </h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-5">
               
                <div class="row">
                    <div class="col-sm-12">
                        <div id="waterlevel_map"></div>
        
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="pull-right small" id="waterlevel_table_scale">
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="form-inline pull-right">
                    <select id="waterlevel_filter_basin" class="form-control"></select>
                    <select id="waterlevel_filter_agency" class="form-control"></select>
                    <!-- <button id="show_agency" class="form-control">แสดง</button> -->
                </div>
                
                <ul class="nav nav-tabs" role="tablist" id="tabwaterlevel">
                    <li class="tab1"><a href="#home" data-toggle="tab" aris-expanded="false" >น้ำในลำน้ำ</a></li>
                    <li class="tab2"><a href="#tab2" data-toggle="tab" aris-expanded="false">น้ำที่ปตร./ฝ่าย</a></li>
                    <li class="tab3"><a href="#tab3" data-toggle="tab" aris-expanded="false">CCTV</a></li>
                    
                </ul>
               
                    <div class="tab-content">
          
                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                        <div id="div_waterlevel_table" class="table-responsive">
                            <div class="table-responsive">
                                <table id="waterlevel_table" class="waterlevel-table display table-lowpad" style="width:100%">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>{{ trans("frontoffice/home/index.basin") }}</th>
                                            <th>bid</th>
                                            <th>{{ trans("frontoffice/home/index.station") }}</th>
                                            <th>{{ trans("frontoffice/home/index.agency") }}</th>
                                            <th>{{ trans("frontoffice/home/index.latest") }}</th>
                                            <!-- <th>{!! trans("frontoffice/home/index.waterdeep") !!}</th> -->
                                            <th>{!! trans("frontoffice/home/index.waterlevel()") !!}</th>
                                            <th>{!! trans("frontoffice/home/index.water_cap") !!}</th>
                                            <!-- <th>{!! trans("frontoffice/home/index.rain_yesterday") !!}</th>
                                            <th>{!! trans("frontoffice/home/index.rain_today") !!}</th> -->
                                            <th>{!! trans("frontoffice/home/index.water_situation") !!}</th>
                                            <th>{{ trans("frontoffice/home/index.state") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab2">

                            <div id="div_watergate_table" class="table-responsive">
                                <div class="table-responsive">
                                    <table id="watergate_table" class="watergate-table display table-lowpad" style="width: 100%">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th>{{ trans("frontoffice/home/index.station") }}</th>
                                                <th>{{ trans("frontoffice/home/index.date") }}</th>
                                                <th>{{ trans("frontoffice/home/index.time") }}</th>
                                                <th>{!! trans("frontoffice/home/index.watergate_in") !!}</th>
                                                <th>{!! trans("frontoffice/home/index.watergate_out") !!}</th>
                                                <th>{{ trans("frontoffice/home/index.date") }}</th>
                                                <th>{{ trans("frontoffice/home/index.time") }}</th>
                                                <th>{!! trans("frontoffice/home/index.watergate_floodgate") !!}</th>
                                                <th>{!! trans("frontoffice/home/index.watergate_floodgate_height") !!}</th>
                                                <th>{!! trans("frontoffice/home/index.watergate_floodgate_open") !!}</th>
                                                <th>{!! trans("frontoffice/home/index.watergate_pump") !!}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab3">
                            <div class="center" id="cctv_media" style="width: 100%; height: 410px;">
                                <div id="desc_click">
                                    <center>
                                        <h3>
                                            <small>
                                                "กรุณา คลิก ไอคอนบนแผนที่"
                                                <br>
                                                "เพื่อแสดงข้อมูล"
                                            </small>
                                        </h3>
                                    </center>
                                </div>
                                <div id="station_show">
                                    <label for="" class="col-sm-4 control-label" id="station"></label>
                                </div>
                            </div>
                        </div>
                   
                </div>
                
            </div>
        </div>
    </div>
</div>

@include('frontoffice/home.area')
<script>
IMAGE_URL = '{!! $image_url !!}';
DEFAULT_RADAR = '{!! $default_radar !!}';
var group_Translator = {
    'LANGUAGE' : '{{ $l->getLocale() }}',

    '_agency_name': '{{ trans("frontoffice/home/index._agency_name") }}',
    'agency' : '{{ trans("frontoffice/home/index.agency") }}',
    'state' : '{{ trans("frontoffice/home/index.state") }}',
    'short_province': '{{ trans("frontoffice/home/index.short_province") }}',
    'short_amphoe': '{{ trans("frontoffice/home/index.short_amphoe") }}',
    'short_tumbon': '{{ trans("frontoffice/home/index.short_tumbon") }}',

    'show_all_filter_province': '{{ trans("frontoffice/home/index.show_all_filter_province") }}',
    'show_all_filter_basin': '{{ trans("frontoffice/home/index.show_all_filter_basin") }}',

    'waterlevel_graph_title_link': '{{ trans("frontoffice/home/index.waterlevel_graph_title_link") }}',
    'waterlevel_scale_text': '{{ trans("frontoffice/home/index.waterlevel_scale_text") }}',
    'waterlevel_level_1' : '{{ trans("frontoffice/home/index.waterlevel_level_1") }}',
    'waterlevel_level_2' : '{{ trans("frontoffice/home/index.waterlevel_level_2") }}',
    'waterlevel_level_3' : '{{ trans("frontoffice/home/index.waterlevel_level_3") }}',
    'waterlevel_level_4' : '{{ trans("frontoffice/home/index.waterlevel_level_4") }}',
    'waterlevel_level_5' : '{{ trans("frontoffice/home/index.waterlevel_level_5") }}',

    'watergate_in' : '{{ trans("frontoffice/home/index.watergate_in") }}',
    'watergate_out' : '{{ trans("frontoffice/home/index.watergate_out") }}',
    'watergate_floodgate' : '{{ trans("frontoffice/home/index.watergate_floodgate") }}',
    'watergate_floodgate_height' : '{{ trans("frontoffice/home/index.watergate_floodgate_height") }}',
    'watergate_floodgate_open' : '{{ trans("frontoffice/home/index.watergate_floodgate_open") }}',
    'watergate_pump' : '{{ trans("frontoffice/home/index.watergate_pump") }}',

    'radar_name': {!! json_encode( trans("frontoffice/home/index.radar_name") ) !!},
}
</script>

@stop
