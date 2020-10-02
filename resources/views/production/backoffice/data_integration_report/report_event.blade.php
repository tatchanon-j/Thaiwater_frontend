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
    'href' => $l->httpUrl("backoffice/data_integration_report/report_event"),
    'text' => trans('backoffice/data_integration_report/report_event.main_menu_name')
  ),
  array(
    'text' => trans('backoffice/data_integration_report/report_event.page_name')
  ),
));
$view->option('js-init', 'srvData.init(group_Translator,initVar)');
$view->option('page_name', trans('backoffice/data_integration_report/report_event.page_name'));
?>
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker','highcharts','JsonHelper','moment') !!}
{!! $view->resource('js','js/backoffice/data_integration_report/report_event.js') !!}
{!! $view->resource('theme-css','css/backoffice/data_integration_report/report_event.css') !!}

@stop

@section('content')

<!-- search -->
<div class="data-filters">
  <form class="form-row">
    <input id="st_date" type="text" class="form-control" data-date-format="yyyy-mm-dd" style="display:none"/>
    <input id="en_date" type="text" class="form-control" data-date-format="yyyy-mm-dd" style="display:none"/>

    <div class="form-group row col-sm-4">
      <label for="filter_startdate" class="col-form-label text-sm-right col-sm-3"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_from") }}:</label>
      <div class="col-sm-9">
        <div class="input-group date">
          <input id="filter_startdate"type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="false"></i></span>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row col-sm-4">
      <label for="filter_enddate" class="col-sm-3 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_to") }}:</label>
      <div class="col-sm-9">
        <div class="input-group date">
          <input id="filter_enddate"type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="false"></i></span>
          </div>
        </div>
      </div>
    </div>

    <!-- filter_frequency -->
    <div class="col-sm-4 form-group row">
      <label for="filter_frequency" class="col-sm-3 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans('/master.agency')}}</label>
      <div class="col-sm-9">
        <select class="form-control" id="filter_agency" name="frequency" data-key="frequency" multiple="multiple">

        </select>
      </div>
    </div>

    <!-- btn_preview -->
    <div class="col-sm-12 form-group">
      <div class="text-center">
        <button type="button" class="btn btn-primary" id="btn_display">{{ trans('/master.btn_display') }}</button>
      </div>
    </div>
  </form>
  <div class="clearfix"></div>
</div>
<!-- search -->

<!-- pie graph -->
<div id="container-highchart" style="min-width:310px; width:98%; height:400px; margin:0 auto"></div>
<!-- end pie graph -->

<!-- tabs-->
<div class="panel-group" id="accordion">

</div>
<!-- end tabs -->

<!-- message not found data -->
<div id="data-notfound" style="display:none;">{{ trans('/master.msg_not_found_data') }}</div>
<!-- message not found data -->

<!-- modal display event detail-->
<div id="dlg-reportEvent" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="dlg-reportEvent-title"></h4>
      </div>
      <div class="modal-body">
        <div class="data-filters">
          <form class="form-horizontal">
            <input id="date_range" hidden/>
            <div class="form-group col-sm-6">
              <label for="dlg-reportEvent-startdate" class="control-label col-sm-4"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_from") }}:</label>
              <div class="col-sm-8">
                <div class="input-group date">
                  <input id="dlg-reportEvent-startdate"type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group col-sm-6">
              <label for="dlg-reportEvent-enddate" class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans("backoffice/apis/monitor.col_date_to") }}:</label>
              <div class="col-sm-8">
                <div class="input-group date">
                  <input id="dlg-reportEvent-enddate"type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 form-group">
              <label class="control-label col-sm-4"><span class="color-red">*</span>{{ trans('/master.agency') }}:</label>
              <div class="col-sm-8">
                <select type="text" id="dlg-reportEvent-agency" class="form-control" name="form-agency" multiple="multiple">

                </select>
              </div>
            </div>

            <div class="col-sm-6 form-group">
              <label for="dlg-reportEvent-event" class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('/master.event') }}</label>
              <div class="col-sm-8">
                <select class="form-control" id="dlg-reportEvent-event" name="event">
                  <option value="" class="op_default">{{ trans('/master.msg_filter_required') }}</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6 form-group">
              <label for="dlg-reportEvent-subevent" class="col-sm-4 control-label"><span class="color-red">*</span>{{ trans('/master.subevent') }}</label>
              <div class="col-sm-8">
                <select class="form-control" id="dlg-reportEvent-subevent" name="subevent">
                  <option value="" class="op_default">{{ trans('/master.msg_filter_required') }}</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <p>
                <u style="float: left;">{{ trans('/master.remark') }}</u> {{trans('master.msg_event')}}
              </p>
            </div>
            <!-- btn_preview -->
            <div class="col-sm-12 form-group">
              <div class="text-center">
                <button type="button" class="btn btn-primary" id="dlg-btn-display">{{ trans('/master.btn_display') }}</button>
              </div>
            </div>
          </form>
          <div class="clearfix"></div>
        </div>


        <div id="div_loading">
          <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
        </div>

        <div id="div_preview">
          <div class="table-responsive">
            <table id="dlg-reportEvent-tbl-reportEvent" class="display admin-datatables" width="100%">
              <thead>
                <tr>
                  <th>{{trans("backoffice/data_integration_report/report_event.column_date")}}</th>
                  <th>{{trans("backoffice/data_integration_report/report_event.column_agency")}}</th>
                  <th>{{trans("backoffice/data_integration_report/report_event.column_metadata")}}</th>
                  <th>{{trans("backoffice/data_integration_report/report_event.column_event")}}</th>
                  <th>{{trans("backoffice/data_integration_report/report_event.column_subevent")}}</th>
                  <th>{{trans("backoffice/data_integration_report/report_event.column_msg_event")}}</th>
                  <th>{{trans("backoffice/data_integration_report/report_event.column_time")}}</th>
                </tr>
              </thead>
              <tfoot>
              </tfoot>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('/master.btn_close') }}</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal display event detail-->

<!-- javascript  -->
<script type="text/javascript">
  var initVar = {
    agency_id : '{{ $agency_id }}',
    event_log_category_id : '{{ $event_log_category_id }}',
    event_code_id : '{{ $event_code_id }}',
    start_date : '{{ $start_date }}',
    end_date : '{{ $end_date }}',
  }
</script>
<!-- javascript  -->

@stop
