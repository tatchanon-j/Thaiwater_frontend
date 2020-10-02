@extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('js-init','graphWaterQualityDatetime.init(group_Translator,station,name)');
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit','highcharts','bootstrap-datepicker') !!}
{!! $view->resource('js','js/backoffice/analyst/iframe/graph-waterquality-comparedatetime.js') !!}
@stop

@section('content-center')

<form class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-12">
          <h4 class="text-center" id="graphSelect">{{ trans('frontoffice/home/index.waterquality_graph_title_link') }}{{ trans('backoffice/analyst/analyst.compare_datetime') }}ี</h4>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="" class="col-sm-4 control-label">{{ trans('backoffice/analyst/analyst.graphtype') }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="graphtype" id="graphtype">
                          <option value="station">{{ trans('backoffice/analyst/analyst.compare_station') }}</option>
                          <option value="param">{{ trans('backoffice/analyst/analyst.compare_param') }}</option>
                          <option value="waterlevel">{{ trans('backoffice/analyst/analyst.compare_waterlevel') }}</option>
                          <option value="datetime" selected>{{ trans('backoffice/analyst/analyst.compare_datetime') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                  <div class="col-sm-12">
                      <label for="" class="col-sm-4 control-label">{{ trans('backoffice/analyst/analyst.parameter') }}</label>
                      <div class="col-sm-8">
                          <select class="form-control" name="datatype" id="datatype">
                          </select>
                      </div>
                  </div>
            </div>
            <div class="form-group">
                  <div class="col-sm-12">
                      <label for="" class="col-sm-4 control-label">{{ trans('backoffice/analyst/analyst.station') }}</label>
                      <div class="col-sm-8">
                          <select class="form-control" name="station" id="station" multiple="multiple">
                          </select>
                      </div>
                  </div>
              </div>
        </div>
        <div class="col-sm-6">
            <div class="multi-date-fields">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="filter_date" class="control-label col-sm-4">{{ trans('frontoffice/home/index.date') }}</label>
                        <div class="col-sm-8 date-primary">
                            <div class="input-group date" data-provide="datepicker">
                                <input   name="filter_date[]" type="text" class="filter_date form-control" data-date-format="YYYY-MM-DD" placeholder="YYYY-MM-DD" data-date-end-date="0d">
                                <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="col-sm-8 col-sm-offset-4">
                        <div class="input-group">
                            <a href="javascript:void(0)" class="date-add"><span class="glyphicon glyphicon-plus-sign"></span></a>
                            <a  href="javascript:void(0)" class="date-remove"><span class="glyphicon glyphicon-minus-sign"></span></a>
                        </div>
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
