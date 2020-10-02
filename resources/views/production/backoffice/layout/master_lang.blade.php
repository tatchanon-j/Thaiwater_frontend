<?php
  $l = \App\Helpers\LocaleHelper::getInstance();
  $lang = $l->getAllLocales();
  $getLocal = $l->getLocale();
?>

<script>
  // Multi langauges on system
  var lang =  <?php echo json_encode($lang);?>;
  console.log(lang);
  // Langauge for display data on page
  var getLocal = <?php echo json_encode($getLocal); ?>;
  console.log(getLocal);

  // Langauge for use in javascript.
  var group_Translator = {

    // Modal and buttons.
    'btn_save' : '{{ trans("/master.btn_save") }}',
    'btn_cancel' : '{{ trans("/master.btn_cancel") }}',
    'btn_confirm' : '{{ trans("/master.btn_confirm") }}',
    'btn_delete' : '{{ trans("/master.btn_delete") }}',
    'btn_edit' : '{{ trans("/master.btn_edit") }}',
    'btn_display' : '{{ trans("/master.btn_display") }}',
    'btn_close' : '{{ trans("/master.btn_close") }}',
    'color' : '{{ trans("/master.color") }}',
    'tag_color' : '{{ trans("/master.tag_color") }}',
    'btn_event_notification' : '{{ trans("/master.btn_event_notification") }}',
    'title_add_event_notification' : '{{ trans("/master.title_add_event_notification") }}',
    'title_edit_event_notification' : '{{ trans("/master.title_edit_event_notification") }}',
    'auto_close' : '{{ trans("/master.auto_close") }}',
    'admin_close' : '{{ trans("/master.admin_close") }}',
    'msg_title_error' : '{{ trans("/master.msg_title_error") }}',
    'bowser_no_support' : '{{ trans("/master.bowser_no_support") }}',
    'over_max_file_size' : '{{ trans("/master.over_max_file_size") }}',
    'btn_data_mstake_detail' : '{{ trans("/master.btn_data_mstake_detail") }}',
    'title_btn_run_cron' : '{{ trans("/master.title_btn_run_cron") }}',
    'title_btn_stop_cron' : '{{ trans("/master.title_btn_stop_cron") }}',

    //dropdown
    'select_all' : '{{ trans("/master.select_all") }}',
    'all_selected' : '{{ trans("/master.all_selected") }}',
    'none_selected' : '{{ trans("/master.none_selected") }}',
    'search' : '{{ trans("/master.search") }}',
    'selected_all' : '{{ trans("/master.selected_all") }}',
    'msg_display_all' : '{{ trans("/master.msg_display_all") }}',
    'msg_filter_required' : '{{ trans("/master.msg_filter_required") }}',

    // Table
    'col_order' : '{{ trans("/master.col_order") }}',
    'col_edit_del' : '{{ trans("/master.col_edit_del") }}',
    'col_edit' : '{{ trans("/master.col_edit") }}',
    'col_date' : '{{ trans("/master.col_date") }}',
    'col_datetime' : '{{ trans("/master.col_datetime") }}',
    'col_selectedall' : '{{ trans("/master.col_selectedall") }}',
  	'col_dam_storage' : '{{ trans("/master.col_dam_storage") }}',
  	'col_rainfall_24h' : '{{ trans("/master.col_rainfall_24h") }}',
  	'col_waterlevel_msl' : '{{ trans("/master.col_waterlevel_msl") }}',
  	'col_salinity' : '{{ trans("/master.col_salinity") }}',
  	'col_value' : '{{ trans("/master.col_value") }}',


    //Tooltip
    'msg_copy' : '{{ trans("/master.msg_copy") }}',
    'not_edit_remove' : '{{ trans("/backoffice/data_integration/cron_setting.not_edit_remove") }}',

    //Message error in form
    'msg_err_require_pass' : '{{ trans("/master.msg_err_require_pass") }}',
    'msg_err_require' : '{{ trans("/master.msg_err_require") }}',
    'msg_err_value_between_1_10' : '{{ trans("/master.msg_err_value_between_1_10") }}',
    'msg_error_not_json_format' : '{{ trans("/master.msg_error_not_json_format") }}',

    //Message alert error
    'msg_redownload_con' : '{{ trans("/master.msg_redownload_con") }}',
    'msg_select_delete' : '{{ trans("/master.msg_select_delete") }}',
    'msg_unselected_data' : '{{ trans("/master.msg_unselected_data") }}',
    'msg_err_require_number' : '{{ trans("/master.msg_err_require_number") }}',
    'msg_err_require_filter' : '{{ trans("/master.msg_err_require_filter") }}',
    'msg_err_event_is_null' : '{{ trans("/master.msg_err_event_is_null") }}',
    'msg_err_date_over_range' : '{{ trans("/master.msg_err_date_over_range") }}',
    'msg_stdate_over_endate' : '{{ trans("/master.msg_stdate_over_endate") }}',
    'msg_err_filter_time' : '{{ trans("/master.msg_err_filter_time") }}',
    'msg_err_data_null' : '{{ trans("/master.msg_err_data_null") }}',
    'msg_err_no_ignore' : '{{ trans("/master.msg_err_no_ignore") }}',
    'msg_err_no_uignore' : '{{ trans("/master.msg_err_no_unignore") }}',
    'msg_import_success' : '{{ trans("/master.msg_import_success") }}',


    // Message alert confirm
    'msg_delete_con' : '{{ trans("/master.msg_delete_con") }}',
    'msg_reconvert_con' : '{{ trans("/master.msg_reconvert_con") }}',
    'msg_delete_cons' : '{{ trans("/master.msg_delete_cons") }}',
    'msg_delete_key_con' : '{{ trans("/master.msg_delete_key_con") }}',
    'msg_regen_key_con' : '{{ trans("/master.msg_regen_key_con") }}',
    'msg_regen_cache_con' : '{{ trans("/master.msg_regen_cache_con") }}',
    'msg_con_run' : '{{ trans("/master.msg_con_run") }}',
    'msg_con_pause' : '{{ trans("/master.msg_con_pause") }}',
    'msg_con_delete_partition' : '{{ trans("/master.msg_con_delete_partition") }}',
    'msg_con_copy' : '{{ trans("/master.msg_con_copy") }}',
    'msg_process' : '{{ trans("/master.msg_process") }}',
    'msg_gen_key_con' : '{{ trans("/master.msg_gen_key_con") }}',
    'msg_del_key_con' : '{{ trans("/master.msg_del_key_con") }}',

    // Message alert process fail
    'msg_redownload_unsuc' : '{{ trans("/master.msg_redownload_unsuc") }}',
    'msg_reconvert_unsuc' : '{{ trans("/master.msg_reconvert_unsuc") }}',
    'msg_delete_unsuc' : '{{ trans("/master.msg_delete_unsuc") }}',
    'msg_delete_unsuc_relate' : '{{ trans("/master.msg_delete_unsuc_relate") }}',
    'msg_save_unsuc' : '{{ trans("/master.msg_save_unsuc") }}',
    'msg_edit_unsuc' : '{{ trans("/master.msg_edit_unsuc") }}',
    'msg_duplicate_eventcode' : '{{ trans("/master.msg_duplicate_eventcode") }}',
    'msg_duplicate_username' : '{{ trans("/master.msg_duplicate_username") }}',
    'msg_run_unsuc' : '{{ trans("/master.msg_run_unsuc") }}',
    'msg_pause_unsuc' : '{{ trans("/master.msg_pause_unsuc") }}',
    'msg_create_partition_unsuc' : '{{ trans("/master.msg_create_partition_unsuc") }}',
    'msg_delte_partition_unsuc' : '{{ trans("/master.msg_delte_partition_unsuc") }}',
    'msg_copy_unsuc' : '{{ trans("/master.msg_copy_unsuc") }}',
    'msg_process_unsuc' : '{{ trans("/master.msg_process_unsuc") }}',
    'msg_cannot_to_generate_key' : '{{ trans("/backoffice/apis/key_access_mgmt.msg_cannot_to_generate_key")}}',
    'msg_regenerate_cache_fail' : '{{ trans("/master.msg_regenerate_cache_fail") }}',
    'msg_save_unsuccess' : '{{ trans("/master.msg_save_unsuccess") }}',
    'msg_stop_unsuc' : '{{ trans("/master.msg_stop_unsuc") }}',


    // Message alert process success
    'msg_redownload_suc' : '{{ trans("/master.msg_redownload_suc") }}',
    'msg_reconvert_suc' : '{{ trans("/master.msg_reconvert_suc") }}',
    'msg_delete_suc' : '{{ trans("/master.msg_delete_suc") }}',
    'msg_save_suc' : '{{ trans("/master.msg_save_suc") }}',
    'msg_edit_suc' : '{{ trans("/master.msg_edit_suc") }}',
    'msg_run_suc' : '{{ trans("/master.msg_run_suc") }}',
    'msg_pause_suc' : '{{ trans("/master.msg_pause_suc") }}',
    'msg_create_partition_suc' : '{{ trans("/master.msg_create_partition_suc") }}',
    'msg_delte_partition_suc' : '{{ trans("/master.msg_delte_partition_suc") }}',
    'msg_copy_suc' : '{{ trans("/master.msg_copy_suc") }}',
    'msg_process_suc' : '{{ trans("/master.msg_process_suc") }}',
    'msg_generate_key_success' : '{{ trans("/backoffice/apis/key_access_mgmt.msg_generate_key_success") }}',
    'msg_regenerate_cache_success' : '{{ trans("/master.msg_regenerate_cache_success") }}',
    'msg_stop_suc' : '{{ trans("/master.msg_stop_suc") }}',

    // label
    'untitle' : '{{ trans("/master.untitle") }}',
    'agency' : '{{ trans("/master.agency") }}',
    'amount' : '{{ trans("/master.amount") }}',
    'imported' : '{{ trans("/master.imported") }}',
    'approximately' : '{{ trans("/master.approximately") }}',
    'day' : '{{ trans("/master.day") }}',
    'title_subevent' : '{{ trans("/master.title_subevent") }}',
    'title_agency' : '{{ trans("/master.title_agency") }}',
    'month' : '{{ trans("/master.month") }}',
    'jan' : '{{ trans("/master.jan.") }}',
    'feb' : '{{ trans("/master.feb.") }}',
    'mar' : '{{ trans("/master.mar.") }}',
    'apr' : '{{ trans("/master.apr.") }}',
    'may' : '{{ trans("/master.may.") }}',
    'june' : '{{ trans("/master.jun.") }}',
    'july' : '{{ trans("/master.jul.") }}',
    'aug' : '{{ trans("/master.aug.") }}',
    'sept' : '{{ trans("/master.sept.") }}',
    'oct' : '{{ trans("/master.oct.") }}',
    'nov' : '{{ trans("/master.nov.") }}',
    'dec' : '{{ trans("/master.dec.") }}',
    'noname' : '{{ trans("/master.noname") }}',
    'no_agency' : '{{ trans("/master.no_agency") }}',
    'none_agency' : '{{ trans("/master.none_agency") }}',
    'download_csv' : '{{ trans("/master.download_csv") }}',
    'notification_to_mail' : '{{ trans("/master.notification_to_mail") }}',
    'not_notification' : '{{ trans("/master.not_notification") }}',
    'data_not_found' : '{{ trans("/master.data_not_found") }}',
    'short_name' : '{{ trans("/master.short_name") }}',
    'list' : '{{ trans("/master.list") }}',
    'import_data_percent' : '{{ trans("/master.import_data_percent") }}',

    'number_file_import' : '{{ trans("/master.number_file_import") }}',
    'number_data_import' : '{{ trans("/master.number_data_import") }}',
    'ratio_import_data' : '{{ trans("/master.ratio_import_data") }}',

    'seconds' : '{{ trans("/master.seconds") }}',

    'col_event' : '{{ trans("/master.col_event") }}',
    'col_subevent' : '{{ trans("/master.col_subevent") }}',
    'col_amount' : '{{ trans("/master.col_amount") }}',
    'col_detail' : '{{ trans("/master.col_detail") }}',
    'col_total' : '{{ trans("/master.col_total") }}',
    'col_page_allpage' : '{{ trans("/master.col_page_allpage") }}',

    'col_metadata' : '{{ trans("/backoffice/metadata/summary_meta.col_metadata") }}',
    'col_record_number' : '{{ trans("/backoffice/metadata/summary_meta.col_record_number") }}',
    'col_latest_date' : '{{ trans("/backoffice/metadata/summary_meta.col_latest_date") }}',
    'label_list' : '{{ trans("/master.label_list") }}',


    /* The Languages on main menu. */

    //metadata
    'title_add_dataformat'  : '{{ trans("backoffice/metadata/data_format.title_add_dataformat") }}',
    'title_edit_dataformat'  : '{{ trans("backoffice/metadata/data_format.title_edit_dataformat") }}',
    'btn_add_dataformat' : '{{ trans("backoffice/metadata/data_format.btn_add_dataformat") }}',
    'msg_err_date_over_range' : '{{ trans("master.msg_err_date_over_range") }}',
    'msg_stdate_over_endate' : '{{ trans("master.msg_stdate_over_endate") }}',
    'msg_err_filter_time' : '{{ trans("master.msg_err_filter_time") }}',
    'method_page_name' : '{{ trans("/backoffice/metadata/method.page_name") }}',
    'add_method' : '{{ trans("/backoffice/metadata/method.add_method") }}',
    'edit_method' : '{{ trans("/backoffice/metadata/method.edit_method") }}',
    'btn_add_metadata_status' : '{{ trans("/backoffice/metadata/metadata_status.page_name") }}',
    'add_metadata_status' : '{{ trans("/backoffice/metadata/metadata_status.add_metadata_status") }}',
    'edit_metadata_status' : '{{ trans("/backoffice/metadata/metadata_status.edit_metadata_status") }}',

    'title_add_agency' : '{{ trans("/backoffice/metadata/agency.title_add_agency") }}',
    'title_edit_agency' : '{{ trans("/backoffice/metadata/agency.title_edit_agency") }}',
    'btn_add_agency' : '{{ trans("/backoffice/metadata/agency.page_name") }}',

    'label_category' : '{{ trans("/backoffice/metadata/category.label_category") }}',
    'title_add_category' : '{{ trans("/backoffice/metadata/category.title_add_category") }}',
    'title_edit_category' : '{{ trans("/backoffice/metadata/category.title_edit_category") }}',

    'btn_add_dataformat' : '{{ trans("/backoffice/metadata/data_format.btn_add_dataformat")}}',
    'btn_add_frequency' : '{{ trans("/backoffice/metadata/frequency.btn_add_frequency")}}',
    'title_add_frequency' : '{{ trans("/backoffice/metadata/frequency.title_add_frequency")}}',
    'title_edit_frequency' : '{{ trans("/backoffice/metadata/frequency.title_edit_frequency")}}',


    'btn_add_hydro' : '{{ trans("/backoffice/metadata/hydroinfo.btn_add_hydro")}}',
    'label_number' : '{{ trans("/backoffice/metadata/hydroinfo.col_number")}}',
    'label_hydroinfo' : '{{ trans("/backoffice/metadata/hydroinfo.label_hydroinfo")}}',
    'lavel_agency' : '{{ trans("/backoffice/metadata/hydroinfo.lavel_agency")}}',
    'title_add_hydroinfo' : '{{ trans("/backoffice/metadata/hydroinfo.title_add_hydroinfo")}}',
    'title_edit_hydroinfo' : '{{ trans("/backoffice/metadata/hydroinfo.title_edit_hydroinfo")}}',

    'btn_add_ministry' : '{{ trans("/backoffice/metadata/ministry.btn_add_ministry")}}',
    'label_ministry' : '{{ trans("/backoffice/metadata/ministry.label_ministry")}}',
    'add_ministry' : '{{ trans("/backoffice/metadata/ministry.add_ministry")}}',
    'edit_ministry' : '{{ trans("/backoffice/metadata/ministry.edit_ministry")}}',

    'btn_add_service_method' : '{{ trans("/backoffice/metadata/service_method.btn_add_service_method")}}',
    'title_add_service_method' : '{{ trans("/backoffice/metadata/service_method.title_add_service_method")}}',
    'title_edit_service_method' : '{{ trans("/backoffice/metadata/service_method.title_edit_service_method")}}',

    'btn_add_subcat' : '{{ trans("/backoffice/metadata/subcat.btn_add_subcat")}}',
    'title_add_subcat' : '{{ trans("/backoffice/metadata/subcat.title_add_subcat")}}',
    'title_edit_subcat' : '{{ trans("/backoffice/metadata/subcat.title_edit_subcat")}}',
    'label_subcat' : '{{ trans("/backoffice/metadata/subcat.label_subcat")}}',

    'btn_add_unit' : '{{ trans("/backoffice/metadata/unit.btn_add_unit")}}',
    'title_add_unit' : '{{ trans("/backoffice/metadata/unit.title_add_unit")}}',
    'title_edit_unit' : '{{ trans("/backoffice/metadata/unit.title_edit_unit")}}',
    'label_unit' : '{{ trans("/backoffice/metadata/unit.label_unit")}}',

    'label_summay_meta' : '{{ trans("/backoffice/metadata/summary_meta.label_summay_meta")}}',
    'label_display_all_agent' : '{{ trans("/backoffice/metadata/summary_meta.label_display_all_agent")}}',
    'label_amount_metadata' : '{{ trans("/backoffice/metadata/summary_meta.label_amount_metadata")}}',
    'label_all_metadata' : '{{ trans("/backoffice/metadata/summary_meta.label_all_metadata")}}',
    'label_summary_metadata' : '{{ trans("/backoffice/metadata/summary_meta.label_summary_metadata")}}',



    // Event Management
    'page_name_event_type' : '{{ trans("/backoffice/event_management/event_type.page_name") }}',
    'add_event_type' : '{{ trans("/backoffice/event_management/event_type.add_event_type") }}',
    'edit_event_type' : '{{ trans("/backoffice/event_management/event_type.edit_event_type") }}',

    'page_name_event_subtype' : '{{ trans("/backoffice/event_management/event_subtype.page_name") }}',
    'title_add_event_subtype' : '{{ trans("/backoffice/event_management/event_subtype.title_add_event_subtype") }}',
    'title_edit_event_subtype' : '{{ trans("/backoffice/event_management/event_subtype.title_edit_event_subtype") }}',
    'event_code' : '{{ trans("/backoffice/event_management/event_subtype.event_code") }}',

    'btn_add_event_method' : '{{ trans("/backoffice/event_management/event_method.btn_add_event_method") }}',
    'add_event_method' : '{{ trans("/backoffice/event_management/event_method.add_event_method") }}',
    'edit_event_method' : '{{ trans("/backoffice/event_management/event_method.edit_event_method") }}',
    'msg_err_filter_null' : '{{ trans("/backoffice/event_management/event_method.msg_err_filter_null") }}',

    'btn_add_event_event_log_sink_method_type' : '{{ trans("/backoffice/event_management/event_log_sink_method_type.btn_add_event_event_log_sink_method_type") }}',
    'edit_event_event_log_sink_method_type' : '{{ trans("/backoffice/event_management/event_log_sink_method_type.edit_event_event_log_sink_method_type") }}',
    'add_event_event_log_sink_method_type' : '{{ trans("/backoffice/event_management/event_log_sink_method_type.add_event_event_log_sink_method_type") }}',

    'btn_add_event_mgmt_email_sever' : '{{ trans("/backoffice/event_management/event_mgmt_email_sever.btn_add_event_mgmt_email_sever") }}',
    'add_event_mgmt_email_sever' : '{{ trans("/backoffice/event_management/event_mgmt_email_sever.add_event_mgmt_email_sever") }}',
    'edit_event_mgmt_email_sever' : '{{ trans("/backoffice/event_management/event_mgmt_email_sever.edit_event_mgmt_email_sever") }}',

    'add_event_target' : '{{ trans("/backoffice/event_management/event_target.add_event_target") }}',
    'edit_event_target' : '{{ trans("/backoffice/event_management/event_target.edit_event_target") }}',

    'event_mail_page_name' :  '{{ trans("/backoffice/event_management/event_mail.page_name") }}',
    'add_event_mail' : '{{ trans("/backoffice/event_management/event_mail.add_event_mail") }}',
    'edit_event_mail' : '{{ trans("/backoffice/event_management/event_mail.edit_event_mail") }}',

    'btn_add_sink_condition' : '{{ trans("/backoffice/event_management/sink_condition.btn_add_sink_condition") }}',
    'tite_add_sink_condition' : '{{ trans("/backoffice/event_management/sink_condition.title_add_sinkcondition") }}',
    'tite_edit_sink_condition' : '{{ trans("/backoffice/event_management/sink_condition.title_edit_sinkcondition") }}',
    'btn_event_target' : '{{ trans("/backoffice/event_management/event_target.btn_event_target") }}',


    // Dataintegration Report
    'title_chart' : '{{ trans("/backoffice/data_integration_report/report_event.title_chart") }}',
    'msg_import_per_day' : '{{ trans("/backoffice/data_integration_report/report_import_by_date.msg_import_per_day") }}',
    'import_data_number' : '{{ trans("/master.import_data_number") }}',
    'col_storage' : '{{ trans("/backoffice/data_integration_report/report_import_by_month.col_storage") }}',
    'col_import_percent' : '{{ trans("/backoffice/data_integration_report/report_import_by_year.col_import_percent") }}',

    //Datamanagement
    'btn_edit_event' : '{{ trans("/backoffice/data_management/record_data.btn_edit_event") }}',
    'btn_mistake_send_data' : '{{ trans("/backoffice/data_management/record_error_data.btn_mistake_send_data") }}',

    // Dataintegration
    'btn_add_mgmt_metadata_rain' : '{{ trans("/backoffice/data_integration/mgmt_metadata_rain.btn_add") }}',
    'title_add_metadata' : '{{ trans("/backoffice/data_integration/mgmt_metadata_rain.title_add_metadata") }}',
    'title_edit_metadata' : '{{ trans("/backoffice/data_integration/mgmt_metadata_rain.title_edit_metadata") }}',


    //Sink condition
    'title_edit_sinkcondition' : '{{ trans("/backoffice/event_management/sink_condition.title_edit_sinkcondition") }}',

    //data_integration/hi_script
    'msg_con_replay' : '{{ trans("/backoffice/data_integration/hi_script.msg_con_replay") }}',

    //apiService
    'msg_add_key_access' : '{{ trans("/backoffice/apis/key_access_mgmt.msg_add_key_access") }}',
    'msg_edit_key_access' : '{{ trans("/backoffice/apis/key_access_mgmt.msg_edit_key_access") }}',


    //Database management
    'msg_partition_year' : '{{ trans("master.msg_partition_year") }}',
    'btn_delete_data' : '{{ trans("/backoffice/dba/delete_data.btn_delete_data") }}',


    //Management display_setting
    'msg_err_json_format' : '{{ trans("/backoffice/tools/mgmt_display.msg_err_json_format") }}',

    //Hight chart
    'tooltip_percent' : '{{ trans("/master.percent") }}',

    //dash board
    'title_piegraph' : '{{ trans("/backoffice/dashboard.title_piegraph")}}'
    }
</script>
