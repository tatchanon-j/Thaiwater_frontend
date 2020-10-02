@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

// $view->option('main-menu-mode', 'admin');
$view->option('breadcrumb',
array(
    array(
        'text' => trans('backoffice/data_service/data_service.main_menu_name')
    ),
    array(
        'href' => $l->httpUrl("backoffice/data_service/data_service_management"),
        'text' => trans("backoffice/data_service/data_service_management.page_name")
    )
));
$view->option('js-init','srvDSM.init(group_Translator)');
$view->option('page_name', trans("backoffice/data_service/data_service_management.page_name"));
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-datepicker') !!}
{!! $view->resource('js','js/backoffice/data_service/data_service.js') !!}
{!! $view->resource('js','js/backoffice/data_service/data_service_management.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_service/data_service_management.css') !!}
@stop

@section('content')
<div class="bootbox modal fade" id="modal-info" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <h3 id="info-purpose"></h3>
                <table id="table-info" class="table info-table display" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ trans('backoffice/data_service/data_service_management.table-metadataname') }}</th>
                            <th>{{ trans('backoffice/data_service/data_service_management.table-frequency') }}</th>
                            <th>{{ trans('backoffice/data_service/data_service_management.table-agency') }}</th>
                            <th>{{ trans('backoffice/data_service/data_service_management.table-servicemethod') }}</th>
                            <th>{{ trans('backoffice/data_service/data_service_management.table-duration') }}</th>
                            <th>{{ trans('backoffice/data_service/data_service_management.table-province') }}</th>
                            <th>{{ trans('backoffice/data_service/data_service_management.table-result') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="data-filters">
    <form class="form-inline" id="form-management">

        <div class="col-sm-6 form-group" id="space-bottom">
            <label for="input-datestart" class="col-sm-4 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_management.input-datestart') }}</label>
            <div class="col-sm-8"  id='' >
                <input type="text" class="form-control"  id="input-datestart" name="datestart" data-provide="datepicker" data-date-format="yyyy-mm-dd"/>
            </div>
        </div>

        <div class="col-sm-6 form-group">
            <label for="input-dateend" class="col-sm-4 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_management.input-dateend') }} </label>
            <div class="col-sm-8"  id='datetimepicker-end'>
                <input type="text" class="form-control"  id="input-dateend" name="dateend" data-provide="datepicker" data-date-format="yyyy-mm-dd"/>
            </div>
        </div>

        <div class="form-group col-sm-6">
            <label for="filter-agency" class="col-sm-4 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_management.input-agency') }} </label>
            <div class="col-sm-8">
                <select name="agency_id" id="filter-agency" class="form-control">
                    <option value="0">{{ trans('backoffice/data_service/data_service_management.show_all') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group col-sm-6">
            <label for="filter-status" class="col-sm-4 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_management.input-status') }}</label>
            <div class="col-sm-8">
                <select name="status_id" id="filter-status" class="form-control">
                    <option value="0">{{ trans('backoffice/data_service/data_service_management.show_all') }}</option>
                </select>
            </div>
        </div>
        <br>
        <br>
        <div class="col-sm-12 form-group justify-content-center">
            <div class="text-center">
                <button type="button" class="btn btn-primary" id="btn-display">{{ trans('master.btn_display') }}</button>
            </div>
        </div>
    </form>
    <div class="clearfix"></div>
</div>

<div id="" class="table-responsive">
    <table id="table" class="display dsm-table" width="100%">
        <thead>
            <tr>
                <th>{{ trans('backoffice/data_service/data_service_management.table-order_code') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_management.table-date') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_management.table-name') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_management.table-agency') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_management.table-status') }}</th>
                <th>วัตถุประสงค์ในการขอ</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<script>
var group_Translator = {
    LANGUAGE: "{{ $l->getLocale() }}",

    show_all: "{{ trans('backoffice/data_service/data_service_management.show_all') }}",

    btn_confirm: "{{ trans('master.btn_confirm') }}",
    btn_cancel: "{{ trans('master.btn_cancel') }}",

    from_date: "{{ trans('backoffice/data_service/data_service_management.from_date') }}",
    to_date: "{{ trans('backoffice/data_service/data_service_management.to_date') }}",

    source_result_AP: "{{ trans('backoffice/data_service/data_service_management.source_result_AP') }}",
    source_result_DA: "{{ trans('backoffice/data_service/data_service_management.source_result_DA') }}",

    confirm_delete: "{{ trans('backoffice/data_service/data_service_management.confirm_delete') }}",
    msg_delete_suc: "{{ trans('master.msg_delete_suc') }}",
}
</script>

<style>
    #space-bottom{
        margin-bottom:15px;
    }
    #input-datestart{
        width:100%
    }
    #input-dateend{
        width:100%
    }
    #filter-agency{
        width:100%
    }
    #filter-status{
        width:100%
    }
</style>
@stop
