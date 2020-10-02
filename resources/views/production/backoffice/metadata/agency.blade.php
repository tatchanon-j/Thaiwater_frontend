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
        'text' => trans('/backoffice/metadata/agency.page_name')
    ),
    )
);
$view->option('js-init','srvData.init(group_Translator)');
$view->option('page_name', trans('/backoffice/metadata/agency.page_name'));
?>

{!! $view->asset('DataTables','DataTables-buttons','parsley','select2') !!}
{!! $view->resource('js','js/backoffice/metadata/agency.js') !!}
{!! $view->resource('theme-css','css/backoffice/metadata/agency.css') !!}


@stop

@section('content')
<div class="data-filters">
    <form class="form-horizontal">
        <div class="form-group">
            <div class="form-inline">

                <div class="col-sm-12 form-group">
                    <label for="category"
                        class="col-sm-2 control-label ">{{trans('backoffice/metadata/agency.filter_ministry')}}:</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="filter_ministry" name="filter_ministry">
                            <option value="">{{ trans("master.msg_display_all") }}</option>
                        </select>
                    </div>
                    <label for="category"
                        class="col-sm-1 control-label ">{{trans('backoffice/metadata/agency.filter_department')}}:</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="filter_department" name="filter_department">
                            <option value="" disabled>{{ trans("master.msg_display_all") }}</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary col-sm-1"
                        id="btn_preview">{{ trans('master.btn_display') }}</button>
                </div>

            </div>
        </div>
    </form>
</div>
<div class="table-responsive">
    <table id="tbl-agency" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{trans('/master.col_order')}}</th>
                <th>{{trans('backoffice/metadata/agency.col_agency')}}</th>
                <th>{{trans('backoffice/metadata/agency.col_agencyname')}}</th>
                <th>{{trans('backoffice/metadata/agency.col_department')}}</th>
                <th>{{trans('backoffice/metadata/agency.col_ministry')}}</th>
                <th>โลโก้หน่วยงาน</th>
                <th>{{trans('/master.col_edit_del')}}</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="dlgEditAgency" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="dlgEditAgency-title"></h4>
                <button type="button" id="clearimg" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form-group" id="dlgEditAgency-form" class="">
                    <input type="hidden" id="dlgEditAgency-id" name="id" />
                    <input type="hidden" id="dlgEditAgency-category" name="category" />

                    <div class="form-group row">
                        <label class="col-form-label text-sm-right col-sm-3" for="input_ministry">
                            <span class="color-red">*</span>{{ trans("backoffice/metadata/agency.col_ministry") }}:
                        </label>
                        <div class="col-sm-9">
                            <select id="input_ministry" class="form-control" name="input_ministry"
                                data-key="input_ministry" data-parsley-required>
                                <option value="" disabled>{{ trans("master.msg_filter_required") }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-sm-right col-sm-3" for="input_department">
                            <span class="color-red">*</span>{{trans("backoffice/metadata/agency.col_department")}}:
                        </label>
                        <div class="col-sm-9">
                            <select id="input_department" class="form-control" name="input_department"
                                data-key="input_department" data-parsley-required>
                                <option value="" disabled>{{ trans("master.msg_filter_required") }}</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
                <div class="form-group row">
                    <label class="col-form-label text-sm-right col-sm-3" for="input_ministry">
                        <span class="color-red">*</span>รูป:
                    </label>
                    <div class="col-sm-6">
                                                <div class="col-md-12">
                                                    <div class="container">
                                                        <label for="uname"><b>อัปโหลดรูปภาพประกอบ</b></label><br>
                                                        <form id="upload_form" enctype="multipart/form-data">
                                                            <!-- change from multiple to single -->
                                                            <input type="file" name="my_file[]"
                                                                style="width: auto; margin: 0px 0px 0px 0px;"
                                                                id="btn_add_picture">
                                                        </form>
                                                    </div>
                                        </div>
                        <div id="msg"></div>
                        <!-- <form method="post" id="image-form">
                            <input type="file" name="img[]" class="file" accept="image/*">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled placeholder="Upload Image File" id="file">
                                <div class="input-group-append">
                                    <button type="button" class="browse btn btn-secondary" id="upload">Browse...</button>
                                </div>
                            </div>
                        </form> -->
                    </div>
                    <!-- <div class="col-sm-3">
                        <img src="https://placehold.it/80x80" height="80px" width="80px" id="preview" class="img-thumbnail">
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="clearimg"
                    data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
                <button type="button" class="btn btn-primary"
                    id="dlgEditAgency-save-btn">{{trans('/master.btn_save')}}</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var TRANS = {
    'msg_display_all': '{{ trans("master.msg_display_all") }}'
}
</script>
@stop