@extends('frontoffice/layout.master-thaiwater')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$api = \App\Helpers\ApiServiceHelper::getInstance();
$account_info = $api->getAccountInfo();

$navbar_custom_menu = array(
	array(
		'href' => $l->httpUrl('data_service'),
		'text' => trans('frontoffice/data_service/data_service.page_name'),
	),
	array(
		'href' => $l->httpUrl('data_service/history'),
		'text' => trans('frontoffice/data_service/history.page_name'),
	),
);
$view->option('navbar-custom-menu', $navbar_custom_menu);
?>

@section('ct')
<div class="col-sm-10 offset-sm-1">@yield('content')</div>
@stop
