@section('extra_head')
@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('main-menu-mode', 'admin');
$view->option(
  'breadcrumb',
  array(
    array(
      'href' => $l->httpUrl("backoffice/admin/group"),
      'text' => trans('backoffice/admin/admin.page_name')
    ),
    array(
      'text' => trans('backoffice/admin/user_setting.page_name')
    )
  )
);
$view->option('js-init',  'srvSetting.init("' .  $getLocal . '",setting_Translator)');
$view->option('page_name', trans('backoffice/admin/user_setting.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/admin/user_setting.css') !!}

@stop

@section('content')

<!-- search -->
<div class="data-filters">
  <form class="form-horizontal" id="user-setting-form">
    <div class="form-inline justify-content-center">
    <form>
      <div class="form-group col-md-12">
        <label class="col-sm-5 control-label" for="user-setting-password_lifespan_days">{{ trans('backoffice/admin/user_setting.fld_password_lifespan_days') }} :
        </label>
        <div class="col-sm-5">
          <input type="number" value="0" min="0" style="width:100%" class="form-control" id="user-setting-password_lifespan_days" name="password_lifespan_days">
        </div> {{ trans('backoffice/admin/user_setting.fld_days') }}
      </div>
      <!-- name & surname -->
      <div class="form-group col-md-12">
        <label class="col-sm-5 control-label" for="user-setting-account_lifespan_days">{{ trans('backoffice/admin/user_setting.fld_account_lifespan_days') }} :</label>
        <div class="col-sm-5">
          <input type="number" value="0" min="0" class="form-control" style="width:100%" id="user-setting-account_lifespan_days" name="account_lifespan_days" />
        </div> {{ trans('backoffice/admin/user_setting.fld_days') }}
      </div>

      <div class="form-group col-md-12">
        <label class="col-sm-5 control-label" for="user-setting-new_usergroup_id"> {{ trans('backoffice/admin/user_setting.fld_new_usergroup_id') }} :</label>
        <div class="col-sm-5">
          <select type="text" class="form-control" style="width:100%" id="user-setting-new_usergroup_id" name="new_usergroup_id" data-parsley-excluded="true">

          </select>
        </div>
      </div>

      <div class="form-group col-md-12">
        <label class="col-sm-5 control-label" for="user-setting-badattemp_user_captcha"> {{ trans('backoffice/admin/user_setting.fld_captcha_after') }}:</label>
        <div class="col-sm-5">
          <input type="number" min="1" value="1" style="width:100%" class="form-control" id="user-setting-badattemp_user_captcha" name="badattemp_user_captcha" />
        </div> {{ trans('backoffice/admin/user_setting.fld_times') }}
      </div>
      <br>
    </div>
    <!-- <div class="col-sm-12 form-group"> -->
    <div class="text-center ">
      <button type="button" class="btn btn-primary " id="user-setting-btn_save">{{ trans('backoffice/admin/user_setting.save') }}</button>
    </div>
    <!-- </div> -->

  </form>
  <div class="clearfix"></div>
</div>
<style>
  label.col-sm-5 {
    justify-content: flex-end;
    text-align: right;
  }

  label.col-md-3 {
    justify-content: flex-end;
    text-align: right;

  }

  .form-group.col-md-12 {
    margin-bottom: 10px;
  }
</style>
<!-- end search -->


<!-- scrip for page -->
<script>
  var setting_Translator = {
    'btn_confirm': '{{ trans("/modal.btn_confirm")}}',
    'btn_cancel': '{{ trans("/modal.btn_cancel")}}',
    'btn_close': '{{ trans("/modal.btn_close")}}',
    'btn_edit': '{{  trans("/datatables.btn_edit") }}',
    'btn_delete': '{{  trans("/datatables.btn_delete") }}',
    'msg_delete_con': '{{ trans("/modal.msg_delete_con")}}',
    'msg_err_require': '{{ trans("/modal.msg_err_require") }}',
    'msg_delete_suc': '{{ trans("/modal.msg_delete_suc") }}',
    'msg_delete_unsuc': '{{ trans("/modal.msg_delete_unsuc") }}',
    'msg_save_suc': '{{ trans("/modal.msg_save_suc") }}',
    'msg_save_unsuc': '{{ trans("/modal.msg_save_unsuc") }}',
    'msg_edit_suc': '{{ trans("/modal.msg_edit_suc") }}',
    'msg_edit_unsuc': '{{ trans("/modal.msg_edit_unsuc") }}',
    'btn_close': '{{ trans("/backoffice/admin/user_setting.btn_close") }}',
    'save_success': '{{ trans("backoffice/admin/user_setting.save_success") }}',
  }
</script>
<!-- end scrip for page -->
@stop

{!! $view->resource('js','js/backoffice/admin/user_setting.js') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect') !!}