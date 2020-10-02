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
      'text' => trans('backoffice/dba/manage_partition.page_name')
      )
  )
);

  $view->option('js-init','srvData.init(group_Translator)');
  $view->option('page_name', trans('backoffice/dba/manage_partition.page_name'));
?>


  {!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect', 'JsonHelper','select2','bootstrap-datepicker') !!}
  {!! $view->resource('js','js/backoffice/dba/manage_partition.js') !!}
  {!! $view->resource('theme-css','css/backoffice/dba/manage_partition.css') !!}

@section('content')

  <!-- search -->
  <div class="data-filters">
    <form class="form-inline " id="form_import">
      <div class="col-sm-4 form-group">
        <label for="filter_table" class="col-sm-2 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.table') }}:</label>
        <div class="col-sm-10">
          <select id="filter_table" class="form-control select-search" name="filter_table">
            <option value="" class="intro">{{ trans('master.msg_filter_required') }}</option>
          </select>
        </div>
      </div>

      <div class="col-sm-4 form-group">
        <label for="filter_years" class="col-sm-2 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.year') }}:</label>
        <div class="col-sm-10">
          <input type="text" id="filter_years" class="form-control" name="filter_years" style="width:100%">
        </div>
      </div>

      <div class="col-sm-3">
        <button id="btn_create" type="button" class="btn btn-success" id="">{{ trans('/backoffice/dba/manage_partition.btn_create_partition') }}</button>
        <button id="btn_delete" type="button" class="btn btn-danger" id="">{{ trans('/backoffice/dba/manage_partition.btn_delete_partition') }}</button>
      </div>
      
      <div class="col-sm-4 form-group">
        <label class="col-sm-2 control-label justify-content-end"></label>
        <div class="col-sm-10">
        <p>
        Partition รายเดือน
        </p>
        </div>
      </div>


      <br>
      <br>
      <br>
      <div class="col-sm-12 form-group justify-content-center">
        <div class="text-center">
          <button id="btn_display" type="button" class="btn btn-primary" id="">{{ trans('/master.btn_display') }}</button>
        </div>
      </div>
    </form>

    <div class="clearfix"></div>
  </div>
  <!-- end search -->

  <!-- data table -->
  <div class="table-responsive">
    <table id="tbl-history" class="display admin-datatables" width="100%">
      <thead>
        <tr>
          <th>{{ trans('/master.col_datetime') }}</th>
          <th>{{ trans('/master.col_month') }}</th>
          <th>{{ trans('/backoffice/dba/manage_partition.log') }}</th>
          <th>{{ trans('/backoffice/dba/manage_partition.creator') }}</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>
  <!-- end data table -->

  @stop
