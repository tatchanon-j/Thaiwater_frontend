<?php
$api = \App\Helpers\ApiServiceHelper::getInstance();
$view = \App\Helpers\ViewHelper::getInstance();
$locale = \App\Helpers\LocaleHelper::getInstance();

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

    <title>{{ $title }}</title>
    {!! $view->asset('favicon','adminLTE','Font-Kanit','bootbox','parsley','apiservice','bootstrap','moment','numeral','JsonHelper'); !!}
    {!! $view->resource('theme-css','css/main.css') !!}
    {!! $view->resource('theme-css','css/main-menu.css') !!}

    @yield('extra_head') {!! $view->flushAsset(false); !!}

</head>

<body class="">
    <div class="wrapper" >
        @yield('content-center')
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
