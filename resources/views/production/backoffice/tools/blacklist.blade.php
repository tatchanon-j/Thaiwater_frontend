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
$view->option('page_name', trans('backoffice/tools/blacklist.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/tools/blacklist.css') !!}

@stop

@section('content')

<!-- data table -->
<div class="table-responsive">
  <table id="tbl-blacklist" class="display admin-datatables" width="100%">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>domain/ip</th>
        <th>วันที่</th>
        <th>remark</th>
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

<!-- dialog box -->
<div class="modal fade" id="dlgEditBlacklist" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="">เพิ่ม Blacklist</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <form role="form" id="">
          <!-- class="form-inline" -->
          <div class="form-group row">
            <label class="form-control-label text-sm-right col-sm-3" ><span class="color-red">*</span>domain/ip:</label>
              <div class="col-sm-9">
              <input id=""  type="text" class="form-control" name="code"
              data-parsley-required/>
            </div>
          </div>

          <div class="form-group row">
            <label class="form-control-label text-sm-right col-sm-3" ><span class="color-red">*</span>Remark:</label>
            <div class="col-sm-9">
              <textarea id="" class="form-control" rows="4" cols="50" ></textarea>
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{
					trans("/master.btn_cancel") }}</button>
        <button type="button" class="btn btn-primary" id="">{{ trans("/master.btn_save") }}</button>
        
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
{!! $view->resource('js','js/backoffice/tools/blacklist.js') !!}
{!! $view->resource('js','../vendor/jscolor/jscolor.js') !!}
{!! $view->resource('js','js/bootstrap_toggle.js') !!}