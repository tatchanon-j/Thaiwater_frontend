@extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('js-init','graphWaterLevel.init(group_Translator,station,station_type,province,name)');
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit','highcharts','select2') !!}
{!! $view->resource('js','js/frontoffice/iframe/graph-waterlevel.js') !!}
@stop

@section('content-center')
<form class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('frontoffice/iframe/iframe.province') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="province" id="province">
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('frontoffice/iframe/iframe.station') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="id" id="id">
                </select>
            </div>
        </div>
    </div>
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
    'tele_waterlevel' : '{{ trans("frontoffice/iframe/waterlevel.tele_waterlevel") }}',
    'canal_waterlevel' : '{{ trans("frontoffice/iframe/waterlevel.canal_waterlevel") }}',

    'lower_bank' : '{{ trans("frontoffice/iframe/waterlevel.lower_bank") }}',
    'ground_level' : '{{ trans("frontoffice/iframe/waterlevel.ground_level") }}',
};
var station = '{{ $station }}';
var station_type = '{{ $station_type }}';
var province = '{{ $province }}';
var name = '{{ $name }}';
var chart_title = '{{ trans("frontoffice/iframe/waterlevel.chart_title") }}';
var yAxis_text = '{{ trans("frontoffice/iframe/waterlevel.yAxis_text") }}';
var data_unit = '{{ trans("frontoffice/iframe/waterlevel.data_unit") }}';
</script>
@stop
