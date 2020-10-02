<!-- Stored in resources/views/production/frontoffice/test/thitiporn.blade.php -->
@extends('frontoffice/layout/master')
<?php
// test web
// http://localhost/project/thaiwater/haii.or.th/fronend-thaiwater30/public/test/thitiporn

$view = \App\Helpers\ViewHelper::getInstance();
$a = 'this is text';
// ต้องการให้ ไฟล์ layout สามารถใช้งานตัวแปร a ได้
// $view->option('a', a);

// ประกาศใช้งาน js ที่ต้องการใช้ เช่น datatable ที่ config ไว้ที่ folder puble/vendor
$view->asset('DataTables','JsonHelper','highcharts');

// มีการ เช็ค ที่ .evn APP_DEBUG ถ้าเป็น true หมายถึง production จะใช้ js.min ถ้าเป็น false จะใช้ .js ปกติ ไม่ minify
$view->resource('js', 'js/frontoffice/test/thitiporn.min.js');
 $view->resource('theme-css', 'css/frontoffice/test/thitiporn.css');
 // ซิมยังไม่ได้ implement
// $view->resource('css', 'css/frontoffice/test/thitiporn.min.css');

// เรียกใช้ function init จาก ไฟล์ js
$view->option('js-init', 'main.init()');
?>

@section('ct')
test hello {{$name}} <br>
{{$a}}
<br>
<button id="openProvince">get data from api param region_id : 5  province_id : 81</button>
<br>
region id : <input type="" id="inputRegionId">
<br>
<div class="table-responsive">
  <table class="table-bordered" id="thitipornTable">
    <thead>
      <th>region id</th>
      <th>province id</th>
      <th>province name</th>
      <th>province name json</th>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
@endsection
