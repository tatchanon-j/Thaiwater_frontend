@extends('frontoffice/layout/agency')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('js-init','asum.init()');
$view->option('page_name', trans("frontoffice/agency/summary.page_name"));
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','highcharts') !!}
{!! $view->resource('js','js/frontoffice/agency/summary.js') !!}
{!! $view->resource('theme-css','css/frontoffice/agency/agency.css') !!}

@stop

@section('content')

<div class="data-filters">
  <form class="form-row justify-content-center" id="form_import">
    <div class="col-sm-6 form-group row">
      <label for="filter_year" class="col-sm-4 form-control-label text-sm-right">{{ trans("frontoffice/agency/summary.label_year") }}</label>
      <div class="col-sm-8">
        <select id="filter_year" name="year" class="form-control">
        </select>
      </div>
    </div>

    <div class="col-sm-6 form-group row">
      <label for="filter_month" class="col-sm-4 form-control-label text-sm-right">{{ trans("frontoffice/agency/summary.label_month") }}</label>
      <div class="col-sm-8">
        <select id="filter_month" name="month" class="form-control">
          <option value="1">{{ trans("month.long_01") }}</option>
          <option value="2">{{ trans("month.long_02") }}</option>
          <option value="3">{{ trans("month.long_03") }}</option>
          <option value="4">{{ trans("month.long_04") }}</option>
          <option value="5">{{ trans("month.long_05") }}</option>
          <option value="6">{{ trans("month.long_06") }}</option>
          <option value="7">{{ trans("month.long_07") }}</option>
          <option value="8">{{ trans("month.long_08") }}</option>
          <option value="9">{{ trans("month.long_09") }}</option>
          <option value="10">{{ trans("month.long_10") }}</option>
          <option value="11">{{ trans("month.long_11") }}</option>
          <option value="12">{{ trans("month.long_12") }}</option>
        </select>
      </div>
    </div>

    <!-- Button Previews -->
    <div class="text-center">
      <button type="button" class="btn btn-primary" id="btn_preview">{{ trans("master.btn_display") }}</button>
    </div>

  </form>
</div> <!-- End Div Form Filter-->
<div class="clearfix"></div>
dynamic
<div id="div_preview">

</div>
<hr>
static
<div id="div_preview-offline">

</div>

<script type="text/javascript">
    LANG = '{{ $l->getLocale() }}';
    TRANSLATOR = {
        series_name: '{{ trans("frontoffice/agency/summary.series_name") }}',
        series_name_offline: '{{ trans("master.number_file_import") }}',
        xaxis_text: '{{ trans("frontoffice/agency/summary.xaxis_text") }}',
        yaxis_text: '{{ trans("frontoffice/agency/summary.yaxis_text") }}',
        yaxis_text_offline: '{{ trans("master.number_file_import") }}',
    };
</script>
@stop
