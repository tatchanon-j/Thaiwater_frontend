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
        'href' => $l->httpUrl("backoffice/metadata/metadata"),
        'text' => trans('backoffice/metadata/metadata.main-menu-mode')
    ),
    array(
        'text' => trans('backoffice/metadata/frequency.page_name')
    ),
));
$view->option('js-init','srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/metadata/frequency.page_name'));
?>
{!! $view->resource('theme-css','css/backoffice/metadata/frequncy.css') !!}

@stop

@section('content')

<div id="" class="table-responsive">
    <table id="tbl-frequncy" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{ trans("/master.col_order")}}</th>
                <th>{{ trans('/backoffice/metadata/frequency.col_frequency') }}</th>
                <th>{{ trans("/master.col_edit")}}</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>


<div class="modal fade" id="dlgEditFrequncy" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="dlgEditFrequncy-title"></h4>
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form id="dlgEditFrequncy-form" class="">
                    <input type="hidden" id="dlgEditFrequncy-id" name="id" />
                    <input type="hidden" id="dlgEditFrequncy-category" name="category" />
                    <div class="form-group row">
                        <label class="col-form-label text-sm-right col-sm-3" for="dlgEditUnit-name"> <span class="color-red">*</span>{{ trans('/backoffice/metadata/frequency.label_frequency') }}:</label>
                        <div class="col-sm-9">
                            <input  id="dlgEditFrequncy-th" type="text" class="form-control"
                            name="name" data-parsley-required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-sm-right col-sm-3" for="dlgEditConvertUnit-name"> <span class="color-red">*</span>{{ trans('/backoffice/metadata/frequency.label_convert_to_minute') }}:</label>
                        <div class="col-sm-9">
                            <input id="dlgEditFrequncy-convert" type="number" min="0" class="form-control"
                            name="convert" data-parsley-required data-parsley-error-message='{{ trans("/master.msg_err_require_number") }}' />
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('/master.btn_cancel') }}</button>
                <button type="button" class="btn btn-primary"
                id="dlgEditFrequncy-save-btn">{{ trans('/master.btn_save') }}</button>
            </div>
        </div>
    </div>
</div>


@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect') !!}
{!! $view->resource('js','js/backoffice/metadata/frequency.js') !!}
