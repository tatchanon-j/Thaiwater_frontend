@section('extra_head')

@extends('backoffice/layout/master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
array(
  array(
    'href' => $l->httpUrl("backoffice/apis/monitor"),
    'text' => trans('backoffice/apis/key_access_mgmt.main-menu-mode')
  ),
  array(
    'text' => trans('backoffice/apis/monitor.page_name')
    )
  ));
  $view->option('js-init','srvMeta.init(group_Translator)');
  $view->option('page_name', trans('backoffice/apis/monitor.page_name'));
  ?>

{!! $view->resource('theme-css','css/backoffice/apis/monitor.css') !!}

{!!
$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper','moment','bootstrap-datetimepicker')
!!}
{!! $view->resource('js','js/backoffice/apis/monitor.js') !!}

@section('content')
<script type="text/js" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/th.js"></script>

<!-- Search -->
<div class="data-filters">
    <form class="filter-form justify-content-center" id="form_import">

        <div class="form-group row col-sm-12">
            <div class="form-group row col-sm-6">
                <label for="filter_startdate" class="control-label col-sm-2 text-sm-right"><span
                        class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_from") }}:</label>
                <div class="col-sm-10">
                    <div class="input-group date">
                        <input id="filter_startdate" type="text" class="form-control"
                            data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row col-sm-6">
                <label for="filter_enddate" class="col-sm-2 control-label text-sm-right"><span
                        class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_to") }}:</label>
                <div class="col-sm-10">
                    <div class="input-group date">
                        <input id="filter_enddate" type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm"
                            placeholder="YYYY-MM-DD HH:mm">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row col-sm-12">
            <div class="form-group row col-sm-6">
                <label for="service" class="control-label col-sm-2 text-sm-right"><span
                        class="color-red">*</span>{{ trans('/backoffice/apis/monitor.filter_service') }}:</label>
                <div class="col-sm-10 div_fill_service">
                    <div>
                        <select id="filter-service" name="servicename" class="form-control" multiple="multiple">
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group row col-sm-6">
                <label for="service" class="control-label col-sm-2 text-sm-right"><span
                        class="color-red">*</span>ประเภท:</label>
                <div class="col-sm-10">
                    <div>
                        <select id="filter-service-method" name="servicemethodname" class="form-control" multiple="multiple">
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row col-sm-12">
            <div class="form-group row col-sm-6">
                <label for="service" class="control-label col-sm-2 text-sm-right"><span
                        class="color-red"></span>ผู้ใช้งาน</label>
                <div class="col-sm-10">
                    <div>
                        <select id="filter-agent" name="agentname" class="form-control" multiple="multiple">
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-center ">
            <button type="button" class="btn btn-default" id="btn_preview">แสดง</button>
            <!-- <p>Command : regenerate config [name]</p> -->
        </div>
    </form>
    <div class="clearfix"></div>
    <!-- <p><b>หมายเหตุ</b> แสดงข้อมูลเริ่มต้น ณ วันที่ปัจจุบัน</p> -->
</div>
<!-- end search -->

<!-- icon loading -->
<div id="div_loading">
    <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
</div>
<!-- end icon loadding-->

<!-- data table -->
<div class="table-responsive">
    <table id="tbl-key_access_mgmt" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{ trans('/master.col_order') }}</th>
                <th>{{ trans("backoffice/apis/monitor.col_accesstime") }}</th>
                <th>{{ trans("backoffice/apis/monitor.col_agent_user") }}</th>
                <th>{{ trans("backoffice/apis/monitor.col_user") }}</th>
                <th>{{ trans("backoffice/apis/monitor.col_server_agent_user") }}</th>
                <th>{{ trans("backoffice/apis/monitor.col_server") }}</th>
                <th>{{ trans("backoffice/apis/monitor.col_server_method") }}</th>
                <th>{{ trans("backoffice/apis/monitor.col_host") }}</th>
                <th>{{ trans("backoffice/apis/monitor.col_client") }}</th>
                <th>{{ trans("backoffice/apis/monitor.col_request_url") }}</th>
                <th>{{ trans("backoffice/apis/monitor.col_access_duration") }}</th>
                <th>{{ trans("backoffice/apis/monitor.col_rely_code") }}</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<!-- end data table -->
<style>
ul.multiselect-container {
    width: 100%;
}
</style>
@stop