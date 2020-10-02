@section('extra_head')

@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();
$image_url = env('API_SERVER') . '/thaiwater30/shared/image?image=';

$view->option('breadcrumb',
array(
    array(
        'href' => $l->httpUrl("/backoffice/data_management/check_metadata"),
        'text' => trans('/backoffice/tools/mgmt_cache.main_menu_name')
    ),
    array(
        'text' => trans('/backoffice/tools/check_image.page_name')
        )
    ));
    $view->option('js-init', 'srvData.init(group_Translator)');
    $view->option('page_name', trans('/backoffice/tools/check_image.page_name'));
    ?>

{!! $view->resource('theme-css','css/backoffice/tools/check_image.css') !!}


@stop

@section('content')
<!-- Search  -->
<div class="data-filters">
    <form class="form-inline justify-content-center" id="form_filter">

        <div class="form-group col-sm-6">
            <label for="filter_agency"
                class="col-sm-4 control-label justify-content-end">{{ trans('/backoffice/tools/check_image.label_source')}}<span
                    class="color-red">*</span> :</label>
            <div class="col-sm-8">
                <select name="datasource" id="filter_agency" class="form-control" style="width:100%">
                    <option value="default" class="default">{{ trans('/master.msg_filter_required') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group col-sm-6">
            <label for="filter_imagetype"
                class="col-sm-4 control-label justify-content-end">{{ trans('/backoffice/tools/check_image.label_image_type')}}<span
                    class="color-red">*</span>:</label>
            <div class="col-sm-8">
                <select name="filter_imagetype" id="filter_imagetype" class="form-control" data-key="imagetype"
                    style="width:100%">
                    <option value="default" class="default">{{ trans('/master.msg_filter_required') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group col-sm-6">
            <label for="filter_startdate"
                class="control-label col-sm-4 justify-content-end">{{ trans("backoffice/apis/monitor.col_date_from") }}<span
                    class="color-red">*</span>:</label>
            <div class="col-sm-8">
                <div class="input-group date">
                    <input id="filter_startdate" type="text" class="form-control" data-date-format="yyyy-mm-dd"
                        placeholder="YYYY-MM-DD">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group col-sm-6">
            <label for="filter_enddate"
                class="col-sm-4 control-label justify-content-end">{{ trans("backoffice/apis/monitor.col_date_to") }}<span
                    class="color-red">*</span>:</label>
            <div class="col-sm-8">
                <div class="input-group date">
                    <input id="filter_enddate" type="text" class="form-control" data-date-format="yyyy-mm-dd"
                        placeholder="YYYY-MM-DD">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <!-- Button Previews -->
        <div class="text-center">
            <button type="button" class="btn btn-primary" id="btn_preview">{{ trans('/master.btn_display') }}</button>
        </div>
    </form>
</div>
<!-- End search -->

<!-- data table -->
<div class="table-responsive">
    <table id="tbl-checkmeta" class="display check-img-datatables" width="100%">
        <thead>
            <tr>
                <th>{{ trans('/master.col_order') }}</th>
                <th>{{ trans('/master.col_datetime')}}</th>
                <th>{{ trans('/master.col_description') }}</th>
                <th>{{ trans('/backoffice/tools/check_image.col_filename') }}</th>
                <th>{{ trans('/backoffice/tools/check_image.col_file') }}</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<!-- end data table -->

<!-- dialog box -->
<div class="modal fade" id="dlgDisplay" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="dlgDisplay-title" class="title-name"></h4>
            </div>
            <div class="modal-body">
                <img class="img-responsive" />
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- end dialog box -->

<script type="text/javascript">
IMAGE_URL = '{{$image_url}}';
</script>

@stop

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-datepicker') !!}

{!! $view->resource('js','js/backoffice/tools/check_image.js') !!}