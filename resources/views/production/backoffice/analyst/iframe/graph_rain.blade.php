 @extends('frontoffice/layout/master-iframe')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$view->option('js-init','graphRain.init(group_Translator,station,province,name,tab)');
// $view->option('js-init','alert('.$_REQUEST['t'].')');
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit','highcharts') !!}
{!! $view->resource('js','js/backoffice/analyst/iframe/graph_rain.js') !!}
{!! $view->resource('js','themes/warroom/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
{!! $view->resource('js','themes/warroom/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') !!}
@stop

@section('content-center')
<form class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">ชนิดข้อมูล</label>
            <div class="col-sm-8" id="rain24">
                <select class="form-control" name="datatype" id="datatype">
                    <option value="1">ฝน 24 ชั่วโมง</option>
                    <option value="2">ฝนวันนี้</option>
                    <option value="3">ฝนรายวัน</option>
                    <option value="4">ฝนรายเดือน</option>
                    <option value="5">ปริมาณน้ำฝนปีนี้</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('frontoffice/iframe/iframe.province') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="province" id="province">
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <label for="" class="col-sm-4 control-label">{{ trans('frontoffice/iframe/iframe.station') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="id" id="id">
                </select>
            </div>
        </div>
        <div class="col-sm-6" id="todate">
            <label class="col-sm-4 control-label">วันที่</label>
            <div class="col-sm-8">
                <div class="input-group date" id="s_date">
                    <input type="text" disabled="disabled" class="form-control" id="start_date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-sm-6" id="yearly">
            <label class="col-sm-4 control-label">ปี</label>
            <div class="col-sm-8">
                <div class="input-group date">
                    <input type="text" class="form-control" id="toyearly" value="{{Carbon\Carbon::now()->format('Y')}}"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group" id="dateyesterday">
    	<div class="col-sm-6">
    		<label class="col-sm-4 control-label">วันที่</label>
    		<div class="col-sm-8">
    			<div class="input-group date">
    				<input type="text" disabled="disabled" class="form-control" id="date_yesterday" value="{{Carbon\Carbon::now()->addDays(-6)->format('Y-m-d')}}" />
    				<span class="input-group-addon">
    					<span class="glyphicon glyphicon-calendar"></span>
    				</span>
    			</div>
    		</div>
    	</div>
        <div class="col-sm-6">
            <label class="col-sm-4 control-label">ถึงวันที่</label>
            <div class="col-sm-8">
                <div class="input-group date">
                    <input type="text" class="form-control" id="todate_yesterday" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group" id="datemonth">
        <div class="col-sm-6">
            <label class="col-sm-4 control-label">เดือน</label>
            <div class="col-sm-8">
                <div class="input-group month">
                    <input type="text" class="form-control" id="month" value="{{Carbon\Carbon::now()->format('m')}}" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <label class="col-sm-4 control-label">ปี</label>
            <div class="col-sm-8">
                <div class="input-group year">
                    <input type="text" class="form-control" id="toyear" value="{{Carbon\Carbon::now()->format('Y')}}" />
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
    <div id="graph" width="100%"></div>
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
var tab = '{{ $tab }}';
</script>
@stop
