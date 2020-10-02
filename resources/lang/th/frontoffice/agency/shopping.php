<?php
    return [
        'page_name' => 'สรุปข้อมูลหน่วยงานที่เชื่อมโยง',

        'metadata' => ' บัญชีข้อมูลทั้งหมด %s รายการ ',
        'metadata_status_connect' => 'เชื่อมโยง %s รายการ ',
        'metadata_status_wait_update' => 'รอหน่วยงานปรับปรุงข้อมูล %s รายการ ',
        'metadata_status_wait_connect' => 'รอการเชื่อมโยง %s รายการ ',
        'dataservice' => 'ให้บริการข้อมูล %s ครั้ง ',

        'col_name' => 'ชื่อข้อมูล',
        'col_frequency' => 'ความถี่',
        'col_agency_name' => 'ชื่อหน่วยงาน',
        'col_agency_count' => 'จำนวน (ครั้ง)',
        'tr_metadata_status_connect' => 'รายการบัญชีข้อมูลที่เชื่อมโยง',
        'tr_metadata_status_wait_update' => 'รายการบัญชีข้อมูลที่รอหน่วยงานปรับปรุงข้อมูล',
        'tr_metadata_status_wait_connect' => 'รายการบัญชีข้อมูลที่รอการเชื่อมโยง',
        'tr_metadata_status_cancel' => 'รายการบัญชีข้อมูลที่ยกเลิก',
        'tr_metadata_dataservice' => 'จำนวนการที่ขอใช้บริการข้อมูล (ครั้ง) จำแนกรายหน่วยงาน',

        'col_id' => 'รหัสคำขอ',
        'col_user_name' => 'ชื่อผู้ขอข้อมูล',
        'col_metadata_name' => 'ชื่อข้อมูล',
        'col_service' => 'ประเภทการรับ',
        'col_create' => 'วันเดือนปีที่ยื่นคำขอ',
        'col_result_date' => 'วันเดือนปีที่แจ้งผล',
        'col_result' => 'ผลคำขอข้อมูล',

        'result_AP' => 'อนุมัติ',
        'result_DA' => 'ไม่อนุมัติ',

        'tbConfig' => [
            // master
            'tele_station_name' => 'ชื่อสถานี',
            'oldcode' => 'รหัสเดิม',
            'datetime' => 'วัน-เวลา',
            'date' => 'วันที่',
            'agency_id' => 'รหัสหน่วยงาน',
            'remark' => 'หมายเหตุ', // crosssection, flood_situation, geohazard_remark
            'water_level_msl' => 'ระดับน้ำ', // crosssection
            'comm_status' => 'สถานะของเครื่องวัด', // canal_waterlevel, ford_waterlevel
            'qc_status' => 'สถานะของการตรวจคุณภาพข้อมูล', // dam_daily, dam_hourly, ford_waterlevel
            'station_type' => 'ชนิดของสถานี',
            'lat' => 'ละติจูด',
            'long' => 'ลองจิจูด',

            // air
            'air_so2' => 'ก๊าซซัลเฟอร์ไดออกไซด์',
            'air_no2' => 'ก๊าซไนโตรเจนไดออกไซด์',
            'air_co' => 'ก๊าซคาร์บอนมอนนอกไซด์',
            'air_o3' => 'ก๊าซโอโซน',
            'air_pm10' => 'ฝุ่นละอองขนาดไม่เกิน 10 ไมครอน',
            'air_pm25' => 'ฝุ่นละอองขนาดไม่เกิน 2.5 ไมครอน',
            'air_aqi' => 'ดัชนีคุณภาพอากาศ',
            // canal_waterlevel
            'canal_waterlevel_value' => 'ค่าระดับน้ำในคลอง',
            // crosssection
            'section_location' => 'ตำแหน่งที่ตั้ง',
            'point_id' => 'ตำแหน่งของการจุดลำน้ำ',
            'section_lat' => 'ตำแหน่งละติจูดของการวัด',
            'section_long' => 'ตำแหน่งลองติจูดของการวัด',
            'distance' => 'ระยะทาง',
            // dam_daily, dam_hourly
            'dam_name' => 'ชื่อเขื่อน',
            'dam_level' => 'ระดับน้ำกักเก็บ',
            'dam_storage' => 'ปริมาณน้ำกักเก็บ',
            'dam_inflow' => 'ปริมาณน้ำไหลเข้าอ่าง',
            'dam_released' => 'ปริมาณการระบายผ่านเครื่อง',
            'dam_spilled' => 'ปริมาณระบายน้ำผ่านทางน้ำล้น',
            'dam_losses' => 'ปริมาณน้ำที่สูญเสีย',
            'dam_evap' => 'ปริมาณน้ำที่ระเหย',
            'dam_uses_water' => 'ปริมาณน้ำที่ใช้ได้',
            'dam_storage_percent' => 'เปอร์เซนต์ปริมาตรน้ำ',
            'dam_uses_water_percent' => 'เปอร์เซนต์ปริมาตรน้ำใช้การได้',
            'dam_inflow_avg' => 'ปริมาตรน้ำไหลลงอ่างเก็บน้ำสะสมตั้งแต่ต้นปี',
            'dam_released_acc' => 'ปริมาตรน้ำระบายสะสมตั้งแต่ต้นปี',
            'dam_inflow_acc' => 'ปริมาตรน้ำไหลลงอ่างเก็บน้ำเฉลี่ยทั้งปี',
            'dam_inflow_acc_percent' => 'เปอร์เซนต์ปริมาตรน้ำไหลลงอ่างเก็บน้ำเฉลี่ยทั้งปี',
            // flood_situation
            'flood_name' => 'ชื่อสถานการณ์น้ำ',
            'flood_link' => 'ลิ้งที่แสดงสถานการณ์น้ำ',
            'flood_description' => 'รายละเอียดสถานการณ์น้ำ',
            // floodforecast
            'floodforecast_value' => 'ข้อมูลคาดการณ์น้ำท่วมจากระดับน้ำ',
            // ford_waterlevel
            'ford_waterlevel_value' => 'ค่าระดับน้ำบนถนน',
            // geohazard_situation
            'geohazard_name' => 'ชื่อสถานการณ์พิบัติภัย',
            'geohazard_link' => 'ลิ้งที่แสดงสถานการณ์พิบัติภัย',
            'geohazard_description' => 'รายละเอียดสถานการณ์พิบัติภัย',
            'geohazard_author' => 'ผู้รายงานสถานการณ์',
            'geohazard_colorlevel' => 'ระดับสีของเกณฑ์พิบัติภัย',
            // humid
            'humid_value' => 'ค่าความชื้นสัมพัทธ์',
            // m_air_station
            'air_station_type' => 'ชนิดของเครื่องวัดอากาศ',
            // medium_dam
            'mediumdam_storage' => 'ปริมาณน้ำกักเก็บ',
            'mediumdam_inflow' => 'ปริมาณน้ำไหลเข้าอ่าง',
            'mediumdam_released' => 'ปริมาณน้ำไหลเข้าอ่าง',
            // pressure
            'pressure_value' => 'ค่าความกดอากาศ',
            // rainfall
            'rainfall5m' => 'ปริมาณน้ำฝนทุก 5 นาที',
            'rainfall10m' => 'ปริมาณน้ำฝนทุก 10 นาที',
            'rainfall15m' => 'ปริมาณน้ำฝนทุก 15 นาที',
            'rainfall30m' => 'ปริมาณน้ำฝนทุก 30 นาที',
            'rainfall1h' => 'ปริมาณน้ำฝนทุก 1 ชั่วโมง',
            'rainfall3h' => 'ปริมาณน้ำฝนทุก 3 ชั่วโมง',
            'rainfall6h' => 'ปริมาณน้ำฝนทุก 6 ชั่วโมง',
            'rainfall12h' => 'ปริมาณน้ำฝนทุก 12 ชั่วโมง',
            'rainfall24h' => 'ปริมาณน้ำฝนทุก 24 ชั่วโมง',
            'rainfall_acc' => 'ปริมาณน้ำฝนสะสม',
            // rainfall_daily
            'rainfall_value' => 'ปริมาณฝน',
            // rainforecast
            'rainforecast_value' => 'ข้อมูลคาดการณ์ฝน',
            'rainforecast_level' => 'เกณฑ์ของการคาดการณ์',
            'rainforecast_leveltext' => 'รายละเอียดเกณฑ์ของการคาดการณ์',
            // soilmoisture
            'soil_value' => 'ค่าข้อมูลความชื้นในดิน',
            // solar
            'solar_value' => 'ค่าความเข้มแสง',
            // swan
            'swan_depth' => 'ข้อมูลคาดการณ์ความลึกของคลื่น',
            'swan_highsig' => 'ข้อมูลคาดการณ์ความสูงของคลื่น',
            'swan_direction' => 'ข้อมูลคาดการณ์ทิศทางของคลื่น',
            'swan_period_top' => 'ข้อมูลคาดการณ์คาบคลื่นสูงสุด',
            'swan_period_average' => 'ข้อมูลคาดการณ์คาบคลื่นเฉลี่ย',
            'swan_windx' => 'ข้อมูลคาดการณ์เวคเตอร์ลมในแนวทิศตะวันออกและทิศตะวันตก',
            'swan_windy' => 'ข้อมูลคาดการณ์เวคเตอร์ลมในแนวทิศเเหนือและใต้',
            // tele_waterlevel
            'waterlevel_m' => 'ระดับน้ำ (ม.)',
            'waterlevel_msl' => 'ระดับน้ำ (ม.รทก.)',
            'waterlevel_in' => 'waterlevel_in',
            'waterlevel_out' => 'waterlevel_out',
            'waterlevel_out2' => 'waterlevel_out2',
            'flow_rate' => 'อัตราการไหล',
            'discharge' => 'ปริมาณการระบายน้ำ',
            'pump_on' => 'จำนวนเครื่องสูบน้ำที่ใช้งาน',
            'floodgate_open' => 'จำนวนประตูระบายน้ำที่เปิด',
            'floodgate_height' => 'จำนวนความสูงของประตูระบายน้ำ',
            // temperature
            'temp_value' => 'ค่าอุณหภูมิ',
            // temperature_daily
            'maxtemperature' => 'ค่าอุณหภูมิสูงสุด',
            'diffmaxtemperature' => 'ส่วนต่างค่าอุณหภูมิสูงสุด',
            'mintemperature' => 'ค่าอุณหภูมิต่ำสุด',
            'diffmintemperature' => 'ส่วนต่างค่าอุณหภูมิต่ำสุด',
            // water_resource
            'water_resource_oldcode' => 'รหัสแหล่งน้ำชุมชน',
            'projectname' => 'ชื่อโครงการ',
            'projecttype' => 'กิจกรรม',
            'fiscal_year' => 'ปีงบประมาณ',
            'mooban' => 'หมู่บ้าน',
            'coordination' => 'ตำแหน่งโครงการ',
            'benefit_household' => 'ครัวเรือนที่ได้รับประโยชน์',
            'benefit_area' => 'พื้นที่ที่ได้รับประโยชน์',
            'capacity' => 'ความจุ',
            'standard_cost' => 'งบประมาณ',
            'budget' => 'ค่าใช้จ่าย',
            'contract_signdate' => 'วันที่ลงนามในสัญญา',
            'contract_enddate' => 'วันที่สิ้นสุดสัญญา',
            'rec_date' => 'วันที่บันทึกข้อมูล',
            // waterquality
            'waterquality_do' => 'ออกซิเจนละลายในน้ำ',
            'waterquality_ph' => 'ความเป็นกรด-ด่าง',
            'waterquality_temp' => 'อุณหภูมิน้ำ',
            'waterquality_turbid' => 'ค่าความขุ่นในน้ำ',
            'waterquality_bod' => 'ค่าความสกปรกในรูปสารอินทรีย์',
            'waterquality_tcb' => 'ปริมาณแบคทีเรียในรูปโคลิฟอร์มทั้งหมด',
            'waterquality_fcb' => 'ปริมาณแบคทีเรียในรูปฟีคลอโคลิฟอร์ม',
            'waterquality_nh3n' => 'ปริมาณแอมโมเนีย-ไนโตรเจน',
            'waterquality_wqi' => 'ช่วงคะแนน WQI',
            'waterquality_ammonium' => 'แอมโมเนียม',
            'waterquality_nitrate' => 'กรดดินประสิว',
            'waterquality_colorstatus' => 'สถานะของสี',
            'waterquality_status' => 'สถานะของคุณภาพน้ำ',
            'waterquality_salinity' => 'ค่าความเค็ม',
            'waterquality_conductivity' => 'ความนำไฟฟ้าในน้ำ',
            'waterquality_tds' => '-tds',
            'waterquality_chlorophyll' => 'คลอโรฟีลล์',
            // weather_forecast
            'overall_forcast' => 'ภาพรวมการพยากรณ์สภาพอากาศ',
            'region_forcast' => 'พยากรณ์สภาพอากาศรายภาค',
            // wind
            'wind_speed' => 'ค่าความเร็วลม',
            'wind_dir_value' => 'ค่าองศาของทิศทางลม',
            'wind_dir' => 'ทิศทางลม',
        ],
    ];
?>
