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
    'text' => trans('backoffice/data_management/monitor_data.page_name')
  ),
));
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_management/monitor_data.page_name'));
?>

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect', 'bootstrap-datepicker','bootstrap-datetimepicker','JsonHelper','select2') !!}
{!! $view->resource('js','js/backoffice/data_management/monitor_data.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_management/monitor_data.css') !!}

@stop
@section('content')

<!-- search -->
<div class="data-filters">
  <form class="form-inline" id="form_import">
    <input id="date_range" hidden/>
    <!-- input_datestart -->
    <div class="form-group col-sm-6 justify-content-center" id="space-bottom" >
      <label for="filter_startdate" class="control-label col-sm-4 justify-content-end"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_from") }}:</label>
      <div class="col-sm-8">
        <div class="input-group date">
          <input id="filter_startdate"type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm">
          <div class="input-group-append">
              <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group col-sm-6 justify-content-center" id="space-bottom">
      <label for="filter_enddate" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_to") }}:</label>
      <div class="col-sm-8">
        <div class="input-group date">
          <input id="filter_enddate" type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm">
          <div class="input-group-append">
              <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 form-group justify-content-center" id="space-bottom">
      <label for="filter_agency" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.agency') }}:</label>
      <div class="col-sm-8">
        <select name="agency" id="filter_agency" class="form-control" data-key="agency" multiple="multiple">

        </select>
      </div>
    </div>

    <div class="col-sm-6 form-group justify-content-center" id="space-bottom">
      <label for="filter_eventype" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.event_type') }}:</label>
      <div class="col-sm-8">
        <select name="event_type" id="filter_eventype" class="form-control" data-key="event_type" style="width:100%">

        </select>
      </div>
    </div>

    <div class="col-sm-6 form-group justify-content-center" id="space-bottom">
      <label for="filter_event_sub_type" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.subevent_type') }}:</label>
      <div class="col-sm-8">
        <select name="sub_type" id="filter_event_sub_type" class="form-control test" data-key="sub_type" style="width:100%">

        </select>
      </div>
    </div>

    <div class="col-sm-4 col-sm-offset-2 note justify-content-center" id="space-bottom">
      <label class="checkbox-inline justify-content-end">
        <input id="no-edited" type="checkbox" checked>{{ trans('/backoffice/data_management/monitor_data.display_only_no_edit') }}</input>
      </label>
    </div>
    <div class="col-sm-12">
      <p>
        <u style="float: left;">{{ trans('/master.remark') }}</u> {{trans('master.msg_event')}}
      </p>
    </div>
    <div class="col-sm-12 text-center">
      <button type="button" class="btn btn-primary" id="btn_display">{{ trans('/master.btn_display') }}</button>
    </div>

  </form>
  <div class="clearfix"></div>
</div>
<!-- end search -->

<!-- Table monitoer data -->
<div class="table-responsive">
  <table id="tbl-monitor-data" class="display monitor-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('/master.col_order') }}</th>
        <th>{{ trans('/master.col_datetime') }}</th>
        <th>{{ trans('/backoffice/data_management/monitor_data.col_agency') }}</th>
        <th>{{ trans('/backoffice/data_management/monitor_data.col_event_type') }}</th>
        <th>{{ trans('/backoffice/data_management/monitor_data.col_event_subtype') }}</th>
        <th>{{ trans('/backoffice/data_management/monitor_data.col_metadata') }}</th>
        <th>{{ trans('/backoffice/data_management/monitor_data.col_msg_event') }}</th>
        <th>{{ trans('/backoffice/data_management/monitor_data.col_notification_status') }}</th>
        <th>{{ trans('/backoffice/data_management/monitor_data.col_date_edited') }}</th>
        <th>{{ trans('/backoffice/data_management/monitor_data.col_csv_file') }}</th>

      </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- End Table monitoer data -->


<script type="text/javascript">
var TRANS = {
  msg_display_all: '{{ trans("master.msg_display_all") }}',
};
</script>

<style>
  #space-top{
    margin-top:15px
  }
  #space-bottom{
    margin-bottom:15px
  }
</style>


@stop
