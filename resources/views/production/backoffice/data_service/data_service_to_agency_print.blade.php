@extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('title', trans('backoffice/data_service/print.page_name'));

$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit','JsonHelper');
$view->resource('vendor-css','Font-THSarabunNew/THSarabunNew.css');
$view->resource('theme-css','css/print.css');
$view->resource('js','js/backoffice/data_service/data_service_to_agency_print.js');

$view->option('js-init','p.init('.$id.')');
?>
@section('content-center')

@include('backoffice/data_service/print.page-1')
@include('backoffice/data_service/print.page-2')
@include('backoffice/data_service/print.page-detail')

<div class="pdf">
    <button class="hidden-print center-block btn btn-success" onclick="window.print();">PDF</button>
</div>

<script type="text/javascript">
    var LANG = '{{$l->getLocale()}}';
    var TRANSLATOR = {
        'long_01' : '{{ trans("month.long_01") }}' ,
        'long_02' : '{{ trans("month.long_02") }}' ,
        'long_03' : '{{ trans("month.long_03") }}' ,
        'long_04' : '{{ trans("month.long_04") }}' ,
        'long_05' : '{{ trans("month.long_05") }}' ,
        'long_06' : '{{ trans("month.long_06") }}' ,
        'long_07' : '{{ trans("month.long_07") }}' ,
        'long_08' : '{{ trans("month.long_08") }}' ,
        'long_09' : '{{ trans("month.long_09") }}' ,
        'long_10' : '{{ trans("month.long_10") }}' ,
        'long_11' : '{{ trans("month.long_11") }}' ,
        'long_12' : '{{ trans("month.long_12") }}' ,

        from_date: "{{ trans('backoffice/data_service/data_service_to_agency_print.from_date') }}",
        to_date: "{{ trans('backoffice/data_service/data_service_to_agency_print.to_date') }}",
    };
</script>

@stop
