@extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$view->option('title', trans('backoffice/data_integration_report/report_import.page_name'));

$view->asset('DataTables','DataTables-buttons','Font-Kanit','JsonHelper');
$view->resource('vendor-css','Font-THSarabunNew/THSarabunNew.css');
$view->resource('theme-css','css/print.css');
$view->resource('theme-css','css/backoffice/data_integration_report/report_import_print.css');
$view->resource('js','js/backoffice/data_integration_report/report_import_print.js');
$view->option('js-init', 'ri.init()');
?>

@section('content-center')

@include('backoffice/data_service/print.page')

<!-- value form filter search -->
<input type="hidden" id="input-date" value="{{ $filter_date }}">
<input type="hidden" id="input-starttime" value="{{ $filter_start_time }}">
<input type="hidden" id="input-endtime" value="{{ $filter_end_time }}">
<!-- vend alue form filter search -->

<!-- table  report import -->
<table class="d-none" id="table-reportimport">
    <tr class="header">
        <th style="background-color: #e9e9e9" class="th-eventtype">{{ trans('/master.col_time') }}</th>
        <th style="background-color: #e9e9e9" width="35%">{{ trans('/master.event_type') }}</th>
        <th style="background-color: #e9e9e9">{{ trans('/master.percent') }}</th>
        <th style="background-color: #e9e9e9">{{ trans('/master.remark') }}</th>
    </tr>
</table>
<!-- end table  report import -->

<!-- table  report import detail -->
<table class="d-none table-detail" id="table-reportimport-detail">
    <thead>
        <tr class="header">
            <th style="background-color: #e9e9e9" class="th-eventtype">
                {{ trans('backoffice/data_integration_report/report_import.detail_col_1') }}</th>
            <th style="background-color: #e9e9e9">
                {{ trans('backoffice/data_integration_report/report_import.detail_col_2') }}</th>
            <th style="background-color: #e9e9e9">
                {{ trans('backoffice/data_integration_report/report_import.detail_col_3') }}</th>
            <th style="background-color: #e9e9e9">
                {{ trans('backoffice/data_integration_report/report_import.detail_col_4') }}</th>
            <th style="background-color: #e9e9e9">
                {{ trans('backoffice/data_integration_report/report_import.detail_col_5') }}</th>
        </tr>
    </thead>
</table>
<!-- end table  report import detail -->

<!-- display content on print preview -->
<div class="form-row justify-content-center mt-3" >
    <button type="button"
        class="d-print-none center-block btn btn-success btn-print mr-2"
        onclick="window.print();"
        >{{ trans('/master.btn_print_pdf') }}</button>
    <button type="button"
        class="d-print-none center-block btn btn-info"
        id="btn-export-pdf"
        >Export PDF</button>
</div>
<div class="pdf" id='pdf-page'>
    <div class="page" id="page-reportimportr-1">
        <div class="subpage">
            <table class="no-border no-padding">
                <!-- <td  width="20%"><img src="/thaiwater30/resources/images/NHC_logo_color.png?v=1481808768"
                        style="width: 100px;" /></td> -->
                <td>
                    <p id="header-text">{!! trans('backoffice/data_integration_report/report_import.title_table') !!}
                    </p>
                </td>
            </table>
        </div>
    </div>
</div>
<!-- end  content on print preview -->

<!-- chang- import jspdf html2canvas-->
<script type="text/javascript" src="../../../public/vendor/html2canvas/html2canvas.min.js"></script>
<script src="../../../public/vendor/jspdf/jspdf.umd.min.js"></script>

<script type="text/javascript">
var LANG = '{{$l->getLocale()}}';
var TRANS = {
    'detail_head_1_default': "{!! trans('backoffice/data_integration_report/report_import.detail_head_1_default') !!}",
    'detail_head_1': "{!! trans('backoffice/data_integration_report/report_import.detail_head_1') !!}",
    'detail_head_2_default': "{!! trans('backoffice/data_integration_report/report_import.detail_head_2_default') !!}",
    'detail_head_2': "{!! trans('backoffice/data_integration_report/report_import.detail_head_2') !!}",
    'detail_col_3': "{!! trans('backoffice/data_integration_report/report_import.detail_col_3') !!}",
    'detail_col_4': "{!! trans('backoffice/data_integration_report/report_import.detail_col_4') !!}",
    'remark_default': "{!! trans('backoffice/data_integration_report/report_import.remark_default') !!}",

    'sub_event': "{!! trans('backoffice/data_integration_report/report_import.sub_event') !!}",
    'agency': "{!! trans('backoffice/data_integration_report/report_import.agency') !!}",

    'long_1': '{{ trans("month.long_01") }}',
    'long_2': '{{ trans("month.long_02") }}',
    'long_3': '{{ trans("month.long_03") }}',
    'long_4': '{{ trans("month.long_04") }}',
    'long_5': '{{ trans("month.long_05") }}',
    'long_6': '{{ trans("month.long_06") }}',
    'long_7': '{{ trans("month.long_07") }}',
    'long_8': '{{ trans("month.long_08") }}',
    'long_9': '{{ trans("month.long_09") }}',
    'long_10': '{{ trans("month.long_10") }}',
    'long_11': '{{ trans("month.long_11") }}',
    'long_12': '{{ trans("month.long_12") }}',
}
</script>

@stop

{!!
$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','highcharts','JsonHelper','moment')
!!}