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
        'text' => trans('backoffice/data_service/data_service.main_menu_name')
    ),
    array(
        'href' => $l->httpUrl("backoffice/data_service/data_service_approve"),
        'text' => trans('backoffice/data_service/data_service_approve.page_name')
    ),
    )
);
$view->option('js-init','srvDSA.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_service/data_service_approve.page_name'));
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-datepicker') !!}
{!! $view->resource('js','js/backoffice/data_service/data_service.js') !!}
{!! $view->resource('js','js/backoffice/data_service/data_service_approve.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_service/data_service_approve.css') !!}

@stop

@section('content')

<div class="bootbox modal fade" id="modal-info" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <table id="table-info" class="table table-hover display" style="width:100%">
                    <thead>
                        <tr>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="bootbox modal fade" id="modal-upload" tabindex="-1" role="document" >
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-upload">
                    <input type="hidden" name="order_header_id" id="form-upload-head">
                    <input type="hidden" name="agency_id" id="form-upload-agency">
                    <input type="hidden" name="data" id="form-upload-data">
                    <div class="form-group">
                        <label for="input-file" class="control-label col-sm-3">File : </label>
                        <div class="col-sm-5"><input type="file" name="file" id="input-file" class="form-control" accept="application/pdf"></div>
                        <div class="col-sm-4"><button type="button" id="btn-upload" class="btn btn-primary">Upload</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="data-filters">
    <form class="form-inline" id="form-filter">
        <div class="form-group col-sm-6">
            <label for="filter-agency" class="col-sm-4 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_approve.agency') }} :</label>
            <div class="col-sm-6">
                <select class="form-control" id="filter-agency" style="width:100%">
                    <option value="0">{{ trans('backoffice/data_service/data_service_approve.show_all') }}</option>
                </select>
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label for="filter-letter" class="col-sm-4 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_approve.letterno') }} :</label>
            <div class="col-sm-6">
                <select class="form-control" id="filter-letter"  style="width:100%">
                    <option value="">{{ trans('backoffice/data_service/data_service_approve.show_all') }}</option>
                </select>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="form-group col-sm-12 justify-content-center">
            <button id="btn-display" type="button" class="btn btn-primary">{{ trans('master.btn_display') }}</button>
        </div>
    </form>
    <div class="clearfix"></div>
</div>
<div id="" class="table-responsive">
    <span class="text-danger">* {{ trans('backoffice/data_service/data_service_approve.save_remark') }}</span>
    <table id="table" class="dsa-table table table-hover display" width="100%">
        <thead>
            <tr>
                <th>{{ trans('backoffice/data_service/data_service_approve.order_header_id') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_approve.letterno') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_approve.department') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_approve.ministry') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_approve.agency')}}</th>
                <th>{{ trans('backoffice/data_service/data_service_approve.dataservice_name')}}</th>
                <th>{{ trans('backoffice/data_service/data_service_approve.duration')}}</th>
                <th></th>
            </tr>
        </thead>
        <tfoot></tfoot>
        <tbody></tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    <button id="btn-save" class="btn btn-primary" style="margin:5px">{{ trans('master.btn_save') }}</button>
    <a href="" class="btn btn-default" style="margin:5px" >{{ trans('master.btn_cancel') }}</a>
</div>


<script>
var group_Translator = {
    LANGUAGE: "{{ $l->getLocale() }}",

    show_all: "{{ trans('backoffice/data_service/data_service_approve.show_all') }}",

    upload_succes: "{{ trans('backoffice/data_service/data_service_approve.upload_succes') }}",
    plases_select_file: "{{ trans('backoffice/data_service/data_service_approve.plases_select_file') }}",
    only_pdf: "{{ trans('backoffice/data_service/data_service_approve.only_pdf') }}",

    from_date: "{{ trans('backoffice/data_service/data_service_approve.from_date') }}",
    to_date: "{{ trans('backoffice/data_service/data_service_approve.to_date') }}",
    approve: "{{ trans('backoffice/data_service/data_service_approve.approve') }}",
    not_approve: "{{ trans('backoffice/data_service/data_service_approve.not_approve') }}",

    valid_msg: "{{ trans('backoffice/data_service/data_service_approve.valid_msg') }}",
    msg_save_suc: "{{ trans('master.msg_save_suc') }}",
}
</script>


@stop
