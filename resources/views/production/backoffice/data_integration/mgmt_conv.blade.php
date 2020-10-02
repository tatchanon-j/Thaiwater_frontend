@section('extra_head')

@extends('backoffice/layout/master')

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option(
	'breadcrumb',
	array(
		array(
			'href' => $l->httpUrl("backoffice/data_integration/mgmt_conv"),
			'text' => trans('backoffice/data_integration/mgmt_script.main_menu_name'),
		),
		array(
			'text' => trans('backoffice/data_integration/mgmt_conv.page_name'),
		),
	)
);
$view->option('page_name', trans('backoffice/data_integration/mgmt_conv.page_name'));
$view->option('js-init', 'mgmt.init(group_Translator)');
?>
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2','JsonHelper') !!}

{!! $view->resource('js','js/backoffice/data_integration/mgmt_conv.js') !!}
{!! $view->resource('js','js/backoffice/data_integration/data_integration.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_integration/mgmt_script.css') !!}

@stop

@section('content')
<h5 class="color-red text-url">เมื่อมีการเพิ่ม table ใหม่ต้องไปเพิ่ม mapping ในไฟล์
    api\thaiwater30\model\metadata\map.go ด้วยเพื่อให้ระบบให้บริการข้อมูลดึงมาใช้ได้</h5>

<div class="data-filters">
    <a style="text-decoration: underline;" href="{!! $view->buildResourceSrc('pdf/Custom_Func_V2.0.pdf') !!}"
        target="blank">Custom function Manual</a>
</div>
<!-- data table -->
<div class="table-responsive">
    <table id="tbl" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{trans('backoffice/data_integration/mgmt_conv.conv_id')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_conv.download_id')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_conv.conv_name')}}</th>
                <th>Table Name</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<!-- end data table -->



<form class="form-row hidden" id="mgmt-script-form" data-parsley-validate>
    <!-- Block 1: -->
    <!-- download_name -->
    <div class="col-sm-6 ">
        <div class="form-group row">
            <label for="download_name" class="col-sm-4 col-form-label text-sm-right">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_download_name')}}
            </label>
            <div class="col-sm-7">
                <select id="download_name" class="select-search" name="download_name" disbled></select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_download_name')}}"></i>
            </div>
        </div>
    </div>
    <!-- agent_user_id -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="agent_user" class="col-sm-4 col-form-label text-sm-right">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_agent_user')}}
            </label>
            <div class="col-sm-7">
                <select id="agent_user" class="form-control select-search" disbled></select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_agent_user')}}"></i>
            </div>
        </div>
    </div>
    <!-- convert_method -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_convert_method')}}
            </label>
            <div class="col-sm-7">
                <select class="form-control select-search" id="convert_method" name="convert_method"
                    data-key="con-script" required disbled></select>
                <p class="text-muted bg-danger" style="font-style: italic">
                    ถ้ามี qc ต้องใช้ cv-std เท่านั้น
                </p>
                <p class="text-muted text-url" style="font-style: italic;">ตาราง api.system_setting
                    name=bof.DataIntegration.ci.ConvertScript
                </p>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_convert_method')}}"></i>
            </div>
        </div>
    </div>
    <!-- import_method -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_import_method')}}
            </label>
            <div class="col-sm-7">
                <select class="form-control select-search" id="import_method" name="import_method" data-key="imp-script"
                    required disbled></select>
                <p class="text-muted text-url" style="font-style: italic;">ตาราง api.system_setting
                    name=bof.DataIntegration.ci.ImportScript</p>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_import_method')}}"></i>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_convert_name')}}
            </label>
            <div class="col-sm-7">
                <input type="text" id="convert_name" class="form-control" name="convert_name" required
                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv.parsley_convert_name')}}"
                     />
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_data_set')}}"></i>
            </div>
        </div>
    </div>
    <!-- data_folder -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_data_folder')}}
            </label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="data_folder" name="data_folder"
                    placeholder="dataset/bma/canal" required
                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv.parsley_data_folder')}}"
                     />
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_data_folder')}}"></i>
            </div>
        </div>
    </div>
    <!-- config_name -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_config_name')}}
            </label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="config_name" name="config_name" required
                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv.parsley_config_name')}}"
                     />
                <p class="text-muted" style="font-style: italic;">ชื่อเหมือนตั้งค่า download (ชื่อการดาวน์โหลดตาม host
                    ต้นทาง) ภาษาอังกฤษเท่านั้น</p>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.label_config_name')}}"></i>
            </div>
        </div>
    </div>
    <!-- input_name -->
    <div class="col-sm-6 div_input_name">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                <!--<span class="color-red">*</span>-->{{trans('backoffice/data_integration/mgmt_conv.label_input_name')}}
            </label>
            <div class="col-sm-7">
                <select class="form-control" id="input_name" name="input_name" disbled>
                    <!--required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv.parsley_input_name')}}"-->

                </select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_input_name')}}"></i>
            </div>
        </div>
    </div>
    <!-- header_row -->
    <div class="col-sm-6 input_name_ctrl div_header_row">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                {{trans('backoffice/data_integration/mgmt_conv.label_header_row')}}
            </label>
            <div class="col-sm-7">
                <input type="number" class="form-control" id="header_row" name="header_row" >
                <p class="text-muted" style="font-style: italic;">จำนวนบรรทัด header
                    ใช้ในการข้ามบรรทัดส่วนหัวสำหรับการนำเข้าข้อมูลของไฟล์ กำหนดค่าเฉพาะกรณีที่ input file ไม่ใช่ xml
                    หรือ json</p>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_header_rows')}}"></i>
            </div>
        </div>
    </div>
    <!-- data_tag -->
    <div class="col-sm-6 input_name_ctrl div_data_tag" style="display: none;">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                {{trans('backoffice/data_integration/mgmt_conv.label_data_tag')}}
            </label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="data_tag" name="data_tag" data-key="data_tag" >
                <p class="text-muted" style="font-style: italic;">ใช้ในการอ่านค่า tag ของ input file กรณีที่เป็น xml
                    หรือ json หากไม่มีชื่อ tag เริ่มต้น เช่น ตัวอย่าง <b>json ที่ได้จากเซอร์วิสของ สสนก. ให้ระบุ /</b>
                </p>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_data_tag')}}"></i>
            </div>
        </div>
    </div>
    <!-- import_table -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_import_table')}}
            </label>
            <div class="col-sm-7">
                <select class="form-control select-search" id="import_table" name="import_table" data-key="import_table"
                    disbled></select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_import_table')}}"></i>
            </div>
        </div>
    </div>
    <!-- unique_constraint -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                {{trans('backoffice/data_integration/mgmt_conv.label_unique_constraint')}}
            </label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="unique_constraint" name="unique_constraint"  />
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_unique_constraint')}}"></i>
            </div>
        </div>
    </div>
    <!-- partition_field -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                {{trans('backoffice/data_integration/mgmt_conv.label_partition_field')}}
            </label>
            <div class="col-sm-7">
                <select class="form-control" id="partition_field" name="partition_field" disbled>
                    <option value="" class="default"></option>
                </select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_partition_field')}}"></i>
            </div>
        </div>
    </div>
    <!-- row_validator -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                {{trans('backoffice/data_integration/mgmt_conv.label_row_validator')}}
            </label>
            <div class="col-sm-7">
                <textarea class="form-control" rows="5" id="row_validator" name="row_validator" placeholder="ชื่อฟิลดิ์ที่ใช้ในการตั้งค่า null option เช่น '!is_nil(wl_canal,wl_canal_date)',
  '!is_nil(wl_canal) || !is_nil(wl_canal_date)"></textarea>

            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_row_validator')}}"></i>
            </div>
        </div>
    </div>
    <!-- End Block 1: -->
    <!-- Block 2: fields  -->
    <div class="col-sm-12">

        <!-- Navigate tabs fields setting -->
        <ul class="nav nav-tabs fields-tabs">
            <li class="add-tab nav-item "><a href="javascript:void(0)" class="add-fields nav-link"><i
                        class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
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




    <!-- ////////////////////////////////////////////////// -->


    <!-- End Button Save and Cancel -->
</form>

<!-- Form fields data in tab pane Input -->
<div class="tab-pane hidden" id="pane-fields-master">
    <div class="row">
        <!-- name -->
        <div class="col-sm-6">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_name')}}
                </label>
                <div class="col-sm-7">
                    <select id="col_name" class="form-control" name="name" data-key="name" disbled>
                        <option value=""></option>
                    </select>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_name')}}"></i>
                </div>
            </div>
        </div>
        <!-- transform_method -->
        <div class="col-sm-6">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_transform_method')}}
                </label>
                <div class="col-sm-7">
                    <select class="form-control" id="transform_method" name="transform_method"
                        data-key="transform_method" disbled>
                    </select>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_transform_method')}}"></i>
                </div>
            </div>
        </div>
        <!-- type -->
        <div
            class="col-sm-6 transform_method_ctrl transform_method_ctrl_constant transform_method_ctrl_evaluate transform_method_ctrl_mapping transform_method_ctrl_mappingnil transform_method_ctrl_datetime transform_method_ctrl_">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_type')}}
                </label>
                <div class="col-sm-7">
                    <select class="form-control" id="type" name="type" data-key="type" disbled>
                    </select>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_type')}}"></i>
                </div>
            </div>
        </div>
        <!-- input_field -->
        <!-- <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_constant transform_method_ctrl transform_method_ctrl_mapping transform_method_ctrl_datetime transform_method_ctrl_"> -->
        <div
            class="col-sm-6 transform_method_ctrl transform_method_ctrl transform_method_ctrl_mapping transform_method_ctrl_mappingnil transform_method_ctrl_datetime transform_method_ctrl_">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_input_field')}}
                </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="input_field" data-key="input_field">
                    <p class="text-muted" style="font-style: italic;">ชื่อคอลัมน์ของไฟล์ download ที่ใช้เป็น input ในการ
                        convert สามารถ input ได้หลาย field ถ้ามีมากกว่า 1 column ให้ใช้ , คั่นระหว่างกลาง</p>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_input_field')}}"></i>
                </div>
            </div>
        </div>
        <!-- transform_params -->
        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_constant transform_method_ctrl_evaluate"
            style="display: none;">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_transform_param')}}
                </label>
                <div class="col-sm-7">
                    <input class="form-control" name="transform_params" data-key="transform_param" />
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_transform_param')}}"></i>
                </div>
            </div>
        </div>
        <!-- table -->
        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping transform_method_ctrl_mappingnil"
            style="display: none;">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_table')}}
                </label>
                <div class="col-sm-7">
                    <select class="form-control" id="table" name="table" data-key="table">
                    </select>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_table')}}"></i>
                </div>
            </div>
        </div>
        <!-- from -->
        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping transform_method_ctrl_mappingnil"
            style="display: none;">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_from')}}
                </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="from">
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_from')}}"></i>
                </div>
            </div>
        </div>
        <!-- to -->
        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping transform_method_ctrl_mappingnil"
            style="display: none;">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_to')}}
                </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="to">
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_to')}}"></i>
                </div>
            </div>
        </div>
        <!-- add_missing -->
        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping" style="display: none;">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_add_missing')}}
                </label>
                <div class="col-sm-7">
                    <select class="form-control" id="add_missing" name="add_missing" data-key="add_missing">
                    </select>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_add_missing')}}"></i>
                </div>
            </div>
        </div>
        <!-- missing_data -->
        <div class="col-sm-12 add_missing_ctrl add_missing_true transform_method_ctrl transform_method_ctrl_mapping"
            style="display: none;">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-sm-right">
                            {{trans('backoffice/data_integration/mgmt_conv.label_from')}}
                        </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="add_missing_from">
                        </div>
                        <div class="row col-sm-1">
                            <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                                title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_from')}}"></i>
                            <a href="javascript:void(0)" class="add-missing-data">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-sm-right">
                            {{trans('backoffice/data_integration/mgmt_conv.label_missing_data')}}
                        </label>
                        <div class="col-sm-7">
                            <input class="form-control" name="missing_data" data-key="missing_data">
                        </div>
                        <div class="row col-sm-1">
                            <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                                title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_missing_data')}}"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping" style="display: none;">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-sm-right">
                {{trans('backoffice/data_integration/mgmt_conv.label_missing_data')}}
            </label>
            <div class="col-sm-7">
                <input class="form-control" name="missing_data" data-key="missing_data"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_missing_data')}}"></i>
            </div>
        </div>
    </div> -->
        <!-- input_format -->
        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_datetime" style="display: none;">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_input_format')}}
                </label>
                <div class="col-sm-7">
                    <select id="input_format_date" class="form-control" name="input_format_date"
                        data-key="input_format">
                        <option value="custom">{{trans('backoffice/data_integration/mgmt_conv.label_custom_date')}}
                        </option>

                    </select>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="    {{trans('backoffice/data_integration/mgmt_conv.tooltip_input_input_format')}}"></i>
                </div>
            </div>
            <div class="form-group row frm-custom-date">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_custom_date')}}
                </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="input_format_custom" data-key="input_format_custom" />
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="    {{trans('backoffice/data_integration/mgmt_conv.tooltip_input_input_format')}}"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End form input data in tab input -->
<!-- Form field add missing data -->
<div class="col-sm-12 add_missing_ctrl add_missing_true hidden" id="add-missing-master">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_from')}}
                </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="add_missing_from">
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_from')}}"></i>
                    <a href="javascript:void(0)">
                        <span class="rm-missing-data text-red">x</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-sm-right">
                    {{trans('backoffice/data_integration/mgmt_conv.label_missing_data')}}
                </label>
                <div class="col-sm-7">
                    <input class="form-control" name="missing_data" data-key="missing_data">
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_missing_data')}}"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End field add missing data -->
<!-- modal confirm delete -->
<div class="bootbox modal fade row" id="modal-delete" tabindex="-1" role="document">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{trans('backoffice/data_integration/mgmt_conv.modal_delelte_title')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fa fa-times"></i>{{trans('master.btn_cancel')}}</button>
                <button type="button" class="btn btn-success" id="btn-confirm"><i
                        class="fa fa-check"></i>{{trans('master.btn_confirm')}}</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="dlgDatajson" class="modal fade row" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('backoffice/data_integration/mgmt_conv.title_display_json') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form role="form" id="dlgDatajson-form" class="form-horizontal">
                    <input type="hidden" id="dlgDatajson-id" name="id" />

                    <div class="form-group row col-sm-12">
                        <label for="dlgDatajson-code"
                            class="col-form-label text-sm-right col-sm-3">{{trans('backoffice/data_integration/mgmt_conv.label_convert_setting_json')}}:</label>
                        <div class="col-sm-9">
                            <textarea id="dlgDatajson-conv-json"  rows="5" class="form-control"
                                data-parsley-required></textarea>
                        </div>
                    </div>

                    <div class="form-group row col-sm-12">
                        <label for="dlgDatajson-code"
                            class="col-form-label text-sm-right col-sm-3">{{trans('backoffice/data_integration/mgmt_conv.label_import_setting_json')}}:</label>
                        <div class="col-sm-9">
                            <textarea id="dlgDatajson-import-json"  rows="5" class="form-control"
                                data-parsley-required></textarea>
                        </div>
                    </div>

                    <div class="form-group row col-sm-12">
                        <label for="dlgDatajson-code"
                            class="col-form-label text-sm-right col-sm-3">{{trans('backoffice/data_integration/mgmt_conv.label_lookup_setting_json')}}:</label>
                        <div class="col-sm-9">
                            <textarea id="dlgDatajson-lookup-json"  rows="5" class="form-control"
                                data-parsley-required></textarea>
                        </div>
                    </div>

                    <div class="form-group row col-sm-12">
                        <label for="dlgDatajson-code"
                            class="col-form-label text-sm-right col-sm-3">{{trans('backoffice/data_integration/mgmt_conv.label_import_table_json')}}:</label>
                        <div class="col-sm-9">
                            <textarea id="dlgDatajson-im-tbl-sjon"  rows="5" class="form-control"
                                data-parsley-required></textarea>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">{{trans('backoffice/data_integration/mgmt_conv.btn_close')}}</button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-row" id="mgmt-data-form" data-parsley-validate>
                    <!-- Block 1: -->
                    <!-- download_name -->
                    <div class="col-sm-6 " >
                        <div class="form-group row" >
                            <label for="download_name_data" class="col-sm-4 col-form-label text-sm-right">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_download_name')}}
                            </label>
                            <div class="col-sm-7">
                                <select id="download_name_data" class="select-search" name="download_name_data" disbled ></select>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_download_name')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- agent_user_id -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="agent_user_data" class="col-sm-4 col-form-label text-sm-right">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_agent_user')}}
                            </label>
                            <div class="col-sm-7">
                                <select id="agent_user_data" class="form-control select-search" disbled></select>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_agent_user')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- convert_method -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_convert_method')}}
                            </label>
                            <div class="col-sm-7">
                                <select class="form-control select-search" id="convert_method_data" name="convert_method_data"
                                    data-key="con-script" required disbled></select>
                                <p class="text-muted bg-danger" style="font-style: italic">
                                    ถ้ามี qc ต้องใช้ cv-std เท่านั้น
                                </p>
                                <p class="text-muted text-url" style="font-style: italic;">ตาราง api.system_setting
                                    name=bof.DataIntegration.ci.ConvertScript
                                </p>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_convert_method')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- import_method -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_import_method')}}
                            </label>
                            <div class="col-sm-7">
                                <select class="form-control select-search" id="import_method_data" name="import_method_data"
                                    data-key="imp-script" required disbled></select>
                                <p class="text-muted text-url" style="font-style: italic;">ตาราง api.system_setting
                                    name=bof.DataIntegration.ci.ImportScript</p>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_import_method')}}"></i>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_convert_name')}}
                            </label>
                            <div class="col-sm-7">
                                <input type="text" id="convert_name" class="form-control" name="convert_name" required
                                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv.parsley_convert_name')}}"
                                     />
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_data_set')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- data_folder -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_data_folder')}}
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="data_folder" name="data_folder"
                                    placeholder="dataset/bma/canal" required
                                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv.parsley_data_folder')}}"
                                     />
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_data_folder')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- config_name -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_config_name')}}
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="config_name" name="config_name" required
                                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv.parsley_config_name')}}"
                                     />
                                <p class="text-muted" style="font-style: italic;">ชื่อเหมือนตั้งค่า download
                                    (ชื่อการดาวน์โหลดตาม host ต้นทาง) ภาษาอังกฤษเท่านั้น</p>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.label_config_name')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- input_name -->
                    <div class="col-sm-6 input_name_data">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                <!--<span class="color-red">*</span>-->{{trans('backoffice/data_integration/mgmt_conv.label_input_name')}}
                            </label>
                            <div class="col-sm-7">
                                <select class="form-control" id="input_name_data" name="input_name_data" disbled>
                                    <!--required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_conv.parsley_input_name')}}"-->

                                </select>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_input_name')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- header_row -->
                    <div class="col-sm-6 input_name_ctrl div_header_row">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                {{trans('backoffice/data_integration/mgmt_conv.label_header_row')}}
                            </label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="header_row" name="header_row" >
                                <p class="text-muted" style="font-style: italic;">จำนวนบรรทัด header
                                    ใช้ในการข้ามบรรทัดส่วนหัวสำหรับการนำเข้าข้อมูลของไฟล์ กำหนดค่าเฉพาะกรณีที่ input
                                    file ไม่ใช่ xml หรือ json</p>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_header_rows')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- data_tag -->
                    <div class="col-sm-6 input_name_ctrl div_data_tag" style="display: none;">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                {{trans('backoffice/data_integration/mgmt_conv.label_data_tag')}}
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="data_tag" name="data_tag"
                                    data-key="data_tag" >
                                <p class="text-muted" style="font-style: italic;">ใช้ในการอ่านค่า tag ของ input file
                                    กรณีที่เป็น xml หรือ json หากไม่มีชื่อ tag เริ่มต้น เช่น ตัวอย่าง <b>json
                                        ที่ได้จากเซอร์วิสของ สสนก. ให้ระบุ /</b></p>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_data_tag')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- import_table -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_conv.label_import_table')}}
                            </label>
                            <div class="col-sm-7">
                                <select class="form-control select-search" id="import_table_data" name="import_table_data"
                                    data-key="import_table_data" disbled></select>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_import_table')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- unique_constraint -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                {{trans('backoffice/data_integration/mgmt_conv.label_unique_constraint')}}
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="unique_constraint" name="unique_constraint"
                                     />
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_unique_constraint')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- partition_field -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                {{trans('backoffice/data_integration/mgmt_conv.label_partition_field')}}
                            </label>
                            <div class="col-sm-7">
                                <select class="form-control" id="partition_field" name="partition_field" disbled>
                                    <option value="" class="default"></option>
                                </select>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_partition_field')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- row_validator -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                {{trans('backoffice/data_integration/mgmt_conv.label_row_validator')}}
                            </label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="5" id="row_validator" name="row_validator"
                                    placeholder="ชื่อฟิลดิ์ที่ใช้ในการตั้งค่า null option เช่น '!is_nil(wl_canal,wl_canal_date)',
  '!is_nil(wl_canal) || !is_nil(wl_canal_date)"></textarea>

                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_conv_row_validator')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- End Block 1: -->
                    <!-- Block 2: fields  -->
                    <div class="col-sm-12">

                        <!-- Navigate tabs fields setting -->
                        <ul class="nav nav-tabs fields-tabs">
                            <li class="add-tab nav-item disbled"><a href="javascript:void(0)"
                                    class="add-fields nav-link"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                        <!-- End Navigate tabs fields setting -->

                        <!-- Tab content fields setting -->
                        <div class="tab-content fields-tab-content">

                        </div>
                        <!-- End Tab content fields setting -->

                    </div>
                    <!-- End Block 2: fields Setting-->





                    <!-- ////////////////////////////////////////////////// -->


                    <!-- End Button Save and Cancel -->
                </form>

                <!-- Form fields data in tab pane Input -->
                <div class="tab-pane" id="pane-fields-master">
                    <div class="row">
                        <!-- name -->
                        <!-- <div class="col-sm-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_name')}}
                                </label>
                                <div class="col-sm-7">
                                    <select id="col_name" class="form-control" name="name" data-key="name" disbled>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_name')}}"></i>
                                </div>
                            </div>
                        </div> -->
                        <!-- transform_method -->
                        <div class="col-sm-6" hidden>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_transform_method')}}
                                </label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="transform_method_data" name="transform_method_data"
                                        data-key="transform_method_data" disbled>
                                    </select>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_transform_method')}}"></i>
                                </div>
                            </div>
                        </div>
                        <!-- type -->
                        <div
                            class="col-sm-6 transform_method_ctrl transform_method_ctrl_constant transform_method_ctrl_evaluate transform_method_ctrl_mapping transform_method_ctrl_mappingnil transform_method_ctrl_datetime transform_method_ctrl_" hidden>
                            <div class="form-group row" >
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_type')}}
                                </label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="type_data" name="type_data" data-key="type_data" disbled>
                                    </select>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_type')}}"></i>
                                </div>
                            </div>
                        </div>
                        <!-- input_field -->
                        <!-- <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_constant transform_method_ctrl transform_method_ctrl_mapping transform_method_ctrl_datetime transform_method_ctrl_"> -->
                        <div
                            class="col-sm-6 transform_method_ctrl transform_method_ctrl transform_method_ctrl_mapping transform_method_ctrl_mappingnil transform_method_ctrl_datetime transform_method_ctrl_" hidden>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_input_field')}}
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="input_field" data-key="input_field">
                                    <p class="text-muted" style="font-style: italic;">ชื่อคอลัมน์ของไฟล์ download
                                        ที่ใช้เป็น input ในการ convert สามารถ input ได้หลาย field ถ้ามีมากกว่า 1 column
                                        ให้ใช้ , คั่นระหว่างกลาง</p>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_input_field')}}"></i>
                                </div>
                            </div>
                        </div>
                        <!-- transform_params -->
                        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_constant transform_method_ctrl_evaluate"
                            style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_transform_param')}}
                                </label>
                                <div class="col-sm-7">
                                    <input class="form-control" name="transform_params" data-key="transform_param" />
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_transform_param')}}"></i>
                                </div>
                            </div>
                        </div>
                        <!-- table -->
                        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping transform_method_ctrl_mappingnil"
                            style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_table')}}
                                </label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="table_data" name="table_data" data-key="table_data">
                                    </select>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_table')}}"></i>
                                </div>
                            </div>
                        </div>
                        <!-- from -->
                        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping transform_method_ctrl_mappingnil"
                            style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_from')}}
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="from">
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_from')}}"></i>
                                </div>
                            </div>
                        </div>
                        <!-- to -->
                        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping transform_method_ctrl_mappingnil"
                            style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_to')}}
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="to">
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_to')}}"></i>
                                </div>
                            </div>
                        </div>
                        <!-- add_missing -->
                        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_mapping"
                            style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_add_missing')}}
                                </label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="add_missing_data" name="add_missing_data"
                                        data-key="add_missing_data">
                                    </select>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_add_missing')}}"></i>
                                </div>
                            </div>
                        </div>
                        <!-- missing_data -->
                        <div class="col-sm-12 add_missing_ctrl add_missing_true transform_method_ctrl transform_method_ctrl_mapping"
                            style="display: none;">
                            <div class="row">
                                <div class="col-sm-6" hidden>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-sm-right">
                                            {{trans('backoffice/data_integration/mgmt_conv.label_from')}}
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="add_missing_from">
                                        </div>
                                        <div class="row col-sm-1">
                                            <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                                data-placement="top"
                                                title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_from')}}"></i>
                                            <a href="javascript:void(0)" class="add-missing-data" >
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" hidden>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-sm-right">
                                            {{trans('backoffice/data_integration/mgmt_conv.label_missing_data')}}
                                        </label>
                                        <div class="col-sm-7">
                                            <input class="form-control" name="missing_data" data-key="missing_data">
                                        </div>
                                        <div class="row col-sm-1">
                                            <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                                data-placement="top"
                                                title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_missing_data')}}"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- input_format -->
                        <div class="col-sm-6 transform_method_ctrl transform_method_ctrl_datetime"
                            style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_input_format')}}
                                </label>
                                <div class="col-sm-7">
                                    <select id="input_format_date_data" class="form-control" name="input_format_date_data"
                                        data-key="input_format_date_data">
                                        <option value="custom">
                                            {{trans('backoffice/data_integration/mgmt_conv.label_custom_date')}}
                                        </option>

                                    </select>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="    {{trans('backoffice/data_integration/mgmt_conv.tooltip_input_input_format')}}"></i>
                                </div>
                            </div>
                            <div class="form-group row frm-custom-date">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_custom_date')}}
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="input_format_custom"
                                        data-key="input_format_custom" />
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="    {{trans('backoffice/data_integration/mgmt_conv.tooltip_input_input_format')}}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End form input data in tab input -->
                <!-- Form field add missing data -->
                <div class="col-sm-12 add_missing_ctrl add_missing_true" id="add-missing-master" hidden>
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_from')}}
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="add_missing_from">
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_from')}}"></i>
                                    <a href="javascript:void(0)">
                                        <span class="rm-missing-data text-red">x</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" hidden>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">
                                    {{trans('backoffice/data_integration/mgmt_conv.label_missing_data')}}
                                </label>
                                <div class="col-sm-7">
                                    <input class="form-control" name="missing_data" data-key="missing_data">
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_conv.tooltip_input_missing_data')}}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default"
                    data-dismiss="modal">{{trans('backoffice/data_integration/mgmt_conv.btn_close')}}</button>            
                    </div>
        </div>
    </div>
</div>

<style>
.disbled {
    pointer-events: none;
    opacity: 0.6;
}
</style>

<script>
var msg_save_suc = '{{trans("master.msg_save_suc")}}';
var btn_add_conv = '{{trans("backoffice/data_integration/mgmt_conv.btn_add_conv")}}';
var modal_delete_title = '{!!trans("backoffice/data_integration/mgmt_conv.modal_delete_title")!!}';
</script>
@stop