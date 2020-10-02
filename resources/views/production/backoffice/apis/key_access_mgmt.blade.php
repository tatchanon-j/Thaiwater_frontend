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
    'href' => $l->httpUrl("backoffice/apis/key_access_mgmt"),
    'text' => trans('backoffice/apis/key_access_mgmt.main-menu-mode')
  ),
  array(
    'text' => trans('backoffice/apis/key_access_mgmt.page_name')
    )
  ));
  $view->option('js-init','srvData.init(group_Translator)');
  $view->option('page_name', trans('backoffice/apis/key_access_mgmt.page_name'));
  ?>

  {!! $view->resource('theme-css','css/backoffice/apis/key_access_mgmt.css') !!}

  {!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}

  {!! $view->resource('js','js/backoffice/apis/key_access_mgmt.js') !!}

  @stop

  @section('content')
<div>
  <a class="color-red" style="text-decoration: underline;" href="{!! $view->buildResourceSrc('pdf/การจัดการ Key Access.pdf') !!}">{{ trans('/master.dl_keymgmt_manual') }}</a>
</div>

<!-- data table -->
<div class="table-responsive">
  <table id="tbl-key-access-mgmt" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans("/master.col_order") }}</th>
        <th>{{ trans("backoffice/apis/key_access_mgmt.col_acount") }}</th>
        <th>{{ trans("backoffice/apis/key_access_mgmt.col_callback_url") }}</th>
        <th>{{ trans("backoffice/apis/key_access_mgmt.col_request_origin") }}</th>
        <th>{{ trans("backoffice/apis/key_access_mgmt.col_agent_type") }}</th>
        <th>{{ trans("backoffice/apis/key_access_mgmt.col_Key_Access") }}</th>
        <th>{{ trans("backoffice/apis/key_access_mgmt.col_manage_key") }}</th>
        <th>{{ trans('/master.col_edit_del') }}</th>
      </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end data table -->

<!-- data dialog box -->
<div class="modal fade" id="dlgEditkeyaccessmgmt" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width:auto">
      <div class="modal-header">
        <h4 class="modal-title" id="dlgEditkeyaccessmgmt-title" ></h4>
        <button type="button" class="close" data-dismiss="modal"
        aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" id="dlgEditkeyaccessmgmt-form" class="form-horizontal">
          <input type="hidden" id="dlgEditkeyaccessmgmt-id" name="id"  />
          <input type="hidden" id="dlgEditkeyaccessmgmt-category" name="category" />
          <input type="hidden" id="key_access" name="keyacc"/>

          <div class="form-group form-inline">
            <label for="code" class="col-md-3 control-label justify-content-end"><span class="color-red">*</span>Username: </label>
            <div class="col-md-8">
              <input id="dlgEditkeyaccessmgmt-account"  class="form-control" type="text" name="code" data-key="account"
              data-parsley-required >
            </div>
          </div>
          <div class="form-group form-inline" >
            <label for="code" class="control-label col-md-3 justify-content-end">{{ trans("backoffice/apis/key_access_mgmt.col_callback_url") }} : </label>
            <div class="col-md-8">
              <input  id="dlgEditkeyaccessmgmt-callbackurl" class="form-control" type="text" name="code" data-key="code"/>
            </div>
          </div>
          <div class="form-group form-inline">
            <label for="code" class="control-label col-md-3 justify-content-end">{{ trans("backoffice/apis/key_access_mgmt.col_request_origin") }} : </label>
            <div class="col-md-8">
              <input  id="dlgEditkeyaccessmgmt-requestorigin" class="form-control" type="text" name="code"/>
            </div>
          </div>
          <div class="form-group form-inline">
            <label for="code" class="col-md-3 control-label justify-content-end"><span class="color-red">*</span>{{ trans("backoffice/apis/key_access_mgmt.col_agent_type") }} : </label>
            <div class="col-md-8">
              <select id="dlgEditkeyaccessmgmt-agent" class="form-control" name="input_department" data-key=""
                data-parsley-required>
                <option class="op_default" value="">{{ trans('/master.msg_filter_required') }}</option>
              </select>
            </div>
          </div>
          <div class="form-group form-inline">
            <label for="code" class="col-md-3 control-label justify-content-end"><span class="color-red">*</span>{{ trans("backoffice/apis/key_access_mgmt.col_permission_realm") }} : </label>
            <div class="col-md-8">
              <select id="dlgEditkeyaccessmgmt-permission" class="form-control" name="input_department"
              data-parsley-required>
                <option class="op_default" value="">{{ trans('/master.msg_filter_required') }}</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default"
            data-dismiss="modal">{{trans('/master.btn_cancel')}}
          </button>
          <button type="button" class="btn btn-primary"
              id="dlgEditkeyaccessmgmt-save-btn">{{trans('/master.btn_save')}}
          </button>
      </div>
    </div>
  </div>
</div>
<!-- end dialog box -->

<style>
  #dlgEditkeyaccessmgmt-account{
    width:100%
  }
  #dlgEditkeyaccessmgmt-callbackurl{
    width:100%
  }
  #dlgEditkeyaccessmgmt-requestorigin{
    width:100%
  }
  #dlgEditkeyaccessmgmt-agent{
    width:100%
  }
  #dlgEditkeyaccessmgmt-permission{
    width:100%
  }
  .modal-content{
    width:fit-content
  }
  .model-content.test{
    width:auto!important
  }
</style>

@stop
