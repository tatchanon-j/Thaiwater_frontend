@section('extra_head')

@extends('backoffice/layout/master')

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

// $view->option('main-menu-mode', 'admin');
$view->option('breadcrumb',
    array(
      array(
          'href' => $l->httpUrl("backoffice/metadata/metadata"),
          'text' => trans('backoffice/metadata/metadata.main-menu-mode')
      ),
      array(
          'text' => trans('backoffice/metadata/service_method.page_name')
      )
    ));
$view->option('js-init',
    'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/metadata/service_method.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/metadata/service_method.css') !!}

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}

{!! $view->resource('js','js/backoffice/metadata/service_method.js') !!}

@stop

@section('content')

<div id="table_1" class="table-responsive">
	<table id="tbl-servicemethod" class="display admin-datatables" width="100%">
		<thead>
			<tr>
				<th>{{trans('/master.col_order')}}</th>
        <th>{{trans('backoffice/metadata/service_method.page_name')}}</th>
				<th>{{trans('/master.col_edit_del')}}</th>
			</tr>
		</thead>
		<tfoot>
		</tfoot>
		<tbody>
		</tbody>
	</table>
</div>


<!-- Modal Edit and Add group -->
<div class="modal fade" id="dlgEditServiceMethod" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="dlgEditServiceMethod-title" ></h4>
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form role="form" id="dlgEditServiceMethod-form" class="form-horizontal">
		  <div class="form-group form-row">
  			    <input type="hidden" id="dlgEditServiceMethod-id" name="id" />
            <input type="hidden" id="dlgEditServiceMethod-category" name="category" />

            <label  class="control-label col-sm-3 m-auto text-right" for="dlgEditServiceMethod-name"><span class="color-red">*</span> {{ trans('backoffice/metadata/service_method.page_name') }}:</label>
            <div class="col-sm-9">
              <input  type="text" class="form-control" id="dlgEditServiceMethod-th"
                name="name" data-key="th" data-parsley-required>
            </div>
          </div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
				<button type="button" class="btn btn-primary"
					id="dlgEditServiceMethod-save-btn">{{trans('/master.btn_save')}}</button>
			</div>
		</div>
	</div>
</div>

@stop
