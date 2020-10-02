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
			'href' => $l->httpUrl("/backoffice/event_management/event_type"),
			'text' => trans('backoffice/event_management/event_type.main_menu_name'),
		),
		array(
			'text' => trans('backoffice/event_management/event_mgmt_email_sever.page_name'),
		),
	));
$view->option('js-init', 'emes.init(group_Translator)');
$view->option('page_name', trans('/backoffice/event_management/event_mgmt_email_sever.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/event_management/event_mgmt_email_sever.css') !!}


@stop

@section('content')
  <div class="data-filters">
    <a style="text-decoration: underline;" href="{!! $view->buildResourceSrc('pdf/event_log_sink_method_type.pdf') !!}" target="blank">คู่มือรูปแบบการส่งข้อความ</a>
  </div>

<!-- data table -->
<div class="table-responsive">
  <table id="tbl" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('/master.col_order') }}</th>
        <th>{{ trans('/backoffice/event_management/event_mgmt_email_sever.col_name') }}</th>
        <!-- <th>{{ trans('/backoffice/event_management/event_mgmt_email_sever.col_descrip') }}</th> -->
        <th>{{ trans('/master.col_edit') }}</th>
      </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end data table -->

<!-- modal add and edit data -->
<div class="modal fade" id="dlg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="dlg-title"></h4>
			</div>
			<div class="modal-body">
				<form role="form" id="dlg-form" class="form-horizontal">
					<input type="hidden" id="dlg-id" name="id" />
          <div class="form-group">
            <label for="dlg-desc"  class="control-label col-sm-2" ><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_mgmt_email_sever.label_name') }}:</label>
              <div class="col-sm-10">
              <input id="dlg-name"  type="text" class="form-control" name="name"
              required/>
            </div>
          </div>

          <div class="form-group">
            <label for="dlg-param"  class="control-label col-sm-2" ><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_mgmt_email_sever.label_param') }}:</label>
            <div class="col-sm-10 div-param">
                <textarea id="dlg-param" rows="10" type="text" class="form-control" name="description"
                required >{}</textarea>
            </div>
          </div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{	trans("/master.btn_cancel") }}</button>
				<button type="button" class="btn btn-primary"
					id="dlg-save-btn">{{ trans("/master.btn_save") }}</button>
			</div>
		</div>
	</div>
</div>
<!-- end modal add and edit data -->

@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}

{!! $view->resource('js','js/backoffice/event_management/event_mgmt_email_sever.js') !!}
