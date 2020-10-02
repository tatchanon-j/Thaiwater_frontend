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
    'href' => $l->httpUrl("/data_management"),
    'text' => trans('backoffice/data_management/monitor_data.main_menu_name')
  ),
  array(
    'text' => trans('backoffice/data_management/error_data.page_name')
  )
  ));
  $view->option('js-init', 'srvData.init(group_Translator)');
  $view->option('page_name', trans('backoffice/data_management/error_data.page_name'));
  ?>


{!! $view->resource('theme-css','css/backoffice/data_management/error_data.css') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','select2','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/data_management/error_data.js') !!}


@stop

@section('content')

<!-- search -->
<div class="data-filters ">
  <form class="form-inline justify-content-center" id="form_import">
      <div class="col-sm-6 form-group justify-content-center">
        <label for="filter_agency" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.agency') }}:</label>
        <div class="col-sm-6 ">
          <select name="filter_agency" id="filter_agency" class="form-control select-search" data-key="filter_agency">
            <option value="" class="op_default">{{ trans('/master.msg_filter_required') }}</option>
          </select>
        </div>
      </div>

      <div class="col-sm-6 form-group ">
        <label for="filter_date" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.start_date') }}:</label>
        <div class="col-sm-6">
          <div class="input-group date">
              <input id="filter_date" type="text" class="form-control" data-date-format="YYYY-MM-DD" placeholder="YYYY-MM-DD" disabled>
              <div class="input-group-append">
                  <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
              </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <div class="text-center">
        <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('/master.btn_display') }}</button>
      </div>

  </form>
  <div class="clearfix"></div>
</div>
<!-- end search -->

<!-- datat table -->
<div class="table-responsive">
  <table id="tbl-error-data" class="display error-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('/master.col_order') }}</th>
        <th>{{ trans('/backoffice/data_management/error_data.col_event_code') }}</th>
        <!-- <th>{{ trans('/backoffice/data_management/error_data.col_date_time') }}</th> -->
        <th>{{ trans('/backoffice/data_management/error_data.col_agency') }}</th>
        <th>{{ trans('/backoffice/data_management/error_data.col_script_name') }}</th>
        <th>{{ trans('/backoffice/data_management/error_data.col_csv_file') }}</th>
      </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end data table -->

<style>
  #filter_date{
    width:100% ; 
    height:100%;
  }
</style>

@stop
