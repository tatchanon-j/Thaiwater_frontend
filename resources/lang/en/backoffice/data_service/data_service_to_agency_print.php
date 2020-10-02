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
    'page_name' => 'Request for information',

    'letterno' => 'at '.$letterno,
    'date' => 'date '.$date,
    'subject' => 'subjec Request information',
    'to' => 'To. '.$meta_agency,

    'attach' => 'Enclosed with',
    'attach_1' => 'Copy of request form',
    'attach_2' => 'Information Request Form ',

    'content_1' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ตามที่ '.$meta_agency.' Data linking through national water and climate data systems.
     And then the National Archives of Water and Climate have a data management system. To be the center of exchange and integration.
     Information sharing between government agencies by '.$user_agency.' Have access to the service and support.
     The information of your organization through the information service. To support the work within the organization.
     Details of the submission',

    'content_2' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; In this regard, the National Archives of Water and Climate I would like to ask for detailed information appear according to what.
     Shipped with 1 to '.$user_agency.' The information received from you. Will deliver to the requested agency.
     Assignment Mr. Chainarong Pairoung, Executive Information Officer As data coordinator
     Phone number 0 2642 7132 ext. 511',

    'content_3' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Please be informed accordingly '.$user_agency.'
    Please also sign and return the national water and climate data archive. (Enclosure 2) Thank you!',

    'regards' => 'Kind regards',
    'director' => 'ผู้อำนวยการ <br> Hydro and Agro Informatics Institute',

    'footer_content' => 'Hydro and Agro Informatics Institute (Chainarong) <br>'.
    'Tel. 0 2642 7232 ext. 511 Fax 0 2642 7133 <br>'.
    'Mobile 08 9020 1772',

    'attach_2_header' => '<b>Attachment 2</b>',
    'address' => '8 th Floor, Bangkok Thai Tower 108 Rangnam Rd., Phayathai, <br>'.
    'Ratchatewi, Bangkok 10400, Thailand 10400 Phone 0-2642-7132, Fax 0-2642-7133',

    'request' => '<b>Data entry request</b>',

    'order_head' => '<b>Request id</b> '.$oh_id,
    'order_head_date' => '<b>Date</b> '.$date,

    'detail_user' => '<b>Details of the applicant</b>',
    'detail_user_id' => '<b>User ID</b>',
    'detail_user_name' => '<b>Name - Surname</b>',
    'detail_user_ministry' => '<b>Ministry</b>',
    'detail_user_agency' => '<b>Agency</b>',
    'detail_user_office_name' => '<b>Office / center</b>',
    'detail_user_phone' => '<b>Tel.</b>',
    'detail_order_purpose' => '<b>Purpose of request</b>',

    'span_user_id' => $user_id,
    'span_user_name' => $user_name,
    'span_user_ministry' => $user_ministry,
    'span_user_agency' => $user_agency,
    'span_user_office_name' => $user_office_name,
    'span_user_phone' => $user_phone,
    'span_order_purpose' => $order_purpose,

    'table_order' => 'Order',
    'table_meta_name' => 'Data',
    'table_agency' => 'Agency',
    'table_frequency' => 'Frequency',
    'table_basin' => 'Watershed area',
    'table_province' => 'Province',
    'table_select_date' => 'Preferred time',
    'table_service_type' => 'Data format receives',
    'table_result' => 'Result',
    'table_result_ap' => 'Allowed',
    'table_result_da' => 'Not allowed',

    'from_date' => 'From ',
    'to_date' => ' To ',
];
?>
