@section('extra_head')

@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);
$image_url = env('API_SERVER') . '/thaiwater30/shared/image?_csrf=' . urlencode($csrf) . '&image=';
$default_radar = $view->buildResourceSrc('/resources/images/default_radar.jpg');

$view->option('main-menu-mode', 'analyst');
$pageName = '';

$breadcrumb = array(
  array(
    'href' => $l->httpUrl("backoffice/analyst/"),
    'text' => trans('backoffice/analyst/analyst.page_name'),
  ),
  array(
    'text' => trans('frontoffice/home/index.waterquality'),
  )
);

$view->option('breadcrumb' , $breadcrumb);
$view->option('breadcrumb_footer' , $breadcrumb);
$view->option('js-init','waterquality.init(group_Translator)');
$view->option('page_name', trans('frontoffice/home/index.waterquality'));
$view->option('title', trans('frontoffice/layout/menu.main-menu-thailand'));
$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit', 'leaflet',
'FontAwesome', 'Lightbox','JsonHelper','DataTables-fixedheader') ;
$view->resource('js','js/backoffice/analyst/waterquality.js') ;
$view->resource('js','js/frontoffice/home/thailandFunc.min.js') ;
$view->resource('js','js/frontoffice/home/jquery.maphilight.min.js') ;
$view->resource('js','js/frontoffice/home/overlib_mini.js') ;
$view->resource('theme-css','css/backoffice/analyst/waterquality.css')

?>

@stop
@section('content')


<!-- modal -->
@include('frontoffice/home/modal.storm')
<!-- modal-waterquality -->
<div class="bootbox modal fade" id="modal-waterquality" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <iframe width="100%" height="650" scrolling="no" frameBorder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-5">
        <div class="row">
            <div class="col-sm-12">
                <div id="waterquality_map"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="table-responsive">
            <div id="div_waterquality_table">
              <table id="waterquality_table" class="rain24-table display table-lowpad" >
                  <thead>
                    <tr class="bg-primary">
                        <th class="col-sm-1 text-left">{{ trans("frontoffice/home/index.station") }}</th>
                        <th class="col-sm-1 text-left">{{ trans("frontoffice/home/index.province") }}</th>
                        <th class="col-sm-1 text-center">{!! trans("frontoffice/home/index.date") !!}</th>
                        <th class="col-sm-1 text-center">{!! trans("frontoffice/home/index.time") !!}</th>
                        <th class="col-sm-1 text-center">{!! trans("frontoffice/home/index.ph") !!}</th>
                        <th class="col-sm-1 text-center">{!! trans("frontoffice/home/index.salinity") !!}</th>
                        <th class="col-sm-1 text-center">{!! trans("frontoffice/home/index.turbid") !!}</th>
                        <th class="col-sm-1 text-center">{!! trans("frontoffice/home/index.ec") !!}</th>
                        <th class="col-sm-1 text-center">{!! trans("frontoffice/home/index.tds") !!}</th>
                        <th class="col-sm-1 text-center">{!! trans("frontoffice/home/index.chlorophyll") !!}</th>
                        <th class="col-sm-1 text-center">{!! trans("frontoffice/home/index.do") !!}</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
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
