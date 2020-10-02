@extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('js-init','graphDamYearly.init(group_Translator,station,dam_size)');
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit','highcharts','bootstrap-datetimepicker') !!}
{!! $view->resource('js','js/backoffice/analyst/iframe/graph-dam-yearly.js') !!}
@stop

@section('content-center')

<form class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-12">
          <h4 class="text-center" id="graphSelect">{{ trans('backoffice/analyst/analyst.graph_dam_yearly') }}</h4>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('backoffice/analyst/analyst.graphtype') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="graphtype" id="graphtype">
                  <option value="yearly" selected>{{ trans('backoffice/analyst/analyst.graph_dam_yearly') }}</option>
                  <option value="daily">{{ trans('backoffice/analyst/analyst.graph_dam_daily') }}</option>
                  <option value="medium">{{ trans('backoffice/analyst/analyst.graph_dam_medium') }}</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('backoffice/analyst/analyst.data_type') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="datatype" id="datatype">
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('backoffice/analyst/analyst.year') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="year_range" id="year_range" multiple="multiple">
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('backoffice/analyst/analyst.dam_name') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="dam_name" id="dam_name" multiple="multiple">
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
    'waterquality_graph_title_link': '{{ trans("frontoffice/home/index.waterquality_graph_title_link") }}',
    'selected_all': '{{ trans("master.selected_all") }}',
    'search': '{{ trans("master.search") }}',
    'all_selected': '{{ trans("master.all_selected") }}',
    'none_selected': '{{ trans("master.none_selected") }}',
    'dam_unit':'{{ trans("frontoffice/iframe/dam.dam_unit") }}',
    'dam': '{{ trans("backoffice/analyst/analyst.dam") }}',
		'dam_inflow': '{{ trans("backoffice/analyst/analyst.dam_inflow") }}',
		'dam_storage': '{{ trans("backoffice/analyst/analyst.dam_storage") }}',
		'dam_released': '{{ trans("backoffice/analyst/analyst.dam_released") }}',
		'dam_uses_water': '{{ trans("backoffice/analyst/analyst.dam_uses_water") }}',
		'dam_low_text': '{{ trans("backoffice/analyst/analyst.dam_low_text") }}',
		'dam_high_text': '{{ trans("backoffice/analyst/analyst.dam_high_text") }}',
		'dam_scale_text': '{{ trans("backoffice/analyst/analyst.dam_scale_text") }}',
		'waterlevel_store': '{{ trans("backoffice/analyst/analyst.waterlevel_store") }}',
		'loca': '{{ trans("frontoffice/home/index.loca") }}',
		'short_province': ' {{ trans("frontoffice/home/index.short_province") }}',
		'short_amphoe': ' {{ trans("frontoffice/home/index.short_amphoe") }}',
		'short_tumbon': ' {{ trans("frontoffice/home/index.short_tumbon") }}',
		'lower_bound': ' {{ trans("frontoffice/iframe/dam.lower_bound") }}',
		'upper_bound': ' {{ trans("frontoffice/iframe/dam.upper_bound") }}',
};
var TRANSLATOR = {
    'salinity_2': '{{ trans("frontoffice/home/index.salinity_2") }}',
    'salinity_0.5': '{{ trans("frontoffice/home/index.salinity_0.5") }}',
    'salinity_0.25': '{{ trans("frontoffice/home/index.salinity_0.25") }}',

    'standard': '{{ trans("frontoffice/home/index.standard") }}',
    'standard_>': '{{ trans("frontoffice/home/index.standard_>") }}',
    'standard_<': '{{ trans("frontoffice/home/index.standard_<") }}',
}

var xAxis_text = '{{ trans("frontoffice/iframe/waterquality.xAxis_text") }}';

var dam_size = '{{ $dam_size }}';
var station = '{{ $station }}';

</script>
@stop
