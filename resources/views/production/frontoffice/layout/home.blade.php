@extends('frontoffice/layout.master')
<?php
$api = \App\Helpers\ApiServiceHelper::getInstance();
$view = \App\Helpers\ViewHelper::getInstance();
$locale = \App\Helpers\LocaleHelper::getInstance();

$navbar_custom_menu = array(
	array(
		'href' => $locale->httpUrl(' '),
		'text' => trans('frontoffice/layout/menu.main-menu-thailand'),
	),
	array(
		'href' => '#',
		'text' => trans('frontoffice/layout/menu.main-menu-guide'),
	),
	array(
		// 'href' => $locale->httpUrl('http://www.thaiwater.net/v3/about'),
		//'href' => 'http://www.thaiwater.net/v3/about',
		// 'href' => $locale->httpUrl('about'),
        'href' => '#',
		'text' => trans('frontoffice/layout/menu.main-menu-aboutus'),
	),
	array(
		// 'href' => $locale->httpUrl('contactus'),
        'href' => '#',
		'icon' => '<i class="fa fa-map" aria-hidden="true"></i>',
		'text' => trans('frontoffice/layout/menu.main-menu-contactus'),

	),
);
$view->option('navbar-custom-menu', $navbar_custom_menu);

$breadcrumb = $view->option('breadcrumb');
if (!is_array($breadcrumb)) {
	$breadcrumb = null;
}
$breadcrumb_footer = $view->option('breadcrumb_footer');
if (!is_array($breadcrumb_footer)) {
	$breadcrumb_footer = null;
}
?>
@section('before-content')
@if (! is_null ($breadcrumb) )
<div class="ml-auto">  
    <ol class="breadcrumb form-inline">
        @foreach($breadcrumb as $b)
        @if( isset( $b['href'] ) )
        <li><a href="{!! $b['href'] !!}" role="button" target="_blank" class="{!! $b['class'] !!}" {!! $b['disabled'] !!}>{!! $b['text'] !!}</a></li>
        @else
        <li>{!! $b['text'] !!}</li>
        @endif
        @endforeach
    </ol>
</div>
@endif
@stop

@section('ct')
<div class="box box-default">
    <div class="box-body" id="body">
        @yield('content-center')
    </div>
    <!-- /.box-body -->
</div>

@stop

@section('before-footer')
@if (! is_null( $breadcrumb_footer ) )
<div class="row justify-content-center">
    <ol class="breadcrumb form-inline">
        @foreach($breadcrumb_footer as $b)
        @if( isset( $b['href'] ) )
        <li><a href="{!! $b['href'] !!}" role="button" target="_blank" class="{!! $b['class'] !!}" {!! $b['disabled'] !!}>{!! $b['text'] !!}</a></li>
        @else
        <li>{!! $b['text'] !!}</li>
        @endif
        @endforeach
    </ol>
</div>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-83737647-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-83737647-4');
</script>
@endif
@stop
