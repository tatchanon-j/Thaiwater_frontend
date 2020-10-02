<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();
$url_check_latest_data = $l->httpUrl("backoffice/data_management/check_latest_data");

$view->option('breadcrumb',
  array(
    array(
      'href' => $l->httpUrl("/backoffice/data_management/check_metadata"),
      'text' => trans('/backoffice/data_management/check_data_error.header_menu')
    ),
    array(
      'text' => trans('/backoffice/data_management/check_data_error.page_name')
    )
  ));
$view->option('js-init','srvData.init(group_Translator)');
$view->option('page_name', trans('/backoffice/data_management/check_data_error.page_name'));
?>

@section('extra_head')

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper','multiselect','bootstrap-datepicker') !!}

{!! $view->resource('js','js/backoffice/data_management/check_data_error.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_management/check_data_error.css') !!}

@extends('backoffice/layout/master')

@stop

@section('content')

<!-- search  -->
<div class="data-filters">
  <form class="form-inline justify-content-center" id="form_filter">

    <div class="form-group col-sm-6" >
      <label for="filter_datatype" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/backoffice/data_management/check_data_error.label_data_type')}}:</label>
      <div class="col-sm-8">
        <select name="filter_datatype" id="filter_datatype" class="form-control" style="width:100%">
          <option value="">{{ trans('/master.msg_filter_required') }}</option>
        </select>
      </div>
    </div>

    <div class="form-group col-sm-6" >
      <label for="filter_agency" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/backoffice/data_management/check_data_error.label_agency')}}:</label>
      <div class="col-sm-8">
        <select name="filter_agency" id="filter_agency" class="form-control" multiple="multiple" disabled>

        </select>
      </div>
    </div>

    <div class="form-group col-sm-6" id="group_startdate">
      <label for="filter_startdate" class="control-label col-sm-4 justify-content-end"><span class="color-red">*</span>{{ trans("/master.start_date") }}:</label>
      <div class="col-sm-8">
        <div class="input-group date">
          <input id="filter_startdate" type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
          <div class="input-group-append">
              <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group col-sm-6" id="group_enddate">
      <label for="filter_enddate" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans("/master.end_date") }}:</label>
      <div class="col-sm-8">
        <div class="input-group date">
          <input id="filter_enddate" type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
          <div class="input-group-append">
              <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>

    <!-- Button Previews -->
    <div class="text-center">
      <button type="button" class="btn btn-primary" id="btn_display">{{ trans('/master.btn_display') }}</button>
    </div>
  </form>
</div>
<!-- end search  -->

<!-- loading  -->
<div id="div_loading" style="display:none">
	<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
</div>
<!-- end loading  -->

<!-- data table -->
<div id="div_preview">
  <div class="table-responsive">
    <table id="tbl-checkdata-error" class="display admin-datatables" width="100%">
      <thead>
        <tr>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>
</div>
<!-- end data table -->

<script type="text/javascript">
  var _URL_ = '{{ $url_check_latest_data }}';
</script>

@stop
