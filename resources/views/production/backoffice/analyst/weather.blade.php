@section('extra_head')

@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);
$image_url = env('API_SERVER') . '/thaiwater30/shared/image?_csrf=' . urlencode($csrf) . '&image=';

$view->option('main-menu-mode', 'analyst');
$pageName = '';

$breadcrumb = array(
  array(
    'href' => $l->httpUrl("backoffice/analyst/"),
    'text' => trans('backoffice/analyst/analyst.page_name'),
  ),
  array(
    'text' => trans('backoffice/analyst/analyst.weather_img'),
  )
);

$view->option('breadcrumb' , $breadcrumb);
$view->option('breadcrumb_footer' , $breadcrumb);
$view->option('js-init','weather.init(group_Translator)');
$view->option('page_name', trans('backoffice/analyst/analyst.weather_img'));
$view->option('title', trans('frontoffice/layout/menu.main-menu-thailand'));
$view->asset('parsley' ,'Font-Kanit' , 'FontAwesome', 'Lightbox','JsonHelper' ) ;
$view->resource('js','js/backoffice/analyst/weather.js') ;
$view->resource('theme-css','css/backoffice/analyst/weather.css')

?>

@stop
@section('content')

<div id="weather-block">
    <div class="row equal weather-list">
        <div class="col-md-3 col-sm-6 mb"><div class="view_storm_history" ></div></div>
        <div class="col-md-3 col-sm-6 mb"><div class="view_india_ocean_ucl "></div></div>
        <div class="col-md-3 col-sm-6 mb"><div class="view_pacific_ocean_ucl "></div></div>
        <div class="col-md-3 col-sm-6 mb"><div class="view_weather_map_tmd "></div></div>
        <div class="col-md-3 col-sm-6 mb"><div class="view_weather_map_hd "></div></div>
        <div class="col-md-3 col-sm-6 mb"><div class="view_cloud_kochi "></div></div>
        <div class="col-md-3 col-sm-6 mb"><div class="view_cloud_us_naval_research_lab "></div></div>
        <div class="col-md-3 col-sm-6 mb"><div class="view_cloud_digital_typhoon "></div></div>
    </div>
    <div class="row equal weather-list view_satellite_image_gsmaps">
        <div class="col-md-3 col-sm-6 mb"><div class="view_rain_image_us_naval_research_lab "></div></div>
    </div>
    <div class="row equal weather-list view_satellite_image_gistda">
    </div>
    <div class="row equal weather-list view_contour_image">
    </div>
    <div class="row equal weather-list view_modis_ndvi_usda">
    </div>
    <div class="row equal weather-list view_modis_soil_moisture_usda">
    </div>
    <div class="row equal weather-list view_modis_precipitation_usda">
    </div>
    <div class="row equal weather-list">
        <div class="row equal weather-list col-md-3 ml-md-auto view_sst_ocean_weather" style="margin-right:15px">
        </div>
        <div class="row equal weather-list col-md-3 col-sm-6 mb view_wave_height_ocean_weather">
        </div>
        <div class="col-md-3 col-sm-6 mb"><div class="view_gssh_aviso "></div></div>
        <div class="col-md-3 col-sm-6 mb"><div class="view_sst_2w_haii "></div></div>
        <div class="col-md-3 col-sm-6 mb"><div class="view_ssh_event_haii "></div></div>
        <div class="col-md-3 col-sm-6 mb"><div class="view_ssh_w_haii "></div></div>
    </div>
</div>

<script>
IMAGE_URL = '{!! $image_url !!}';
var group_Translator = {
    'LANGUAGE' : '{{ $l->getLocale() }}'
}
</script>

@stop
