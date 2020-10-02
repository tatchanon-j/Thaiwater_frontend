@section('extra_head')



@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

/* 
เกิดปัญหาเมื่อทำการเรียกใช้ จึงทำการปิดไว้

{!! $view->resource('js','js/multi-select/js/jquery.multi-select.js') !!}
{!! $view->resource('js','https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js') !!} */


$view->option('breadcrumb',
array(
  array(
    'href' => $l->httpUrl("backoffice/tools/mgmt_cache"),
    'text' => trans('backoffice/tools/mgmt_cache.main_menu_name')
  ),array(
    'text' => 'Ignore ชุดข้อมูลที่เกิดความผิดพลาด'
  ),
));
$view->option('js-init','srvData.init(group_Translator)');
$view->option('page_name', 'Ignore ชุดข้อมูลที่เกิดความผิดพลาด');
?>

{!! $view->resource('theme-css','css/backoffice/tools/ignore_data.css') !!}

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','bootstrap-select', 'bootstrap-datepicker','bootstrap-datetimepicker','JsonHelper','select2') !!}
{!! $view->resource('js','js/backoffice/tools/ignore_data.js') !!}

{!! $view->resource('js','https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js') !!}
{!! $view->resource('css','https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css') !!}
@stop

@section('content')

<!-- <link rel="stylesheet" href="css/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css"> -->

<!-- <script type="text/javascript" src="js/bootstrap-multiselect/bootstrap-multiselect.js"></script> -->

<div class="data-filters">
    <form class="form-row" id="form_filter">
        <div class="col-sm-12 row justify-content-center">
            <div class="col-sm-6">
                <div class="form-group row justify-content-center">
                    <label for="filter_datattype" class="col-sm-3 col-form-label text-sm-right"><span
                            class="color-red">*</span>{{ trans('/backoffice/tools/ignore_data.filter_datatype') }}:</label>
                    <div class="col-sm-6">
                        <select name="datasource" id="filter_datattype" class="form-control selectpicker" data-key="filter_agency"
                            style="width:100%">
                            <option value="">{{ trans('/master.msg_filter_required') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group row justify-content-center">
                    <label for="filter_station" class="col-sm-3 col-form-label text-sm-right"><span
                            class="color-red">*</span>สถานี:</label>
                    <div class="col-sm-6">
                        <select name="datasource" id="filter_station" class="form-control" data-key="filter_agency"
                            style="width:100%">
                            <option value="">แสดงทั้งหมด</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group row justify-content-center">

                    <label for="filter_datestart" class="col-sm-3 col-form-label text-sm-right"><span
                            class="color-red">*</span>วันที่:</label>

                    <div class="col-sm-6">
                        <div class="input-group date">
                            <input id="filter_datestart" type="text" class="form-control"
                                data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-6">
                <div class="form-group row justify-content-center">

                    <label for="filter_dateend" class="col-sm-3 col-form-label text-sm-right"><span
                            class="color-red">*</span>ถึงวันที่:</label>

                            <div class="col-sm-6">
                        <div class="input-group date">
                            <input id="filter_dateend" type="text" class="form-control"
                                data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 text-center ignore-search-botton">
            <button id="btn-setting-ignore" type="button" class="btn btn-default" data-toggle="modal"
                data-target="#dlgIgnore">{{ trans('/backoffice/tools/ignore_data.btn_ignore') }}</button>
            <button type="button" class="btn btn-primary" id="btn-display">{{ trans('master.btn_history') }}</button>
        </div>


    </form>
    <div class="clearfix"></div>
</div>

<div class="ignore-history">
    <div class="table-responsive">
        <table id="tbl-history-ignore" class="display history-datatables" width="100%">
            <thead>
                <tr>
                    <th>{{ trans('/master.col_order') }}</th>
                    <th>{{ trans('/backoffice/tools/ignore_data.ignore_date_column') }}</th>
                    <th>{{ trans('/backoffice/tools/ignore_data.user_ignore_column') }}</th>
                    <th>{{ trans('/backoffice/tools/ignore_data.old_station_id_column') }}</th>
                    <th>{{ trans('/backoffice/tools/ignore_data.station_name_column') }}</th>
                    <th>{{ trans('/backoffice/tools/ignore_data.province_column') }}</th>
                    <th>{{ trans('/backoffice/tools/ignore_data.agency_column') }}</th>
                    <th>{{ trans('/backoffice/tools/ignore_data.data_date_column') }}</th>
                    <th>{{ trans('/backoffice/tools/ignore_data.data_value_column') }}</th>
                    <th>{{ trans('/backoffice/tools/ignore_data.remark_column') }}</th>
                </tr>
            </thead>
            <tfoot>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="ignore-setting" style="display:none">
    <!-- <div class="data-filters">
    <form class="form-horizontal" id="dlgIgnore-form">
      <input id="table_name" type="text" hidden/>
      <div class="form-group col-sm-12">
        <label for="dlgIgnore-filter-type" class="col-sm-2 control-label">{{ trans('/backoffice/tools/ignore_data.label_datatype') }} :</label>
        <div class="col-sm-6">
          <select name="datasource" id="dlgIgnore-filter-type" class="form-control" data-key="dlgIgnore-filter-type">
            <option value="">{{ trans('/master.msg_filter_required') }}</option>
          </select>
        </div>
        <button id="dlg-btn-display" type="button" class="btn btn-primary">{{ trans('/master.btn_display') }}</button>
      </div>
    </form>
    <div class="clearfix"></div>
  </div> -->
    <ul class="nav nav-tabs">
        <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#ignore">สถานีไม่ถูก Ignore</a></li>
        <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#unignore">สถานีถูก Ignore</a></li>
    </ul>

    <div class="tab-content">
        <div id="ignore" class="tab-pane fade show active">
            <h5></h5>
            <!--<h5>{{ trans('/backoffice/tools/ignore_data.list_noignore') }}</h5>-->
            <div class="table-responsives">
                <table id="dlgIgnore-tbl-ignore" class="display ignore-datatables  nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>{{ trans('/backoffice/tools/ignore_data.old_station_id_column') }}</th>
                            <th>{{ trans('/backoffice/tools/ignore_data.station_name_column') }}</th>
                            <th>{{ trans('/backoffice/tools/ignore_data.province_column') }}</th>
                            <th>{{ trans('/backoffice/tools/ignore_data.agency_column') }}</th>
                            <th>{{ trans('/backoffice/tools/ignore_data.value_column') }}</th>
                            <th>{{ trans('/backoffice/tools/ignore_data.date_column') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="unignore" class="tab-pane fade">
            <h5></h5>
            <!--<h5>{{ trans('/backoffice/tools/ignore_data.list_ignored') }}</h5>-->
            <div class="">
                <table id="dlgIgnore-tbl-unignore" class="display unignore-datatables nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>{{ trans('/backoffice/tools/ignore_data.old_station_id_column') }}</th>
                            <th>{{ trans('/backoffice/tools/ignore_data.station_name_column') }}</th>
                            <th>{{ trans('/backoffice/tools/ignore_data.agency_column') }}</th>
                            <th>{{ trans('/backoffice/tools/ignore_data.value_column') }}</th>
                            <th></th>
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
    <div class="text-center">
        <!-- <button id="dlgIgnore-btn-save" type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('/master.btn_save') }}</button> -->
        <button id="btn-cancel" type="button" class="btn btn-default">{{ trans('/master.btn_cancel') }}</button>
    </div>
    <div class="clearfix"></div>
</div>

<!-- dialog box -->
<div class="modal fade" id="dlgDisplay" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="dlgDisplay-title" class="title-name modal-title"></h4>
            </div>
            <div class="modal-body">
                <!--- rainfall detial table --->
                <div class="ignore-rainfall-detail">
                    <div class="table-responsive">
                        <table id="dlgIgnore-tbl-ignore-rainfall-detail" class="display ignore-datatables  nowrap"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>rainfall10m</th>
                                    <th>rainfall15m</th>
                                    <th>rainfall1h</th>
                                    <th>rainfall3h</th>
                                    <th>rainfall6</th>
                                    <th>rainfall24h</th>
                                    <th>rainfall_date</th>
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
            </div>
        </div>
    </div>
</div>
<!-- end dialog box -->

<div class="modal fade" id="ignoremodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ignore</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="ignoremodal-form">

                    <div class="form-group row">
                        <label class="control-label col-sm-3 text-right">ignore : </label>
                        <div class="col-sm-9">
                            <input id="ig_station" class="form-control" type="text" readonly value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3 text-right"><span style="color:red">*</span>รายการ</label>
                        <div class="col-sm-6 w-100">
                        <select name="ig_purpose" id="filter_ig_purpose" class="form-control" data-key="ig_purpose" multiple="multiple">
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 text-right"><span
                                style="color:red">*</span>หมายเหตุ</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="ig_remark" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3 text-right"><span
                                style="color:red">*</span>วันที่เริ่มต้น</label>
                        <div class="col-sm-6">
                        <div class="input-group date">
                            <input id="filter_ignore_datestart" type="text" class="form-control"
                                data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-ignore btn-primary" id="ignore-btn" >Ignore</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unignoremodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Unignore</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form">

                    <div class="form-group row">
                        <label class="control-label col-sm-3 text-right">ignore : </label>
                        <div class="col-sm-9">
                            <input id="unig_station" class="form-control" type="text" readonly />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3 text-right">รายการที่ถูก ignore : </label>
                        <div class="col-sm-9"><select id="filter_unig_purpose" multiple="multiple" class="form-control"
                                readonly>
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3 text-right">หมายเหตุ : </label>
                        <div class="col-sm-9">
                        <textarea class="form-control" id="unig_remark" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3 text-right">วันที่เริ่ม : </label>
                        <div class="col-sm-6">
                        <div class="input-group date">
                            <input id="filter_unignore_datestart" type="text" class="form-control"
                                data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="control-label col-sm-3 text-right"><span style="color:red">*</span>วันที่สิ้นสุด :
                        </label>
                        <div class="col-sm-6">
                        <div class="input-group date">
                            <input id="filter_unignore_dateend" type="text" class="form-control"
                                data-date-format="YYYY-MM-DD HH:mm" placeholder="YYYY-MM-DD HH:mm">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-unignore btn-primary" id="unignore-btn">Unignore</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>

@stop
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect') !!}