@extends('frontoffice/layout/data_service')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
// $a = \App\Helpers\ApiServiceHelper::getInstance();
// $csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);
// dd($a->getAccountInfo());

$view->option('page_name',trans('frontoffice/data_service/data_service.page_name'));
$view->option('js-init','srvShop.init(group_trans)');

?>
@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','JsonHelper','select2') !!}
{!! $view->resource('css','themes/default/css/frontoffice/data_service/data_service.css') !!}
{!! $view->resource('js','js/frontoffice/data_service/data_service.js') !!}
@stop

@section('content')
<div class="modal fade" id="modal-addcart">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"> {{ trans('frontoffice/data_service/data_service.choose_data') }} </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="box-body">
                        <form id="form" class="form-horizontal">
                            <input type="hidden" id="form_metadata_id">
                            <input type="hidden" id="form_data_id">
                            <div class="form-group form-inline">
                                <label for="form_data_name" class="control-label col-sm-3 justify-content-end" style="align-self: flex-start;">{{ trans('frontoffice/data_service/data_service.data_name') }}:</label>
                                <div class="col-sm-6">
                                    <label id="form_data_name" class="control-label justify-content-start"></label>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="form_data_duration" class="control-label col-sm-3 justify-content-end">
                                    {{ trans('frontoffice/data_service/data_service.time_duration') }}:
                                </label>
                                <div class="col-sm-6">
                                    <label id="form_data_duration" class="control-label justify-content-start"></label>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="form_data_frequency" class="control-label col-sm-3 justify-content-end" style="align-self: flex-start;">
                                    <span class="color-red">*</span>
                                    {{ trans('frontoffice/data_service/data_service.data_frequency') }}:
                                </label>
                                <div class="col-sm-9">
                                    <div class="" id="form_div_data_frequency">
                                        <label id="form_data_frequency" class="control-label"></label>
                                    </div>
                                    <div class="hidden" style="display: none;">
                                        <input type="radio" data-parsley data-parsley-required data-parsley-multiple="frequency" data-parsley-required-message="{{ trans('frontoffice/data_service/data_service.valid_frequency') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-3 justify-content-end" style="align-self: flex-start;">
                                    <span class="color-red">*</span>
                                    {{ trans('frontoffice/data_service/data_service.data_type') }}:
                                </label>
                                <div class="col-sm-9">
                                    <div id="form_div_data_service" style="display: flex;flex-direction: column-reverse;"></div>
                                    <div class="hidden" style="display: none;">
                                        <input id="" name="service_id[]" type="radio" data-parsley data-parsley-required data-parsley-multiple="service_id" data-parsley-required-message="{{ trans('frontoffice/data_service/data_service.valid_data_type') }}">
                                    </div>
                                    <div class="row" id="form_div_data_date">
                                        <div class="col-sm-4">
                                            <label for="form_detail_fromdate" class="col-sm-3 control-label"  >{{ trans('frontoffice/data_service/data_service.detail_fromdate') }}</label>
                                            <div class="col-sm-9">
                                                <input id="form_detail_fromdate" type="text" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd"
                                                data-parsley data-parsley-required-message="{{ trans('frontoffice/data_service/data_service.valid_date') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="form_detail_todate" class="col-sm-3 control-label">{{ trans('frontoffice/data_service/data_service.detail_todate') }}</label>
                                            <div class="col-sm-9">
                                                <input id="form_detail_todate" type="text" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd"
                                                data-parsley data-parsley-required-message="{{ trans('frontoffice/data_service/data_service.valid_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-inline" id="form-group-pb">
                                <label for="form_pb" class="control-label col-sm-3 justify-content-end"></label>
                                <div class="col-sm-6">
                                    <div class="raido form-inline">
                                        <label>
                                            <input class="m-1" id="form_pb" value="p" checked name="control_pb[]" type="radio" data-parsley data-parsley-multiple="control_pb">
                                            {{trans('frontoffice/data_service/data_service.province')}}
                                        </label>
                                        <label>
                                            <input class="m-1" id="" value="b" name="control_pb[]" type="radio" data-parsley-multiple="control_pb">
                                            {{trans('frontoffice/data_service/data_service.basin')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-inline" id="form-group-province">
                                <label for="form_province" class="control-label col-sm-3 justify-content-end"  style="align-self: flex-start;">
                                    <span class="color-red">*</span>
                                    {{trans('frontoffice/data_service/data_service.province')}}:
                                </label>
                                <div class="col-sm-6" >
                                    <select name="form_province" id="form_province" class="form-control" data-parsley multiple="multiple"
                                    data-parsley-required-message="{{ trans('frontoffice/data_service/data_service.valid_province') }}"></select>
                                </div>
                            </div>
                            <div class="form-group form-inline" id="form-group-basin">
                                <label for="form_basin" class="control-label col-sm-3 justify-content-end" style="align-self: flex-start;">
                                    <span class="color-red">*</span>
                                    {{trans('frontoffice/data_service/data_service.basin')}}:
                                </label>
                                <div class="col-sm-6">
                                    <select style="width: -webkit-fill-available;" name="form_basin" id="form_basin" class="form-control" data-parsley multiple="multiple"
                                    data-parsley-required-message="{{ trans('frontoffice/data_service/data_service.valid_basin') }}"></select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="form_remark" class="control-label col-sm-3 justify-content-end" style="align-self: flex-start;">{{trans('frontoffice/data_service/data_service.remark')}} :</label>
                                <div class="col-sm-6" >
                                    <textarea style="width: -webkit-fill-available;" name="form_remark" id="form_remark" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer with-border text-right">
                        <button type="button" class="btn btn-primary " id="modal-save-btn">บันทึก</button>
                        <button type="button" class="btn btn-default " data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-cart">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"> {{ trans('frontoffice/data_service/data_service.data_request') }} </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="box-body">
                        <form id="form-cart" class="form-horizontal" >
                            <div class="form-group form-inline">
                                <label for="" class="control-label col-sm-4" style="align-self: flex-start;">
                                    <span class="color-red">*</span>
                                    {{ trans('frontoffice/data_service/data_service.purpose') }}:
                                </label>
                                <div class="col-sm-8">
                                    <textarea style="width: -webkit-fill-available;" id="form-purpose" cols="30" rows="4" class="form-control"
                                    data-parsley-required data-parsley-error-message="{{trans('frontoffice/data_service/data_service.valid_required')}}"></textarea>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <div class="col-sm-11">
                                    <div class="checkbox">
                                        <label>
                                            <input id="form-forexternal" value="true" type="checkbox" class="m-1"> {{ trans('frontoffice/data_service/data_service.outsider') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-inline" id="form-group-user">
                                <label for="form-user" class="control-label col-sm-4 justify-content-end">{{ trans('frontoffice/data_service/data_service.user') }} :</label>
                                <div class="col-sm-5">
                                    <select id="form-user" class="form-control">
                                        <option value="0">{{ trans('frontoffice/data_service/data_service.user_default') }}</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="">
                            <table id="cart-table" class="table table-data_service table-count table-hover display table-responsive">
                                <thead>
                                    <tr>
                                        <th>{{ trans('frontoffice/data_service/data_service.sequence') }}</th>
                                        <th>{{ trans('frontoffice/data_service/data_service.data_name') }}</th>
                                        <th>{{ trans('frontoffice/data_service/data_service.data_frequency') }}</th>
                                        <th>{{ trans('frontoffice/data_service/data_service.data_owner') }}</th>
                                        <th>{{ trans('frontoffice/data_service/data_service.output_type') }}</th>
                                        <th>{{ trans('frontoffice/data_service/data_service.data_duration') }}</th>
                                        <th>{{ trans('frontoffice/data_service/data_service.province') }}</th>
                                        <th>{{ trans('frontoffice/data_service/data_service.basin') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer with-border text-right">
                        <button type="button" class="btn btn-primary" id="modal-cart-save-btn">บันทึก</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a id="data_service-cart" href="javascript:void(0);" class="data_service-cart" style="z-index:100">
    {{ trans('frontoffice/data_service/data_service.data_request') }}
    <br/>
    <span id="label-data_service-cart" class="label label-success">0</span>
</a>

<div class="box box-default" >
    <div class="box-body">
        <div class="data-filters">
            <form class="form-inline" id="form-filter">
                <div class="form-group col-sm-12">
                    <label for="form-date" class="col-sm-3 control-label justify-content-end">{{ trans('frontoffice/data_service/data_service.data_owner') }} :</label>
                    <div class="col-sm-5 justify-content-right">
                        <select name="agency_id" id="filter-agency" class="form-control select2">
                            <option value="0">{{ trans('backoffice/data_service/data_service_management.show_all') }}</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button id="btn_display" type="button" class="btn btn-primary">{{ trans('master.btn_display') }}</button>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
        <div class="table-responsive">
            <table id="table" class="table table-data_service table-hover display">
                <thead>
                    <tr>
                        <th style="width: 30%;">{{ trans("frontoffice/data_service/data_service.data_name") }}</th>
                        <th style="width: 24%;">{{ trans("frontoffice/data_service/data_service.data_detail") }}</th>
                        <th style="width: 15%;">{{ trans("frontoffice/data_service/data_service.data_subtype") }}</th>
                        <th style="width: 10%;">{{ trans("frontoffice/data_service/data_service.data_owner") }}</th>
                        <th style="width: 10%;">{{ trans("frontoffice/data_service/data_service.data_frequency") }}</th>
                        <th style="width: 10%;"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modal-format" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title font-weight-bold" style="font-size:22px">{{trans('frontoffice/data_service/data_service.json_header')}}</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form role="form" id="formatDatajson-form" class="form-row">
                    <input type="hidden" id="formatDatajson-id" name="id" />

                    <div class="form-group col-sm-12 row">
                        <label for="dlgDatajson-code" class="col-form-label text-sm-right col-sm-3">{{trans('frontoffice/data_service/data_service.json_text')}}</label>
                        <div class="col-sm-9">
                            <textarea id="formatDatajson-textarea" style="height:350px" readonly rows="5" class="form-control" data-parsley-required></textarea>

                        </div>
                    </div>

                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontoffice/data_service/data_service.modal_btn_close')}}</button>
            </div>
        </div>

    </div>
</div>


<style>
    /* display: flex;
    flex-direction: column-reverse; */
</style>

<script type="text/javascript">
group_trans = {
    LANGUAGE: "{{ $l->getLocale() }}",

    show_all : "{{ trans('frontoffice/data_service/data_service.show_all') }}",
    sequence : "{{ trans('frontoffice/data_service/data_service.sequence') }}",

    detail_fromdate : "{{ trans('frontoffice/data_service/data_service.detail_fromdate') }}",
    detail_todate : "{{ trans('frontoffice/data_service/data_service.detail_todate') }}",
    cd_dvd : "{{ trans('frontoffice/data_service/data_service.cd_dvd') }}",
    only_cd_dvd : "{{ trans('frontoffice/data_service/data_service.only_cd_dvd') }}",
    download : "{{ trans('frontoffice/data_service/data_service.download') }}",
    webservice : "{{ trans('frontoffice/data_service/data_service.webservice') }}",
    no_data_request : "{{ trans('frontoffice/data_service/data_service.no_data_request') }}",
    edit_data : "{{ trans('frontoffice/data_service/data_service.edit_data') }}",
    remove_data : "{{ trans('frontoffice/data_service/data_service.remove_data') }}",
    remove_data_confirm : "{{ trans('frontoffice/data_service/data_service.remove_data_confirm') }}",
    send_request_success : "{{ trans('frontoffice/data_service/data_service.send_request_success') }}",
}
</script>
@stop
