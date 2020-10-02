@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);
$pdf_url = env('API_SERVER') . '/thaiwater30/backoffice/data_service/upload_result?_csrf=' . urlencode($csrf) . '&path=';

// $view->option('main-menu-mode', 'admin');
$view->option('breadcrumb',
array(
    array(
        'text' => trans('backoffice/data_service/data_service.main_menu_name')
    ),
    array(
        'href' => $l->httpUrl("backoffice/data_service/data_service_upload_result"),
        'text' => trans('backoffice/data_service/data_service_upload_result.page_name')
    ),
    )
);
$view->option('js-init','srvDSUR.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_service/data_service_upload_result.page_name'));
?>
@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-datepicker') !!}
{!! $view->resource('js','js/backoffice/data_service/data_service.js') !!}
{!! $view->resource('js','js/backoffice/data_service/data_service_upload_result.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_service/data_service_upload_result.css') !!}
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

<div id="" class="table-responsive">
    <table id="table" class="ur-table table table-hover display" width="100%">
        <thead>
            <tr>
                <th>{{ trans('backoffice/data_service/data_service_upload_result.order_id') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_upload_result.letterno') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_upload_result.agency') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_upload_result.upload_doc')}}</th>
                <th>{{ trans('backoffice/data_service/data_service_upload_result.show_upload')}}</th>
            </tr>
        </thead>
        <tfoot></tfoot>
        <tbody></tbody>
    </table>
</div>

<script type="text/javascript">
PDF_URL = '{!! $pdf_url !!}';
var group_Translator = {
    LANGUAGE: "{{ $l->getLocale() }}",

    upload_succes: "{{ trans('backoffice/data_service/data_service_upload_result.upload_succes') }}",
    plases_select_file: "{{ trans('backoffice/data_service/data_service_upload_result.plases_select_file') }}",
    only_pdf: "{{ trans('backoffice/data_service/data_service_upload_result.only_pdf') }}",
}
</script>
@stop
