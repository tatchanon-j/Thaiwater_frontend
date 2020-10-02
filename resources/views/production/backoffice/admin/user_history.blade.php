@section('extra_head')
@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();


$view->option('main-menu-mode', 'admin');
$view->option(
  'breadcrumb',
  array(
    array(
      'href' => $l->httpUrl("backoffice/admin/group"),
      'text' => trans('backoffice/admin/admin.page_name')
    ),
    array(
      'text' => trans('backoffice/admin/user_history.page_name')
    )
  )
);
$view->option('js-init',  'srvSessionLog.init("' . $getLocal . '",history_Translator)');
$view->option('page_name', trans('backoffice/admin/user_history.page_name'));
?>

{!! $view->resource('theme-css','css/backoffice/admin/user_history.css') !!}

@stop

@section('content')

<!-- search  -->
<div class="data-filters">
  <form class="form-horizontal" id="sessionlog-form">
    <div class="form-inline justify-content-center">
      <div class="form-group col-sm-4">
        <label for="sessionlog-startat" class="control-label col-sm-2"><span class="color-red">*</span>{{ trans("/master.start_date") }}:</label>
        <div class="col-sm-10">
          <div class="input-group date">
            <input id="sessionlog-sessionlog_startat" type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm">
            <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name="sessionlog_startat" id="sessionlog-sessionlog_startat-rfc3339">

      <div class="form-group col-sm-4">
        <label for="sessionlog-sessionlog_stopat" class="col-sm-2 control-label"><span class="color-red">*</span>{{ trans("/master.end_date") }}:</label>
        <div class="col-sm-10">
          <div class="input-group date">
            <input id="sessionlog-sessionlog_stopat" type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm">
            <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name="sessionlog_stopat" id="sessionlog-sessionlog_stopat-rfc3339">

      <div class="form-group col-sm-4">
        <label for="sessionlog-userids" class="col-sm-3 control-label"><span class="color-red">*</span>{{ trans('backoffice/admin/user_history.filter_user') }}:</label>
        <div class="col-sm-8">
          <select name="sessionlog_userids" id="sessionlog-sessionlog_userids" class="form-control" multiple="multiple">
            <option value="">--{{ trans('backoffice/admin/user_history.filter_user') }} --</option>
          </select>
        </div>

        <label class="control-label" data-toggle="tooltip" data-placement="top" title="เงื่อนไขการดูประวัติสามารถตั้งค่าได้ในตาราง System setting"><i class="fa fa-info-circle" aria-hidden="true"></i></label>
      </div>

      <!-- <div class="col-sm-12 form-group"> -->
      <div class="text-center " style="margin-top:10px">
      <button type="button" class="btn btn-success" id="sessionlog-btn_export">{{ trans('backoffice/admin/user_history.btn_export') }}</button>
        <button type="button"  class="btn btn-primary" id="sessionlog-btn_preview">{{ trans('backoffice/admin/user_history.btn_show') }}</button>
        
      </div>
    </div>
</form>
<div class="clearfix"></div>
</div>
<!-- end search -->

<!-- data table -->
<div class="table-responsive">
  <table id="sessionlog-tbl" class="display datatables" width="100%">
    <thead>
      <tr>
        <th>{{trans('/master.col_order')}}</th>
        <th>{{trans('/backoffice/admin/user_history.col_login_at')}}</th>
        <th>{{trans('/backoffice/admin/user_history.col_logout_at')}}</th>
        <th>{{trans('/backoffice/admin/user_history.col_user')}}</th>
        <th>{{trans('/backoffice/admin/user_history.col_client_ip')}}</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    </tfoot>
  </table>
</div>
<!-- end data table -->
<style>
  label.col-sm-2 {
    justify-content: flex-end;
    text-align: right;
  }

  label.col-sm-3 {
    justify-content: flex-end;
    text-align: right;
  }

  label.col-md-3 {
    justify-content: flex-end;
    text-align: right;

  }

  .form-group.col-md-12 {
    margin-bottom: 10px;
  }
</style>
<script>
  var history_Translator = {
    'select_all': '{{ trans("backoffice/admin/user_history.select_all") }}',
    'all_selected': '{{ trans("backoffice/admin/user_history.all_selected") }}',
    'none_selected': '{{ trans("backoffice/admin/user_history.none_selected") }}',
    'still_login': '{{ trans("backoffice/admin/user_history.still_login") }}',
    'err_date_range': '{{ trans("backoffice/admin/user_history.err_date_range") }}',
  }
</script>
@stop

{!! $view->resource('js','js/backoffice/admin/user_history.js') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','bootbox','moment','bootstrap-datetimepicker') !!}