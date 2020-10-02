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
			'href' => $l->httpUrl("backoffice/data_integration/mgmt_metadata"),
			'text' => trans('backoffice/data_integration/mgmt_script.main_menu_name'),
		),
		array(
			'text' => trans('backoffice/data_integration/mgmt_metadata.page_name'),
		),
	)
);
$view->option('page_name', trans('backoffice/data_integration/mgmt_metadata.page_name'));
$view->option('js-init', 'mgmt.init(group_Translator)');
?>

{!! $view->resource('theme-css','css/backoffice/data_integration/mgmt_metadata.css') !!}

@stop

@section('content')
<h5 class="color-red">{{ trans('/master.remark') }} {{ trans('/master.remark_integration') }}</h5>

<!-- data table -->
<div class="table-responsive">
    <table id="metadata-tbl" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{trans('backoffice/data_integration/mgmt_metadata.metadata_id')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_metadata.metadata_name')}}</th>
                <th>Download Id</th>
                <th>{{trans('backoffice/data_integration/mgmt_metadata.download_name')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_metadata.dataset_name')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_metadata.agency_name')}}</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<!-- en ddata table -->

<!-- modal -->
<div class="bootbox modal fade" id="modal" role="document" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">{{trans('backoffice/data_integration/mgmt_metadata.page_name')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-row" id="form" role="form">
                    <!-- download_name , dataset_name -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="download_name" class="col-sm-4 col-form-label text-sm-right">
                                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_metadata.label_download_name')}}
                            </label>
                            <div class="col-sm-8">
                                <select id="download_name" class="form-control select-search" name="download_name" data-key="" required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="dataset_name" class="col-form-label col-sm-4 text-sm-right">
                                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_metadata.label_dataset_name')}}
                            </label>
                            <div class="col-sm-8">
                                <select id="dataset_name" class="form-control select-search" required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="padding-left:10px">
                        <div class="form-group row">
                            <label for="exampleInputEmail1" class="col-form-label col-sm-2 text-sm-right">{{trans('backoffice/data_integration/mgmt_metadata.label_additional_dataset')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control select-search" id="additional_dataset" multiple>
                                </select>
                            </div>
                        
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
               
                <button type="button" class="btn btn-danger" id="btn-cancel" data-dismiss="modal" >{{trans('master.btn_cancel')}}</button>
                <button type="button" class="btn btn-success" id="btn-save">{{trans('master.btn_save')}}</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
<script>
var msg_save_suc = '{{trans("master.msg_save_suc")}}';
var btn_add_conv = '{{trans("backoffice/data_integration/mgmt_metadata.btn_add_conv")}}';
</script>
@stop


{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2','bootstrap-duallist') !!}

{!! $view->resource('js','js/backoffice/data_integration/mgmt_metadata.js') !!}
{!! $view->resource('js','js/backoffice/data_integration/data_integration.js') !!}
