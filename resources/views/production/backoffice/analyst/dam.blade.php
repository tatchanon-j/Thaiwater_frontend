{{-- @author Peerapong Srisom <peerapong@haii.or.th>  --}}

@section('extra_head')
@extends('backoffice/layout/master')
<?php

// http://localhost/project/thaiwater/haii.or.th/fronend-thaiwater30/public/backoffice/analyst/dam

// api document
// http://web.thaiwater.net/thaiwater30/api-docs/webservice#/thaiwater30/analyst/get_thaiwater30_analyst_dam

// dam first load with condition
// http://api2.thaiwater.net:9200/api/v1/thaiwater30/analyst/dam_load
//  medium dam
// http://api2.thaiwater.net:9200/api/v1/thaiwater30/analyst/dam?dam_date=2017-10-05&dam_size=2
// large dam
// http: //api2.thaiwater.net:9200/api/v1/thaiwater30/analyst/dam?date=2017-10-05&basin=&dam_size=1

$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();
$pageName = 'เขื่อน';

$view->option('main-menu-mode', 'analyst');
$view->option(
	'breadcrumb',
	array(
		array(
			'href' => $l->httpUrl("backoffice/analyst/"),
			'text' => trans('backoffice/analyst/analyst.page_name'),
		),
		array(
			'text' => $pageName,
		),
	)
);

$view->option('page_name', $pageName);

// เรียกใช้ function init จาก ไฟล์ js
$view->option('js-init', 'dam.init(group_Translator)');
?>
@stop

{!! $view->asset('DataTables','parsley','bootstrap-datepicker','JsonHelper','moment','leaflet','highcharts','bootstrap-multiselect') !!}
{!! $view->resource('js','js/frontoffice/home/thailandFunc.min.js') !!}
{!! $view->resource('js','js/frontoffice/home/jquery.maphilight.min.js') !!}
{!! $view->resource('js','js/frontoffice/home/overlib_mini.js')  !!}
{!! $view->resource('js','js/json_query.js')  !!}
{!! $view->resource('js','js/backoffice/analyst/dam.js') !!}
{!! $view->resource('theme-css','css/backoffice/analyst/dam.css') !!}

@section('content')

<!-- modal -->
@include('frontoffice/home/modal.storm')
<!-- modal-dam -->
<div class="bootbox modal fade" id="modal-dam" tabindex="-1" role="document" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <iframe width="100%" height="650" scrolling="no" frameBorder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- search -->
<div class="data-filters">
  <form class="form-inline">

    <!-- filter -->
    <div class="col-sm-4 form-group group">
      <label for="filter_dam_size" class="col-sm-3 control-label justify-content-end">ขนาดเขื่อน</label>
      <div class="col-sm-9">
        <select class="form-control" id="filter_dam_size" name="filter_dam_size" data-key="dam_size" style="width:100%">
        </select>
      </div>
    </div>
    <div class="col-sm-4 form-group">
      <label for="filter_basin" class="col-sm-3 control-label justify-content-end">ลุ่มน้ำ</label>
      <div class="col-sm-9">
        <select class="form-control" id="filter_basin" name="filter_basin" data-key="basin" style="width:100%">
        </select>
      </div>
    </div>

    <input id="date" type="text" class="form-control" data-date-format="yyyy-mm-dd" style="display:none"/>
    <div class="form-group col-sm-4">
      <label for="filter_date" class="control-label col-sm-3 justify-content-end">{{ trans("backoffice/apis/monitor.col_date_from") }}:</label>
      <div class="col-sm-9">
        <div class="input-group date">
          <input id="filter_date" type="text" class="form-control" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" data-date-end-date="0d">
		  <div class="input-group-append">
                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
        </div>
      </div>
    </div>

	<br>
	<br>
	<br>	

    <!-- btn_display -->
    <div class="col-sm-12 form-group justify-content-center">
      <div class="text-center">
        <button type="button" class="btn bg-btn" id="btn_display">{{ trans('/master.btn_display') }}</button>
      </div>
    </div>
  </form>
  <div class="clearfix"></div>
</div>
<!-- search -->

<div class="row">
		<div class="col-sm-5">
				<div id="dam_map">
				</div>
				<div class="">
						<table class="pull-right small" id="dam_table_scale">
								<tbody></tbody>
						</table>
						<br/>
						<!--<small class="pull-right">( {{trans('frontoffice/home/index.waterlevel_store')}} )</small>    ระดับน้ำเก็บกัก-->
				</div>
		</div>
		<div class="col-sm-7">
				<!-- Dam Load -->
				<div class="content-load">
					<!-- tab -->
					<div class="panel-group" id="accordion">
						<ul class="nav nav-tabs" >
							<li class="nav-item" ><a class="nav-link active" data-toggle="tab" href="#tab_rid_load" aria-expanded="true">เขื่อนกรมชลประทาน</a></li>
							<li class="nav-item" ><a class="nav-link" data-toggle="tab" href="#tab_egat_load" aria-expanded="true">เขื่อนการไฟฟ้าฝ่ายผลิต </a></li>
						</ul>
						<div class="tab-content space-bottom">
							<div id="tab_rid_load" class="tab-pane fade show active">
								<div class="table-responsive">
									<table id="rid_load" class="dam-table display table-lowpad dataTable no-footer" role="grid">
											<thead>
											<tr class="" role="row" style="background-color: #337ab7;">
													<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="" style="width: 162px; " ></th>
													<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="หน่วยงาน" style="width: 162px;" >หน่วยงาน
													</th>
													<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="เขื่อน" style="width: 162px;" aria-sort="ascending">เขื่อน
													</th>
													<th class="sorting" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="น้ำไหลลงอ่าง(ล้าน ลบม./วัน)" style="width: 159px;">น้ำไหลลงอ่าง<br>(ล้าน ลบม./วัน)
													</th>
													<th class="sorting" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="ปริมาตรน้ำในอ่างฯ(%เทียบกับรนก.)" style="width: 172px;">ปริมาตรน้ำในอ่างฯ<br>(%เทียบกับรนก.)
													</th>
													<th class="sorting" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="ใช้การได้จริง(%เทียบกับรนก.)" style="width: 161px;">ใช้การได้จริง<br>(%เทียบกับรนก.)
													</th>
													<th class="sorting" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="น้ำระบาย(ล้าน ลบม./วัน)" style="width: 145px;">น้ำระบาย<br>(ล้าน ลบม./วัน)
													</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div> <!-- end table responsive -->
							</div>
							<div id="tab_egat_load" class="tab-pane fade">
								<div class="table-responsive">
									<table id="egat_load" class="dam-table display table-lowpad dataTable no-footer" role="grid">
										<thead>
										<tr class="" role="row" style="background-color: #337ab7;">
												<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="" style="width: 162px; " ></th>
												<th class="sorting_asc" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="หน่วยงาน" style="width: 162px ;;" aria-sort="ascending">หน่วยงาน
												</th>
												<th class="sorting_asc" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="เขื่อน" style="width: 162px; " aria-sort="ascending">เขื่อน
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="น้ำไหลลงอ่าง(ล้าน ลบม./วัน)" style="width: 159px; ">น้ำไหลลงอ่าง<br>(ล้าน ลบม./วัน)
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="ปริมาตรน้ำในอ่างฯ(%เทียบกับรนก.)" style="width: 172px; ">ปริมาตรน้ำในอ่างฯ<br>(%เทียบกับรนก.)
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="ใช้การได้จริง(%เทียบกับรนก.)" style="width: 161px; ">ใช้การได้จริง<br>(%เทียบกับรนก.)
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="น้ำระบาย(ล้าน ลบม./วัน)" style="width: 145px; ">น้ำระบาย<br>(ล้าน ลบม./วัน)
												</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div> <!-- end table responsive -->
						</div>
						</div> <!-- end tab -->
					</div> <!-- end tab pannel -->
				</div>
				<!-- End Dam Load -->

				<!-- Dam Large -->
				<div class="content-large" style="display: none">
					<!-- tab -->
					<div class="panel-group" id="accordion">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab_rid_daily" aria-expanded="true">กรมชลประทาน</a></li>
							<li class=""><a data-toggle="tab" href="#tab_egat_daily" aria-expanded="false">การไฟฟ้าฝ่ายผลิต </a></li>
							<li class=""><a data-toggle="tab" href="#tab_egat_hourly" aria-expanded="false">การไฟฟ้าฝ่ายผลิต (รายชั่วโมง)</a></li>
						</ul>
						<div class="tab-content space-bottom">
							<div id="tab_rid_daily" class="tab-pane fade active in">
								<div class="table-responsive">
									<table id="rid_daily" class="dam-table display table-lowpad dataTable no-footer" role="grid">
											<thead>
											<tr class="bg-table" role="row" >
													<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="" style="width: 162px;" ></th>
													<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="หน่วยงาน" style="width: 162px;" >หน่วยงาน
													</th>
													<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="เขื่อน" style="width: 162px;" aria-sort="ascending">เขื่อน
													</th>
													<th class="sorting" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="น้ำไหลลงอ่าง(ล้าน ลบม./วัน)" style="width: 159px;">น้ำไหลลงอ่าง<br>(ล้าน ลบม./วัน)
													</th>
													<th class="sorting" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="ปริมาตรน้ำในอ่างฯ(%เทียบกับรนก.)" style="width: 172px;">ปริมาตรน้ำในอ่างฯ<br>(%เทียบกับรนก.)
													</th>
													<th class="sorting" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="ใช้การได้จริง(%เทียบกับรนก.)" style="width: 161px;">ใช้การได้จริง<br>(%เทียบกับรนก.)
													</th>
													<th class="sorting" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="น้ำระบาย(ล้าน ลบม./วัน)" style="width: 145px;">น้ำระบาย<br>(ล้าน ลบม./วัน)
													</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div> <!-- end table responsive -->
							</div>
							<div id="tab_egat_daily" class="tab-pane fade">
								<div class="table-responsive">
									<table id="egat_daily" class="dam-table display table-lowpad dataTable no-footer" role="grid">
										<thead>
										<tr class="bg-table" role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="" style="width: 162px;" ></th>
												<th class="sorting_asc" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="หน่วยงาน" style="width: 162px;" aria-sort="ascending">หน่วยงาน
												</th>
												<th class="sorting_asc" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="เขื่อน" style="width: 162px;" aria-sort="ascending">เขื่อน
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="น้ำไหลลงอ่าง(ล้าน ลบม./วัน)" style="width: 159px;">น้ำไหลลงอ่าง<br>(ล้าน ลบม./วัน)
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="ปริมาตรน้ำในอ่างฯ(%เทียบกับรนก.)" style="width: 172px;">ปริมาตรน้ำในอ่างฯ<br>(%เทียบกับรนก.)
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="ใช้การได้จริง(%เทียบกับรนก.)" style="width: 161px;">ใช้การได้จริง<br>(%เทียบกับรนก.)
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_daily" rowspan="1" colspan="1" aria-label="น้ำระบาย(ล้าน ลบม./วัน)" style="width: 145px;">น้ำระบาย<br>(ล้าน ลบม./วัน)
												</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div> <!-- end table responsive -->
						</div>
						<div id="tab_egat_hourly" class="tab-pane fade">
							<div class="table-responsive">
								<table id="egat_hourly" class="dam-table display table-lowpad dataTable no-footer" role="grid">
										<thead>
										<tr class="bg-table " role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="" style="width: 162px;" ></th>
												<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="" style="width: 162px;" ></th>
												<th class="sorting_asc" tabindex="0" aria-controls="egat_hourly" rowspan="1" colspan="1" aria-label="เขื่อน" style="width: 162px;" aria-sort="ascending">เขื่อน
												</th>
												<th class="sorting_asc" tabindex="0" aria-controls="egat_hourly" rowspan="1" colspan="1" style="width: 162px;" aria-sort="ascending">เวลา
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_hourly" rowspan="1" colspan="1" aria-label="น้ำไหลลงอ่าง(ล้าน ลบม./วัน)" style="width: 159px;">น้ำไหลลงอ่าง<br>(ล้าน ลบม./วัน)
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_hourly" rowspan="1" colspan="1" aria-label="ปริมาตรน้ำในอ่างฯ(%เทียบกับรนก.)" style="width: 172px;">ปริมาตรน้ำในอ่างฯ<br>(%เทียบกับรนก.)
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_hourly" rowspan="1" colspan="1" aria-label="ใช้การได้จริง(%เทียบกับรนก.)" style="width: 161px;">ใช้การได้จริง<br>(%เทียบกับรนก.)
												</th>
												<th class="sorting" tabindex="0" aria-controls="egat_hourly" rowspan="1" colspan="1" aria-label="น้ำระบาย(ล้าน ลบม./วัน)" style="width: 145px;">น้ำระบาย<br>(ล้าน ลบม./วัน)
												</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div> <!-- end table responsive -->
						</div>
						</div> <!-- end tab -->
					</div> <!-- end tab pannel -->
				</div>
				<!-- End Dam Large -->

				<!-- Dam Medium -->
				<div class="content-medium" style="display: none">
					<div class="table-responsive">
						<table id="rid_medium_dam" class="dam-table display table-lowpad dataTable no-footer" role="grid">
						<thead>
							<tr class="bg-table " role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="" style="width: 162px;" ></th>
									<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="" style="width: 162px;" ></th>
									<th class="sorting_asc" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="เขื่อน" style="width: 162px;" aria-sort="ascending">เขื่อน
									</th>
									<th class="sorting" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="อำเภอ" style="width: 159px;">อำเภอ</th>
									<th class="sorting" tabindex="0" aria-controls="rid_daily" rowspan="1" colspan="1" aria-label="จังหวัด" style="width: 172px;">จังหวัด</th>
									<th class="sorting" tabindex="0" aria-controls="rid_medium_dam" rowspan="1" colspan="1" aria-label="น้ำไหลลงอ่าง(ล้าน ลบม./วัน)" style="width: 159px;">น้ำไหลลงอ่าง<br>(ล้าน ลบม./วัน)
									</th>
									<th class="sorting" tabindex="0" aria-controls="rid_medium_dam" rowspan="1" colspan="1" aria-label="ปริมาตรน้ำในอ่างฯ(%เทียบกับรนก.)" style="width: 172px;">ปริมาตรน้ำในอ่างฯ<br>(%เทียบกับรนก.)
									</th>
									<th class="sorting" tabindex="0" aria-controls="rid_medium_dam" rowspan="1" colspan="1" aria-label="ใช้การได้จริง" style="width: 161px;">ใช้การได้จริง<br>(%เทียบกับรนก.)
									</th>
									<th class="sorting" tabindex="0" aria-controls="rid_medium_dam" rowspan="1" colspan="1" aria-label="น้ำระบาย(ล้าน ลบม./วัน)" style="width: 145px;">น้ำระบาย<br>(ล้าน ลบม./วัน)
									</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
					</div> <!-- end table responsive -->
				</div>
				<!-- End Dam Medium -->

				<!-- Dam All -->
				<div class="content-all" style="display: none">
					<div class="table-responsive">
						<table id="all_dam" class="dam-table display table-lowpad dataTable no-footer" role="grid">
						<thead>
							<tr class="bg-table " role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="all_dam" rowspan="1" colspan="1" aria-label="เขื่อน" style="width: 162px;" aria-sort="ascending">เขื่อน</th>
									<th class="sorting" tabindex="0" aria-controls="all_dam" rowspan="1" colspan="1" aria-label="อำเภอ" style="width: 159px;">อำเภอ</th>
									<th class="sorting" tabindex="0" aria-controls="all_dam" rowspan="1" colspan="1" aria-label="จังหวัด" style="width: 172px;">จังหวัด</th>
									<th class="sorting" tabindex="0" aria-controls="all_dam" rowspan="1" colspan="1" aria-label="ลุ่มน้ำ" style="width: 161px;">ลุ่มน้ำ</th>
									<th class="sorting" tabindex="0" aria-controls="all_dam" rowspan="1" colspan="1" aria-label="ความจุอ่างฯ(ล้าน ลบม./วัน)" style="width: 145px;">ความจุอ่างฯ<br>(ล้าน ลบม./วัน)
									</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
					</div> <!-- end table responsive -->
				</div>
				<!-- End Dam All -->

		</div>
</div>
<div class="dam_gharp_compare">
	<div class="card panel-default" >
    <div class="card-header box-title">เขื่อนภูมิพล</div>
    <div class="card-body">
			<div class="row">
					<div class="col-sm-4">
							<div id="dam_bhumibol_storage" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
					<div class="col-sm-4">
							<div id="dam_bhumibol_inflow" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
					<div class="col-sm-4">
							<div id="dam_bhumibol_released" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
			</div>
    </div>
  </div>
	<div class="card panel-default" id="space-bottom">
    <div class="card-header box-title">เขื่อนสิริกิติ์</div>
    <div class="card-body">
			<div class="row">
					<div class="col-sm-4">
							<div id="dam_sirikit_storage" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
					<div class="col-sm-4">
							<div id="dam_sirikit_inflow" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
					<div class="col-sm-4">
							<div id="dam_sirikit_released" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
			</div>
    </div>
  </div>
	<div class="card panel-default" id="space-bottom">
    <div class="card-header box-title">เขื่อนป่าสักชลสิทธิ์</div>
    <div class="card-body">
			<div class="row">
				<div class="col-sm-4">
						<div id="dam_pasak_storage" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				</div>
				<div class="col-sm-4">
						<div id="dam_pasak_inflow" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				</div>
				<div class="col-sm-4">
						<div id="dam_pasak_released" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				</div>
			</div>
    </div>
  </div>
	<div class="card panel-default" id="space-bottom">
    <div class="card-header box-title">เขื่อนแควน้อย</div>
    <div class="card-body">
			<div class="row">
					<div class="col-sm-4">
							<div id="dam_kwaihoi_storage" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
					<div class="col-sm-4">
							<div id="dam_kwaihoi_inflow" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
					<div class="col-sm-4">
							<div id="dam_kwaihoi_released" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
			</div>
		</div>
    </div>
  </div>

<script>
var group_Translator = {
    'LANGUAGE' : '{{ $l->getLocale() }}',
    'msg_err_require_filter': '{{ trans("master.msg_err_require_filter") }}',
		'dam': '{{ trans("backoffice/analyst/analyst.dam") }}',
		'dam_inflow': '{{ trans("backoffice/analyst/analyst.dam_inflow") }}',
		'dam_storage': '{{ trans("backoffice/analyst/analyst.dam_storage") }}',
		'dam_released': '{{ trans("backoffice/analyst/analyst.dam_released") }}',
		'dam_uses_water': '{{ trans("backoffice/analyst/analyst.dam_uses_water") }}',
		'dam_low_text': '{{ trans("backoffice/analyst/analyst.dam_low_text") }}',
		'dam_high_text': '{{ trans("backoffice/analyst/analyst.dam_high_text") }}',
		'dam_scale_text': '{{ trans("backoffice/analyst/analyst.dam_scale_text") }}',
		'waterlevel_store': '{{ trans("backoffice/analyst/analyst.waterlevel_store") }}',
		'loca': '{{ trans("frontoffice/home/index.loca") }}',
		'short_province': ' {{ trans("frontoffice/home/index.short_province") }}',
		'short_amphoe': ' {{ trans("frontoffice/home/index.short_amphoe") }}',
		'short_tumbon': ' {{ trans("frontoffice/home/index.short_tumbon") }}',
		'lower_bound': ' {{ trans("frontoffice/iframe/dam.lower_bound") }}',
		'upper_bound': ' {{ trans("frontoffice/iframe/dam.upper_bound") }}',
}

</script>

<style>
	#space-bottom{
		margin-top:15px;
	}
	.bg-table{
		background-color: #337ab7;
	}
	.bg-btn{
		background-color: #1880bd;
		color:#ffff;
	}
	.bg-btn:hover{
		color:#ffff;
	}
	.space-bottom{
		margin-bottom:10px;
	}
	#filter_date{
		height:100%
	}
	#filter_basin{
		height:100%
	}
</style>

@stop
