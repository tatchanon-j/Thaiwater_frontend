
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
    'href' => $l->httpUrl("backoffice/metadata/metadata"),
    'text' => trans('backoffice/metadata/metadata.main-menu-mode')
  ),
  array(
    'text' => trans('backoffice/metadata/summary_meta.page_name')
    )
  ));
  $view->option('js-init', 'srvData.init(group_Translator)');
  $view->option('page_name', trans('backoffice/metadata/summary_meta.page_name'));
  ?>

  {!! $view->resource('theme-css','css/backoffice/metadata/summary_meta.css') !!}



  @stop

  @section('content')

  <div id="container-highchart" style="min-width:310px; width:98%; height:400px; margin:0 auto"></div>

  <div class="table-responsive">
    <table id="tbl-summary-meta" class="display admin-datatables" width="100%">
      <thead>
        <tr>
          <th>{{ trans('/master.col_order') }}</th>
          <th>{{ trans('/backoffice/metadata/summary_meta.col_agency') }}</th>
          <th>{{ trans('/backoffice/metadata/summary_meta.col_agency_shotname') }}</th>
          <th>{{ trans('/backoffice/metadata/summary_meta.col_metadata_all') }}</th>
          <th>{{ trans('/backoffice/metadata/summary_meta.col_metadata_summary') }}</th>
          <th>{{ trans('/backoffice/metadata/summary_meta.col_detail') }}</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td colspan='3'><b>{{ trans('/master.col_total') }}</b></td>
          <td> <b><span style="float:right;"id ='total_summary_total'></span></b> </td>
          <td> <b><span style="float:right;"id ='total_summary_import'></span></b> </td>
          <td> <b><span style="text-align:left;"></span></b> </td>
        </tr>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="dlgSummayMeta" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="dlgSummayMeta_title">{{ trans('/backoffice/metadata/summary_meta.summary_detail') }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         
        </div>
        <div class="modal-body">
          <div class="data-filters">
            <form role="form-group" id="dlgSummayMeta_form" class="form-row">
              <input type="hidden" id="dlgSummayMeta_id" name="id" />

              <div class="form-group col-sm-6 row">
                <label class="col-form-label text-sm-right col-sm-4" for="dlgSummayMeta_display">{{ trans('/backoffice/metadata/summary_meta.label_metadata_display') }}:</label>
                <div class="col-sm-8">
                  <select id="dlgSummayMeta_filter_display" class="form-control" name="filter_display" data-key="filter_display"
                  data-parsley-required >
                  <!-- <option value="" class="op_default">{{ trans('/master.msg_filter_required') }}</option> -->
                  <option value="0">{{ trans('/backoffice/metadata/summary_meta.option_metadata_summary_agency') }}</option>
                  <option value="1">{{ trans('/backoffice/metadata/summary_meta.option_metadata_summary_category') }}</option>
                  </select>
                </div>
              </div>

              <div id="div_filter_agency" class="form-group col-sm-6 row">
                <label class="col-form-label text-sm-right col-sm-4" for="dlgSummayMeta_agency">{{ trans('/backoffice/metadata/summary_meta.label_agency') }}:</label>
                <div class="col-sm-8">
                  <select id="dlgSummayMeta_filter_agency" class="form-control" name="filter_agency" data-key="filter_agency"
                  data-parsley-required >
                  <option value="" disabled="disabled" class="op_default">{{ trans('/master.msg_filter_required') }}</option>
                  </select>
                </div>
              </div>

              <div id="div_filter_category"  class="form-group col-sm-6 row">
                <label class="col-form-label text-sm-right col-sm-4" for="dlgSummayMeta_agency">{{ trans('/backoffice/metadata/summary_meta.label_category') }}:</label>
                <div class="col-sm-8">
                  <select id="dlgSummayMeta_filter_category" class="form-control" name="filter_category" data-key="filter_category"
                  data-parsley-required >
                  <option value="" disabled="disabled" class="op_default">{{ trans('/master.msg_filter_required') }}</option>
                  </select>
                </div>
              </div>

              <!-- Button Previews -->
              <div class="col-sm-12 text-center">
                <button type="button" class="btn btn-primary" id="dlgSummayMeta-btnPreview">{{ trans('/master.btn_display') }}</button>
              </div>
            </form>
            <div class="clearfix"></div>
          </div>

          <!-- ######## Collapse #########-->
          <div class="panel-group" id="accordion">

          </div>
          <div id="data-notfound" style="display:none;">{{ trans('/backoffice/metadata/summary_meta.notfound') }}</div>

        </div>

      </div>
    </div>
  </div>

@stop
{!! $view->asset('DataTables','DataTables-buttons','parsley','select2', 'highcharts','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/metadata/summary_meta.js') !!}
