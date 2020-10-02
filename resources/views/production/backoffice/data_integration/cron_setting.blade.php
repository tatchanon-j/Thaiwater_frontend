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
			'text' => trans('backoffice/data_integration/mgmt_script.main_menu_name'),
		),
		array(
			'text' => trans('backoffice/data_integration/cron_setting.page_name'),
		),
	)
);
$view->option('page_name', trans('backoffice/data_integration/cron_setting.page_name'));
$view->option('js-init', 'mgmt.init(group_Translator)');
?>

{!! $view->resource('theme-css','css/backoffice/data_integration/cron_setting.css') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','select2','JsonHelper') !!}

{!! $view->resource('js','js/backoffice/data_integration/cron_setting.js') !!}

@stop

@section('content')
<div class="data-filters">
  <p>{{ trans('/backoffice/data_integration/mgmt_cron.remark_cronsetting')  }}</p>
</div>

<!-- data table -->
<div class="table-responsive">
  <table id="tbl-mgmt-cron" class="display datatables" width="100%">
    <thead>
      <tr>
        <th>{{trans('master.col_order')}}</th>
        <th>{{trans('backoffice/data_integration/cron_setting.cron_name')}}</th>
        <th>{{trans('backoffice/data_integration/cron_setting.cron_setting')}}</th>
        <th>{{trans('master.col_edit_del')}}</th>
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
        <h4 id="dlg-mgmt-cron-title" class="modal-title">{{ trans('backoffice/data_integration/cron_setting.title_edit') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <form id="dlg-mgmt-cron-form" class="form-row" role="form-group">
          <input type="text" id="dlg-mgmt-cron-id" hidden />
          <div class="col-sm-12">
          <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-2"><span class="color-red">*</span>{{ trans('backoffice/data_integration/cron_setting.cron_name') }}</label>
            <div class="col-sm-10">
              <input type="text" id="dlg-mgmt-cron-cron-name" class="form-control" disabled/>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group row">
            <label class="col-form-label text-sm-right col-sm-2"><span class="color-red">*</span>{{ trans('backoffice/data_integration/cron_setting.minute') }}</label>
            <div class="col-sm-1">
              <input type="text" id="dlg-mgmt-cron-crontab_setting-0" class="form-control" placeholder="*" name="crontab" data-parsley-required/>
            </div>
            <label class="col-form-label text-sm-right col-sm-1"><span class="color-red">*</span>{{ trans('backoffice/data_integration/cron_setting.hour') }}</label>
            <div class="col-sm-1">
              <input type="text" id="dlg-mgmt-cron-crontab_setting-1" class="form-control" placeholder="*" name="crontab" data-parsley-required/>
            </div>
            <label class="col-form-label text-sm-right col-sm-1"><span class="color-red">*</span>{{ trans('backoffice/data_integration/cron_setting.date') }}</label>
            <div class="col-sm-1">
              <input type="text" id="dlg-mgmt-cron-crontab_setting-2" class="form-control" placeholder="*" name="crontab" data-parsley-required/>
            </div>
            <label class="col-form-label text-sm-right col-sm-1"><span class="color-red">*</span>{{ trans('backoffice/data_integration/cron_setting.month') }}</label>
            <div class="col-sm-1">
              <input type="text" id="dlg-mgmt-cron-crontab_setting-3" class="form-control" placeholder="*" name="crontab" data-parsley-required/>
            </div>
            <label class="col-form-label text-sm-right col-sm-1"><span class="color-red">*</span>{{ trans('backoffice/data_integration/cron_setting.day') }}</label>
            <div class="col-sm-1">
              <input type="text" id="dlg-mgmt-cron-crontab_setting-4" class="form-control" placeholder="*" name="crontab" data-parsley-required/>
            </div>
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
