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
            'href' => $l->httpUrl("/backoffice/event_management/event_type"),
            'text' => trans('backoffice/event_management/event_type.main_menu_name')
        ),
        array(
            'text' => trans('backoffice/event_management/event_type.page_name')
        )
    ));
$view->option('js-init', 'evts.init(group_Translator)');
$view->option('page_name', trans('backoffice/tools/manage_one.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/tools/manage_one.css') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/tools/manage_one.js') !!}
@stop

@section('content')

<!-- search -->
<div class="data-filters">
    <form class="form-row">
        <div class="form-group row col-sm-8">
            <label class="col-sm-3 form-control-label text-sm-right"><span
                    class="color-red">*</span>หน่วยงาน</label>
            <div class="col-sm-4">
                <select class="form-control">
                    <option>หน่วยงานที่ 1</option>
                    <option>หน่วยงานที่ 2</option>
                    <option>หน่วยงานที่ 3</option>
                    <option>หน่วยงานที่ 4</option>
                    <option>หน่วยงานที่ 5</option>
                </select>
            </div>
        </div>
    </form>


</div>
<div class="clearfix"></div>
<!-- end search -->

<!-- data table -->
<div class="table-responsive">
    <table id="tbl-event-subtype" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>หน่วยงาน</th>
                <th>คำอธิบาย</th>
                <th>Domain/ip</th>
                <th>Limit Request</th>
                <th>reset</th>
                <th>แก้ไข/ลบ</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<!-- end data table -->

<!-- modal  -->
<div id="dlgEditEventsubtype" class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="dlgEditEventsubtype-title">
                    {{ trans('backoffice/event_management/event_type.title_add_event_subtype') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <form role="form" id="dlgEditEventsubtype-form" class="form-horizontal">
                    <input type="hidden" id="dlgEditEventsubtype-id" name="id" />
                    <input type="hidden" id="dlgEditEventsubtype-category" name="category" />

                    <div class="form-group">
                        <label for="dlgEditEventsubtype-code" class="control-label col-sm-3"><span
                                class="color-red">*</span>{{ trans('backoffice/event_management/event_subtype.event_code') }}:</label>
                        <div class="col-sm-3">
                            <input id="dlgEditEventsubtype-code" type="text" class="form-control" name="code"
                                data-parsley-required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dlgEditEventsubtype-eventtype" class="control-label col-sm-3"><span
                                class="color-red">*</span>{{ trans('backoffice/event_management/event_type.page_name') }}:</label>
                        <div class="col-sm-9">
                            <select type="text" class="form-control" id="dlgEditEventsubtype-eventtype" name="name"
                                required>
                                <option value="" class="default">{{ trans('/master.msg_filter_required') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group group-subtype">
                        <label for="dlgEditEventsubtype-grpEventSubtype" class="control-label col-sm-3"><span
                                class="color-red">*</span>{{ trans('/backoffice/event_management/event_subtype.label_group_subevent_type')}}:</label>
                        <div class="col-sm-9">
                            <select id="dlgEditEventsubtype-grpEventSubtype" class="form-control" name="group-subtype"
                                multiple="multiple" data-parsley-required>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dlgEditEventsubtype-support"
                            class="control-label col-sm-3">{{ trans('/backoffice/event_management/event_subtype.label_basic_fix')}}:</label>
                        <div class="col-sm-9">
                            <textarea id="dlgEditEventsubtype-support" class="form-control" rows="4"
                                cols="50"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dlgEditEventsubtype-Eventstatus"
                            class="control-label col-sm-3">{{ trans('/backoffice/event_management/event_subtype.label_satatus') }}</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="eventStatus" value=true
                                    checked="">{{ trans('/backoffice/event_management/event_subtype.label_auto_close') }}</input>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="eventStatus"
                                    value=false>{{ trans('/backoffice/event_management/event_subtype.label_admin_close')}}</input>
                            </label>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{
					trans("/master.btn_cancel") }}</button>
                <button type="button" class="btn btn-primary"
                    id="dlgEditEventsubtype-save-btn">{{ trans("/master.btn_save") }}</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal  -->

<!-- modal  -->
<div id="dlgEditEventmanageone" class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="dlgEditEventsubtype-title">Manage One</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <form role="form" id="dlgEditEventsubtype-form" class="">
                    <div class="form-group row">
                        <label for="dlgEditEventsubtype-code" class="form-control-label col-sm-3 text-sm-right"><span
                                class="color-red">*</span>หน่วยงาน:</label>
                        <div class="col-sm-6">
                            <input id="dlgEditEventsubtype-code" type="text" class="form-control" name="code"
                                data-parsley-required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dlgEditEventsubtype-eventtype" class="form-control-label col-sm-3 text-sm-right"><span
                                class="color-red">*</span>คำอธิบาย:</label>
                        <div class="col-sm-9">
                            <textarea id="" class="form-control" rows="4"
                                cols="50"></textarea>
                        </div>
                    </div>

                    <div class="form-group row group-subtype">
                        <label for="dlgEditEventsubtype-grpEventSubtype" class="form-control-label col-sm-3 text-sm-right"><span
                                class="color-red">*</span>Domain/ip:</label>
                        <div class="col-sm-9">
                            <input id="dlgEditEventsubtype-code" type="text" class="form-control" name="code"
                                data-parsley-required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for=""
                            class="form-control-label col-sm-3 text-sm-right">Limit Request:</label>
                        <div class="col-sm-9">
                            <input id="" type="text" class="form-control" name="code"
                                data-parsley-required />
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{
					trans("/master.btn_cancel") }}</button>
                <button type="button" class="btn btn-primary"
                    id="dlgEditEventsubtype-save-btn">{{ trans("/master.btn_save") }}</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal  -->
@stop