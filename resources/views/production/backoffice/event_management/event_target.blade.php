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
            'text' => trans('/backoffice/event_management/event_type.main_menu_name')
        ),
        array(
            'text' => trans('/backoffice/event_management/event_target.page_name')
        )
    ));
$view->option('js-init','srvData.init(group_Translator)');
$view->option('page_name', trans('/backoffice/event_management/event_target.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/event_management/event_target.css') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper','select2') !!}
{!! $view->resource('js','js/backoffice/event_management/event_target.js') !!}


@stop

@section('content')

<!-- data table -->
<div class="table-responsive">
  <table id="tbl-eventtarget" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('/master.col_order') }}</th>
        <th>{{ trans('/backoffice/event_management/event_target.col_condition')}}</th>
        <th>{{ trans('/backoffice/event_management/event_target.col_method')}}</th>
        <th>{{ trans('/backoffice/event_management/event_target.col_group')}}</th>
        <th>{{ trans('/master.col_edit_del') }}</th>
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
<div class="modal fade" id="dlgEditEventtarget" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="dlgEditEventtarget-title"></h4>
			</div>

			<div class="modal-body">
				<form role="form" id="dlgEditEventtarget-form" class="form-horizontal">
					<input type="hidden" id="dlgEditEventtarget-id" name="id" />

					<div class="form-group ">
            <label for="dlgEditEventtarget-condition"  class="control-label col-sm-2" ><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_target.label_condition') }}:</label>
            <div class="col-sm-10">
              <select id="dlgEditEventtarget-condition" class="form-control" data-parsley-required
              data-parsley-error-message="{{ trans('/master.msg_err_data_null')}}">
                <option value="" class="default-opt">{{ trans('/master.msg_filter_required') }}</option>
          		</select>
            </div>
					</div>

          <div class="form-group ">
            <label for="dlgEditEventtarget-method"  class="control-label col-sm-2" ><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_target.label_protocal') }}:</label>
            <div class="col-sm-10">
              <select id="dlgEditEventtarget-method" class="form-control" data-parsley-required
              data-parsley-error-message="{{ trans('/master.msg_err_data_null')}}">
                <option value="" class="default-opt">{{ trans('/master.msg_filter_required') }}</option>
          		</select>
            </div>
					</div>

          <div class="form-group pergroup-multi" hidden>
            <label for="dlgEditEventtarget-pergroup"  class="control-label col-sm-2" ><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_target.label_group_user') }}:</label>
            <div class="col-sm-10">
              <select id="dlgEditEventtarget-pergroup" class="form-control" multiple="multiple">
                <!-- <option value="" class="default-opt">{{ trans('/master.msg_filter_required') }}</option> -->
          		</select>
            </div>
					</div>

          <div class="form-group pergroup-single" hidden>
            <label for="dlgEditEventtarget-pergroup-single"  class="control-label col-sm-2" ><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_target.label_group_user') }}:</label>
            <div class="col-sm-10">
              <select  class="form-control select-search" id="dlgEditEventtarget-pergroup-single">
                <option value="" class="default-opt">{{ trans('/master.msg_filter_required') }}</option>
          		</select>
            </div>
					</div>

          <!-- data-parsley-required
         data-parsley-error-message="{{ trans('/master.msg_err_data_null')}}"  -->

				</form>
		</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{
					trans("/master.btn_cancel") }}</button>
				<button type="button" class="btn btn-primary"
					id="dlgEditEventtarget-save-btn">
          {{ trans("/master.btn_save") }}</button>
			</div>

		</div>
	</div>
</div> <!-- End Add data Modal -->
<!-- end modal add and edit data -->

@stop
