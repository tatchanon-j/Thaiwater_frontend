@extends('frontoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();

$view->asset('DataTables', 'JsonHelper', 'highcharts');

$view->resource('js','js/frontoffice/test/juiss.js');
$view->resource('theme-css','css/frontoffice/test/juiss.css');


$view->option('js-init','juiss.init()')
?>
@section('ct')

who am i {{ $name }}


region_id : <input type="text" id="input_region_id">
province_id : <input type="text" id="input_province_id">
  <button id="btn-filter">Click</button>
<div class="table-responsive">

  <table class="table juiss-table" id="juiss-table">
    <thead>
      <th>region_id</th>
      <th>province_id</th>
      <th>province_name</th>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>

@endsection
