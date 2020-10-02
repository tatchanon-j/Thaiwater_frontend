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
      'href' => $l->httpUrl("/data_service/data_service_register"),
      'text' => trans('backoffice/data_service/data_service_register.main_menu_name')
    ),
    array(
      'text' => trans('backoffice/data_service/data_service_register.page_name')
      )
    ));
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_service/data_service_register.page_name'));
  ?>

  {!! $view->resource('theme-css','css/backoffice/data_serevice/data_service_register.css') !!}

  @stop

  @section('content')
  <div class="data-filters">
    <form class="form-horizontal" id="form_import">

      <div class="form-group col-sm-12">
        <button type="button" class="btn btn-primary" id="btn_preview">รายการข้อมูล</button>
        <span class="po-right"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></span></i>
      </div>
      <!-- input_datestart -->
      <div class="form-group col-sm-12">
        <label for="input_datestart" class="control-label col-sm-1">วัตถุประสงค์</label>
        <div class="col-sm-11">
          <textarea class="form-control" rows="5" id="" name="datestart" data-key="datestart"></textarea>
          <input id="" type="checkbox">สำหรับบุคคลภายนอก</input>
        </div>

      </div>

      <div class="form-group col-sm-6">
        <label for="filter_monthstart" class="col-sm-4 control-label">ชื่อข้อมูล:</label>
        <div class="col-sm-8">
          <select name="monthstart" id="" class="form-control" data-key="monthstart">
            <option value="">-- แสดงทั้งหมด --</option>
          </select>
        </div>
      </div>

      <div class="form-group col-sm-6">
        <label for="filter_monthstart" class="col-sm-4 control-label">หน่วยงาน:</label>
        <div class="col-sm-8">
          <select name="monthstart" id="" class="form-control" data-key="monthstart">
            <option value="">-- แสดงทั้งหมด --</option>
          </select>
        </div>
      </div>

      <div class="col-sm-12 form-group">
        <div class="text-center">
          <button type="button" class="btn btn-primary" id="btn_preview">แสดงผล</button>
        </div>
      </div>
    </form>
    <div class="clearfix"></div>
  </div>

  <div id="" class="table-responsive">
    <table id="" class="display admin-datatables" width="100%">
      <thead>
        <tr>
          <th>ชื่อข้อมูล</th>
          <th>รายละเอียด</th>
          <th>หน่วยงานเจ้าของข้อมูล</th>
          <th>ความถี่ของข้อมูล</th>
          <th>เพิ่มรายการ</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>

  @stop
  {!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect') !!}
  {!! $view->resource('js','js/backoffice/data_serevice/data_service_register.js') !!}
