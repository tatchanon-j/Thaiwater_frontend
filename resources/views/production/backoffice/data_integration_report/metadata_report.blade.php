@section('extra_head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
@extends('backoffice/layout/master')

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
	array(
		array(
			'href' => $l->httpUrl("backoffice/data_integration_report/metadata_report"),
			'text' => trans('backoffice/metadata/metadata.main-menu-mode'),
		),
		array(
			'text' => trans('backoffice/metadata/metadata.page_name'),
		),
	));
$view->option('js-init', 'md.init(group_Translator)');
$view->option('page_name', 'บัญชีข้อมูลที่เชื่อมโยงข้อมูลและไม่เชื่อมโยงข้อมูล');
?>

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','select2')
!!}
{!! $view->resource('js','js/backoffice/data_integration_report/metadata_report.js') !!}
{!! $view->resource('theme-css','css/backoffice/metadata/metadata.css') !!}

@stop

@section('content')

<!-- Main Form input data -->
<div class="data-filters">
    <form class="form justify-content-center">
        <div class="row">
            <div class="form-group row col-sm-6">
                <label for="filter_agency"
                    class="col-sm-4 control-label text-sm-right">{{ trans('/backoffice/metadata/metadata.agency') }}:</label>
                <div class="col-sm-8 fil_agency">
                    <select id="filter_agency" name="agency" data-key="agency" multiple="multiple">
                    </select>
                </div>
            </div>
            <div class="form-group row col-sm-6" style="margin-bottom : 10px">
                <label for="filter_hydro"
                    class="col-sm-4 control-label text-sm-right">{{ trans('/backoffice/metadata/metadata.hydro') }}:</label>
                <div class="col-sm-8 fil_agency">
                    <select id="filter_hydro" name="hydro" data-key="hydro" multiple="multiple">
                    </select>
                </div>
            </div>
            <div class="form-group row col-sm-6">
                <label for=""
                    class="col-sm-4 control-label text-sm-right">{{ trans('/backoffice/metadata/metadata.category') }}:</label>
                <div class="col-sm-8">
                    <select id="filter_category" class="form-control" name="category" data-key="category">
                        <option value="all">{{trans("master.msg_display_all")}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row col-sm-6">
                <label for=""
                    class="col-sm-4 control-label text-sm-right">{{ trans('/backoffice/metadata/metadata.subcategory') }}:</label>
                <div class="col-sm-8">
                    <select id="filter_subcategory" class="form-control" name="sub_category" multiple="multiple">
                    </select>
                </div>
            </div>
            <div class="form-group row col-sm-6"></div>
            <div class="form-group row col-sm-6">
                <label for="" class="col-sm-4 control-label text-sm-right">การเชื่อมโยง:</label>
                <div class="col-sm-8">
                <select id="filter_metadatastatus" name="metadatastatus" data-key="metadatastatus" multiple="multiple">
                    </select>
                </div>
            </div>
        </div>
        <br>
        <!-- Button Previews -->
        <div class="text-center">
            <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('master.btn_display') }}</button>
        </div>
    </form>
</div>
<!--End Main Form input data -->
<!-- Display Datatable -->
<div id="div_preview">
    <!-- data table -->
    <div class="table-responsive">
        <table id="tbl-metadata" class="display admin-datatables" width="100%">
            <thead>
                <tr>
                    <th>{{trans('master.col_order')}}</th>
                    <th>{{trans('backoffice/metadata/metadata.page_name')}}</th>
                    <th>{{trans('backoffice/metadata/metadata.col_category')}}</th>
                    <th>{{trans('backoffice/metadata/metadata.col_subcategory')}}</th>
                    <th>{{trans('backoffice/metadata/metadata.col_agency')}}</th>
                    <th>การเชื่อมโยง</th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- end data table -->
</div>
<!-- End Display Datatable -->


<!-- Form -->
<form id="form" data-parsley-validate="" class="form-horizontal form_metadata" role="form" style="display:none;">
    <input type="hidden" id="form-id" />
    <!-- Dropdown Selecte language -->
    <div class="container">
        <div class="form-inline">
            <div class="form-group col-md-12">
                <label for="language-form"
                    class="col-md-2 control-label"><b>{{trans('backoffice/metadata/metadata.language')}}:</b></label>
                <div class="col-md-10">
                    <select id="language-form" class="form-control">
                        <option value="th">{{trans('backoffice/metadata/metadata.thai')}}</option>
                        <option value="en">{{trans('backoffice/metadata/metadata.english')}}</option>
                        <option value="jp">{{trans('backoffice/metadata/metadata.japan')}}</option>
                    </select>
                </div>
                <!-- <div class="col-sm-8 err-form"></div> -->
            </div>
        </div>
    </div>

    <!-- Form language -->
    <div class="metadata-th">
        <label class="col-sm-12"><b>1.{{trans('backoffice/metadata/metadata.title')}}</b></label>
        <div class="form-inline">
            <div class="form-group col-md-12">
                <label for="form-agency" class="col-md-3 control-label">
                    <span class="color-red">*</span>
                    {{trans('backoffice/metadata/metadata.agency')}}:
                </label>
                <div class="col-md-8">
                    <select name="agency" id="form-agency" class="form-control" data-parsley-required
                        data-parsley-error-message="{{trans('master.msg_err_data_null')}}"></select>
                </div>
                <div class="col-sm-1">
                    <p class="text-muted" style="font-style: italic;">table : agency</p>
                </div>
            </div>

            <div class="form-group col-md-12" style="margin-bottom : 10px">
                <label for="form-category" class="col-md-3 control-label">
                    <span class="color-red">*</span>
                    {{trans('backoffice/metadata/metadata.category')}}:
                </label>
                <div class="col-md-8">
                    <select name="category" id="form-category" class="form-control" data-parsley-required
                        data-parsley-error-message="{{trans('master.msg_err_data_null')}}"></select>
                </div>
            </div>

            <div class="form-group col-md-12" style="margin-bottom : 10px">
                <label for="form-subcategory" class="col-md-3 control-label">
                    <span class="color-red">*</span>
                    {{trans('backoffice/metadata/metadata.subcategory')}}:
                </label>
                <div class="col-md-8">
                    <select id="form-subcategory" class="form-control" data-parsley-required
                        data-parsley-error-message="{{trans('master.msg_err_data_null')}}"></select>
                </div>
            </div>

            <div class="form-group col-md-12" style="margin-bottom : 10px">
                <label for="form-hydro" class="col-md-3 control-label">
                    <span class="color-red">*</span>
                    {{trans('backoffice/metadata/metadata.hydro')}}:
                </label>
                <div class="col-md-8 frm_hydro">
                    <select name="hydro" id="form-hydro" multiple="multiple" class="form-control" data-parsley-required
                        data-parsley-mincheck="1"
                        data-parsley-error-message="{{trans('master.msg_err_data_null')}}"></select>
                </div>
            </div>

            <div class="form-group col-md-12" style="margin-bottom : 10px">
                <label for="form-agency_name" class="col-md-3 control-label">
                    <span class="color-red">* </span>
                    {{trans('backoffice/metadata/metadata.agency_name')}}:
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="form-agency_name" placeholder="" data-parsley-required
                        data-parsley-error-message="{{trans('master.msg_err_require')}}" style="width :100%">
                </div>
                <span>
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/metadata/metadata.agency_name_description')}}"></i>
                </span>
            </div>

            <div class="form-group col-md-12" style="margin-bottom : 10px">
                <label for="form-service_name" class="col-sm-3 control-label">
                    <span class="color-red">*</span>
                    {{trans('backoffice/metadata/metadata.service_name')}}:
                </label>
                <div class="col-md-8">
                    <input type="" class="form-control" id="form-service_name" placeholder="" data-parsley-required
                        data-parsley-error-message="{{trans('master.msg_err_require')}}" style="width :100%">
                </div>
                <span>
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/metadata/metadata.service_name_description')}}"></i>
                </span>
            </div>
        </div>

        <label class="col-sm-12"><b>2.{{trans('backoffice/metadata/metadata.description')}}</b></label>

        <div class="form-inline">
            <div class="form-group col-md-12">
                <label for="form-description" class="col-sm-3 control-label">
                    {{trans('backoffice/metadata/metadata.description')}}:
                </label>
                <div class="col-md-8">
                    <textarea class="form-control" rows="2" id="form-description" placeholder=""
                        style="width :100%"></textarea>
                </div>
                <span>
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/metadata/metadata.description_description')}}"></i>
                </span>
            </div>
        </div>

        <label class="col-sm-12"><b>3.{{trans('backoffice/metadata/metadata.date')}}</b></label>
        <div class="form-inline">
            <div class="form-group col-md-12" style="margin-bottom : 10px">
                <label for="form-agency_store_date" class="col-md-3 control-label">
                    <!-- <span class="color-red">*</span> -->
                    {{trans('backoffice/metadata/metadata.agency_store_date')}}:
                </label>
                <div class="col-md-8">
                    <div class="input-group date">
                        <input id="form-agency_store_date" data-provide="datepicker" data-date-format="yyyy-mm-dd"
                            type="text" class="form-control" placeholder="YYYY-MM-DD"
                            data-parsley-error-message="{{trans('master.msg_err_require')}}"
                            data-parsley-errors-container="#erroraAencystoredate">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div id="erroraAencystoredate"></div>
                </div>
            </div>

            <div class="form-group col-md-12" style="margin-bottom : 10px">
                <label for="form-start_data_date" class="col-sm-3 control-label">
                    <!-- <span class="color-red">*</span> -->
                    {{trans('backoffice/metadata/metadata.start_data_date')}}:
                </label>
                <div class="col-sm-8">
                    <div class="input-group date">
                        <input id="form-start_data_date" data-provide="datepicker" data-date-format="yyyy-mm-dd"
                            type="text" class="form-control" placeholder="YYYY-MM-DD"
                            data-parsley-error-message="{{trans('master.msg_err_require')}}"
                            data-parsley-errors-container="#erroraDatedata">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div id="erroraDatedata"></div>
                </div>
            </div>

            <div class="form-group col-md-12">
                {{--  วันที่ได้รับข้อมูลจากหน่วยงานเข้าสู่คลังฯ --}}
                <label for="form-metadata_receive_date" class="col-sm-3 control-label">
                    วันที่ได้รับข้อมูลจากหน่วยงานเข้าสู่คลังฯ :
                </label>
                <div class="col-sm-8">
                    <div class="input-group date">
                        <input id="form-metadata_receive_date" data-provide="datepicker" data-date-format="yyyy-mm-dd"
                            type="text" class="form-control" placeholder="YYYY-MM-DD"
                            data-parsley-error-message="{{trans('master.msg_err_require')}}"
                            data-parsley-errors-container="#errorMetaDataDate">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div id="errorMetaDataDate"></div>
                </div>
            </div>
        </div>

        <label class="col-sm-12"><b>4.{{trans('backoffice/metadata/metadata.contact')}}</b></label>
        <div class="form-inline">
            <div class="form-group col-md-12">
                <label for="form-contact"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.contact')}}:</label>
                <div class="col-sm-8">
                    <textarea id="form-contact" class="form-control" rows="4" placeholder=''
                        style="width :100%"></textarea>
                </div>
                <span class="col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/metadata/metadata.contact_description')}}"></i>
                </span>
            </div>
        </div>

        <label class="col-sm-12"><b>5.{{trans('backoffice/metadata/metadata.tag')}}</b></label>
        <div class="form-inline">
            <div class="form-group col-md-12">
                <label for="form-tag"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.tag')}}:</label>
                <div class="col-md-8">
                    <input id="form-tag" type="" class="form-control" placeholder="" style="width:100%">
                </div>
            </div>
        </div>

        <label class="col-sm-12"><b>6.{{trans('backoffice/metadata/metadata.connection_format')}}</b></label>
        <div class="form-inline">
            <div class="form-group col-md-12">
                <label for=""
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.connection_format')}}:</label>
                <div class="col-md-1">
                    <div class="radio">
                        <label><input type="radio" name="connection_format" value="Online" checked />Online</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="radio">
                        <label><input type="radio" name="connection_format" value="Offline" />Offline</label>
                    </div>
                </div>
            </div>
        </div>

        <label class="col-sm-12"><b>7.{{trans('backoffice/metadata/metadata.channel')}}</b></label>
        <div class="form-inline">
            <div class="form-group col-md-12">
                <label for="form-channel" class="col-sm-3 control-label">
                    {{trans('backoffice/metadata/metadata.channel')}}:<br>{{trans('backoffice/metadata/metadata.channel_desc')}}
                </label>
                <div class="col-sm-8">
                    <input id="form-channel" type="" class="form-control" disabled readonly style="width:100%">
                </div>
            </div>
        </div>

        <label
            class="col-sm-12"><b>8.{{trans('backoffice/metadata/metadata.data_unit').trans('backoffice/metadata/metadata.data_unit_desc')}}</b></label>
        <div class="form-inline">
            <div class="form-group col-md-12">
                <label for="form-data_unit"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.data_unit')}}:</label>
                <div class="col-sm-8">
                    <select id="form-data_unit" class="form-control"></select>
                </div>
            </div>
        </div>

        <label class="col-sm-12"><b>9.{{trans('backoffice/metadata/metadata.frequency')}}</b></label>
        <div class="form-inline">
            <div class="form-group col-md-12 group-frequency">
                <label for="form-frequency" class="col-sm-3 control-label">
                    <span class="color-red">*</span>
                    {{trans('backoffice/metadata/metadata.frequency')}}:
                </label>
                <div class="col-sm-6">
                    <input type="number" min="1" class="form-control" name="form-frequency" id="form-frequency"
                        data-parsley-required data-parsley-error-message="{{trans('master.msg_err_require')}}"
                        style="width:100%">
                </div>
                <div class="col-sm-2">
                    <select id="form-frequency_unit" name="form-frequency_unit" class="form-control"
                        data-parsley-required data-parsley-error-message="{{trans('master.msg_err_data_null')}}"
                        style="width:100%"></select>
                </div>
                <div class="col-sm-1 icon-add">
                    <a href="javascript:void(0)" class="add-group-frequency"><i class="fa fa-plus-circle"
                            aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-sm-7 col-sm-offset-4" id="err-group-frequency"></div>
        </div>

        <label class="col-sm-12"><b>10.{{trans('backoffice/metadata/metadata.metadata')}}</b></label>
        <div class="form-inline">
            <div class="form-group col-md-12">
                <label for="form-metadata_status" class="col-sm-3 control-label">
                    <span class="color-red">*</span>
                    {{trans('backoffice/metadata/metadata.metadata_status')}}:
                </label>
                <div class="col-sm-8" style="margin-bottom:10px">
                    <select id="form-metadata_status" class="form-control" data-parsley-required
                        data-parsley-error-message="{{trans('master.msg_err_data_null')}}" style="width:100%"></select>
                </div>

                <label for="form-method" class="col-sm-3 control-label">
                    <span class="color-red">*</span>
                    {{trans('backoffice/metadata/metadata.method')}}:
                </label>
                <div class="col-sm-8" style="margin-bottom:10px">
                    <select id="form-method" class="form-control" data-parsley-required
                        data-parsley-error-message="{{trans('master.msg_err_data_null')}}" style="width:100%"></select>
                </div>

                <label for="form-dataformat" class="col-sm-3 control-label">
                    <span class="color-red">*</span>
                    {{trans('backoffice/metadata/metadata.data_format')}}:
                </label>
                <div class="col-sm-8" style="margin-bottom:10px">
                    <select id="form-dataformat" class="form-control" data-parsley-required
                        data-parsley-error-message="{{trans('master.msg_err_data_null')}}" style="width:100%"></select>
                </div>

                <label for="form-convertfrequency" class="col-sm-3 control-label">
                    <span class="color-red">*</span>
                    {{trans('backoffice/metadata/metadata.convertfrequency')}}:
                </label>
                <div class="col-sm-6" style="margin-bottom:10px">
                    <input type="number" min="1" class="form-control" id="form-convertfrequency" data-parsley-required
                        data-parsley-error-message="{{trans('master.msg_err_require')}}" style="width:100%">
                </div>
                <div class="col-sm-2" style="margin-bottom:10px">
                    <select id="form-convertfrequency_unit" name="form-convertfrequency_unit" class="form-control"
                        data-parsley-required data-parsley-error-message="{{trans('master.msg_err_data_null')}}"
                        style="width:100%"></select>
                </div>

            </div>
        </div>
        <label class="col-sm-12"><b>11.{{trans('backoffice/metadata/metadata.service_method')}}</b></label>
        <div class="form-inline">
            <div class="form-group col-md-12">
                <label for="form-service_method"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.service_method')}}:</label>
                <div class="col-sm-8">
                    <select id="form-service_method" class="form-control" multiple="multiple"></select>
                </div>
            </div>
        </div>

        <label class="col-sm-12"><b>12.{{trans('backoffice/metadata/metadata.other')}}</b></label>
        <div class="form-inline">
            <div class="form-group col-md-12">
                <label for="form-update_plan" class="col-sm-3 control-label">
                    <span class="color-red">*</span>
                    {{trans('backoffice/metadata/metadata.update_plan')}}:
                </label>
                <div class="col-sm-7" style="margin-bottom : 10px">
                    <input type="number" min="1" class="form-control" id="form-update_plan" data-parsley-required
                        data-parsley-error-message="{{trans('master.msg_err_require')}}" style="width : 100%">
                </div>
                <div class="form-inline col-sm-1">
                    <label class="control-label">{{trans('backoffice/metadata/metadata.minute')}}</label>
                </div>

                <label for="form-law"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.law')}}:</label>
                <div class="col-sm-8" style="margin-bottom : 10px">
                    <textarea class="form-control" rows="2" id="form-law" style="width : 100%"></textarea>
                </div>
                <span class="col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/metadata/metadata.law_desc')}}"></i>
                </span>

                <label for="form-remark"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.remark')}}:</label>
                <div class="col-sm-8" style="margin-bottom : 10px">
                    <textarea class="form-control" rows="2" id="form-remark" style="width : 100%"></textarea>
                </div>
                <span class="col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/metadata/metadata.remark_desc')}}"></i>
                </span>

            </div>
        </div>

        <label class="col-sm-12 history_log"><b>13.{{trans('backoffice/metadata/metadata.history_log')}}</b></label>

        <div class="form-inline history_log">
            <div class="form-group col-sm-12">
                <label for="form-history"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.history')}}:</label>
                <div class="col-sm-8">
                    <textarea class="form-control w-100" rows="1" id="form-history"></textarea>
                </div>
                <span class="col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top"
                        title="{{trans('backoffice/metadata/metadata.history_desc')}}"></i>
                </span>
            </div>
        </div>

        <div class="form-group" id="history_detail">
            <div class="col-sm-12">
                <label>{{trans('backoffice/metadata/metadata.history_detail')}}</label>
                <div class="table-responsive">
                    <table id="form-tblHistory" class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>{{trans('backoffice/metadata/metadata.history_date')}}</th>
                                <th>{{trans('backoffice/metadata/metadata.history_by')}}</th>
                                <th>{{trans('backoffice/metadata/metadata.history')}}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Form English -->
    <div class="metadata-en">
        <div class="form-inline">
            <div class="col-md-offset-4 col-sm-8 err-form"></div>
            <div class="form-group col-md-12">
                <label for="form-agency_name-en"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.agency_name-en')}}:</label>
                <div class="col-sm-8">
                    <input type="" class="form-control" id="form-agency_name-en" placeholder="" style="width:100%">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="form-service_name-en"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.service_name-en')}}:</label>
                <div class="col-sm-8">
                    <input type="" class="form-control" id="form-service_name-en" placeholder="" style="width:100%">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="form-description-en"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.description-en')}}:</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="4" id="form-description-en" placeholder=""
                        style="width:100%"></textarea>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="form-tag-en"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.tag-en')}}:</label>
                <div class="col-sm-8">
                    <input id="form-tag-en" type="" class="form-control" placeholder="" style="width:100%">
                </div>
            </div>
        </div>
    </div>
    <!-- Form Japan -->
    <div class="metadata-jp">
        <div class="form-inline">
            <div class="col-md-offset-4 col-sm-8 err-form"></div>
            <div class="form-group col-md-12">
                <label for="form-agency_name-jp"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.agency_name-jp')}}:</label>
                <div class="col-sm-8">
                    <input type="" class="form-control" id="form-agency_name-jp" placeholder="" style="width:100%">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="form-service_name-jp"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.service_name-jp')}}:</label>
                <div class="col-sm-8">
                    <input type="" class="form-control" id="form-service_name-jp" placeholder="" style="width:100%">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="form-description-jp"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.description-jp')}}:</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="4" id="form-description-jp" placeholder=""
                        style="width:100%"></textarea>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="form-tag-jp"
                    class="col-sm-3 control-label">{{trans('backoffice/metadata/metadata.tag-jp')}}:</label>
                <div class="col-sm-8">
                    <input id="form-tag-jp" type="" class="form-control" placeholder="" style="width:100%">
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="text-center">
        <button id="form-save-btn" type="button" class="btn btn-primary">{{ trans('/master.btn_save') }}</button>
        <button id="form-close-btn" type="button" class="btn btn-default"
            data-dismiss="modal">{{ trans('/master.btn_cancel') }}</button>
    </div>
</form>
<div id="master-group-frequency" class="hidden delete-text form-group col-md-12" hidden
    style="padding-left:0;padding-right:0">


    <label for="form-frequency" class="col-sm-3 control-label">
        <span class="color-red">*</span>
        {{trans('backoffice/metadata/metadata.frequency')}}:
    </label>

    <div class="col-sm-6">
        <input type="number" name="form-frequency" min="1" class="form-control" data-parsley-required
            data-parsley-error-message="{{trans('master.msg_err_require')}}" style="width : 100%">
    </div>
    <div class="col-sm-2">
        <select name="form-frequency_unit" class="form-control" data-parsley-required
            data-parsley-error-message="{{trans('master.msg_err_data_null')}}" style="width : 100%">
        </select>
    </div>
    <div class="col-sm-1 icon-add">
        <a href="javascript:void(0)" class="remove-group-frequency">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
        </a>
    </div>

</div>

</div>


<style>
label.col-sm-3 {
    justify-content: flex-end;
    text-align: right;
}

label.col-md-3 {
    justify-content: flex-end;
    text-align: right;

}

.form-group.col-md-12 {
    margin-bottom: 10px;
}
</style>
<script type="text/javascript">
var TRANS = {
    msg_display_all: '{{trans("master.msg_display_all")}}',
    metadata: '{{trans("backoffice/metadata/metadata.page_name")}}',
    add_metadata: '{{trans("backoffice/metadata/metadata.add_metadata")}}',
    msg_convertfrequency_limit: '{{trans("backoffice/metadata/metadata.msg_convertfrequency_limit")}}'
};
</script>

@stop