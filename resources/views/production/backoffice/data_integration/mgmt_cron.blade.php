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
    'href' => $l->httpUrl("backoffice/data_integration/mgmt_script"),
    'text' => trans('backoffice/data_integration/mgmt_script.main_menu_name')
  ),
  array(
    'text' => trans('backoffice/data_integration/mgmt_cron.page_name')
  ),
  )
);
$view->option('page_name', trans('backoffice/data_integration/mgmt_cron.page_name'));
$view->option('js-init','mgmt.init(group_Translator)');
?>

{!! $view->resource('theme-css','css/backoffice/data_integration/mgmt_cron.css') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2','JsonHelper') !!}

{!! $view->resource('js','js/backoffice/data_integration/mgmt_cron.js') !!}

@stop

@section('content')

<div class="data-filters">
  <p>{{ trans('/backoffice/data_integration/mgmt_cron.remark_mgmt_cron')  }}</p>
</div>


<!-- data table -->
<div class="table-responsive">
  <table id="tbl-mgmt-cron" class="display datatables" width="100%">
    <thead>
      <tr>
        <th>{{trans('backoffice/data_integration/mgmt_cron.download_id')}}</th>
        <th>{{trans('backoffice/data_integration/mgmt_cron.download_name')}}</th>
        <th>{{trans('backoffice/data_integration/mgmt_cron.download_desc')}}</th>
        <th>{{trans('backoffice/data_integration/mgmt_cron.download_script')}}</th>
        <th>{{trans('backoffice/data_integration/mgmt_cron.agency')}}</th>
        <th>{{trans('backoffice/data_integration/mgmt_cron.interval')}}</th>
        <th>{{trans('backoffice/data_integration/mgmt_cron.page_name')}}</th>
      </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    </tbody>
  </table>
</div>
<!-- end data table -->

<!-- Modal -->
<div id="dlg-mgmt-cron" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 id="dlg-mgmt-cron-title" class="modal-title">{{ trans('backoffice/data_integration/mgmt_cron.title_edit') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="dlg-mgmt-cron-form" class="form-row" role="form-group">
          <input type="text" id="dlg-mgmt-cron-id" hidden />
          <div class="form-group row col-sm-12">
            <label class="col-form-label text-sm-right col-sm-2"><span class="color-red">*</span>{{ trans('backoffice/data_integration/mgmt_cron.agency') }}</label>
            <div class="col-sm-10">
              <input type="text" id="dlg-mgmt-cron-agency" class="form-control" disabled/>
            </div>
          </div>
          <div class="form-group row col-sm-12">
            <label class="col-form-label text-sm-right col-sm-2"><span class="color-red">*</span>{{ trans('backoffice/data_integration/mgmt_cron.interval') }}</label>
            <div class="col-sm-2">
              <input type="text" id="dlg-mgmt-cron-crontab_setting-0" class="form-control" placeholder="*" name="crontab" data-parsley-required/>
            </div>
            <div class="col-sm-2">
              <input type="text" id="dlg-mgmt-cron-crontab_setting-1" class="form-control" placeholder="*" name="crontab" data-parsley-required/>
            </div>
            <div class="col-sm-2">
              <input type="text" id="dlg-mgmt-cron-crontab_setting-2" class="form-control" placeholder="*" name="crontab" data-parsley-required/>
            </div>
            <div class="col-sm-2">
              <input type="text" id="dlg-mgmt-cron-crontab_setting-3" class="form-control" placeholder="*" name="crontab" data-parsley-required/>
            </div>
            <div class="col-sm-2">
              <input type="text" id="dlg-mgmt-cron-crontab_setting-4" class="form-control" placeholder="*" name="crontab" data-parsley-required/>
            </div>
          </div>
          <div class="form-group row col-sm-12">
            <label class="col-form-label text-sm-right col-sm-2">{{ trans('backoffice/data_integration/mgmt_cron.download_script') }}</label>
            <div class="col-sm-10">
              <input type="text" id="dlg-mgmt-cron-dl-script" class="form-control" disabled/>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('/master.btn_cancel') }}</button>
        <button id="btn-save" type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('/master.btn_save') }}</button>
      </div>
    </div>

  </div>
</div>
<!-- end Modal -->



@stop
