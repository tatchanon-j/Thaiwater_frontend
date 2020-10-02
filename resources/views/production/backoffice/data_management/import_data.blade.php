<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
array(
  array(
    'href' => $l->httpUrl("/data_management"),
    'text' => trans('backoffice/data_management/monitor_data.main_menu_name')
  ),
  array(
    'text' => trans('backoffice/data_management/import_data.page_name')
  )
));
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_management/import_data.page_name'));
?>

@section('extra_head')

{!! $view->resource('theme-css','css/backoffice/data_management/import_data.css') !!}

@extends('backoffice/layout/master')

@stop

@section('content')
<!-- search -->
<div class="data-filters">
  <form class="form-inline justify-content-center" id="form_import" >
    <div class="form-group col-sm-6 " >
      <label for="filter_agency" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.agency') }}:</label>
      <div class="col-sm-8">
        <select id="filter_agency" name="agency" class="form-control select-search">
          <option value="" class="op_default">{{ trans('/master.msg_filter_required') }}</option>
        </select>
      </div>
    </div>

    <!-- filter_tablename -->
    <div class="form-group col-sm-6 ">
      <label for="filter_metadata" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.metadata') }}:</label>
      <div class="col-sm-8">
        <select id="filter_metadata" class="form-control select-search" disabled>
          <option value="" class="op_default">{{ trans('/master.msg_filter_required') }}</option>
        </select>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="col-sm-12">
      <p><b>{{ trans('/master.cmd_download') }}: </b><span class="download_command"> - </span></p>
    </div>

    <div class="col-sm-12 note">
      <p data-toggle="modal" data-target="#dlg-note"><b>{{ trans('/master.condition') }}</b>
      <a class="color-red" style="text-decoration: underline;" target="_blank" href="{!! $view->buildResourceSrc('pdf/how_to_import_file_to_folder.pdf') !!}"> {{ trans('/master.prepare_data_import') }}</a></p>
    </div>
    <div class="text-center col-sm-12">
      <button type="button" class="btn btn-success" id="btn_upload"><i class="fa fa-download" aria-hidden="true"></i> {{ trans('/master.btn_import_data') }}</button>
      <button type="button" class="btn btn-primary" id="btn_history">{{ trans('/master.btn_history') }}</button>
    </div>
  </form>
  <div class="clearfix"></div>
</div>
<!-- end search -->

<!-- data table -->
<!-- <div id="dlg-note" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4>{{ trans('/master.condition') }}</h4>
      </div>
      <div class="modal-body">
        <p>{{ trans('/master.prepareing_document') }}</p>
      </div>
      <div class="modal-footer">
        <bunton type="button" class="btn btn-default" data-dismiss="modal">{{ trans('/master.btn_close') }}</bunton>
      </div>
    </div>
  </div>
</div> -->
<!-- end data table -->

<!-- data table -->
<div class="table-responsive col-sm-12">
  <h4>ประวัติการนำเข้าข้อมูล</h4>
  <table id="tbl-history-import" class="display history-import-datatables" width="100%">
    <thead>
      <tr>
          <tr>
              <th>{{trans('backoffice/data_integration/hi_script.metadata')}}</th>
              <th>{{trans('backoffice/data_integration/hi_script.agency')}}</th>
              <th>{{trans('backoffice/data_integration/hi_script.dl_starttime')}}</th>
              <th>{{trans('backoffice/data_integration/hi_script.im_endtime')}}</th>
              <th>{{trans('backoffice/data_integration/hi_script.duration_time')}}</th>
              <th>{{trans('backoffice/data_integration/hi_script.status')}}</th>
          </tr>
      </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end data table -->

@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/data_management/import_data.js') !!}
