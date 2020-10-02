@extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('js-init','graphDam.init(group_Translator,dam_station,name)');
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit','highcharts') !!}
{!! $view->resource('js','js/frontoffice/iframe/graph-dam.js') !!}
{!! $view->resource('js','//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.5.6/numeral.min.js') !!}
@stop

@section('content-center')
<form class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('frontoffice/iframe/dam.dam') }} : </label>
            <div class="col-sm-8">
                <select class="form-control" name="dam_id" id="dam_name">
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('frontoffice/iframe/iframe.datatype') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="data_type" id="dam_datatype">
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">

    </div>
    <div class="form-group text-center">
        <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('master.btn_display') }}</button>
    </div>
</form>
<div class="col-sm-12">
    <div id="graph"></div>
    <div class="pull-right">
        {{ trans('frontoffice/iframe/iframe.data_date') }}
        <span id="date"></span>
    </div>
</div>

<script>
var group_Translator = {
    'LANGUAGE' : '{{ $l->getLocale() }}',
    'lower_bound' : '{{ trans("frontoffice/iframe/dam.lower_bound") }}',
    'upper_bound' : '{{ trans("frontoffice/iframe/dam.upper_bound") }}',
};
var dam_station = '{{ $dam_station }}';
var name = '{{ $name }}';
var dam_unit = '{{ trans("frontoffice/iframe/dam.dam_unit") }}';
var dam = '{{ trans("frontoffice/iframe/dam.dam") }}';
var day = '{{ trans("frontoffice/iframe/dam.day") }}';
</script>
@stop
