<?php
$api = \App\Helpers\ApiServiceHelper::getInstance();
$view = \App\Helpers\ViewHelper::getInstance();
$locale = \App\Helpers\LocaleHelper::getInstance();

$breadcrumb = $view->option('breadcrumb');
if (! is_array($breadcrumb)) {
    $breadcrumb = array();
}
$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);

$page_name = $view->option('page_name');
if (($title = $view->option('title')) == '') {
    $title = trans('site.title');

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
<link rel="shortcut icon" type="image/png" href="{{ $locale->httpUrl("/favicon.ico") }}"/>
<link rel="shortcut icon" type="image/png" href="{{ $locale->httpUrl("/apple-touch-icon.png") }}"/>

<title>{{ $title }}</title> {!! $view->asset('adminLTE','Font-Kanit','bootbox','apiservice'); !!} {!!
$view->resource('theme-css','css/styles.css') !!} {!!
$view->resource('theme-css','css/main.css') !!} {!!
$view->resource('theme-css','css/main-menu.css') !!}

@yield('extra_head') {!! $view->flushAsset(false); !!}

</head>

@section('content-box')
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">{{ $page_name }}</h3>
	</div>
	<div class="box-body">@yield('content')</div>
</div>
@stop

<body class="hold-transition skin-blue-light sidebar-mini">
	<div class="wrapper">
		@include('backoffice/layout/_home-header')
		<div class="content-wrapper">

			<section class="content">@yield('content-box')</section>
		</div>
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>{{ trans('master.version') }}</b> {{
				$view->getProjectVersion() }}
			</div>
			<div class="copyright">© {{ trans('site.copyright') }}</div>
		</footer>
	</div>
</body>
{!! $view->flushAsset(true); !!}
<script>
$( document ).ready(function() {
	apiService.init('{!! env("API_SERVER") !!}','{{ $csrf }}',apiService_Translator)
	{!! $view->option('js-init'); !!}
})
</script>
</html>
