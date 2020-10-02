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
			'href' => $l->httpUrl("backoffice/data_integration/mgmt_script_rain"),
			'text' => trans('backoffice/data_integration/mgmt_script_rain.main_menu_name'),
		),
		array(
			'text' => trans('backoffice/data_integration/mgmt_script_rain.page_name'),
		),
	)
);
$view->option('page_name', trans('backoffice/data_integration/mgmt_script_rain.page_name'));
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
          <option value="normal" selected>{{trans('backoffice/data_integration/mgmt_conv_rain.label_is_dis_migrate') }}</option>
        </select>
      </div>
    </div>
    <!-- Button Previews -->
    <!-- <button type="button" class="btn btn-primary" id="btn_display">{{ trans('/master.btn_display') }}</button> -->
  </form>
  <div class="clearfix"></div>
</div>
<!-- end search -->


<div class="data-filters color-red">
  <p><b>{{ trans('/master.remark') }}</b> {{ trans('/master.rmk_mgmscript') }}</p>
  <ol>
    <li>{{ trans('/master.list_1') }}</li>
    <li>{{ trans('/master.list_2') }}</li>
    <li>{{ trans('/master.list_3') }}</li>
  </ol>
</div>

<!-- data table -->
<div class="table-responsive">
    <table id="tbl" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{trans('backoffice/data_integration/mgmt_script_rain.download_id')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_script_rain.download_name')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_script_rain.download_method')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_script_rain.description')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_script_rain.status_cron')}}</th>
                <th>คำสั่งบนเครื่อง convertor</th>
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
  <input id="download_id" type="text" class="form-control" style="display:none"/>
    <!-- Block 1: -->
    <!-- download_name -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="download_name" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_download_name')}}
            </label>
            <div class="col-sm-7">
              <input id="download_name" class="form-control" data-parsley-required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_download_name')}}"/>
            </div>
            <div class="row col-sm-1">
              <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
              data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_download_name')}}"></i>
            </div>
        </div>
    </div>

    <!-- <div class="col-sm-8 form-group">
      <label class="col-form-label text-sm-right col-sm-2">
          <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_host_url')}}
      </label>
      <div class="col-sm-9">
        <input name="detail_host" type="text" class="form-control detail_host" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_detail_host_url')}}">
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltrip_host_url')}}"></i>
      </div>
    </div> -->

    <div class="col-sm-6">
        <div class="form-group row">
            <label for="description" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_description')}}
            </label>
            <div class="col-sm-7">
                <input id="description" class="form-control" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_description')}}"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_description')}}"></i>
            </div>
        </div>
    </div>
    <!-- agent_user_id -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="agent_user" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_agent_user')}}
            </label>
            <div class="col-sm-7">
                <select id="agent_user" class="form-control select-search" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_agent_user')}}">
                  <!-- <option value="">{{ trans('/master.msg_filter_required') }}</option> -->
                </select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_agent_user')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 ">
        <div class="form-group row">
            <label for="data_folder" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_data_folder')}}
            </label>
            <div class="col-sm-7">
                <input id="data_folder" class="form-control"  placeholder="download/bma/canal" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_data_folder')}}"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_data_folder')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 ">
        <div class="form-group row">
            <label for="download_method" class="col-sm-4 col-form-label text-sm-right">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_download_method')}}
            </label>
            <div class="col-sm-7">
                <select id="download_method" class="form-control" name="download_method" data-key="" data-parsley-required
                data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_download_method')}}">
                  <!-- <option value="">{{ trans('/master.msg_filter_required') }}</option> -->
                </select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_download_method')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 dl_script_ctrl dl_script_ctrl_collector" style="display: none;">
        <div class="form-group row">
            <label for="archive_folder" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_archive_folder')}}
            </label>
            <div class="col-sm-7">
                <input id="archive_folder" class="form-control"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_archive_folder')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 dl_script_ctrl dl_script_ctrl_collector" style="display: none;">
        <div class="form-group row">
            <label for="result_file" class="col-form-label text-sm-right col-sm-4">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_result_file')}}
            </label>
            <div class="col-sm-7">
                <input id="result_file" class="form-control" value="filelist.json"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_result_file')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group row form-crontab">
            <label for="crontab_setting" class="col-sm-4 col-form-label text-sm-right">
              <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_crontab_setting')}}
            </label>
            <div class="col-sm-7">
              <input type="text" id="crontab_setting" class="form-control" placeholder="0 0 * * *"
              required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_crontab_setting')}}">
              </input>
            </div>
            <div class="row col-sm-1">
              <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
              data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_crontab_setting')}}"></i>
            </div>
        </div>

        <!--<div class="col-sm-11 switch">
          <input id="cron-switch" type="checkbox" data-toggle="toggle" value="true">
        </div>-->
    </div>
	<div class="col-sm-6">
        <div class="form-group row form-max_process">
            <label for="max_process" class="col-sm-4 col-form-label text-sm-right">
              {{trans('backoffice/data_integration/mgmt_script_rain.label_max_process')}}
            </label>
            <div class="col-sm-7">
              <input name="max_process" id="max_process" class="form-control" type="number" min="1" max="10" value="10"
              data-parsley-error-message="{{ trans('/master.msg_err_value_between_1_10') }}"/>

            </div>
            <div class="row col-sm-1">
              <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
              data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_max_process')}}"></i>
            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="node" class="col-sm-4 col-form-label text-sm-right">{{trans('backoffice/data_integration/mgmt_script.label_node')}}</label>
            <div class="col-sm-7">
            <select name="node" id="node" class="form-control"></select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script.tooltip_node')}}"></i>
            </div>
        </div>
    </div>
	<div class="col-sm-6">
        <div class="form-group row form-cron-switch">
           <div class="col-sm-11 switch">
				<input id="cron-switch" type="checkbox" data-toggle="toggle" value="true">
			</div>
        </div>
    </div>

    <!-- End Block 1: -->
    <!-- Block 2: source_option  -->
    <div class="col-sm-12">

        <!-- Navigate tabs source_option setting -->
        <ul class="nav nav-tabs source_option-tabs">
            <li class="add-tab nav-item"><a href="javascript:void(0)" class="add-source_option nav-link"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
        </ul>
        <!-- End Navigate tabs source_option setting -->

        <!-- Tab content source_option setting -->
        <div class="tab-content source_option-tab-content">

        </div>
        <!-- End Tab content source_option setting -->

    </div>
    <!-- End Block 2: source_option Setting-->
    <div class="clearfix"></div>



    <!-- Button Save and Cancel -->


    <div class="col-sm-12 text-center">
        <button type="button" class="btn btn-success" id="btn-save">แก้ไข</button>
        <button type="button" class="btn btn-danger" id="btn-cancel">{{trans('master.btn_cancel')}}</button>
    </div>


    <!-- End Button Save and Cancel -->


</form>
<!-- tab pane source_option -->
<div role="tabpanel" class="tab-pane hidden" id="pane-source_option-master">
    <div class="row">
    <div class="col-sm-6 ">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_name')}}
            </label>
            <div class="col-sm-7">
                <input name="name" class="form-control" type="text" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_name')}}"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_name')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 ">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_retry_count')}}
            </label>
            <div class="col-sm-7">
                <input name="retry_count" class="form-control" type="number" min="0" max="10" value="3"
                required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_retry_count')}}"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_retry_count')}}"></i>
            </div>
        </div>
    </div>

    <div class="container col-sm-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs detail-tabs">
            <li class="add-tab nav-item" style="display: none;"><a href="javascript:void(0)" class="add-detail nav-link" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
        </ul>

        <div class="tab-content detail-tab-content">

        </div>

    </div>
    </div>
</div>
<!-- tab pane detail <-->
<div role="tabpanel" class="tab-pane hidden" id="pane-detail-master">
    <div class="row">
    <div class="col-sm-6">
        <div class="form-group row">

            <label class="col-form-label text-sm-right col-sm-3">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_host')}}
            </label>
            <div class="col-sm-8">
              <select name="download_driver" id="download_driver" class="form-control download_driver">
                <!-- <option value="pqtransform://">pqtransform://</option>
                <option value="pqmigrate://">pqmigrate://</option>
                <option value="orther">orther</option> -->
              </select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltrip_label_host')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-form-label text-sm-right col-sm-3">
            <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_host_url')}}
        </label>
        <div class="col-sm-8">
          <input name="detail_host" type="text" class="form-control detail_host" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_detail_host_url')}}">
        </div>
        <div class="row col-sm-1">
            <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
            data-placement="left" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltrip_host_url')}}"></i>
        </div>
      </div>
    </div>

    <div class="col-sm-6 download_driver_ctrl download_driver_ctrl_ftp download_driver_ctrl_sftp" style="display: none;">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_username')}}:
            </label>
            <div class="col-sm-7">
                <input class="form-control" name="username" type="text"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_username')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 download_driver_ctrl download_driver_ctrl_ftp download_driver_ctrl_sftp" style="display: none;">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_password')}}:
            </label>
            <div class="col-sm-7">
                <input class="form-control" name="password" type="text"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_password')}}"></i>
            </div>
        </div>
    </div>
    </div>
    <!-- ############################################################### -->

    <div class="pqmigrate row">
  
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_table_name')}}:
              </label>
              <div class="col-sm-8">
                <input type="text" name="table_name" id="table_name" class="form-control table_name"/>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_table_name')}}"></i>
              </div>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="form-group row">
              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_partition_field')}}:
              </label>
              <div class="col-sm-8">
                <input type="text" name="partition_field" id="partition_field" class="form-control partition_field"></select>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_partition_field')}}"></i>
              </div>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_is_dateonly_pf')}}:
              </label>
              <div class="col-sm-8">
                <select name="is_dateonly_pf" id="is_dateonly_pf" class="form-control is_dateonly_pf">
                  <option value="true">true</option>
                  <option value="false">false</option>
                </select>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_is_dateonly_pf')}}"></i>
              </div>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_last_update_field')}}:
              </label>
              <div class="col-sm-8">
                <input type="text" name="last_update_field" id="last_update_field" class="form-control last_update_field"/>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_last_update_field')}}"></i>
              </div>
          </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_is_hot_migration_mode')}}:
              </label>
              <div class="col-sm-8">
                <select type="text" name="is_hot_migration_mode" id="is_hot_migration_mode" class="form-control is_hot_migration_mode">
                  <option value="true">true</option>
                  <option value="false">false</option>
                </select>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_is_hot_migration_mode')}}"></i>
              </div>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_data_limit_hours')}}:
              </label>
              <div class="col-sm-8">
                <input type="number" value="1" min="0" name="data_limit_hours" id="data_limit_hours" class="form-control data_limit_hours"/>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_data_limit_hours')}}"></i>
              </div>
          </div>
      </div>

    </div>

    <div class="pqtransform row" style="display:none">
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_output_filtname')}}:
              </label>
              <div class="col-sm-8">
                <input type="text" name="output_filtname" id="output_filtname" class="form-control output_filtname"></select>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_output_filtname')}}"></i>
              </div>
          </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="div-sql row">
        <div class="col-sm-9">
        <div class="form-group row">

            <label class="col-form-label text-sm-right col-sm-2">
              {{trans('backoffice/data_integration/mgmt_script_rain.label_sql')}}:
            </label>
            <div class="col-sm-9">
              <textarea type="text" name="sql" rows="15" id="sql" class="form-control sql"></textarea>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_sql')}}"></i>
            </div>
        </div>
        </div>

    </div>
    <!-- ############################################################### -->

    <div class="container col-sm-12">
        <!-- Nav tabs -->
        <!-- <ul class="nav nav-tabs file-tabs">
            <li class="add-tab nav-item"><a href="javascript:void(0)" class="add-file nav-link" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
        </ul> -->

        <!-- Content in tabs Convert/Import -->
        <div class="tab-content file-tab-content">

        </div>
        <!-- End Content in tabs Convert/Import -->
    </div>
    </div>
</div>
<!-- tab pane files -->
<div role="tabpanel" class="tab-pane hidden" id="pane-file-master">
    <div class="row">
    <div class="col-sm-6 no_driver">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_source')}}:
            </label>
            <div class="col-sm-7">
                <input class="form-control" name="source" type="text" />
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_source')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 no_driver">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_destination')}}:
            </label>
            <div class="col-sm-7">
                <input class="form-control" name="destination" type="text"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_destination')}}"></i>
            </div>
        </div>
    </div>
    </div>
</div>






<!-- modal confirm delete -->
<div class="bootbox modal fade" id="modal-delete" tabindex="-1" role="document" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{trans('backoffice/data_integration/mgmt_script_rain.modal_delelte_title')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
            </div>
            <div class="modal-footer">
            
                <button type="button" class="btn btn-danger" data-dismiss="modal" ><i class="fa fa-times"></i>{{trans('master.btn_cancel')}}</button>
                <button type="button" class="btn btn-success" id="btn-delete"><i class="fa fa-check"></i>{{trans('master.btn_confirm')}}</button>
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
            <label for="dlgDatajson-code"  class="col-form-label text-sm-right col-sm-3" >{{trans('backoffice/data_integration/mgmt_conv_rain.label_download_setting_json')}}:</label>
              <div class="col-sm-9">
                <textarea id="dlgDatajson-down-json" rows="5" class="form-control" data-parsley-required></textarea>
            </div>
          </div>

          <div class="clearfix"></div>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('backoffice/data_integration/mgmt_conv_rain.btn_close') }}</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal Show Data-->
<div id="ShowData" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
      <form class="form-row hidden" id="mgmt-data-form" data-parsley-validate>
  <input id="download_id" type="text" class="form-control" style="display:none"/>
    <!-- Block 1: -->
    <!-- download_name -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="download_name" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_download_name')}}
            </label>
            <div class="col-sm-7">
              <input id="download_name" class="form-control" data-parsley-required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_download_name')}}"/>
            </div>
            <div class="row col-sm-1">
              <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
              data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_download_name')}}"></i>
            </div>
        </div>
    </div>

    <!-- <div class="col-sm-8 form-group">
      <label class="col-form-label text-sm-right col-sm-2">
          <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_host_url')}}
      </label>
      <div class="col-sm-9">
        <input name="detail_host" type="text" class="form-control detail_host" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_detail_host_url')}}">
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltrip_host_url')}}"></i>
      </div>
    </div> -->

    <div class="col-sm-6">
        <div class="form-group row">
            <label for="description" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_description')}}
            </label>
            <div class="col-sm-7">
                <input id="description" class="form-control" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_description')}}"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_description')}}"></i>
            </div>
        </div>
    </div>
    <!-- agent_user_id -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="agent_user_data" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_agent_user')}}
            </label>
            <div class="col-sm-7">
                <select id="agent_user_data" class="form-control select-search" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_agent_user')}}">
                  <!-- <option value="">{{ trans('/master.msg_filter_required') }}</option> -->
                </select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_agent_user')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 ">
        <div class="form-group row">
            <label for="data_folder" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_data_folder')}}
            </label>
            <div class="col-sm-7">
                <input id="data_folder" class="form-control"  placeholder="download/bma/canal" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_data_folder')}}"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_data_folder')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 ">
        <div class="form-group row">
            <label for="download_method_data" class="col-sm-4 col-form-label text-sm-right">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_download_method')}}
            </label>
            <div class="col-sm-7">
                <select id="download_method_data" class="form-control" name="download_method_data" data-key="" data-parsley-required
                data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_download_method')}}">
                  <!-- <option value="">{{ trans('/master.msg_filter_required') }}</option> -->
                </select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_download_method')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 dl_script_ctrl dl_script_ctrl_collector" style="display: none;">
        <div class="form-group row">
            <label for="archive_folder" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_archive_folder')}}
            </label>
            <div class="col-sm-7">
                <input id="archive_folder" class="form-control"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_archive_folder')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 dl_script_ctrl dl_script_ctrl_collector" style="display: none;">
        <div class="form-group row">
            <label for="result_file" class="col-form-label text-sm-right col-sm-4">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_result_file')}}
            </label>
            <div class="col-sm-7">
                <input id="result_file" class="form-control" value="filelist.json"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_result_file')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group row form-crontab">
            <label for="crontab_setting" class="col-sm-4 col-form-label text-sm-right">
              <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_crontab_setting')}}
            </label>
            <div class="col-sm-7">
              <input type="text" id="crontab_setting" class="form-control" placeholder="0 0 * * *"
              required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_crontab_setting')}}">
              </input>
            </div>
            <div class="row col-sm-1">
              <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
              data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_crontab_setting')}}"></i>
            </div>
        </div>

        <!--<div class="col-sm-11 switch">
          <input id="cron-switch" type="checkbox" data-toggle="toggle" value="true">
        </div>-->
    </div>
	<div class="col-sm-6">
        <div class="form-group row form-max_process">
            <label for="max_process" class="col-sm-4 col-form-label text-sm-right">
              {{trans('backoffice/data_integration/mgmt_script_rain.label_max_process')}}
            </label>
            <div class="col-sm-7">
              <input name="max_process" id="max_process" class="form-control" type="number" min="1" max="10" value="10"
              data-parsley-error-message="{{ trans('/master.msg_err_value_between_1_10') }}"/>

            </div>
            <div class="row col-sm-1">
              <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
              data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_max_process')}}"></i>
            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="node_data" class="col-sm-4 col-form-label text-sm-right">{{trans('backoffice/data_integration/mgmt_script.label_node')}}</label>
            <div class="col-sm-7">
            <select name="node_data" id="node_data" class="form-control"></select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script.tooltip_node')}}"></i>
            </div>
        </div>
    </div>
	<div class="col-sm-6">
        <div class="form-group row form-cron-switch">
           <div class="col-sm-11 switch">
				<input id="cron-switch" type="checkbox" data-toggle="toggle" value="true">
			</div>
        </div>
    </div>

    <!-- End Block 1: -->
    <!-- Block 2: source_option  -->
    <div class="col-sm-12">

        <!-- Navigate tabs source_option setting -->
        <ul class="nav nav-tabs source_option-tabs">
            <li class="add-tab nav-item"><a href="javascript:void(0)" class="add-source_option nav-link"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
        </ul>
        <!-- End Navigate tabs source_option setting -->

        <!-- Tab content source_option setting -->
        <div class="tab-content source_option-tab-content">

        </div>
        <!-- End Tab content source_option setting -->

    </div>
    <!-- End Block 2: source_option Setting-->
    <div class="clearfix"></div>



    <!-- Button Save and Cancel -->

<!-- 
    <div class="col-sm-12 text-center">
        <button type="button" class="btn btn-success" id="btn-save">แก้ไข</button>
        <button type="button" class="btn btn-danger" id="btn-cancel">{{trans('master.btn_cancel')}}</button>
    </div> -->


    <!-- End Button Save and Cancel -->


</form>
<div role="tabpanel" class="tab-pane hidden" id="pane-source_option-master">
    <div class="row">
    <div class="col-sm-6 ">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_name')}}
            </label>
            <div class="col-sm-7">
                <input name="name" class="form-control" type="text" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_name')}}"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_name')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 ">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_retry_count')}}
            </label>
            <div class="col-sm-7">
                <input name="retry_count" class="form-control" type="number" min="0" max="10" value="3"
                required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_retry_count')}}"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_retry_count')}}"></i>
            </div>
        </div>
    </div>

    <div class="container col-sm-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs detail-tabs">
            <li class="add-tab nav-item" style="display: none;"><a href="javascript:void(0)" class="add-detail nav-link" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
        </ul>

        <div class="tab-content detail-tab-content">

        </div>

    </div>
    </div>
</div>
<!-- tab pane detail <-->
<div role="tabpanel" class="tab-pane hidden" id="pane-detail-master">
    <div class="row">
    <div class="col-sm-6">
        <div class="form-group row">

            <label class="col-form-label text-sm-right col-sm-3">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_host')}}
            </label>
            <div class="col-sm-8">
              <select name="download_driver" id="download_driver" class="form-control download_driver">
                <!-- <option value="pqtransform://">pqtransform://</option>
                <option value="pqmigrate://">pqmigrate://</option>
                <option value="orther">orther</option> -->
              </select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltrip_label_host')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-form-label text-sm-right col-sm-3">
            <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_host_url')}}
        </label>
        <div class="col-sm-8">
          <input name="detail_host" type="text" class="form-control detail_host" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script_rain.parsley_detail_host_url')}}">
        </div>
        <div class="row col-sm-1">
            <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
            data-placement="left" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltrip_host_url')}}"></i>
        </div>
      </div>
    </div>

    <div class="col-sm-6 download_driver_ctrl download_driver_ctrl_ftp download_driver_ctrl_sftp" style="display: none;">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_username')}}:
            </label>
            <div class="col-sm-7">
                <input class="form-control" name="username" type="text"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_username')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 download_driver_ctrl download_driver_ctrl_ftp download_driver_ctrl_sftp" style="display: none;">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script_rain.label_password')}}:
            </label>
            <div class="col-sm-7">
                <input class="form-control" name="password" type="text"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_password')}}"></i>
            </div>
        </div>
    </div>
    </div>
    <!-- ############################################################### -->

    <div class="pqmigrate row">
  
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_table_name')}}:
              </label>
              <div class="col-sm-8">
                <input type="text" name="table_name_data" id="table_name_data" class="form-control table_name_data"/>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_table_name')}}"></i>
              </div>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="form-group row">
              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_partition_field')}}:
              </label>
              <div class="col-sm-8">
                <input type="text" name="partition_field" id="partition_field" class="form-control partition_field"></select>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_partition_field')}}"></i>
              </div>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_is_dateonly_pf')}}:
              </label>
              <div class="col-sm-8">
                <select name="is_dateonly_pf" id="is_dateonly_pf" class="form-control is_dateonly_pf">
                  <option value="true">true</option>
                  <option value="false">false</option>
                </select>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_is_dateonly_pf')}}"></i>
              </div>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_last_update_field')}}:
              </label>
              <div class="col-sm-8">
                <input type="text" name="last_update_field" id="last_update_field" class="form-control last_update_field"/>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_last_update_field')}}"></i>
              </div>
          </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_is_hot_migration_mode')}}:
              </label>
              <div class="col-sm-8">
                <select type="text" name="is_hot_migration_mode" id="is_hot_migration_mode" class="form-control is_hot_migration_mode">
                  <option value="true">true</option>
                  <option value="false">false</option>
                </select>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_is_hot_migration_mode')}}"></i>
              </div>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_data_limit_hours')}}:
              </label>
              <div class="col-sm-8">
                <input type="number" value="1" min="0" name="data_limit_hours" id="data_limit_hours" class="form-control data_limit_hours"/>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_data_limit_hours')}}"></i>
              </div>
          </div>
      </div>

    </div>

    <div class="pqtransform row" style="display:none">
      <div class="col-sm-6">
          <div class="form-group row">

              <label class="col-form-label text-sm-right col-sm-3">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_output_filtname')}}:
              </label>
              <div class="col-sm-8">
                <input type="text" name="output_filtname" id="output_filtname" class="form-control output_filtname"></select>
              </div>
              <div class="row col-sm-1">
                  <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                  data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_output_filtname')}}"></i>
              </div>
          </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="div-sql row">
        <div class="col-sm-9">
        <div class="form-group row">

            <label class="col-form-label text-sm-right col-sm-2">
              {{trans('backoffice/data_integration/mgmt_script_rain.label_sql')}}:
            </label>
            <div class="col-sm-9">
              <textarea type="text" name="sql" rows="15" id="sql" class="form-control sql"></textarea>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_sql')}}"></i>
            </div>
        </div>
        </div>

    </div>
    <!-- ############################################################### -->

    <div class="container col-sm-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs file-tabs">
            <li class="add-tab nav-item"><a href="javascript:void(0)" class="add-file nav-link" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
        </ul>

        <!-- Content in tabs Convert/Import -->
        <div class="tab-content file-tab-content">

        </div>
        <!-- End Content in tabs Convert/Import -->
    </div>
    </div>
</div>
<!-- tab pane files -->
<div role="tabpanel" class="tab-pane hidden" id="pane-file-master">
    <div class="row">
    <div class="col-sm-6 no_driver">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_source')}}:
            </label>
            <div class="col-sm-7">
                <input class="form-control" name="source" type="text" />
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_source')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 no_driver">
        <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-4">
                {{trans('backoffice/data_integration/mgmt_script_rain.label_destination')}}:
            </label>
            <div class="col-sm-7">
                <input class="form-control" name="destination" type="text"/>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script_rain.tooltip_destination')}}"></i>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('backoffice/data_integration/mgmt_conv_rain.btn_close') }}</button>
      </div>
      </div>
      
    </div>

  </div>
</div>

<style>
 {
     .disabled {
    pointer-events: none;
    opacity: 0.6;
}
</style>

<script>
var msg_save_suc = '{{trans("master.msg_save_suc")}}';
var msg_delete_suc = '{{trans("master.msg_delete_suc")}}';
var btn_close = '{{trans("master.btn_close")}}';
var btn_add_script = '{{trans("backoffice/data_integration/mgmt_script_rain.btn_add_script")}}';
var modal_delete_title = '{!!trans("backoffice/data_integration/mgmt_script_rain.modal_delete_title")!!}';
var status_enable = '{!!trans("backoffice/data_integration/mgmt_script.status_enable")!!}';
var status_disable = '{!!trans("backoffice/data_integration/mgmt_script.status_disable")!!}';
</script>

@stop


{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2','JsonHelper') !!}

{!! $view->resource('js','js/backoffice/data_integration/mgmt_script_rain.js') !!}
<!-- {!! $view->resource('js','js/backoffice/data_integration/data_integration.js') !!} -->
<!-- {!! $view->resource('js','js/bootstrap_toggle.js') !!} -->
