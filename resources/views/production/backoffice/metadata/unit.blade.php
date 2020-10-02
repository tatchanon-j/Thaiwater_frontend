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
    'text' => trans('backoffice/metadata/unit.page_name')
    )
  ));
  $view->option('js-init',
  'srvData.init(group_Translator)');
  $view->option('page_name', trans('backoffice/metadata/unit.page_name'));
  ?>

  {!! $view->resource('theme-css','css/backoffice/metadata/unit.css') !!}



  @stop

  @section('content')

    <div  class="tbl-unit">
    <table id="tbl-unit" class="display admin-datatables" width="100%">
      <thead>
        <tr>
          <th>{{trans('/master.col_order')}}</th>
          <th>{{ trans('backoffice/metadata/unit.col_unit_th') }}</th>
          <th>{{ trans('backoffice/metadata/unit.col_unit_en') }}</th>
          <th>{{ trans('backoffice/metadata/unit.col_unit_jp') }}</th>
          <th>{{trans('/master.col_edit_del')}}</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="dlgEditUnit" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="dlgEditUnit-title" ></h4>
          <button type="button" class="close" data-dismiss="modal"
          aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <form role="form-group" id="dlgEditUnit-form">
            <input type="hidden" id="dlgEditUnit-id" name="id"  />
            <input type="hidden" id="dlgEditUnit-category" name="category" />

            <!-- <div class="form-group">
              <label class="control-label col-sm-4" for="dlgEditUnit-name">หน่วยข้อมูล ('+upName+')<span class="color-red">*</span></label>
              <div class="col-sm-8">
                <input id="dlgEditUnit-'+id+'" type="text" class="form-control" name="department" data-key="'+id+'" data-parsley-required data-parsley-error-message="'+self.translator['msg_err_require']+'"/>
              </div>
            </div> -->

          </form>
        </div>
<!-- ############### footer ############### -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default"
                data-dismiss="modal">{{trans('/master.btn_cancel')}}
            </button>
            <button type="button" class="btn btn-primary"
                id="dlgEditUnit-save-btn">{{trans('/master.btn_save')}}
            </button>
        </div>
    </div>
    </div>
  </div>
@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect') !!}
{!! $view->resource('js','js/backoffice/metadata/unit.js') !!}
