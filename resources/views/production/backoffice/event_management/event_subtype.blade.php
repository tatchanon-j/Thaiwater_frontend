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
            'text' => trans('backoffice/event_management/event_type.main_menu_name')
        ),
        array(
            'text' => trans('backoffice/event_management/event_type.page_name')
        )
    ));
$view->option('js-init', 'evts.init(group_Translator)');
$view->option('page_name', trans('backoffice/event_management/event_subtype.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/event_management/event_subtype.css') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/event_management/event_subtype.js') !!}
@stop

@section('content')

<!-- search -->
<div class="data-filters">
  <form class="form-horizontal">
  	<div class="form-group col-sm-8">
  		<label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/event_management/event_type.page_name') }}</label>
  		<div class="col-sm-8">
  			<select id="filter_evttype" class="form-control" multiple="multiple" data-key="filter_eventtype">

  			</select>
  		</div>
  	</div>
    <!-- Button Previews -->
    <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('/master.btn_display') }}</button>
  </form>


</div>
<div class="clearfix"></div>
<!-- end search -->

<!-- data table -->
<div class="table-responsive">
  <table id="tbl-event-subtype" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('/master.col_order') }}</th>
        <th>{{ trans('backoffice/event_management/event_type.col_event_type') }}</th>
        <th>{{ trans('backoffice/event_management/event_type.col_event_subtype') }}</th>
        <th>{{ trans('backoffice/event_management/event_type.col_group_event') }}</th>
        <th>{{ trans('backoffice/event_management/event_type.col_status') }}</th>
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

<!-- modal  -->
<div id="dlgEditEventsubtype" class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="dlgEditEventsubtype-title">{{ trans('backoffice/event_management/event_type.title_add_event_subtype') }}</h4>
			</div>

			<div class="modal-body">
				<form role="form" id="dlgEditEventsubtype-form" class="form-horizontal">
					<input type="hidden" id="dlgEditEventsubtype-id" name="id" />
          <input type="hidden" id="dlgEditEventsubtype-category" name="category" />

          <div class="form-group">
            <label for="dlgEditEventsubtype-code"  class="control-label col-sm-3" ><span class="color-red">*</span>{{ trans('backoffice/event_management/event_subtype.event_code') }}:</label>
              <div class="col-sm-3">
              <input id="dlgEditEventsubtype-code"  type="text" class="form-control" name="code"
              data-parsley-required/>
            </div>
          </div>

          <div class="form-group">
            <label for="dlgEditEventsubtype-eventtype"  class="control-label col-sm-3" ><span class="color-red">*</span>{{ trans('backoffice/event_management/event_type.page_name') }}:</label>
              <div class="col-sm-9">
              <select type="text" class="form-control" id="dlgEditEventsubtype-eventtype" name="name" required >
                <option value="" class="default">{{ trans('/master.msg_filter_required') }}</option>
              </select>
            </div>
          </div>

          <div class="form-group group-subtype">
            <label for="dlgEditEventsubtype-grpEventSubtype" class="control-label col-sm-3"><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_subtype.label_group_subevent_type')}}:</label>
            <div class="col-sm-9">
              <select id="dlgEditEventsubtype-grpEventSubtype" class="form-control" name="group-subtype" multiple="multiple"
              data-parsley-required>

              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="dlgEditEventsubtype-support" class="control-label col-sm-3">{{ trans('/backoffice/event_management/event_subtype.label_basic_fix')}}:</label>
            <div class="col-sm-9">
              <textarea id="dlgEditEventsubtype-support" class="form-control" rows="4" cols="50" ></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="dlgEditEventsubtype-Eventstatus" class="control-label col-sm-3">{{ trans('/backoffice/event_management/event_subtype.label_satatus') }}</label>
            <div class="col-sm-9">
              <label class="radio-inline">
                <input type="radio" name="eventStatus" value=true checked="">{{ trans('/backoffice/event_management/event_subtype.label_auto_close') }}</input>
              </label>
              <label class="radio-inline">
                <input type="radio" name="eventStatus" value=false>{{ trans('/backoffice/event_management/event_subtype.label_admin_close')}}</input>
              </label>
            </div>
          </div>

				</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{
					trans("/master.btn_cancel") }}</button>
				<button type="button" class="btn btn-primary"
					id="dlgEditEventsubtype-save-btn">{{ trans("/master.btn_save") }}</button>
			</div>
		</div>
	</div>
</div>
<!-- end modal  -->
@stop
