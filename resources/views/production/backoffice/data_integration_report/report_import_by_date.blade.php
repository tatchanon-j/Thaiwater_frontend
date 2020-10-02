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
    'href' => $l->httpUrl("backoffice/data_integration_report/report_event"),
    'text' => trans('backoffice/data_integration_report/report_event.main_menu_name')
  ),
  array(
    'text' => trans('backoffice/data_integration_report/report_import_by_date.page_name')
  )
  ));
  $view->option('js-init', 'srvData.init(group_Translator)');
  $view->option('page_name', trans('backoffice/data_integration_report/report_import_by_date.page_name'));
  ?>
  {!! $view->resource('theme-css','css/backoffice/data_integration_report/report_import_by_date.css') !!}


  @stop

  @section('content')

  <!-- filter search  -->
  <div class="data-filters">
    <form class="form-row" id="form_import">
      <input id="date_range" hidden/>
      <div class="form-group row col-sm-4">
        <label for="filter_startdate" class="col-form-label text-sm-right col-sm-4"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_from") }}:</label>
        <div class="col-sm-8">
          <div class="input-group date">
            <input id="filter_startdate" type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
            <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="false"></i></span>
          </div>
          </div>
        </div>
      </div>

      <div class="form-group row col-sm-4">
        <label for="filter_enddate" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_to") }}:</label>
        <div class="col-sm-8">
          <div class="input-group date">
            <input id="filter_enddate" type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
            <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="false"></i></span>
          </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4 form-group row">
        <label for="filter_month" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.import_type') }}:</label>
        <div class="col-sm-8">
          <select name="connection_format" id="filter_connection" class="form-control" data-key="connection_format">
            <option value="">{{ trans('/master.select_all') }}</option>
            <option value="online">{{ trans('/master.online') }}</option>
            <option value="offline">{{ trans('/master.offline') }}</option>
          </select>
        </div>
      </div>

      <!-- btn_preview -->
      <div class="col-sm-12 form-group">
        <div class="text-center">
          <button type="button" class="btn btn-primary" id="btn_display">{{ trans('/master.btn_display') }}</button>
        </div>
      </div>

    </form>
    <div class="clearfix"></div>
  </div>
  <!-- end filter search -->

  <!-- graph content -->
  <div id="bar-graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
  <!-- end graph content -->

  <!-- table master -->
  <div class="table-responsive">
    <table id="tbl-report-import" class="display admin-datatables" width="100%">
      <thead>
        <tr>
          <th>{{ trans('/master.col_order') }}</th>
          <th>{{ trans("backoffice/data_integration_report/report_event.column_agency") }}</th>
          <th>{{ trans("backoffice/data_integration_report/report_import_by_date.col_agency_sht") }}</th>
          <th class="column-3"></th>
          <th>{{ trans("backoffice/data_integration_report/report_import_by_date.col_imported") }}</th>
          <th>{{ trans("backoffice/data_integration_report/report_import_by_date.col_import_percent") }}</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td colspan="3"> <b>{{ trans('/master.col_total') }}</b></td>
          <td> <b><span style="float:right;"id ='total_expected'></span></b> </td>
          <td> <b><span style="float:right;"id ='total_download_count'></span></b> </td>
          <td></td>
        </tr>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>
  <!-- end table master -->

  <!-- dialog table detail -->
  <div class="modal fade" id="dlg-tabledetail" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="dlg-title" class="modal-title">{{ trans("backoffice/data_integration_report/report_import_by_date.header_agency") }}</h4>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <!-- table detail -->
            <table id="dlg-tblDetail" class="display detail-datatables" width="100%">
              <thead>
                <tr>
                  <th>{{ trans('/master.col_order') }}</th>
                  <th>{{ trans("backoffice/data_integration_report/report_import_by_date.col_metadata") }}</th>
                  <th class="column-3"></th>
                  <th>{{ trans("backoffice/data_integration_report/report_import_by_date.col_import") }}</th>
                  <th>{{ trans("backoffice/data_integration_report/report_import_by_date.col_import_percent") }}</th>
                  <th>{{ trans("backoffice/data_integration_report/report_import_by_date.col_import_date") }}</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <td colspan="2"><b>{{ trans("backoffice/data_integration_report/report_import_by_date.col_sum") }}</b></td>
                  <td> <b><span style="float:right;"id ='dlg_total_expected'></span></b> </td>
                  <td> <b><span style="float:right;"id ='dlg_total_download_count'></span></b> </td>
                  <td> <b><span style="float:right;"id ='dlg_total_count_percent'></span></b> </td>
                  <td></td>
                </tr>
              </tfoot>
              <tbody>
              </tbody>
            </table>
            <!-- end table detail -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('/master.btn_close') }}</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end dialog table detail -->

  @stop

  {!! $view->asset('DataTables','DataTables-buttons','DataTables-select','parsley','bootstrap-multiselect' , 'bootstrap-datepicker','highcharts','JsonHelper') !!}

  {!! $view->resource('js','js/backoffice/data_integration_report/report_import_by_date.js') !!}
