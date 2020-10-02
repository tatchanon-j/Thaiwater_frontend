@extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('js-init','graphWaterlevel.init(group_Translator,station,province,name,tab)');
// $view->option('js-init','alert('.$_REQUEST['t'].')');
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit','highcharts') !!}
{!! $view->resource('js','js/backoffice/analyst/iframe/graph_waterlevel.js') !!}
{!! $view->resource('js','themes/warroom/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
{!! $view->resource('js','themes/warroom/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') !!}
@stop

@section('content-center')
<form class="form-horizontal">
	<div class="form-group">
		<div class="col-sm-6">
			<label for="" class="col-sm-4 control-label">ชนิดข้อมูล</label>
			<div class="col-sm-8" id="waterlevel">
				<select class="form-control" name="datatype" id="datatype">
					<option value="1">ระดับน้ำ</option>
					<option value="2">ระดับน้ำในลำน้ำ รายปี</option>
					<option value="3">ระดับน้ำที่ ปตร. / ฝาย</option>
				</select>
			</div>
		</div>
		<div class="col-sm-6">
			<label for="" class="col-sm-4 control-label">จังหวัด</label>
			<div class="col-sm-8">
				<select class="form-control" name="province" id="province"></select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-6">
			<label for="" class="col-sm-4 control-label">สถานี</label>
			<div class="col-sm-8">
				<select class="form-control" name="id" id="id"></select>
			</div>
		</div>
	</div>
	<div class="form-group" id="waterleveldate">
		<div class="col-sm-6">
			<label for="" class="col-sm-4 control-label">วันที่</label>
			<div class="col-sm-8">
				<div class="input-group date" id="s_date">
					<input type="text" disabled="disabled" class="form-control" id="start_date" value="{{Carbon\Carbon::now()->addDays(-2)->format('Y-m-d')}}"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<label for="" class="col-sm-4 control-label">ถึงวันที่</label>
			<div class="col-sm-8">
				<div class="input-group date" id="e_date">
					<input type="text" class="form-control" disabled="disabled" id="end_date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group" id="wateryear">
		<div class="col-sm-6">
			<label for="" class="col-sm-4 control-label">ปี</label>
			<div class="col-sm-8">
				<div class="input-group date" id="s_year">
					<input type="text" class="form-control" disabled="disabled" id="graphwaterlevel_year" value="{{Carbon\Carbon::now()->format('Y')}}" />
				<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
				</span>
				</div>
				
			</div>
		</div>
	</div>

	<div class="form-group text-center">
        <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('master.btn_display') }}</button>
    </div>
</form>

<div class="col-sm-12">
	<div id="graph" width="100%" high="100%"></div>
</div>



<script>
var group_Translator = {
    'LANGUAGE' : '{{ $l->getLocale() }}',

    'chart_y_text' : '{{ trans("frontoffice/iframe/waterlevel.chart_y_text") }}',
    'chart_y2_text' : '{{ trans("frontoffice/iframe/waterlevel.chart_y2_text") }}',
    'lower_bank' : '{{ trans("frontoffice/iframe/waterlevel.lower_bank") }}',
    'ground_level' : '{{ trans("frontoffice/iframe/waterlevel.ground_level") }}',
};
var chart_title = '{{ trans("frontoffice/iframe/waterlevel.chart_title") }}';
var yAxis_text = '{{ trans("frontoffice/iframe/waterlevel.yAxis_text") }}';
var station = '{{ $station }}';
var province = '{{ $province }}';
var name = '{{ $name }}';
var tab = '{{ $_GET['tab'] }}';

</script>
@stop