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
      'href' => $l->httpUrl("/data_management"),
      'text' => trans('backoffice/data_management/monitor_data.main_menu_name')
  ),
  array(
      'text' => trans('backoffice/data_management/mon_error_dgmt.page_name')
  ),
));
$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', trans('backoffice/data_management/mon_error_dgmt.page_name'));
?>


{!! $view->resource('theme-css','css/backoffice/data_management/mon_error_dgmt.css') !!}


@stop

@section('content')
<!-- search -->
<div class="data-filters">
  <form class="form-horizontal col-sm-12" id="form_import">
    <div class="form-inline" id="space-bottom">
        <div class="form-group col-sm-6 justify-content-center">
            <label for="filter_startdate" class="control-label col-sm-4 justify-content-end" ><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_from") }}:</label>
            <div class="col-sm-8">
                <div class="input-group date">
                    <input id="filter_startdate"type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
    </div>


      <div class="form-group col-sm-6">
          <label for="filter_enddate" class="col-sm-4 control-label justify-content-end" ><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_to") }}:</label>
          <div class="col-sm-8">
              <div class="input-group date">
                  <input id="filter_enddate"type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm">
                  <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                </div>
              </div>
          </div>
      </div>
    </div>

    <div class="form-inline">
      <div class="col-sm-6 form-group justify-content-center">
          <label for="filter_agency" class="col-sm-4 control-label justify-content-end" ><span class="color-red">*</span>{{ trans('/master.agency') }}:</label>
          <div class="col-sm-8">
              <select name="agency" id="filter_agency" class="form-control" data-key="agency" multiple="multiple">

              </select>
          </div>
      </div>
    </div>
    <br>
      <div class="col-sm-12 form-group">
          <p style="overflow-wrap: break-word;">
              <u style="float: left;width:100%;">{{trans('/master.remark')}}</u> {{trans('/master.msg_event')}}
          </p>
      </div>
      <div class="col-sm-12 form-group">
          <div class="text-center">
              <button id="btn-disPlay" type="button" class="btn btn-primary" >{{ trans('/master.btn_display')}}</button>
          </div>
      </div>
  </form>
  <div class="clearfix"></div>
</div>
<!-- end search -->

<!-- data type -->
<div class="table-responsive">
  <table id="tbl-mon-error-dgmt" class="display monerr-datatables" width="100%">
      <thead>
          <tr>
              <th> <input class="control-label" type="checkbox" name="select_all" id="select_all"> {{ trans('/master.selected_all') }}</th>
              <th>{{ trans('/master.col_datetime') }}</th>
              <th>{{ trans('/master.agency') }}</th>
              <!-- <th>{{ trans('/backoffice/data_management/mon_error_dgmt.col_event_code') }}</th> -->
              <th>{{ trans('/backoffice/data_management/mon_error_dgmt.col_msg_event') }}</th>
              <th>{{ trans('/backoffice/data_management/mon_error_dgmt.col_date_fail') }}</th>
              <th>{{ trans('/backoffice/data_management/mon_error_dgmt.col_date_edited') }}</th>

          </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      </tbody>
  </table>
</div>
<!-- ebd data type -->

<!-- modal -->
<div id="dlgDetailError" class="modal fade" role="modal">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">

          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">{{ trans('/backoffice/data_management/mon_error_dgmt.record_mistake_detail') }}</h4>
          </div>
          <div class="modal-body">
              <form id="dlgDetailError-form" class="form-horizontal">
                  <div class="form-group">
                      <label class="control-label col-sm-3"><span class="color-red">*</span>{{ trans('/backoffice/data_management/mon_error_dgmt.mistake_detail') }}:</label>
                      <div class="col-sm-9">
                          <textarea id="dlgDetailError-detail" class="form-control" rows="5"
                          data-parsley-required></textarea>
                      </div>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('/master.btn_cancel') }}</button>
              <button id="btn_save" type="button" class="btn btn-primary">{{ trans('/master.btn_save') }}</button>
          </div>

      </div>
  </div>
</div>
<!--  end modal-->

<style>
  #space-top{
    margin-top:15px
  }
  #space-bottom{
    margin-bottom:15px
  }
</style>

@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datetimepicker','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/data_management/mon_error_dgmt.js') !!}
