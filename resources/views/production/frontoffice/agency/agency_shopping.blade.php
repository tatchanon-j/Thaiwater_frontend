@extends('frontoffice/layout/agency')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);
$image_url = env('API_SERVER') . '/thaiwater30/shared/image?_csrf=' . urlencode($csrf) . '&image=';

$view->option('js-init', 'sp.init()');
$view->option('page_name', trans("frontoffice/agency/shopping.page_name"));
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','leaflet') !!}
{!! $view->resource('js','js/frontoffice/agency/shopping.js') !!}
{!! $view->resource('theme-css','css/frontoffice/agency/agency.css') !!}

@stop

@section('content')

<div class="bootbox modal fade" id="modal" tabindex="-1" role="document">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="modal-table" class="table-responsive"></div>
                    </div>
                    <div id="modal-img" class="col-sm-12"></div>
                    <div id="modal-weather" class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div id="modal-weather-map"></div>
                            </div>
                            <div class="col-sm-6">
                                <div id="modal-weather-table" class="table-responsive"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bootbox modal fade" id="modal-agency" tabindex="-1" role="document">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-agency-header"></h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="modal-agency-table" class="table-responsive">
                            <table class="table table-bordered display">
                                <thead>
                                    <tr>
                                        <th>{{ trans("master.col_order") }}</th>
                                        <th>{{ trans("frontoffice/agency/shopping.col_id") }}</th>
                                        <th>{{ trans("frontoffice/agency/shopping.col_user_name") }}</th>
                                        <th>{{ trans("frontoffice/agency/shopping.col_metadata_name") }}</th>
                                        <th>{{ trans("frontoffice/agency/shopping.col_service") }}</th>
                                        <th>{{ trans("frontoffice/agency/shopping.col_create") }}</th>
                                        <th>{{ trans("frontoffice/agency/shopping.col_result_date") }}</th>
                                        <th>{{ trans("frontoffice/agency/shopping.col_result") }}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="mat" id="accordion" role="tablist" aria-multiselectable="true">
</div>


<script type="text/javascript">
LANG = '{{ $l->getLocale() }}';
IMAGE_URL = '{!! $image_url !!}';
TRANSLATOR = {
    metadata : '{{ trans("frontoffice/agency/shopping.metadata") }}',
    metadata_status_connect : '{{ trans("frontoffice/agency/shopping.metadata_status_connect") }}',
    metadata_status_wait_update : '{{ trans("frontoffice/agency/shopping.metadata_status_wait_update") }}',
    metadata_status_wait_connect : '{{ trans("frontoffice/agency/shopping.metadata_status_wait_connect") }}',
    dataservice : '{{ trans("frontoffice/agency/shopping.dataservice") }}',

    col_order : '{{ trans("master.col_order") }}',
    col_name : '{{ trans("frontoffice/agency/shopping.col_name") }}',
    col_frequency : '{{ trans("frontoffice/agency/shopping.col_frequency") }}',
    col_agency_name : '{{ trans("frontoffice/agency/shopping.col_agency_name") }}',
    col_agency_count : '{{ trans("frontoffice/agency/shopping.col_agency_count") }}',
    tr_metadata_status_connect : '{{ trans("frontoffice/agency/shopping.tr_metadata_status_connect") }}',
    tr_metadata_status_wait_update : '{{ trans("frontoffice/agency/shopping.tr_metadata_status_wait_update") }}',
    tr_metadata_status_wait_connect : '{{ trans("frontoffice/agency/shopping.tr_metadata_status_wait_connect") }}',
    tr_metadata_status_cancel : '{{ trans("frontoffice/agency/shopping.tr_metadata_status_cancel") }}',
    tr_metadata_dataservice : '{{ trans("frontoffice/agency/shopping.tr_metadata_dataservice") }}',

    result_AP: '{{ trans("frontoffice/agency/shopping.result_AP") }}',
    result_DA: '{{ trans("frontoffice/agency/shopping.result_DA") }}',

    month_01 : '{{ trans("month.short_01") }}' ,
    month_02 : '{{ trans("month.short_02") }}' ,
    month_03 : '{{ trans("month.short_03") }}' ,
    month_04 : '{{ trans("month.short_04") }}' ,
    month_05 : '{{ trans("month.short_05") }}' ,
    month_06 : '{{ trans("month.short_06") }}' ,
    month_07 : '{{ trans("month.short_07") }}' ,
    month_08 : '{{ trans("month.short_08") }}' ,
    month_09 : '{{ trans("month.short_09") }}' ,
    month_10 : '{{ trans("month.short_10") }}' ,
    month_11 : '{{ trans("month.short_11") }}' ,
    month_12 : '{{ trans("month.short_12") }}' ,
};
TRANS_tbConfig = {!! json_encode(trans("frontoffice/agency/shopping.tbConfig")) !!};
</script>

@stop
