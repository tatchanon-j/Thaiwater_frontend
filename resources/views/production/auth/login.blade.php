<?php
const MODE_PASSWORD_LOGIN=0;
const MODE_PASSWORD_RESET=1;
const MODE_PASSWORD_EXPIRED=2;


$view = \App\Helpers\ViewHelper::getInstance();

$encrypted_login = substr(env('API_SERVER'),0,5) != "https";
$view->option('js-init','initPage();');
$recaptcha_src = "https://www.google.com/recaptcha/api.js?hl=" . \App\Helpers\LocaleHelper::getInstance()->getLocale();
if ( !isset($error_code) ) {
	$error_code = "";
}

$page_mode = MODE_PASSWORD_LOGIN;
if ( $error_code == "E008" ) {
	$page_mode = MODE_PASSWORD_EXPIRED;
} else {
	if ( !empty($resetpassword_key) ) {
		$page_mode = MODE_PASSWORD_RESET;
	}
}

switch ( $page_mode ) {
	case MODE_PASSWORD_EXPIRED:
		$password_prompt = trans('auth/login.password_old');
		$password_prompt_retype = trans('auth/login.password_new_retype');
		$button_prompt = trans('auth/login.setnewpassword');
		$readonly_user = false;
		break;
	case MODE_PASSWORD_RESET:
		$password_prompt = trans('auth/login.password');
		$password_prompt_retype = trans('auth/login.password_retype');
		$button_prompt = trans('auth/login.setnewpassword');
		$readonly_user = true;
		break;
	default:
		$password_prompt = trans('auth/login.password');
		$password_prompt_retype = trans('auth/login.password_retype');
		$button_prompt = trans('auth/login.login');
		$readonly_user = false;
}

$error_msg = trans('auth/login.' .	$error_code);
if ( $error_code == "E005" || $error_code == "E006" ) {
	$at = 0;
	if ( isset($error_info->attempt_allow)) {
		$at = intval($error_info->attempt_allow);
	}
	$bs = 0;
	if ( isset($error_info->block_seconds)) {
		$bs = intval($error_info->block_seconds);
	}

	if ( $at >0 && $bs > 0 ) {
		$error_msg = sprintf($error_msg,$at, ceil($bs/60.0));
	}
}

?>

@section('extra_head')
{!! $view->asset('parsley') !!}
{!! $view->resource('theme-css','css/auth/login.css') !!}
<style>
.g-recaptcha {
    transform: scale(0.925);
    -webkit-transform: scale(0.925);
    transform-origin: 0 0;
    -webkit-transform-origin: 0 0;
}

#resetpassword-recaptcha {
    margin: 10px auto;
}
</style>

@if ( !empty($captcha_key) )
<script src="{{$recaptcha_src}}" async defer></script>
@endif @if ( $encrypted_login )
<script>
{!! $view -> asset('jsencrypt') !!}
var g_LoginPublicKey = "-----BEGIN PUBLIC KEY-----\n \
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqWTy7PbI+JrjA74TVFlj\n\
h++GGmOx3KLEQqjt8PUTPcVcevA++LW56e4GL/d0bv8XTlkm9o1bNvm1fqawcLan\n\
1aJcw8tQ+5lOD7Y9XHht0cfBCPQrnqNJ8IIzE/ZvOnls8zVirAkuqZONmy4N/6ev\n\
HmgXDmUUoqRdHoj85kZTSUvhMkhfiUrxQjorrwDUzLcNvU3BNhkZCovfUKyW0/e9\n\
RbI1xwIjVyF8gTt+HDU+YaL4QdmGl9Xdyv7s4ZQPooZHHspvslg/0hSbVTYDT2mp\n\
mX4nZA/UUDNc78lPAOerfOnYJq6OgslHW8Qwyjhr9+2Fa2d01/+1fI5JwWo3gyZ7\n\
hQIDAQAB\n\
-----END PUBLIC KEY-----"
</script>
@endif

@extends('auth/master')

@stop

@section('content')
<div class="login-page" id="test">
    <div class="form rounded" style="background-color: rgba(255,255,255,0.5)">

            <img src="{!! $view->buildResourceSrc('images/banner-haii.jpg') !!}" class="img-responsive rounded justify-content-start" />

            <h1 class="text-center">{{ trans('/site.name_login') }}</h1>
            @if ( !empty($error_code) )
            <p class="error text-left">{{ $error_msg }}</p>
            @endif
            <form class="login-form justify-content-center" method="post" id="frm-login"
                action="{{ $apilogin_url or ''}}">

                <input class="rounded" type="text" name="username" id="username" value="{{ $user_name or '' }}"
                    placeholder="{{ trans('auth/login.user_name') }}" {{$readonly_user ? "readonly" : ""}} />

                <input class="rounded" type="password" name="password" id="password1"
                    placeholder="{{ $password_prompt }}" @if ( $page_mode==MODE_PASSWORD_RESET )
                    data-parsley-error-message="{{  trans('/master.msg_err_require_pass') }}" data-toggle="tooltip"
                    title="{{ trans('/master.msg_tooltrip_pass') }}" @endif />

                @if ( $page_mode == MODE_PASSWORD_EXPIRED )
                <input type="password" name="password_new" id="password_new"
                    placeholder="{{ trans('auth/login.password_new') }}"
                    data-parsley-error-message="{{  trans('/master.msg_tooltrip_pass') }}"
                    data-parsley-pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%^*?+=-_])[A-Za-z\d$@$!%^*?+=-_]{8,}"
                    data-toggle="tooltip" title="{{ trans('/master.msg_tooltrip_pass') }}" />
                @endif

                @if ( $page_mode == MODE_PASSWORD_RESET || $page_mode == MODE_PASSWORD_EXPIRED )
                <input type="password" id="password2" placeholder="{{ $password_prompt_retype }}"
                    data-parsley-error-message="{{  trans('/master.msg_tooltrip_pass') }}"
                    data-parsley-pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%^*?+=-_])[A-Za-z\d$@$!%^*?+=-_]{8,}"
                    data-toggle="tooltip" title="{{ trans('/master.msg_tooltrip_pass') }}" />
                @endif
                @if (!empty($captcha_key) )
                <div class="g-recaptcha" data-sitekey="{{$captcha_key}}"></div>
                @endif

                <button id="btn-submit" class="rounded">{{ $button_prompt }}</button><br>

                @if ( $page_mode == MODE_PASSWORD_RESET )
                <input type="hidden" name="resetpassword_key" value="{{ $resetpassword_key }}" />
                @else
                @if ( $page_mode == MODE_PASSWORD_LOGIN )
                <div class="pull-right">
                    <a href="#" id="btn-show-resetpassword">{{trans('auth/login.forgot_password') }}</a>
                </div>
                @endif
                @endif
                <input type="hidden" id="nonce-key" name="nonce_key" value="" />
                <input type="hidden" id="login-token" name="{{ \App\Helpers\ApiServiceHelper::AUTH_TOKEN_NAME }}"
                    value="{{ $auth_token}}" />
            </form>

        <!-- <div class="card col-sm-6" style="border-radius: 20px">
            <div class="card-body ">
                <div class="list-group">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                        <p class="mb-1 text-left badge badge-dark" style="font-size: .7rem;">ข้อมูลตรวจอัตโนมัติฝนเขต
                                (ยกเลิกการเชื่อมโยง)</p>
                            <span class="badge badge-warning text-center ml-2" style="border-radius: 35px;">3 day ago</span>
                        </div>
                        <p class="mb-1 text-left text-muted" style="font-size: .6rem">สำนักการระบายน้ำ กรุงเทพมหานคร</p>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                        <p class="mb-1 text-left badge badge-dark" style="font-size: .7rem;">ข้อมูลตรวจอัตโนมัติฝนเขต
                                (ยกเลิกการเชื่อมโยง)</p>
                            <span class="badge badge-warning text-center ml-2" style="border-radius: 35px;">3 day ago</span>
                        </div>
                        <p class="mb-1 text-left text-muted" style="font-size: .6rem">สำนักการระบายน้ำ กรุงเทพมหานคร</p>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                        <p class="mb-1 text-left badge badge-dark" style="font-size: .7rem;">ข้อมูลตรวจอัตโนมัติฝนเขต
                                (ยกเลิกการเชื่อมโยง)</p>
                            <span class="badge badge-warning text-center ml-2" style="border-radius: 35px;">3 day ago</span>
                        </div>
                        <p class="mb-1 text-left text-muted" style="font-size: .6rem">สำนักการระบายน้ำ กรุงเทพมหานคร</p>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                        <p class="mb-1 text-left badge badge-dark" style="font-size: .7rem;">ข้อมูลตรวจอัตโนมัติฝนเขต
                                (ยกเลิกการเชื่อมโยง)</p>
                            <span class="badge badge-warning text-center ml-2" style="border-radius: 35px;">3 day ago</span>
                        </div>
                        <p class="mb-1 text-left text-muted" style="font-size: .6rem">สำนักการระบายน้ำ กรุงเทพมหานคร</p>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                        <p class="mb-1 text-left badge badge-dark" style="font-size: .7rem;">ข้อมูลตรวจอัตโนมัติฝนเขต
                                (ยกเลิกการเชื่อมโยง)</p>
                            <span class="badge badge-warning text-center ml-2" style="border-radius: 35px;">3 day ago</span>
                        </div>
                        <p class="mb-1 text-left text-muted" style="font-size: .6rem">สำนักการระบายน้ำ กรุงเทพมหานคร</p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>

<!-- Modal -->
<div id="dlgResetPassword" class="modal fade" role="dialog" style="display:none">
    <div class="modal-dialog login-page">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="box-title">
                    <b>
                        <center>{{ trans('master.forget_password') }}</center>
                    </b>
                </h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- end modal- header -->

            <div class="modal-body">
                <div>
                    <input class="form-control" type="text" id="resetpassword-email"
                        placeholder="{{ trans('master.email') }}">
                    <div id="resetpassword-recaptcha"></div>
                    <div class="text-center"><button type="button" class="btn btn-primary"
                            id="btn-send-resetpassword">ส่ง</button></div>
                </div>
            </div>
            <!--  end modal body -->
        </div>
        <!-- end modal content-->
    </div>
</div>
<!--  end modal-->

<script>
var resetpassword_captchakey = "{{env('API_RECAPCHAKEY')}}"
var recaptcha_src = "{{$recaptcha_src}}"
var resetpassword_captchaid = -1
var MODE_PASSWORD_LOGIN = 0
var MODE_PASSWORD_RESET = 1
var MODE_PASSWORD_EXPIRED = 2
var page_mode = {!!json_encode($page_mode) !!}
var nonce_key_name = "apiservice_{{env('API_SERVER')}}_nonce_key"

var loginTranslator = {
    'err_resetpassword_nodata': '{{ trans("auth/login.err_resetpassword_nodata") }}',
    'err_resetpassword_noemail': '{{ trans("auth/login.err_resetpassword_noemail") }}',
    'err_resetpassword_norecapchar': '{{ trans("auth/login.err_resetpassword_norecapchar") }}',
    'err_login_nopassword': '{{ trans("auth/login.err_login_nopassword") }}',
    'err_login_nonewpassword': '{{ trans("auth/login.err_login_nonewpassword") }}',
    'resetpassword_success': '{{ trans("auth/login.resetpassword_success") }}',
    'err_password_notmatch': '{{ trans("auth/login.err_password_notmatch") }}',
    'err_toomany_resetpassword': '{{ trans("auth/login.err_password_notmatch") }}',
    'err_email_notfound': '{{ trans("auth/login.err_email_notfound") }}',
    'err_old_password_null': '{{ trans("auth/login.err_old_password_null")}}',
    'err_notalocalaccount': '{{ trans("auth/login.err_notalocalaccount")}}'
}

function sendResetPassword() {
    var params = {}

    params["email"] = $('#resetpassword-email').val()
    params["captcha"] = grecaptcha.getResponse(resetpassword_captchaid)
    var token = $('#login-token')
    params[token.attr('name')] = token.val()

    if (params["email"] == "" && params["captcha"] == "") {
        bootbox.alert(loginTranslator['err_resetpassword_nodata'])
        return;
    } else if (params["email"] == "") {
        bootbox.alert(loginTranslator['err_resetpassword_noemail'])
        return;
    } else if (params["captcha"] == "") {
        bootbox.alert(loginTranslator['err_resetpassword_norecapchar'])
        return;
    }

    apiService.SendRequest("POST", "auth/resetpassword", params, showResetPasswordResult)
}

function showResetPasswordResult(data) {
    $('#dlgResetPassword').modal('hide')
    if ("success" in data && data.success) {
        bootbox.alert(loginTranslator['resetpassword_success'])
    } else {
        var s = "Error: "
        if ("error" in data) {
            switch (data.error) {
                case "EventAuthErrorNotALocalAccount":
                    s = loginTranslator['err_notalocalaccount']
                    break
                case "EventAuthErrorTooManyResetPasswordRequest":
                    s = loginTranslator['err_toomany_resetpassword']
                    break
                case "EventAuthErrorUnknownAccount":
                    s = loginTranslator['err_email_notfound']
                    break
            }
        }
        if ("error_detail" in data && data.error_detail != "") {
            s += " ..." + data.error_detail
        }
        bootbox.alert(s)
    }
}

function showResetPassword() {

    $('[data-toggle="tooltip"]').tooltip();

    if (typeof grecaptcha == "undefined") {
        $.getScript(recaptcha_src + '&onload=renderResetPasswordCaptcha&render=explicit')
    } else {
        renderResetPasswordCaptcha()
    }
}

function renderResetPasswordCaptcha() {
    if (resetpassword_captchaid >= 0) {
        grecaptcha.reset(resetpassword_captchaid)
    } else {
        resetpassword_captchaid = grecaptcha.render('resetpassword-recaptcha', {
            'sitekey': resetpassword_captchakey, // required
        })
    }

    $('#dlgResetPassword').modal('show')
}

function validateLoginForm() {
    var frm = $('#frm-login')
    frm.parsley().validate()
    if (!frm.parsley().isValid()) {
        return false
    }

    var pw1 = $('#password1')

    switch (page_mode) {
        case MODE_PASSWORD_LOGIN:
            if (pw1.val() == "" || $('#username').val() == "") {
                bootbox.alert(loginTranslator['err_login_nopassword'])
                return false
            }
            break;
        case MODE_PASSWORD_RESET:
            if (pw1.val() == "" || $('#username').val() == "") {
                bootbox.alert(loginTranslator['err_login_nopassword'])
                return false
            }
            if (pw1.val() != $('#password2').val()) {
                bootbox.alert(loginTranslator['err_password_notmatch'])
                return false
            }
            break;
        case MODE_PASSWORD_EXPIRED:
            if (pw1.val() == "" || $('#username').val() == "") {
                bootbox.alert(loginTranslator['err_old_password_null'])
                return false
            }
            var pw_new = $('#password_new')
            if (pw_new.val() == "") {
                bootbox.alert(loginTranslator['err_login_nonewpassword'])
                return false
            }
            if (pw_new.val() != $('#password2').val()) {
                bootbox.alert(loginTranslator['err_password_notmatch'])
                return false
            }
            break;
    }

    return true;
}

function submitForm(e) {
    e.preventDefault()
    if (!validateLoginForm()) {
        return
    }

    // Create random 32 bytes (64 hexs) nonce key and store in in localStorage
    var nonce_key = ""
    while (nonce_key.length < 64) {
        var d = Math.random().toString(16)
        var p = d.indexOf('.')
        nonce_key += d.substr(p + 1)
    }
    nonce_key = nonce_key.substr(0, 64)
    var plain_nonce_key = nonce_key

    if (typeof g_LoginPublicKey != "undefined") {
        var pw1 = $('#password1')

        var encrypt = new JSEncrypt()
        encrypt.setPublicKey(g_LoginPublicKey)

        pw1.val(encrypt.encrypt(pw1.val()))

        if (page_mode == MODE_PASSWORD_EXPIRED) {
            var pw_new = $('#password_new')
            pw_new.val(encrypt.encrypt(pw_new.val()))
        }

        nonce_key = encrypt.encrypt(plain_nonce_key)
        console.log(nonce_key);
    }

    localStorage.setItem(nonce_key_name, plain_nonce_key)
    localStorage.setItem(nonce_key_name + "_created_at", new Date())
    $('#nonce-key').val(nonce_key)

    $('#frm-login').submit()
}

function initPage() {
    $('#btn-submit').on('click', submitForm)
    $('#btn-show-resetpassword').on('click', showResetPassword)
    $('#btn-send-resetpassword').on('click', sendResetPassword)
}
</script>
@stop