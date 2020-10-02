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
          'text' => trans('backoffice/metadata/category.page_name')
      )
    ));

  $view->option('js-init','srvData.init(group_Translator)');
  $view->option('page_name', trans('backoffice/metadata/category.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/metadata/category.css') !!}

@stop

@section('content')


<!-- data table -->
<div class="table-responsive">
	<table id="tbl-category" class="display admin-datatables" width="100%">
		<thead>
			<tr>
				<th>{{trans('/master.col_order')}}</th>
				<th>{{trans('backoffice/metadata/category.col_category_th')}}</th>
        <th>{{trans('backoffice/metadata/category.col_category_en')}}</th>
        <th>{{trans('backoffice/metadata/category.col_category_jp')}}</th>
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

<script> 
var TRANS = {
    all_agency: "{{ trans('backoffice/data_service/data_service_summary_print.all_agency') }}",
    source_result_AP: "{{ trans('backoffice/data_service/data_service_summary.source_result_AP') }}",
    source_result_DA: "{{ trans('backoffice/data_service/data_service_summary.source_result_DA') }}",
};
</script>
@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}

{!! $view->resource('js','js/backoffice/metadata/category.js') !!}
