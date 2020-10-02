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
			'text' => trans('backoffice/event_management/event_log_sink_method_type.page_name'),
		),
	));
$view->option('js-init', 'est.init(group_Translator)');
$view->option('page_name', trans('backoffice/event_management/event_log_sink_method_type.page_name'));
?>

  @section('extra_head')
  {!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
  {!! $view->resource('js','js/backoffice/event_management/event_log_sink_method_type.js') !!}

  <!-- tool editor on text area  -->
  <!-- {!! $view->resource('js','js/ckeditor/ckeditor.js') !!} -->

  {!! $view->resource('theme-css','css/backoffice/event_management/event_log_sink_method_type.css') !!}

  @extends('backoffice/layout/master')

  @stop

  @section('content')

  <!-- data table -->
  <div class="table-responsive">
    <table id="tbl-event_log_sink_method_type" class="display admin-datatables" width="100%">
      <thead>
        <tr>
          <th>{{trans('/master.col_id')}}</th>
          <th>{{ trans('/backoffice/event_management/event_log_sink_method_type.col_name') }}</th>
          <th>{{trans('/master.col_edit_del')}}</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>
  <!-- end data table -->

  <!-- modal add ad edit event log sink method type-->
  <div class="modal fade" id="dlg" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"
          aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="dlg-title"></h4>
        </div>
        <div class="modal-body">
          <form role="form" id="dlg-form" class="form-horizontal">
            <input type="hidden" id="dlg-id" name="id" tabindex="1"/>

            <div class="form-group">
              <label for="dlg-sink-name" class="control-label col-sm-2"><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_log_sink_method_type.label_event_log_sink_method_type') }}:</label>
              <div class="col-sm-10">
                <input id="dlg-name" class="form-control" data-parsley-required/>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{
            trans("/master.btn_cancel") }}</button>
            <button type="button" class="btn btn-primary"
            id="dlg-save-btn">{{ trans("/master.btn_save") }}</button>
          </div>
        </div>
      </div>
    </div>



    @stop
  <!-- end modal add ad edit event log sink method type  -->
