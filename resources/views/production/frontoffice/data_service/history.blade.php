@extends('frontoffice/layout/data_service')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('js-init','srvHistory.init(group_trans)');
$view->option('page_name', trans('frontoffice/data_service/history.page_name'));

?>
@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','bootstrap-multiselect','bootstrap-datepicker') !!}
{!! $view->resource('css','themes/default/css/frontoffice/data_service/history.css') !!}
{!! $view->resource('js','js/frontoffice/data_service/history.js') !!}
@stop

@section('content')
<!-- modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"> {{ trans('frontoffice/data_service/history.order_detail') }} </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table_order_detail"
                                class="table table-data_service table-count table-hover display text-center">
                                <thead>
                                    <tr>
                                        <th>{{ trans('frontoffice/data_service/history.sequence') }}</th>
                                        <th>{{ trans('frontoffice/data_service/history.data_name') }}</th>
                                        <th>{{ trans('frontoffice/data_service/history.data_frequency') }}</th>
                                        <th>{{ trans('frontoffice/data_service/history.data_owner') }}</th>
                                        <th>{{ trans('frontoffice/data_service/history.output_type') }}</th>
                                        <th>{{ trans('frontoffice/data_service/history.province') }}</th>
                                        <th>{{ trans('frontoffice/data_service/history.basin') }}</th>
                                        <th>{{ trans('frontoffice/data_service/history.order_status') }}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box box-default">
    <div class="box-body">
        <div class="table-responsive">
            <table id="table" class="table table-data_service table-hover display text-center">
                <thead>
                    <tr>
                        <th>{{ trans("frontoffice/data_service/history.order_id") }}</th>
                        <th>{{ trans("frontoffice/data_service/history.order_datetime") }}</th>
                        <th style="width:15%;">{{ trans("frontoffice/data_service/history.order_quality") }}</th>
                        <th>{{ trans("frontoffice/data_service/history.order_status") }}</th>
                        <th style="width:25%;"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="">
            <p>{{ trans('frontoffice/data_service/history.status_header') }}</p>
            <p id="status"></p>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"> รายการดาวน์โหลดประวัติคำขอข้อมูล </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table_order_detail_download"
                                class="table table-data_service table-count table-hover display text-center">
                                <thead>
                                    <tr>
                                    <th>{{ trans("frontoffice/data_service/history.order_id") }}</th>
                                    <th>{{ trans('frontoffice/data_service/history.data_name') }}</th>
                                    <th>{{ trans("frontoffice/data_service/history.order_datetime") }}</th>
                                    <th>{{ trans("frontoffice/data_service/history.order_status") }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <th>{{ trans("frontoffice/data_service/history.order_id") }}</th>
<th>{{ trans("frontoffice/data_service/history.order_datetime") }}</th>
<th>{{ trans("frontoffice/data_service/history.order_status") }}</th>
<th></th> -->

<script type="text/javascript">
group_trans = {
    LANGUAGE: "{{ $l->getLocale() }}",

    detail: "{{ trans('frontoffice/data_service/history.detail') }}",
}
</script>
@stop