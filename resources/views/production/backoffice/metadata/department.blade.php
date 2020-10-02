@section('extra_head')

@extends('backoffice/layout/master')

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$locale = \App\Helpers\LocaleHelper::getInstance();
$lang = $locale->getAllLocales();
$getLocal = $locale->getLocale();

$view->option('breadcrumb',
array(
    array(
        'href' => $locale->httpUrl("backoffice/metadata/metadata"),
        'text' => trans('backoffice/metadata/metadata.main-menu-mode')
    ),
    array(
        'text' => trans('backoffice/metadata/department.page_name')
    ),
));

$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/metadata/department.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/metadata/department.css') !!}

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2') !!}

{!! $view->resource('js','js/backoffice/metadata/department.js') !!}
@stop

@section('content')
<div class="data-filters">
    <form class="form-horizontal">
    <div class="form-inline">  
        <div class="col-sm-12 form-group">
            <label for="category" class="col-sm-3 control-label "><span class="color-red">*</span>{{trans('/backoffice/metadata/department.label_ministry')}}:</label>
            <div class="col-sm-5">
                <select class="form-control" id="filter_ministry" name="filter_ministry" multiple="multiple">
                </select>                
            </div>
            <button type="button" class="btn btn-primary col-sm-1" id="btn_preview">{{ trans('master.btn_display') }}</button>
        </div>
        
    </div>
    </form>
</div>
<!-- Data table -->
<div class="table-responsive">
    <table id="tbl-department" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{trans('/master.col_order')}}</th>
                <th>{{trans('/backoffice/metadata/department.col_depart')}}</th>
                <th>{{trans('/backoffice/metadata/department.col_ministry')}}</th>
                <th>{{trans('/master.col_edit_del')}}</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<!-- End Data tabl -->

<!-- Modal Add adn Edit  Department -->
<div class="modal fade" id="dlgEditDepartment" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Header Modal Add Department name -->
            <div class="modal-header">
            <h4 class="modal-title" id="dlgEditDepartment-title"></h4>
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">&times;</button>
            </div>
            <!-- End Header Modal Add and Edit Department -->

            <!-- Body Modal Add Department name -->
            <div class="modal-body">
                <form role="form" id="dlgEditDepartment-form" class="form-horizontal">
                    <input type="hidden" id="dlgEditDepartment-id" name="id" />
                    <div class="form-group row">
                        <label class="col-form-label text-sm-right col-sm-3"for="dlgEditDepartment-name"><span class="color-red"> *</span>{{trans('backoffice/metadata/department.label_ministry')}}:</label>
                        <div class="col-sm-9">
                            <select id="input_ministry" class="form-control" name="input_ministry" data-key="input_ministry">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-sm-right col-sm-3"for="dlgEditDepartment-name"><span class="color-red"> *</span>{{ trans('backoffice/metadata/department.code_depart')}}:</label>
                        <div class="col-sm-4">
                            <input id="department_code" class="form-control" type="text" name="department_code" data-key="department_code" data-parsley-required/>
                        </div>
                    </div>

                </form>
                <div class="clearfix"></div>
            </div>
            <!-- End Body Modal Add Department name -->

            <!-- Footer Modal Add Department name -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('/master.btn_cancel')}}</button>
                <button type="button" class="btn btn-primary"	id="dlgEditDepartment-save-btn">{{ trans('/master.btn_save')}}</button>
            </div>
            <!-- End Footer Modal Add Department name -->
        </div>
    </div>
</div>
<!-- End Modal Add Department name -->
<script type="text/javascript">
    var TRANS = {
        'add_title' : "{{ trans('backoffice/metadata/department.add_department')}}",
        'edit_title' : "{{ trans('backoffice/metadata/department.edit_department')}}",

        'label_name' : "{{ trans('backoffice/metadata/department.label_name')}}",
        'col_shortname' : "{{ trans('backoffice/metadata/department.col_shortname')}}",
    };
</script>
<style>
label.col-sm-3 {
    justify-content : flex-end;
    text-align : right;
    
}
label.col-sm-2 {
    justify-content : flex-end;
    text-align : right;
    
}
label.col-md-2{
    justify-content : flex-end;
    text-align : right;

}
.form-group.col-md-12{
    margin-bottom : 10px;
}
.col-sm-3.control-label{
    justify-content: flex-end;
}
</style>
@stop
