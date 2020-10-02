@section('extra_head')

@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
array(
  array(
    'href' => $l->httpUrl("backoffice/tools/mgmt_cache"),
    'text' => trans('backoffice/tools/mgmt_cache.main_menu_name')
  ),array(
    'text' => trans('backoffice/tools/mgmt_display.page_name')
    )
  ));
  $view->option('js-init','srvData.init(group_Translator)');
  $view->option('page_name', trans('backoffice/tools/mgmt_display.page_name'));
  ?>

  {!! $view->resource('theme-css','css/backoffice/tools/display_setting.css') !!}
  {!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper','parsley') !!}
  {!! $view->resource('js','../vendor/jscolor/jscolor.js') !!}
  {!! $view->resource('js','js/backoffice/tools/display_setting.js') !!}

  <!-- {!! $view->resource('js','js/backoffice/tools/display_setting/dam_setting.js') !!}
  {!! $view->resource('js','js/backoffice/tools/display_setting/OnLoadDamGraph.js') !!}
  {!! $view->resource('js','js/backoffice/tools/display_setting/pre_rain_setting.js') !!}
  {!! $view->resource('js','js/backoffice/tools/display_setting/rain_setting.js') !!}
  {!! $view->resource('js','js/backoffice/tools/display_setting/storm_setting.js') !!}
  {!! $view->resource('js','js/backoffice/tools/display_setting/warning_setting.js') !!}
  {!! $view->resource('js','js/backoffice/tools/display_setting/waterlevel_setting.js') !!}
  {!! $view->resource('js','js/backoffice/tools/display_setting/waterquality_setting.js') !!}
  {!! $view->resource('js','js/backoffice/tools//display_setting/wave_setting.js') !!} -->



  @stop

  @section('content')

  <!-- data table -->
  <div class="table-responsive">
    <table id="tbl-setting" class="display setting-datatables" width="100%">
      <thead>
        <tr>
          <th>{{ trans('/master.col_order') }}</th>
          <th>List Setting</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>
  <!-- end data table -->

  @include('backoffice/tools/modal_display_setting.dam_scale_color')
  @include('backoffice/tools/modal_display_setting.OnLoadDamGraph')
  @include('backoffice/tools/modal_display_setting.pre_rain_setting')
  @include('backoffice/tools/modal_display_setting.rain_setting')
  @include('backoffice/tools/modal_display_setting.storm_setting')
  @include('backoffice/tools/modal_display_setting.warning_setting')
  @include('backoffice/tools/modal_display_setting.waterlevel_setting')
  @include('backoffice/tools/modal_display_setting.waterquality_setting')
  @include('backoffice/tools/modal_display_setting.wave_setting')


  <script>
      var translate = {!! json_encode( trans("frontoffice/home/index") ) !!};
  </script>
  @stop
