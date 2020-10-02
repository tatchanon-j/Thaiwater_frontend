<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
	array(
		array(
			'href' => $l->httpUrl("/backoffice/event_management/event_type"),
			'text' => trans('backoffice/event_management/event_type.main_menu_name'),
		),
		array(
			'text' => trans('backoffice/event_management/sink_condition.page_name'),
		),
	));
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/event_management/sink_condition.page_name'));
?>

  @section('extra_head')
  {!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
  {!! $view->resource('js','js/backoffice/event_management/sink_condition.js') !!}
  {!! $view->resource('theme-css','css/backoffice/event_management/sink_condition.css') !!}

  @extends('backoffice/layout/master')

  @stop

  @section('content')

  <!-- search -->
  <div class="table-responsive">
    <table id="tbl-sink-condition" class="display admin-datatables" width="100%">
      <thead>
        <tr>
          <th>{{trans('/master.col_order')}}</th>
          <th>{{ trans('/backoffice/event_management/sink_condition.col_name') }}</th>
          <th>{{ trans('/backoffice/event_management/sink_condition.col_event_type') }}</th>
          <th>{{ trans('/backoffice/event_management/sink_condition.col_event_subtype') }}</th>
          <th>{{ trans('/backoffice/event_management/sink_condition.col_template') }}</th>
          <th>{{trans('/master.col_edit_del')}}</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>
  <!-- end search -->

  <!-- modal add or edit -->
  <div class="modal fade" id="dlgSinkCondition" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"
          aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="dlgSinkCondition-title">{{ trans('/backoffice/event_management/sink_condition.title_add_sinkcondition') }}</h4>
        </div>
        <div class="modal-body">
          <form role="form" id="dlgSinkCondition-form" class="form-horizontal">
            <input type="hidden" id="dlgSinkCondition-id" name="id"/>

            <div class="form-group">
              <label for="dlgSinkCondition-eventType" class="control-label col-sm-2"><span class="color-red">*</span>{{ trans('/backoffice/event_management/sink_condition.input_event_type') }}:</label>
              <div class="col-sm-10">
                <select id="dlgSinkCondition-eventType" class="form-control"data-parsley-required
                data-parsley-error-message="{{ trans('/master.msg_err_data_null')}}">
                <option value="">{{ trans('/master.msg_filter_required') }}</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="dlgSinkCondition-subject"  class="control-label col-sm-2"><span class="color-red">*</span>{{ trans('/backoffice/event_management/sink_condition.input_event_subtype') }}:</label>
            <div class="col-sm-10">
              <select id="dlgSinkCondition-eventSubtype"  type="text" class="form-control" name="event_subtype"data-parsley-required
              data-parsley-error-message="{{ trans('/master.msg_err_data_null')}}" disabled>
              <option value="" class="default">{{ trans('/master.msg_filter_required') }}</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="dlgSinkCondition-sinkTemplate" class="control-label col-sm-2"><span class="color-red">*</span>{{ trans('/backoffice/event_management/sink_condition.input_template') }}:</label>
          <div id ="div-param-sink" class="col-sm-10">
            <select id="dlgSinkCondition-sinkTemplate" class="form-control" data-parsley-required
            data-parsley-error-message="{{ trans('/master.msg_err_data_null')}}">
            <option value="" class="default">{{ trans('/master.msg_filter_required') }}</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="dlgSinkCondition-name" class="control-label col-sm-2"><span class="color-red">*</span>{{ trans('/backoffice/event_management/sink_condition.input_sink_name') }}:</label>
        <div id ="div-param-sink" class="col-sm-10">
          <input id="dlgSinkCondition-name" class="form-control" rows="10" cols="50" data-parsley-required
          data-parsley-error-message="{{ trans('/master.msg_err_data_null')}}"></input>
        </div>
      </div>

      <div class="form-group">
        <label for="dlgSinkCondition-sinkCron" class="control-label col-sm-2">{{ trans('/backoffice/event_management/sink_condition.sinkCron') }}:</label>
        <div id ="div-param-sink" class="col-sm-10">
          <div class="col-sm-2"><input id="dlgSinkCondition-sinkCron1" class="form-control" type="text" /> </div>
          <div class="col-sm-2"><input id="dlgSinkCondition-sinkCron2" class="form-control" type="text" /> </div>
          <div class="col-sm-2"><input id="dlgSinkCondition-sinkCron3" class="form-control" type="text" /> </div>
          <div class="col-sm-2"><input id="dlgSinkCondition-sinkCron4" class="form-control" type="text" /> </div>
          <div class="col-sm-2"><input id="dlgSinkCondition-sinkCron5" class="form-control" type="text" /> </div>
        </div>
        <div class="col-sm-10">
          <div class="col-sm-2">
          </div>
          <div class="col-sm-8">
            <p class="text-muted" style="font-style: italic;">email ส่งเมื่อเกิด event หรือส่งตามเวลาที่ตั้ง crond ไว้</p>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">{{
      trans("/master.btn_cancel") }}</button>
      <button type="button" class="btn btn-primary"
      id="dlgSinkCondition-save-btn">{{ trans("/master.btn_save") }}</button>
    </div>
  </div>
</div>
</div>
<!-- end modal add or edit -->

@stop
