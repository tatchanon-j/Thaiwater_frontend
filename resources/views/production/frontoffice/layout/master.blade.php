<?php
$api = \App\Helpers\ApiServiceHelper::getInstance();
$view = \App\Helpers\ViewHelper::getInstance();
$locale = \App\Helpers\LocaleHelper::getInstance();

$breadcrumb = $view->option('breadcrumb');
if (!is_array($breadcrumb)) {
	$breadcrumb = null;
}
$breadcrumb_footer = $view->option('breadcrumb_footer');
if (!is_array($breadcrumb_footer)) {
	$breadcrumb_footer = null;
}

$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);

$page_name = $view->option('page_name');
if (($title = $view->option('title')) == '') {
	$title = trans('frontoffice/site.title');

	if ($page_name != '') {
		$title = $page_name . ' - ' . $title;
	}
}

?>
<!DOCTYPE html>
<html lang="{{ $locale->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ $locale->httpUrl('/favicon.ico') }}"/>
    <link rel="shortcut icon" type="image/png" href="{{ $locale->httpUrl('/apple-touch-icon.png') }}"/>

    <title>{{ $title }}</title>
    {{ $view->asset('jquery','select2','adminLTE','Font-Kanit','bootbox','parsley','apiservice','moment','numeral','JsonHelper') }}
    {{ $view->resource('theme-css','css/styles.css') }}
    {{ $view->resource('theme-css','css/main.css') }}
    {{ $view->resource('theme-css','css/main-menu.css') }}
    {{ $view->resource('theme-css','css/web-font.css') }}

    {{ $view->resource('theme-css','css/frontoffice/home/main.css') }}
    @yield('extra_head') {!! $view->flushAsset(false); !!}

    <link href="https://fonts.googleapis.com/css?family=Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900&amp;subset=thai" rel="stylesheet">
</head>

@section('content-box')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $page_name }}</h3>
    </div>
    <div class="box-body">@yield('content')</div>
</div>
@stop

<body class="hold-transition skin-blue-light " data-spy="scroll" data-target="#scrollspy" data-offset="0">
    <div class="wrapper">
        @include('frontoffice/layout/_main-header')
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <section class="row" id="content-header">
                        @yield('before-content')
                    </section>
                    <section class="content">
                        @yield('ct')
                    </section>
                    @yield('before-footer')
                </div>
            </div>
        </div>
        <footer class="main-footer">
            <!--<div class="copyright text-center"> {{ trans('master.copyright') }}</div> -->
             <div class="row footer" style="padding: 5px 15px;background-color: #033375;color:#fff!important;font-family: Kanit;">
            <div class="col-md-6 text-left">สำนักงานทรัพยากรน้ำแห่งชาติ (สทนช.)</div>

            <div class="col-md-6">
                <div class="copyright text-right"> <!-- <a href="http://www.haii.or.th" target="_blank"><?php echo e(trans('master.copyright')); ?></a> -->
                    ข้อมูลจาก : ระบบคลังข้อมูลน้ำและภูมิอากาศแห่งชาติ
                </div>
            </div>
        </div>
        </footer>
    </div>
    <div class="ajax-loading-modal"><!-- Place at bottom of page --></div>
</body>
{!! $view->flushAsset(true); !!}
<script>
$( document ).ready(function() {
    var body = $('body')
	$(document).ajaxStart(function() {
		body.addClass("ajax-loading")
  	})
  	$(document).ajaxStop(function() {
		body.removeClass("ajax-loading");
 	})

    apiService.init('{!! env("API_SERVER") !!}','{{ $csrf }}',apiService_Translator)
    {!! $view->option('js-init'); !!}
})
</script>
</html>
