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
    'text' => trans('backoffice/data_management/record_error_data.page_name')
  ),
));
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_management/record_error_data.page_name'));
?>

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper','bootstrap-datepicker','bootstrap-datetimepicker') !!}
{!! $view->resource('js','js/backoffice/data_management/record_error_data.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_management/record_error_data.css') !!}


@stop

@section('content')
<!-- search -->
<div class="data-filters">
  <form class="form-inline ">
        <div class="form-group col-sm-6" >
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

        <div class="form-group col-sm-6" id="space-bottom">
          <label for="filter_enddate" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_to") }}:</label>
          <div class="col-sm-8">
            <div class="input-group date">
              <input id="filter_enddate"type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm"
              placeholder="YYYY-MM-DD HH:mm">
              <div class="input-group-append">
                  <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 form-group" >
          <label for="filter_agency" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/master.agency') }}:</label>
          <div class="col-sm-8">
            <select name="agency" id="filter_agency" class="form-control" data-key="agency" multiple="multiple">

            </select>
          </div>
        </div>
        <br>
        <br>

        <div class="col-sm-12 text-wrap">
            <u style="float: left;">{{ trans('/master.remark')}}</u>
            <ol style="float: left; width: 100%;">
              <li> {{ trans('/backoffice/data_management/record_error_data.display_only') }} </li>
              <li style="overflow-wrap: break-word;"> {{trans('/master.msg_event')}} </li>
            </ol>
        </div>
    <div class="col-sm-12 text-center">
      <button type="button" class="btn btn-primary" id="btn-disPlay">{{ trans('/master.btn_display') }}</button>
    </div>
  </form>
  <div class="clearfix"></div>
</div>
<!-- end search -->

<!-- data table -->
<div class="table-responsive">
  <table id="tbl-record-err-data" class="display record-error-datatables" width="100%">
    <thead>
      <tr>
        <th> <input class="control-label" type="checkbox" name="select_all" id="select_all"> {{ trans('/master.selected_all') }}</th>
        <th>{{ trans('/master.col_datetime') }}</th>
        <th>{{ trans('/backoffice/data_management/record_error_data.col_script_name') }}</th>
        <th>{{ trans('/backoffice/data_management/record_error_data.col_agency') }}</th>
        <!-- <th>{{ trans('/backoffice/data_management/record_error_data.col_event_code') }}</th> -->
        <th>{{ trans('/backoffice/data_management/record_error_data.col_msg_event') }}</th>
      </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end data table -->

<!-- Modal -->
<div class="modal fade" id="dlgRecordError" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('/backoffice/data_management/record_error_data.record_send_mistake') }}</h4>
      </div>
      <div class="modal-body">
        <form id="dlgRecordError-form" role="form" class="form-horizontal">

          <div class="form-group col-sm-12">
            <label for="dlgRecordError" class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('/backoffice/data_management/record_error_data.send_date_mistake') }}:</label>
            <div class="col-sm-8">
              <div class="input-group date">
                <input id="dlg-date"type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD"
                data-parsley-required>
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </div>
              </div>
            </div>
          </div>

        </form>

        <div class="clearfix"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('/master.btn_cancel') }}</button>
        <button type="button" id="btn_save" class="btn btn-primary">{{ trans('/master.btn_save') }}</button>
      </div>
    </div>

  </div>
</div>
<!--end Modal  -->

<style>
  #space-top{
    margin-top:15px
  }
  #space-bottom{
    margin-bottom:15px
  }
</style>

@stop
