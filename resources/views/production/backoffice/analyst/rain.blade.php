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
$view->option('js-init','rain.init(group_Translator)');
$view->option('page_name', trans('frontoffice/home/master.main-breadcrumb-report'));
$view->option('title', trans('frontoffice/layout/menu.main-menu-thailand'));

$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit', 'leaflet',
'FontAwesome', 'Lightbox','JsonHelper','DataTables-fixedheader') ;
$view->resource('js','js/backoffice/analyst/rain.js') ;
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
@include('frontoffice/home/modal.storm')
<!-- modal-rain -->
<div class="bootbox modal fade" id="modal-rain" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <iframe width="100%" height="530" scrolling="no" frameBorder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- box -->
<div class="box box-default" id="box-rain">
    <!--<div class="box-header with-border">
        <p class="h3"> <small></small> </p>
    </div>-->
    <div class="col-md-12 header">
        <h3>
          {{ trans('frontoffice/home/index.rain') }}
          <small class="text-muted">{{ trans('frontoffice/home/index.rain24hr') }}</small>
        </h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-5">
                <!-- <div class="row">
                    <div class="col-sm-12"><label class="">{{ trans('frontoffice/home/index.rain_station') }}</label></div>
                </div> -->
                <div class="row">
                    <div class="col-sm-12">
                        <div id="rain_map"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-center">

                        <!-- <table class="pull-right small" style="width: 70%" id="box-rain-table"></table> -->
                          
                          <table class="pull-right small" style="width: 70%" id="box-rain-table"></table>
                    </div>
                </div>
               
            </div>
            <div class="col-sm-7">
                

                <ul class="nav nav-tabs" role="tablist" id="tabtab">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">ฝน 24 ชั่วโมง</a></li>
                    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">ฝนวันนี้</a></li>
                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab" data-tab="2">ฝนวานนี้</a></li>
                    <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab" data-tab="3">ฝนรายเดือน</a></li>
                    <li role="presentation"><a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab">ฝนรายปี</a></li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">

                        <div class="table-responsive">
                            <table id="rain24_table" class="rain24-table display table-lowpad" width="100%">
                                <thead>
                                    <tr class="bg-primary">
                                        <th class="col-sm-3 text-left">{{ trans("frontoffice/home/index.station") }}</th>
                                        <th class="col-sm-4 text-left">{{ trans("frontoffice/home/index.loca") }}</th>
                                        <th class="col-sm-3">{!! trans("frontoffice/home/index.latest") !!}</th>
                                        <th class="col-sm-2 text-center">{!! trans("frontoffice/home/index.rain_sum") !!}</th> 
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="tab2">

                        <div class="table-responsive">
                            <table id="raintoday_table" class="raintoday-table display table-lowpad" width="100%">
                                <thead>
                                    <tr class="bg-primary">
                                        <th class="col-sm-3 text-left">{{ trans("frontoffice/home/index.station") }}</th>
                                        <th class="col-sm-4 text-left">{{ trans("frontoffice/home/index.loca") }}</th>
                                        <th class="col-sm-3">{!! trans("frontoffice/home/index.latest") !!}</th>
                                        <th class="col-sm-2 text-center">{!! trans("frontoffice/home/index.rain_sum") !!}</th> 
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="tab3">

                        <div class="table-responsive">
                            <table id="rainyesterday_table" class="rainyesterday-table display table-lowpad" width="100%">
                                <thead>
                                    <tr class="bg-primary">
                                        <th class="col-sm-3 text-left">{{ trans("frontoffice/home/index.station") }}</th>
                                        <th class="col-sm-4 text-left">{{ trans("frontoffice/home/index.loca") }}</th>
                                        <th class="col-sm-3">{!! trans("frontoffice/home/index.latest") !!}</th>
                                        <th class="col-sm-2 text-center">{!! trans("frontoffice/home/index.rain_sum") !!}</th> 
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="tab4">

                        <div class="table-responsive">
                            <table id="rainmonth_table" class="rainmonth-table display table-lowpad" width="100%">
                                <thead>
                                    <tr class="bg-primary">
                                        <th class="col-sm-3 text-left">{{ trans("frontoffice/home/index.station") }}</th>
                                        <th class="col-sm-4 text-left">{{ trans("frontoffice/home/index.loca") }}</th>
                                        <th class="col-sm-3">{!! trans("frontoffice/home/index.latest") !!}</th>
                                        <th class="col-sm-2 text-center">{!! trans("frontoffice/home/index.rain_sum") !!}</th> 
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="tab5">

                        <div class="table-responsive">
                            <table id="rainyear_table" class="rainyear-table display table-lowpad" width="100%">
                                <thead>
                                    <tr class="bg-primary">
                                        <th class="col-sm-3 text-left">{{ trans("frontoffice/home/index.station") }}</th>
                                        <th class="col-sm-4 text-left">{{ trans("frontoffice/home/index.loca") }}</th>
                                        <th class="col-sm-3">{!! trans("frontoffice/home/index.latest") !!}</th>
                                        <th class="col-sm-2 text-center">{!! trans("frontoffice/home/index.rain_sum") !!}</th> 
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
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

    'dam': '{{ trans("frontoffice/home/index.dam") }}',

    '_agency_name': '{{ trans("frontoffice/home/index._agency_name") }}',
    'short_province': '{{ trans("frontoffice/home/index.short_province") }}',
    'short_amphoe': '{{ trans("frontoffice/home/index.short_amphoe") }}',
    'short_tumbon': '{{ trans("frontoffice/home/index.short_tumbon") }}',

    'show_all_filter_province': '{{ trans("frontoffice/home/index.show_all_filter_province") }}',

    'rain_graph_title_link' : '{{ trans("frontoffice/home/index.rain_graph_title_link") }}',
    'rain_empty_table': '{{ trans("frontoffice/home/index.rain_empty_table") }}',

    'radar_name': {!! json_encode( trans("frontoffice/home/index.radar_name") ) !!},
}
</script>

@stop
