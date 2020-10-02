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
    'text' => trans('backoffice/data_management/record_data.page_name')
  ),
));
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_management/record_data.page_name'));
?>


{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','JsonHelper','bootstrap-datetimepicker','select2') !!}
{!! $view->resource('js','js/backoffice/data_management/record_data.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_management/record_data.css') !!}


@stop

@section('content')

<!-- search -->
<div class="data-filters">
  <form class="form-inline " id="form_import">
    <!-- input_datestart -->
    <div class="form-group col-sm-6 justify-content-center" style="margin-bottom:10px">
      <label for="filter_startdate" class="control-label col-sm-4 justify-content-end"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_from") }}:</label>
      <div class="col-sm-8">
        <div class="input-group date">
          <input id="filter_startdate"type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group col-sm-6">
      <label for="filter_enddate" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_to") }}:</label>
      <div class="col-sm-8">
        <div class="input-group date">
          <input id="filter_enddate"type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 form-group justify-content-center">
      <label for="filter_agency" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.agency') }}:</label>
      <div class="col-sm-8">
        <select name="agency" id="filter_agency" class="form-control" data-key="agency" multiple="multiple">

        </select>
      </div>
    </div>

    <div class="col-sm-6 form-group">
      <label for="filter_eventype" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.event_type') }}:</label>
      <div class="col-sm-8">
        <select name="event_type" id="filter_eventype" class="form-control" data-key="event_type">

        </select>
      </div>
    </div>

    <div class="col-sm-6 form-group justify-content-center">
      <label for="filter_event_sub_type" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.subevent_type') }}:</label>
      <div class="col-sm-8">
        <select name="sub_type" id="filter_event_sub_type" class="form-control" data-key="sub_type">

        </select>
      </div>
    </div>

 

      <!-- <div class="col-sm-12 note">
      <p><u>หมายเหตุ</u> ระบบแสดงเฉพาะเหตุการณืที่ยังไม่ได้รับการแก้ไข</p>
    </div> -->
    <div class="col-sm-12">
      <p>
        <u style="float: left;">{{ trans('/master.remark') }}</u>
        <ol style="float: left;">
          <li> {{ trans('/backoffice/data_management/record_data.display_only') }} </li>
          <li> {{trans('master.msg_event')}} </li>
        </ol>
      </p>
    </div>

    <div class="col-sm-12 text-center">
      <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('/master.btn_display') }}</button>
    </div>
  </form>
  <div class="clearfix"></div>
</div>
<!-- end search -->

<!-- data table -->
<div class="table-responsive">
  <table id="tbl-record-data" class="display record-datatables" width="100%">
    <thead>
      <tr>
        <th> <input class="control-label" type="checkbox" name="select_all" id="select_all"> {{ trans('/master.selected_all') }}</th>
        <th>{{ trans('/master.col_datetime') }}</th>
        <th>{{ trans('/backoffice/data_management/record_data.col_agency') }}</th>
        <th>{{ trans('/backoffice/data_management/record_data.col_eventtype') }}</th>
        <th>{{ trans('/backoffice/data_management/record_data.col_subeventtype') }}</th>
        <th>{{ trans('/backoffice/data_management/record_data.col_metadata') }}</th>
        <th>{{ trans('/backoffice/data_management/record_data.col_msg_event') }}</th>
      </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end data table -->

<!-- modal -->
<div id="dlgSaveEdit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4>{{ trans('/backoffice/data_management/record_data.record_edited') }}</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="dlgSaveEdit-form" role="form">
          <div class="form-group">
            <label class="control-label col-sm-2" for="dlgSaveEdit-edit-label"><sapn class="color-red">*</sapn>{{ trans('/backoffice/data_management/record_data.how_edit') }}:</label>
            <div class="col-sm-10">
              <textarea id="dlgSaveEdit-edit-procedure" rows="5" type="text" class="form-control"
              data-parsley-required></textarea>
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('/master.btn_cancel') }}</button>
        <button id="btn_save" type="button" class="btn btn-primary">{{ trans('/master.btn_save') }}</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal -->

<script type="text/javascript">
var TRANS = {
  msg_display_all: '{{ trans("master.msg_display_all") }}',
};
</script>
@stop
