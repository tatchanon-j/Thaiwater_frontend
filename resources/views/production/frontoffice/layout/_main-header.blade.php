<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$api = \App\Helpers\ApiServiceHelper::getInstance();
$locale_switcher = $l->buildSwitcher('locale-switcher', '');

$account_info = $api->getAccountInfo();
$encrypted_login = substr(env('API_SERVER'),0,5) != "https";
$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);
$profile_image_url = env('API_SERVER') . '/auth/profile-image?_csrf=' . urlencode($csrf);

// Force browser to ignore memory cache
$profile_update_time = request()->session()->get(\App\Helpers\ApiServiceHelper::SESSION_ACCOUNT_UPDATE_TIME);
if ( $profile_update_time != "" ) {
	$profile_image_url .= '&v=' . $profile_update_time;
}

$current_lang = $l->getLocale();
$reload_accountinfo_url = $l->httpUrl('backoffice/refresh-account-info');

$current_url = $_SERVER['REQUEST_URI'];
$navbar_custom_menu = $view->option('navbar-custom-menu');
if (! is_array($navbar_custom_menu) ){
	$navbar_custom_menu = array();
}
?>

<header class="main-header flex-md-row" id="main-header">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="navbar-brand">
                <a href="{!! $l->httpUrl( '/' ) !!}" class="" role="button">
                    <img src="{!! $view->buildResourceSrc('images/banner-thaiwater30.png') !!}">
                    <!-- <font color="white">{{!! trans('frontoffice/site.logo_text') !!}}</font> name site-->
                </a>
            </div>

            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"
                data-target="#navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav ml-auto">
                    @foreach($navbar_custom_menu as $m)
                    @if ( isset($m['href']) )
                    <li class="{!! ($m['href'] == $current_url)? 'active':'' !!}">

                        <a href="{!! $m['href'] !!}">

                            {!! $m['text'] !!}
                        </a>
                    </li>
                    @endif
                    @endforeach
                    @if ( $account_info !== null )
                    <li class="username dropdown user user-menu">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span class="d-none d-sm-inline"> {{ $account_info->full_name or ''}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <p>{{ $account_info->full_name or ''}}</p>
                            </li>
                            <li class="user-footer">
                                <div class="text-center">
                                    <button id="btn-editprofile" type="button"
                                        class="btn btn-default btn-flat pull-left hidden-xs" data-toggle="modal"
                                        data-target="#dlgEditProfile">ข้อมูลส่วนตัว</button>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <ul class="list-unstyled btn btn-seconary" style="padding-top:5px;">
                        <li class="nav-item dropdown messages-menu">{!! $locale_switcher !!}</li>
                    </ul>
                    @if ( $account_info !== null )
                    <li class="dropdown user user-menu">
                        <a href="javascript:apiService.logout('{{ $api->getLogoutToken() }}')" class=" pull-right">
                            <i class="fa fa-sign-out"></i>
                            <span class="d-none d-sm-inline">{{trans('/master.logout')}}</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

@if ( $account_info !== null )
<div id="dlgEditProfile" class="modal fade" role="dialog" style="display:none">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('/master.edit_profile')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="dlgEditProfile-form" class="form-row" role="form" enctype="multipart/form-data">
                    <div class="col-sm-3">
                        <div class="form-group row">
                            <div class="upload-button form-group row" style="margin-left:auto; margin-right:auto;">
                                <a href="#" data-toggle="tooltip"
                                    title="{{trans('/master.edit_profile_change_picture')}}">
                                    <img id="dlgEditProfile-profile_image-preview" class="profile-pic"
                                        src="{!! $profile_image_url !!}" />
                                </a>
                            </div>
                            <input id="dlgEditProfile-profile_image" class="file-upload" type="file" accept="image/*"
                                data-parsley-max-file-size="200" name="profile_image" /><br>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <!-- email -->
                        <div class="form-group row">
                            <label
                                class="col-sm-3 form-control-label text-sm-right">{{trans('master.edit_profile_account')}}:
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="dlgEditProfile-account" readonly="true"
                                    value="{{ $account_info->account or ''}}">
                            </div>
                        </div>
                        <!-- name & surname -->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label text-sm-right"><span
                                    class="color-red">*</span>{{trans('master.edit_profile_full_name')}}:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="dlgEditProfile-full_name" name="full_name"
                                    value="{{ $account_info->full_name or ''}}" data-parsley-required>
                            </div>
                        </div>
                        <!-- Old password -->
                        <div class="form-group row grp-pass">
                            <label
                                class="col-sm-3 form-control-label text-sm-right">{{ trans('master.old_password') }}:</label>
                            <div class="col-sm-9 old-pass">
                                <input type="password" class="form-control" id="dlgEditProfile-password" name="password"
                                    data-parsley-validate-if-empty="true"
                                    data-parsley-error-message="{{  trans('/backoffice/login/login.err_old_password_null') }}"
                                    data-parsley-group="chpasswd">
                            </div>
                        </div>
                        <!-- New password -->
                        <div class="form-group row grp-pass">
                            <label
                                class="col-sm-3 form-control-label text-sm-right">{{ trans('master.new_password') }}:</label>
                            <div class="col-sm-9 new-pass">
                                <input type="password" class="form-control" id="dlgEditProfile-newpassword"
                                    name="newpassword"
                                    data-parsley-error-message="{{  trans('/master.msg_err_require_pass') }}"
                                    data-parsley-group="chpasswd"
                                    data-parsley-pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%^*?+=-_])[A-Za-z\d$@$!%^*?+=-_]{8,}"
                                    data-toggle="tooltip" title="{{ trans('/master.msg_tooltrip_pass') }}">
                            </div>
                        </div>
                        <!-- Repassword -->
                        <div class="form-group row grp-pass">
                            <label
                                class="col-sm-3 form-control-label text-sm-right">{{ trans('master.confirm_new_password') }}:</label>
                            <div class="col-sm-9 renew-pass">
                                <input type="password" class="form-control" id="dlgEditProfile-newpassword2"
                                    data-parsley-error-message="{{  trans('/backoffice/login/login.err_password_notmatch') }}"
                                    data-parsley-equalto="#dlgEditProfile-newpassword" data-parsley-group="chpasswd">
                            </div>
                        </div>
                        <input type="hidden" id="dlgEditProfile-csrf" name="_csrf" value="" />
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
            <!-- End Modal Body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
                <button type="button" class="btn btn-primary"
                    id="dlgEditProfile-btn-save">{{trans('/master.btn_save')}}</button>
            </div>
        </div> <!-- End Modal Content -->
    </div> <!-- End modal-dialog -->
</div> <!-- End Modal -->

{!! $view->resource('js','js/backoffice/layout/_main-header.js') !!}

@if ( $encrypted_login )
<script>
{ !!$view -> asset('jsencrypt') !! }
var g_LoginPublicKey = "-----BEGIN PUBLIC KEY-----\n \
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqWTy7PbI+JrjA74TVFlj\n\
h++GGmOx3KLEQqjt8PUTPcVcevA++LW56e4GL/d0bv8XTlkm9o1bNvm1fqawcLan\n\
1aJcw8tQ+5lOD7Y9XHht0cfBCPQrnqNJ8IIzE/ZvOnls8zVirAkuqZONmy4N/6ev\n\
HmgXDmUUoqRdHoj85kZTSUvhMkhfiUrxQjorrwDUzLcNvU3BNhkZCovfUKyW0/e9\n\
RbI1xwIjVyF8gTt+HDU+YaL4QdmGl9Xdyv7s4ZQPooZHHspvslg/0hSbVTYDT2mp\n\
mX4nZA/UUDNc78lPAOerfOnYJq6OgslHW8Qwyjhr9+2Fa2d01/+1fI5JwWo3gyZ7\n\
hQIDAQAB\n\
-----END PUBLIC KEY-----"
var g_defaulProfileImage = "{!! $view->buildResourceSrc('images/home/profile.png') !!}"
var g_reloadAccountInfo = "{!! $reload_accountinfo_url !!}"
var user_ldap = < ? php echo json_encode($account_info); ? > ;
</script>
@endif
@endif