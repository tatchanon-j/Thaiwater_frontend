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
        'href' => $l->httpUrl("backoffice/data_integration/mgmt_metadata_rain"),
        'text' => trans('backoffice/data_integration/mgmt_script_rain.main_menu_name')
    ),
    array(
        'text' => trans('backoffice/data_integration/mgmt_metadata_rain.page_name')
    ),
    )
);
$view->option('page_name', trans('backoffice/data_integration/mgmt_metadata_rain.page_name'));
$view->option('js-init','mgmt.init(group_Translator )');
?>

{!! $view->resource('theme-css','css/backoffice/data_integration/mgmt_metadata_rain.css') !!}

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

<h5 class="color-red">{{ trans('/master.remark') }} {{ trans('/master.remark_integration') }}</h5>


<!-- data table -->
<div class="table-responsive">
    <table id="metadata-tbl" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{trans('backoffice/data_integration/mgmt_metadata_rain.metadata_id')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_metadata_rain.metadata_name')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_metadata_rain.download_name')}}</th>
                <th>{{trans('backoffice/data_integration/mgmt_metadata_rain.dataset_name')}}</th>
                <!-- <th>{{trans('backoffice/data_integration/mgmt_metadata_rain.agency_name')}}</th> -->
                <th></th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<!-- end ddata table -->

<!-- modal -->
<div class="bootbox modal fade" id="modal" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">{{trans('backoffice/data_integration/mgmt_metadata_rain.page_name')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               
            </div>
            <div class="modal-body">
                <form class="form-row" id="form" role="form">
                    <!-- download_name , dataset_name -->
                    
                        <div class="col-sm-12 ">
                        <div class="form-group row">
                            <label for="download_name" class="col-sm-3 col-form-label text-sm-right">
                                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_metadata_rain.label_download_name')}}
                            </label>
                            <div class="col-sm-9">
                                <select id="download_name" class="form-control select-search" name="download_name" data-key="" required>
                                </select>
                            </div>
                        </div>
</div>
                        <div class="col-sm-12">
                        <div class="form-group row">
                            <label for="dataset_name" class="col-form-label text-sm-right col-sm-3">
                                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_metadata_rain.label_dataset_name')}}
                            </label>
                            <div class="col-sm-9">
                                <select id="dataset_name" class="form-control select-search" required></select>
                            </div>
                        </div>
                    </div>

                    <!-- monitor_script -->
                    <!-- <div class="form-group">
                    <div class="form-group" style="display:none;">
                        <div class="col-sm-6">
                            <label class="col-sm-4 col-form-label text-sm-right">
                                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_metadata_rain.label_monitor_script')}}
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="monitor_script" required/>
                            </div>
                        </div>
                    </div> -->
                </form>
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-danger" id="btn-cancel" data-dismiss="modal" >{{trans('master.btn_cancel')}}</button>
                <button type="button" class="btn btn-success" id="btn-save">{{trans('master.btn_save')}}</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- modal add or edit metadata -->
<div class="bootbox modal fade" id="dlgMetadata" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 id="dlgMetadata-title" class="dlgMetadata-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               
            </div>
            <div class="modal-body">
                <form class="form-row" id="dlgMetadata-form" role="form">
                    <input id="id" hidden/>
                    <!-- download_name , dataset_name -->
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label for="download_name" class="col-sm-3 col-form-label text-sm-right">
                                <span class="color-red">*</span>{{trans('backoffice/data_integration/mgmt_metadata_rain.metadata_name')}}
                            </label>
                            <div class="col-sm-9">
                                <input id="dlgMetadata-name" class="form-control" type="text"
                                required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            
                <button type="button" class="btn btn-danger" id="dlgbtn-cancel" data-dismiss="modal" >{{trans('master.btn_cancel')}}</button>
                <button type="button" class="btn btn-success" id="dlgbtn-save">{{trans('master.btn_save')}}</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal add or edit metadata -->

<script>
var msg_save_suc = '{{trans("master.msg_save_suc")}}';
var btn_add_conv = '{{trans("backoffice/data_integration/mgmt_metadata_rain.btn_add_conv")}}';
</script>
@stop


{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2') !!}

{!! $view->resource('js','js/backoffice/data_integration/mgmt_metadata_rain.js') !!}
{!! $view->resource('js','js/backoffice/data_integration/data_integration.js') !!}
