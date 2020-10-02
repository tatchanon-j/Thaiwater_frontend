@extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('js-init','graphWaterQualityWaterLevel.init(group_Translator,station,name)');
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit','highcharts','bootstrap-datetimepicker') !!}
{!! $view->resource('js','js/backoffice/analyst/iframe/graph-waterquality-comparewaterlevel.js') !!}
@stop

@section('content-center')

<form class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-12">
          <h4 class="text-center" id="graphSelect">{{ trans('frontoffice/home/index.waterquality_graph_title_link') }}{{ trans('backoffice/analyst/analyst.compare_waterlevel') }}</h4>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('backoffice/analyst/analyst.graphtype') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="graphtype" id="graphtype">
                  <option value="station">{{ trans('backoffice/analyst/analyst.compare_station') }}</option>
                  <option value="param">{{ trans('backoffice/analyst/analyst.compare_param') }}</option>
                  <option value="waterlevel" selected>{{ trans('backoffice/analyst/analyst.compare_waterlevel') }}</option>
                  <option value="datetime">{{ trans('backoffice/analyst/analyst.compare_datetime') }}</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('frontoffice/home/index.waterlevel_station') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="waterlevel_station" id="waterlevel_station">
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('backoffice/analyst/analyst.parameter') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="datatype" id="datatype">
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('backoffice/analyst/analyst.station') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="station" id="station">
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <label for="filter_date" class="control-label col-sm-4">{{ trans('backoffice/analyst/analyst.start_date') }}</label>
            <div class="col-sm-8">
              <div class="input-group date" data-provide="datepicker">
                <input id="filter_startdate" name="filter_startdate" type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm" data-date-end-date="0d">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </div>
              </div>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="filter_date" class="control-label col-sm-4">{{ trans('backoffice/analyst/analyst.end_date') }}</label>
            <div class="col-sm-8">
              <div class="input-group date" data-provide="datepicker">
                <input id="filter_enddate" name="filter_enddate" type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm" data-date-end-date="0d">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </div>
              </div>
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
    'waterlevel()': '{{ trans("frontoffice/home/index.waterlevel()") }}',
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
