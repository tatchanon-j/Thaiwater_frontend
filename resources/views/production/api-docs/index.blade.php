<?php
$view = \App\Helpers\ViewHelper::getInstance();
$lang = \App\Helpers\LocaleHelper::getInstance();

$view->option('page_name', trans('api-docs/api-docs.index_title'));
$view->option('language_switcher', $lang->buildSwitcher('dropup', 'CHANGE LANGUAGE'));
?>

<!DOCTYPE html>
<html lang="{{ $lang->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ $view->option('page_name') }}</title>
	{!! $view->asset('bootstrap'); !!}
	{!! $view->resource('theme-css','css/styles.css') !!}
	{!! $view->flushAsset(false); !!}
	<style type="text/css">
	div.locale-switcher {
		display: inline-block;
	}

	div.locale-switcher img {
		margin-right: 4px;
	}

	body {
		background: #3c8dbc; /* fallback for old browsers */
		background: -webkit-linear-gradient(right, #3c8dbc, #5397d9);
		background: -moz-linear-gradient(right, #3c8dbc, #5397d9);
		background: -o-linear-gradient(right, #3c8dbc, #5397d9);
		background: linear-gradient(to left, #3c8dbc, #5397d9);
	}

	A {
		color: black;
	}

	A:visited {
		color: black;
	}
	</style>
</head>
<body class="{{ $view->option('bodyclass') }}">
	<header class="api-docs-header"></header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<H2>{{ trans('api-docs/api-docs.docs_list') }}</H2>
				<UL>
					<LI>
						<a href="{{$lang->httpUrl('api-docs/public')}}">
							{{ trans('api-docs/api-docs.docs_public') }}
						</a>
					</LI>
					<LI>
						<a href="{{$lang->httpUrl('api-docs/webservice')}}">
							{{ trans('api-docs/api-docs.docs_webservice') }}
						</a>
					</LI>
					<LI>
						<a href="{{$lang->httpUrl('api-docs/agent')}}">
							{{ trans('api-docs/api-docs.docs_agent') }}
						</a>
					</LI>
					<LI>
						<a href="{{$lang->httpUrl('api-docs/dataservice')}}">
							{{ trans('api-docs/api-docs.docs_dataservice') }}
						</a>
					</LI>
					<LI>
						<a href="{{$lang->httpUrl('api-docs/provinces')}}">
							{{ trans('api-docs/api-docs.docs_provinces') }}
						</a>
					</LI>
					<LI>
						<a href="{{$lang->httpUrl('api-docs/test')}}">
							{{ trans('api-docs/api-docs.docs_training') }}
						</a>
					</LI>
					<LI>
						<a href="{{$lang->httpUrl('api-docs/mobile')}}">
							{{ trans('api-docs/api-docs.docs_mobile') }}
						</a>
					</LI>
				</UL>
			</div>
		</div>
	</div>
	<footer class="api-docs-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 text-center">
					<div class="copyright">© {{ trans('site.copyright') }}</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					<div class="locale-switcher">{!! $lang->buildSwitcher('dropup','CHANGE LANGUAGE') !!}</div>
				</div>
			</div>
		</div>
	</footer>
	{!! $view->flushAsset(true); !!}
	<script>
	$( document ).ready(function() {
		{!! $view->option('js-init'); !!}
	})

	</script>
</body>
</html>
