@extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('js-init','graphWaterQuality.init(group_Translator,station,province,name)');
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit','highcharts-latest') !!}
{!! $view->resource('js','js/frontoffice/iframe/graph-waterquality.js') !!}
@stop

@section('content-center')
<form class="form-horizontal">
    <div class="form-group form-inline">
        <div class="col-sm-6 form-inline">
            <label for="" class="col-sm-5 control-label justify-content-end">{{ trans('frontoffice/iframe/iframe.province') }}</label>
            <div class="col-sm-7">
                <select class="form-control" name="province" id="province" style="width:100%">
                </select>
            </div>
        </div>
        <div class="col-sm-6 form-inline">
            <label for="" class="col-sm-5 control-label justify-content-end">{{ trans('frontoffice/iframe/iframe.station') }}</label>
            <div class="col-sm-7">
                <select class="form-control" name="id" id="id" style="width:100%">
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-6 form-inline">
        <label for="" class="col-sm-5 control-label justify-content-end">{{ trans('frontoffice/iframe/iframe.datatype') }}</label>
        <div class="col-sm-7">
            <select class="form-control" name="datatype" id="datatype" style="width:100%">
            </select>
        </div>
    </div>
    <br>
    <div class="form-group text-center">
        <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('master.btn_display') }}</button>
    </div>
</form>
<div class="col-sm-12">
    <div id="graph"></div>
</div>

<script>
var group_Translator = {
    'LANGUAGE' : '{{ $l->getLocale() }}',
    'waterquality_graph_title_link': '{{ trans("frontoffice/home/index.waterquality_graph_title_link") }}',
};
var TRANSLATOR = {
    'salinity_2': '{{ trans("frontoffice/home/index.salinity_2") }}',
    'salinity_0.5': '{{ trans("frontoffice/home/index.salinity_0.5") }}',
    'salinity_0.25': '{{ trans("frontoffice/home/index.salinity_0.25") }}',

    'standard': '{{ trans("frontoffice/home/index.standard") }}',
    'standard_>': '{{ trans("frontoffice/home/index.standard_>") }}',
    'standard_<': '{{ trans("frontoffice/home/index.standard_<") }}',
}
var station = '{{ $station }}';
var province = '{{ $province }}';
var name = '{{ $name }}';
var xAxis_text = '{{ trans("frontoffice/iframe/waterquality.xAxis_text") }}';
</script>
@stop
