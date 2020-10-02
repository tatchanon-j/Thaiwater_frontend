@section('extra_head')

@extends('backoffice/layout/master')

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option(
  'breadcrumb',
  array(
    array(
      'href' => $l->httpUrl("backoffice/data_integration_report/report_event"),
      'text' => trans('backoffice/data_integration_report/report_event.main_menu_name')
    ),
    array(
      'text' => trans('backoffice/data_integration_report/report_import_by_month.page_name')
    )
  )
);
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_integration_report/report_import_by_month.page_name'));
?>


{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','highcharts','select2','JsonHelper','bootstrap-datepicker') !!}
{!! $view->resource('js','js/backoffice/data_integration_report/report_import_by_month.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_integration_report/report_import_by_month.css') !!}


@stop

@section('content')
<!-- filter search -->
<div class="data-filters">


  <div class="form-row">
    <div class="col-sm-4 form-group row">
      <label for="" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>รูปแบบการแสดง:</label>
      <div class="col-sm-8">
        <select id="filter_form" class="form-control" name="filter_form">
          <option value="1">ภาพรวมทั้งหมด</option>
          <option value="2">ภาพรวมรายปี</option>
        </select>
      </div>
    </div>
  </div>

  <form class="form-row" id="form_import">

    <div class="col-sm-4 form-group row">
      <label for="filter_agency" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.agency') }}:</label>
      <div class="col-sm-8">
        <select id="filter_agency" class="form-control" name="agency" data-key="raintype" multiple="multiple">

        </select>
      </div>
    </div>

    <div class="col-sm-4 form-group row">
      <label for="filter_year" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.year')}}:</label>
      <div class="col-sm-8">
        <!-- <input type="text" id="filter_year" class="form-control"> -->
        <select id="filter_year" class="form-control" name="year" multiple="multiple">

        </select>
      </div>
    </div>

    <div id="form_filter_month" class="col-sm-4 form-group row">
      <label for="filter_month" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.month') }}:</label>
      <div class="col-sm-8">
        <select name="monthend" id="filter_month" class="form-control" data-key="monthend" multiple="multiple">
          <option value="1" selected>{{ trans('/master.january') }}</option>
          <option value="2" selected>{{ trans('/master.february') }}</option>
          <option value="3" selected>{{ trans('/master.march') }}</option>
          <option value="4" selected>{{ trans('/master.april') }}</option>
          <option value="5" selected>{{ trans('/master.may') }}</option>
          <option value="6" selected>{{ trans('/master.june') }}</option>
          <option value="7" selected>{{ trans('/master.july') }}</option>
          <option value="8" selected>{{ trans('/master.august') }}</option>
          <option value="9" selected>{{ trans('/master.september') }}</option>
          <option value="10" selected>{{ trans('/master.october') }}</option>
          <option value="11" selected>{{ trans('/master.november') }}</option>
          <option value="12" selected>{{ trans('/master.december') }}</option>
        </select>
      </div>
    </div>

    <div class="col-sm-12 form-group">
      <div class="text-center">
        <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('/master.btn_display') }}</button>
      </div>
    </div>

  </form>

  <div class="clearfix"></div>
</div>
<!-- end filter search -->

<!-- graph content -->
<div id="bar-graph" style="height: 50%"></div>
<!-- end graph content -->

<!-- table -->
<div class="table-responsive" id="tbl-2">
  <table id="tbl-reportImpartByMonth" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>ชื่อหน่วยงาน</th>
        <th>{{ trans('/backoffice/data_integration_report/report_import_by_month.col_import_date') }}</th>
        <th>{{ trans('/backoffice/data_integration_report/report_import_by_month.col_storage') }}</th>
        <th>{{ trans('/backoffice/data_integration_report/report_import_by_month.col_file_import') }}</th>
        <th>{{ trans('/backoffice/data_integration_report/report_import_by_month.col_data_import') }}</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td><b>{{ trans('/master.col_total') }}</b></td>
        <td></td>
        <td> <b><span style="float:right;" id='total_download_size'></span></b> </td>
        <td> <b><span style="float:right;" id='total_number_of_file'></span></b> </td>
        <td> <b><span style="float:right;" id='total_number_of_record'></span></b> </td>
      </tr>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end table -->

<!-- table -->
<div class="table-responsive" id="tbl-1">
  <table id="tbl-sumAll" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('/backoffice/data_integration_report/report_import_by_month.col_storage') }}</th>
        <th>{{ trans('/backoffice/data_integration_report/report_import_by_month.col_file_import') }}</th>
        <th>{{ trans('/backoffice/data_integration_report/report_import_by_month.col_data_import') }}</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td> <b><span style="float:right;" id='total_download_size_all'></span></b> </td>
        <td> <b><span style="float:right;" id='total_number_of_file_all'></span></b> </td>
        <td> <b><span style="float:right;" id='total_number_of_record_all'></span></b> </td>
      </tr>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end table -->

@stop