@section('extra_head')

@extends('backoffice/layout/master')

<?php
  $view = \App\Helpers\ViewHelper::getInstance();
  $locale = \App\Helpers\LocaleHelper::getInstance();
  $lang = $locale->getAllLocales();
  $getLocal = $locale->getLocale();

  $view->option('breadcrumb',
    array(
      array(
          'href' => $locale->httpUrl("backoffice/metadata/metadata"),
          'text' => trans('backoffice/metadata/metadata.main-menu-mode')
      ),
      array(
          'text' => trans('backoffice/metadata/category.page_name_config')
      )
    ));

  $view->option('js-init','config_variable.init(group_Translator)');
  $view->option('page_name', trans('backoffice/metadata/category.page_name_config'));
?>

{!! $view->resource('theme-css','css/backoffice/data_integration/cron_setting.css') !!}

@stop

@section('content')


<!-- data table -->
<div class="table-responsive">
	<table id="tbl_variable" class="display admin-datatables" width="100%">
		<thead>
			<tr>
				<th>{{trans('/master.col_order')}}</th>
				<th>{{ trans('backoffice/data_integration/config_variable.category') }}:</th>
        <th>{{ trans('backoffice/data_integration/config_variable.category') }}</th>
        <th>{{trans('backoffice/data_integration/config_variable.config_name')}}</th>
        <th>{{trans('backoffice/data_integration/config_variable.variable_name')}}</th>
        <th>{{trans('backoffice/data_integration/config_variable.value')}}</th>
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

<!-- Modal add and edit category -->
<div class="modal fade" id="dlgEditCactegory" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="dlgEditCactegory-title"></h4>
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				
			</div>
			<div class="modal-body">
        <!-- Form input category -->
				<form role="form" id="dlgEditCactegory-form" class="form-row">
          <input type = "hidden" id = "dlgEditCactegory-id"/>

				</form>
        <!-- End Form input category -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary"	id="btn-save">{{trans('/master.btn_save')}}</button>
      </div>
		</div>
	</div>
</div>

<div class="modal fade" id="dlgEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="dlgEditSubCategory-title"></h4>
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">

                <!-- Form input subcategory -->
                <form role="form" id="dlgEdit-form" class="form-row">
                    <input type="hidden" id="id" name="id" />
                    <div class="form-group row col-sm-12">
                        <label class="col-form-label text-sm-right col-sm-3"for="dlgEditSubCategory-name">
                            <span class="color-red">*</span>
                            {{ trans('backoffice/data_integration/config_variable.category') }}:
                        </label>
                        <div class="col-sm-9">
                            <select id="category" class="form-control" name="filter_category" data-key="category">

                            </select>
                        </div>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label class="col-form-label text-sm-right col-sm-3"for="dlgEditSubCategory-name">
                            <span class="color-red">*</span>
                            {{trans('backoffice/data_integration/config_variable.config_name')}}:
                                                  </label>
                        <div class="col-sm-9">
                        <input id="name" name="id" />
                        </div>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label class="col-form-label text-sm-right col-sm-3"for="dlgEditSubCategory-name">
                            <span class="color-red">*</span>
                            {{trans('backoffice/data_integration/config_variable.variable_name')}}:
                        </label>
                        <div class="col-sm-9">
                        <input id="variable_name" name="variable_name" />
                        </div>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label class="col-form-label text-sm-right col-sm-3"for="dlgEditSubCategory-name">
                            <span class="color-red">*</span>
                            {{trans('backoffice/data_integration/config_variable.value')}}:
                        </label>
                        <div class="col-sm-9">
                        <input id="value" name="id" />
                        </div>
                    </div>

                </form>
                <!-- End Form input subcategory -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
                <button type="button" class="btn btn-primary" id="dlgEdit-save-btn">{{trans('/master.btn_save')}}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="dlgEditCactegory" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="dlgEditCactegory-title"></h4>
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				
			</div>
			<div class="modal-body">
        <!-- Form input category -->
				<form role="form" id="dlgEditCactegory-form" class="form-row">
          <input type = "hidden" id = "dlgEditCactegory-id"/>

				</form>
        <!-- End Form input category -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary"	id="btn-save">{{trans('/master.btn_save')}}</button>
      </div>
		</div>
	</div>
</div>

<div class="modal fade" id="dlgAdd" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="dlgEditSubCategory-title"></h4>
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">

                <!-- Form input subcategory -->
                <form role="form" id="dlgAdd-form" class="form-row">
                    <input type="hidden" id="id" name="id" />
                    <div class="form-group row col-sm-12">
                        <label class="col-form-label text-sm-right col-sm-3"for="dlgEditSubCategory-name">
                            <span class="color-red">*</span>
                            {{ trans('backoffice/data_integration/config_variable.category') }}:
                        </label>
                        <div class="col-sm-9">
                            <select id="category_add" class="form-control" name="filter_category" data-key="category">

                            </select>
                        </div>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label class="col-form-label text-sm-right col-sm-3"for="dlgEditSubCategory-name">
                            <span class="color-red">*</span>
                            {{trans('backoffice/data_integration/config_variable.config_name')}}:
                                                  </label>
                        <div class="col-sm-9">
                        <input id="name_add" name="id" />
                        </div>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label class="col-form-label text-sm-right col-sm-3"for="dlgEditSubCategory-name">
                            <span class="color-red">*</span>
                            {{trans('backoffice/data_integration/config_variable.variable_name')}}:
                        </label>
                        <div class="col-sm-9">
                        <input id="variable_name_add" name="variable_name" />
                        </div>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label class="col-form-label text-sm-right col-sm-3"for="dlgEditSubCategory-name">
                            <span class="color-red">*</span>
                            {{trans('backoffice/data_integration/config_variable.value')}}:
                        </label>
                        <div class="col-sm-9">
                        <input id="value_add" name="id" />
                        </div>
                    </div>

                </form>
                <!-- End Form input subcategory -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
                <button type="button" class="btn btn-primary" id="dlgAdd-save-btn">{{trans('/master.btn_save')}}</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var TRANS = {
        'add_title' : "{{ trans('backoffice/metadata/department.add_config')}}",
        'edit_title' : "{{ trans('backoffice/metadata/department.edit_department')}}",

        'label_name' : "{{ trans('backoffice/metadata/department.label_name')}}",
        'col_shortname' : "{{ trans('backoffice/metadata/department.col_shortname')}}",
    };
</script>
@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}

{!! $view->resource('js','js/backoffice/data_integration/config_variable.js') !!}
