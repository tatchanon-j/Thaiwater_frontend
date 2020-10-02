@section('extra_head')
@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('main-menu-mode', 'admin');
$view->option(
	'breadcrumb',
	array(
		array(
			'href' => $l->httpUrl("backoffice/admin/group"),
			'text' => trans('backoffice/admin/admin.page_name')
		),
		array(
			'text' => trans('backoffice/admin/group.page_name')
		)
	)
);
$view->option('js-init', 'srvGroup.init("' . $getLocal . '",group_Translator)');
$view->option('page_name', trans('backoffice/admin/group.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/admin/admin.css') !!}
@stop @section('content')

<!-- search -->
<div class="data-filters">
	<div class="form-group">
		<label for="group-filters-status">{{
			trans('backoffice/admin/group.filter_status') }}</label>
			<select id="group-filters-status" multiple="multiple" class="form-control">
			<option value="1">{{ trans('backoffice/admin/group.active') }}</option>
			<option value="2">{{ trans('backoffice/admin/group.inactive') }}</option>
			<option value="3">{{ trans('backoffice/admin/group.deleted') }}</option>
		</select>
	</div>
</div>
<!-- end search -->

<!-- data table -->
<div class="table-responsive">
	<table id="tbl-group" class="display admin-datatables" width="100%">
		<thead>
			<tr>
				<th>{{ trans('backoffice/admin/group.col_ordinal') }}</th>
				<th>{{ trans('backoffice/admin/group.col_name') }}</th>
				<th>{{ trans('backoffice/admin/group.col_desc') }}</th>
				<th>{{ trans('backoffice/admin/group.col_color') }}</th>
				<th>{{ trans('backoffice/admin/group.col_active') }}</th>
				<th></th>
			</tr>
		</thead>
		<tfoot>
		</tfoot>
		<tbody>
		</tbody>
	</table>
</div>
<!-- end data table -->

<!-- modal to add or edit data -->
<div class="modal fade" id="dlgEditGroup" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="dlgEditGroup-title"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form role="form" id="dlgEditGroup-form" class="form-horizontal">
					<div class="form-inline">
						<input type="hidden" id="dlgEditGroup-category" name="category" />

						<div class="form-group col-md-12">
							<label class="col-sm-2 control-label" for="dlgEditGroup-name"><span class="color-red">*</span>{{ trans('backoffice/admin/group.fld_name') }}:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" style="width:100%" id="dlgEditGroup-name" name="name" required data-parsley-required-message="{{ trans('backoffice/admin/group.err_no_name') }}">
							</div>
						</div>

						<div class="form-group col-md-12">
							<label class="col-sm-2 control-label" for="dlgEditGroup-permission_realm_id"><span class="color-red">*</span>{{ trans('backoffice/admin/group.fld_realm') }}:</label>
							<div class="col-sm-10">
								<select id="dlgEditGroup-permission_realm_id" style="width:100%" class="form-control" name="permission_realm_id" name="name" required data-parsley-required-message="{{ trans('backoffice/admin/group.err_no_realm') }}">

								</select>
							</div>
						</div>

						<div class="form-group col-md-12">
							<label class="col-sm-2 control-label" for="dlgEditGroup-description"><span class="color-red">*</span>{{
							trans('backoffice/admin/group.fld_desc') }}:</label>
							<div class="col-sm-10">
								<input type="text" style="width:100%" class="form-control" id="dlgEditGroup-description" name="description" required data-parsley-required-message="{{ trans('backoffice/admin/group.err_no_description') }}">
							</div>
						</div>

						<div class="form-group col-md-12">
							<label class="col-sm-2 control-label" for="dlgEditGroup-subgroups"><span class="color-red">*</span>{{ trans('backoffice/admin/group.fld_menu') }}:</label>
							<div class="col-sm-10">
								<select name="subgroups" style="width:100%" id="dlgEditGroup-subgroups" class="form-control" data-key="subgroups" multiple="multiple" name="name" required data-parsley-required-message="{{ trans('backoffice/admin/group.err_no_menu') }}">
								</select>
							</div>
						</div>
						<!-- <div class="form-inline"> -->
							<div class="form-group col-md-12">
								<label class="col-sm-2 control-label" for="dlgEditGroup-active-div">{{
							trans('backoffice/admin/group.fld_status') }}:</label>
								<div class="col-sm-10">
								<div class="form-inline">
									<!-- <div id="dlgEditGroup-active-div"> -->
										<div class="col-md-3">
											<div class="radio">
												<input type="radio" name="is_active" id="dlgEditGroup-is_active-active" value="1">  
												 {{trans('backoffice/admin/group.active') }}
												<!-- </label> -->
											</div>
										</div>
										<div class="col-md-3">
											<div class="radio">
												<input type="radio" name="is_active" id="dlgEditGroup-is_active-inactive" value="0">
												 {{trans('backoffice/admin/group.inactive') }}
												<!-- </label> -->
											</div>

										</div>
									<!-- </div> -->
									</div>
								</div>
							</div>
						<!-- </div> -->
						<div class="form-group color col-md-12">
							<label for="dlgEditGroup-ui_color" class="control-label col-sm-2">{{ trans('/master.tag_color') }}:</label>
							<div class="col-sm-6">
								<input id="dlgEditGroup-ui_color" name="ui_color" class="jscolor {refine:false}" />
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">{{
					trans("/master.btn_cancel") }}</button>
				<button type="button" class="btn btn-primary" id="dlgEditGroup-save-btn">{{ trans("/master.btn_save") }}</button>
				
			</div>
		</div>
	</div>
</div>
<!-- end modal to add or edit data -->

<!-- modal to display users in group -->
<div class="modal fade" id="dlgViewUsers" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<h4 class="modal-title">
					{{ trans("backoffice/admin/group.view_users") }} &quot;<span id="dlgViewUsers-groupname"></span>&quot;
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			

			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table id="dlgViewUsers-tbl" class="display admin-datatables" width="100%">
						<thead>
							<tr>
								<th>{{ trans('backoffice/admin/user.col_ordinal') }}</th>
								<th>{{ trans('backoffice/admin/user.col_email') }}</th>
								<th>{{ trans('backoffice/admin/user.col_desc') }}</th>
								<th>{{ trans('backoffice/admin/user.col_active') }}</th>
							</tr>
						</thead>
						<tfoot>
						</tfoot>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{
					trans("/master.btn_close") }}</button>
			</div>
		</div>
	</div>
</div>
<style>
	label.col-sm-2 {
		justify-content: flex-end;
		text-align: right;
	}
	label.col-sm-10 {
		justify-content: flex-end;
		text-align: right;
	}

	label.col-md-3 {
		justify-content: flex-end;
		text-align: right;

	}

	.form-group.col-md-12 {
		margin-bottom: 10px;
	}
</style>
<!-- modal to display users in group -->
<script>
	var group_Translator = {
		'active': '{{ trans("backoffice/admin/group.active") }}',
		'inactive': '{{ trans("backoffice/admin/group.inactive") }}',
		'deleted': '{{ trans("backoffice/admin/group.deleted") }}',
		'add_group': '{{ trans("backoffice/admin/group.add_group") }}',
		'edit_group': '{{ trans("backoffice/admin/group.edit_group") }}',
		'view_users': '{{ trans("backoffice/admin/group.view_users") }}',
		'delete_group': '{{ trans("backoffice/admin/group.delete_group") }}',
		'undelete_group': '{{ trans("backoffice/admin/group.undelete_group") }}',
		'delete_prompt': '{{ trans("backoffice/admin/group.delete_prompt") }}',
		'undelete_prompt': '{{ trans("backoffice/admin/group.undelete_prompt") }}',
		'err_422': '{{ trans("backoffice/admin/group.err_422") }}',
		'group_users': '{{ trans("backoffice/admin/group.group")}}',

		'filter_status_all': '{{ trans("backoffice/admin/group.filter_status_all") }}',
		'filter_status_all_selected': '{{ trans("backoffice/admin/group.filter_status_all_selected") }}',
		'filter_status_none_selected': '{{ trans("backoffice/admin/group.filter_status_none_selected") }}',
		'select_all': '{{ trans("backoffice/admin/group.select_all") }}',
		'all_selected': '{{ trans("backoffice/admin/group.all_selected") }}',
		'none_selected': '{{ trans("backoffice/admin/group.none_selected") }}',

		'success_add': '{{ trans("backoffice/admin/group.success_add") }}',
		'success_edit': '{{ trans("backoffice/admin/group.success_edit") }}',
		'success_delete': '{{ trans("backoffice/admin/group.success_delete") }}',
		'success_undelete': '{{ trans("backoffice/admin/group.success_undelete") }}',

		'msg_save_suc': '{{ trans("backoffice/admin/group.msg_save_suc") }}',
		'msg_delete_suc': '{{ trans("backoffice/admin/group.msg_delete_suc") }}',
		'btn_confirm': '{{ trans("backoffice/admin/group.btn_confirm") }}',
		'btn_cancel': '{{ trans("backoffice/admin/group.btn_cancel") }}',
		'btn_close': '{{ trans("backoffice/admin/group.btn_close") }}',
	}
</script>
@stop
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect') !!}
{!! $view->resource('js','js/backoffice/admin/group.js') !!}
{!! $view->resource('js','../vendor/jscolor/jscolor.js') !!}