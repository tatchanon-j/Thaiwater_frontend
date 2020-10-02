<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$api = \App\Helpers\ApiServiceHelper::getInstance();

$view->option('page_name', trans('/home.page_name'));
$view->option('title', trans('/site.title'));
?>

@extends('backoffice/layout/master-home')

{!! $view->resource('theme-css','css/backoffice/home.css') !!}

@section('content')

<br>
    <!-- <div class="row"> -->
    <div class="container-fluid">
    <div class="row" style="text-align:center">

        @if ($api->isAllowService('backoffice.*'))
        <div class="col-sm-4 main-picture">
          <a href="backoffice/dashboard" class="_subsystem_link">
            <img src="{!! $view->buildResourceSrc('images/home/support_system.png') !!}" alt="Sf" width="40%" >
            <h4>{{ trans('/home.menu_backoffice') }}</h4>
          </a>
        </div>
        <div class="col-sm-4 main-picture">
          <a href="backoffice/analyst" class="_subsystem_link">
            <img src="{!! $view->buildResourceSrc('images/home/support_system.png') !!}" alt="Sf" width="40%" >
            <h4>{{ trans('/home.menu_analyst') }}</h4>
          </a>
        </div>

        @endif

        @if ($api->isAllowService('systemreport*'))
        <div class="col-sm-4 main-picture">
          <a href="http://report.thaiwater.net/login/" class="_subsystem_link">
            <img src="{!! $view->buildResourceSrc('images/home/report.png') !!}" alt="Sf"width="40%" >
            <h4>{{ trans('/home.menu_systemreport') }}</h4>
          </a>
        </div>
        @endif

        @if ($api->isAllowService('monitor*'))
        <div class="col-sm-4 main-picture">
          <a href="#" class="_subsystem_link">
            <img src="{!! $view->buildResourceSrc('images/home/display_system.png') !!}" alt="Sf" width="40%">
            <h4>{{ trans('/home.menu_monitor') }}</h4>
          </a>
        </div>
        @endif
      <!-- </center> -->
    <!-- </div> -->

    <!-- <div class="row"> -->
      <!-- <center> -->
      @if ($api->isAllowService('uac.*'))
      <div class="col-sm-4 main-picture">
        <a href="backoffice/admin/group" class="_subsystem_link">
          <img src="{!! $view->buildResourceSrc('images/home/setting.png') !!}" alt="Sf" width="40%">
          <h4>{{ trans('/home.menu_uac') }}</h4>
        </a>
      </div>
      @endif
      <!-- @if ($api->isAllowService('water_storage'))
      <div class="col-sm-4 main-picture">
        <a href="#" class="_subsystem_link">
          <img src="{!! $view->buildResourceSrc('images/home/database_system.png') !!}" alt="Sf" width="40%" >
          <h4>ระบบคลังข้อมูลน้ำ</h4>
        </a>
        @endif
      </div> -->
      @if ($api->isAllowService('agency.*'))
      <div class="col-sm-4 main-picture">
        <a href="{{ $l->httpUrl('agency/agency_summary') }}" class="_subsystem_link">
          <img src="{!! $view->buildResourceSrc('images/home/agency.png') !!}" alt="Sf" width="40%" >
          <h4>{{ trans('/home.menu_agency') }}</h4>
        </a>
      </div>
      @endif

      @if ($api->isAllowService('shopping.*'))
      <div class="col-sm-4 main-picture">
        <a href="{{ $l->httpUrl('data_service') }}" class="_subsystem_link">
          <img src="{!! $view->buildResourceSrc('images/home/metadata_icon.png') !!}" alt="Sf" width="40%" >
          <h4>{{ trans('/home.menu_dataservice') }}</h4>
        </a>
      </div>
      @endif
</div>
</div>

    </div>

<script>
var _subsystem_link = document.getElementsByClassName("_subsystem_link");

if ( _subsystem_link.length == 1 ) {
	if ( _subsystem_link[0].href != window.location ) {
		window.location = _subsystem_link[0].href
	}
}
</script>
@stop
