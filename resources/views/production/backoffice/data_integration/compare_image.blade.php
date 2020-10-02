<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
array(
    array(
      'href' => $l->httpUrl("/backoffice/data_integration/mgmt_script"),
      'text' => trans('backoffice/data_integration/mgmt_script.main_menu_name')
    ),
    array(
        'text' => trans('backoffice/data_integration/compare_master.page_name_image')
    )
));
$view->option('js-init','srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_integration/compare_master.page_name_image'));
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/data_integration/compare_image.js') !!}

{!! $view->resource('js','js/ckeditor/ckeditor.js') !!}

{!! $view->resource('theme-css','css/backoffice/data_integration/compare_image.css') !!}

@extends('backoffice/layout/master')

@stop

@section('content')

<div class="div_main_table">
    <div class="data-filters col-sm-12">
        <form class="form-row">
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary" id="btn_reprocess">{{ trans('/backoffice/data_integration/compare_master.btn_reprocess') }}</button>
            </div>
            <div class="col-sm-8 offset-sm-1" style="padding-top: 5px;">
                <p>{{ trans('/backoffice/data_integration/compare_master.data_at') }}: <span class="last_update"></span></p>
            </div>
        </form>
    </div>

    <!-- data table -->
    <div class="table-responsive col-sm-12">
        <table id="tbl-compare-image" class="display image-datatables" width="100%">
            <thead>
                <tr>
                    <th>{{ trans('/backoffice/data_integration/compare_master.col_ex') }}</th>
                    <th>{{ trans('backoffice/data_integration/compare_master.col_media_type_id') }}</th>
                    <th>{{ trans('backoffice/data_integration/compare_master.col_media_type_name') }}</th>
                    <th>{{ trans('backoffice/data_integration/compare_master.col_media_subtype_name') }}</th>
                    <th>{{ trans('backoffice/data_integration/compare_master.col_nhc_row_count') }}</th>
                    <th>{{ trans('backoffice/data_integration/compare_master.col_nhc_file_count') }}</th>
                    <th>{{ trans('backoffice/data_integration/compare_master.col_row_diff') }}</th>
                    <th>{{ trans('backoffice/data_integration/compare_master.col_last_migrate_date') }}</th>
                    <th>{{ trans('backoffice/data_integration/compare_master.col_last_update') }}</th>
                    <th>{{ trans('backoffice/data_integration/compare_master.col_thaiwater30_convert_success') }}</th>
                    <th>{{ trans('backoffice/data_integration/compare_master.col_thaiwater30_convert_error') }}</th>
                    <th>{{ trans('backoffice/data_integration/compare_master.col_thaiwater30_file_count') }}</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="4"><b>{{ trans('/master/col_total') }}</b></td>
                    <td><b><span style="float:right;" id="total_nhc_row_count"></span></b> </td>
                    <td><b><span style="float:right;" id="total_nhc_file_count"></span></b> </td>
                    <td><b><span style="float:right;" id="total_row_diff"></span></b> </td>
                    <td colspan="2"><b><span style="float:right;" id="total_last_update"></span></b> </td>
                    <td><b><span style="float:right;" id="total_thaiwater30_convert_success"></span></b> </td>
                    <td><b><span style="float:right;" id="total_thaiwater30_convert_error"></span></b> </td>
                    <td><b><span style="float:right;" id="total_thaiwater30_file_count"></span></b> </td>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
    <!-- end data table -->
</div>

<div class="div_detail_table row" style="display:none">
    <div class="div_nhc_table col-sm-6">
        <h4>{{ trans('/backoffice/data_integration/compare_master.img_nhc') }}</h4>
        <div class="table-responsive">
            <img class="img-nhc"/>
            <p class="no-image-nhc"></p>
        </div>
    </div>
    <div class="dev_tw30_table col-sm-6">
        <h4>{{ trans('/backoffice/data_integration/compare_master.img_thaiwater30') }}</h4>
        <div class="table-responsive">
            <img class="img-tw30"/>
            <p class="no-image-tw30"></p>
        </div>
    </div>
    <div class="text-center col-sm-12" style="margin-top:2%">
        <button id="btn-cancel" type="button" class="btn btn-default center" data-dismiss="modal">{{ trans("/master.btn_close") }}</button>
    </div>
</div>

@stop
<!-- end modal -->
