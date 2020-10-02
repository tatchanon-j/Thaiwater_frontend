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
    'text' => trans('backoffice/metadata/metadata_status.page_name')
    )
  ));
  $view->option('js-init','mts.init(group_Translator)');
  $view->option('page_name', trans('backoffice/metadata/metadata_status.page_name'));
  ?>

  {!! $view->resource('theme-css','css/backoffice/metadata/metadata_status.css') !!}
  {!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
  {!! $view->resource('js','js/backoffice/metadata/metadata_status.js') !!}
  @stop

  @section('content')

  <!-- data table -->
  <div  class="tbl-metadata_status">
    <table id="tbl-metadata_status" class="display admin-datatables" width="100%">
      <thead>
        <tr>
          <th>{{trans('/master.col_order')}}</th>
          <th>{{ trans('backoffice/metadata/metadata_status.col_metadata_status_th') }}</th>
          <th>{{ trans('backoffice/metadata/metadata_status.col_metadata_status_en') }}</th>
          <th>{{ trans('backoffice/metadata/metadata_status.col_metadata_status_jp') }}</th>
          <th>{{trans('/master.col_edit_del')}}</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>
  <!-- end datatable -->

  <!-- dialog blog add and edit data  -->
  <div class="modal fade" id="dlg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="dlg-title" ></h4>
          <button type="button" class="close" data-dismiss="modal"
          aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <form role="form" id="dlg-form" class="form-horizontal">
            <input type="hidden" id="dlg-id" name="id"  />

            <div class="form-group form-row">
              <label class="control-label col-sm-3 m-auto text-right" for="dlg-name"><span class="color-red">*</span>{{ trans('/backoffice/metadata/metadata_status.col_metadata_status_th') }}:</label>
              <div class="col-sm-9">
                <input id="dlg-input-th" type="text" class="form-control" name="department"
                data-parsley-required/>
              </div>
            </div>

            <div class="form-group form-row">
              <label class="control-label col-sm-3 m-auto text-right" for="dlg-name">{{ trans('/backoffice/metadata/metadata_status.col_metadata_status_en') }}:</label>
              <div class="col-sm-9">
                <input id="dlg-input-en" type="text" class="form-control" name="department"/>
              </div>
            </div>

            <div class="form-group form-row">
              <label class="control-label col-sm-3 m-auto text-right" for="dlg-name">{{ trans('/backoffice/metadata/metadata_status.col_metadata_status_jp') }}:</label>
              <div class="col-sm-9">
                <input id="dlg-input-jp" type="text" class="form-control" name="department"/>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
          <button type="button" class="btn btn-primary" id="dlg-save-btn">{{trans('/master.btn_save')}}</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end dialog blog add and edit data  -->
  @stop
