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

<!-- import style cheet -->
{!! $view->resource('theme-css','css/backoffice/tools/mgmt_display.css') !!}
<!-- end import style cheet -->


@stop

@section('content')

<!-- filter and foom input setting -->
<div class="data-filters">
  <form id="display-form" class="form-horizontal" data-parsley-validate>
    <!-- filter search -->
  	<div class="form-group col-sm-12">
  		<label for="" class="col-sm-2 control-label">{{ trans('/backoffice/tools/mgmt_display.filter_setting')}}:</label>
  		<div class="col-sm-5">
  			<select id="filter_setting" class="form-control">

  			</select>
  		</div>
  	</div>
    <!-- end filter search -->

    <!-- diaplay data setting -->
    <div class="form-group col-sm-12">
  		<label class="col-sm-2 control-label">{{ trans('/backoffice/tools/mgmt_display.display_setting')}}:</label>
  		<div class="col-sm-9 box-setting">
  			<textarea id="display_setting" class="form-control" rows="15" disabled="true"
          data-parsley-required data-parsley-json>
        </textarea>
  		</div>
      <div class="col-sm-1"><a href="#" data-toggle="tooltip" title="{{ trans('/backoffice/tools/mgmt_display.tool_trip_format') }}"><i class="fa fa-info-circle" aria-hidden="true"></i></a></div>
  	</div>
    <!-- end diaplay data setting -->

    <!-- button edit -->
    <div class="col-sm-11 text-right"><i class="btn btn-edit fa fa-pencil-square-o" title="{{ trans('/master.btn_edit') }}" aria-hidden="true"></i></div>
    <!-- end button edit -->

    <!-- button save and cancel -->
    <div class="col-sm-12 text-center grp-btn" style="display:none;">
      <button type="button" class="btn btn-primary" id="btn-save">{{ trans('/master.btn_save') }}</button>
      <button type="button" class="btn btn-default" id="btn-cancel">{{ trans('/master.btn_cancel') }}</button>
    </div>
    <!-- end button save and cancel -->

    <div class="clearfix"></div>
  </form>
</div>
<!-- end filter and foom input setting -->

@stop
<!-- import java script -->
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper','parsley') !!}
{!! $view->resource('js','js/backoffice/tools/mgmt_display.js') !!}
<!-- end import java script -->
