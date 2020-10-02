<?php
  return[
    'main_menu_name' =>  'Data link',
    'page_name' =>  'Setting dataset',
    'btn_add_conv' => 'dataset',

    'modal_delete_title' => 'Confirm delete :"%s"',

    'conv_id' => 'dataset id',
    'download_id' => 'Download',
    'conv_name' => 'Dataset',

    'label_download_name' => 'Download name  : ',
    'label_agent_user' => 'User ageny : ',
    'label_convert_method' => 'Convert process : ',
    'label_import_method' => 'Import proxess  : ',
    'label_convert_name' => 'Set name : ',
    'parsley_convert_name' => 'Please enter fill dataset name',
    'label_data_folder' => 'Folders for file transfer and import : ',
    'parsley_data_folder' => 'Please enter fill data folder',
    'label_config_name' => 'The name of the conversion and import for the program Go : ',
    'parsley_config_name' => 'Please enter fill config name',
    'label_input_name' => 'File name used to convert data : ',
    'parsley_input_name' => 'Please enter fill File name used to convert data',
    'label_header_row' => 'Number of header lines : ',
    'parsley_header_row' => 'Please enter fill header row',
    'label_data_tag' => 'Name tag data to read value : ',
    'label_import_table' => 'The table name to be input. : ',
    'label_unique_constraint' => 'unique key table : ',
    'parsley_unique_constraint' => 'Please enter fill unique constraint',
    'label_partition_field' => 'Column name used to verify the parity. : ',
    'parsley_partition_field' => 'Please enter fill Column name used to verify the parity.',
    'label_row_validator' => 'Setting reject null of data : ',
    'label_name' => 'Column name to input data. : ',
    'label_type' => 'Field type : ',
    'label_transform_method' => 'Conversion process : ',
    'label_input_field' => 'Field input name for convert : ',
    'label_transform_param' => 'Conversion parameters : ',
    'label_table' => 'Table for  map data : ',
    'label_from' => 'Column for map data source : ',
    'label_to' => 'Column for map Destination data : ',
    'label_input_format' => 'Format date : ',
    'label_custom_date' => 'Custom format date',
    'label_add_missing' => 'Turn off the function to add station information. : ',
    'label_missing_data' => 'Automatic add : ',

    'label_download_setting_json' => 'download_setting_JSON',
    'label_convert_setting_json' => 'convert_setting_JSON',
    'label_import_setting_json' => 'import_setting_JSON',
    'label_lookup_setting_json' => 'lookup_setting_JSON',
    'label_import_table_json' => 'import_table_JSON',

    'title_display_json' => 'JSON Data',
    'btn_close' => 'Close',



    'label_config_name' => 'The name of the download used for processing Go must be English name only.',

    'tooltip_import_table' => 'Table name used to import data. Retrieve table listings only to tables that have been made partition (transaction table)',
    'tooltip_download_name' => 'The name of the download used to display the page. Thai name can be set',
    'tooltip_agent_user' => 'The user name of the unit used to download',
    'tooltip_convert_method' => 'The name of the go is transition process used to run the switch. Internal options select option extract data from table api.system_setting by field name =bof.DataIntegration.ci.ConvertScript',
    'tooltip_import_method' => 'The import process name of the go used to run the switch. Internal options select option extract data from table api.system_setting by field ',
    'tooltip_name' => 'Column name to input data. (name)',
    'tooltip_data_folder' => 'The directory used to place the downloaded file. Convert and import data, including json created from image downloads. (Directory Settings This section guides the directories from setting the middle path of the rdl.conf file to the front of the path. absolute path ได้จาก path from rdl.conf + data folder )',
    'tooltip_retry_count' => 'The default download retry setting is 3.',
    'tooltip_archive_folder' => 'Folder to place image files',
    'tooltip_result_file' => 'Json output file name obtained from image download The case is a media download.',

    'tooltip_name' => 'The file name of the download that will be used for data conversion is divided into 3 cases: 1. If archive folder and result file is not null  use  result file go in the settings menu dataset field input_name 2. IF archive folder is not null but result file is null   get "filelist.json" to push on fill setting dataset input_name 3.If archive folder  and result file is null but destination is not null   get destination to push on filtt setting dataset input_name',
    'tooltip_conv_data_folder' => 'Folder to place the files from convert',
    'tooltip_data_set' => 'Set name (convert/import) Used to display the page. Can set Thai name.้',
    'tooltip_conv_unique_constraint' => ' unique key of table is default is uk_tablename',
    'tooltip_conv_partition_field' => 'Filename date to use to break. partition Most of the time, the Phil.',
    'tooltip_conv_convert_name' => 'name of convert/import',
    'tooltip_conv_input_name' => 'Download file name The need to convert (derived from result_file / destination of the download)',
    'tooltip_conv_header_rows' => 'Number of header lines used to cross the header line for file data import. Set only if the input file is not xml or json.',
    'tooltip_conv_data_tag' => 'Name tag data to read value. Used to read tag values of the input file in case of xml or json. If no default tag name, such as json example, is available from the service, please specify /',
    'tooltip_conv_row_validator' => 'The name of the filter used to set up null option เช่น "!is_nil(wl_canal,wl_canal_date)",
  "!is_nil(wl_canal) || !is_nil(wl_canal_date)"
',

    'tooltip_input_type' => 'Type of data file contain with string int float datetime select option extract data from table ',
    'tooltip_input_name' => 'Column name of the convert',
    'tooltip_input_input_field' => 'The column name of the download file that is used as input can be input multiple if there are more than one column to use, separated.',
    'tooltip_input_transform_method' => 'Type of data file contain with string int float datetime select option Extract data from table api.system_setting by field name = bof.DataIntegration.ci.Type',
    'tooltip_input_transform_param' => 'Variable value constant or evaluate',
    'tooltip_input_table' => 'Table name used to mapping',
    'tooltip_input_from' => 'ชื่อ field Source used mapping',
    'tooltip_input_to' => 'Name field Destination used in mapping',
    'tooltip_input_input_format' => 'Format of day time Used to convert datetime',
    'tooltip_input_add_missing' => 'Enabled add_missing for transform_method mapping',
    'tooltip_input_missing_data' => 'Data filed missing_data when is JSON',
  ];
?>
