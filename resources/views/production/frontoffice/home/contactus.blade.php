@extends('frontoffice/layout/home')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();

// $view->option('main-menu-mode', 'admin');
$view->option('page_name', trans('frontoffice/home/master.main-breadcrumb-report'));
$view->option('page_name', trans('frontoffice/layout/menu.main-menu-contactus'));
?>

@section('extra_head')
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','Font-Kanit', 'leaflet' ,'FontAwesome') !!}
@stop

@section('content-center')

<!-- box -->
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"> {{ trans('frontoffice/home/contactus.head') }} </h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-7">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15501.289988164364!2d100.5325868!3d13.7594153!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1f09a57976669c46!2z4Liq4LiW4Liy4Lia4Lix4LiZ4Liq4Liy4Lij4Liq4LiZ4LmA4LiX4Lio4LiX4Lij4Lix4Lie4Lii4Liy4LiB4Lij4LiZ4LmJ4Liz4LmB4Lil4Liw4LiB4Liy4Lij4LmA4LiB4Lip4LiV4Lij!5e0!3m2!1sth!2sth!4v1511403894793" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-5">
                <form>
                  <div class="form-group">
                    <label class="col-form-label" for="formGroupExampleInput">ชื่อ / หน่วยงาน</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="กรุณากรอกชื่อ / หน่วยงาน">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">อีเมล์</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="กรุณากรอกอีเมล์">
                 
                  </div>
                   <div class="form-group">
                        <label for="exampleFormControlTextarea1">รายละเอียด</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                   <button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
                </form>
            </div>
        </div>
        <p>
            เลขที่ 108 อาคารบางกอกไทยทาวเวอร์ ชั้น 8 ถนนรางน้ำ แขวงถนนพญาไท ราชเทวี กรุงเทพ 10400<br>
            <i class="fa fa-phone" aria-hidden="true"></i>  0-2642-7132,   &nbsp;&nbsp;&nbsp;
            <i class="fa fa-fax" aria-hidden="true">  :  </i>  0-2642-7133  &nbsp;&nbsp;&nbsp;
            <i class="fa fa-envelope-o" aria-hidden="true"></i>  :    info_thaiwater
            <i class="fa fa-at" aria-hidden="true"></i>haii.or.th<br>
        </p>

    </div>
</div>


@stop
