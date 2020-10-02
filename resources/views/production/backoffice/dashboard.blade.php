@extends('backoffice/layout/master')
<?php
$api = \App\Helpers\ApiServiceHelper::getInstance ();
$view = \App\Helpers\ViewHelper::getInstance ();
$l = \App\Helpers\LocaleHelper::getInstance ();

$breadcrumb = $view->option ( 'breadcrumb' );
if (! is_array ( $breadcrumb )) {
	$breadcrumb = array ();
}
$csrf = \Request::cookie ( \App\Helpers\ApiServiceHelper::CSRF_COOKIE );

$page_name = $view->option ( 'page_name' );
if (($title = $view->option ( 'title' )) == '') {
	$title = trans ( 'site.title' );

	if ($page_name != '') {
		$title = $page_name . ' - ' . $title;
	}
}
$view->asset ( 'highcharts' );
$view->option ( 'js-init', 'dash.init(group_Translator)' );

$view->resource ( 'theme-css', 'css/backoffice/dashboard.css' );
$view->resource ( 'js', 'js/backoffice/dashboard.js' );
$view->resource ( 'js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js' );
?>
@section('content-box')
<!-- conten dash board -->

<!-- start pie graph -->
<div class="row">
    <!-- pie graph -->
    <div class="col-md-8 col-sm-8">
        <div class="box box-meta-static">
            <div class="box-header with-border">
                <h3 class="box-title">ข้อมูลล่าสุดฝนและระดับน้ำ</h3>
                <div class="box-tools pull-right">
                    <div class="row mr-1">
                        <div class="btn-group">
                            <div class="col-sm-12">
                                <select id="filter_agency" class="form-control" name="agency" data-key="agency">
                                    <option value="">{{trans("master.msg_display_all")}}</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul id="online" class="products-list product-list-in-box"
                            style="height: 450px; overflow-y: auto;">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Service -->
    <div class="col-md-4 col-sm-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{
					trans('/backoffice/dashboard.title_box_dataservice') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding: 0">
                <ul class="nav nav-stacked">
                    <li><a href="{{ $l->httpUrl('backoffice/data_service/data_service_to_agency') }}">{{
							trans('/backoffice/dashboard.dataservice_no_result') }}<span class="pull-right badge bg-yellow"
                                id="ds-nr"></span>
                        </a></li>
                </ul>
            </div>
            <div class="box-footer text-center">
                <a href="{{ $l->httpUrl('backoffice/data_service/data_service_summary') }}">{{
					trans('/backoffice/dashboard.dataservice_summary') }}</a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- Ignore -->
        <div class="box box-primary col-sm-12">
            <div class="box-header with-border">
                <h3 class="box-title">จำนวนสถานีที่ถูก Ignore</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body row mx-auto" type="button" style="padding: 0">
                <div class="col-sm-6 text-center">
                    <h3 id="water-ignore"></h3>
                    <p>น้ำ</p>
                </div>
                <div class="col-sm-6 text-center">
                    <h3 id="rain-ignore"></h3>
                    <p>ฝน</p>
                </div>
            </div>
            <div class="box-footer text-center">
                <a href="{{ $l->httpUrl('backoffice/tools/ignore_data') }}">Ignore</a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- user -->
        <a href="{{ $l->httpUrl('backoffice/admin/group') }}">
            <div id="user" type="button" class="small-box bg-orange h-25">
                <div class="inner">
                    <h3 id="count-user">-</h3>
                    <p>จำนวนผู้ใช้ที่ยังค้างอยู่ในระบบลงทะเบียน</p>
                </div>
                <div class="icon m-3">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- end pie graph -->
<!-- start online offline -->
<div class="row">
    <div class="col-md-8 col-sm-8">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="box box-normal">
                    <div class="mr-2">
                        <div class="box-header with-border">
                            <i class="ion ion-clipboard"></i>
                            <h3 class="box-title">รายการข้อมูลที่ไม่อัพเดท</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul id="datanotupdate" class="products-list product-list-in-box"
                                        style="height: 450px; overflow-y: auto;">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="box box-normal">
                    <div class="ml-2">
                        <div class="box-header with-border">
                            <i class="ion ion-clipboard"></i>
                            <h3 class="box-title">รายการที่ถึงกำหนดให้ผู้ดูแลติดตามข้อมูล</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul id="datanearupdate" class="products-list product-list-in-box"
                                        style="height: 450px; overflow-y: auto;">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end matadata online -->
    <!-- metadata offline -->
    <div class="col-md-4 col-sm-4">

        <div class="">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">สถานะ Server</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="padding: 0">
                    <ul class="nav nav-stacked" id="dashboard_status_server">
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{
					trans('/backoffice/dashboard.status_converter') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="padding: 0">
                    <ul class="nav nav-stacked" id="dashboard_status_dataimport_detail">
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- status_api -->
        <div class="">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('/backoffice/dashboard.status_api')
					}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="padding: 0">
                    <ul class="nav nav-stacked" id="dashboard_status_api_detail">
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- status_web -->
        <div class="">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('/backoffice/dashboard.status_web')
					}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="padding: 0">
                    <ul class="nav nav-stacked" id="dashboard_status_web_detail">
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- status_db -->
        <div class="">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('/backoffice/dashboard.status_db') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="padding: 0">
                    <ul class="nav nav-stacked" id="dashboard_status_db_detail">
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <!-- end metadata offline -->
</div>
<!-- end conten dash board -->

<script type="text/javascript">
group_Translator["title_piegraph"] = '{{ trans("/backoffice/dashboard.title_piegraph") }}';
group_Translator["name"] = '{{ trans("/backoffice/dashboard.name") }}';
group_Translator["agency"] = '{{ trans("/backoffice/dashboard.agency") }}';
group_Translator["latest"] = '{{ trans("/backoffice/dashboard.latest") }}';
group_Translator["frequency"] = '{{ trans("/backoffice/dashboard.frequency") }}';
</script>
@stop