@extends('frontoffice/layout/home')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

// $view->option('main-menu-mode', 'admin');
$view->option('page_name', trans('frontoffice/home/master.main-breadcrumb-report'));
$view->option('title', trans('frontoffice/layout/menu.main-menu-aboutus'));
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit', 'leaflet' ,'FontAwesome') !!}
@stop

@section('content-center')

<!-- box -->
<div class="box box-default">
    <div class="box-header with-border">
        <h2 class="box-title"> {{ trans('frontoffice/home/about.head') }} </h2>
    </div>
</div>


    <div class="col-md-6">
        <img title="en. version" alt="english" src="{{ asset('resources/themes/default/images/home/RC43.JPG') }}" class="img-responsive center-block img-thumbnail">
    </div>
    <div class="col-md-6">
      <p>{{trans('frontoffice/home/about.p1') }} </p>
        <br/><br/><br/>
         
    </div>


    <div class="col-md-7 text-center">
        <p>{{trans('frontoffice/home/about.p2') }} 

         <br/><br/>
        {{trans('frontoffice/home/about.p3') }}  </p>
    </div>

    <div class="col-md-5 text-center">
        <img title="weather901" alt="" src="{{ asset('resources/themes/default/images/home/weather901.jpg') }}" class="img-responsive center-block img-thumbnail">
        <em>คอมพิวเตอร์แม่ข่ายชุดปฐมฤกษ์ (Weather901)</em>

    </div>

    <div class="col-md-12 text-center">
    <br/><br/>
    <p> พัฒนาสู่คลังข้อมูลน้ำและภูมิอากาศแห่งชาติ  </p>
        <p>{{trans('frontoffice/home/about.p4') }} </a></p>
        <br/>
    </div>
    <div class="col-md-12 text-center">
        <img title="en. version" alt="english" src="{{ asset('resources/themes/default/images/home/12.png') }}" class="img-responsive center-block">
        <p class="text-center"><em>ข้อมูลเริ่มต้นจาก 12 หน่วยงาน ในระบบคลังข้อมูลน้ำและภูมิอากาศแห่งชาติ</em></p><br/><br/>

        <p>{{trans('frontoffice/home/about.p5') }} </p>
        <br/><br/><br/>
   

        <p>
        <a href="http://nhc.in.th/" title="www.nhc.in.th"><u>คลังข้อมูลน้ำและภูมิอากาศแห่งชาติ </u> </a> <br/><br/>เปิดให้บริการข้อมูลผ่านเว็บไซต์ <a href="https://www.thaiwater.net/" title="www.thaiwater.net"><u>www.thaiwater.net</u></a> และ แอพพลิเคชั่นบนโทรศัพท์มือถือ ทั้งระบบปฏิบัติการ 
        <a href="https://itunes.apple.com/us/app/thaiwater/id1097487200?mt=8" class="btn btn-default btn-xs" title="Thaiwater"><i class="fa fa-apple" aria-hidden="true"></i>
          ios</a> และ 

          <a href="https://play.google.com/store/apps/details?id=mobile.nhc.thaiwater" class="btn btn-default btn-xs" title="Thaiwater"><i class="fa fa-android" aria-hidden="true"></i>
          android</a> ชื่อ "<strong>ThaiWater</strong>" ให้ประชาชนทั่วไปสามารถเข้าถึงข้อมูล สามารถติดตามสถานการณ์น้ำและสภาพอากาศด้วยตนเองได้อย่างสะดวก รวดเร็ว ทุกที่ ทุกเวลา   
        </p>
        <br/><br/>

        <img title="en. version" alt="english" src="{{ asset('resources/themes/default/images/home/NHC-EN.png') }}" class="img-responsive center-block">
        <p class="text-center"><em>คลังข้อมูลน้ำและภูมิอากาศแห่งชาติ (ThaiWater)</em></p><br>

    </div>
    <div class="col-md-12 text-center"><h4>คลังข้อมูลน้ำและภูมิอากาศแห่งชาติ ความร่วมมือจาก 34 หน่วยงาน</h4></div>
    <div class="col-md-6">
        <ol class="inline-style">
            <?php foreach (trans('frontoffice/home/about.agency1') as $value): ?>
                <li>{{ $value }}</li>
            <?php endforeach; ?>
        </ol>
    </div>
    <div class="col-md-6">
        <ol class="inline-style" start="18">
            <?php foreach (trans('frontoffice/home/about.agency2') as $value): ?>
                <li>{{ $value }}</li>
            <?php endforeach; ?>
        </ol>
    </div>
@stop
