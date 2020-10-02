<?php
    return [
        'page_name' => '概要エンティティがリンクされています。',

        'metadata' => ' すべてのアカウント情報 %s リスト ',
        'metadata_status_connect' => 'リンク %s リスト ',
        'metadata_status_wait_update' => '庁の更新を待って %s リスト ',
        'metadata_status_wait_connect' => 'リンクを待って %s リスト ',
        'dataservice' => '情報サービス %s 時間 ',

        'col_name' => 'リスト情報',
        'col_frequency' => '周波数',
        'col_agency_name' => '機関',
        'col_agency_count' => '番号 (時間)',
        'tr_metadata_status_connect' => 'トランザクションは、データリンク',
        'tr_metadata_status_wait_update' => 'リスト情報機関更新された情報を待っています。',
        'tr_metadata_status_wait_connect' => 'リンクのエントリ情報。',
        'tr_metadata_status_cancel' => 'アカウントをキャンセル',
        'tr_metadata_dataservice' => '要求された情報の量。 (時間) 分類機関',

        'col_id' => 'リクエストID',
        'col_user_name' => 'サイト情報',
        'col_metadata_name' => 'リスト情報',
        'col_service' => '領収書',
        'col_create' => '出願の出願日',
        'col_result_date' => '報告日',
        'col_result' => '情報を求めます',

        'result_AP' => '認めます',
        'result_DA' => '不承認',

        'tbConfig' => [
            // master
            'tele_station_name' => 'ステーション',
            'oldcode' => '元のコード',
            'datetime' => '日付 - 時刻',
            'date' => '日付',
            'agency_id' => '代理コード',
            'remark' => '注記', // crosssection, flood_situation, geohazard_remark
            'water_level_msl' => '水位', // crosssection
            'comm_status' => 'メートルのステータス', // canal_waterlevel, ford_waterlevel
            'qc_status' => 'データ品質の状態', // dam_daily, dam_hourly, ford_waterlevel
            'station_type' => '駅のタイプ',
            'lat' => '緯度',
            'long' => '経度',

            // air
            'air_so2' => '二酸化イオウ',
            'air_no2' => '二酸化窒素',
            'air_co' => '一酸化炭素',
            'air_o3' => 'オゾン',
            'air_pm10' => '10ミクロンよりも大きなダスト粒子。',
            'air_pm25' => '2.5ミクロンよりも大きなダスト粒子。',
            'air_aqi' => '大気質指標',
            // canal_waterlevel
            'canal_waterlevel_value' => '運河の水位',
            // crosssection
            'section_location' => '場所',
            'point_id' => '川の位置',
            'section_lat' => '測定の緯度',
            'section_long' => '尺度の経度。',
            'distance' => '距離',
            // dam_daily, dam_hourly
            'dam_name' => '名前ダム',
            'dam_level' => '保水',
            'dam_storage' => '保水',
            'dam_inflow' => '洗面器に流入する水の量',
            'dam_released' => '換気風量',
            'dam_spilled' => '余水路を通過する水の量。',
            'dam_losses' => '水の損失',
            'dam_evap' => '水の蒸発',
            'dam_uses_water' => '利用可能な水の量',
            'dam_storage_percent' => '水の容積率',
            'dam_uses_water_percent' => 'なるために使用される水の容積率',
            'dam_inflow_avg' => '今年の初め以来の累積貯水池に流れ込む水の量。',
            'dam_released_acc' => '今年の初めから蓄積された水の量。',
            'dam_inflow_acc' => '通年の貯水池に流れ込む水の量。',
            'dam_inflow_acc_percent' => '通年の貯水池に流入した水の容積率。',
            // flood_situation
            'flood_name' => '名前状況',
            'flood_link' => '何それは水の状況を示しています',
            'flood_description' => '水の状況を詳細',
            // floodforecast
            'floodforecast_value' => '情報が洪水の上昇を予測しました。',
            // ford_waterlevel
            'ford_waterlevel_value' => '道路上の水位',
            // geohazard_situation
            'geohazard_name' => '災害状況',
            'geohazard_link' => 'どのような災害状況。',
            'geohazard_description' => '詳細災害の状況',
            'geohazard_author' => 'レポート',
            'geohazard_colorlevel' => '災害時の色',
            // humid
            'humid_value' => '湿度',
            // m_air_station
            'air_station_type' => '計装用空気のタイプ',
            // medium_dam
            'mediumdam_storage' => '保水',
            'mediumdam_inflow' => '洗面器に流入する水の量',
            'mediumdam_released' => '洗面器に流入する水の量',
            // pressure
            'pressure_value' => '圧力',
            // rainfall
            'rainfall5m' => '5分ごとに降雨',
            'rainfall10m' => '10分ごとに降雨',
            'rainfall15m' => '15分ごとに降雨',
            'rainfall30m' => '30分ごとに降雨',
            'rainfall1h' => '1時間ごとの降水量',
            'rainfall3h' => '3時間ごとに降雨',
            'rainfall6h' => '6時間ごとに降雨',
            'rainfall12h' => '12時間ごとの降雨',
            'rainfall24h' => '24時間ごとに降雨',
            'rainfall_acc' => '累積雨量',
            // rainfall_daily
            'rainfall_value' => '降雨',
            // rainforecast
            'rainforecast_value' => 'より多くの雨予報',
            'rainforecast_level' => '予測の基礎',
            'rainforecast_leveltext' => '予測の詳細。',
            // soilmoisture
            'soil_value' => '土壌水分データ',
            // solar
            'solar_value' => '光強度',
            // swan
            'swan_depth' => '情報は、波の深さを予測します。',
            'swan_highsig' => '波の高さデータの予測。',
            'swan_direction' => '情報は、波の方向を予測します',
            'swan_period_top' => '最大波予報期間',
            'swan_period_average' => '平均波予測期間',
            'swan_windx' => 'ベクトルデータは、東と西に沿って風を予測します。',
            'swan_windy' => 'ベクトルデータは、東I北と南に沿って風を予測します。',
            // tele_waterlevel
            'waterlevel_m' => 'waterlevel_m',
            'waterlevel_msl' => '水位',
            'waterlevel_in' => 'waterlevel_in',
            'waterlevel_out' => 'waterlevel_out',
            'waterlevel_out2' => 'waterlevel_out2',
            'flow_rate' => 'flow_rate',
            'discharge' => '水の量',
            'pump_on' => 'アクティブなポンプの数。',
            'floodgate_open' => '水門を開きます',
            'floodgate_height' => '水門の数が多いです',
            // temperature
            'temp_value' => '温度',
            // temperature_daily
            'maxtemperature' => '最高温度',
            'diffmaxtemperature' => '最大温度差',
            'mintemperature' => '最低温度',
            'diffmintemperature' => '決済最低気温',
            // water_resource
            'water_resource_oldcode' => '水ソースコミュニティ',
            'projectname' => 'プロジェクト名',
            'projecttype' => 'アクティビティ',
            'fiscal_year' => '年度',
            'mooban' => '村',
            'coordination' => '仕事のプロジェクト',
            'benefit_household' => '給付を受けている世帯',
            'benefit_area' => '地域のメリット',
            'capacity' => '容量',
            'standard_cost' => '予算',
            'budget' => '課金',
            'contract_signdate' => '合意書に署名オン',
            'contract_enddate' => '契約終了日',
            'rec_date' => '日付を記録',
            // waterquality
            'waterquality_do' => '水中の溶存酸素',
            'waterquality_ph' => '酸味-発見',
            'waterquality_temp' => '水温',
            'waterquality_turbid' => '水中での濁度',
            'waterquality_bod' => '有機物の形で汚れ。',
            'waterquality_tcb' => '大腸菌群の中の細菌。',
            'waterquality_fcb' => '細菌はコレステロール大腸菌を餌。',
            'waterquality_nh3n' => 'アンモニア-窒素',
            'waterquality_wqi' => 'スコア範囲 WQI',
            'waterquality_ammonium' => 'アンモニウム',
            'waterquality_nitrate' => '硝酸塩',
            'waterquality_colorstatus' => '色の',
            'waterquality_status' => '水質の状況',
            'waterquality_salinity' => '塩分',
            'waterquality_conductivity' => '水の電気伝導度',
            'waterquality_tds' => '-tds',
            'waterquality_chlorophyll' => 'クロロフィル',
            // weather_forecast
            'overall_forcast' => '概要見通し',
            'region_forcast' => '地域の天気予報',
            // wind
            'wind_speed' => '風速',
            'wind_dir_value' => '風向の度合い',
            'wind_dir' => '風の方向',
        ],
    ];
?>
