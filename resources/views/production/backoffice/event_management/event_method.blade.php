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
            'text' => trans('backoffice/event_management/event_method.page_name')
        )
    ));
$view->option('js-init', 'evtm.init(group_Translator)');
$view->option('page_name', trans('/backoffice/event_management/event_method.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/event_management/event_method.css') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/event_management/event_method.js') !!}


@stop

@section('content')

<!-- search -->
<div class="data-filters">
  <form class="form-horizontal">
  	<div class="form-group col-sm-8">
  		<label for="" class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_method.filter_event_method') }}</label>
  		<div class="col-sm-8">
  			<select id="filter_event_method" class="form-control" multiple="multiple" data-key="filter_eventtype">

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
  <table id="tbl-event-method" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('/master.col_order') }}</th>
        <th>{{ trans('/backoffice/event_management/event_method.col_name') }}</th>
        <th>{{ trans('/backoffice/event_management/event_method.col_descrip') }}</th>
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

<!-- modal -->
<div class="modal fade" id="dlgEditEventmethod" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="dlgEditEventmethod-title"></h4>
			</div>
			<div class="modal-body">

				<form role="form" id="dlgEditEventmethod-form" class="form-horizontal">
					<input type="hidden" id="dlgEditEventmethod-id" name="id" />

          <div class="form-group group-subtype">
            <label for="dlgEditEventmethod-event-log" class="control-label col-sm-3">
              <span class="color-red">*</span>{{ trans('/backoffice/event_management/event_method.label_sink_method') }}:</label>
            <div class="col-sm-9">
              <select id="dlgEditEventmethod-event-log" class="form-control" name="event-log" required>
                <option class="defalut" value="">{{ trans('/master.msg_filter_required') }}</option>
              </select>
            </div>
          </div>

          <div class="form-group group-subtype">
            <label for="dlgEditEventmethod-mail-server" class="control-label col-sm-3">
              <span class="color-red">*</span>{{ trans('/backoffice/event_management/event_method.label_setting_name') }}:</label>
            <div class="col-sm-9">
              <select id="dlgEditEventmethod-mail-server" class="form-control" name="mail-server"
              required >
                <option class="defalut" value="">{{ trans('/master.msg_filter_required') }}</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="dlgEditEventmethod-desc"  class="control-label col-sm-3" >{{ trans('/backoffice/event_management/event_method.label_description') }}:</label>
              <div class="col-sm-9">
              <input id="dlgEditEventmethod-desc"  type="text" class="form-control" name="description"/>
            </div>
          </div>


				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{	trans("/master.btn_cancel") }}</button>
				<button type="button" class="btn btn-primary"
					id="dlgEditEventmethod-save-btn">{{ trans("/master.btn_save") }}</button>
			</div>
		</div>
	</div>
</div>
<!-- end modal -->

@stop
