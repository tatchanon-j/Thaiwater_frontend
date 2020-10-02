@section('extra_head')
@extends('backoffice/layout/master')

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option(
  'breadcrumb',
  array(
    array(
      'href' => $l->httpUrl('/backoffice/event_management/event_type'),
      'text' => trans('backoffice/event_management/event_type.main_menu_name')
    ),
    array(
      'text' => trans('backoffice/event_management/event_type.page_name')
    )
  )
);
$view->option('js-init', 'evt.init(group_Translator)');
$view->option('page_name', trans('backoffice/event_management/event_type.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/event_management/event_type.css') !!}

@stop

@section('content')

<!-- data table -->
<div class="table-responsive">
  <table id="tbl-eventtype" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>{{ trans('/master.col_order') }}</th>
        <th>{{ trans('backoffice/event_management/event_subtype.event_code') }}</th>
        <th>{{ trans('/backoffice/event_management/event_type.page_name')}}</th>
        <th>{{ trans('/master.color') }}</th>
        <th>{{trans('/master.col_edit_del')}}</th>
      </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end data table -->

<!-- dialog box -->
<div class="modal fade" id="dlgEditEventtype" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="dlgEditEventtype-title">{{trans('/backoffice/event_management/event_type.page_name') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <form role="form" id="dlgEditEventtype-form">
          <!-- class="form-inline" -->
          <div class="form-inline">
          <div class="form-group col-md-12 ">
            <input type="hidden" id="dlgEditEventtype-id" name="id" />
            <input type="hidden" id="dlgEditEventtype-category" name="category" />
            </div>
            <div class="form-group col-md-12 ">
              <label for="dlgEditEventtype-code" class="control-label col-sm-4"><span class="color-red">*</span>{{ trans('/backoffice/event_management/event_type.code') }}:</label>
              <div class="col-sm-8">
                <input id="dlgEditEventtype-code" style="width:100%" type="text" class="form-control" data-parsley-required data-parsley-pattern="/^[a-zA-Z]+$/">
              </div>
              <div class="row col-sm-1">
                <i class='fa fa-info-circle' aria-hidden='true' data-toggle="tooltip" data-placement="top" title="{{trans('master.tooltip_code')}}"></i>
              </div>
            </div>

            <div class="form-group color col-md-12">
              <label for="dlgEditEventtype-name" class="control-label col-sm-4">{{ trans('/master.tag_color') }}:</label>
              <div class="col-sm-8">
                <input id="dlgEditEventtype-color" class="jscolor {refine:false}" />
              </div>
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">{{
					trans("/master.btn_cancel") }}</button>
        <button type="button" class="btn btn-primary" id="dlgEditEventtype-save-btn">{{ trans("/master.btn_save") }}</button>
        
      </div>
    </div>
  </div>
</div>
<style>
  label.col-sm-3 {
    justify-content: flex-end;
    text-align: right;

  }

  label.col-md-2 {
    justify-content: flex-end;
    text-align: right;

  }

  .form-group.col-md-12 {
    margin-bottom: 10px;
  }
</style>
<!-- dialog box -->

@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/event_management/event_type.js') !!}
{!! $view->resource('js','../vendor/jscolor/jscolor.js') !!}