<?php
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getLocale();
$view = \App\Helpers\ViewHelper::getInstance();

$user_menu = array(
	// Metadata Menu
	array(
		'text' => trans('backoffice/metadata/metadata.main-menu-mode'),
		'icon' => 'fa-pencil-square-o',
		'items' => array(
			array(
				'srv' => 'backoffice.metadata.metadata',
				'text' => trans('backoffice/metadata/metadata.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/metadata'),
			),
			array(
				'srv' => 'backoffice.metadata.metadata',
				'text' => 'ระบบที่นำข้อมูลไปแสดง',
				'href' => $l->httpUrl('backoffice/metadata/metadata_show'),
			),
			array(
				'srv' => 'backoffice.metadata.summary_meta',
				'text' => trans('backoffice/metadata/summary_meta.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/summary_meta'),
			),
			array(
				'srv' => 'backoffice.metadata.category',
				'text' => trans('backoffice/metadata/category.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/category'),
			),
			array(
				'srv' => 'backoffice.metadata.subcat',
				'text' => trans('backoffice/metadata/subcat.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/subcat'),
			),
			array(
				'srv' => 'backoffice.metadata.unit',
				'text' => trans('backoffice/metadata/unit.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/unit'),
			),
			array(
				'srv' => 'backoffice.metadata.frequency',
				'text' => trans('backoffice/metadata/frequency.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/frequency'),
			),
			array(
				'srv' => 'backoffice.metadata.agency',
				'text' => trans('backoffice/metadata/agency.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/agency'),
			),
			array(
				'srv' => 'backoffice.metadata.department',
				'text' => trans('backoffice/metadata/department.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/department'),
			),
			array(
				'srv' => 'backoffice.metadata.ministry',
				'text' => trans('backoffice/metadata/ministry.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/ministry'),
			),
			array(
				'srv' => 'backoffice.metadata.service_method',
				'text' => trans('backoffice/metadata/service_method.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/service_method'),
			),
			array(
				'srv' => 'backoffice.metadata.hydroinfo',
				'text' => trans('backoffice/metadata/hydroinfo.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/hydroinfo'),
			),
			array(
				'srv' => 'backoffice.metadata.method',
				'text' => trans('backoffice/metadata/method.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/method'),
			),
			array(
				'srv' => 'backoffice.metadata.data_format',
				'text' => trans('backoffice/metadata/data_format.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/data_format'),
			),
			array(
				'srv' => 'backoffice.metadata.metadata_status',
				'text' => trans('backoffice/metadata/metadata_status.page_name'),
				'href' => $l->httpUrl('backoffice/metadata/metadata_status'),
			),
		), //end items
	), //end array metadata module
	//Event Management Menu
	array(
		'text' => trans('backoffice/event_management/event_type.main_menu_name'),
		'icon' => 'fa-files-o',
		'items' => array(
			array(
				'srv' => 'backoffice.evmgmt.event_type',
				'text' => trans('backoffice/event_management/event_type.page_name'),
				'href' => $l->httpUrl('backoffice/event_management/event_type'),
			),
			array(
				'srv' => 'backoffice.evmgmt.event_subtype',
				'text' => trans('backoffice/event_management/event_subtype.page_name'),
				'href' => $l->httpUrl('backoffice/event_management/event_subtype'),
			),
			array(
				'srv' => 'backoffice.evmgmt.event_method',
				'text' => trans('backoffice/event_management/event_method.page_name'),
				'href' => $l->httpUrl('backoffice/event_management/event_method'),
			),
			array(
				'srv' => 'backoffice.evmgmt.event_log_sink_method_type',
				'text' => trans('backoffice/event_management/event_log_sink_method_type.page_name'),
				'href' => $l->httpUrl('backoffice/event_management/event_log_sink_method_type'),
			),
			array(
				'srv' => 'backoffice.evmgmt.event_mgmt_email_sever',
				'text' => trans('backoffice/event_management/event_mgmt_email_sever.page_name'),
				'href' => $l->httpUrl('backoffice/event_management/event_mgmt_email_sever'),
			),
			array(
				'srv' => 'backoffice.evmgmt.event_target',
				'text' => trans('backoffice/event_management/event_target.page_name'),
				'href' => $l->httpUrl('backoffice/event_management/event_target'),
			),
			array(
				'srv' => 'backoffice.evmgmt.event_mail',
				'text' => trans('backoffice/event_management/event_mail.page_name'),
				'href' => $l->httpUrl('backoffice/event_management/event_mail'),
			),
			array(
				'srv' => 'backoffice.evmgmt.sink_condition',
				'text' => trans('backoffice/event_management/sink_condition.page_name'),
				'href' => $l->httpUrl('backoffice/event_management/sink_condition'),
			),
		),
	),
	//Data Integration Report Menu
	array(
		'text' => trans('backoffice/data_integration_report/report_event.main_menu_name'),
		'icon' => 'fa-table',
		'items' => array(
			array(
				'srv' => 'backoffice.dir.report_event',
				'text' => trans('backoffice/data_integration_report/report_event.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration_report/report_event'),
			),
			array(
				'srv' => 'backoffice.dir.report_import_by_year',
				'text' => trans('backoffice/data_integration_report/report_import_by_year.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration_report/report_import_by_year'),
			),
			array(
				'srv' => 'backoffice.dir.report_import_by_month',
				'text' => trans('backoffice/data_integration_report/report_import_by_month.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration_report/report_import_by_month'),
			),
			array(
				'srv' => 'backoffice.dir.report_import_by_date',
				'text' => trans('backoffice/data_integration_report/report_import_by_date.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration_report/report_import_by_date'),
			),
			array(
				'srv' => 'backoffice.dir.report_import',
				'text' => trans('backoffice/data_integration_report/report_import.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration_report/report_import'),
			),
			array(
				'srv' => 'backoffice.dir.report_event',
				'text' => trans('backoffice/data_integration_report/event_report.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration_report/event_report'),
			),
			array(
				'srv' => 'backoffice.dir.report_event',
				'text' => 'หน่วยงานที่เชื่อมโยงและไม่ได้เชื่อมโยง',
				'href' => $l->httpUrl('backoffice/data_integration_report/metadata_report'),
			),
			array(
				'srv' => 'backoffice.dir.report_event',
				'text' => 'หน่วยงานภาคีคลังข้อมูลน้ำ',
				'href' => $l->httpUrl('backoffice/data_integration_report/water_department'),
			),
		),
	),
	//DataManagement Menu
	array(
		'text' => trans('backoffice/data_management/monitor_data.main_menu_name'),
		'icon' => 'fa-laptop',
		'items' => array(
			array(
				'srv' => 'backoffice.dmgmt.monitor_data',
				'text' => trans('backoffice/data_management/monitor_data.page_name'),
				'href' => $l->httpUrl('backoffice/data_management/monitor_data'),
			),
			array(
				'srv' => 'backoffice.dmgmt.record_data',
				'text' => trans('backoffice/data_management/record_data.page_name'),
				'href' => $l->httpUrl('backoffice/data_management/record_data'),
			),
			array(
				'srv' => 'backoffice.dmgmt.error_data',
				'text' => trans('backoffice/data_management/error_data.page_name'),
				'href' => $l->httpUrl('backoffice/data_management/error_data'),
			),
			array(
				'srv' => 'backoffice.dmgmt.record_error_data',
				'text' => trans('backoffice/data_management/record_error_data.page_name'),
				'href' => $l->httpUrl('backoffice/data_management/record_error_data'),
			),
			array(
				'srv' => 'backoffice.dmgmt.mon_error_dgmt',
				'text' => trans('backoffice/data_management/mon_error_dgmt.page_name'),
				'href' => $l->httpUrl('backoffice/data_management/mon_error_dgmt'),
			),
			array(
				'srv' => 'backoffice.dmgmt.import_data',
				'text' => trans('backoffice/data_management/import_data.page_name'),
				'href' => $l->httpUrl('backoffice/data_management/import_data'),
			),
			array(
				'srv' => 'backoffice.dmgmt.check_metadata',
				'text' => trans('backoffice/data_management/check_metadata.page_name'),
				'href' => $l->httpUrl('backoffice/data_management/check_metadata'),
			),
			array(
				'srv' => 'backoffice.dmgmt.check_data_error',
				'text' => trans('backoffice/data_management/check_data_error.page_name'),
				'href' => $l->httpUrl('backoffice/data_management/check_data_error'),
			),
			array(
				'srv' => 'backoffice.dmgmt.check_latest_data',
				'text' => trans('backoffice/data_management/check_latest_data.page_name'),
				'href' => $l->httpUrl('backoffice/data_management/check_latest_data'),
			),
		),
	),
	//Data Service Menu
	array(
		'text' => trans('backoffice/data_service/data_service_register.main_menu_name'),
		'icon' => 'fa-shopping-cart',
		'items' => array(
			array(
				'srv' => 'backoffice.dsr.data_service_to_agency',
				'text' => trans('backoffice/data_service/data_service_to_agency.page_name'),
				'href' => $l->httpUrl('backoffice/data_service/data_service_to_agency'),
			),
			array(
				'srv' => 'backoffice.dsr.data_service_upload_result',
				'text' => trans('backoffice/data_service/data_service_upload_result.page_name'),
				'href' => $l->httpUrl('backoffice/data_service/data_service_upload_result'),
			),
			array(
				'srv' => 'backoffice.dsr.data_service_approve',
				'text' => trans('backoffice/data_service/data_service_approve.page_name'),
				'href' => $l->httpUrl('backoffice/data_service/data_service_approve'),
			),
			array(
				'srv' => 'backoffice.dsr.data_service_management',
				'text' => trans('backoffice/data_service/data_service_management.page_name'),
				'href' => $l->httpUrl('backoffice/data_service/data_service_management'),
			),
			array(
				'srv' => 'backoffice.dsr.data_service_summary',
				'text' => trans('backoffice/data_service/data_service_summary.page_name'),
				'href' => $l->httpUrl('backoffice/data_service/data_service_summary'),
			),
			array(
				'srv' => 'backoffice.dsr.data_service_summary',
				'text' => 'การร้องขอโดย Admin ทำการแทน',
				'href' => $l->httpUrl('backoffice/data_service/data_service_admin'),
			),
		),
	),
	//DBA Menu
	array(
		'text' => trans('backoffice/dba/delete_data.main_menu_name'),
		'icon' => 'fa-database',
		'items' => array(
			array(
				'srv' => 'backoffice.dba.delete_data',
				'text' => trans('backoffice/dba/delete_data.page_name'),
				'href' => $l->httpUrl('backoffice/dba/delete_data'),
			),
			array(
				'srv' => 'backoffice.dba.manage_partition',
				'text' => trans('backoffice/dba/manage_partition.page_name'),
				'href' => $l->httpUrl('backoffice/dba/manage_partition'),
			),
		),
	),
	//API Menu
	array(
		'text' => 'APIS',
		'icon' => 'fa-key',
		'items' => array(
			array(
				'srv' => 'backoffice.apis.key_access_mgmt',
				'text' => trans('backoffice/apis/key_access_mgmt.page_name'),
				'href' => $l->httpUrl('backoffice/apis/key_access_mgmt'),
			),
			array(
				'srv' => 'backoffice.apis.monitor',
				'text' => trans('backoffice/apis/monitor.page_name'),
				'href' => $l->httpUrl('backoffice/apis/monitor'),
			),
			array(
				'srv' => 'backoffice.apis.monitor_api_service',
				'text' => trans('backoffice/apis/monitor_api_service.page_name'),
				'href' => $l->httpUrl('backoffice/apis/monitor_api_service'),
			),
			array(
				'srv' => 'backoffice.apis.apitest',
				'text' => 'Test WS',
				'href' => $l->httpUrl('backoffice/apis/apitest'),
			),
			array(
				'srv' => 'backoffice.apis.apidocs',
				'text' => 'APIs Document',
				'href' => 'http://web.thaiwater.net/thaiwater30/api-docs',
				'target' => '_blank',
			),
			array(
				'srv' => 'backoffice.apis.monitor',
				'text' => 'Monitor Server',
				'href' => $l->httpUrl('backoffice/apis/monitor_server'),
			),
			array(
				'srv' => 'backoffice.apis.monitor',
				'text' => 'Email Test',
				'href' => $l->httpUrl('backoffice/apis/email_test'),
			),
		),
	),
	//Data Integration Menu
	array(
		'text' => trans('backoffice/data_integration/mgmt_script.main_menu_name'),
		'icon' => 'fa-clock-o',
		'items' => array(
			array(
				'srv' => 'backoffice.data_integration.mgmt_script',
				'text' => trans('backoffice/data_integration/mgmt_script.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration/mgmt_script'),
			),
			array(
				'srv' => 'backoffice.data_integration.mgmt_conv',
				'text' => trans('backoffice/data_integration/mgmt_conv.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration/mgmt_conv'),
			),
			array(
				'srv' => 'backoffice.data_integration.mgmt_metadata',
				'text' => trans('backoffice/data_integration/mgmt_metadata.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration/mgmt_metadata'),
			),
			array(
				'srv' => 'backoffice.data_integration.hi_script',
				'text' => trans('backoffice/data_integration/hi_script.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration/hi_script'),
			),
			array(
				'srv' => 'backoffice.data_integration.mgmt_script_rain',
				'text' => trans('backoffice/data_integration/mgmt_script_rain.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration/mgmt_script_rain'),
			),
			array(
				'srv' => 'backoffice.data_integration.mgmt_conv_rain',
				'text' => trans('backoffice/data_integration/mgmt_conv_rain.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration/mgmt_conv_rain'),
			),
			array(
				'srv' => 'backoffice.data_integration.mgmt_metadata_rain',
				'text' => trans('backoffice/data_integration/mgmt_metadata_rain.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration/mgmt_metadata_rain'),
			),
			array(
				'srv' => 'backoffice.data_integration.hi_script_rain',
				'text' => trans('backoffice/data_integration/hi_script_rain.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration/hi_script_rain'),
			),
			array(
				'srv' => 'backoffice.data_integration.mgmt_cron',
				'text' => trans('backoffice/data_integration/mgmt_cron.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration/mgmt_cron'),
			),
			array(
				'srv' => 'backoffice.data_integration.cron_setting',
				'text' => trans('backoffice/data_integration/cron_setting.page_name'),
				'href' => $l->httpUrl('backoffice/data_integration/cron_setting'),
			),
			array(
				'srv' => 'backoffice.data_integration.compare_master',
				'text' => trans('backoffice/data_integration/compare_master.page_name_master'),
				'href' => $l->httpUrl('backoffice/data_integration/compare_master'),
			),
			array(
				'srv' => 'backoffice.data_integration.compare_image',
				'text' => trans('backoffice/data_integration/compare_master.page_name_image'),
				'href' => $l->httpUrl('backoffice/data_integration/compare_image'),
			),
			array(
				'srv' => 'backoffice.data_integration.compare_transection',
				'text' => trans('backoffice/data_integration/compare_master.page_name_transection'),
				'href' => $l->httpUrl('backoffice/data_integration/compare_transection'),
			),
			array(
				'srv' => 'backoffice.data_integration.compare_transection',
				'text' => trans('backoffice/data_integration/config_variable.page_name_master'),
				'href' => $l->httpUrl('backoffice/data_integration/config_variable'),
			),
		),
	),
	//Tools Menu
	array(
		'text' => trans('backoffice/tools/mgmt_cache.main_menu_name'),
		'icon' => 'fa-pie-chart',
		'items' => array(
			array(
				'srv' => 'backoffice.tools.mgmt_cache',
				'text' => trans('backoffice/tools/mgmt_cache.page_name'),
				'href' => $l->httpUrl('backoffice/tools/mgmt_cache'),
			),
			array(
				'srv' => 'backoffice.tools.mgmt_display',
				'text' => trans('backoffice/tools/mgmt_display.page_name'),
				'href' => $l->httpUrl('backoffice/tools/display_setting'),
			),
			array(
				'srv' => 'backoffice.tools.ignore_data',
				'text' => trans('backoffice/tools/ignore_data.page_name'),
				'href' => $l->httpUrl('backoffice/tools/ignore_data'),
			),
			array(
				'srv' => 'backoffice.tools.check_image',
				'text' => trans('backoffice/tools/check_image.page_name'),
				'href' => $l->httpUrl('backoffice/tools/check_image'),
			),
			array(
				'srv' => 'backoffice.tools.check_image',
				'text' => 'Manage_One',
				'href' => $l->httpUrl('backoffice/tools/manage_one'),
			),
			array(
				'srv' => 'backoffice.tools.check_image',
				'text' => 'Manage_Two',
				'href' => $l->httpUrl('backoffice/tools/manage_two'),
			),
			array(
				'srv' => 'backoffice.tools.check_image',
				'text' => 'Blacklist',
				'href' => $l->httpUrl('backoffice/tools/blacklist'),
			),
		),
	),

	// Document Menu
	array(
		'text' => 'เอกสาร',
		'icon' => 'fa-info-circle',
		'items' => array(
			array(
				'srv' => 'backoffice.docs.project',
				'text' => 'เอกสารโครงการ',
				'href' => 'https://drive.google.com/drive/folders/0B3IjoVwlGDuuclBpTnR4UjNwUjQ',
				'target' => '_blank',
			),
			array(
				'srv' => 'backoffice.docs.help',
				'text' => 'Knowledge Base',
				'href' => $l->httpUrl('backoffice/km'),
			),
		),
	),
);

$admin_menu = array(
	array(
		'text' => trans('backoffice/admin/admin.page_name'),
		'icon' => 'fa-pencil-square-o',
		'items' => array(
			array(
				'srv' => 'uac.user',
				'text' => trans('backoffice/admin/user.page_name'),
				'href' => $l->httpUrl('backoffice/admin/user'),
			),
			array(
				'srv' => 'uac.user_setting',
				'text' => trans('backoffice/admin/user_setting.page_name'),
				'href' => $l->httpUrl('backoffice/admin/user_setting'),
			),
			array(
				'srv' => 'uac.group',
				'text' => trans('backoffice/admin/group.page_name'),
				'href' => $l->httpUrl('backoffice/admin/group'),
			),
			array(
				'srv' => 'uac.management_system',
				'text' => trans('backoffice/admin/management_system.page_name'),
				'href' => $l->httpUrl('backoffice/admin/management_system'),
			),
			array(
				'srv' => 'uac.user_history',
				'text' => trans('backoffice/admin/user_history.page_name'),
				'href' => $l->httpUrl('backoffice/admin/user_history'),
			),
		),
	),
);

// เมนูสำหรับหน้ารายงานนักวิเคราะห์
$analyst_menu = array(
	array(
		'text' => "รายงานนักวิเคราะห์",
		'icon' => 'fa-pencil-square-o',
		'items' => array(
			array(
				'srv' => 'analyst.all',
				'text' => "รายงานนักวิเคราะห์",
				'href' => $l->httpUrl('backoffice/analyst'),
			),
			array(
				'srv' => 'analyst.weather',
				'text' => "แผนภาพสภาพอากาศ",
				'href' => $l->httpUrl('backoffice/analyst/weather'),
			),
			array(
				'srv' => 'analyst.rain',
				'text' => "ฝน",
				'href' => $l->httpUrl('backoffice/analyst/rain'),
			),
			array(
				'srv' => 'analyst.radar',
				'text' => "เรดาร์",
				'href' => $l->httpUrl('backoffice/analyst/radar'),
			),
			array(
				'srv' => 'analyst.dam',
				'text' => "เขื่อน",
				'href' => $l->httpUrl('backoffice/analyst/dam'),
			),
			array(
				'srv' => 'analyst.waterlevel',
				'text' => "ระดับน้ำ",
				'href' => $l->httpUrl('backoffice/analyst/waterlevel'),
			),
			array(
				'srv' => 'analyst.water_diagram',
				'text' => "ผังน้ำ",
				'href' => $l->httpUrl('backoffice/analyst/water_diagram'),
			),
			array(
				'srv' => 'analyst.sea_waterlevel',
				'text' => "ระดับน้ำบริเวณอ่าวไทยและอันดามัน",
				'href' => $l->httpUrl('backoffice/analyst/sea_waterlevel'),
			),
			array(
				'srv' => 'analyst.water_quality',
				'text' => "คุณภาพน้ำ",
				'href' => $l->httpUrl('backoffice/analyst/water_quality'),
			),
			array(
				'srv' => 'analyst.forecast',
				'text' => "คาดการณ์",
				'href' => $l->httpUrl('backoffice/analyst/forecast'),
			),
			array(
				'srv' => 'analyst.records',
				'text' => "บันทึกเหตุการณ์น้ำ",
				'href' => $l->httpUrl('backoffice/analyst/records'),
			),
		),
	),
);

// $agency_menu = array(
//   array(
//     'text' => trans('frontoffice/agency/agency.module_name'),
//     'icon' => 'fa-pencil-square-o',
//     'items' => array(
//       array(
//         'srv' => 'agency.agency_summary',
//         'text' => trans('frontoffice/agency/summary.page_name'),
//         'href' => $l->httpUrl('frontoffice/agency/agency_summary')
//       ),
//       array(
//         'srv' => 'agency.agency_shopping',
//         'text' => trans('frontoffice/agency/shopping.page_name'),
//         'href' => $l->httpUrl('frontoffice/agency/agency_shopping')
//       )
//     )
//   )
// );

if ($view->option('main-menu-mode') == 'admin') {
	$dsp_menu = $admin_menu;
} else if ($view->option('main-menu-mode') == 'agency') {
	$dsp_menu = $agency_menu;
} else if ($view->option('main-menu-mode') == 'analyst') {
	$dsp_menu = $analyst_menu;
} else {
	$dsp_menu = $user_menu;
}

// Remove menu that user can not access
$menu = \App\Helpers\ApiServiceHelper::getInstance()->filterServiceTree($dsp_menu);

if (count($menu) == 1 && isset($menu[0]['items']) && count($menu[0]['items']) == 1) {
	if (isset($menu[0]['items'][0]['href'])) {
		$redir_url = $l->httpUrl($menu[0]['items'][0]['href']);
	}
}

function buildMenuItemA($m) {
	$current_url = $_SERVER['REQUEST_URI'];
	if (($pos = strpos($current_url, '?')) !== false) {
		$current_url = substr($current_url, 0, $pos);
	}

	if (isset($m['href'])) {
		$href = $m['href'];
	} else {
		$href = '#';
	}

	if (isset($m['target'])) {
		$target = $m['target'];
	} else {
		$target = "";
	}

	$msg = '';
	if ($href != '#') {
		$msg .= '<span class="menu-item';
		if ($href == $current_url) {
			$msg .= ' menu-item-selected active';
		}

		$msg .= '">';
	}
	$msg .= '<i class="fa ';

	if (isset($m['icon'])) {
		$msg .= $m['icon'];
	} else {
		if ($href == $current_url) {
			$msg .= 'fa-arrow-circle-right';
		} else {
			$msg .= 'fa-circle-o';
		}
	}
	$msg .= '"></i><span class="menu-item-text">';
	$msg .= $m['text'];
	$msg .= '</span>';
	if ($href != '#') {
		$msg .= '</span>';
	}

	if (isset($m['items']) && count($m['items']) > 0) {
		$msg .= '<i class="fa fa-angle-left pull-right"></i>';
	}

	return '<a href="' . $href . '" target="' . $target . '">' . $msg . '</a>';
}
?>

@if ( isset($redir_url) )
<script type="text/javascript">
	var redir_url = {!! json_encode($redir_url) !!}
	if ( window.location.pathname != redir_url ) {
	//	window.location = redir_url
	}
</script>
@endif
<!-- <script src="{!! $view->buildResourceSrc('resource/vender/jquery/2.2.3/jquery-2.2.3.min.js') !!}"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  $(document).ready(function(){
    $("span.active").closest('li.treeview').addClass('active');;
  });
</script>

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      @foreach($menu as $m)
      <li class="treeview">{!! buildMenuItemA($m) !!} @if (
        isset($m['items']) && count($m['items']) > 0 )
        <ul class="treeview-menu ">
          @foreach($m['items'] as $item)
          <li>{!! buildMenuItemA($item) !!}</li> @endforeach
        </ul>@endif
      </li> @endforeach
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
