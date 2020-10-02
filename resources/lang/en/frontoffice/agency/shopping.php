<?php
    return [
        'page_name' => 'Summary of linked entities',

        'metadata' => ' All metadata %s list ',
        'metadata_status_connect' => 'Link %s list ',
        'metadata_status_wait_update' => 'Wait for the agency to update the information %s list ',
        'metadata_status_wait_connect' => 'Wait link %s list ',
        'dataservice' => 'Information service %s time ',

        'col_name' => 'data',
        'col_frequency' => 'frquency',
        'col_agency_name' => 'agency',
        'col_agency_count' => 'amount (time)',
        'tr_metadata_status_connect' => 'List of linked data accounts',
        'tr_metadata_status_wait_update' => 'Account information waiting for the data update agency',
        'tr_metadata_status_wait_connect' => 'List of pending information accounts',
        'tr_metadata_status_cancel' => 'Canceled entry',
        'tr_metadata_dataservice' => 'Number of requests (time) Classified by agency',

        'col_id' => 'Request ID',
        'col_user_name' => 'Name of Applicant',
        'col_metadata_name' => 'data name',
        'col_service' => 'data type',
        'col_create' => 'Date of application year',
        'col_result_date' => 'Date of birth',
        'col_result' => 'Request for information',

        'result_AP' => 'approve',
        'result_DA' => 'not allowed',

        'tbConfig' => [
            // master
            'tele_station_name' => 'station name',
            'oldcode' => 'old code',
            'datetime' => 'date-time',
            'date' => 'date',
            'agency_id' => 'agency code',
            'remark' => 'remark', // crosssection, flood_situation, geohazard_remark
            'water_level_msl' => 'water lavel', // crosssection
            'comm_status' => 'Measurement status', // canal_waterlevel, ford_waterlevel
            'qc_status' => 'Status of data quality inspection', // dam_daily, dam_hourly, ford_waterlevel
            'station_type' => 'Type of station',
            'lat' => 'latitude',
            'long' => 'longitude',

            // air
            'air_so2' => 'Sulfur dioxide gas',
            'air_no2' => 'Nitrogen dioxide gas',
            'air_co' => 'Carbon monoxide',
            'air_o3' => 'Ozone',
            'air_pm10' => 'Particle size not more than 10 microns',
            'air_pm25' => 'Dust not more than 2.5 microns',
            'air_aqi' => 'Air quality index',
            // canal_waterlevel
            'canal_waterlevel_value' => 'Water level in the canal',
            // crosssection
            'section_location' => 'location',
            'point_id' => 'The position of the river point',
            'section_lat' => 'Latitude of measurement',
            'section_long' => 'Longitude of measurement',
            'distance' => 'distance',
            // dam_daily, dam_hourly
            'dam_name' => 'Dam',
            'dam_level' => 'Water level',
            'dam_storage' => 'Water retention',
            'dam_inflow' => 'The amount of water flowing into the sink',
            'dam_released' => 'Amount of drainage through the machine',
            'dam_spilled' => 'Volume of drainage through overflow',
            'dam_losses' => 'Wasted water',
            'dam_evap' => 'Volatile water content',
            'dam_uses_water' => 'Amount of water available',
            'dam_storage_percent' => 'Volume of water',
            'dam_uses_water_percent' => 'Volume of running water',
            'dam_inflow_avg' => 'The volume of water flowing into the reservoir from the beginning of the year.',
            'dam_released_acc' => 'Volume of drainage water accumulated since the beginning of the year.',
            'dam_inflow_acc' => 'Volume of water flowing into the reservoir averages all year.',
            'dam_inflow_acc_percent' => 'The volume of water flowing into the reservoir averages all year.',
            // flood_situation
            'flood_name' => 'Name of water situation',
            'flood_link' => 'Links show water situation.',
            'flood_description' => 'Water situation details',
            // floodforecast
            'floodforecast_value' => 'Flood forecast data from the water level.',
            // ford_waterlevel
            'ford_waterlevel_value' => 'Water level on the road',
            // geohazard_situation
            'geohazard_name' => 'Name of catastrophic situation',
            'geohazard_link' => 'Links to the disaster scene.',
            'geohazard_description' => 'Disaster Situation Details',
            'geohazard_author' => 'Reporter',
            'geohazard_colorlevel' => 'Color level of disaster criterion',
            // humid
            'humid_value' => 'Relative humidity',
            // m_air_station
            'air_station_type' => 'Type of air meter',
            // medium_dam
            'mediumdam_storage' => 'Water retention',
            'mediumdam_inflow' => 'The amount of water flowing into the sink',
            'mediumdam_released' => 'The amount of water flowing into the sink',
            // pressure
            'pressure_value' => 'Air pressure',
            // rainfall
            'rainfall5m' => 'Rainfall every 5 minutes',
            'rainfall10m' => 'Rainfall every 10 minutesี',
            'rainfall15m' => 'Rainfall every 15 minutes',
            'rainfall30m' => 'Rainfall every 20 minutes',
            'rainfall1h' => 'Rainfall every 1 hour',
            'rainfall3h' => 'Rainfall every 3 hour',
            'rainfall6h' => 'Rainfall every 6 hour',
            'rainfall12h' => 'Rainfall every 12 hour',
            'rainfall24h' => 'Rainfall every 24 hour',
            'rainfall_acc' => 'Accumulated rain',
            // rainfall_daily
            'rainfall_value' => 'Rainfall',
            // rainforecast
            'rainforecast_value' => 'Rain forecast',
            'rainforecast_level' => 'Criteria of forecast',
            'rainforecast_leveltext' => 'Criteria for forecasting',
            // soilmoisture
            'soil_value' => 'Moisture content in soil',
            // solar
            'solar_value' => 'Light intensity',
            // swan
            'swan_depth' => 'Wave depth forecast information',
            'swan_highsig' => 'Wave Height Prediction Information',
            'swan_direction' => 'Wave prediction information',
            'swan_period_top' => 'Highest wave period forecast data',
            'swan_period_average' => 'Average wave period forecast data',
            'swan_windx' => 'Wind vector forecasts in the east and west.',
            'swan_windy' => 'Wind vector forecasts in the south and south.',
            // tele_waterlevel
            'waterlevel_m' => 'waterlevel_m',
            'waterlevel_msl' => 'Water level',
            'waterlevel_in' => 'waterlevel_in',
            'waterlevel_out' => 'waterlevel_out',
            'waterlevel_out2' => 'waterlevel_out2',
            'flow_rate' => 'flow_rate',
            'discharge' => 'Drainage volume',
            'pump_on' => 'Number of active pumps',
            'floodgate_open' => 'Number of floodgate open',
            'floodgate_height' => 'The height of the floodgate',
            // temperature
            'temp_value' => 'Temperature value',
            // temperature_daily
            'maxtemperature' => 'Maximum temperature',
            'diffmaxtemperature' => 'Maximum temperature difference',
            'mintemperature' => 'Lowest temperature value',
            'diffmintemperature' => 'Difference in minimum temperature difference',
            // water_resource
            'water_resource_oldcode' => 'Community water source code',
            'projectname' => 'Project Name',
            'projecttype' => 'activities',
            'fiscal_year' => 'fiscal year',
            'mooban' => 'village',
            'coordination' => 'Project location',
            'benefit_household' => 'Household benefit',
            'benefit_area' => 'Area of benefit',
            'capacity' => 'capacity',
            'standard_cost' => 'Budget',
            'budget' => 'Expenses',
            'contract_signdate' => 'Date of signing contract',
            'contract_enddate' => 'Contract expiration date',
            'rec_date' => 'Date of recording',
            // waterquality
            'waterquality_do' => 'Dissolved oxygen in water',
            'waterquality_ph' => 'Acid-base',
            'waterquality_temp' => 'Water temperature',
            'waterquality_turbid' => 'Turbidity in water',
            'waterquality_bod' => 'Organic matter',
            'waterquality_tcb' => 'Total amount of bacteria in coliform',
            'waterquality_fcb' => 'The amount of bacteria in the form of chloroform.',
            'waterquality_nh3n' => 'Ammonia - nitrogen',
            'waterquality_wqi' => 'Score range WQI',
            'waterquality_ammonium' => 'Ammonium',
            'waterquality_nitrate' => 'Nitric acid',
            'waterquality_colorstatus' => 'Color status',
            'waterquality_status' => 'Status of water quality',
            'waterquality_salinity' => 'Salinity',
            'waterquality_conductivity' => 'Conductivity in water',
            'waterquality_tds' => '-tds',
            'waterquality_chlorophyll' => 'chlorophyll',
            // weather_forecast
            'overall_forcast' => 'Weather Forecast Overview',
            'region_forcast' => 'Region Weather Forecast',
            // wind
            'wind_speed' => 'Wind speed value',
            'wind_dir_value' => 'The degrees of wind direction',
            'wind_dir' => 'wind direction',
        ],
    ];
?>
