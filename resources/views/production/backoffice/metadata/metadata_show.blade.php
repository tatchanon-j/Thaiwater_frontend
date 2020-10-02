@section('extra_head')

@extends('backoffice/layout/master')
  <?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->
	getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
	array(
		array(
			'href' => $l->httpUrl("backoffice/metadata/metadata"),
			'text' => trans('backoffice/metadata/metadata.main-menu-mode'),
		),
		array(
			'text' => 'ระบบที่นำข้อมูลไปแสดง',
		),
	));
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', 'ระบบที่นำข้อมูลไปแสดง');
?>
  {!! $view->resource('theme-css','css/backoffice/metadata/metadata_show.css') !!}

@stop

@section('content')
  <h5>บัญชีข้อมูลแต่ละตัวนำไปแสดงผลที่ระบบใดบ้าง</h5>
  <!-- data table -->
  <div class="table-responsive">
    <table class="display admin-datatables" id="tbl-data-show" width="100%">
      <thead>
        <tr>
          <th>
            ลำดับที่
          </th>
          <th>
            บัญชีข้อมูล
          </th>
          <th>
            ประเภทข้อมูล
          </th>
          <th>
            รูปแบบการเชื่อมโยงข้อมูล
          </th>
          <th>
            หน่วยงานเจ้าของข้อมูล
          </th>
          <th>
            ระบบที่นำข้อมูลไปแสดง
          </th>
          <th>
            ส่วนที่แสดงข้อมูล
          </th>
          <th>
            แก้ไข/ลบ
          </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <!-- end datatable -->

<!-- modal form add and edit data  -->
  <div class="modal fade" id="dlgEdit" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
          <h4 class="modal-title" id="dlgEdit-title"></h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <form role="form" id="dlgEdit-form" class="form-row">
            <input type="hidden" id="id" name="id" />
            <div class="form-group col-sm-12 row">
              <label class="col-form-label text-sm-right col-sm-3" for="dlgEdit-name"><span class="color-red">*</span>หน่วยงาน:</label>
              <div class="col-sm-9">
                <select id="agency"  class="form-control" name="agency" data-parsley-required data-parsley-error-message="{{trans('/master.msg_err_require')}}">
                  <option class="op_default" value="">{{ trans('/master.msg_filter_required') }}</option>
                </select>
              </div>
            </div>
            <div class="form-group col-sm-12 row">
              <label class="col-form-label text-sm-right col-sm-3" for="metadata"><span class="color-red">*</span>บัญชีข้อมูล:</label>
              <div class="col-sm-9">
                <select id="metadata"  class="form-control" name="metadata"data-parsley-required data-parsley-error-message="{{trans('/master.msg_err_require')}}">
                  <option class="op_default" value="">{{ trans('/master.msg_filter_required') }}</option>
                </select>
              </div>
            </div>
            <div class="form-group col-sm-12 row">
              <label class="col-form-label text-sm-right col-sm-3" for="metadata_show_system"><span class="color-red">*</span>ระบบที่นำข้อมูลไปแสดง:</label>
              <div class="col-sm-9">
                <select id="metadata_show_system"  class="form-control" name="metadata_show_system"data-parsley-required data-parsley-error-message="{{trans('/master.msg_err_require')}}">
                  <option class="op_default" value="">{{ trans('/master.msg_filter_required') }}</option>
                </select>
              </div>
            </div>
            <div class="form-group col-sm-12 row">
              <label class="col-form-label text-sm-right col-sm-3" for="dlgEsubcategory"><span class="color-red">*</span>ส่วนที่แสดงข้อมูล:</label>
              <div class="col-sm-9">
                <select id="subcategory"  class="form-control" name="subcategory"data-parsley-required data-parsley-error-message="{{trans('/master.msg_err_require')}}">
                  <option class="op_default" value="">{{ trans('/master.msg_filter_required') }}</option>
                </select>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
          <button type="button" class="btn btn-primary" id="dlgEdit-save-btn">{{trans('/master.btn_save')}}</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end add and edit data  -->
@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2') !!}
{!! $view->resource('js','js/backoffice/metadata/metadata_show.js') !!}
