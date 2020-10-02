@extends('frontoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
// $a = "This is a";
// $view->option('a', $a);
$view->asset('DataTables');

$view->resource('js', 'js/frontoffice/test/manorot.js');
$view->resource('theme-css', 'css/frontoffice/test/manorot.css');
$view->option('js-init', 'manorot.init()');
?>

@section('ct')
hello {{ $name }}

<button id="manorot-btn">Click Me</button>
<div class="table-responsive">
	<table class="table" id="manorot-table">
		<thead>
			<th>Region id</th>
			<th>Province ID</th>
			<th>Province Name</th>
		</thead>
		<tbody>

		</tbody>
	</table>
</div>
@endsection
