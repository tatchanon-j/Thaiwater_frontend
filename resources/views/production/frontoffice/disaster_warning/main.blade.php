@extends('frontoffice/layout/home')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);
$image_url = env('API_SERVER') . '/thaiwater30/shared/image?_csrf=' . urlencode($csrf) . '&image=';
$default_radar = $view->buildResourceSrc('/resources/images/default_radar.jpg');
 
//$view->option('breadcrumb', $breadcrumb);
//$view->option('breadcrumb_footer', $breadcrumb);
$view->option('js-init', 'srvMain.init(group_Translator)');
//$view->option('page_name', trans('frontoffice/home/master.main-breadcrumb-report'));
$view->option('page_name', 'รายงานสถานะการณ์ภัยประจำวัน ศูนย์ข้อมูลสาธารณภัยกรมป้องกันและบรรเทาสาธารณภัย');
$view->option('title', 'รายงานสถานะการณ์ภัยประจำวัน ศูนย์ข้อมูลสาธารณภัยกรมป้องกันและบรรเทาสาธารณภัย');

$view->asset('DataTables', 'DataTables-buttons', 'parsley', 'bootstrap-multiselect', 'Font-Kanit', 'leaflet',
  'FontAwesome', 'Lightbox', 'JsonHelper', 'DataTables-fixedheader','bootstrap-datetimepicker');

$view->resource('js', 'js/frontoffice/home/thailandFunc.min.js');
$view->resource('js', 'js/frontoffice/home/jquery.maphilight.min.js');
$view->resource('js', 'js/frontoffice/home/overlib_mini.js');

 
$view->resource('js', 'js/jquery.Thailand.js/dependencies/JQL.min.js');
$view->resource('js', 'js/jquery.Thailand.js/dependencies/typeahead.bundle.js');
$view->resource('js', 'js/jquery.Thailand.js/dist/jquery.Thailand.min.js');
$view->resource('js', 'js/validator.min.js');
$view->resource('js', 'js/frontoffice/home/disaster.js');
$view->resource('css', 'js/jquery.Thailand.js/dist/jquery.Thailand.min.css');

 
?>

@section('extra_head')
@stop

@section('content-center')

<style type="text/css">
  .btn-primary-index{
      color: #fff!important;
      background: #063475;
      border-radius: 35px!important;
  }
  .info.date {
      background-color: #063575!important;
      font-size: 1.5em;
  }
  #imaginary_container{
      margin-top:20%; /* Don't copy this */
  }
  .stylish-input-group .input-group-addon{
      background: white !important; 
  }
  .stylish-input-group .form-control{
    border-right:0; 
    box-shadow:0 0 0; 
    border-color:#ccc;
  }
  .stylish-input-group button{
      border:0;
      background:transparent;
  }
  .disabled {
      pointer-events: none;
      cursor: default;
  }
  .search-block {
    padding: 8px 0px;
  }
</style>

<!-- box -->
<div class="box box-default" id="box-disaster">
    <div >
        <div class="col-md-1 col-sm-2 text-center">
            <img style="max-width:90%" src="http://www.disaster.go.th/images/main/logo.png" alt="">
        </div>
        <div class="col-md-11 col-sm-10">
            <h3><i class="fa fa-warning" aria-hidden="true"></i>
                รายงานสถานะการณ์ภัยประจำวัน <span class="small">ศูนย์ข้อมูลสาธารณภัยกรมป้องกันและบรรเทาสาธารณภัย</span>
            </h3>
            <div class="row">
                <div class="col-sm-11">
                    <nav class=" navbar-default">
                        <div class="">
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="#" id="btn-disaster-add"><i class="fa fa-plus"></i> เพิ่มสถานการณ์</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-user"></i>  {{ Request::getUser() }}</a></li>
                                    <li><a href="./disaster/logout"><i class="fa fa-sign-out"></i> ออกจากระบบ</a></li>
                                </ul>
                                <div class="search-block pull-right col-sm-5"> 
                                    <div class="input-group stylish-input-group">
                                        <input type="text" class="form-control" placeholder="ค้นหา..." id="disaster_input">
                                        <span class="input-group-addon">
                                            <button type="submit">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>  
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
 
 
    <div class="box-body">
        <div class="row">
            <div class="col-sm-11">
              <div class="table-responsive">
                  <table id="disaster_table" class="disaster-table display cell-border table-lowpad stripe">
                      <thead>
                          <tr class="bg-primary">
                              <th class="col-sm-1 text-left">รหัส</th>
                              <th class="col-sm-2 text-center">วันที่เกิดเหตุการณ์</th>
                              <th class="col-sm-1 text-center">ตำบล</th>
                              <th class="col-sm-1 text-center">อำเภอ</th>
                              <th class="col-sm-1 text-center">จังหวัด</th>
                              <th class="col-sm-4 text-center">ข้อความรายงานเหตุการณ์</th>
                              <th class="col-sm-2 text-center">วันที่โพส</th>
                              <th class="col-sm-1 text-center"><i class="fa fa-gear"></i></th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
    </div>
</div>

<!-- dialog box -->
<div class="modal fade" id="dlgAdd" role="dialog">
    <form id="disasterForm" class="disasterForm"  autocomplete="off" data-toggle="validator" role="form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="dlgDisplay-title" class="title-name">เพิ่มสถานการณ์</h4>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="h5">พื้นที่เกิดเหตุการณ์ <span class="text-red">*</span></label> 
                            <input name="search" class="form-control" type="text" placeholder="ลองกรอกอย่างใดอย่างหนึ่ง ตำบล, อำเภอ, จังหวัด หรือ รหัสไปรษณีย์">
                            <div id="output"></div>
                            <div style="display:none;">
                            <input type="hidden" id="disasterDistrict" name="disasterDistrict">
                            <input type="hidden" id="disasterAmphoe"  name="disasterAmphoe">
                            <input type="hidden" id="disasterProvince" name="disasterProvince">
                            <input type="hidden" id="disasterZipcode"  name="disasterZipcode">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-group date">
                            <label class="h5">วันที่เกิดเหตุการณ์ <span class="text-red">*</span></label>
                            <input id="disasterEventDatetime" name="disasterEventDatetime" type="text" class="form-control" data-date-format="YYYY-MM-DD HH:mm"  data-error="โปรเลือกวันที่เกิดเหตุการณ์..." placeholder="YYYY-MM-DD" data-date-end-date="0d"  required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="h5 control-label">ข้อความรายงานเหตุการณ์ <span class="text-red">*</span></label>
                            <textarea  class="form-control" id="disasterWarningDescription" name="disasterWarningDescription" rows="3" data-error="โปรดกรอกข้อความรายงานเหตุการณ์..." required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer">
                        <button type="cancel" data-dismiss="modal" class="btn btn-default">ยกเลิก</button>
                        <button type="submit" class="btn-disaster-submit btn btn-primary">บันทึก</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- end dialog box -->

<script>
IMAGE_URL = '{!! $image_url !!}';
DEFAULT_RADAR = '{!! $default_radar !!}';
TOKEN = '{{ csrf_token() }}';
var group_Translator = {
    'LANGUAGE' : '{{ $l->getLocale() }}',
    'short_province': '{{ trans("frontoffice/home/index.short_province") }}',
    'data_empty_table': '{{ trans("frontoffice/home/index.data_empty_table") }}',
    'dowload': '{{ trans("frontoffice/home/index.dowload") }}'
}
</script>
@stop
