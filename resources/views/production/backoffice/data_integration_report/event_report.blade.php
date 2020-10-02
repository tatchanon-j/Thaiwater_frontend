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
        'href' => $l->httpUrl("backoffice/data_integration_report/report_event"),
        'text' => trans('backoffice/data_integration_report/report_event.main_menu_name')
    ),
    array(
        'text' => trans('backoffice/data_integration_report/event_report.page_name')
    ),
));
$view->option('js-init', 'er.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_integration_report/event_report.page_name'));
?>
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','highcharts','JsonHelper','moment') !!}
{!! $view->resource('js','js/backoffice/data_integration_report/event_report.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_integration_report/event_report.css') !!}

@stop

@section('content')

<!-- search -->
<div class="data-filters">
    <form class="form-row" id="frm">

        <div class="form-group row col-sm-6">
            <label for="filter_startdate" class="col-form-label text-sm-right col-sm-4"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_from") }}:</label>
            <div class="col-sm-8">
                <div class="input-group date">
                    <input id="filter_startdate"type="text" name="date" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
                    <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="false"></i></span>
          </div>
                </div>
            </div>
        </div>

        <!-- filter_agent -->
        <div class="form-group row col-sm-6">
            <label for="filter_agent" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans("master.agency") }}:</label>
            <div class="col-sm-8">
                <select class="form-control" id="filter_agent" name="agent" data-key="agent">

                </select>
            </div>
        </div>

        <!-- filter_category -->
        <div class="form-group row col-sm-6">
            <label for="filter_category" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('backoffice/event_management/event_type.col_event_type')}}</label>
            <div class="col-sm-8">
                <select class="form-control" id="filter_category" name="category" data-key="category">

                </select>
            </div>
        </div>

        <!-- filter_event -->
        <div class="form-group row col-sm-6">
            <label for="filter_event" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('backoffice/event_management/event_type.col_event_subtype')}}</label>
            <div class="col-sm-8">
                <select class="form-control" id="filter_event" name="event" data-key="event">

                </select>
            </div>
        </div>

        <!-- btn_preview -->
        <div class="col-sm-12 form-group">
            <div class="text-center">
                <button type="button" class="btn btn-primary" id="btn_display">{{ trans('/master.btn_display') }}</button>
            </div>
        </div>
    </form>
    <div class="clearfix"></div>
</div>
<!-- search -->


<!-- tabs-->
<div class="panel-group" id="accordion">

</div>
<!-- end tabs -->

<!-- table display event detail-->
<div id="div_preview">
    <div class="table-responsive">
        <table id="tbl" class="display admin-datatables" width="100%">
            <thead>
                <tr>
                    <th>{{trans("master.col_datetime")}}</th>
                    <th>{{ trans('backoffice/data_integration_report/event_report.column_type') }}</th>
                    <th>id</th>
                    <th>log id</th>
                    <th>name</th>
                    <th>{{ trans("backoffice/data_integration_report/event_report.column_detail" )}}</th>
                </tr>
            </thead>
            <tfoot>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<!-- end table display event detail-->

@stop
