@section('extra_head')
@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$view->option('main-menu-mode', 'analyst');

?>
@stop
