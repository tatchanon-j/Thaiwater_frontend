@extends('backoffice/layout/master')

@section('extra_head')

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
          'text' => trans('backoffice/metadata/ministry.page_name')
      )
    ));
  $view->option('js-init','srvData.init(group_Translator)');
  $view->option('page_name', trans('backoffice/metadata/ministry.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/metadata/ministry.css') !!}

@stop

@section('content')

<!-- data table -->
<div class="table-responsive">
	<table id="tbl-ministry" class="display admin-datatables" width="100%">
		<thead>
			<tr>
				<th>{{ trans('/master.col_order') }}</th>
				<th>{{ trans('backoffice/metadata/ministry.col_ministry_th')}}</th>
        <th>{{ trans('backoffice/metadata/ministry.col_ministry_en')}}</th>
        <th>{{ trans('backoffice/metadata/ministry.col_ministry_jp')}}</th>
        <th>{{ trans('backoffice/metadata/ministry.col_shortname_th')}}</th>
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

<!-- Modal Edit and Add Ministry -->
<div class="modal fade" id="dlgEditMinistry" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
        <h4 class="modal-title" id="dlgEditMinistry-title"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
        <!-- Form input Ministry -->
				<form role="form" id="dlgEditMinistry-form" class="form-horizontal">
          <input type = "hidden" id = "dlgEditMinistry-id"/>
          <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-3" for="code"><span class="color-red">*</span>{{ trans('backoffice/metadata/ministry.code_ministry')}}:</label>
            <div class="col-sm-9">
              <input  id="code" class="form-control" type="text" name="code" data-key="code" style="width: 30%;"
              data-parsley-required/>
            </div>
          </div>

				</form>
        <!-- End Form input Ministry -->
        <div class="clearfix"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('/master.btn_cancel')}}</button>
				<button type="button" class="btn btn-primary"	id="btn-save">{{ trans('/master.btn_save')}}</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Edit and Add Ministry -->

@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect') !!}

{!! $view->resource('js','js/backoffice/metadata/ministry.js') !!}
