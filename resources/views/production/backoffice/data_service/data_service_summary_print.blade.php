@extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('title', trans('backoffice/data_service/print.page_name'));

$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit','JsonHelper');
$view->resource('vendor-css','Font-THSarabunNew/THSarabunNew.css');
$view->resource('theme-css','css/print.css');
$view->resource('theme-css','css/backoffice/data_integration_report/report_import_print.css');
$view->resource('js','js/backoffice/data_service/data_service_summary_print.js');
$view->option('js-init','sp.init()');
?>
@section('content-center')

@include('backoffice/data_service/print.page')
<input type="hidden" id="input-datestart" value="{{ $datestart }}">
<input type="hidden" id="input-dateend" value="{{ $dateend }}">
<input type="hidden" id="input-user" value="{{ $user_id }}">
<input type="hidden" id="input-agency" value="{{ $agency_id }}">
<!-- <table class="d-none" id="table-summary">
    <tr align="center">
        <td rowspan="2">{{ trans('backoffice/data_service/data_service_summary_print.table-sequence') }}</td>
        <td rowspan="2">{{ trans('backoffice/data_service/data_service_summary_print.table-order_header') }}</td>
        <td rowspan="2">{{ trans('backoffice/data_service/data_service_summary_print.table-dataservicename') }}</td>
        <td rowspan="2">{{ trans('backoffice/data_service/data_service_summary_print.table-user') }}</td>
        <td rowspan="2">{{ trans('backoffice/data_service/data_service_summary_print.table-agency') }}</td>
        <td rowspan="2">{{ trans('backoffice/data_service/data_service_summary_print.table-servicetype') }}</td>
        <td colspan="2">{{ trans('backoffice/data_service/data_service_summary_print.table-date') }}</td>
        <td rowspan="2">{{ trans('backoffice/data_service/data_service_summary_print.table-result') }}</td>
    </tr>
    <tr align="center">
        <td width="90">{{ trans('backoffice/data_service/data_service_summary_print.table-order_date') }}</td>
        <td width="90">{{ trans('backoffice/data_service/data_service_summary_print.table-result_date') }}</td>
    </tr>
</table> -->

<table class="d-none" id="table-summary">
    <tr align="center">
        <td style="background-color: #e9e9e9" colspan="1">ลำดับ</td>
        <td style="background-color: #e9e9e9" colspan="1">รายละเอียด</td>
        <td style="background-color: #e9e9e9" colspan="2">จำนวน</td>
        <td style="background-color: #e9e9e9" colspan="1">หมายเหตุ</td>
    </tr>
</table>

<table class="d-none" id="table-summary2">
    <tr align="center">
        <td style="background-color: #e9e9e9" colspan="1">ลำดับ</td>
        <td style="background-color: #e9e9e9" colspan="1">รายชื่อหน่วยงาน</td>
        <td style="background-color: #e9e9e9" colspan="1">จำนวน</td>
    </tr>
</table>

<table class="d-none" id="table-summary3">
    <tr align="center">
        <td style="background-color: #e9e9e9" colspan="1">ลำดับ</td>
        <td style="background-color: #e9e9e9" colspan="1">ชื่อข้อมูล</td>
        <td style="background-color: #e9e9e9" colspan="1">จำนวน Record</td>
        <td style="background-color: #e9e9e9" colspan="1">หมวดหลัก</td>
        <td style="background-color: #e9e9e9" colspan="1">หมวดย่อย</td>
    </tr>
</table>

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

<div class="pdf">
    <div class="form-row justify-content-center mt-3">
        <button class="d-print-none center-block btn btn-success" onclick="window.print();">PDF</button>
    </div>
    <!-- <div class="page page-landscape" id="page-summary-1">
        <div class="subpage">
            <div id="page-header">
                <p>
                    <img src="/thaiwater30/resources/images/NHC_logo_color.png?v=1481808768" style="width: 100px;">
                </p>
                <p> {!! trans('backoffice/data_service/data_service_to_agency_print.address') !!} </p>
                <table>
                    <tr>
                        <td>{!! trans('backoffice/data_service/data_service_summary_print.header') !!} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div> -->
    <div class="page" id="page-summary-1">
        <div class="subpage">
            <div id="page-header">
                <table class="text-center">
                    <tr>
                        <td>สรุปจำนวนจากระบบให้บริการข้อมูลคลังข้อมูลน้ำและภูมิอากาศแห่งชาติ (Data Service)</td>
                    </tr>
                    <tr>
                        <!-- chang- ใส่วันที่ลงไปในตาราง -->
                        <td>ระหว่างวันที่ {{ $datestart }} ถึง {{ $dateend }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- chang- comment ไว้ยังไม่รู้ว่าตาาง api ไว้ใช้ทำอะไร -->
    <!-- <div class="page" id="page-summary-2">
        <div class="subpage">
            <div id="page-header">
                <table class="text-center">
                    <tr>
                        <td>สรุปจำนวนเรียกใช้ API จากระบบติดตามการใช้งาน</td>
                    </tr>
                </table>
            </div>
        </div>
    </div> -->

    <!-- <div class="page  page-landscape" id="page-summary-chart">
        <div class="subpage">
            <div id="page-header">
                <table class="text-center">
                    <tr>
                        <td>สรุปจำนวนเรียกใช้ API จากระบบติดตามการใช้งาน</td>
                    </tr>
                </table>
            </div>
        </div>
    </div> -->

    <div class="page" id="page-summary-3">
        <div class="subpage">
            <div id="page-header">
                <table class="text-center">
                    <tr>
                        <td>สรุปจำนวนรายการที่เรียกดูมากที่สุดตามลำดับ</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="page  page-landscape"  id="page-summary-chart-2">
        <div class="subpage">
            <div id="page-header">
                <h1 class="text-center">จำนวน Record</h1>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var LANG = '{{$l->getLocale()}}';
var TRANSLATOR = {
    all_agency: "{{ trans('backoffice/data_service/data_service_summary_print.all_agency') }}",
    source_result_AP: "{{ trans('backoffice/data_service/data_service_summary.source_result_AP') }}",
    source_result_DA: "{{ trans('backoffice/data_service/data_service_summary.source_result_DA') }}",
};
</script>

@stop

{!!
$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','highcharts','JsonHelper','moment')
!!}