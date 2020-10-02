<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();
$url = $l->httpUrl("backoffice/data_integration_report/report_import_print");

$view->option('breadcrumb',
array(
    array(
        'href' => $l->httpUrl("backoffice/data_integration_report/report_event"),
        'text' => trans('backoffice/data_integration_report/report_event.main_menu_name')
    ),
    array(
        'text' => trans('backoffice/data_integration_report/report_import.page_name')
    ),
    )
);
$view->option('js-init', 'ri.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_integration_report/report_import.page_name'));
?>

@section('extra_head')
{!! $view->resource('theme-css','css/backoffice/data_integration_report/report_import.css') !!}

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','bootstrap-datetimepicker', 'JsonHelper') !!}

{!! $view->resource('js','js/backoffice/data_integration_report/report_import.js') !!}

@extends('backoffice/layout/master')


@stop

@section('content')

<!-- search -->
<div class="data-filters">
    <form class="form-row" id="form_import">

        <div class="col-sm-6 form-group row">
            <label for="filter_date" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.start_date') }}:</label>
            <div class="col-sm-8">
                <div class="input-group date">
                    <input id="filter_date" class="form-control" type="text" required/>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="false"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3 form-group row">
            <label for="filter_monthstart" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.time') }}:</label>
            <div class="col-sm-8">
                <input id="filter_start_time" class="form-control" type="text" value="00:00"
                required data-parsley-lt="#filter_end_time"/>
            </div>
        </div>

        <div class="col-sm-3 form-group row">
            <label for="filter_end_time" class="col-sm-2 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.end_date') }}:</label>
            <div class="col-sm-8">
                <input id="filter_end_time" class="form-control" type="text" value="01:00" required
                data-parsley-gt="#filter_start_time"/>
            </div>
        </div>

        <div class="col-sm-12 form-group">
            <div class="text-center">
                <button type="button" class="btn btn-primary" id="btn_print">{{ trans('/master.btn_display') }}</button>
            </div>
        </div>
    </form>
    <div class="clearfix"></div>
</div>
<!-- end search -->

<script>
var _URL_ = '{{ $url }}'; // URL to preview print.
</script>

@stop
