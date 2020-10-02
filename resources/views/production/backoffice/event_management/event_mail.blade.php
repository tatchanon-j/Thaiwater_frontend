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
			'text' => trans('backoffice/event_management/event_mail.page_name'),
		),
	));
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/event_management/event_mail.page_name'));
?>

  @section('extra_head')
  {!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
  {!! $view->resource('js','js/backoffice/event_management/event_mail.js') !!}

  {!! $view->resource('js','js/ckeditor/ckeditor.js') !!}

  {!! $view->resource('theme-css','css/backoffice/event_management/event_mail.css') !!}

  @extends('backoffice/layout/master')

  @stop

  @section('content')
  <div class="data-filters">
    <a style="text-decoration: underline;" href="{!! $view->buildResourceSrc('pdf/event_mail.pdf') !!}" target="blank">คู่มือรูปแบบการแจ้งเตือนทางอีเมล</a>
  </div>

  <!-- data table -->
  <div class="table-responsive">
    <table id="tbl-eventmail" class="display admin-datatables" width="100%">
      <thead>
        <tr>
          <th>{{trans('/master.col_order')}}</th>
          <th>{{ trans('/backoffice/event_management/event_mail.col_name') }}</th>
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

  <!-- modal -->
  <div class="modal fade" id="dlgEventmail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"
          aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="dlgEventmail-title"></h4>
        </div>
        <div class="modal-body">
          <form role="form" id="dlgEventmail-form" class="form-horizontal">
            <input type="hidden" id="dlgEventmail-id" name="id"/>

            <div class="form-group">
              <label for="dlgEventmail-sink-name" class="control-label col-sm-2"><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_mail.input_name') }}:</label>
              <div class="col-sm-10">
                <input id="dlgEventmail-name" class="form-control" data-parsley-required/>
              </div>
            </div>

            <div class="form-group">
              <label for="dlgEventmail-subject"  class="control-label col-sm-2"><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_mail.input_subject') }}:</label>
              <div class="col-sm-10">
                <input id="dlgEventmail-subject"  type="text" class="form-control" name="subject" data-parsley-required/>
              </div>
            </div>

            <div class="form-group">
              <label for="dlgEventmail-body" class="control-label col-sm-2"><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_mail.input_body') }}:</label>
              <div id ="div-param-sink" class="col-sm-10">
                <textarea id="dlgEventmail-body" class="form-control" rows="10" cols="50" data-parsley-required></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{
            trans("/master.btn_cancel") }}</button>
            <button type="button" class="btn btn-primary"
            id="dlgEventmail-save-btn">{{ trans("/master.btn_save") }}</button>
          </div>
        </div>
      </div>
    </div>
    @stop
  <!-- end modal -->
