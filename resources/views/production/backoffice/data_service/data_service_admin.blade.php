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
        'href' => $l->httpUrl("backoffice/data_service/data_service_admin"),
        'text' => trans("backoffice/data_service/data_service_admin.page_name")
    )
));
$view->option('js-init','srvShop.init(group_Translator)');
$view->option('page_name', trans("backoffice/data_service/data_service_admin.page_name"));
?>

@section('extra_head')
{!!
$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','JsonHelper','select2')
!!}
{!! $view->resource('css','themes/default/css/backoffice/data_service/data_service_admin.css') !!}
{!! $view->resource('js','js/backoffice/data_service/data_service_admin.js') !!}


@stop

@section('content')

<div class="modal fade" id="modal-addcart">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <form id="form" class="form-row">
                    <input type="hidden" id="form_metadata_id">
                    <input type="hidden" id="form_data_id">
                    <div class="form-group row col-sm-12">
                        <label for="form_data_name col-"
                            class="col-form-label text-sm-right col-sm-3">{{ trans('backoffice/data_service/data_service_admin.data_name') }}:</label>
                        <div class="col-sm-9">
                            <label id="form_data_name" class="col-form-label text-sm-right"></label>
                        </div>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label for="form_data_duration" class="col-form-label text-sm-right col-sm-3">
                            {{ trans('backoffice/data_service/data_service_admin.time_duration') }}:
                        </label>
                        <div class="col-sm-9">
                            <label id="form_data_duration" class="col-form-label text-sm-right"></label>
                        </div>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label for="form_data_frequency" class="col-form-label text-sm-right col-sm-3">
                            <span class="color-red">*</span>
                            {{ trans('backoffice/data_service/data_service_admin.data_frequency') }}:
                        </label>
                        <div class="col-sm-9">
                            <div class="" id="form_div_data_frequency">
                                <label id="form_data_frequency" class="col-form-label text-sm-right"></label>
                            </div>
                            <div class="hidden">
                                <input type="radio" data-parsley data-parsley-required data-parsley-multiple="frequency"
                                    data-parsley-required-message="{{ trans('backoffice/data_service/data_service_admin.valid_frequency') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label class="col-form-label text-sm-right col-sm-3">
                            <span class="color-red">*</span>
                            {{ trans('backoffice/data_service/data_service_admin.data_type') }}:
                        </label>
                        <div class="col-sm-9">
                            <div id="form_div_data_service"></div>
                            <div class="hidden">
                                <input id="" name="service_id[]" type="radio" data-parsley data-parsley-required
                                    data-parsley-multiple="service_id"
                                    data-parsley-required-message="{{ trans('backoffice/data_service/data_service_admin.valid_data_type') }}">
                            </div>
                            <div class="row" id="form_div_data_date">
                                <div class="col-sm-6 row">
                                    <label for="form_detail_fromdate"
                                        class="col-sm-3 col-form-label text-sm-right">{{ trans('backoffice/data_service/data_service_admin.detail_fromdate') }}</label>
                                    <div class="col-sm-9">
                                        <div class="input-group date">
                                            <input id="form_detail_fromdate" type="text" class="form-control"
                                                data-provide="datepicker" data-date-format="yyyy-mm-dd" data-parsley
                                                data-parsley-required-message="{{ trans('backoffice/data_service/data_service_admin.valid_date') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 row">
                                    <label for="form_detail_todate"
                                        class="col-sm-3 col-form-label text-sm-right">{{ trans('backoffice/data_service/data_service_admin.detail_todate') }}</label>
                                    <div class="col-sm-9">
                                        <div class="input-group date">

                                            <input id="form_detail_todate" type="text" class="form-control"
                                                data-provide="datepicker" data-date-format="yyyy-mm-dd" data-parsley
                                                data-parsley-required-message="{{ trans('backoffice/data_service/data_service_admin.valid_date') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row col-sm-12" id="form-group-pb">
                        <label for="form_pb" class="col-form-label text-sm-right col-sm-3"></label>
                        <div class="col-sm-9">
                            <div class="radio">
                                <label>
                                    <input id="form_pb" value="p" checked name="control_pb[]" type="radio" data-parsley
                                        data-parsley-multiple="control_pb">
                                    {{trans('backoffice/data_service/data_service_admin.province')}}
                                </label>
                                <label>
                                    <input id="" value="b" name="control_pb[]" type="radio"
                                        data-parsley-multiple="control_pb">
                                    {{trans('backoffice/data_service/data_service_admin.basin')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row col-sm-12" id="form-group-province">
                        <label for="form_province" class="col-form-label text-sm-right col-sm-3">
                            <span class="color-red">*</span>
                            {{trans('backoffice/data_service/data_service_admin.province')}}:
                        </label>
                        <div class="col-sm-9">
                            <select name="form_province" id="form_province" class="form-control" data-parsley
                                multiple="multiple"
                                data-parsley-required-message="{{ trans('backoffice/data_service/data_service_admin.valid_province') }}"></select>
                        </div>
                    </div>
                    <div class="form-group row col-sm-12" id="form-group-basin">
                        <label for="form_basin" class="col-form-label text-sm-right col-sm-3">
                            <span class="color-red">*</span>
                            {{trans('backoffice/data_service/data_service_admin.basin')}}:
                        </label>
                        <div class="col-sm-9">
                            <select name="form_basin" id="form_basin" class="form-control" data-parsley
                                multiple="multiple"
                                data-parsley-required-message="{{ trans('backoffice/data_service/data_service_admin.valid_basin') }}"></select>
                        </div>
                    </div>
                    <div class="form-group row col-sm-12">
                        <label for="form_remark"
                            class="col-form-label text-sm-right col-sm-3">{{trans('backoffice/data_service/data_service_admin.remark')}}</label>
                        <div class="col-sm-9">
                            <textarea name="form_remark" id="form_remark" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default " data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary " id="modal-save-btn">บันทึก</button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modal-cart">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"> {{ trans('backoffice/data_service/data_service_admin.data_request') }} </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <form id="form-cart" class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-form-label text-sm-right col-sm-3"><span
                                class="color-red">*</span>วัตถุประสงค์</label>
                        <div class="col-sm-8">
                            <select name="form_object" id="form_object" class="form-control" data-parsley
                                multiple="multiple">
                                <!-- chang- comment ดึง option จาก db แทน -->
                                <!-- <option>ติดตามสถานการณ์น้ำในเขื่อน</option>
                                <option>นำไปใช้ในการติดตามปัญหาน้ำท่วมและไฟป่า</option>
                                <option>ตรวจสอบข้อมูลฝนสถานีหลักให้กับสทนช.</option>
                                <option>สำหรับเป็นฐานข้อมูลในการติดตามและตรวจสอบข้อมูล</option>
                                <option>อื่นๆ</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-form-label text-sm-right col-sm-3">
                            {{ trans('backoffice/data_service/data_service_admin.purpose') }}:
                        </label>
                        <div class="col-sm-8">
                            <textarea id="form-purpose" cols="30" rows="4" class="form-control" data-parsley-required
                                data-parsley-error-message="{{trans('backoffice/data_service/data_service_admin.valid_required')}}"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-form-label text-sm-right">
                            <div class="checkbox">
                                <label>
                                    <input id="form-forexternal" value="true"
                                        type="checkbox">{{ trans('backoffice/data_service/data_service_admin.outsider') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="form-group-user">
                        <label for="form-user"
                            class="col-form-label text-sm-right col-sm-3">{{ trans('backoffice/data_service/data_service_admin.user') }}:</label>
                        <div class="col-sm-8">
                            <select id="form-user" class="form-control">
                                <option value="0">
                                    {{ trans('backoffice/data_service/data_service_admin.user_default') }}</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table id="cart-table" class="table table-count table-hover display">
                        <thead>
                            <tr>
                                <th>{{ trans('backoffice/data_service/data_service_admin.sequence') }}</th>
                                <th>{{ trans('backoffice/data_service/data_service_admin.data_name') }}</th>
                                <th>{{ trans('backoffice/data_service/data_service_admin.data_frequency') }}</th>
                                <th>{{ trans('backoffice/data_service/data_service_admin.data_owner') }}</th>
                                <th>{{ trans('backoffice/data_service/data_service_admin.output_type') }}</th>
                                <th>{{ trans('backoffice/data_service/data_service_admin.data_duration') }}</th>
                                <th>{{ trans('backoffice/data_service/data_service_admin.province') }}</th>
                                <th>{{ trans('backoffice/data_service/data_service_admin.basin') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" id="modal-cart-save-btn">บันทึก</button>
            </div>
        </div>

    </div>
</div>




<div class="data-filters">
    <a id="data_service-cart" href="javascript:void(0);" class="data_service-cart" style="z-index:100">
        {{ trans('backoffice/data_service/data_service_admin.data_request') }}
        <br />
        <span id="label-data_service-cart" class="label label-success">0</span>
    </a>
    <form class="form-row" id="form-filter">
        <div class="form-group row col-sm-12">
            <label for="form-date"
                class="col-sm-3 form-col-form-label text-sm-right text-sm-right">{{ trans('backoffice/data_service/data_service_admin.data_owner') }}
                :</label>
            <div class="col-sm-5">
                <select name="agency_id" id="filter-agency" class="form-control select2">

                </select>


            </div>

            <div class="col-sm-2">
                <button id="btn_display" type="button"
                    class="btn btn-primary">{{ trans('master.btn_display') }}</button>
            </div>
        </div>
    </form>
    <div class="clearfix"></div>
</div>
<div class="table-responsive">
    <table id="table" class="table table-data_service table-hover display mh-100">
        <thead>
            <tr>
                <th>{{ trans("backoffice/data_service/data_service_admin.data_name") }}</th>
                <th>{{ trans("backoffice/data_service/data_service_admin.data_detail") }}</th>
                <th>{{ trans("backoffice/data_service/data_service_admin.data_subtype") }}</th>
                <th>{{ trans("backoffice/data_service/data_service_admin.data_owner") }}</th>
                <th>{{ trans("backoffice/data_service/data_service_admin.data_frequency") }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>


<script type="text/javascript">
//chang- change name group_Translator to group_trans
var group_trans = {
    LANGUAGE: "{{ $l->getLocale() }}",

    show_all: "{{ trans('backoffice/data_service/data_service_admin.show_all') }}",
    sequence: "{{ trans('backoffice/data_service/data_service_admin.sequence') }}",

    detail_fromdate: "{{ trans('backoffice/data_service/data_service_admin.detail_fromdate') }}",
    detail_todate: "{{ trans('backoffice/data_service/data_service_admin.detail_todate') }}",
    cd_dvd: "{{ trans('backoffice/data_service/data_service_admin.cd_dvd') }}",
    only_cd_dvd: "{{ trans('backoffice/data_service/data_service_admin.only_cd_dvd') }}",
    download: "{{ trans('backoffice/data_service/data_service_admin.download') }}",
    webservice: "{{ trans('backoffice/data_service/data_service_admin.webservice') }}",
    no_data_request: "{{ trans('backoffice/data_service/data_service_admin.no_data_request') }}",
    edit_data: "{{ trans('backoffice/data_service/data_service_admin.edit_data') }}",
    remove_data: "{{ trans('backoffice/data_service/data_service_admin.remove_data') }}",
    remove_data_confirm: "{{ trans('backoffice/data_service/data_service_admin.remove_data_confirm') }}",
    send_request_success: "{{ trans('backoffice/data_service/data_service_admin.send_request_success') }}",
}
</script>
@stop