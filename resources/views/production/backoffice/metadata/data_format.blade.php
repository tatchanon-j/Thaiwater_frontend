@section('extra_head')

@extends('backoffice/layout/master')

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

// $view->option('main-menu-mode', 'admin');
$view->option('breadcrumb',
array(
  array(
    'href' => $l->httpUrl("backoffice/metadata/metadata"),
    'text' => trans('backoffice/metadata/metadata.main-menu-mode')
  ),
  array(
    'text' => trans('backoffice/metadata/data_format.page_name')
    )
  ));
  $view->option('js-init','dfm.init(group_Translator)');
  $view->option('page_name', trans('/backoffice/metadata/data_format.page_name'));
  ?>

  {!! $view->resource('theme-css','css/backoffice/metadata/data_format.css') !!}
  {!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
  {!! $view->resource('js','js/backoffice/metadata/data_format.js') !!}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>



  @stop

  @section('content')

  <div class="data-filters">
    <form class="form-horizontal">
      <div class="form-group form-row col-sm-8">
        <label class="col-sm-4 control-label m-auto text-right"><span class="color-red">*</span>{{ trans('backoffice/metadata/method.page_name') }}</label>
        <div class="col-sm-6">
          <select id="filter_method" class="form-control" multiple="multiple" data-key="filter_method">
          </select>
        </div>
        <div >
        <button type="button" class="btn btn-primary" id="btn_display">{{ trans('/master.btn_display') }}</button>
      </div>
      </div>
      <!-- Button Previews -->
    </form>
    <div class="clearfix"></div>
  </div>


  <div class="table-responsive">
    <table id="tbl-Dataformat" class="display admin-datatables" width="100%">
      <thead>
        <tr>
          <th>{{ trans('/master.col_order')}}</th>
          <th>{{ trans('/backoffice/metadata/data_format.col_dataformat')}}</th>
          <th>{{ trans('/backoffice/metadata/data_format.col_method')}}</th>
          <th>{{ trans('/master.col_edit_del')}}</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="dlgEditDataformat" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="dlgEditDataformat-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <form role="form" id="dlgEditDataformat-form" class="form-horizontal">
            <input type="hidden" id="dlgEditDataformat-id" name="id" />

            <div class="form-group form-row">
              <label class="control-label col-sm-2 m-auto text-right" for="dlgEditDataformat-name"><span class="color-red">*</span>{{ trans('/backoffice/metadata/method.page_name') }}:</label>
              <div class="col-sm-10">
                <select id="dlgEditDataformat-method"  class="form-control" name="department"data-parsley-required data-parsley-error-message="{{trans('/master.msg_err_require')}}">
                  <option class="op_default" value="">{{ trans('/master.msg_filter_required') }}</option>
                </select>
              </div>
            </div>

            <div class="form-group form-row">
              <label class="control-label col-sm-2 m-auto text-right" for="dlgEditDataformat-name"><span class="color-red">*</span>{{ trans('/backoffice/metadata/data_format.page_name') }} (TH):</label>
              <div class="col-sm-10">
                <input type="text" id="dlgEditDataformat-data-format-th"  class="form-control" name="department"data-parsley-required data-parsley-error-message="{{trans('/master.msg_err_require')}}"/>
              </div>
            </div>

            <div class="form-group form-row">
              <label class="control-label col-sm-2 m-auto text-right" for="dlgEditDataformat-name">{{ trans('/backoffice/metadata/data_format.page_name') }} (EN):</label>
              <div class="col-sm-10">
                <input type="text" id="dlgEditDataformat-data-format-en"  class="form-control" name="department"/>
              </div>
            </div>

            <div class="form-group form-row">
              <label class="control-label col-sm-2 m-auto text-right" for="dlgEditDataformat-name">{{ trans('/backoffice/metadata/data_format.page_name') }} (JP):</label>
              <div class="col-sm-10">
                <input type="text" id="dlgEditDataformat-data-format-jp"  class="form-control" name="department"/>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
          <button type="button" class="btn btn-primary" id="dlgEditDataformat-save-btn">{{trans('/master.btn_save')}}</button>
        </div>
      </div>
    </div>
  </div>


  @stop
