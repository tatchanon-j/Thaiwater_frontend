@section('extra_head')

@extends('backoffice/layout/master')

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
	array(
		array(
			'href' => $l->httpUrl("backoffice/data_integration/mgmt_conv_rain"),
			'text' => trans('backoffice/data_integration/mgmt_script_rain.main_menu_name'),
		),
		array(
			'text' => trans('backoffice/data_integration/mgmt_conv_rain.page_name'),
		),
	)
);
$view->option('page_name', trans('backoffice/data_integration/mgmt_conv_rain.page_name'));
$view->option('js-init', 'mgmt.init(group_Translator)');
?>

{!! $view->resource('theme-css','css/backoffice/data_integration/mgmt_script_rain.css') !!}

@stop

@section('content')

<!-- search -->

<div class="data-filters">
  <form class="form-row">
  
    <div class="form-group row col-sm-8">
      <label class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv_rain.label_data_type')}}</label>
      <div class="col-sm-4">
        <select id="filter_download_type" class="form-control">
          <option value="">{{ trans('/master.select_all') }}</option>
          <option value="migrate">{{trans('backoffice/data_integration/mgmt_conv_rain.label_dis_migrate') }}</option>
          <option value="notmigrate" selected>{{trans('backoffice/data_integration/mgmt_conv_rain.label_is_dis_migrate') }}</option>
        </select>
      </div>
    </div>
    <!-- Button Previews -->
    <!-- <button type="button" class="btn btn-primary" id="btn_display">{{ trans('/master.btn_display') }}</button> -->
  </form>
  <div class="clearfix"></div>
</div>
<!-- end search -->

<!-- data table -->
<div class="table-responsive">
  <table id="tbl" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>{{trans('backoffice/data_integration/mgmt_conv_rain.conv_id')}}</th>
        <th>{{trans('backoffice/data_integration/mgmt_conv_rain.download_id')}}</th>
        <th>{{trans('backoffice/data_integration/mgmt_conv_rain.conv_name')}}</th>
        <th></th>
      </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- data table -->

<form class="form-row hidden" id="mgmt-script-form" data-parsley-validate>
  <!-- Block 1: -->
  <!-- download_name -->
  <div class="col-sm-6 ">
    <div class="form-group row">
      <label for="download_name" class="col-sm-4 col-form-label text-sm-right">
        <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv_rain.label_download_name')}}
      </label>
      <div class="col-sm-7">
        <select id="download_name" class="form-control select-search" name="download_name" ></select>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_download_name')}}"></i>
      </div>
    </div>
  </div>
  <!-- agent_user_id -->
  <div class="col-sm-6">
    <div class="form-group row">
      <label for="agent_user" class="col-form-label text-sm-right col-sm-4">
        <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv_rain.label_agent_user')}}
      </label>
      <div class="col-sm-7">
        <select id="agent_user" class="form-control select-search" ></select>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_agent_user')}}"></i>
      </div>
    </div>
  </div>
  <!-- convert_method -->
  <div class="col-sm-6">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv_rain.label_convert_method')}}
      </label>
      <div class="col-sm-7">
        <select class="form-control select-search" id="convert_method" name="convert_method" data-key="con-script" required></select>
        <p class="text-muted bg-danger" style="font-style: italic">
          ถ้ามี qc ต้องใช้ cv-std เท่านั้น
      </p>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_convert_method')}}"></i>
      </div>
    </div>
  </div>
  <!-- import_method -->
  <div class="col-sm-6">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv_rain.label_import_method')}}
      </label>
      <div class="col-sm-7">
        <select class="form-control select-search" id="import_method" name="import_method" data-key="imp-script" required></select>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_import_method')}}"></i>
      </div>
    </div>
  </div>
  <!-- convert_name , dataset_name -->
  <div class="col-sm-6">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv_rain.label_convert_name')}}
      </label>
      <div class="col-sm-7">
        <input type="text" id="convert_name" class="form-control" name="convert_name"
        required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv_rain.parsley_convert_name')}}"/>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_data_set')}}"></i>
      </div>
    </div>
  </div>
  <!-- data_folder -->
  <div class="col-sm-6">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv_rain.label_data_folder')}}
      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="data_folder" name="data_folder"  placeholder="dataset/bma/canal"
        required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv_rain.parsley_data_folder')}}"/>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_data_folder')}}"></i>
      </div>
    </div>
  </div>
  <!-- config_name -->
  <div class="col-sm-6">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv_rain.label_config_name')}}
      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control"  id="config_name" name="config_name"
        required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv_rain.parsley_config_name')}}"/>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.label_config_name')}}"></i>
      </div>
    </div>
  </div>
  <!-- input_name -->
  <div class="col-sm-6 div_input_name" >
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv_rain.label_input_name')}}
      </label>
      <div class="col-sm-7">
        <select class="form-control"  id="input_name" name="input_name"
        required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv_rain.parsley_input_name')}}">

      </select>
    </div>
    <div class="row col-sm-1">
      <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
      data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_conv_input_name')}}"></i>
    </div>
  </div>
</div>
<!-- header_row -->
<div class="col-sm-6 input_name_ctrl div_header_row">
  <div class="form-group row">
    <label class="col-sm-4 col-form-label text-sm-right">
      {{trans('backoffice/data_integration/mgmt_conv_rain.label_header_row')}}
    </label>
    <div class="col-sm-7">
      <input type="number" class="form-control" id="header_row" name="header_row" >
    </div>
    <div class="row col-sm-1">
      <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
      data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_conv_header_rows')}}"></i>
    </div>
  </div>
</div>
<!-- data_tag -->
<div class="col-sm-6 input_name_ctrl div_data_tag"  style="display: none;">
  <div class="form-group row">
    <label class="col-sm-4 col-form-label text-sm-right">
      {{trans('backoffice/data_integration/mgmt_conv_rain.label_data_tag')}}
    </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="data_tag" name="data_tag" data-key="data_tag">
    </div>
    <div class="row col-sm-1">
      <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
      data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_conv_data_tag')}}"></i>
    </div>
  </div>
</div>
<!-- import_table -->
<div class="col-sm-6">
  <div class="form-group row">
    <label class="col-sm-4 col-form-label text-sm-right">
      <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv_rain.label_import_table')}}
    </label>
    <div class="col-sm-7">
      <select class="form-control select-search" id="import_table" name="import_table" data-key="import_table"></select>
    </div>
    <div class="row col-sm-1">
      <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
      data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_import_table')}}"></i>
    </div>
  </div>
</div>
<!-- unique_constraint -->
<div class="col-sm-6">
  <div class="form-group row">
    <label class="col-sm-4 col-form-label text-sm-right">
      {{trans('backoffice/data_integration/mgmt_conv_rain.label_unique_constraint')}}
    </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="unique_constraint" name="unique_constraint"/>
    </div>
    <div class="row col-sm-1">
      <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
      data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_conv_unique_constraint')}}"></i>
    </div>
  </div>
</div>
<!-- partition_field -->
<div class="col-sm-6">
  <div class="form-group row">
    <label class="col-sm-4 col-form-label text-sm-right">
      {{trans('backoffice/data_integration/mgmt_conv_rain.label_partition_field')}}
    </label>
    <div class="col-sm-7">
      <select class="form-control" id="partition_field" name="partition_field">
        <option value="" class="default"></option>
      </select>
    </div>
    <div class="row col-sm-1">
      <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
      data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_conv_partition_field')}}"></i>
    </div>
  </div>
</div>
<!-- row_validator -->
<div class="col-sm-6">
  <div class="form-group row">
    <label class="col-sm-4 col-form-label text-sm-right">
      {{trans('backoffice/data_integration/mgmt_conv_rain.label_row_validator')}}
    </label>
    <div class="col-sm-7">
      <textarea class="form-control" rows="5" id="row_validate" name="row_validate"></textarea>
    </div>
    <div class="row col-sm-1">
      <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
      data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_conv_row_validator')}}"></i>
    </div>
  </div>
</div>
<!-- End Block 1: -->
<!-- Block 2: fields  -->
<div class="col-sm-12">

  <!-- Navigate tabs fields setting -->
  <ul class="nav nav-tabs fields-tabs">
    <li class="add-tab nav-item"><a href="javascript:void(0)" class="add-fields nav-link"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
  </ul>
  <!-- End Navigate tabs fields setting -->

  <!-- Tab content fields setting -->
  <div class="tab-content fields-tab-content">

  </div>
  <!-- End Tab content fields setting -->

</div>
<!-- End Block 2: fields Setting-->

<!-- Button Save and Cancel -->
<div class="col-sm-12 text-center">
  <button type="button" class="btn btn-success" id="btn-save">{{trans('master.btn_save')}}</button>
  <button type="button" class="btn btn-danger" id="btn-cancel">{{trans('master.btn_cancel')}}</button>
</div>
<!-- End Button Save and Cancel -->
</form>

<!-- Form fields data in tab pane Input -->
<div class="tab-pane hidden" id="pane-fields-master">
  <div class="row">
  <!-- name -->
  <div class="col-sm-6">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_name')}}
      </label>
      <div class="col-sm-7">
        <select id="col_name" class="form-control" name="name" data-key="name">
          <option value=""></option>
        </select>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_name')}}"></i>
      </div>
    </div>
  </div>
  <!-- transform_method -->
  <div class="col-sm-6">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_transform_method')}}
      </label>
      <div class="col-sm-7">
        <select class="form-control" id="transform_method" name="transform_method" data-key="transform_method">
        </select>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_transform_method')}}"></i>
      </div>
    </div>
  </div>
  <!-- type -->
  <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_constant transform_method_ctrl_evaluate transform_method_ctrl_mapping transform_method_ctrl_datetime transform_method_ctrl_">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_type')}}
      </label>
      <div class="col-sm-7">
        <select class="form-control" id="type" name="type" data-key="type">
        </select>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_type')}}"></i>
      </div>
    </div>
  </div>
  <!-- input_field -->
  <div class="col-sm-6 transform_method_ctrl transform_method_ctrl transform_method_ctrl_mapping transform_method_ctrl_datetime transform_method_ctrl_">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_input_field')}}
      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control"  name="input_field" data-key="input_field">
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_input_field')}}"></i>
      </div>
    </div>
  </div>
  <!-- transform_params -->
  <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_constant transform_method_ctrl_evaluate" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_transform_param')}}
      </label>
      <div class="col-sm-7">
        <input class="form-control" name="transform_params" data-key="transform_param"/>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_transform_param')}}"></i>
      </div>
    </div>
  </div>
  <!-- table -->
  <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_table')}}
      </label>
      <div class="col-sm-7">
        <select class="form-control" id="table" name="table" data-key="table">
        </select>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_table')}}"></i>
      </div>
    </div>
  </div>
  <!-- from -->
  <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_from')}}
      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control" name="from">
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_from')}}"></i>
      </div>
    </div>
  </div>
  <!-- to -->
  <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_to')}}
      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control" name="to">
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_to')}}"></i>
      </div>
    </div>
  </div>
  <!-- add_missing -->
  <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_add_missing')}}
      </label>
      <div class="col-sm-7">
        <select class="form-control" id="add_missing" name="add_missing" data-key="add_missing">
        </select>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_add_missing')}}"></i>
      </div>
    </div>
  </div>
  <!-- missing_data -->
  <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_missing_data')}}
      </label>
      <div class="col-sm-7">
        <input class="form-control" name="missing_data" data-key="missing_data"/>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_missing_data')}}"></i>
      </div>
    </div>
  </div>
  <!-- input_format -->
  <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_datetime" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_input_format')}}
      </label>
      <div class="col-sm-7">
        <select id="input_format_date" class="form-control" name="input_format" data-key="input_format">
          <option value="custom">{{trans('backoffice/data_integration/mgmt_conv_rain.label_custom_date')}}</option>

        </select>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="    {{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_input_format')}}"></i>
      </div>
    </div>
    <div class="form-group row frm-custom-date">
      <label class="col-sm-4 col-form-label text-sm-right">
        {{trans('backoffice/data_integration/mgmt_conv_rain.label_custom_date')}}
      </label>
      <div class="col-sm-7">
        <input type="text" id="date_fotmat" class="form-control" name="input_format" data-key="input_format"/>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="    {{trans('backoffice/data_integration/mgmt_conv_rain.tooltip_input_input_format')}}"></i>
      </div>
    </div>
  </div>
  </div>
</div>
<!-- End form input data in tab input -->
<!-- modal confirm delete -->
<div class="bootbox modal fade" id="modal-delete" tabindex="-1" role="document" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">{{trans('backoffice/data_integration/mgmt_conv_rain.modal_delelte_title')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-danger" data-dismiss="modal" ><i class="fa fa-times"></i>{{trans('master.btn_cancel')}}</button>
        <button type="button" class="btn btn-success" id="btn-confirm"><i class="fa fa-check"></i>{{trans('master.btn_confirm')}}</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="dlgDatajson" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">{{ trans('backoffice/data_integration/mgmt_conv_rain.title_display_json') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <form role="form" id="dlgDatajson-form" class="form-row">
          <input type="hidden" id="dlgDatajson-id" name="id" />

          <div class="form-group row col-sm-12">
            <label for="dlgDatajson-code"  class="col-form-label text-sm-right col-sm-3" >{{trans('backoffice/data_integration/mgmt_conv_rain.label_convert_setting_json')}}:</label>
            <div class="col-sm-9">
              <textarea id="dlgDatajson-conv-json" readonly rows="5" class="form-control" data-parsley-required></textarea>
            </div>
          </div>

          <div class="form-group row col-sm-12">
            <label for="dlgDatajson-code"  class="col-form-label text-sm-right col-sm-3" >{{trans('backoffice/data_integration/mgmt_conv_rain.label_import_setting_json')}}:</label>
            <div class="col-sm-9">
              <textarea id="dlgDatajson-import-json" readonly rows="5" class="form-control" data-parsley-required></textarea>
            </div>
          </div>

          <div class="form-group row col-sm-12">
            <label for="dlgDatajson-code"  class="col-form-label text-sm-right col-sm-3" >{{trans('backoffice/data_integration/mgmt_conv_rain.label_lookup_setting_json')}}:</label>
            <div class="col-sm-9">
              <textarea id="dlgDatajson-lookup-json" readonly rows="5" class="form-control" data-parsley-required></textarea>
            </div>
          </div>

          <div class="form-group row col-sm-12">
            <label for="dlgDatajson-code"  class="col-form-label text-sm-right col-sm-3" >{{trans('backoffice/data_integration/mgmt_conv_rain.label_import_table_json')}}:</label>
            <div class="col-sm-9">
              <textarea id="dlgDatajson-im-tbl-sjon" readonly rows="5" class="form-control" data-parsley-required></textarea>
            </div>
          </div>

          <div class="clearfix"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('backoffice/data_integration/mgmt_conv_rain.btn_close')}}</button>
      </div>
    </div>

  </div>
</div>


<script>
var msg_save_suc = '{{trans("master.msg_save_suc")}}';
var btn_add_conv = '{{trans("backoffice/data_integration/mgmt_conv_rain.btn_add_conv")}}';
var modal_delete_title = '{!!trans("backoffice/data_integration/mgmt_conv_rain.modal_delete_title")!!}';
</script>
@stop


{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2','JsonHelper') !!}

{!! $view->resource('js','js/backoffice/data_integration/mgmt_conv_rain.js') !!}
{!! $view->resource('js','js/backoffice/data_integration/data_integration.js') !!}
