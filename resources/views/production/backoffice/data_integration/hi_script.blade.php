@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
array(
    array(
        'href' => $l->httpUrl("/backoffice/data_integration/hi_script"),
        'text' => trans('backoffice/data_integration/mgmt_script.main_menu_name')
    ),
    array(
        'text' => trans('backoffice/data_integration/hi_script.page_name')
    ),
    )
);
$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datetimepicker','JsonHelper','moment','select2');
$view->option('page_name',  trans('backoffice/data_integration/hi_script.page_name'));
$view->option('js-init','hs.init(group_Translator)');
$view->resource('theme-css','css/backoffice/data_integration/hi_script.css');
$view->resource('js','js/backoffice/data_integration/hi_script.js');
?>

@section('content')

<script>

</script>

<!-- search -->
<div class="data-filters">
    <form class="form-row" id="form_import">
        <div class="form-group row col-sm-12">
            <div class="col-sm-6 row">
                <label for="agency" class="col-form-label text-sm-right col-sm-4"><span class="color-red">*</span>{{ trans('backoffice/data_integration/hi_script.agency') }} : </label>
                <div class="col-sm-7 ">
                    <select name="filter_agency" id="agency" class="form-control">
                      <option value="" class="default">{{ trans('/master.msg_filter_required') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 row">
                <label for="metadata" class="col-form-label text-sm-right col-sm-4"><span class="color-red">*</span>{{ trans('backoffice/data_integration/hi_script.metadata') }} : </label>
                <div class="col-sm-7 ">
                    <select name="filter_metadata" id="metadata" class="form-control" multiple="multiple"></select>
                </div>
            </div>
        </div>

        <div class="form-group row col-sm-12">
            <div class="col-sm-6 row">
                <label for="status" class="col-form-label text-sm-right col-sm-4"><span class="color-red">*</span>{{ trans('backoffice/data_integration/hi_script.status') }} : </label>
                <div class="col-sm-7 ">
                    <select name="" id="status" class="form-control" multiple="multiple"></select>
                </div>
                <div class="row col-sm-1">
                    <i class='fa fa-info-circle' aria-hidden='true'  data-toggle="tooltip"
                    data-placement="top" title="{{trans('backoffice/data_integration/hi_script.tooltip_status')}}"></i>
                </div>
            </div>
        </div>

        <div class="form-group row col-sm-12">
			<div class="col-sm-6 row">
				<label for="startdate" class="col-form-label text-sm-right col-sm-4"><span class="color-red">*</span>{{ trans("backoffice/data_integration/hi_script.date_from") }} : </label>
				<div class="col-sm-7">
					<div class="input-group date" >
						<input id="startdate" type="text" class="form-control" placeholder="YYYY-MM-DD">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						</div>
					</div>
				</div>
			</div>
            <div class="col-sm-6 row">
                <label for="enddate" class="col-sm-4 col-form-label text-sm-right"><span class="color-red">*</span>{{ trans("backoffice/data_integration/hi_script.date_to") }} : </label>
                <div class="col-sm-7">
                    <div class="input-group date">
                        <input id="enddate"type="text" class="form-control" placeholder="YYYY-MM-DD">
                        <div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 text-center">
          <button type="button" class="btn btn-primary" id="btn_preview">{{trans('master.btn_display')}}</button>
        </div>
    </form>
</div>
<!-- end search -->

<!-- data table -->
<div class="table-responsive">
    <table id="tbl" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th>{{trans('backoffice/data_integration/hi_script.metadata')}}</th>
                <th>{{trans('backoffice/data_integration/hi_script.agency')}}</th>
                <th>{{trans('backoffice/data_integration/hi_script.dl_starttime')}}</th>
                <th>{{trans('backoffice/data_integration/hi_script.im_endtime')}}</th>
                <th>{{trans('backoffice/data_integration/hi_script.duration_time')}}</th>
                <th>{{trans('backoffice/data_integration/hi_script.status')}}</th>
                <th>{{trans('backoffice/data_integration/hi_script.frequency')}}</th>
                <th>{{trans('backoffice/data_integration/hi_script.channel')}}</th>
                <th>{{trans('backoffice/data_integration/hi_script.file_size')}}</th>
				        <th>{{trans('backoffice/data_integration/hi_script.event_code')}}</th>
                <th>{{trans('backoffice/data_integration/hi_script.rerun')}}</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<!-- end data table -->

@stop
