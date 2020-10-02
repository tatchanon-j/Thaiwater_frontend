@section('extra_head')

@extends('backoffice/layout/master')

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
    array(
        array(
            'href' => $l->httpUrl("/backoffice/event_management/event_type"),
            'text' => trans('backoffice/event_management/event_type.main_menu_name')
        ),
        array(
            'text' => trans('backoffice/event_management/event_type.page_name')
        )
    ));
$view->option('js-init', 'evt.init(group_Translator)');
$view->option('page_name', 'รายชื่อหน่วยงานภาคี');
?>
{!! $view->resource('theme-css','css/backoffice/data_integration_report/water_department.css') !!}
{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/data_integration_report/water_department.js') !!}
@stop

@section('content')
<!-- data table -->
<div class="table-responsive">
    <table id="tbl-dept" class="display admin-datatables" width="100%">
        <thead>
            <tr>
                <th class="text-center" rowspan="2">{{ trans('/master.col_order') }}</th>
                <th class="text-center" rowspan="2">ชื่อหน่วยงาน Agencies</th>
                <th class="text-center" rowspan="2">กระทรวง</th>
                <th class="text-center" rowspan="2">Logo</th>
                <th class="text-center" colspan="9">*ข้อมูลด้านน้ำและภูมิอากาศ (Aspects of operations)</th>
            </tr>
            <tr>
                <th class="text-center">1</th>
                <th class="text-center">2</th>
                <th class="text-center">3</th>
                <th class="text-center">4</th>
                <th class="text-center">5</th>
                <th class="text-center">6</th>
                <th class="text-center">7</th>
                <th class="text-center">8</th>
                <th class="text-center">9</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<div>
    <p>หมายเหตุ : <i class="fa fa-check text-center" style="color: red" aria-hidden="true"></i> หัวหน้ากลุ่มคณะทำงาน / คณะทำงาน</p>
    <p>&emsp;&emsp;&emsp;&emsp;*ข้อมูลด้านน้ำและภูมิอากาศ (Aspects of operations)</p>
    <p>&emsp;&emsp;&emsp;&emsp;1.ด้านการคาดการณ์ลักษณะอากาศระยะสั้น ระยะกลาง และระยะยาว  (Short-, Medium- and Long-Range Weather Prediction)</p>
    <p>&emsp;&emsp;&emsp;&emsp;2.ด้านการบริหารจัดการน้ำพื้นที่ในเขตชลประทาน (Water Management in Irrigated Area)</p>
    <p>&emsp;&emsp;&emsp;&emsp;3.ด้านการบริหารจัดการน้ำพื้นที่นอกเขตชลประทาน (Rain-fed area water management)</p>
    <p>&emsp;&emsp;&emsp;&emsp;4.ด้านการบริหารจัดการน้ำเพื่อการอุปโภค บริโภค และอุตสาหกรรม (Domestic and industrial uses water management)</p>
    <p>&emsp;&emsp;&emsp;&emsp;5.ด้านการรักษาระบบนิเวศและคุณภาพน้ำ (Ecosystem and water quality preservation)</p>
    <p>&emsp;&emsp;&emsp;&emsp;6.ด้านการเตือนภัยและบริหารจัดการภัยพิบัติ (Disaster warning and management) </p>
    <p>&emsp;&emsp;&emsp;&emsp;7.ด้านปริมาณน้ำเพื่อการผลิตพลังงานไฟฟ้า (Water for electricity generation)</p>
    <p>&emsp;&emsp;&emsp;&emsp;8.ด้านกรอบการวางแผนพัฒนาด้านเศรษฐกิจและสังคม (Economic and social development planning)</p>
    <p>&emsp;&emsp;&emsp;&emsp;9.ด้านระบบโครงสร้างพื้นฐานด้านระบบข้อมูล (Infrastructures for data systems)</p>
</div>
<!-- end data table -->

<!-- *ข้อมูลด้านน้ำและภูมิอากาศ (Aspects of operations)
1	ด้านการคาดการณ์ลักษณะอากาศระยะสั้น ระยะกลาง และระยะยาว  (Short-, Medium- and Long-Range Weather Prediction)
2	ด้านการบริหารจัดการน้ำพื้นที่ในเขตชลประทาน (Water Management in Irrigated Area)
3	ด้านการบริหารจัดการน้ำพื้นที่นอกเขตชลประทาน (Rain-fed area water management)
4	ด้านการบริหารจัดการน้ำเพื่อการอุปโภค บริโภค และอุตสาหกรรม (Domestic and industrial uses water management)
5	ด้านการรักษาระบบนิเวศและคุณภาพน้ำ (Ecosystem and water quality preservation)
6	ด้านการเตือนภัยและบริหารจัดการภัยพิบัติ (Disaster warning and management) 
7	ด้านปริมาณน้ำเพื่อการผลิตพลังงานไฟฟ้า (Water for electricity generation)
8	ด้านกรอบการวางแผนพัฒนาด้านเศรษฐกิจและสังคม (Economic and social development planning)
9	ด้านระบบโครงสร้างพื้นฐานด้านระบบข้อมูล (Infrastructures for data systems) -->
@stop