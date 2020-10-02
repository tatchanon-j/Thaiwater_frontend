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
			'href' => $l->httpUrl("backoffice/data_integration/mgmt_script"),
			'text' => trans('backoffice/data_integration/mgmt_script.main_menu_name'),
		),
		array(
			'text' => trans('backoffice/data_integration/mgmt_script.page_name'),
		),
	)
);
$view->option('page_name', trans('backoffice/data_integration/mgmt_script.page_name'));
$view->option('js-init', 'mgmt.init(group_Translator)');


?>

{!! $view->resource('theme-css','css/backoffice/data_integration/mgmt_script.css') !!}

@stop

@section('content')

<!-- search -->
<div class="data-filters">
    <p><b>{{ trans('/master.remark') }}</b> {{ trans('/master.rmk_mgmscript') }}</p>
    <ol class="list-inline">
        <li class="list-inline-item">1. {{ trans('/master.list_1') }}</li>
        <li class="list-inline-item">2. {{ trans('/master.list_2') }}</li>
        <li class="list-inline-item">3. {{ trans('/master.list_3') }}</li>
    </ol>
    <a style="text-decoration: underline;" href="{!! $view->buildResourceSrc('pdf/คู่มือเชื่อมโยงฯ.pdf') !!}"
        target="blank">{{ trans('/master.data_integration_manual') }}</a>
</div>
<!-- end search -->

<!-- data table -->
<div class="table-responsive">
<!-- <label>สถานะ</label>
    <select id="selectField" style="width: 20%;padding: 8px 20px;margin: 8px 0;"><option value="">ทั้งหมด</option><option [ngValue]="true">เปิดการใช้งาน</option><option [ngValue]="false">ปิดการใช้งาน</option></select> -->

    <table id="tbl" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{trans('backoffice/data_integration/mgmt_script.download_id')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_script.download_name')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_script.download_method')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_script.description')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_script.status_cron')}}</th>
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
    <input id="download_id" type="text" class="form-control" style="display:none" />
    <!-- Block 1: -->
    <!-- download_name -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="download_name" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_download_name')}}
            </label>
            <div class="col-sm-7">
                <input id="download_name" name="download_name" class="form-control" data-parsley-required
                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_download_name')}}"
                     />
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_download_name')}}"></i>
            </div>
        </div>
    </div>

    <!-- <div class="col-sm-8 form-group">
  <label class="control-label col-sm-2">
  <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_host_url')}}
</label>
<div class="col-sm-9">
<input name="detail_host" type="text" class="form-control detail_host" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_detail_host_url')}}">
</div>
<div class="row col-sm-1">
<i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script.tooltrip_host_url')}}"></i>
</div>
</div> -->

    <div class="col-sm-6">
        <div class="form-group row">
            <label for="description" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_description')}}
            </label>
            <div class="col-sm-7">
                <input id="description" class="form-control" required
                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_description')}}"
                     />
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_description')}}"></i>
            </div>
        </div>
    </div>
    <!-- agent_user_id -->
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="agent_user" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_agent_user')}}
            </label>
            <div class="col-sm-7">
                <select id="agent_user" class="form-control select-search" required
                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_agent_user')}}"
                    >
                    <!-- <option value="">{{ trans('/master.msg_filter_required') }}</option> -->
                </select>
                <p class="text-muted" style="font-style: italic;">เพิ่มที่หน้าการจัดการ Key Access</p>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_agent_user')}}"></i>
            </div>
        </div>
    </div>

    <!-- <div class="col-sm-6 ">
  <div class="form-group row">
    <label for="data_folder" class="col-form-label text-sm-right col-sm-4">
      <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_data_folder')}}
    </label>
    <div class="col-sm-7">
      <input id="data_folder" class="form-control" placeholder="download/bma/canal" required data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_data_folder')}}"/>
    </div>
    <div class="row col-sm-1">
      <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
      data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script.tooltip_data_folder')}}"></i>
    </div>
  </div>
</div> -->

    <div class="col-sm-6 ">
        <div class="form-group row">
            <label for="data_folder" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>Prefix path
            </label>
            <div class="col-sm-7">
                <select id="agent_user" class="form-control select-search" >
                    <option value="">{{ trans('/master.msg_filter_required') }}</option>
                    <option value="1">download/bma/</option>
                    <option value="2">download/bma/</option>
                    <option value="3">download/bma/</option>
                    <option value="4">download/bma/</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="data_folder" class="col-form-label text-sm-right col-sm-4">
                <span class="color-red">*</span>Path
            </label>
            <div class="col-sm-7">
                <input id="data_folder" class="form-control" placeholder=".....Canel" required
                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_data_folder')}}"
                     />
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_data_folder')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 offset-sm-6">
        <div class="form-group row">
            <label for="download_method" class="col-form-label text-sm-right col-sm-4">
                <span
                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_download_method')}}
            </label>
            <div class="col-sm-7">
                <select id="download_method" class="form-control" name="download_method" data-key=""
                    data-parsley-required
                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_download_method')}}"
                    >
                    <!-- <option value="">{{ trans('/master.msg_filter_required') }}</option> -->
                </select>
                <p class="text-muted text-url" style="font-style: italic;">api.system_setting name
                    =bof.DataIntegration.dl.DownloadScript</p>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_download_method')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 dl_script_ctrl dl_script_ctrl_collector" style="display: none;">
        <div class="form-group row">
            <label for="archive_folder" class="col-form-label text-sm-right col-sm-4">
                <span
                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_archive_folder')}}
            </label>
            <div class="col-sm-7">
                <input id="archive_folder" class="form-control"  />
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_archive_folder')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6 dl_script_ctrl dl_script_ctrl_collector" style="display: none;">
        <div class="form-group row">
            <label for="result_file" class="col-form-label text-sm-right col-sm-4">
                {{trans('backoffice/data_integration/mgmt_script.label_result_file')}}
            </label>
            <div class="col-sm-7">
                <input id="result_file" class="form-control" value="filelist.json"  />
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_result_file')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group row form-crontab">
            <label for="crontab_setting" class="col-sm-4 col-form-label text-sm-right">
                <span
                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_crontab_setting')}}
            </label>
            <div class="input-group col-sm-7">
                <input type="text" id="crontab_setting" class="form-control" placeholder="0 0 * * *" required
                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_crontab_setting')}}"
                    >
                <ul class="text-muted" style="font-style: italic;">
                    <li>minute มีค่า 0 – 59</li>
                    <li>hour มีค่า 0 – 23</li>
                    <li>day มีค่า 1 – 31</li>
                    <li>month มีค่า 1 – 12</li>
                    <li>weekday มีค่า 0 – 6 (อาทิตย์ = 0, จันทร์ = 1, อังคาร = 2, พุธ = 3, พฤหัส = 4, ศุกร์ = 5 ,เสาร์ =
                        6 )</li>
                </ul>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_crontab_setting')}}"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group row form-max_process">
            <label for="max_process"
                class="col-sm-4 col-form-label text-sm-right">{{trans('backoffice/data_integration/mgmt_script.label_max_process')}}</label>
            <div class="col-sm-7">
                <input name="max_process" id="max_process" class="form-control" type="number" min="1" max="10"
                    value="10" data-parsley-error-message="{{ trans('/master.msg_err_value_between_1_10') }}"
                     />
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_max_process')}}"></i>
            </div>
        </div>



        <div class="form-group row">
            <label for="node"
                class="col-sm-4 col-form-label text-sm-right">{{trans('backoffice/data_integration/mgmt_script.label_node')}}</label>
            <div class="col-sm-7">
                <select name="node" id="node" class="form-control" ></select>
            </div>
            <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_node')}}"></i>
            </div>
        </div>
    </div>


    <!-- End Block 1: -->
    <!-- Block 2: source_option  -->
    <div class="col-sm-12">

        <!-- Navigate tabs source_option setting -->
        <ul class="nav nav-tabs source_option-tabs">
            <li class="add-tab nav-item"><a href="javascript:void(0)" class="add-source_option nav-link"><i
                        class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
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
                    <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_name')}}
                </label>
                <div class="col-sm-7">
                    <input name="name" class="form-control" type="text" required
                        data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_name')}}"
                         />
                    <p class="text-muted" style="font-style: italic;">ใช้ใน dataimporter ชื่อภาษาอังกฤษเท่านั้น</p>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_name')}}"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6 ">
            <div class="form-group row">
                <label class="col-form-label text-sm-right col-sm-4">
                    <span
                        class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_retry_count')}}
                </label>
                <div class="col-sm-7">
                    <input name="retry_count" class="form-control" type="number" min="0" max="10" value="3" required
                        data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_retry_count')}}"
                         />
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_retry_count')}}"></i>
                </div>
            </div>
        </div>

        <div class="container col-sm-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs detail-tabs">
                <li class="add-tab nav-item disabled" style="display: none;"><a href="javascript:void(0)"
                        class="add-detail nav-link"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
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

                <label class="col-form-label text-sm-right col-sm-4">
                    <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_host')}}
                </label>
                <div class="col-sm-7">
                    <select name="download_driver" id="download_driver" class="form-control download_driver"
                        ></select>
                    <p class="text-muted text-url" style="font-style: italic;">api.system_setting name =
                        bof.DataIntegration.dl.DownloadDriver</p>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_script.tooltrip_label_host')}}"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group row">
                <label class="col-form-label text-sm-right col-sm-4">
                    <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_host_url')}}
                </label>
                <div class="col-sm-7">
                    <input name="detail_host" type="text" class="form-control detail_host" required
                        data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_detail_host_url')}}"
                        >
                    <p class="text-muted" style="font-style: italic;">(กรณี Password เป็นอักขระพิเศษ จะต้อง urlencode
                        ก่อนเช่น # = %23 </p>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="left"
                        title="{{trans('backoffice/data_integration/mgmt_script.tooltrip_host_url')}}"></i>
                </div>
            </div>
        </div>

        <!-- <div class="col-sm-6 download_driver_ctrl download_driver_ctrl_ftp download_driver_ctrl_sftp" style="display: none;">
    <div class="form-group row">
      <label class="col-form-label text-sm-right col-sm-4">
        <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_username')}}
      </label>
      <div class="col-sm-7">
        <input class="form-control" name="username" type="text" />
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script.tooltip_username')}}"></i>
      </div>
    </div>
  </div>

  <div class="col-sm-6 download_driver_ctrl download_driver_ctrl_ftp download_driver_ctrl_sftp" style="display: none;">
    <div class="form-group row">
      <label class="col-form-label text-sm-right col-sm-4">
        <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_password')}}
      </label>
      <div class="col-sm-7">
        <input class="form-control" name="password" type="text"/>
      </div>
      <div class="row col-sm-1">
        <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
        data-placement="top" title="{{trans('backoffice/data_integration/mgmt_script.tooltip_password')}}"></i>
      </div>
    </div>
  </div> -->

        <!-- Dropdown select user -->
        <div class="col-sm-6 download_driver_ctrl download_driver_ctrl_ftp download_driver_ctrl_sftp"
            style="display: none;">
            <div class="form-group row">
                <label class="col-form-label text-sm-right col-sm-4">
                    <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_username')}}
                </label>
                <div class="col-sm-7">
                    <select name="username" id="username" class="form-control" >
                        <?php
          if(!empty($username)){
            echo "<option value=".$username.">".$username."</option>";
          }

          for($i=0; $i<=4; $i++)
          {
            echo "<option value=".$i."> User".$i."</option>";
          }
        ?>
                    </select>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_username')}}"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6 download_driver_ctrl download_driver_ctrl_ftp download_driver_ctrl_sftp"
            style="display: none;">
            <div class="form-group row">
                <label class="col-form-label text-sm-right col-sm-4">
                    <span class="color-red">*</span>
                    {{trans('backoffice/data_integration/mgmt_script.label_delete_after_days')}}
                </label>
                <div class="col-sm-7">
                    <input class="form-control" name="delete_after_days" type="number" min="-1" value="0"  />
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_delete_after_day')}}"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group row">
                <label class="col-form-label text-sm-right col-sm-4">
                    {{trans('backoffice/data_integration/mgmt_script.label_timeout')}}
                </label>
                <div class="col-sm-7">
                    <input value=99 name="timeout_seconds" type="number" min="0" class="form-control timeout_seconds"
                        >
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="left"
                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_timeout')}}"></i>
                </div>
            </div>
        </div>

        <div class="container col-sm-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs file-tabs">
                <li class="add-tab nav-item"><a href="javascript:void(0)" class="add-file nav-link"><i
                            class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
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
        <div class="col-sm-6">
            <div class="form-group row">
                <label class="col-form-label text-sm-right col-sm-4">
                    {{trans('backoffice/data_integration/mgmt_script.label_source')}}
                </label>
                <div class="col-sm-7">
                    <input class="form-control" name="source" type="text"  />
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_source')}}"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group row">
                <label class="col-form-label text-sm-right col-sm-4">
                    {{trans('backoffice/data_integration/mgmt_script.label_destination')}}
                </label>
                <div class="col-sm-7">
                    <input class="form-control" name="destination" type="text" />
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_destination')}}"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal confirm delete -->
<div class="bootbox modal fade" id="modal-delete" tabindex="-1" role="document">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{trans('backoffice/data_integration/mgmt_script.modal_delelte_title')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fa fa-times"></i>{{trans('master.btn_cancel')}}</button>
                <button type="button" class="btn btn-success" id="btn-delete"><i
                        class="fa fa-check"></i>{{trans('master.btn_confirm')}}</button>
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
                <h4 class="modal-title">{{ trans('backoffice/data_integration/mgmt_conv.title_display_json') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form role="form" id="dlgDatajson-form" class="form-row">
                    <input type="hidden" id="dlgDatajson-id" name="id" readonly />

                    <div class="form-group col-sm-12 row">
                        <label for="dlgDatajson-code"
                            class="col-form-label text-sm-right col-sm-3">{{trans('backoffice/data_integration/mgmt_conv.label_download_setting_json')}}:</label>
                        <div class="col-sm-9">
                            <textarea id="dlgDatajson-down-json" readonly rows="5" class="form-control"
                                data-parsley-required></textarea>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">{{ trans('backoffice/data_integration/mgmt_conv.btn_close') }}</button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="showData" tabindex="-1" role="dialog" aria-labelledby="showData"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-row" id="mgmt-view-form" data-parsley-validate>
                    <input id="download_id" type="text" class="form-control" style="display:none" />
                    <!-- Block 1: -->
                    <!-- download_name -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="download_name" class="col-form-label text-sm-right col-sm-4">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_download_name')}}
                            </label>
                            <div class="col-sm-7">
                                <input id="download_name" name="download_name" class="form-control"
                                    data-parsley-required
                                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_download_name')}}"
                                    readonly />
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_download_name')}}"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="description" class="col-form-label text-sm-right col-sm-4">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_description')}}
                            </label>
                            <div class="col-sm-7">
                                <input id="description" class="form-control" required
                                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_description')}}"
                                    readonly />
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_description')}}"></i>
                            </div>
                        </div>
                    </div>
                    <!-- agent_user_id -->
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="agent_user" class="col-form-label text-sm-right col-sm-4">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_agent_user')}}
                            </label>
                            <div class="col-sm-7">
                                <select id="agent_user_data" class="form-control select-search" required
                                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_agent_user')}}"
                                    disabled>
                                    <!-- <option value="">{{ trans('/master.msg_filter_required') }}</option> -->
                                </select>
                                <p class="text-muted" style="font-style: italic;">เพิ่มที่หน้าการจัดการ Key Access</p>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_agent_user')}}"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 ">
                        <div class="form-group row">
                            <label for="data_folder" class="col-form-label text-sm-right col-sm-4">
                                <span class="color-red">*</span>Prefix path
                            </label>
                            <div class="col-sm-7">
                                <select id="agent_user" class="form-control select-search" disabled>
                                    <option value="">{{ trans('/master.msg_filter_required') }}</option>
                                    <option value="1">download/bma/</option>
                                    <option value="2">download/bma/</option>
                                    <option value="3">download/bma/</option>
                                    <option value="4">download/bma/</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data_folder" class="col-form-label text-sm-right col-sm-4">
                                <span class="color-red">*</span>Path
                            </label>
                            <div class="col-sm-7">
                                <input id="data_folder" class="form-control" placeholder=".....Canel" required
                                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_data_folder')}}"
                                    readonly />
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_data_folder')}}"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 offset-sm-6">
                        <div class="form-group row">
                            <label for="download_method_data" class="col-form-label text-sm-right col-sm-4">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_download_method')}}
                            </label>
                            <div class="col-sm-7">
                                <select id="download_method_data" class="form-control" name="download_method_data" data-key=""
                                    data-parsley-required
                                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_download_method')}}"
                                    disabled>
                                    <!-- <option value="">{{ trans('/master.msg_filter_required') }}</option> -->
                                </select>
                                <p class="text-muted text-url" style="font-style: italic;">api.system_setting name
                                    =bof.DataIntegration.dl.DownloadScript</p>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_download_method')}}"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 dl_script_ctrl dl_script_ctrl_collector" style="display: none;">
                        <div class="form-group row">
                            <label for="archive_folder" class="col-form-label text-sm-right col-sm-4">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_archive_folder')}}
                            </label>
                            <div class="col-sm-7">
                                <input id="archive_folder" class="form-control" readonly />
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_archive_folder')}}"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 dl_script_ctrl dl_script_ctrl_collector" style="display: none;">
                        <div class="form-group row">
                            <label for="result_file" class="col-form-label text-sm-right col-sm-4">
                                {{trans('backoffice/data_integration/mgmt_script.label_result_file')}}
                            </label>
                            <div class="col-sm-7">
                                <input id="result_file" class="form-control" value="filelist.json" readonly />
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_result_file')}}"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group row form-crontab">
                            <label for="crontab_setting" class="col-sm-4 col-form-label text-sm-right">
                                <span
                                    class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_crontab_setting')}}
                            </label>
                            <div class="input-group col-sm-7">
                                <input type="text" id="crontab_setting" class="form-control" placeholder="0 0 * * *"
                                    required
                                    data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_crontab_setting')}}"
                                    readonly>
                                <ul class="text-muted" style="font-style: italic;">
                                    <li>minute มีค่า 0 – 59</li>
                                    <li>hour มีค่า 0 – 23</li>
                                    <li>day มีค่า 1 – 31</li>
                                    <li>month มีค่า 1 – 12</li>
                                    <li>weekday มีค่า 0 – 6 (อาทิตย์ = 0, จันทร์ = 1, อังคาร = 2, พุธ = 3, พฤหัส = 4,
                                        ศุกร์ = 5 ,เสาร์ =
                                        6 )</li>
                                </ul>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_crontab_setting')}}"></i>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-group row form-max_process">
                            <label for="max_process"
                                class="col-sm-4 col-form-label text-sm-right">{{trans('backoffice/data_integration/mgmt_script.label_max_process')}}</label>
                            <div class="col-sm-7">
                                <input name="max_process" id="max_process" class="form-control" type="number" min="1"
                                    max="10" value="10"
                                    data-parsley-error-message="{{ trans('/master.msg_err_value_between_1_10') }}"
                                    readonly />
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_max_process')}}"></i>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="node_data"
                                class="col-sm-4 col-form-label text-sm-right">{{trans('backoffice/data_integration/mgmt_script.label_node')}}</label>
                            <div class="col-sm-7">
                                <select name="node_data" id="node_data" class="form-control" disabled></select>
                            </div>
                            <div class="row col-sm-1">
                                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{trans('backoffice/data_integration/mgmt_script.tooltip_node')}}"></i>
                            </div>
                        </div>
                    </div>


                    <!-- End Block 1: -->
                    <!-- Block 2: source_option  -->
                    <div class="col-sm-12">

                        <!-- Navigate tabs source_option setting -->
                        <ul class="nav nav-tabs source_option-tabs">
                            <li class="add-tab nav-item disabled"><a href="javascript:void(0)"
                                    class="add-source_option nav-link"><i class="fa fa-plus-circle"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                        <!-- End Navigate tabs source_option setting -->

                        <!-- Tab content source_option setting -->
                        <div class="tab-content source_option-tab-content">

                        </div>
                        <!-- End Tab content source_option setting -->

                    </div>
                    <!-- End Block 2: source_option Setting-->



                    <div class="clearfix"></div>


                    <!-- End Button Save and Cancel -->
                </form>
                <!-- tab pane source_option -->
                <div role="tabpanel" class="tab-pane" id="pane-source_option-master">
                    <div class="row">
                        <!-- <div class="col-sm-6 ">
                            <div class="form-group row">
                                <label class="col-form-label text-sm-right col-sm-4">
                                    <span
                                        class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_name')}}
                                </label>
                                <div class="col-sm-7">
                                    <input name="name" class="form-control name" type="text" required
                                        data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_name')}}"
                                        readonly />
                                    <p class="text-muted" style="font-style: italic;">ใช้ใน dataimporter
                                        ชื่อภาษาอังกฤษเท่านั้น</p>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_name')}}"></i>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-sm-6 ">
                            <div class="form-group row">
                                <label class="col-form-label text-sm-right col-sm-4">
                                    <span
                                        class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_retry_count')}}
                                </label>
                                <div class="col-sm-7">
                                    <input name="retry_count" class="form-control" type="number" min="0" max="10"
                                        value="3" required
                                        data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_retry_count')}}"
                                        readonly />
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_retry_count')}}"></i>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="container col-sm-12">
                            Nav tabs
                            <ul class="nav nav-tabs detail-tabs">
                                <li class="add-tab nav-item disabled" style="display: none;"><a
                                        href="javascript:void(0)" class="add-detail nav-link"><i
                                            class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
                            </ul>

                            <div class="tab-content detail-tab-content">

                            </div> -->

                        </div>
                    </div>
                </div>
                <!-- tab pane detail <-->
                <div role="tabpanel" class="tab-pane" id="pane-detail-master" hidden>
                    <div class="row">
                        <div class="col-sm-6" hidden>
                            <div class="form-group row">

                                <label class="col-form-label text-sm-right col-sm-4">
                                    <span
                                        class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_host')}}
                                </label>
                                <div class="col-sm-7">
                                    <select name="download_driver_data" id="download_driver_data"
                                        class="form-control download_driver_data" disabled></select>
                                    <p class="text-muted text-url" style="font-style: italic;">api.system_setting name =
                                        bof.DataIntegration.dl.DownloadDriver</p>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_script.tooltrip_label_host')}}"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" hidden>
                            <div class="form-group row">
                                <label class="col-form-label text-sm-right col-sm-4">
                                    <span
                                        class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_host_url')}}
                                </label>
                                <div class="col-sm-7">
                                    <input name="detail_host_data" type="text" class="form-control detail_host_data" required
                                        data-parsley-error-message="{{trans('backoffice/data_integration/mgmt_script.parsley_detail_host_url')}}"
                                        readonly>
                                    <p class="text-muted" style="font-style: italic;">(กรณี Password เป็นอักขระพิเศษ
                                        จะต้อง urlencode
                                        ก่อนเช่น # = %23 </p>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="left"
                                        title="{{trans('backoffice/data_integration/mgmt_script.tooltrip_host_url')}}"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Dropdown select user -->
                        <div class="col-sm-6 download_driver_ctrl download_driver_ctrl_ftp download_driver_ctrl_sftp"
                            style="display: none;" hidden>
                            <div class="form-group row">
                                <label class="col-form-label text-sm-right col-sm-4">
                                    <span
                                        class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_script.label_username')}}
                                </label>
                                <div class="col-sm-7">
                                    <select name="username" id="username" class="form-control" disabled>
                                        <?php
                                        if(!empty($username)){
                                             echo "<option value=".$username.">".$username."</option>";
                                                            }

                                                    for($i=0; $i<=4; $i++)
                                                                {
                                                echo "<option value=".$i."> User".$i."</option>";
                                                     }
                                                    ?>
                                    </select>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_username')}}"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 download_driver_ctrl download_driver_ctrl_ftp download_driver_ctrl_sftp"
                            style="display: none;">
                            <div class="form-group row">
                                <label class="col-form-label text-sm-right col-sm-4">
                                    <span class="color-red">*</span>
                                    {{trans('backoffice/data_integration/mgmt_script.label_delete_after_days')}}
                                </label>
                                <div class="col-sm-7">
                                    <input class="form-control" name="delete_after_days" type="number" min="-1"
                                        value="0" readonly />
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_delete_after_day')}}"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group row" hidden>
                                <label class="col-form-label text-sm-right col-sm-4">
                                    {{trans('backoffice/data_integration/mgmt_script.label_timeout')}}
                                </label>
                                <div class="col-sm-7">
                                    <input value=99 name="timeout_seconds" type="number" min="0"
                                        class="form-control timeout_seconds" readonly>
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="left"
                                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_timeout')}}"></i>
                                </div>
                            </div>
                        </div>

                        <div class="container col-sm-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs file-tabs">
                                <li class="add-tab nav-item disabled"><a href="javascript:void(0)"
                                        class="add-file nav-link"><i class="fa fa-plus-circle"
                                            aria-hidden="true"></i></a></li>
                            </ul>

                            <!-- Content in tabs Convert/Import -->
                            <div class="tab-content file-tab-content">

                            </div>
                            <!-- End Content in tabs Convert/Import -->
                        </div>
                    </div>
                </div>
                <!-- tab pane files -->
                <div role="tabpanel" class="tab-pane" id="pane-file-master">
                    <div class="row">
                        <div class="col-sm-6" hidden>
                            <div class="form-group row">
                                <label class="col-form-label text-sm-right col-sm-4">
                                    {{trans('backoffice/data_integration/mgmt_script.label_source')}}
                                </label>
                                <div class="col-sm-7">
                                    <input class="form-control" name="source" type="text" readonly />
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_source')}}"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" hidden> 
                            <div class="form-group row">
                                <label class="col-form-label text-sm-right col-sm-4">
                                    {{trans('backoffice/data_integration/mgmt_script.label_destination')}}
                                </label>
                                <div class="col-sm-7">
                                    <input class="form-control" name="destination" type="text" readonly />
                                </div>
                                <div class="row col-sm-1">
                                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{trans('backoffice/data_integration/mgmt_script.tooltip_destination')}}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </div>
            
        </div>
    </div>
</div>

<style>
.disabled {
    pointer-events: none;
    opacity: 0.6;
}
</style>

<script>
var msg_save_suc = '{{trans("master.msg_save_suc")}}';
var msg_delete_suc = '{{trans("master.msg_delete_suc")}}';
var btn_close = '{{trans("master.btn_close")}}';
var btn_add_script = '{{trans("backoffice/data_integration/mgmt_script.btn_add_script")}}';
var modal_delete_title = '{!!trans("backoffice/data_integration/mgmt_script.modal_delete_title")!!}';
var status_enable = '{!!trans("backoffice/data_integration/mgmt_script.status_enable")!!}';
var status_disable = '{!!trans("backoffice/data_integration/mgmt_script.status_disable")!!}';
</script>

@stop


{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2','JsonHelper') !!}

{!! $view->resource('js','js/backoffice/data_integration/mgmt_script.js') !!}
<!-- {!! $view->resource('js','js/backoffice/data_integration/data_integration.js') !!} -->
{!! $view->resource('js','js/bootstrap_toggle.js') !!}