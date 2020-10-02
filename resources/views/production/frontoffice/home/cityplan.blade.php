@extends('frontoffice/layout/home')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);
$image_url = env('API_SERVER') . '/thaiwater30/shared/image?_csrf=' . urlencode($csrf) . '&image=';
$default_radar = $view->buildResourceSrc('/resources/images/default_radar.jpg');
$breadcrumb = array(
  array(
    'href' => '#',
    'class' => 'text-primary btn btn-outline',
    'text'  => 'City Plan',
    'disabled' => '',
  ),array(
     'href' => 'http://live1.haii.or.th/product/latest/rain/rain_obs_map.html',
    //'href' => '#',
    'class' => 'text-primary btn btn-outline',
    'text' => 'Rain Watch Map',
    'disabled' => '',

  ),
    array(
     'href' => 'http://live1.haii.or.th/product/latest/flashflood/FFPI_Report.html',
    //'href' => '#',
    'class' => 'text-primary btn btn-outline',
    'text' => 'Flash Flood Index',
    'disabled' => '',
  ),
  array(
    // 'href' => 'http://www.thaiwater.net/v3/archive_report',
    'href' => '#',
    'class' => 'text-muted btn btn-xs btn-outline-light',
    'text' => trans('frontoffice/home/master.main-breadcrumb-report'),
    'disabled' => 'disabled',
  ),
  array(
    // 'href' => 'http://www.thaiwater.net/v3/archive',
    'href' => '#',
    'class' => 'text-muted btn btn-xs btn-outline-light',
    'text' => trans('frontoffice/home/master.main-breadcrumb-history'),
    'disabled' => 'disabled',
  ),
  // array(
  //     'href' => 'http://www2.haii.or.th/wiki/index.php/%E0%B8%AB%E0%B8%99%E0%B9%89%E0%B8%B2%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%81',
  //     'text' => trans('frontoffice/home/master.main-breadcrumb-wiki'),
  // ),
);
$view->option('breadcrumb', $breadcrumb);
$view->option('breadcrumb_footer', $breadcrumb);
$view->option('js-init', 'srvMain.init(group_Translator)');
$view->option('page_name', trans('frontoffice/home/master.main-breadcrumb-report'));
$view->option('title', trans('frontoffice/layout/menu.main-menu-thailand'));

$view->asset('DataTables', 'DataTables-buttons', 'parsley', 'bootstrap-multiselect', 'Font-Kanit', 'leaflet',
  'FontAwesome', 'Lightbox', 'JsonHelper', 'DataTables-fixedheader');
$view->resource('js', 'js/frontoffice/home/cityplan.js');
$view->resource('js', 'js/frontoffice/home/thailandFunc.min.js');
$view->resource('js', 'js/frontoffice/home/jquery.maphilight.min.js');
$view->resource('js', 'js/frontoffice/home/overlib_mini.js');
?>

@section('extra_head')
@stop


@section('content-center')

<style type="text/css">
  .btn-primary-index{
      color: #fff!important;
      background: #063475;
      border-radius: 35px!important;
  }
  .info.date {
      background-color: #063575!important;
      font-size: 1.5em;
  }
  #imaginary_container{
      margin-top:20%; /* Don't copy this */
  }
  .stylish-input-group .input-group-addon{
      background: white !important; 
  }
  .stylish-input-group .form-control{
    border-right:0; 
    box-shadow:0 0 0; 
    border-color:#ccc;
  }
  .stylish-input-group button{
      border:0;
      background:transparent;
  }
  .disabled {
      pointer-events: none;
      cursor: default;
  }
</style>
<!-- box -->
<div class="box box-default" id="box-cityplan">
    <div class="col-md-9">
        <h3><i class="fa fa-map-o" aria-hidden="true"></i>
          {{ trans("frontoffice/home/index.cityplan") }}
          <small>{{ trans("frontoffice/home/index.cityplan_sub")}}</small>
        </h3>
    </div>
    <div class="col-md-2">
        <div id="imaginary_container"> 
            <div class="input-group stylish-input-group">
                <input type="text" class="form-control" placeholder="ค้นหาจังหวัด" id="cityplan_input">
                <span class="input-group-addon">
                    <button type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>  
                </span>
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-11">
              <div class="table-responsive">
                  <table id="cityplan_table" class="cityplan-table display table-lowpad">
                      <thead>
                          <tr class="bg-primary">
                              <th class="col-sm-11 text-left">{{ trans("frontoffice/home/index.province") }}</th>
                              <th class="col-sm-1 text-center">{{ trans("frontoffice/home/index.dowload") }}</th>
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
<script>
IMAGE_URL = '{!! $image_url !!}';
DEFAULT_RADAR = '{!! $default_radar !!}';
var group_Translator = {
    'LANGUAGE' : '{{ $l->getLocale() }}',
    'short_province': '{{ trans("frontoffice/home/index.short_province") }}',
    'data_empty_table': '{{ trans("frontoffice/home/index.data_empty_table") }}',
    'dowload': '{{ trans("frontoffice/home/index.dowload") }}'
}
</script>
@stop
