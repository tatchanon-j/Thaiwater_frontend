@extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('js-init','graphRain.init(group_Translator,station,province,name)');
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit','highcharts') !!}
{!! $view->resource('js','js/frontoffice/iframe/graph-rain24.js') !!}
@stop

@section('content-center')
<form class="form-inline">
    <div class="col-sm-6 form-inline" id="magin-space">
        <label for="" class="col-sm-5 control-label justify-content-end">{{ trans('frontoffice/iframe/iframe.province') }}</label>
        <div class="col-sm-7">
            <select class="form-control" name="province" id="province">
            </select>
        </div>
    </div>
    <div class="col-sm-6 form-inline" id="magin-space">
        <label for="" class="col-sm-5 control-label justify-content-end">{{ trans('frontoffice/iframe/iframe.station') }}</label>
        <div class="col-sm-7">
            <select class="form-control" name="id" id="id">
            </select>
        </div>
    </div>
    <div class="col-sm-6 form-inline" id="magin-space">
        <label for="" class="col-sm-5 control-label justify-content-end">{{ trans('frontoffice/iframe/iframe.datatype') }}</label>
        <div class="col-sm-7">
            <select class="form-control" name="datatype" id="datatype" >
            </select>
        </div>
    </div>
</form>
<div class="form-group text-center justify-content-lg-center" style="margin-bottom:auto">
    <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('master.btn_display') }}</button>
</div>
<div class="col-sm-12">
    <div id="graph"></div>
</div>

<script>
var group_Translator = {
    'LANGUAGE' : '{{ $l->getLocale() }}',

    'chart_y_text' : '{{ trans("frontoffice/iframe/rain.chart_y_text") }}',
    'chart_y2_text' : '{{ trans("frontoffice/iframe/rain.chart_y2_text") }}',
};
var station = '{{ $station }}';
var province = '{{ $province }}';
var name = '{{ $name }}';
var rain_unit = '{{ trans("frontoffice/iframe/rain.rain_unit") }}';
var rain_sum = '{{ trans("frontoffice/iframe/rain.sum") }}';
</script>

<style>
    #province{
        width:100%;
    }
    #id{
        width:100%;
    }
    #datatype{
        width:100%;
    }
    #magin-space{
        margin: 10px 10px 10px -10px;
    }
</style>
@stop
