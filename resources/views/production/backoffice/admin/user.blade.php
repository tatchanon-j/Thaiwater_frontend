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
      'text' => trans('backoffice/admin/user.page_name')
    )
  )
);

if (empty($uid)) {
  $uid = 0;
}

$view->option('js-init', 'srvUser.init("' . $getLocal . '",userTranslator,' . $uid . ')');
$view->option('page_name', trans('backoffice/admin/user.page_name'));

$recaptcha_src = "https://www.google.com/recaptcha/api.js?hl=" . \App\Helpers\LocaleHelper::getInstance()->getLocale();
$recaptcha_key = env('API_RECAPCHAKEY');

?>
@section('extra_head')
@extends('backoffice/layout/master')
{!! $view->resource('theme-css','css/backoffice/admin/user.css') !!}
@stop @section('content')

<style>
  .register-form-upload-button {
    padding: 4px;
    border: 1px solid black;
    border-radius: 5px;
    display: block;
    float: left;
  }
</style>
<!-- search -->
<div class="data-filters">
  <div class="form-group">
    <label for="user-filters-status">{{
			trans('backoffice/admin/user.filter_status') }}</label>
    <select id="user-filters-status" multiple="multiple" class="form-control">
      <option value="1">{{ trans('backoffice/admin/user.active') }}</option>
      <option value="2">{{ trans('backoffice/admin/user.inactive') }}</option>
      <option value="3">{{ trans('backoffice/admin/user.deleted') }}</option>
    </select>
  </div>
</div>
<!-- end search -->

<!-- data table -->
<div class="table-responsive">
  <table id="tbl-user" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('backoffice/admin/user.col_ordinal') }}</th>
        <th>{{ trans('backoffice/admin/user.col_email') }}</th>
        <th>{{ trans('backoffice/admin/user.col_full_name') }}</th>
        <th>{{ trans('backoffice/admin/user.col_agency') }}</th>
        <th>{{ trans('backoffice/admin/user.col_last_login') }}</th>
        <th>{{ trans('backoffice/admin/user.col_active') }}</th>
        <th>{{ trans('backoffice/admin/user.col_tools') }}</th>
      </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- ebd data table -->

<!-- modal edit user data -->
<div class="modal fade" id="dlgEditUser" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="dlgEditUser-title">{{ trans('backoffice/admin/user.edit_user') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" id="dlgEditUser-form" class="form-horizontal" enctype="multipart/form-data">

          <div class="form-inline">
            <!-- <div class="col-md-12"> -->
            <!-- <div class="container-fluid"> -->

            <div class="col-md-2 ">
              <div class="row-fluid">
                <div class="register-form-upload-button form-group" style="margin-left:auto; margin-right:auto; " id="dlgEditUser-profile-upload-button">
                  <a href="#" data-toggle="tooltip" title="{{ trans('backoffice/admin/admin.change_picture') }}">
                    <img id="dlgEditUser-profile-image-preview" class="profile-pic" src="{!! $view->buildResourceSrc('images/home/profile.png') !!}" />
                  </a>
                </div>
                <input id="dlgEditUser-profile_image" class="file-upload" type="file" accept="image/*" name="profile_image" data-parsley-max-file-size="200" />
              </div>
            </div>

            <div class="col-md-10">
              <div class="row">
                <!-- <div class=" form-group col-md-12"> -->
                <div class="form-group  col-md-12">
                  <label class="col-sm-4 control-label" for="dlgEditUser-account">{{ trans('backoffice/admin/user.fld_email') }}:</label>
                  <div class="col-sm-8">
                    <input type="text" style="width:100%" class="form-control" id="dlgEditUser-account" name="account" required readonly data-parsley-required-message="{{ trans('backoffice/admin/user.err_no_email') }}">
                  </div>
                </div>
                <!-- </div> -->
                <!-- <div class=" form-group col-md-12"> -->
                <div class="form-group  col-md-12">
                  <label class="col-sm-4 control-label">{{ trans('backoffice/admin/user.fld_full_name') }} :</label>
                  <div class="col-sm-8">
                    <input type="text" style="width:100%" class="form-control" id="dlgEditUser-full_name" name="full_name" required data-parsley-required-message="{{ trans('backoffice/admin/user.err_no_full_name') }}">
                  </div>

                </div>
                <!-- </div> -->
                <!-- <div class=" form-group col-md-12"> -->
                <div class="form-group col-md-12">
                  <label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.ministry') }}:</label>
                  <div class="col-sm-8">
                    <select type="text" style="width:100%" class="form-control  selectpicker  js-example-basic-single js-states" id="dlgEditUser-ministry" data-parsley-required>
                    </select>
                  </div>
                </div>
                <!-- </div> -->
                </row>
              </div>
            </div>
            <!-- </div> -->
            <!-- </div> -->
          </div>
          <div class="form-inline">
            <!-- <div class="col-md-12"> -->
            <div class="col-md-2">
              <div class="col-md-12 ">
              </div>
            </div>
            <div class="col-md-10">
              <div class="row">


                <div class="form-group col-md-12 ">
                  <label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.department') }}:</label>
                  <div class="col-sm-8">
                    <select type="text" style="width:100%" class="form-control  selectpicker  js-example-basic-single js-states" id="dlgEditUser-department" name="department_id" data-parsley-required>
                    </select>
                  </div>
                </div>

                <div class="form-group col-md-12 ">
                  <label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.agency') }}:</label>
                  <div class="col-sm-8">
                    <select type="text" style="width:100%" class="form-control  selectpicker  js-example-basic-single js-states" id="dlgEditUser-agency" name="agency_id" data-parsley-required>
                    </select>
                  </div>
                </div>

                <!-- <div class="form-group">
               <label class="col-sm-2 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.office') }}:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control"  id="dlgEditUser-institute" name="office_name" data-parsley-required data-parsley-error-message="{{  trans('/master.msg_err_require') }}" >
             </div>
              </div> -->

                <div class="form-group col-md-12">
                  <label class="col-sm-4 control-label" for="dlgEditUser-groups">{{ trans('backoffice/admin/user.fld_group') }}:</label>
                  <div class="col-sm-8">
                    <select name="groups[]" style="width:100%" id="dlgEditUser-groups" multiple="multiple">
                    </select>
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label class="col-sm-4 control-label">{{ trans('backoffice/admin/user.fld_status') }} :</label>
                  <div class="col-sm-8">
                    <div class="col-sm-12">
                      <div class="form-inline">
                        <div class="col-md-6">
                          <div class="radio">
                            <!-- <label class="radio-inline"> -->
                            <input type="radio" name="is_active" id="dlgEditUser-is_active-active" value="1" checked="checked">
                            {{ trans('backoffice/admin/user.active') }}</input>
                            <!-- </label> -->
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="radio">
                            <!-- <label class="radio-inline"> -->
                            <input type="radio" name="is_active" id="dlgEditUser-is_active-inactive" value="0">
                            {{ trans('backoffice/admin/user.inactive') }}</input>
                            <!-- </label> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- </div> -->
            <!-- </div> -->
          </div>


          <div class="form-inline">
            <div class="col-md-2">
              <div class="col-md-12 ">
              </div>
            </div>
            <div class="col-md-10">
            <div class="row">
            <div class="col-sm-12">
              <fieldset>
                <legend>{{ trans('backoffice/admin/user.account_data') }}</legend>

                <div class="form-group col-md-12">
                  <label for="dlgEditUser-account_verified_at" class="control-label col-sm-4">{{ trans('backoffice/admin/user.account_last_verify') }}:</label>
                  <div class="col-sm-8">
                    <div class="input-group date">
                      <input id="dlgEditUser-account_verified_at" type="text" style="width:100%" class="form-control" data-date-format="yyyy-mm-dd" placeholder="{{ trans('backoffice/admin/user.account_never_verify') }}" readonly="true">
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label for="user_enddate" class="col-sm-4 control-label">{{ trans('backoffice/admin/user.account_expired_date') }}:</label>
                  <div class="col-sm-8">
                    <div class="input-group date">
                      <input name="account_expired_at" id="dlgEditUser-account_expired_at" type="text" style="width:100%" class="form-control" data-date-format="yyyy-mm-dd" placeholder="{{ trans('backoffice/admin/user.account_never_expires') }}">
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <legend>{{ trans('backoffice/admin/user.password') }}</legend>
                <div class="form-group col-md-12">
                  <label for="dlgEditUser-password_updated_at" class="control-label col-sm-4">{{ trans('backoffice/admin/user.password_last_modified') }}:</label>
                  <div class="col-sm-8">
                    <div class="input-group date">
                      <input id="dlgEditUser-password_updated_at" type="text" style="width:100%" class="form-control" data-date-format="yyyy-mm-dd" placeholder="{{ trans('backoffice/admin/user.password_never_modified') }}" readonly="true">
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label for="dlgEditUser-password_lifespan_days" class="col-sm-4 control-label">{{ trans('backoffice/admin/user.password_life_span') }}:</label>
                  <div class="col-sm-8">
                    <input id="dlgEditUser-password_lifespan_days"  name="password_lifespan_days" type="text" class="form-control" placeholder="{{ trans('backoffice/admin/user.password_life_span_unlimit') }}">
                  </div>
                </div>
              </fieldset>

              <div class="form-group col-md-12 ">
                <label class="col-sm-4 control-label">{{ trans('backoffice/admin/user.usable_services') }}:</label>
                <div class="col-sm-8">
                  <select type="text" style="width:100%" class="form-control" id="dlgEditUser-services" multiple="multiple">
                  </select>
                </div>
              </div>
              </div>
              </div>
              </div>
          </div>
        </form>


        <div class="clearfix"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="dlgEditUser-save-btn">{{ trans("/master.btn_save") }}</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">{{
					trans("/master.btn_cancel") }}</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal edit user data -->

<!-- modal sync user data from LDAP -->
<div class="modal fade" id="dlgSyncUser" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ trans('backoffice/admin/user.sync_ldap') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table id="dlgSyncUser-tbl" class="display admin-datatables-ldapuser" width="100%">
            <thead>
              <tr>
                <th></th>
                <th>{{ trans('backoffice/admin/user.col_ordinal') }}</th>
                <th>{{ trans('backoffice/admin/user.col_email') }}</th>
                <th>{{ trans('backoffice/admin/user.col_desc') }}</th>
              </tr>
            </thead>
            <tfoot>
            </tfoot>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="dlgSyncUser-save-btn">{{ trans("/master.btn_save") }}</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">{{
					trans("/master.btn_cancel") }}</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal sync user data from LDAP -->

<!-- modal add new data user -->
<div class="modal fade" id="dlgNewUser" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ trans('backoffice/admin/user.new_user') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="data-register">
          <form class="form-horizontal" id="register-form" enctype="multipart/form-data">
            <div class="form-inline">
              <div class="col-sm-3 ">
                <div class="form-group col-md-12  ">
                  <div class="register-form-upload-button form-group" style="margin-left:auto; margin-right:auto;   " id="register-form-profile-upload-button">
                    <a href="#" data-toggle="tooltip" title="{{ trans('backoffice/admin/admin.change_picture') }}">
                      <img id="register-form-profile-image-preview" class="profile-pic" src="{!! $view->buildResourceSrc('images/home/profile.png') !!}" />
                    </a>
                  </div><br /><br /><br /><br /><br /><br /><br />
                  <input id="register-form-profile_image" class="file-upload" type="file" accept="image/*" name="profile_image" data-parsley-max-file-size="200" />

                </div>
              </div>

              <div class="col-sm-9 ">
                <div class="form-group col-md-12">
                  <label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.email') }}:</label>
                  <div class="col-sm-8">
                    <input type="email" style="width:100%" class="form-control" id="register-form-email" name="account" data-parsley-required data-parsley-error-message="{{  trans('/master.msg_err_require') }}/{{ trans('backoffice/admin/user_register.err_email') }}" placeholder="" />
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.full_name') }}:</label>
                  <div class="col-sm-8">
                    <input type="text" style="width:100%" class="form-control" id="register-form-name" name="full_name" data-parsley-required data-parsley-error-message="{{  trans('/master.msg_err_require') }}">
                  </div>
                </div>

                <div class="form-group col-sm-12">
                  <label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.ministry') }}:</label>
                  <div class="col-sm-8">
                    <select type="text" style="width:100%" class="form-control  selectpicker  js-example-basic-single js-states" id="register-form-ministry" data-parsley-required>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-inline">
              <div class="col-sm-3 ">
              </div>
              <div class="col-sm-9 ">
                <div class="form-group col-sm-12">
                  <label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.department') }}:</label>
                  <div class="col-sm-8">
                    <select type="text" style="width:100%" class="form-control  selectpicker  js-example-basic-single js-states" id="register-form-department" name="department_id" data-parsley-required>
                    </select>
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label class="col-sm-4 control-label">{{ trans('backoffice/admin/user_register.agency') }}:</label>
                  <div class="col-sm-8">
                    <select type="text" style="width:100%" class="form-control  selectpicker  js-example-basic-single js-states" id="register-form-agency" name="agency_id">
                    </select>
                  </div>
                </div>

                <!-- <div class="form-group">
          <label class="col-sm-2 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.office') }}:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  id="register-form-institute" name="office_name" data-parsley-required data-parsley-error-message="{{  trans('/master.msg_err_require') }}" >
          </div>
        </div> -->

                <div class="form-group col-md-12">
                  <label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.rank') }}:</label>
                  <div class="col-sm-8">
                    <input type="text" style="width:100%" class="form-control" id="register-form-rank" name="rank" data-parsley-required data-parsley-error-message="{{  trans('/master.msg_err_require') }}" />
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.national_id') }}:</label>
                  <div class="col-sm-8">
                    <input type="text" style="width:100%" class="form-control" id="register-form-national_id" name="national_id_number" data-parsley-required data-parsley-error-message="{{  trans('/master.msg_err_require') }}/{{ trans('backoffice/admin/user_register.err_national_id') }}" data-parsley-pattern="^[0-9]{13}$" placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.mobile_phone') }}:</label>
                  <div class="col-sm-8">
                    <input type="text" style="width:100%" class="form-control" id="register-form-phone_number" name="contact_phone" data-parsley-pattern="^[0-9]{10}$" data-parsley-required data-parsley-error-message="{{  trans('/master.msg_err_require') }}/{{ trans('backoffice/admin/user_register.err_mobile_phone') }}" placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label class="col-sm-4 control-label">{{ trans('backoffice/admin/user_register.registration_document') }}:</label>
                  <div class="col-sm-8">
                    <input id="register-form-document" style="width:100%" name="document" type="file">
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_register.captcha') }}:</label>
                  <div class="col-sm-8">
                    <div class="g-recaptcha" style="width:100%" data-sitekey="{{$recaptcha_key}}"></div>
                  </div>
                  <input type="hidden" style="width:100%" name="_csrf" id="register-form-csrf" />
                </div>
                <div class="form-inline">
                  <div class="form-group col-md-12">
                    <label class="col-sm-4 control-label" for="register-form-active-div">{{ trans('backoffice/admin/user_register.status') }}:</label>
                    <div class="col-sm-8">

                      <div class="form-inline">
                        <div class="col-md-6">
                          <div class="radio">
                            <!-- <label class="radio-inline"> -->
                            <input type="radio" name="is_active" id="register-form-active-active" value="1" checked="checked"> {{ trans('backoffice/admin/user_register.active') }}</input>
                            <!-- </label> -->
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="radio">
                            <!-- <label class="radio-inline"> -->
                            <input type="radio" name="is_active" id="register-form-active-inactive" value="0"> {{ trans('backoffice/admin/user_register.inactive') }}</input>
                            <!-- </label> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-default" data-dismiss="modal">{{
          trans("/master.btn_cancel") }}</button>
        <button type="button" class="btn btn-primary" id="register-form-btn_register">{{ trans('backoffice/admin/user_register.register') }}</button>
      </div>
    </div>
  </div>
</div>
<style>
  label.col-sm-4 {
    justify-content: flex-end;
    text-align: right;
  }

  label.col-sm-10 {
    justify-content: flex-end;
    text-align: right;
  }

  label.col-sm-2 {
    justify-content: flex-end;
    text-align: right;
  }


  label.col-md-3 {
    justify-content: flex-end;
    text-align: right;

  }
  .rc-anchor.rc-anchor-normal.rc-anchor-light{
  width :100% ;
  }
  .form-group.col-md-12 {
    margin-bottom: 10px;
  }
</style>
<!-- end modal add new data user -->
<script>
  var userTranslator = {
    'sync_ldap': '{{ trans("backoffice/admin/user.SYNC_LDAP") }}',
    'filter_status_all': '{{ trans("backoffice/admin/user.filter_status_all") }}',
    'filter_status_all_selected': '{{ trans("backoffice/admin/user.filter_status_all_selected") }}',
    'filter_status_none_selected': '{{ trans("backoffice/admin/user.filter_status_none_selected") }}',
    'select_all': '{{ trans("backoffice/admin/user.select_all") }}',
    'all_selected': '{{ trans("backoffice/admin/user.all_selected") }}',
    'none_selected': '{{ trans("backoffice/admin/user.none_selected") }}',
    'new_user': '{{ trans("backoffice/admin/user.new_user") }}',
    'edit_user': '{{ trans("backoffice/admin/user.edit_user") }}',
    'delete_user': '{{ trans("backoffice/admin/user.delete_user") }}',
    'undelete_user': '{{ trans("backoffice/admin/user.undelete_user") }}',
    'deleted': '{{ trans("backoffice/admin/user.deleted") }}',
    'active': '{{ trans("backoffice/admin/user.active") }}',
    'inactive': '{{ trans("backoffice/admin/user.inactive") }}',
    'never_login': '{{ trans("backoffice/admin/user.user_never_login") }}',
    'delete_prompt': '{{ trans("backoffice/admin/user.delete_prompt") }}',
    'delete_success': '{{ trans("backoffice/admin/user.delete_success") }}',
    'undelete_prompt': '{{ trans("backoffice/admin/user.undelete_prompt") }}',
    'undelete_success': '{{ trans("backoffice/admin/user.undelete_success") }}',
    'save_success': '{{ trans("backoffice/admin/user.save_success") }}',
    'ldap_user_dl': '{{ trans("backoffice/admin/user.ldap_user_dl") }}',
    'ldap_user_successful': '{{ trans("backoffice/admin/user.ldap_user_successful") }}',
    'ldap_user_notapplicable': '{{ trans("backoffice/admin/user.ldap_user_notapplicable") }}',
    'password_life_span_unlimit': '{{ trans("backoffice/admin/user.password_life_span_unlimit") }}',

    'msg_save_suc': '{{ trans("backoffice/admin/group.msg_save_suc") }}',
    'msg_delete_suc': '{{ trans("backoffice/admin/group.msg_save_suc") }}',
    'btn_confirm': '{{ trans("backoffice/admin/group.btn_confirm") }}',
    'btn_cancel': '{{ trans("backoffice/admin/group.btn_cancel") }}',
    'btn_close': '{{ trans("backoffice/admin/group.btn_close") }}',
    'unspecified': '{{ trans("backoffice/admin/user_register.unspecified") }}',
  }

  for (var k in group_Translator) {
    userTranslator[k] = group_Translator[k]
  }
</script>
@stop

{!! $view->asset('DataTables','DataTables-buttons','DataTables-select','parsley','bootstrap-multiselect','bootstrap-datepicker','moment','select2','moment') !!}
{!! $view->resource('js','js/backoffice/admin/user.js') !!}
{!! $view->resource('js','js/backoffice/admin/user_register.js') !!}
{!! $view->resource('theme-css','css/backoffice/admin/user_register.css') !!}
{!! $view->resource('js',$recaptcha_src, 'async defer') !!}