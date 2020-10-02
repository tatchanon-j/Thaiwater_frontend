@extends('backoffice/layout/master')
@section('extra_head')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
array(
    array(
        'href' => $l->httpUrl("backoffice/apis/monitor"),
        'text' => trans('backoffice/apis/key_access_mgmt.main-menu-mode')
    ),
    array(
        'text' => trans('backoffice/apis/monitor_api_service.page_name')
    ),
));
$view->option('js-init','mas.init(group_Translator)');
$view->option('page_name', trans('backoffice/apis/monitor_api_service.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/apis/monitor_api_service.css') !!}

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','JsonHelper','select2') !!}
{!! $view->resource('js','js/backoffice/apis/monitor_api_service.js') !!}

@section('content')
<!-- modal -->
<div class="modal fade" id="modal-log" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tbl-log" class="display admin-datatables" width="100%">
                        <thead>
                            <tr>
                                <th>{{ trans('master.col_order') }}</th>
                                <th>{{ trans('backoffice/apis/monitor_api_service.datetime') }}</th>
                                <th>{{ trans('backoffice/apis/monitor_api_service.client_ip') }}</th>
                                <th>{{ trans('backoffice/apis/monitor_api_service.access_duration') }}</th>
                                <th>{{ trans('backoffice/apis/monitor_api_service.reply_code') }}</th>
                            </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_close')}}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- filter -->
<div class="data-filters">
    <form class="form-row">
        <!-- input_datestart -->
     
            <div class="col-sm-6 form-group row">
                <label for="filter-datestart" class="col-sm-4 col-form-label text-sm-right">{{ trans('backoffice/apis/monitor_api_service.filter-datestart') }}</label>
                <div class="col-sm-8 input-group">
                    <input type="text" class="form-control"  id="filter-datestart" name="datestart" data-provide="datepicker" data-date-format="yyyy-mm-dd"/>
                    <div class="input-group-append">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
  
                
            </div>

            <div class="col-sm-6 form-group row">
                <label for="filter-dateend" class="col-sm-4 col-form-label text-sm-right">{{ trans('backoffice/apis/monitor_api_service.filter-dateend') }}</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  id="filter-dateend" name="dateend" data-provide="datepicker" data-date-format="yyyy-mm-dd"/>
                </div>
            </div>

            <div class="col-sm-6 form-group row">
                <label for="filter-user" class="col-sm-4 col-form-label text-sm-right">{{ trans('backoffice/apis/monitor_api_service.filter-user') }}</label>
                <div class="col-sm-8">
                    <select name="user_id" id="filter-user" class="form-control" >
                        <option value="0">{{ trans('master.select_all') }}</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-6 form-group row">
                <label for="filter-agency" class="col-sm-4 col-form-label text-sm-right">{{ trans('backoffice/apis/monitor_api_service.filter-agency') }}</label>
                <div class="col-sm-8">
                    <select name="agency_id" id="filter-agency" class="form-control">
                        <option value="0">{{ trans('master.select_all') }}</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-6 form-group row">
                <label for="filter-user" class="col-sm-4 col-form-label text-sm-right">{{ trans('backoffice/apis/monitor_api_service.filter-user_agency') }}</label>
                <div class="col-sm-8">
                    <select name="agency_user_id" id="filter-user_agency" class="form-control" >
                        <option value="0">{{ trans('master.select_all') }}</option>
                    </select>
                </div>
            </div>


        <!-- btn_preview -->
        <div class="col-sm-12">
            <div class="text-center">
                <button type="button" class="btn btn-primary" id="btn-display">{{ trans('master.btn_display') }}</button>
            </div>
        </div>


    </form>
    <div class="clearfix"></div>
</div>

<!-- data table -->
<div class="table-responsive">
    <table id="tbl" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{ trans('backoffice/apis/monitor_api_service.col-order') }}</th>
                <th>{{ trans('backoffice/apis/monitor_api_service.col-user') }}</th>
                <th>{{ trans('backoffice/apis/monitor_api_service.col-user_agency') }}</th>
                <th>{{ trans('backoffice/apis/monitor_api_service.col-metadataname') }}</th>
                <th>{{ trans('backoffice/apis/monitor_api_service.col-agency') }}</th>
                <th>{{ trans('backoffice/apis/monitor_api_service.col-count_req') }}</th>
                <th>{{ trans('backoffice/apis/monitor_api_service.col-count_access') }}</th>
                <th>{{ trans('backoffice/apis/monitor_api_service.col-method') }}</th>
                <th>{{ trans('backoffice/apis/monitor_api_service.col-duration') }}</th>
                <!-- <th>{{ trans('backoffice/apis/monitor_api_service.col-province-basin') }}</th> -->
                <th>{{ trans('backoffice/apis/monitor_api_service.col-e_id') }}</th>
                <th>{{ trans('backoffice/apis/monitor_api_service.col-status') }}</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<!-- end data table -->
<script type="text/javascript">
var TRANS = {
    order_code: "{{ trans('backoffice/apis/monitor_api_service.order_code') }}",
    user_name: "{{ trans('backoffice/apis/monitor_api_service.user_name') }}",
    user_agency: "{{ trans('backoffice/apis/monitor_api_service.user_agency') }}",
    to_date: "{{ trans('backoffice/apis/monitor_api_service.to_date') }}",
    province: "{{ trans('backoffice/apis/monitor_api_service.province') }}",
    basin: "{{ trans('backoffice/apis/monitor_api_service.basin') }}",
    status_true: '{!! trans("backoffice/apis/monitor_api_service.status_true") !!}',
    status_false: '{!! trans("backoffice/apis/monitor_api_service.status_false") !!}',
    view_log: "{{ trans('backoffice/apis/monitor_api_service.view_log') }}",
    view: "{{ trans('backoffice/apis/monitor_api_service.view') }}",
    regen: "{{ trans('backoffice/apis/monitor_api_service.regen') }}",
    enable: "{{ trans('backoffice/apis/monitor_api_service.enable') }}",
    disable: "{{ trans('backoffice/apis/monitor_api_service.disable') }}",
};
</script>
@stop
