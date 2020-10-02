@extends('backoffice/layout/master')

@section('extra_head')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();
$image_url = env('API_SERVER') . '/thaiwater30/shared/image?image=';

$view->option(
    'breadcrumb',
    array(
        array(
            'href' => $l->httpUrl("/backoffice/docs/km"),
            'text' => 'Knowledge Base',
        ),
        array(
            'text' => 'Help',
        ),
    )
);

$view->option('js-init', 'srvData.init(group_Translator)');
$view->option('page_name', 'Knowledge Base');
?>
@stop

@section('content')
<h4>Installation</h4>
<ul>
	<li><a href="{{ asset('docs/installation/frontend_local/index.html') }}" target="_blank">การติดตั้ง Frontend บน Local</a></li>
	<li><a href="{{ asset('docs/installation/backend_local/index.html') }}" target="_blank">การติดตั้ง Backend บน Local (golang)</a></li>
	<li><a href="{{ asset('docs/installation/move_server_api_converter/index.html') }}" target="_blank">วิธีการแก้ไขและทดสอบในกรณีย้ายเครื่อง api2.thaiwater.net & converter.thaiwater.net</a></li>
</ul>

<h4>ข้อมูล</h4>
<ul>
	<li><a href="{{ asset('docs/backoffice/tele_station/index.html') }}" target="_blank">ตรวจสอบข้อมูลไม่เข้าระบบ - สถานีโทรมาตร</a></li>
	<li><a href="{{ asset('docs/data/rain24/index.html') }}" target="_blank">ตรวจสอบข้อมูลไม่เข้าระบบ - ฝน 24 ชม</a></li>
	<li><a href="{{ asset('docs/data/storm/index.html') }}" target="_blank">ตรวจสอบข้อมูลไม่เข้าระบบ - พายุ</a></li>
	<li><a href="{{ asset('docs/data/dam-rid/index.html') }}" target="_blank">ตรวจสอบข้อมูลไม่เข้าระบบ - เขื่อนกรมชล-ขนาดใหญ่</a></li>
	<li><a href="{{ asset('docs/data/waterquality/index.html') }}" target="_blank">ตรวจสอบข้อมูลไม่เข้าระบบ - คุณภาพน้ำ</a></li> <!--by werawan 22/01/2018-->
  <li><a href="{{ asset('docs/data/script-export/index.html') }}" target="_blank">script export ข้อมูลบนเครื่อง master1.thaiwater.net</a></li>
  <li><a href="{{ asset('docs/data/check-syc-data/index.html') }}" target="_blank">ตรวจสอบข้อมูลล่าสุด กรมอุตุนิยมวิทยา</a></li>
</ul>

<h4>API</h4>
<ul>
    <li><a href="{{ asset('docs/api/create_api/index.html') }}"
    target="_blank">การเพิ่ม api</a></li>
  <li><a href="{{ asset('docs/backoffice/apitest/index.html') }}"
    target="_blank">การทดสอบ Web Services</a></li>
	<li><a href="{{ asset('docs/api/service_filter_data/index.html') }}" target="_blank">ให้บริการข้อมูลเพิ่มเงื่อนไข filter ข้อมูลจากโทรมาตร</a></li>
<li><a href="{{ asset('docs/api/data_service/index.html') }}" target="_blank">ระบบให้บริการข้อมูล</a></li>
  <li><a href="{{ asset('docs/api/service_analyst_dam/index.html') }}" target="_blank">api เขื่อนเพิ่มเงื่อนไขรหัสภาค,รหัสจังหวัด http://api2.thaiwater.net:9200/api/v1/thaiwater30/analyst/dam</a></li>
  <li><a href="{{ asset('docs/api/thailand_main_add_agency/index.html') }}" target="_blank">api เพิ่มชื่อหน่วยงาน http://api2.thaiwater.net:9200/api/v1/thaiwater30/public/thailand_main</a></li>
  <li><a href="{{ asset('docs/api/thailand_main_data_limit/index.html') }}" target="_blank">api เพิ่มใส่เงื่อนไข limit ข้อมูลที่ return http://api2.thaiwater.net:9200/api/v1/thaiwater30/public/thailand_main</a></li>
  <li><a href="{{ asset('docs/api/api_cache/index.html') }}" target="_blank">การสร้าง api cache ใน go memory</a></li>
  <li><a href="{{ asset('docs/api/api_new/index.html') }}" target="_blank">การสร้างกลุ่ม api ใหม่</a></li>
  <li><a href="{{ asset('docs/api/data_service_by_metadata/index.html') }}" target="_blank">ให้บริการข้อมูลเพิ่มเงื่อนไข filter ข้อมูลรายบัญชีข้อมูลของระบบให้บริการข้อมูล และการทดสอบ</a></li>
  <li><a href="{{ asset('docs/api/data_service_gen_sql/index.html') }}" target="_blank">วิธีรันทดสอบ api_dataservice by metadata_id ของระบบให้บริการข้อมูล</a></li>
<li><a href="{{ asset('docs/api/data_service_error/index.html') }}" target="_blank">ตรวจสอบระบบให้บริการข้อมูลมี Error</a></li>
</ul>


<h4>เชื่อมโยงข้อมูล</h4>
<ul>
  <li><a href="{{ asset('docs/ingestion/md-waterlevel-webservice/index.html') }}" target="_blank">กรมเจ้าท่า ระดับน้ำ รสม.</a></li>
  <li><a href="{{ asset('docs/ingestion/md-waterlevel-history/index.html') }}" target="_blank">กรมเจ้าท่า ระดับน้ำ รสม. (ย้อนหลัง)</a></li>
  <li><a href="{{ asset('docs/ingestion/rtn-waterlevel/index.html') }}" target="_blank">กรมอุทกศาสตร์ ระดับน้ำ m. (ล่าสุด และย้อนหลัง)</a></li>
  <li><a href="{{ asset('docs/ingestion/generate-img-hourly/index.html') }}" target="_blank">generate ฝน เขื่อน ระดับน้ำ ภาพล่าสุด</a></li>
  <li><a href="{{ asset('docs/ingestion/m-small-dam-rid/index.html') }}" target="_blank">metadata เขื่อนขนาดเล็ก กรมชล</a></li>
  <li><a href="{{ asset('docs/ingestion/test-qc/index.html') }}" target="_blank">เขียนโปรแกรมทดสอบ qc-rule</a></li>
<li><a href="{{ asset('docs/ingestion/test-download/index.html') }}" target="_blank">ทดสอบ download driver Eclipse</a></li>
  <li><a href="{{ asset('docs/ingestion/test-convert/index.html') }}" target="_blank">ทดสอบ convert Eclipse</a></li>
  <li><a href="{{ asset('docs/ingestion/test-email-template/index.html') }}" target="_blank">ทดสอบ email template</a></li>
  <li><a href="{{ asset('docs/ingestion/rid-dam-update/index.html') }}" target="_blank">นำเข้าข้อมูลเขื่อนกรมชลฯ ย้อนหลังโดยการวางไฟล์ที่เครื่อง archive</a></li>
</ul>

<h4>Backoffice</h4>
<ul>
	<li><a href="{{ asset('docs/backoffice/add_side_menu/index.html') }}" target="_blank">การเพิ่มเมนูใหม่ (Side Menu)</a></li>
  <li><a href="{{ asset('docs/backoffice/qc_rule/index.html') }}" target="_blank">เพิ่ม qc_rule</a></li>
	<li>การเพิ่ม service ในฐานข้อมูล</li>
	<li><a href="{{ asset('docs/backoffice/string_drraa/index.html') }}" target="_blank">วิธีใช้ฟังก์ชัน string ในตั้งค่า dataset (ตัวอย่าง กรมฝนหลวงฯ)</a></li>
</ul>

<h4>Frontend</h4>
<ul>
	<li>การปรับหน้า Main</li>
	<li><a href="{{ asset('docs/frontend/radar/index.html') }}" target="_blank">การเพิ่มเรดาร์</a></li>
	<li><a href="{{ asset('docs/frontend/thailand_tooltip/index.html') }}" target="_blank">thailand/main table mouser over tooltip เพิ่ม แสดงชื่อหน่วยงาน</a></li>
</ul>
@stop
