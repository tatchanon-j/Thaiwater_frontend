@section('extra_head')

@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();
$url = $l->httpUrl("backoffice/data_management/check_metadata_print");

$view->option('breadcrumb',
array(
  array(
    'href' => $l->httpUrl("/backoffice/data_management/check_metadata"),
    'text' => trans('/backoffice/data_management/check_metadata.header_menu')
  ),
  array(
    'text' => trans('/backoffice/data_management/check_metadata.page_name')
  ),
));
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('/backoffice/data_management/check_metadata.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/data_management/check_metadata.css') !!}

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper','select2') !!}

{!! $view->resource('js','js/backoffice/data_management/check_metadata.js') !!}


@stop

@section('content')

<!-- search -->
<div class="data-filters">
  <form class="form-inline" id="form_filter">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="filter_table" class="col-sm-4 control-label  justify-content-end"><span class="color-red">*</span>{{ trans('/backoffice/data_management/check_metadata.filter_table') }}:</label>
        <div class="col-sm-8">
          <select id="filter_table" class="form-control" name="filter_table" style="width:100%" data-parsley-required>
            <option class="op_default" value="">{{ trans('/master.msg_filter_required') }}</option>
          </select>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label for="filter_datametada" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/backoffice/data_management/check_metadata.filter_datametada') }}:</label>
        <div class="col-sm-8">
          <select name="filter_datametada" id="filter_datametada" class="form-control " style="width:100%;height:100%" data-parsley-required disabled>
            <option class="intro" value="">{{ trans('/master.msg_filter_required') }}</option>
          </select>
        </div>
      </div>
    </div>
    <br>
    <br>

    <div class="col-sm-6">
      <div class="form-group">
        <label for="filter_agency" class="col-sm-4 control-label justify-content-end"><span class="color-red">*</span>{{ trans('/backoffice/data_management/check_metadata.filter_agency') }}:</label>
        <div class="col-sm-8">
          <select name="filter_agency" id="filter_agency" class="form-control" style="width:100% ; height:100%" data-parsley-required disabled>
            <option class="intro" value="">{{ trans('/master.msg_filter_required') }}</option>
          </select>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>

    <!-- Button Previews -->
    <div class="col-sm-12 text-center">
      <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('master.btn_display')}}</button>
    </div>
    <br>
    <br>
    <br>
    <div class="col-sm-12">
      <p>
        <u>{{trans('backoffice/data_management/check_metadata.remark')}}</u>
        {{trans('backoffice/data_management/check_metadata.remark_text')}}
      </p>
    </div>
  </form>
  <div class="clearfix"></div>
</div>
<!-- end search -->

<!-- loading -->
<div id="div_loading" style="display:none">
  <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
</div>
<!-- end loading -->

<!-- table -->
<div id="div_preview">
  <div class="table-responsive">
    <table id="tbl-checkmetadata" class="display admin-datatables" width="100%">
      <thead>
        <!-- <th></th> -->
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>
</div>
<!-- end table -->

<script>
var _URL_ = '{{ $url }}';
</script>

@stop
