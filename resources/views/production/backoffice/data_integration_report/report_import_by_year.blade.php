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
      'text' => trans('backoffice/data_integration_report/report_import_by_year.page_name')
    )
  )
);
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_integration_report/report_import_by_year.page_name'));
?>

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','highcharts','JsonHelper','bootstrap-datepicker') !!}
{!! $view->resource('js','js/backoffice/data_integration_report/report_import_by_year.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_integration_report/report_import_by_year.css') !!}


@stop

@section('content')
<!-- fiter search -->
<div class="data-filters">
  <form class="form-row" id="form_import">
    <div class="col-sm-12 form-group row justify-content-center">
      <div class="col-sm-3">
        <div id="box1" class="col-sm group grp-active text-center">
          <input type="radio" name="box" id="box-1" value="1" checked="true" />
          <i class="fa fa-3x fa-bar-chart" aria-hidden="true"></i><br />
          {{ trans('/backoffice/data_integration_report/report_import_by_year.box_1') }}
        </div>
      </div>
      <div id="box2" class="col-sm-3">
        <div class="col-sm group text-center">
          <input type="radio" name="box" id="box-2" value="2">
          <i class="fa fa-3x fa-bar-chart" aria-hidden="true"></i><br>
          {{ trans('/backoffice/data_integration_report/report_import_by_year.box_2') }}
        </div>
      </div>
    </div>


    <div class="col-sm-12 overall_monthly form-row mt-4">

      <div class="col-sm-12 form-row">
        <div class="col-sm-4 form-group row">
          <label for="filter_form" class="col-sm-6 col-form-label text-sm-right"><span class="color-red">*</span>ลักษณะการเปรียบเทียบ :</label>
          <div class="col-sm-6">
            <select name="filter_form" id="filter_form" class="form-control" data-key="filter_form">
              <option value="1">เปรียบเทียบรายปี</option>
              <option value="2">เปรียบเทียบรายเดือน</option>
              <option value="3">เปรียบเทียบรายเดือนของแต่ล่ะปี</option>
            </select>
          </div>
        </div>
      </div>


      <div class="col-sm-12 form-row">

        <div class="col-sm-4 form-group row">
          <label for="filter_year" class="col-sm-6 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.year') }}:</label>
          <div class="col-sm-6">
            <input id="filter_year" class="form-control" name="rainttype" data-key="raintype">
            <!-- <option calss="op_default" value="">{{ trans('/master.msg_filter_required') }}</option> -->
            </input>
            <div id="filter_yaer2">
              <select name="multi_year_overall" id="filter_multi_overall" class="form-control" data-key="multi_year_overall" multiple="multiple">
                
              </select>
            </div>
          </div>
        </div>

        <div class="col-sm-4 form-group row" id="month_overall">
          <label for="filter_month" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.month') }}:</label>
          <div class="col-sm-6">
            <select name="monthstart" id="filter_month" class="form-control" data-key="monthstart">
              <option value="1">{{ trans('/master.january') }}</option>
              <option value="2">{{ trans('/master.february') }}</option>
              <option value="3">{{ trans('/master.march') }}</option>
              <option value="4">{{ trans('/master.april') }}</option>
              <option value="5">{{ trans('/master.may') }}</option>
              <option value="6">{{ trans('/master.june') }}</option>
              <option value="7">{{ trans('/master.july') }}</option>
              <option value="8">{{ trans('/master.august') }}</option>
              <option value="9">{{ trans('/master.september') }}</option>
              <option value="10">{{ trans('/master.october') }}</option>
              <option value="11">{{ trans('/master.november') }}</option>
              <option value="12">{{ trans('/master.december') }}</option>
            </select>
          </div>
        </div>

        <div class="col-sm-4 form-group row">
          <label for="filter_month" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.import_type') }}:</label>
          <div class="col-sm-6">
            <select name="connection_format" id="filter_connection" class="form-control" data-key="connection_format">
              <option value="">{{ trans('/master.select_all') }}</option>
              <option value="online">{{ trans('/master.online') }}</option>
              <option value="offline">{{ trans('/master.offline') }}</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 compare_yearly form-row mt-4" style="display:none">
      <div class="col-sm-5 form-group row">
        <label for="filter_agency" class="col-sm-4 form-control-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.agency') }}</label>
        <div class="col-sm-8">
          <select id="filter_agency" class="form-control" name="rainttype" data-key="raintype">

          </select>
        </div>
      </div>

      <div class="col-sm-5 form-group row">
        <label for="filter_multi_year" class="col-sm-4 form-control-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.year') }}:</label>
        <div class="col-sm-6">
          <select name="multi_year" id="filter_multi_year" class="form-control" data-key="multi_year" multiple="multiple">

          </select>
        </div>
        <div class="row col-sm-1">
          <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top" title="{{trans('backoffice/data_integration_report/report_import_by_year.info_years')}}"></i>
        </div>
      </div>
    </div>

    <div class="col-sm-12 form-group">
      <div class="text-left">
        <a href="#" data-toggle="modal" data-target="#dlg-calculate"><u>*{{ trans('/backoffice/data_integration_report/report_import_by_year.msg_calulate') }}</u></a>
      </div>
    </div>

    <div class="col-sm-12 form-group">
      <div class="text-center">
        <button type="button" class="btn btn-primary" id="btn_preview" data-name="display">{{ trans('/master.btn_display') }}</button>
      </div>
    </div>
  </form>
  <div class="clearfix"></div>
</div>
<!-- end filter search -->

<!-- graph content -->
<div id="bar-graph" style="min-width:310px; width:98%; height:400px; margin:0 auto"></div>
<!-- graph-offline content -->
<div id="bar-graph-offline" style="min-width:310px; width:98%; height:400px; margin:0 auto"></div>
<!-- end graph content -->

<!-- table overall year -->

<!-- table overall monthly -->
<div id="t1" class="table-responsive tbl-overall">
  <table id="tbl-overall-monthly" class="display archive-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('/master.col_order') }}</th>
        <th style="width: 20%;">{{ trans('/backoffice/data_integration_report/report_import_by_year.col_agency') }}</th>
        <th style="width: 15%;">{{ trans('/backoffice/data_integration_report/report_import_by_year.col_agency_sht') }}</th>
        <th style="width: 15%;">{{ trans('/backoffice/data_integration_report/report_import_by_year.col_file_import') }}</th>
        <th style="width: 15%;">{{ trans('/backoffice/data_integration_report/report_import_by_year.col_data_import') }}</th>
        <th style="width: 15%;">{{ trans('/backoffice/data_integration_report/report_import_by_year.col_import_percent') }}</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="3"><b>{{ trans('/master.col_total') }}</b></td>
        <td> <b><span style="float:right;" id='total_number_of_file'></span></b> </td>
        <td> <b><span style="float:right;" id='total_number_of_record'></span></b> </td>
        <td> <b><span style="float:right;" id='total_download_count_percent'></span></b> </td>
      </tr>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end table overall monthly -->

<!-- table overall monthly -->
<div class="table-responsive tbl-overall-2">
  <table id="tbl-overall-year" class="display archive-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('/master.col_order') }}</th>
        <th style="width: 20%;">{{ trans('/backoffice/data_integration_report/report_import_by_year.col_agency') }}</th>
        <th style="width: 15%;">{{ trans('/backoffice/data_integration_report/report_import_by_year.col_agency_sht') }}</th>
        <th style="width: 5%;">ปี</th>
        <th style="width: 15%;">{{ trans('/backoffice/data_integration_report/report_import_by_year.col_file_import') }}</th>
        <th style="width: 15%;">{{ trans('/backoffice/data_integration_report/report_import_by_year.col_data_import') }}</th>
        <th style="width: 15%;">{{ trans('/backoffice/data_integration_report/report_import_by_year.col_import_percent') }}</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="4"><b>{{ trans('/master.col_total') }}</b></td>
        <td> <b><span style="float:right;" id='total_number_of_file_multi_year'></span></b> </td>
        <td> <b><span style="float:right;" id='total_number_of_record_multi_year'></span></b> </td>
        <td> <b><span style="float:right;" id='total_download_count_percent_multi_year'></span></b> </td>
      </tr>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end table overall monthly -->

<!--table compare yealy -->
<div class="table-responsive tbl-compare">
  <table id="tbl-compare-yearly" class="table display compare-datatables" width="100%">
    <thead>
      <tr>
        <th colspan="2">{{ trans('/master.col_year') }}</th>
        <th>{{ trans('/master.jan.') }}</th>
        <th>{{ trans('/master.feb.') }}</th>
        <th>{{ trans('/master.mar.') }}</th>
        <th>{{ trans('/master.apr.') }}</th>
        <th>{{ trans('/master.may.') }}</th>
        <th>{{ trans('/master.jun.') }}</th>
        <th>{{ trans('/master.jul.') }}</th>
        <th>{{ trans('/master.aug.') }}</th>
        <th>{{ trans('/master.sept.') }}</th>
        <th>{{ trans('/master.oct.') }}</th>
        <th>{{ trans('/master.nov.') }}</th>
        <th>{{ trans('/master.dec.') }}</th>
        <th class="sum_column">{{trans('/master.col_sum')}}</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    </tfoot>
  </table>
</div>
<!-- end table compare yearly -->

<!-- dialog diplay how to calculate -->
<div class="modal fade" id="dlg-calculate" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('/backoffice/data_integration_report/report_import_by_year.msg_calulate') }}</h4>
      </div>
      <div class="modal-body">
        <ul>
          <li>{{ trans('/master.cal_list_1') }}</li>
          <li>{{ trans('/master.cal_list_2') }}</li>
        </ul>
        <p><b>{{ trans('/master.remark') }}</b> {{ trans('/master.remark_cal') }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('/master.btn_close') }}</button>
      </div>
    </div>

  </div>
</div>
<!-- dialog diplay how to calculate -->




@stop