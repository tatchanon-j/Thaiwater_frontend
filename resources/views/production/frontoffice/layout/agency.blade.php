@extends('frontoffice/layout.master-thaiwater')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$navbar_custom_menu = array(
	array(
		'href' => $l->httpUrl('agency/agency_summary'),
		'text' => trans('frontoffice/agency/summary.page_name'),
	),
	array(
		'href' => $l->httpUrl('agency/agency_shopping'),
		'text' => trans('frontoffice/agency/shopping.page_name'),
	),
);
$view->option('navbar-custom-menu', $navbar_custom_menu);
?>

@section('ct')
<div class="col-sm-10 offset-sm-1">@yield('content')</div>
@stop
