@extends('frontoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();

$view->asset('DataTables', 'JsonHelper', 'highcharts');

$view->resource('js', 'js/frontoffice/test/cim.js');
$view->resource('theme-css', 'css/frontoffice/test/cim.css');

$view->option('js-init','cim.init()');
?>
@section('ct')


region_id : <input type="text" id="input-region_id">
province_id : <input type="text" id="input-province_id">
&nbsp;
<button id="cim-btn"> Click si <3 </button>
<div class="table-responsive">
  <table class="table cim-table" id="cim-table">
    <thead>
      <tr>
        <th>region_id</th>
        <th>province_id</th>
        <th>province_name</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>

@endsection
