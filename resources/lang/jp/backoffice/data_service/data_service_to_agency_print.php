<?php

$letterno = '<span name="letterno">%letterno%</span>';
$date = '<span name="date">%date%</span>';
$meta_agency = '<span name="meta_agency">%meta_agency%</span>';
$user_agency = '<span name="user_agency">%user_agency%</span>';

$oh_id = '<span name="oh_id">%oh_id%</span>';
$user_id = '<span name="user_id">%user_id%</span>';
$user_name = '<span name="user_name">%user_name%</span>';
$user_ministry = '<span name="user_ministry">%user_ministry%</span>';
$user_agency = '<span name="user_agency">%user_agency%</span>';
$user_office_name = '<span name="user_office_name">%user_office_name%</span>';
$user_phone = '<span name="user_phone">%user_phone%</span>';
$order_purpose = '<span name="order_purpose">%order_purpose%</span>';

return [
    'page_name' => '資料請求',

    'letterno' => 'に'.$letterno,
    'date' => '日付 '.$date,
    'subject' => '件名：情報の礼儀',
    'to' => '学びます '.$meta_agency,

    'attach' => 'สิ่งที่ส่งมาด้วย',
    'attach_1' => 'สำเนาแบบฟอร์มการขอข้อมูล ลง',
    'attach_2' => 'แบบฟอร์มคำขออนุเคราะห์ข้อมูล ลง',

    'content_1' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ตามที่ '.$meta_agency.' ได้เชื่อมโยงข้อมูลผ่านระบบคลังข้อมูลน้ำและภูมิอากาศแห่งชาติ
    แล้วนั้น และคลังข้อมูลน้ำและภูมิอากาศแห่งชาติได้มีระบบบริหารข้อมูล เพื่อเป็นศูนย์กลางการแลกเปลี่ยนและบูรณา
    การข้อมูลร่วมกันระหว่างหน่วยงานของรัฐโดย '.$user_agency.' ได้เข้าใช้บริการและขออนุเคราะห์
    ข้อมูลของหน่วยงานท่านผ่านระบบบริการข้อมูลดังกล่าว เพื่อนำไปใช้สนับสนุนการปฏิบัติงานภายในหน่วงาน
    รายละเอียดตามสิ่งที่ส่งมาด้วย',

    'content_2' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ในการนี้ คลังข้อมูลน้ำและภูมิอากาศแห่งชาติ ใคร่ขอความอนุเคราะห์ข้อมูลรายละเอียดปรากฏตามสิ่ง
    ที่ส่งมาด้วย ๑ แก่ '.$user_agency.' ทั้งนี้ ข้อมูลที่ได้รับจากท่าน จะดำเนินการจัดส่งไปยังหน่วยงานที่ขอข้อมูล
    เท่านั้น โดยขอมอบหมาย นายชัยณรงค์ ไผ่รุ้ง จำแหน่งเจ้าหน้าที่บริหารงานสารสนเทศ เป็นผู้ประสานงานข้อมูล
    หมายเลขโทรศัพท์ ๐ ๒๖๔๒ ๗๑๓๒ ต่อ ๕๑๑',

    'content_3' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จึงเรียนมาเพื่อโปรดพิจารณาให้ความอนุเคราะห์ข้อมูลดังกล่าวแก่ '.$user_agency.'
    พร้อมทั้งโปรดลงนามและส่งกลับคลังข้อมูลน้ำและภูมิอากาศแห่งชาติ (สิ่งที่ส่งมาด้วย ๒) ด้วย จะขอบคุณยิ่ง',

    'regards' => 'ขอแสดงความนับถือ',
    'director' => 'ผู้อำนวยการ <br> คลังข้อมูลน้ำและภูมิอากาศแห่งชาติ',

    'footer_content' => 'คลังข้อมูลน้ำและภูมิอากาศแห่งชาติ (ชัยณรงค์) <br>'.
    'โทร. ๐ ๒๖๔๒ ๗๒๓๒ ต่อ ๕๑๑ โทรสาร ๐ ๒๖๔๒ ๗๑๓๓ <br>'.
    'โทรศัพท์มือถือ ๐๘ ๙๐๒๐ ๑๗๗๒',

    'attach_2_header' => '<b>สิ่งที่แนบมาด้วย ๒</b>',
    'address' => 'เลขที่ ๑๐๘ อาคารบางกอกไทยทาวเวอร์ ชั้น ๘ ถ.รางน้ำ แขวงพญาไท <br>'.
    'เขตราชเทวี กรุงเทพฯ ๑๐๔๐๐ โทรศัพท์ ๐ ๒๖๔๒ ๗๑๓๒ โทรสาร ๐ ๒๖๔๒ ๗๑๓๓',

    'request' => '<b>รายการขออนุเคราะห์ข้อมูล</b>',

    'order_head' => '<b>เลขที่คำขอ</b> '.$oh_id,
    'order_head_date' => '<b>วันที่</b> '.$date,

    'detail_user' => '<b>รายละเอียดผู้ขออนุเคราะห์ข้อมูล</b>',
    'detail_user_id' => '<b>รหัสผู้ใช้งาน</b>',
    'detail_user_name' => '<b>ชื่อ - นามสกุล</b>',
    'detail_user_ministry' => '<b>กระทรวง</b>',
    'detail_user_agency' => '<b>หน่วยงาน</b>',
    'detail_user_office_name' => '<b>สำนัก/ศูนย์</b>',
    'detail_user_phone' => '<b>เบอร์โทรศัพท์</b>',
    'detail_order_purpose' => '<b>วัตถุประสงค์การขอข้อมูล</b>',

    'span_user_id' => $user_id,
    'span_user_name' => $user_name,
    'span_user_ministry' => $user_ministry,
    'span_user_agency' => $user_agency,
    'span_user_office_name' => $user_office_name,
    'span_user_phone' => $user_phone,
    'span_order_purpose' => $order_purpose,

    'table_order' => 'ลำดับที่',
    'table_meta_name' => 'ชื่อข้อมูล',
    'table_agency' => 'หน่วยงาน',
    'table_frequency' => 'ความถี่',
    'table_basin' => 'พื้นที่ลุ่มน้ำ',
    'table_province' => 'จังหวัด',
    'table_select_date' => 'ช่วงเวลาที่ต้องการ',
    'table_service_type' => 'รูปแบบการรับข้อมูล',
    'table_result' => 'ผลการพิจารณา',
    'table_result_ap' => 'อนุมัติ',
    'table_result_da' => 'ไม่อนุมัติ',

    'from_date' => 'ตั้งแต่ ',
    'to_date' => ' ถึง ',
];
?>
