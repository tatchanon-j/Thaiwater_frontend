@section('extra_head')
@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('main-menu-mode', 'admin');
$view->option('breadcrumb',
array(
    array(
        'href' => $l->httpUrl("backoffice/admin/group"),
        'text' => 'บริหารจัดการสิทธิ์'
    ),
    array(
        'href' => $l->httpUrl("backoffice/admin/unittest"),
        'text' => 'unit Test'
    )
));
$view->option('js-init', 'unittest.init();');
$view->option('page_name', 'unit Test');
?>


{!! $view->resource('theme-css','css/mocha.css') !!}
@stop @section('content')
<div id="mocha"></div>
@stop

{!! $view->resource('js','js/unittest/mocha.js') !!}
{!! $view->resource('js','js/unittest/chai.js') !!}
{!! $view->resource('js','js/backoffice/admin/unittest.js') !!}
{!! $view->resource('js','js/unittest/service/metadata/metadata.js') !!}
{!! $view->resource('js','js/unittest/service/metadata/summary_meta.js') !!}
{!! $view->resource('js','js/unittest/service/metadata/department.js') !!}

{!! $view->resource('js','js/unittest/service/event_management/event_method.js') !!}
{!! $view->resource('js','js/unittest/service/event_management/event_target.js') !!}
{!! $view->resource('js','js/unittest/service/event_management/event_type.js') !!}

{!! $view->resource('js','js/unittest/service/data_integration_report/report_event.js') !!}

{!! $view->resource('js','js/unittest/service/data_management/monitor_data.js') !!}
{!! $view->resource('js','js/unittest/service/data_management/record_data.js') !!}
{!! $view->resource('js','js/unittest/service/data_management/error_data.js') !!}

{!! $view->resource('js','js/unittest/service/dba/delete_data.js') !!}
{!! $view->resource('js','js/unittest/service/dba/manage_partition.js') !!}

{!! $view->resource('js','js/unittest/service/apis/key_access_mgmt.js') !!}
{!! $view->resource('js','js/unittest/service/apis/monitor.js') !!}

{!! $view->resource('js','js/unittest/service/data_integration/mgmt_script.js') !!}
{!! $view->resource('js','js/unittest/service/data_integration/mgmt_conv.js') !!}
{!! $view->resource('js','js/unittest/service/data_integration/mgmt_metadata.js') !!}
{!! $view->resource('js','js/unittest/service/data_integration/hi_script.js') !!}
