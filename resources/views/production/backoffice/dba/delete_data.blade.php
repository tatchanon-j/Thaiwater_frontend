@section('extra_head')

@extends('backoffice/layout/master')

<?php
  $view = \App\Helpers\ViewHelper::getInstance();
  $locale = \App\Helpers\LocaleHelper::getInstance();
  $lang = $locale->getAllLocales();
  $getLocal = $locale->getLocale();

  $view->option('breadcrumb',
  array(
    array(
      'href' => $locale->httpUrl("/backoffice/dba/delete_data"),
      'text' => trans('backoffice/dba/delete_data.main_menu_name')
    ),
    array(
      'text' => trans('backoffice/dba/delete_data.page_name')
      )
    ));
    $view->option('js-init','srvData.init(group_Translator)');
    $view->option('page_name', trans('backoffice/dba/delete_data.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/dba/delete_data.css') !!}
{!! $view->resource('js','js/backoffice/dba/delete_data.js') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','select2','Jsonhelper') !!}


@stop

@section('content')

<!-- search -->
<div class="data-filters">
  <form class="form-inline filter-form" id="filter-form">
    <input id="date_range" hidden/>
    <div class="col-sm-6 form-group">
    		<label for="label_datatype" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/backoffice/dba/delete_data.data_type') }} :</label>
    		<div class="col-sm-8 fil_datatype">
          <select id="filter_datatype" class="form-control" data-key="station" style="width:100%" required>
            <option value="">{{ trans('/master.msg_filter_required') }}</option>
          </select>
        </div>
    </div>
    <div class="form-group col-sm-6">
      <label for="label_station_depart" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/backoffice/dba/delete_data.station') }}:</label>
      <div class="col-sm-8">
        <select name="code_station" id="filter_code_station" class="form-control frm-search" data-key="station_departr"
          disabled required>
          <option value="" class="op_default">{{ trans('/master.msg_filter_required') }}</option>
        </select>
      </div>
    </div>

    <div class="form-group col-sm-6">
      <label for="filter_startdate" class="control-label col-sm-4 justify-content-end"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_from") }}:</label>
      <div class="col-sm-8">
        <div class="input-group date">
          <input id="filter_startdate"type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
          <div class="input-group-append">
              <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group col-sm-6">
      <label for="filter_enddate" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_to") }}:</label>
      <div class="col-sm-8">
        <div class="input-group date">
          <input id="filter_enddate"type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
          <div class="input-group-append">
              <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>

    <div class="col-sm-12 form-group justify-content-center">
      <div class="text-center">
        <button id="btn_preview" type="button" class="btn btn-primary" >{{ trans('/master.btn_display') }}</button>
      </div>
    </div>
  </form>
  <div class="clearfix"></div>
</div>
<!-- end search -->

<!-- loading -->
<div id="div_loading">
	<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
</div>
<!-- end loading -->

<!-- data table -->
<div id="div_preview">
  <div class="table-responsive">
    <table id="tbl-deletedata" class="display datatables" width="100%">
      <thead>
        <tr>
          <th><input class="control-label" type="checkbox" name="select_all" id="select_all"> {{ trans('/master.selected_all') }}</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
      <tfoot>
      </tfoot>
    </table>
  </div>
</div>
<!-- end data table -->
@stop
