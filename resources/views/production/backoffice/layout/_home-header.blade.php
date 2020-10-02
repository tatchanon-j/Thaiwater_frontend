<?php
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
?>

<header class="main-header">
    <a href="{!! $l->httpUrl( '/backoffice') !!}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <img src="{!! $view->buildResourceSrc('images/NHC_logo_color.png') !!}" style="width: 50px;">
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <img src="{!! $view->buildResourceSrc('images/NHC_logo_color.png') !!}" style="width: 87px;">
        </span>
    </a>

    <nav class="navbar navbar-light" role="navigation" style="z-index:-1;padding: 0;height:51px">
        <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas"
		role="button"> <span class="sr-only">Toggle navigation</span> <span
		class="icon-bar"></span> <span class="icon-bar"></span> <span
		class="icon-bar"></span> <span class="site-name">{{trans('/site.name')}}</span>
	</a> -->
        <div class="navbar-custom-menu ml-auto form-row">
            <ul class="nav navbar-nav">
                <!-- @if ( $api->isAllowService('admin') )
			<li class="dropdown messages-menu"><a
			href="{!! $l->httpUrl( '/admin/group') !!}"> <i class="fa fa-lock"></i><span
			class="hidden-xs"> {{trans('/user/master.main-menu-admin')}}</span>
		</a></li> @endif -->
                <li class="nav-item dropdown user user-menu"><a href="#" class="dropdown-toggler"
                        data-toggle="dropdown"><i class="fa fa-user"></i><span class="d-none d-lg-inline">{{
					$account_info->full_name or ''}}</span> </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <p>{{ $account_info->full_name or ''}}</p>
                        </li>
                        <li class="user-footer">
                            <div class="text-center">
                                <button id="btn-editprofile" type="button"
                                    class="btn btn-default btn-flat pull-left hidden-xs" data-toggle="modal"
                                    data-target="#dlgEditProfile">{{ trans('/master.profile') }}</button>
                                <!-- <a href="javascript:apiService.logout('{{ $api->getLogoutToken() }}')"
							class="btn btn-default btn-flat pull-right hidden-xs">{{trans('master.logout')}}</a> -->
                            </div>
                        </li>

                    </ul>
                </li>
            </ul>
            <ul class="list-unstyled btn btn-seconary" style="padding-top:5px;">
                <li class="nav-item dropdown messages-menu">{!! $locale_switcher !!}</li>
            </ul>
            <ul class="nav navbar-nav nav-item">
                <li class="dropdown user user-menu">
                    <a href="javascript:apiService.logout('{{ $api->getLogoutToken() }}')" class=" pull-right">
                        <i class="fa fa-sign-out"></i>
                        <span class="d-none d-lg-inline">{{trans('/master.logout')}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

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
                                    data-parsley-validate-if-empty="true" data-parsley-group="chpasswd">
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
                                    data-parsley-error-message="{{  trans('/master.err_password_notmatch') }}"
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

{!! $view->asset('DataTables','DataTables-buttons','parsley') !!}
{!! $view->resource('js','js/backoffice/layout/_main-header.js') !!}

@if ( $encrypted_login )
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>

<script>
{ !!$view - > asset('jsencrypt') !! }
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