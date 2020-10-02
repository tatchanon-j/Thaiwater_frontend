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
        'text' => trans('backoffice/metadata/hydroinfo.page_name')
        )
    ));
    $view->option('js-init','srvData.init(group_Translator)');
    $view->option('page_name', trans('backoffice/metadata/hydroinfo.page_title'));
    ?>


    {!! $view->resource('theme-css','css/backoffice/metadata/hydroinfo.css') !!}


    @stop

    @section('content')



    <div id="" class="table-responsive">
        <table id="tbl-hydro" class="display admin-datatables" width="100%">
            <thead>
                <tr>
                    <th>{{ trans('/backoffice/metadata/hydroinfo.col_number') }}</th>
                    <th>{{ trans('/backoffice/metadata/hydroinfo.col_hydroinfo') }}</th>
                    <th>{{ trans('/backoffice/metadata/hydroinfo.col_agency') }}</th>
                    <th>{{ trans('/master.col_edit_del') }}</th>
                </tr>
            </thead>
            <tfoot>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="dlgEditHydroinfo" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="dlgEditHydroinfo-title"></h4>
                    <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
                   
                </div>
                <div class="modal-body">
               
                    
                    <form id="dlgEditHydroinfo-form"  class="form-horizontal" role="form">                   
                    <div class="form-inline"> 
                        <input type="hidden" id="dlgEditHydroinfo-id" name="id" />

                        <!-- <div class="form-group">
                        <label class="control-label col-sm-4" for="dlgEditHydroinfo-name"><span class="color-red">*</span>หน่วยงานที่รับผิดชอบ:</label>
                        <div class="col-sm-8">
                        <select id="dlgEditHydroinfo-multiselected" type="text" class="form-control" name="department" data-key="selected" data-key="selected" multiple="multiple" data-parsley-required data-parsley-error-message="'+self.translator['msg_err_require']+'">
                    </select>
                </div>
            </div> -->
            </div>
        </form>
    
    </div>
    <div class="modal-footer">
       
      
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary" id="dlgEditHydroinfo-save-btn">{{trans('/master.btn_save')}}</button>
    </div>
</div>
</div>
</div>
<style>
label.col-sm-5 {
    justify-content : flex-end;
    text-align : right;
    
}
label.col-sm-4 {
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
</style>
@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect') !!}
{!! $view->resource('js','js/backoffice/metadata/hydroinfo.js') !!}
