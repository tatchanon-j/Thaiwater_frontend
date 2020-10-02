<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
array(
    array(
        'href' => $l->httpUrl("/backoffice/data_integration/mgmt_script"),
        'text' => trans('backoffice/data_integration/mgmt_script.main_menu_name')
    ),
    array(
        'text' => trans('backoffice/data_integration/compare_master.page_name_master')
    )
));
$view->option('js-init','srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_integration/compare_master.page_name_master'));
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper','bootstrap-datepicker') !!}
{!! $view->resource('js','js/backoffice/data_integration/compare_master.js') !!}

{!! $view->resource('js','js/ckeditor/ckeditor.js') !!}

{!! $view->resource('theme-css','css/backoffice/data_integration/compare_transection.css') !!}

@extends('backoffice/layout/master')

@stop

@section('content')

<div class="div_main_table">
    <div class="data-filters col-sm-12">
        <form class="form-row">
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary" id="btn_reprocess">{{ trans('/backoffice/data_integration/compare_master.btn_reprocess') }}</button>
            </div>
            <div class="col-sm-8 offset-sm-1" style="padding-top: 5px;">
                <p>{{ trans('/backoffice/data_integration/compare_master.data_at') }}: <span class="last_update"></span></p>
            </div>
        </form>
    </div>

    <!-- data table -->
    <div class="table-responsive col-sm-12">
        <table id="tbl-compare-master" class="display transection-datatables" width="100%">
            <thead>
                <tr>
                    <!-- <th>{{trans('/master.col_order')}}</th> -->
                    <th>{{ trans('/backoffice/data_integration/compare_master.col_table_nhc') }}</th>
                    <th>{{ trans('/backoffice/data_integration/compare_master.col_record_nhc') }}</th>
                    <th>{{ trans('/backoffice/data_integration/compare_master.col_table_thai30') }}</th>
                    <th>{{ trans('/backoffice/data_integration/compare_master.col_record_thai30') }}</th>
                    <th>{{ trans('/backoffice/data_integration/compare_master.col_diff') }}</th>
                    <th>{{ trans('/backoffice/data_integration/compare_master.col_ex') }}</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td><b>{{ trans('/master.col_total') }}</b></td>
                    <td><b><span style="float:right;" id="total_summary_total_nhc"></span></b> </td>
                    <td colspan="2"><b><span style="float:right;" id="total_summary_total_tw30"></span></b> </td>
                    <td><b><span style="float:right;" id="total_diff"></span></b> </td>
                    <td><b><span style="text-align:left"></span>{{ trans('/master.col_page_allpage') }}</b></td>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
    <!-- end data table -->
</div>

<div class="div_detail_table" style="display:none">
  <div class="div_old_table col-sm-6">
      <h4>{{ trans('/backoffice/data_integration/compare_master.table_nhc') }}</h4>
      <div class="table-responsive">
          <table id="tbl-detail-old" class="display old-datatables" width="100%">

          </table>
      </div>
  </div>
  <div class="dev_new_table col-sm-6">
      <h4>{{ trans('/backoffice/data_integration/compare_master.table_thaiwater30') }}</h4>
      <div class="table-responsive">
          <table id="tbl-detail-new" class="display new-datatables" width="100%">

          </table>
      </div>
  </div>
  <div class="text-center col-sm-12" style="margin-top:2%">
      <button id="btn-cancel" type="button" class="btn btn-default center" data-dismiss="modal">{{ trans("/master.btn_close") }}</button>
  </div>
</div>

@stop
