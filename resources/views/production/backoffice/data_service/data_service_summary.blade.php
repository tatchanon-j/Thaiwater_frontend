@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();
$url = $l->httpUrl("backoffice/data_service/data_service_summary_print");
// $view->option('main-menu-mode', 'admin');
$view->option('breadcrumb',
array(
    array(
        'text' => trans('backoffice/data_service/data_service.main_menu_name')
    ),
    array(
        'href' => $l->httpUrl("backoffice/data_service/data_service_summary"),
        'text' => trans('backoffice/data_service/data_service_summary.page_name')
    )
));
$view->option('js-init', 'srvDSS.init(group_Translator)');
$view->option('page_name','สรุปคำขอข้อมูล' );
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-datepicker') !!}
{!! $view->resource('js','js/backoffice/data_service/data_service.js') !!}
{!! $view->resource('js','js/backoffice/data_service/data_service_summary.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_service/data_service_summary.css') !!}
@stop

@section('content')
<div class="data-filters">
    <form class="form-inline " id="form-summary">
        <!-- input_datestart -->
        <div class="col-sm-6 form-group">
            <label for="input-datestart" class="col-sm-4 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_summary.input-datestart') }}</label>
            <div class="col-sm-8">
                <input type="text" class="form-control"  id="input-datestart" name="datestart" data-provide="datepicker" data-date-format="yyyy-mm-dd"/>
            </div>
        </div>

        <div class="col-sm-6 form-group">
            <label for="input-dateend" class="col-sm-4 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_summary.input-dateend') }}</label>
            <div class="col-sm-8">
                <input type="text" class="form-control"  id="input-dateend" name="dateend" data-provide="datepicker" data-date-format="yyyy-mm-dd"/>
            </div>
        </div>

        <div class="form-group col-sm-6">
            <label for="input-user" class="col-sm-4 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_summary.input-user') }}</label>
            <div class="col-sm-8">
                <select name="user_id" id="input-user" class="form-control" >
                    <option value="0">{{ trans('backoffice/data_service/data_service_summary.show_all') }}</option>
                </select>
            </div>
        </div>

        <!-- <div class="form-group col-sm-6">
            <label for="input-letterno" class="col-sm-4 control-label">{{ trans('backoffice/data_service/data_service_summary.input-letterno') }}</label>
            <div class="col-sm-8">
                <select name="letterno" id="input-letterno" class="form-control">
                    <option value="0">{{ trans('backoffice/data_service/data_service_summary.show_all') }}</option>
                </select>
            </div>
        </div> -->

        <div class="form-group col-sm-6">
            <label for="input-agency" class="col-sm-4 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_summary.input-agency') }}</label>
            <div class="col-sm-8">
                <select name="agency_id" id="input-agency" class="form-control">
                    <option value="0">{{ trans('backoffice/data_service/data_service_summary.show_all') }}</option>
                </select>
            </div>
        </div>
        <br>
        <br>
        <br>
        <!-- btn_preview -->
        <div class="col-sm-12 form-group justify-content-sm-center">
            <div class="text-center">
                <button type="button" class="btn btn-primary" id="btn-display">{{ trans('master.btn_display') }}</button>
                <button type="button" class="btn btn-success" id="btn-print">{{ trans('backoffice/data_service/data_service_summary.print') }}</button>
            </div>
        </div>

    </form>
    <div class="clearfix"></div>
</div>

<div id="" class="table-responsive">
    <table id="table" class="display dsm-table" width="100%">
        <thead>
            <tr>
                <th>{{ trans('backoffice/data_service/data_service_summary.table-order_header') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_summary.table-order_detail') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_summary.table-dataservicename') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_summary.table-user') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_summary.table-agency') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_summary.table-servicetype') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_summary.table-order_date') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_summary.table-result_date') }}</th>
                <th>{{ trans('backoffice/data_service/data_service_summary.table-result') }}</th>
                <!-- chang- เพิ่มวันหมดอายุ -->
                <th>{{ trans('backoffice/data_service/data_service_summary.table-expire_date') }}</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>

<!-- chang- modal for set expire date -->
<div class="modal fade" id="modal-cart">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"> {{ trans('backoffice/data_service/data_service_summary.table-expire_date') }} </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-6 form-group">
                    <label for="input-expiredate" class="col-sm-4 control-label justify-content-end">{{ trans('backoffice/data_service/data_service_summary.table-expire_date') }}</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  id="input-expiredate" name="datestart" data-provide="datepicker" data-date-format="yyyy-mm-dd"/>
                        <input type="hidden" id="hidden-input-expiredate"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" id="modal-cart-save-btn">บันทึก</button>
            </div>
        </div>

    </div>
</div>

<style>
    #input-datestart{
        width:100%;
    }
    #input-dateend{
        width:100%;
    }
    #input-user{
        width:100%;
    }
    #input-agency{
        width:100%;
    }


</style>


<script>
var group_Translator = {
    LANGUAGE: "{{ $l->getLocale() }}",

    show_all: "{{ trans('backoffice/data_service/data_service_summary.show_all') }}",

    source_result_AP: "{{ trans('backoffice/data_service/data_service_summary.source_result_AP') }}",
    source_result_DA: "{{ trans('backoffice/data_service/data_service_summary.source_result_DA') }}",
}
var _URL_ = '{{ $url }}';
</script>
@stop
