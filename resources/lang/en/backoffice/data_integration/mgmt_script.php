<?php
  return[
    'main_menu_name' =>  'Data link',
    'page_name' =>  'Download setting',
    'btn_add_script' => 'Download Setting',

    'modal_delete_title' => 'Confirm delete :"%s"',
    'status_enable' => 'Enable',
    'status_disable' => 'Disable',

    'download_id' => 'download id',
    'download_name' => 'Download name',
    'download_method' => 'Download process',
    'description' => 'Description',
    'status' => 'Status',
    'status_cron' => 'Cron Status',

    'label_download_method' => 'Download process : ',
    'parsley_download_method' => 'Please enter fill download process',
    'label_monitor_script' => 'monitor_script : ',
    'label_crontab_setting' => 'Set time crontab  : ',
	  'label_max_process' => 'Max process : ',
	  'tooltip_max_process' => 'Max process per 1 download, default = 10',
    'parsley_crontab_setting' => 'Please enter set time crontab ',
    'label_download_type' => 'download_type : ',
    'label_download_driver' => 'download_driver : ',
    'parsley_detail_host' => 'Please enter fill driver',
    'parsley_detail_host_url' => 'Please enter fill Host',
    'label_name' => 'Download name program Go : ',
    'parsley_name' => 'Please enter fill Download name program G',
    'label_download_name' => 'Download name : ',
    'parsley_download_name' => 'Please enter fill Download name',
    'label_description' => 'Description',
    'parsley_description' => 'Please enter fill Description',
    'label_agent_user' => 'Username of agency : ',
    'parsley_agent_user' => 'Please select Username of agency : ',
    'label_data_folder' => 'Folder for file download : ',
    'parsley_data_folder' => 'Please enter fill folder for file download',
    'label_retry_count' => 'Resetting the number of re-download : ',
    'parsley_retry_count' => 'Please enter fill resetting the number of re-download',
    'label_archive_folder' => 'Folder for raw media files: ',
    'parsley_archive_folder' => 'Please enter fill folder for raw media files',
    'label_result_file' => 'Json file name generated from media download : ',
    'parsley_result_file' => 'Please enter fill Json file name generated from media download',
    'label_node' => 'Node:',
    'tooltip_node' => 'Server name for download',


    'label_host' => 'Driver: ',
    'label_host_url' => 'Host: ',
    'label_username' => 'username : ',
    'label_password' => 'password : ',
    'label_timeout' => 'timeout : ',
    'label_source' => 'Source file name : ',
    'parsley_source' => 'Please enter fill source file name',
    'label_destination' => 'Destination file name  : ',
    'parsley_destination' => 'Please enter fill destination file name ',
    'label_metadata_select' => 'Metadata Select : ',

    'label_conv_metadata_script' => 'metadata script : ',
    'label_conv_convert_script' => 'convert script : ',
    'label_conv_import_script' => 'import script : ',
    'label_conv_data_folder' => 'data folder : ',
    'label_conv_import_destination' => 'import destination : ',
    'label_conv_unique_constraint' => 'unique constraint : ',
    'label_conv_partition_field' => 'partition field : ',
    'label_conv_convert_name' => 'convert name : ',
    'label_conv_input_name' => 'input name : ',
    'label_conv_header_rows' => 'header rows : ',
    'label_conv_data_tag' => 'data tag : ',
    'label_conv_row_validator' => 'row validator : ',

    'label_input_name' => 'name : ',
    'label_input_type' => 'type : ',
    'label_input_input_field' => 'input field : ',
    'label_input_transform_method' => 'transform method : ',
    'label_input_transform_param' => 'transform param : ',
    'label_input_table' => 'table : ',
    'label_input_from' => 'from : ',
    'label_input_to' => 'to : ',
    'label_input_media_subtype' => 'media subtype : ',
    'label_input_input_format' => 'input format : ',
    'label_input_add_missing' => 'add missing : ',
    'label_input_missing_data' => 'missing data : ',

    'tooltip_download_name' => 'The name of the download used to display the page.',
    'tooltip_name' => 'The name of the download used for processing Go must be English name only.',
    'tooltip_description' => 'More explanation about download details.',
    'tooltip_agent_user' => 'The user name of the unit used to download.',
    'tooltip_data_folder' => 'The directory used to place the downloaded file, including the json generated from the image download. (This directory setting directs directories from setting the middle path of the rdl.conf file to the front of the path: absolute path from path from rdl.conf + data folder)',
    'tooltip_download_method' => 'The name of the download process used to run the download. Options within the select option retrieve data from the table. Api.system_setting where field name = bof.DataIntegration.dl.DownloadScript',
    'tooltip_retry_count' => 'Re-set number of retries after the first failure. Default = 3 times,Valuable from 0-10',
    'tooltip_archive_folder' => 'ไดเรกเทอรี่ที่ใช้งนการวาง raw มีเดียไฟล์ที่ได้จากการดาวน์โหลดข้อมูล',
    'tooltip_result_file' => 'Json file name generated from media download This will contain archive folder information and file details such as last_modified file name. If it is downloaded from the service, the metadata will be provided if the default value is filelist.json.',
    'tooltip_crontab_setting' => 'Setting job time in crontab file on server',
    'tooltrip_label_host' => 'The driver method name of the download is available. Options within the select option retrieve data from the table. Api.system_setting where field name = bof.DataIntegration.dl.DownloadDriver',
    'tooltrip_host_url' => 'Url or ftp host name used for downloading as http://thaiwater.net?timeout=10  The use of ftp must be specified in the following format  ftp://user:password@servername (If the password is a special character, the urlencode must be preceded by: # = %23
                            parameter Can be used with setting after mark?่
                            1) timeout Setting download timeout if it can not connect. The default is 30 seconds.
                            2) datare Used to download data from the service HAII.  To find the json tag name matching the pattern you want to use regular expression  But the specified message must have urlencode first as ^ is %5E or %24 คือ $ มี driver method Can be used as follows: cpy swan haiipic2 swat
                            3) subject apply to download on email The driver method is imap if the subject is text in Thai. The urlencode must be made before
                            4) current=now Used to download data from the Haii service that sent the parameter year, month, day, time. The current value is retrieved from the current date and time. (system date)
                            5) year=xxxx&month=xx&day=xx&time=xx Used to download data from HAII services. parameter year,month,day,time
                            6) extype It is used to determine the type of download in the web extract group. There is a driver method that can be used as webext or webextdata.
                            7) wind=upper_wind|upper_pressure&speed=5.0km|0.6km|1.5km It is used to download data from the HAII service with a json of 2 levels: WRF-ROMS Data Model: Forecast, Atmospheric, and Wind Data. Need to find a json tag name of wind or air pressure information and 3 different wind speeds.
',

    'tooltip_username' => 'Use if the download requires a username.',
    'tooltip_password' => 'Use if the download requires a password.',
    'tooltip_timeout' => 'Use if the download requires a username.',
    'tooltip_source' => 'Document filename to be used for download from source. Specify a filename with an extension like filelist.json.',
    'tooltip_destination' => 'Naming destination files when downloading successfully.
                               For non-media downloads, use the input file (input name :).
                               Of the steps to set up the dataset, in the case of a media download.
                               If no value is specified, the default value is filelist.json and is used.
                               The input file (input name :) of the dataset setup process. ',

    'tooltip_conv_data_folder' => 'The folder used to place the files from the convert.',
    'tooltip_conv_unique_constraint' => 'Unique table name',
    'tooltip_conv_partition_field' => 'Filename date to use to break partition',
    'tooltip_conv_convert_name' => 'The name of  convert/import',
    'tooltip_conv_input_name' => 'Download file name The need to convert (derived from result_file / destination of the download)',
    'tooltip_conv_header_rows' => 'The number of lines of text file that you want to skip.',
    'tooltip_conv_data_tag' => 'xml/json tag Used to read the value',
    'tooltip_conv_row_validator' => 'The name of the filter used to set up null option',

    'tooltip_input_name' => 'Column name of convert',
    'tooltip_input_input_field' => 'The column name of the download file that is used as input can be input multiple if there are more than one column to use, separated.',
    'tooltip_input_transform_param' => 'Variable value constant',
    'tooltip_input_input_format' => 'Format of day time Used to convert datetime',
    'tooltip_input_missing_data' => 'Data of filed missing_data case is JSON',
  ];
?>
