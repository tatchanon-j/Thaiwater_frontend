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
    'href' => $l->httpUrl("/backoffice/data_management/check_metadata"),
    'text' => trans('/backoffice/data_management/monitor_data.main_menu_name')
  ),
  array(
    'text' => trans('/backoffice/data_management/check_latest_data.page_name')
  ),
));
$view->option('js-init', 'srvData.init(group_Translator,initVar)');
$view->option('page_name', trans('/backoffice/data_management/check_latest_data.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/data_management/check_latest_data.css') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2','bootstrap-datepicker') !!}
{!! $view->resource('js','js/backoffice/data_management/check_latest_data.js') !!}

@stop

@section('content')

<!-- search -->
<div class="data-filters">
  <form class="form-inline justify-content-center" id="form_filter">
    <input id="date_range" hidden/>
    <!-- type -->
    <div class="form-group col-sm-12 " >
      <div class="col-sm-6 form-inline space-bottom">
        <label for="filter_data_type" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/backoffice/data_management/check_latest_data.filter_datatype') }}:</label>
        <div class="col-sm-8">
          <select  class="form-control" name="filter_data_type" id="filter_data_type" data-key="filter_rain_type" style="width:100%">
            <option value="default">{{ trans('/master.msg_filter_required') }}</option>
          </select>
        </div>
      </div>
      <div class="form-inline col-sm-6">
        <label for="filter_depart_code id_label_single" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/backoffice/data_management/check_latest_data.filter_stattion_code') }}:</label>
        <div class="col-sm-8">
          <select id="filter_depart_code" name="filter_depart_code" class="form-control selectpicker
            js-example-basic-single js-states form-control" required disabled
            data-key="filter_depart_code" data-live-search="true" >
            <option class="op_default" value="">{{ trans('/master.msg_filter_required') }}</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group  col-sm-12">
      <div class="col-sm-6 form-inline">
        <label for="filter_list" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/backoffice/data_management/check_latest_data.filter_list') }}:</label>
        <div class="col-sm-8">
          <select name="filter_list" id="filter_list" class="form-control" data-key="filter_list" style="width:100%">
            <option class="op_default" value="">{{ trans('/master.msg_filter_required') }}</option>
            <option value="3">{{ trans('/backoffice/data_management/check_latest_data.option_data_3') }}</option>
            <option value="7">{{ trans('/backoffice/data_management/check_latest_data.option_data_7') }}</option>
            <option value="1">{{ trans('/backoffice/data_management/check_latest_data.option_data_date') }}</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group col-sm-12 space-top">
      <div class="col-sm-6 form-inline" id="group_startdate">
        <label for="filter_startdate" class="control-label col-sm-4 justify-content-end"><span class="color-red">*</span>{{ trans("/master.start_date") }}:</label>
        <div class="col-sm-8">
          <div class="input-group date">
            <input id="filter_startdate"type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
            <div class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 form-inline" id="group_enddate">
        <label for="filter_enddate" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans("/master.end_date") }}:</label>
        <div class="col-sm-8">
          <div class="input-group date">
            <input id="filter_enddate"type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
            <div class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="text-center space-top" >
      <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('/master.btn_display') }}</button>
    </div>
  </form>
</div>
<!-- end search -->

<!-- table -->
<div id="div_preview" style="display:none">
  <div class="table-responsive">
    <table id="tbl-check-latest-data" class="display datatables" width="100%">
      <thead>
        <tr>
          <th><input type="checkbox" name="select_all" id="select_all">{{trans('master.selected_all')}}</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
      <tfoot>
      </tfoot>
    </table>
  </div>
</div>
<!-- end table -->

<script type="text/javascript">
  var initVar = {
    station_id : '{{ $station_id }}',
    data_type : '{{ $data_type }}',
    date : '{{ $date }}',
  }
</script>

<style>
.space-top{
  margin-top:15px
}
.space-bottom{
  margin-bottom:15px
}
</style>

@stop
