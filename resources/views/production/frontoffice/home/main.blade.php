@extends('frontoffice/layout/home')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);
$image_url = env('API_SERVER') . '/thaiwater30/shared/image?_csrf=' . urlencode($csrf) . '&image=';
$default_radar = $view->buildResourceSrc('/resources/images/default_radar.jpg');

$scrollspy = array(
	array(
		'target' => 'rain',
		'text' => '<label class="user-icon icon-rain"></label>',
	),
	array(
		'target' => 'waterlevel',
		'text' => '<label class="user-icon icon-water-level"></label>',
	),
	array(
		'target' => 'dam',
		'text' => '<label class="user-icon icon-dam"></label>',
	),
	array(
		'target' => 'waterquality',
		'text' => '<label class="user-icon icon-water-quality"></label>',
	),
	array(
		'target' => 'storm',
		'text' => '<label class="user-icon icon-storm"></label>',
	),
	array(
		'target' => 'predict_rain',
		'text' => '<label class="user-icon icon-forecast-rain"></label>',
	),
	array(
		'target' => 'predict_wave',
		'text' => '<label class="user-icon icon-wave"></label>',
	),
	array(
		'target' => 'risk',
		'text' => '<label class="user-icon icon-bullhorn"></label>',
	),
);


$breadcrumb = array(
  array(
    'href' => 'cityplan',
    'class' => 'text-primary btn btn-outline',
    'text'  => 'City Plan',
    'disabled' => '',
  ),
    array(
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
$view->resource('js', 'js/frontoffice/home/main.js');
$view->resource('js', 'js/frontoffice/home/thailandFunc.min.js');
$view->resource('js', 'js/frontoffice/home/jquery.maphilight.min.js');
$view->resource('js', 'js/frontoffice/home/overlib_mini.js');
?>

@section('extra_head')
@stop


@section('content-center')

<ul id="scrollspy" class="nav nav-stacked flex-column nav-scrollspy">
    @foreach($scrollspy as $ss)
    <li class="nav-item form-inline"><a class="nav-link" href="{{ '#box-'.$ss['target'] }}" data-box="{{ $ss['target'] }}">{!! $ss['text'] !!}</a></li>
    @endforeach
</ul>

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
        #dam_table_wrapper {
    height: auto !important;
}
    </style>
<!-- modal -->
@include('frontoffice/home/modal.storm')
<!-- modal-rain -->
<div class="bootbox modal fade" id="modal-rain"  tabindex="-1" role="document"  >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <iframe width="100%" height="530" scrolling="no" frameBorder="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- modal-waterlevel -->
<div class="bootbox modal fade" id="modal-waterlevel" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <iframe width="100%" height="530" scrolling="no" frameBorder="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- modal-dam -->
<div class="bootbox modal fade" id="modal-dam" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <iframe width="100%" height="530" scrolling="no" frameBorder="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- modal-waterquality -->
<div class="bootbox modal fade" id="modal-waterquality" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <iframe width="100%" height="530" scrolling="no" frameBorder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- modal-radar -->
<div class="bootbox modal fade" id="modal-radar" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-default" id="box-radar">
                    <div class="box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3 class="box-title"><i class="fa fa-map" aria-hidden="true"></i>  {{ trans('frontoffice/home/index.radar') }} </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="img-fluid" src="http://www.satda.tmd.go.th/Himawari/ir_last.gif"  style="width : 100%">
                            </div>
                            <div class="col-sm-6" id="modal-radar-img"></div>
                            <div class="col-sm-12" id="modal-radar-img-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal-prerain -->
<div class="bootbox modal fade" id="modal-prerain" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="fix_modal_tap">
            <div class="modal-body" >
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <ul class="nav nav-tabs">

                <li class="nav-item"><a class="nav-link active go" data-toggle="tab" href="#tab1">{{ trans('frontoffice/home/index.tab_img_thailand') }}</a></li>
                <li class="nav-item"><a class="nav-link go" data-toggle="tab" href="#tab2">{{ trans('frontoffice/home/index.tab_img_southeaast_asia') }}</a></li>
                <li class="nav-item"><a class="nav-link go" data-toggle="tab" href="#tab3">{{ trans('frontoffice/home/index.tab_img_asia') }}</a></li>
                <li class="nav-item"><a class="nav-link go" data-toggle="tab" href="#tab4">{{ trans('frontoffice/home/index.tab_img_thailand_basin') }}</a></li>

              </ul>
              <div class="tab-content">
                <div id="tab1" class="tab-pane fade in active">
                  <div id="modal-prerain-carousel" class="carousel slide" data-ride="carousel">
                      <h6></h6>
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                      </div>

                      <!-- Controls -->
                      <a class="carousel-control-prev" href="#modal-prerain-carousel" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#modal-prerain-carousel" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                  </div>
                </div>
                <div id="tab2" class="tab-pane fade">
                  <div id="modal-prerain-sea-carousel" class="carousel slide" data-ride="carousel">
                      <h6></h6>

                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                      </div>

                      <!-- Controls -->
                      <a class="carousel-control-prev" href="#modal-prerain-sea-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#modal-prerain-sea-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                  </div>
                </div>
                <div id="tab3" class="tab-pane fade">
                  <div id="modal-prerain-asia-carousel" class="carousel slide" data-ride="carousel">
                      <h6></h6>
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                      </div>

                      <!-- Controls -->
                      <a class="carousel-control-prev" href="#modal-prerain-asia-carousel" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#modal-prerain-asia-carousel" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                  </div>
                </div>
                <div id="tab4" class="tab-pane fade">

                  <div id="modal-prerain-basin-carousel" class="carousel slide" data-ride="carousel">
                      <h6></h6>

                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                      </div>

                      <!-- Controls -->
                      <a class="carousel-control-prev" href="#modal-prerain-basin-carousel" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#modal-prerain-basin-carousel" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- modal-prerain-tmd -->
<div class="bootbox modal fade" id="modal-prerain-tmd" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                 <div id="modal-prerain-tmd-carousel" class="carousel slide" data-ride="carousel" style="margin-top: 20px;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#modal-prerain-tmd" data-slide-to="0" class="active"></li>
                        <li data-target="#modal-prerain-tmd" data-slide-to="1"></li>
                        <li data-target="#modal-prerain-tmd" data-slide-to="2"></li>
                        <li data-target="#modal-prerain-tmd" data-slide-to="3"></li>
                        <li data-target="#modal-prerain-tmd" data-slide-to="4"></li>
                        <li data-target="#modal-prerain-tmd" data-slide-to="5"></li>
                        <li data-target="#modal-prerain-tmd" data-slide-to="6"></li>
                        <li data-target="#modal-prerain-tmd" data-slide-to="7"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="mx-auto" src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/01.png" style="width:100%">
                        </div>
                        <div class="carousel-item">
                            <img class="mx-auto" src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/02.png"  style="width:100%">
                        </div>
                        <div class="carousel-item">
                            <img class="mx-auto" src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/03.png"  style="width:100%">
                        </div>
                        <div class="carousel-item">
                            <img class="mx-auto" src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/04.png"  style="width:100%">
                        </div>
                        <div class="carousel-item">
                            <img class="mx-auto" src="hhttp://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/05.png"  style="width:100%">
                        </div>
                        <div class="carousel-item">
                            <img class="mx-auto" src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/06.png"  style="width:100%">
                        </div>
                        <div class="carousel-item">
                            <img class="mx-auto" src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/07.png"  style="width:100%">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#modal-prerain-tmd-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#modal-prerain-tmd-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal-prerain_animation -->
<div class="bootbox modal fade" id="modal-prerain_animation" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-default" id="box-prerain_animation">
                    <div class="box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3 class="box-title"> Animation </h3>
                    </div>
                    <div class="box-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active"><a class="nav-link" data-toggle="tab" href="#animation_03">Thailand (3km x 3km)</a></li>
                            <li class="nav-item"><a class="nav-link"  data-toggle="tab" href="#animation_02">Southeast Asia (9km x 9km)</a></li>
                            <li class="nav-item"><a class="nav-link"  data-toggle="tab" href="#animation_01">Asia (27km x 27km)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="animation_01" class="tab-pane fade in active">
                            </div>
                            <div id="animation_02" class="tab-pane fade">
                            </div>
                            <div id="animation_03" class="tab-pane fade">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal-prewave -->
<div class="bootbox modal fade" id="modal-prewave" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div id="modal-prewave-carousel" class="carousel slide" data-ride="carousel" style="margin-top: 20px;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                    </div>

                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#modal-prewave-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#modal-prewave-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal-prewave_animation -->
<div class="bootbox modal fade" id="modal-prewave_animation" tabindex="-1" role="document" >
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-default" id="box-prewave_animation">
                    <div class="box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3 class="box-title"> Animation </h3>
                    </div>
                    <div class="box-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- box -->
<div class="box box-default" id="box-rain">
    <!--<div class="box-header with-border">
        <p class="h3"> <small></small> </p>
    </div>-->
    <div class="form-row">
    <div class="col-md-8 ">
        <h3><label class="user-icon icon-rain" style="font-size:1.3em;"></label>
          {{ trans('frontoffice/home/index.rain') }}
          <small class="text-muted">{{ trans('frontoffice/home/index.rain24hr') }}</small>
        </h3>
    </div>
    <div class="col-md-4" >
      <form class="form-inline pull-right" >
        <div class="form-group">
           <!-- {{ trans('frontoffice/home/index.province') }} -->
          <select id="rain_filter_province" class="form-control" style="margin:25px 0px 5px 0px;"></select>
        </div>
      </form>
    </div>
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
                <div class="row m-2">
                    <div class="col-sm-12 text-center">

                        <!-- <table class="pull-right small" style="width: 70%" id="box-rain-table"></table>
                          <button id="btn_wind_sspeed_scale" type="button" class="btn btn-xs btn-outline-primary" data-toggle="modal" data-target="#modal-radar">
                          <i class="fa fa-map" aria-hidden="true"></i>
                              {{ trans('frontoffice/home/index.radar') }}
                          </button>-->
                          เกณฑ์ (มม.)
                          <table class="pull-right small" style="width: 70%" id="box-rain-table"></table>
                          <br/>
                          <!-- <div class="panel panel-primary" type="button" class="btn btn-xs btn-outline-primary" data-toggle="modal" data-target="#modal-radar">
                               <h4> <i class="fa fa-map" aria-hidden="true"></i>  {{ trans('frontoffice/home/index.radar') }}</h4>
                          </div> -->
                          <div class="card border-primary mb-3" type="button" class="btn btn-xs btn-outline-primary" data-toggle="modal" data-target="#modal-radar">
                               <h4 class="m-2"><i class="fa fa-map"></i>{{ trans('frontoffice/home/index.radar') }}</h4>
                          </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-7">
              <div class="table-responsive">
                  <table id="rain_table" class="rain-table display table-lowpad">
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
<div class="box box-default" id="box-waterlevel">
<div class="form-row"> 
    <div class="col-md-8">
        <h3><label class="user-icon icon-water-level" style="font-size:1.3em;"></label>
          {{ trans('frontoffice/home/index.waterlevel') }}
        </h3>
    </div>
    <div class="col-md-4">
      <form class="form-inline pull-right" style="margin:25px 0px 5px 0px;">
        <div class="form-group">
           <!-- {{ trans('frontoffice/home/index.province') }} -->
            <select id="waterlevel_filter_sort" class="form-control">
                <option value="desc">{{ trans('frontoffice/home/index.max20') }}</option>
                <option value="asc">{{ trans('frontoffice/home/index.min20') }}</option>
            </select>
            <!--  <label class="">{{ trans('frontoffice/home/index.province') }} : </label> -->
            <select id="waterlevel_filter_province" class="form-control"></select>
        </div>
      </form>
    </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-5">
                <!--<div class="row">
                    <div class="col-sm-12"><label class="">{{ trans('frontoffice/home/index.waterlevel_station') }}</label></div>
                </div>-->
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

                <div class="row">
                    <div class="col-sm-12  content_waterlevel_table">
                        <div id="div_waterlevel_table" class="table-responsive">
                            <div class="table-responsive">
                                <table id="waterlevel_table" class="waterlevel-table display table-lowpad" style="width:100%">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>{{ trans("frontoffice/home/index.basin") }}</th>
                                            <th>bid</th>
                                            <th>{{ trans("frontoffice/home/index.station") }}</th>
                                            <th>{{ trans("frontoffice/home/index.latest") }}</th>
                                            <!-- <th>{!! trans("frontoffice/home/index.waterdeep") !!}</th> -->
                                            <th>{!! trans("frontoffice/home/index.waterlevel()") !!}</th>
                                            <th>{!! trans("frontoffice/home/index.water_cap") !!}</th>
                                            <!-- <th>{!! trans("frontoffice/home/index.rain_yesterday") !!}</th>
                                            <th>{!! trans("frontoffice/home/index.rain_today") !!}</th> -->
                                            <th>{!! trans("frontoffice/home/index.water_situation") !!}</th>
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
</div>
<div class="box box-default" id="box-dam">
    <div class="col-md-12 header">
        <h3><label class="user-icon icon-dam" style="font-size:1.3em;"></label> {{ trans('frontoffice/home/index.dam') }}
        </h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-5">
                <div id="dam_map"></div>
                <div class="">
                    <table class="pull-right small" id="dam_table_scale">
                        <tbody></tbody>
                    </table>
                    <br/>
                    <!--<small class="pull-right">( {{trans('frontoffice/home/index.waterlevel_store')}} )</small>    ระดับน้ำเก็บกัก-->
                </div>
                <div id="Dam_text"></div>
            </div>
            <div class="col-sm-7">
                <div class="table-responsive">
                    <table id="dam_table" class="dam-table display table-lowpad" style="height: auto">
                        <thead>
                            <tr class="bg-primary">
                                <th>{{ trans("frontoffice/home/index.dam") }}</th>
                                <th>{!! trans("frontoffice/home/index.dam_inflow") !!}</th>
                                <th>{!! trans("frontoffice/home/index.dam_storage") !!}</th>
                                <th>{!! trans("frontoffice/home/index.dam_uses_water") !!}</th>
                                <th>{!! trans("frontoffice/home/index.dam_released") !!}</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="text-right">{{trans('frontoffice/home/index.dam_max_date')}} <span id="dam_max_date"></span></div>
            </div>
        </div>
    </div>
</div>
<div class="box box-default" id="box-waterquality">
    <div class="col-md-12 header">
        <h3><label class="user-icon icon-water-quality" style="font-size:1.3em;"></label> {{ trans('frontoffice/home/index.waterquality') }} </h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-5">
                <div id="waterquality_map"></div>
            </div>
            <div class="col-sm-7">
                <div class="table-responsive">
                    <div id="div_waterquality_table">
                        <table id="waterquality_table" class="waterquality-table display table-lowpad" style="width : 100%">
                            <thead>
                                <tr class="bg-primary">
                                    <th>{{ trans("frontoffice/home/index.station") }}</th>
                                    <th>{!! trans("frontoffice/home/index.province") !!}</th>
                                    <th>{!! trans("frontoffice/home/index.latest") !!}</th>
                                    <th>{!! trans("frontoffice/home/index.salinity") !!}</th>
                                    <th>{!! trans("frontoffice/home/index.do") !!}</th>
                                    <th>{!! trans("frontoffice/home/index.ph") !!}</th>
                                    <th>{!! trans("frontoffice/home/index.turbid") !!}</th>
                                    <th>{!! trans("frontoffice/home/index.ec") !!}</th>
                                    <th>{!! trans("frontoffice/home/index.tds") !!}</th>
                                    <th>{!! trans("frontoffice/home/index.chlorophyll") !!}</th>
                                    <th>{!! trans("frontoffice/home/index.temp") !!}</th>
                                    <th>{!! trans("frontoffice/home/index.depth") !!}</th>
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
<div class="box box-default" id="box-storm">
    <div class="col-md-12 header">
        <h3><label class="user-icon icon-storm" style="font-size:1.3em;"></label> {{ trans('frontoffice/home/index.storm') }} <small>แผนที่วิเคราะห์เส้นทาง และความแรงของพายุ </small></h3>
    </div>
    <div class="box-body form-inline">
        <div class="col-sm-6 text-center">
            <h4>{{ trans('frontoffice/home/index.storm-head-left') }}</h4>
            <h5>มหาสมุทรแปซิฟิก</h5>
            <div class="img-thumbnail" id="box-storm-img-W" style="width: 100%"></div>
            <h5>มหาสมุทรอินเดีย</h5>
            <div class="img-thumbnail" id="box-storm-img-I" style="width: 100%;margin-left: 0px;"></div>
            <p class="text-right">{{trans('frontoffice/home/index.box-storm-img-IW-source')}}</p>
            <div class="row">
                <table class="pull-left small" style="width: 70%" id="box-storm-table">
                </table>

                <div class="pull-right">

                    <p id="btn_wind_speed_scale" type="button" data-toggle="modal" data-target="#modal-storm">
                        <!-- {{ trans('frontoffice/home/index.wind_speed_scale') }} --> * เกณฑ์บอกระดับพายุ
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 text-center" style="margin-block-end: auto">
            <h4> {{ trans('frontoffice/home/index.storm-head-right') }} </h4>
            <h5>ภาพถ่ายล่าสุด จากดาวเทียม</h5>
            <div class=" img-thumbnail" id="box-storm-img-himawari">
            </div>
            <p id="box-storm-img-source" class="text-right">{{trans('frontoffice/home/index.box-storm-img-source')}}</p>
        </div>
    </div>
</div>
<div class="box box-default" id="box-predict_rain">
    <div class="col-md-12 header">
        <h3><label class="user-icon icon-forecast-rain" style="font-size:1.3em;"></label> {{ trans('frontoffice/home/index.predict_rain') }} </h3>
    </div>
    <div class="box-body">

      <div class="row">
        <div class="mx-auto text-center" id="box-predict_rain-img1">
        </div>
        <div class="mx-auto text-center" id="box-predict_rain-img2">
        </div>
        <div class="mx-auto text-center" id="box-predict_rain-img3">
        </div>
      </div>

      <div class="row" style="margin-top: 15px;">
            <div class="col-md-4 text-center">
                <a rel="predict_rain" class="fancybox" href="javascript:void(0);">
                    <img src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/01.png" data-toggle="modal" data-target="#modal-prerain-tmd" data-slide-to="0" class="img-fluid img-thumbnail" style="width :100%">
                </a>
            </div>
            <div class="col-md-4 text-center">
                <a rel="predict_rain" class="fancybox" href="javascript:void(0);">
                    <img src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/02.png" data-toggle="modal" data-target="#modal-prerain-tmd" data-slide-to="1" class="img-fluid img-thumbnail"style="width :100%">
                </a>
            </div>
            <div class="col-md-4 text-center">
                <a rel="predict_rain" class="fancybox" href="javascript:void(0);">
                    <img src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/03.png" data-toggle="modal" data-target="#modal-prerain-tmd" data-slide-to="2" class="img-fluid img-thumbnail"style="width :100%">
                </a>
            </div>
        </div>
         <div class="row" style="margin-top: 15px;">
            <div class="col-md-3 text-center">
                <a rel="predict_rain" class="fancybox" href="javascript:void(0);">
                    <img src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/04.png" data-toggle="modal" data-target="#modal-prerain-tmd" data-slide-to="3" class="img-fluid img-thumbnail"style="width :100%">
                </a>
            </div>
            <div class="col-md-3 text-center">
                <a rel="predict_rain" class="fancybox" href="javascript:void(0);">
                    <img src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/05.png" data-toggle="modal" data-target="#modal-prerain-tmd" data-slide-to="4" class="img-fluid img-thumbnail"style="width :100%">
                </a>
            </div>
            <div class="col-md-3 text-center">
                <a rel="predict_rain" class="fancybox" href="javascript:void(0);">
                    <img src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/06.png" data-toggle="modal" data-target="#modal-prerain-tmd" data-slide-to="5" class="img-fluid img-thumbnail"style="width :100%">
                </a>
            </div>
            <div class="col-md-3 text-center">
                <a rel="predict_rain" class="fancybox" href="javascript:void(0);">
                    <img src="http://www.nwp.tmd.go.th/storage/images/products/18x18/mslpprec24hrs/07.png" data-toggle="modal" data-target="#modal-prerain-tmd" data-slide-to="6" class="img-fluid img-thumbnail"style="width :100%">
                </a>
            </div>
        </div>
        <div class="row m-2">
          <div class="col-md-10">
           <p>* {{ trans('frontoffice/home/index.predict_rain_text') }}</p>
          </div>
          <div class="col-md-2 text-center">
            <div class="card card-primary" type="button" class="btn btn-xs btn-outline-primary" data-toggle="modal" data-target="#modal-prerain_animation">
                <h4 class="m-2"> <i class="fa fa-video-camera" aria-hidden="true"></i>  ภาพเคลื่อนไหว</h4>
              </div>
          </div>
        </div>
    </div>
</div>
<div class="box box-default" id="box-predict_wave">
      <div class="col-md-12 header">
        <h3><label class="user-icon icon-wave" style="font-size:1.3em;"></label> {{ trans('frontoffice/home/index.predict_wave') }} <small></small></h3>
    </div>

      <div class="row">
        <div class="row mx-auto text-center" id="box-predict_wave-img1" style="margin-bottom: 15px;">
        </div>
        <div class="row mx-auto text-center" id="box-predict_wave-img2" style="margin-bottom: 15px;">
        </div>
      </div>
      <div class="row m-2">
        <div class="col-md-10">
         <p>แผนภาพคาดการณ์ความสูงและทิศทางคลื่นล่วงหน้า 7 วัน ความละเอียดสูงจากแบบจำลองคลื่นทะเล (SWAN Model)</p>
        </div>
        <div class="col-md-2 text-center">
          <div class="card card-primary" type="button" class="btn btn-xs btn-outline-primary" data-toggle="modal"
          <a class="mx-auto" data-toggle="modal" data-target="#modal-prewave_animation">
              <h4 class="m-2"> <i class="fa fa-video-camera" aria-hidden="true"></i>  ภาพเคลื่อนไหว</h4>
            </div>
        </div>
      </div>
</div>
<div class="box box-default" id="box-risk">
    <div class="col-md-12 header">
        <h3><label class="user-icon icon-bullhorn" style="font-size:1.3em;"></label> {{ trans('frontoffice/home/index.risk_box_left') }} </h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-info">
                  <div class="card-body">
                    <div class="" id="box-risk-rain">
                        --
                        <!--b>{{ trans("frontoffice/home/index.risk_text_rain") }}</b-->
                    </div>
                    <div class="" id="box-risk-drought">
                        <!--b>{{ trans("frontoffice/home/index.risk_text_drought") }}</b-->
                    </div>
                  </div>
                </div>
            </div>
            <!-- <div class="col-sm-6">
                <div class="panel panel-info">
                  <div class="panel-heading"><h4 class="text-muted text-center">{{ trans('frontoffice/home/index.risk_box_right') }}</h4></div>
                  <div class="panel-body">
                     <div class="" id="box-risk-flood">
                    </div>
                  </div>
                </div>
            </div> -->
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

    'waterlevel_graph_title_link': '{{ trans("frontoffice/home/index.waterlevel_graph_title_link") }}',
    'waterlevel_scale_text': '{{ trans("frontoffice/home/index.waterlevel_scale_text") }}',
    'waterlevel_level_1' : '{{ trans("frontoffice/home/index.waterlevel_level_1") }}',
    'waterlevel_level_2' : '{{ trans("frontoffice/home/index.waterlevel_level_2") }}',
    'waterlevel_level_3' : '{{ trans("frontoffice/home/index.waterlevel_level_3") }}',
    'waterlevel_level_4' : '{{ trans("frontoffice/home/index.waterlevel_level_4") }}',
    'waterlevel_level_5' : '{{ trans("frontoffice/home/index.waterlevel_level_5") }}',

    'dam_graph_title_link': '{{ trans("frontoffice/home/index.dam_graph_title_link") }}',
    'dam_empty_table': '{{ trans("frontoffice/home/index.dam_empty_table") }}',
    'dam_low_text': '{{ trans("frontoffice/home/index.dam_low_text") }}',
    'dam_high_text': '{{ trans("frontoffice/home/index.dam_high_text") }}',
    'dam_scale_text': '{{ trans("frontoffice/home/index.dam_scale_text") }}',

    'waterquality_graph_title_link': '{{ trans("frontoffice/home/index.waterquality_graph_title_link") }}',
    'waterquality_popuptext_ph': '{{ trans("frontoffice/home/index.waterquality_popuptext_ph") }}',
    'waterquality_popuptext_salinity': '{{ trans("frontoffice/home/index.waterquality_popuptext_salinity") }}',
    'waterquality_popuptext_turbid': '{{ trans("frontoffice/home/index.waterquality_popuptext_turbid") }}',
    'waterquality_popuptext_ec': '{{ trans("frontoffice/home/index.waterquality_popuptext_ec") }}',
    'waterquality_popuptext_tds': '{{ trans("frontoffice/home/index.waterquality_popuptext_tds") }}',
    'waterquality_popuptext_chlorophyll': '{{ trans("frontoffice/home/index.waterquality_popuptext_chlorophyll") }}',
    'waterquality_popuptext_do': '{{ trans("frontoffice/home/index.waterquality_popuptext_do") }}',
    'waterquality_popuptext_temp': '{{ trans("frontoffice/home/index.waterquality_popuptext_temp") }}',
    'waterquality_popuptext_depth': '{{ trans("frontoffice/home/index.waterquality_popuptext_depth") }}',

    'box-storm-img-us-source': '{{ trans("frontoffice/home/index.box-storm-img-us-source") }}',
    'box-storm-img-typhoon-source': '{{ trans("frontoffice/home/index.box-storm-img-typhoon-source") }}',
    'box-storm-img-himawari-source': '{{ trans("frontoffice/home/index.box-storm-img-himawari-source") }}',

    'radar_name': {!! json_encode( trans("frontoffice/home/index.radar_name") ) !!},
}
</script>


<style>
    #fix_modal_tap{
        width:max-content;
    }
</style>

@stop
