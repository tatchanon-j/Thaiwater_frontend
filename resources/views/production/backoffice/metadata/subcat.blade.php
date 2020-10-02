@section('extra_head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
@extends('backoffice/layout/master')

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$locale = \App\Helpers\LocaleHelper::getInstance();

$lang = $locale->getAllLocales();
$getLocal = $locale->getLocale();
$breadcrumb = array(
    array(
        'href' => $locale->httpUrl("backoffice/metadata/metadata"),
        'text' => trans('backoffice/metadata/metadata.main-menu-mode')
    ),
    array(
        'text' => trans('backoffice/metadata/subcat.page_name')
    ),
);
$view->option( 'breadcrumb',$breadcrumb);

$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/metadata/subcat.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/metadata/subcat.css') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect') !!}
{!! $view->resource('js','js/backoffice/metadata/subcat.js') !!}
@stop

@section('content')

<div class="data-filters">
    <form class="form-horizontal">
        <div class="form-inline">
            <!-- <div class="col-md-offset-4 col-sm-8 err-form"></div> -->
            <div class="form-group col-sm-12">
                <label for="category" class="col-sm-4 control-label "><span class="color-red">*</span>{{ trans('backoffice/metadata/category.page_name') }}:</label>
                <div class="col-sm-3 ">
                    <select class="form-control" style="width:100%"  id="data-filters-filter_category" name="filter_category"  multiple="multiple" data-key="filter_method">
                        <option>Name</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary col-sm-1" id="btn_preview">{{ trans('master.btn_display') }}</button>
            </div>

        </div>
    </form>
</div>

<!-- Data table subcategory  -->
<div class="table-responsive">
    <table id="tbl-subcat" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{ trans("/master.col_order") }}</th>
                <th>{{ trans('backoffice/metadata/subcat.page_name') }}</th>
                <th>{{ trans('backoffice/metadata/category.page_name') }}</th>
                <th>{{ trans("/master.col_edit_del") }}</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<!-- End Data table subcategory  -->

<!-- Modal Add and Edit subcategory -->
<div class="modal fade" id="dlgEditSubCategory" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="dlgEditSubCategory-title"></h4>
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">

                <!-- Form input subcategory -->
                <form role="form" id="dlgEditSubCategory-form" class="form-row">
                    <input type="hidden" id="dlgEditSubCategory-id" name="id" />
                    <input type="hidden" id="dlgEditSubCategory-category" name="category" />
                    <div class="form-group row col-sm-12">
                        <label class="col-form-label text-sm-right col-sm-3"for="dlgEditSubCategory-name">
                            <span class="color-red">*</span>
                            {{ trans('backoffice/metadata/subcat.label_category') }}:
                        </label>
                        <div class="col-sm-9">
                            <select id="filter_category" class="form-control" name="filter_category" data-key="category">

                            </select>
                        </div>
                    </div>

                </form>
                <!-- End Form input subcategory -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
                <button type="button" class="btn btn-primary" id="btn-save">{{trans('/master.btn_save')}}</button>
            </div>
        </div>
    </div>
</div>
@stop
<!-- End Modal Add and Edit subcategory -->
