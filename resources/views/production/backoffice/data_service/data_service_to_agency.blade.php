@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();
$url = $l->httpUrl("backoffice/data_service/data_service_to_agency_print");

// $view->option('main-menu-mode', 'admin');
$view->option('breadcrumb',
array(
    array(
        'text' => trans('backoffice/data_service/data_service.main_menu_name')
    ),
    array(
        'href' => $l->httpUrl("backoffice/data_service/data_service_to_agency"),
        'text' => trans('backoffice/data_service/data_service_to_agency.page_name')
    ),
    )
);
$view->option('js-init','srvDSTA.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_service/data_service_to_agency.page_name'));
?>
@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-datepicker') !!}
{!! $view->resource('js','js/backoffice/data_service/data_service.js') !!}
{!! $view->resource('js','js/backoffice/data_service/data_service_to_agency.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_service/data_service_to_agency.css') !!}
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
                            <th>{{ trans("backoffice/data_service/data_service_to_agency.agency") }}</th>
                            <th>{{ trans("backoffice/data_service/data_service_to_agency.dataservice_name") }}</th>
                            <th>{{ trans("backoffice/data_service/data_service_to_agency.date_range") }}</th>
                            <th>{{ trans("backoffice/data_service/data_service_to_agency.province_name") }}</th>
                            <th>{{ trans("backoffice/data_service/data_service_to_agency.status") }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="bootbox modal fade" id="modal-print" tabindex="-1" role="document" >
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-print">
                </form>
                <button id="btn-print" class="btn btn-default">{{ trans('backoffice/data_service/data_service_to_agency.print') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="data-filters">
    <form class="form-inline" id="form-filter">
        <div class="form-group col-sm-12">
            <label for="form-date" class="col-sm-2 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_to_agency.filter_date') }} :</label>
            <div class="col-sm-3">
                <input id="form-date" name="date" type="text" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="width:100%">
            </div>
            <div class="col-sm-2">
                <button id="btn_display" type="button" class="btn btn-primary">{{ trans('master.btn_display') }}</button>
            </div>
        </div>
    </form>
    <div class="clearfix"></div>
</div>

<div id="" class="table-responsive">
    <table id="table" class="table dsta-table table-hover display" width="100%">
        <thead>
            <tr>
                <th>{{ trans('backoffice/data_service/data_service_to_agency.order_id') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_to_agency.order_datetime') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_to_agency.print')}}</th>
                <th></th>
            </tr>
        </thead>
        <tfoot></tfoot>
        <tbody></tbody>
    </table>
</div>
<script>
var group_Translator = {
    LANGUAGE: "{{ $l->getLocale() }}",

    agency: "{{ trans('backoffice/data_service/data_service_to_agency.agency') }}",
    order_print_date: "{{ trans('backoffice/data_service/data_service_to_agency.order_print_date') }}",
    required_order_print_date: "{{ trans('backoffice/data_service/data_service_to_agency.required_order_print_date') }}",
    order_print_letterno: "{{ trans('backoffice/data_service/data_service_to_agency.order_print_letterno') }}",
    required_order_print_letterno: "{{ trans('backoffice/data_service/data_service_to_agency.required_order_print_letterno') }}",

    from_date: "{{ trans('backoffice/data_service/data_service_to_agency.from_date') }}",
    to_date: "{{ trans('backoffice/data_service/data_service_to_agency.to_date') }}",
}
var _URL_ = '{{ $url }}';
</script>
@stop
