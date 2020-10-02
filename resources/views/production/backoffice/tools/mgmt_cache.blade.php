@section('extra_head')

@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
    array(
        array(
            'href' => $l->httpUrl("backoffice/tools/mgmt_cache"),
            'text' => trans('backoffice/tools/mgmt_cache.main_menu_name')
        ),array(
            'text' => trans('backoffice/tools/mgmt_cache.page_name')
        )
    ));
$view->option('js-init','srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/tools/mgmt_cache.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/tools/mgmt_cache.css') !!}


@stop

@section('content')

<!-- data table -->
<div class="table-responsive">
  <table id="tbl-mgmt-cache" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('/master.col_order') }}</th>
        <th>{{ trans('/backoffice/tools/mgmt_cache.col_name') }}</th>
        <th>{{ trans('/backoffice/tools/mgmt_cache.col_latest_update') }}</th>
        <th>{{ trans('/backoffice/tools/mgmt_cache.col_updated') }}</th>
        <th>{{ trans('/backoffice/tools/mgmt_cache.col_read') }}</th>
        <th>{{ trans('/backoffice/tools/mgmt_cache.col_update') }}</th>
      </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end data table -->

@stop


{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/tools/mgmt_cache.js') !!}
