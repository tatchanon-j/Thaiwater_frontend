/**
*
*   srvTH Object for handler index page
*
*   @author CIM Systems (Thailand) <cim@cim.co.th>
*   @license HAII
*
*/
var srvTH = {
    cache: {}
};


/**
*   Initial srvMain
*   @param {string} _host - web url
*   @param {string} _img_path - image url
*/
srvTH.Init = function(_host, _img_path ){
    var self = srvTH;
    self.SERVICE = "thaiwater30/public/thailand"; // url service
    //self.SERVICE = fetch('http://localhost/thaiwater30/public/resources/js/frontoffice/home/data.json').then(results => results.json()).then(console.log);
    //console.log(self.SERVICE);
    //fetch('http://localhost/thaiwater30/public/resources/js/frontoffice/home/data.json').then(results => results.json()).then(function(value) {rs = value; console.log(res)});
    //console.log(data);
    self._HOST_ = _host;
    self._IMG_PATH = _img_path;
    self._MAIN_PAGE_ = _host + '/main';
    self.IntervalTime = 125; // ปุ่ม arrowUp, down ตอนกดค้างจะ ทำงานทุกๆ 125 ms
    self.currentRow = null;
    self.isNormalSituation = {};
    var anHoureBefore = moment().add(-1, 'hours').startOf('hour'); // วันเวลาปัจจุบัน -1 ชั่วโมง ที่ .00
    self.DATE = JH.DateFormat(anHoureBefore, 'DD MMMM YYYY'); // วันที่ anHoureBefore 20 สิงหาคม 2561
    // self.DATE = JH.DateFormat(anHoureBefore, 'DD MMMM YYYY'); // วันที่ anHoureBefore 20 ส.ค. 2561
    self.DATE_TIME = JH.DateFormat(anHoureBefore) + ( JH.GetLang() == 'th' ? ' น.' : ''); // วันเวลาของ anHoureBefore
    self.TIME = JH.DateFormat(anHoureBefore, 'HH:mm') + ( JH.GetLang() == 'th' ? ' น.' : ''); // 14:08 น.

    // default thailand polygon style
    self.GEOJSON_THAILAND_STYLE = {
        fillOpacity: 1, opacity: 0.5, fillColor: 'white' , color: 'black' , weight: 1 , interactive: false,
        onEachFeature: self.GEOJSON_THAILAND_onEachFeature,
    };
    // default เส้นของ river
    self.GEOJSON_RIVER_MAIN_STYLE = {weight: 0.4, clickable:false, };
    // default สีของ polygon
    self.GEOJSON_FILL_STYLE = {fillOpacity: 0.8,  opacity: 0,};
    // default ขอบ ของ polygon
    self.GEOJSON_BORDER_STYLE = {fillOpacity: 0, opacity: 1, dashArray: '3',};

    self.fillStyle = function(options){
        return $.extend({}, self.GEOJSON_FILL_STYLE, options);
    }
    self.borderStyle = function(options){
        return $.extend({}, self.GEOJSON_BORDER_STYLE, options);
    }

    self.initMap();
    self.initControlMap();
    self.initEvent();
}

/**
*   Initial map in srvTH
*/
srvTH.initMap = function(){
    self = srvTH;

    map = LL.Map('map', {zoomControl: false});
    JH.Get('LL.tileLayer').setOpacity(0.3);
    self.map = map;

    // disable event map
    map.dragging.disable();
    map.touchZoom.disable();
    map.doubleClickZoom.disable();
    map.scrollWheelZoom.disable();
    map.boxZoom.disable();
    map.keyboard.disable();

    // add geojson to map
    _geoJson =  L.geoJson(LL.GetGeoJsonThailand() , self.GEOJSON_THAILAND_STYLE );
    _geoJson.addTo(map);

    console.log(LL.GetGeoJsonThailand());

    // add geojson risk to map by peerapong srisom 07/02/2020
    _geoJson =  L.geoJson(LL.GetGeoJsonThailand() , {
        filter: function(feature, layer) {
            var prov_code = feature.properties.prov_code;
            return prov_code.includes(57) // เชียงราย
            || prov_code.includes(56) // พะเยา
            || prov_code.includes(55) // น่าน
            || prov_code.includes(53) // อุตรดิตถ์
            || prov_code.includes(64) // สุโขทัย
            || prov_code.includes(67) // เพชรบูรณ์
            || prov_code.includes(43) // หนองคาย
            || prov_code.includes(48) // นครพนม
            || prov_code.includes(47) // สกลนคร
            || prov_code.includes(46) // กาฬสินธุ์
            || prov_code.includes(44) // มหาสารคาม
            || prov_code.includes(30) // นครราชสีมา
            || prov_code.includes(31) // บุรีรัมย์
            || prov_code.includes(60) // นครสวรรค์
            || prov_code.includes(61) // อุทัยธานี
            || prov_code.includes(18) // ชัยนาท
            || prov_code.includes(71) // กาญจนบุรี
            || prov_code.includes(72) // สุพรรณบุรี
            || prov_code.includes(24) // ฉะเชิงเทรา
            || prov_code.includes(36) // ชัยภูมิ
            || prov_code.includes(97) // บึงกาฬ
            || prov_code.includes(33) // ศรีสะเกษ
            || prov_code.includes(25) // ปราจีนบุรี
            || prov_code.includes(90) // สงขลา
            || prov_code.includes(22) // จันทบุรี
            || prov_code.includes(50) // เชียงใหม่
            || prov_code.includes(20) // ชลบุรี
            || prov_code.includes(63) // ตาก
            || prov_code.includes(65); // พิษณุโลก
        },
        fillOpacity: 1, opacity: 0.5, fillColor: '#b0621d' , color: 'black' , weight: 1 , interactive: false,
        onEachFeature: self.GEOJSON_THAILAND_onEachFeature,
    } );
    _geoJson.addTo(map);

    // add river to map
    _geoJson =  L.geoJson(GEOJSON_RIVER_MAIN , self.GEOJSON_RIVER_MAIN_STYLE  );
    _geoJson.addTo(map);

    map.fitBounds(_geoJson.getBounds());
}

/**
*   Initial control map
*/
srvTH.initControlMap = function(){
    var self = srvTH;
    var map = self.map;

    // logo
    var control_topleft_logo = L.control({ position : "topleft" });
    control_topleft_logo.onAdd = function(){
        var div_logo = L.DomUtil.create('div' , 'logo');
        // div_logo.innerHTML = '<img src="'+srvTH._HOST_+srvTH._IMG_PATH+'NHC_logo_color.png?v=1464561387" class="logo img-responsive">'

        // change to new logo
        div_logo.innerHTML = '<img src="'+srvTH._HOST_+srvTH._IMG_PATH+'banner-web.png?v=1464561387">'
        return div_logo
    }
    control_topleft_logo.addTo(map)

    // ข้อความ + วันที่ ขวาบน ของหน้าจอ
    var control_topright = L.control({position : "topright"});
    control_topright.onAdd = function(){
        var div = L.DomUtil.create('div', 'info legend');
        //div.innerHTML = TRANSLATOR["info_legend"];
        div.innerHTML = '<h2>สถานการณ์น้ำ</h2><h3 style="margin-top:-20px;" class="text-center">ประเทศไทย</h3>';
        div_date = L.DomUtil.create('div' , 'btn-primary-index text-center info date ');

        div.appendChild(div_date);

        return div;
    };
    control_topright.addTo(map);


    // powered by
    var control_bottomright = L.control({position : "bottomright"});
    control_bottomright.onAdd = function(){
        var div = L.DomUtil.create('div' , '');
        var img = '<img src="'+srvTH._HOST_+srvTH._IMG_PATH+'home/NHC-logo-40.png?v=1464561387">';
        //div.innerHTML = '<a href="'+self._MAIN_PAGE_+'">'+img+'</a>'
        div.innerHTML = '<a href="'+self._MAIN_PAGE_+'" class="b">'+img+' คลังข้อมูลน้ำและภูมิอากาศแห่งชาติ  </a>'
        return div
    }
    control_bottomright.addTo(map);


    // ปุ่ม entersite
    var control_bottomright = L.control({position : "bottomright"});
    control_bottomright.onAdd = function(){
        var div = L.DomUtil.create('div' , '');
        var img = '<img src="'+srvTH._HOST_+srvTH._IMG_PATH+'home/entersite.gif?v=1464561387" class=" img-responsive" style="height:34px;width:120px;">';
        //div.innerHTML = '<a href="'+self._MAIN_PAGE_+'">'+img+'</a>'
        div.innerHTML = '<a href="'+self._MAIN_PAGE_+'" class="btn-primary-index btn-sm text-center" role="button">รายละเอียด   <i class="fa fa-arrow-right"></i></a>'
        return div
    }
    control_bottomright.addTo(map);



    // info
    var div = document.getElementById('info');
    var divLeft = document.createElement('div');
    divLeft.className = "col-md-6 ";
    var divRight = document.createElement('div');
    divRight.className = "col-md-6 ";

    // load data and render
    apiService.SendRequest("GET" , srvTH.SERVICE , {} , function(rs){
        //fetch('http://localhost/thaiwater30/public/resources/js/frontoffice/home/data.json').then(results => results.json()).then(function(value) {rs = value; console.log(rs)});
        //console.log('RS : ', rs);
        rs = data;
        srvTH.handlerProvince( JH.GetJsonValue(rs , "province") );
        srvTH.handlerDate();

        // สำหรับใส่ marker ลงบนแผนที่
        srvTH.handlerRain( JH.GetJsonValue(rs , "rain") );
        srvTH.handlerWaterLevel( JH.GetJsonValue(rs , "waterlevel") );
        srvTH.handlerDam( JH.GetJsonValue(rs , "dam") );
        srvTH.handlerWaterQuality( JH.GetJsonValue(rs , "waterquality") );
        srvTH.handlerStorm( JH.GetJsonValue(rs , "storm") );
        srvTH.handlerPreRain( JH.GetJsonValue(rs , "pre_rain") );
        srvTH.handlerWave( JH.GetJsonValue(rs , "wave") );
        srvTH.handlerWarning( JH.GetJsonValue(rs , "warning") );

        // สร้างกล่องข้อความ
        divLeft.appendChild( control_topleft_icon_rain() );
        divLeft.appendChild( control_topleft_icon_waterlevel() );
        divLeft.appendChild( control_topleft_icon_dam() );
        divLeft.appendChild( control_topleft_icon_waterquality( ) );
        divLeft.appendChild( control_topleft_icon_warnning() );

        divRight.appendChild( control_topleft_icon_storm() );
        divRight.appendChild( control_topleft_icon_clock() );
        divRight.appendChild( control_topleft_icon_wave() );
        divRight.appendChild( control_topleft_icon_flood() );

        // สถานการณ์ ทั้ง 8 อัน ปกติ ให้้ขึ้น สถานการณ์ปกติ ตรงกลาง
        if ( Object.keys(srvTH.isNormalSituation).length != 8){
            $(div).find('div.normalsituation').remove();
            div.appendChild(divLeft);
            div.appendChild(divRight);

            // show arrow down
            $('#info').find('.control-box').each(function(){
                var controlBox = $(this);
                var controlBody = controlBox.find('.control-body');
                var controlDiv = controlBody.find('div');

                var controlBodyHeight = controlBody.height();
                var controlDivHeight = controlDiv.height();

                if (controlDivHeight > controlBodyHeight){
                    controlBox.find('.control-arrow').addClass('hasDown');
                }
            });
        }else{
            $(div).find('div.normalsituation').addClass('active');
        }
    });
}

/*
*   Initial event arrow click, hold
*/
srvTH.initEvent = function(){
    // event arrow down click,hold
    $('#info').on('mousedown', '.control-arrow .fa-angle-up', function(){
        e = this;
        srvTH["cache"]["interval"] = setInterval(function(){
            arrowUpClick(e);
        }, srvTH["IntervalTime"]);
        arrowUpClick(this);
    })
    .on('mouseup mouseleave', '.control-arrow .fa-angle-up', function(){
        if (srvTH["cache"]["interval"]){
            clearInterval(srvTH["cache"]["interval"]);
            srvTH["cache"]["interval"] = null;
        }
    });
    // event arrow down click,hold
    $('#info').on('mousedown', '.control-arrow .fa-angle-down', function(){
        e = this;
        srvTH["cache"]["interval"] = setInterval(function(){
            arrowDownClick(e);
        }, srvTH["IntervalTime"]);
        arrowDownClick(this);
    })
    .on('mouseup mouseleave', '.control-arrow .fa-angle-down', function(){
        if (srvTH["cache"]["interval"]){
            clearInterval(srvTH["cache"]["interval"]);
            srvTH["cache"]["interval"] = null;
        }
    });
}

/**
*   Default geojson thailand on each feature
*   @param {l.feature} feature -
*   @param {l.layer} layer -
*/
srvTH.GEOJSON_THAILAND_onEachFeature = function(feature , layer){
    var self = srvTH;
    self._onEachFeature("province",feature , layer);
}

/**
*   On each feature function
*   @param {string} map - ชื่อของข้อมุล
*   @param {l.feature} feature -
*   @param {l.layer} layer -
*/
srvTH._onEachFeature = function(map , feature, layer){
    var self = srvTH;
    if (typeof self.FEATURE_PROVINCE == "undefined"){
        self.FEATURE_PROVINCE = {};
    }
    if (typeof self.FEATURE_PROVINCE[map] == "undefined"){
        self.FEATURE_PROVINCE[map] = [];
    }
    // cache polygon province ไว้สำหรับเปลี่ยนสี
    self.FEATURE_PROVINCE[map][feature.properties.prov_code] = layer;
    self.FEATURE_PROVINCE[map][feature.properties.title] = layer;
}

/**
*   Render current date
*/
srvTH.handlerDate = function(){
    // แสดงวันปัจจุบัน
    $('div.info.date').html(srvTH.DATE);
}

/**
*   handler service province
*   @param {object} rs - result จาก service ในส่วนของ province
*/
srvTH.handlerProvince = function(rs){
    if ( JH.GetJsonValue(rs , "result") != "OK"){ return false; }
    var data = JH.GetJsonValue(rs , "data");
    for ( var i = 0 ; i < data.length ; i++){
        var d = data[i];
        province_cache( JH.GetJsonValue(d , "province_code") , d);
    }
}

/**
*   get, set province cache
*   @param {string} province_code - province code
*   @param {mix} o - value
*   @return cache.province
*/
var province_cache = function(province_code , o){
    if ( arguments.length == 0 ) { return JH.GetJsonValue( srvTH , "cache.province") ;}
    if (typeof srvTH["cache"]["province"] == "undefined"){
        srvTH["cache"]["province"] = {};
    }
    srvTH["cache"]["province"][province_code] = o;
}

/**
*   create label with class
*   @param {string} text - ข้อความ
*   @param {string} level - label class
*   @return {string} span class label
*/
var Label = function(text , level){
    if (typeof level === "undefined"){
        return Label(text , 'title');
    }
    return '<span class="label label-'+level+'">'+text+'</span>'
}

/**
*   create label with background-color
*   @param {string} text - ข้อความ
*   @param {string} color - สี
*   @return {string} span class label
*/
var LabelBg = function(text , color){
    return '<span class="label" style="background-color:'+color+';line-height: normal;">'+text+'</span>'
}

/**
*   handler service rain
*   @param {object} rs - result จาก service ในส่วนของ rain
*/
srvTH.handlerRain = function(rs){
    srvTHF.SetRain_Setting( JH.GetJsonValue(rs , "setting") );
    srvTHF.renderModalRainTable();
    srvTH["cache"]["rain_province_date"] = JH.GetJsonValue(rs , "date");
    if (JH.GetJsonValue(rs, "data.result") == "OK"){
        var data = JH.GetJsonValue(rs, "data.data");
        for (var i = 0 ; i < data.length ; i++){
            var d = data[i];
            // gen marker on map
            var station_lat = JH.GetJsonValue(d , "station.tele_station_lat");
            var station_long = JH.GetJsonValue(d , "station.tele_station_long");
            var rain24h = JH.GetJsonValue_Float(d , "rain_24h");
            var rain1h = JH.GetJsonValue_Float(d , "rain_1h");
            var color = srvTHF.Rain_GetColorname(rain24h);

            var zone = JH.GetJsonValue(d , "geocode.warning_zone");
            if (zone == ""){ continue; }
            var level24h = srvTHF.Rain_GetRuleLevel(zone , rain24h , "rain24h" ) ;
            var level1h = srvTHF.Rain_GetRuleLevel(zone , rain1h , "rain1h" ) ;
            var v = Math.max( level24h , level1h );

            if ( v != 0 && station_lat != "" && station_long != "" ){
                var level_color = srvTHF.Rain_GetLevelColor(v);
                if ( JH.GetJsonValue(level_color, "colorname") == "") { continue; }
                // add to map
                var m = srvTHF.Rain_Marker([station_lat , station_long] , d , JH.GetJsonValue(level_color, "colorname"));
                srvTH.map.addLayer(m);
            }

            // cache province level
            var province = JH.GetJsonLangValue(d , "geocode.province_name");
            rain_cacheProvinceLevel( province , v );
        }
    }
}

/**
*   generate control-box-rain
*/
var control_topleft_icon_rain = function(){
    var headDate = rain_head_text();
    var bodyText = rain_body_text();

    var o = {};
    var total ={'4':0, '3':0};  // 4 วิกฤต, 3 เฝ้าระวังพิเศษ
    var sumValue = "";
    var total_ll = "";
    var provinces = rain_cacheProvinceLevel();

    for (var province in provinces){
        var level = provinces[ province ];

        if ( level <= 1 ){ continue; }
        var level_color = srvTHF.Rain_GetLevelColor(level);

        if ( typeof o[level] === "undefined"){ o[level] = ""; }
        o[level] += LabelBg(province , level_color.color);

        total[level]++;
        // total_ll = total[level];
        total_ll = total[4]; //นับเฉพาะ 4 วิกฤต
    }

    // ถ้า total_ll ไม่มีข้อมูลไม่แสดงแจ้งเตือน
    if (total_ll == 0){
        sumValue += ' ' ;
    } else {
        sumValue += ' <span class="badge badge-danger">' +  total_ll + '</span>' ;
    }



    return controlBoxRain( headDate , bodyText , sumValue);
};

/**
*   get, set rain cache province level
*   @param {string} province - province
*   @param {mix} v - value
*   @return cache.rain_province
*/
var rain_cacheProvinceLevel = function(province , v){
    if (arguments.length == 0) { return JH.GetJsonValue(srvTH , "cache.rain_province"); }
    if (typeof srvTH["cache"]["rain_province"] == "undefined"){
        srvTH["cache"]["rain_province"] = {};
    }
    var max = Math.max( v , JH.GetJsonValue_Float(srvTH , "cache.rain_province." + province ));
    srvTH["cache"]["rain_province"][province] = max;
}

/**
*   get rain head text from cache.rain_province
*   @return rain head text
*/
var rain_head_text = function(){
    return srvTH.TIME;
}

/**
*   get rain body text from cache.rain_province
*   @return rain body text
*/
var rain_body_text = function(){
    var o = {};
    var total ={'4':0, '3':0};  // 4 วิกฤต, 3 เฝ้าระวังพิเศษ
    var text = "";
    var provinces = rain_cacheProvinceLevel();
    for (var province in provinces){
        var level = provinces[ province ];
        if ( level <= 1 ){ continue; }
        var level_color = srvTHF.Rain_GetLevelColor(level);
        if ( typeof o[level] === "undefined"){ o[level] = ""; }
        o[level] += LabelBg(province , level_color.color);
        total[level]++;
    }

    // add total sum
    for (var i in o){
        text += '<b>' + TRANSLATOR[ srvTHF.Rain_GetLevelColor(i)["trans"] ]+ ' : </b>' + o[i] + "<br/>" ;
    }
    if (text == "") {
        text = TRANSLATOR["normal"];
        srvTH.isNormalSituation["rain"] = true;
    }

    return text;
}

/**
*   handler service waterlevel
*   @param {object} rs - result จาก service ในส่วนของ waterlevel
*/
srvTH.handlerWaterLevel = function(rs){
    srvTHF.SetWaterLevel_Setting( JH.GetJsonValue(rs , "setting") );
    srvTHF.renderModalWaterlevelTable();
    srvTH["cache"]["waterlevel_date"] = JH.GetJsonValue(rs , "date");
    if ( JH.GetJsonValue(rs , "data.result") == "OK" ){
        var data = JH.GetJsonValue( rs , "data.data");
        for (var i = 0 ; i < data.length ; i++){
            var d = data[i];
            var station = JH.GetJsonValue(d , "station");
            var station_lat = JH.GetJsonValue(station , "tele_station_lat");
            var station_long = JH.GetJsonValue(station , "tele_station_long");

            var storage_percent = JH.GetJsonValue(d , "storage_percent");
            var level = srvTHF.WaterLevel_GetRulelevel(storage_percent);
            if (level == ""){ continue; }
            var province_name = JH.GetJsonLangValue(d , "geocode.province_name");
            waterlevel_cacheProvinceLevel( province_name , level );

            var color = srvTHF.WaterLevel_GetlevelColorName(level);
            if ( color != "" && station_lat != "" && station_long != ""){
                m = srvTHF.WaterLevel_Marker([station_lat , station_long] , d , color);
                srvTH.map.addLayer(m);
            }
        }
    }
}

/**
*   get, set waterlevel cache province level
*   @param {string} province - province
*   @param {mix} v - value
*   @return cache.waterlevel_province
*/
var waterlevel_cacheProvinceLevel = function(province , v){
    if (arguments.length == 0) { return JH.GetJsonValue(srvTH , "cache.waterlevel_province"); }
    if (typeof srvTH["cache"]["waterlevel_province"] == "undefined"){
        srvTH["cache"]["waterlevel_province"] = {};
    }
    // เก็บค่ามากสุดของแต่ละจังหวัด
    var max = Math.max( v , JH.GetJsonValue_Float(srvTH , "cache.waterlevel_province." + province ));
    srvTH["cache"]["waterlevel_province"][province] = max;
}

/**
*   generate control-box-Waterlevel
*/
var control_topleft_icon_waterlevel = function(){

    var headDate = waterlevel_head_text();
    var bodyText = waterlevel_body_text();

    var o = {};
    var total ={'1':0, '2':0}; // 1: น้ำน้อยวิกฤติ, 2: น้ำล้นตลิ่ง
    var sumValue = "";
    var total_ll = "";
    var provinces = waterlevel_cacheProvinceLevel();


    for (var province in provinces){
        var level = provinces[ province ];

        var level_color = srvTHF.WaterLevel_GetlevelColor(level);
        if ( typeof o[level] === "undefined"){ o[level] = ""; }
        o[level] += LabelBg(province, level_color);
        total[level]++;
        // total_ll = total[level];
        total_ll = total[2]; // นับเฉพาะ 2: น้ำล้นตลิ่ง
    }
    sumValue += '<b><span class="badge badge-danger">' + total_ll + '</span></b>';

    return controlBoxWaterlevel( headDate , bodyText , sumValue);
};

/**
*   get waterlevel head text from cache.waterlevel_date
*   @return waterlevel head text
*/
var waterlevel_head_text = function(){
    return srvTH.TIME;
}

/**
*   get waterlevel body text from waterlevel_cacheProvinceLevel
*   @return waterlevel body text
*/
var waterlevel_body_text = function(){
    var o = {};
    var total ={'1':0, '2':0};
    var text = "";
    var provinces = waterlevel_cacheProvinceLevel();

    for (var province in provinces){
        var level = provinces[ province ];
        var level_color = srvTHF.WaterLevel_GetlevelColor(level);
        if ( typeof o[level] === "undefined"){ o[level] = ""; }
        o[level] += LabelBg(province, level_color);
        total[level]++;
    }

    for (var i in o){
        text += '<b>' + TRANSLATOR[ srvTHF.GetWaterLevel_Level()[i]["trans"] ] + ': </b>' + o[i] + "<br/>" ;
    }

    if (text == "") {
        text = TRANSLATOR["normal"];
        srvTH.isNormalSituation["waterlevel"] = true;
    }
    return text;
}

/**
*   handler service dam
*   @param {object} rs - result จาก service ในส่วนของ dam
*/
srvTH.handlerDam = function(rs){
    srvTHF.SetDam_Scale(rs.setting);
    srvTHF.renderModalDamTable();
    srvTH["cache"]["dam_date"] = JH.GetJsonValue(rs , "date");
    if (rs.data.result == "OK"){
        srvTHF.Dam_SortData( rs.data.data );
        srvTH.renderMarkerDam();
    }
}

/**
*   genarate dam marker into map
*/
srvTH.renderMarkerDam = function(){
    var Dam_Low = srvTHF.Dam_Low;
    var Dam_High = srvTHF.Dam_High;
    for (var i = 0 ; i < Dam_Low.length ; i++){
        var d = Dam_Low[i];
        var dam = d["dam"];
        var dam_lat = JH.GetJsonValue(dam , "dam_lat");
        var dam_long = JH.GetJsonValue(dam , "dam_long");
        if (dam_lat == "" && dam_long == ""){
            continue;
        }
        var v = JH.GetJsonValue(d , "dam_uses_water_percent");
        m = srvTHF.Dam_Marker([dam_lat , dam_long] , d , srvTHF.Dam_GetColorname(v));
        m.addTo(srvTH.map);
    }
    for (var i = 0 ; i < Dam_High.length ; i++){
        var d = Dam_High[i];
        var dam = d["dam"];
        var dam_lat = JH.GetJsonValue(dam , "dam_lat");
        var dam_long = JH.GetJsonValue(dam , "dam_long");
        if (dam_lat == "" && dam_long == ""){
            continue;
        }
        var v = JH.GetJsonValue(d , "dam_storage_percent");
        m = srvTHF.Dam_Marker([dam_lat , dam_long] , d , srvTHF.Dam_GetColorname(v));
        m.addTo(srvTH.map);
    }
}

/**
*   generate control-box-dam
*   @return {controlBox}
*/
var control_topleft_icon_dam = function(){
    var headDate = dam_head_text();
    var bodyText = dam_body_text();

    var sumValue = "";
    var Dam_High_Text = srvTHF.GetDam_High_Text();
    var total_dam_high = Dam_High_Text.split(',').length;

    if (Dam_High_Text != ""){
        sumValue += '<span class="badge badge-danger">' + total_dam_high + '</span>';
    }

    return controlBoxDam( headDate , bodyText , sumValue);
};

/**
*   get box-dam head text
*   @return {string} box-dam head text
*/
var dam_head_text = function(){
    // return srvTH.DATE_TIME;
    return '';
}

/**
*   get box-dam body text
*   @return {string} box-dam body text
*/
var dam_body_text = function(){
    var text = "";
    var Dam_Low_Text = srvTHF.GetDam_Low_Text();
    var Dam_Low = srvTHF.GetDam_Setting_Low();
    var _low = "";
    if (Dam_Low_Text != ""){
        _low = '<font color="'+ Dam_Low["color"] +'">'+ TRANSLATOR[Dam_Low["trans"]] +'</font>';
        text += _low + ' : ' + Dam_Low_Text;
    }

    var Dam_High_Text = srvTHF.GetDam_High_Text();
    var total_dam_high = Dam_High_Text.split(',').length;
    var Dam_High = srvTHF.GetDam_Setting_High();
    var _high = "";
    var total = "";
    if (Dam_High_Text != ""){
        _high = '<font color="'+ Dam_High["color"] +'">'+ TRANSLATOR[Dam_High["trans"]] +'</font>';
        if ( Dam_Low_Text != ""){
            text += '<br/>';
        }
        text += _high + ' : ' + Dam_High_Text;
    }

    if ( Dam_Low_Text == "" && Dam_High_Text == "" ){
        text = TRANSLATOR["normal"];
        srvTH.isNormalSituation["dam"] = true;
    }
    return text;
}

/**
*   handler service waterquality
*   @param {object} rs - result ในส่วนของ waterquality
*/
srvTH.handlerWaterQuality = function(rs){
    srvTHF.SetWaterQuality_Setting( JH.GetJsonValue(rs, "setting") );
    srvTHF.renderModalWaterqualityTable();
    srvTH["cache"]["waterquality_date"] = JH.GetJsonValue( rs , "date");
    if ( JH.GetJsonValue(rs , "data.result") == "OK" ){
        var data = JH.GetJsonValue(rs , "data.data");

        for (var i = 0 ; i < data.length ; i++){
            var d = data[i];
            var station = JH.GetJsonValue(d , "waterquality_station");
            var station_lat = JH.GetJsonValue(station , "waterquality_station_lat");
            var station_long = JH.GetJsonValue(station , "waterquality_station_long");
            var station_id = JH.GetJsonValue(station , "id");

            var salinity_do = {
                waterquality_salinity: JH.GetJsonValue(d, "waterquality_salinity")
                // waterquality_do: JH.GetJsonValue(d, "waterquality_do")
            };
            if (station_lat == "" || station_long == ""){ continue; }
            var color = srvTHF.WaterQuality_GetMarkerColor(salinity_do);
            // salinity & do ปกติ
            if ( color == srvTHF.GetWaterQuality_Default().color ){ continue; }
            // salinity | do ไม่เข้าเกณฑ์มาตรฐาน
            var sanility = JH.GetJsonValue_Float(d, "waterquality_salinity");
            var sanility_color = srvTHF.WaterQuality_GetColor_salinity(sanility);
            if ( sanility_color != srvTHF.GetWaterQuality_Default().color ){ waterquality_cache(d, "salinity"); }
            // waterquality_do
            // พบค่า do เป็น 0 หน่วยงานแจ้งว่าอาจจะเกิดจากตรวจวัดได้จริง หรือ หัววัดเสีย
            // ดังนั้น จึงไม่เอาค่า do มาเป็นเกณฑ์ในการแสดงผล
            // var _do = JH.GetJsonValue_Float(d, "waterquality_do");
            // var _do_color = srvTHF.WaterQuality_GetColor_do(_do);
            // if ( _do_color != srvTHF.GetWaterQuality_Default().color ){ waterquality_cache(d, "do"); }

            m = srvTHF.WaterQuality_Marker([station_lat , station_long] , d , color);
            srvTH.map.addLayer(m);
        }
    }
}

/**
*   generate control-box-Waterquality
*   @return {controlBox}
*/
var control_topleft_icon_waterquality = function(){

    var headDate = waterquality_head_text();
    var bodyText = waterquality_body_text();

    var sumValue = "";
    var station_cache = waterquality_cache();

    var _cache = "";
    for ( var key in station_cache){
        _cache = station_cache[key];
    }

    if(_cache.length > 0){

        sumValue += '<span class="badge badge-danger">' + _cache.length + "</span>";
    }

    return controlBoxWaterquality( headDate , bodyText , sumValue);
};

/**
*   get, set waterquality cache
*   @param {object} data - data
*   @param {string} quality - "salinity", "do"
*   @return cache.waterquality
*/
var waterquality_cache = function(data, quality){
    if (arguments.length == 0) { return JH.GetJsonValue( srvTH , "cache.waterquality") ;}
    if (typeof srvTH["cache"]["waterquality"] == "undefined"){
        srvTH["cache"]["waterquality"] = {};
    }
    if (typeof srvTH["cache"]["waterquality"][quality] == "undefined"){
        srvTH["cache"]["waterquality"][quality] = [];
    }
    srvTH["cache"]["waterquality"][quality].push(data);
}

/**
*   get waterquality head text
*   @return waterquality head text
*/
var waterquality_head_text = function(){
    return srvTH.TIME;
}

/**
*   get waterquality body text
*   @return waterquality body text
*/
var waterquality_body_text = function(){
    var setting = srvTHF.GetWaterQuality_Display();
    var text = "";
    var station_cache = waterquality_cache();

    for ( var key in station_cache){
        var _cache = station_cache[key];
        if ( text != "" ){ text += "<br/>"; }
        text += "<b>"+ JH.GetJsonValue( TRANSLATOR , "waterquality_alert_" + key) + "</b> ";
        for (var i = 0 ; i < _cache.length; i++){
            var d = _cache[i];
            var station_name = JH.GetJsonLangValue(d, "waterquality_station.waterquality_station_name");
            var value = JH.GetJsonValue_Float(d, "waterquality_" + key);
            var color = srvTHF.WaterQuality_GetColor( JH.GetJsonValue( srvTHF.GetWaterQuality_Scale() , key ) , value );
            text += LabelBg(station_name, color);
        }
    }
    if ( text == "" ){
        text = TRANSLATOR["normal"];
        srvTH.isNormalSituation["waterquality"] = true;
    }

    return text;
}

/**
*   handler service storm
*   @param {object} rs - result ในส่วนของ storm
*/
srvTH.handlerStorm = function(rs){
    srvTHF.SetStorm_Setting( JH.GetJsonValue(rs, "setting") );
    srvTHF.renderModalStormTable();
    srvTH["cache"]["storm_date"] = JH.GetJsonValue( rs , "date");
    if ( JH.GetJsonValue(rs , "data.result") != "OK" ){ return false; }
    var storm = JH.GetJsonValue(rs , "data.data");
    var latlngs = [];
    var storm_name = "";
    var temp_color = "";
    var color = "";
    var polyLineW = 4; // default ขนาดเส้น
    var noPoint = true;
    var curDt = moment.utc(srvTH["cache"]["storm_date"]);
    for (var i = 0 ; i < storm.length ; i++){
        if ( storm_name != ""  && noPoint){
            if ( temp_color == ""){
                storm_cache( {name:storm_name , color: color} );
            }else{
                storm_cache( {name:storm_name , color: temp_color} );
            }

        }
        latlngs = [];
        var st = storm[i];
        storm_name = JH.GetJsonLangValue(st , "storm_name");
        // reset
        polyLineW = 4;
        noPoint = true;
        temp_color = "";
        var data = JH.GetJsonValue(st, "storm_data");
        for (var j = 0 ; j < data.length; j++){
            var d = data[j];
            var lat = JH.GetJsonValue(d , "storm_lat");
            var long = JH.GetJsonValue(d , "storm_long");
            var storm_wind = JH.GetJsonValue(d , "storm_wind");
            var storm_dt = moment( JH.GetJsonValue(d, "storm_datetime") );
            var sw = storm_wind.split(" ");
            if (lat == "" || long == "" || sw[0] == ""){ continue; }
            color = srvTHF.Storm_GetColor(sw[0]) ;

            latlngs.push([lat , long]);
            if (latlngs.length < 2){ continue; }
            else if ( latlngs.length > 2){ latlngs.splice(0,1); }
            L.polyline(latlngs, {color: color, weight: polyLineW}).addTo(srvTH.map);

            if ( storm_dt.isAfter(curDt) ){
                // เริ่มทำนาย ใส่จุด
                if ( noPoint && latlngs.length == 2){
                    temp_color = color;
                    L.circleMarker( latlngs[latlngs.length - 1], {color: temp_color, weight: polyLineW + 2})
                    .setRadius(5)
                    .addTo(srvTH.map);
                    noPoint = false;
                    storm_cache( {name:storm_name , color: color} );
                }
                // ทำนาย ปรับเส้นให้บาง
                polyLineW = 2;
            }
        }
    }
    if ( storm_name != ""  && noPoint){
        if ( temp_color == ""){
            storm_cache( {name:storm_name , color: color} );
        }else{
            storm_cache( {name:storm_name , color: temp_color} );
        }
    }
    // L.polyline(latlngs, {color: color}).addTo(srvTH.map);
    // srvTH.map.fitBounds(polyline.getBounds());
}

/**
*   generate control-box-storm
*   @return {controlBox}
*/
var control_topleft_icon_storm = function(){
    var headDate = storm_headText();
    var bodyText = storm_bodyText();

    var storms = storm_cache();
    var sumValue = "";
    console.log(storms);
    if (storms.length > 0) {
       sumValue += '<span class="badge badge-danger">' + storms.length + "</span>";
    }

    return controlBoxStorm( headDate , bodyText , sumValue);
};

/**
*   get , set storm cache
*   @param {string} storm_name - storm_name
*   @return cache.storm
*/
var storm_cache = function(storm_name){
    if (arguments.length == 0) { return JH.GetJsonValue(srvTH , "cache.storm") ;}
    if (typeof srvTH["cache"]["storm"] == "undefined"){
        srvTH["cache"]["storm"] = [];
    }
    srvTH["cache"]["storm"].push( storm_name );
}

/**
*   get storm head text
*   @return storm head text
*/
var storm_headText = function(){
    // return srvTH.DATE_TIME;
    return '';
}

/**
*   get storm body text
*   @return storm body text
*/
var storm_bodyText = function(){
    var text = "";
    // var wave_setting = srvTHF.GetWave_Setting();
    var storms = storm_cache();
    if (storms.length == 0) {
        text = TRANSLATOR["no_storm"];
        srvTH.isNormalSituation["storm"] = true;
    }
    for (var i = 0 ; i < storms.length ; i++){
        var d = storms[i];
        text += LabelBg( JH.GetJsonValue(d , "name") , JH.GetJsonValue(d , "color") );
        // LabelBg
    }
    return text;
}

/**
*   handler service pre_rain
*   @param {object} rs - result ในส่วนของ pre_rain
*/
srvTH.handlerPreRain = function(rs){
    var pre_rain_setting = JH.GetJsonValue(rs , "setting");
    srvTHF.SetPreRain_Setting( pre_rain_setting );
    srvTHF.renderModalClockTable();

    var PreRainProvince = {}

    if ( JH.GetJsonValue(rs , "data.result") != "OK" ){ return false; }
    var data = JH.GetJsonValue(rs , "data.data");
    for (var i = 0 ; i < data.length ; i ++){
        var d = data[i];
        var province_name = JH.GetJsonLangValue(d , "province_name", true);
        var level = JH.GetJsonValue(d, "rainforecast_level");

        // แยก จังหวัดไปตามแต่ละ level
        if ( JH.GetJsonValue(PreRainProvince , level) == "" ){
            PreRainProvince[level] = [];
        }
        PreRainProvince[level].push(province_name);
    }
    var _LevelText = srvTHF.GetPreRain_LevelText();
    for (var l in PreRainProvince){
        if ( l == "" ){ continue; }
        var provs = PreRainProvince[l];
        var color = JH.GetJsonValue(_LevelText, l+".color");
        for (var i = 0 ; i < provs.length ; i++){
            // เทสี แต่ละจังหวัด
            srvTH.FEATURE_PROVINCE["province"][provs[i]].setStyle({fillColor: color});
            prerain_cache(provs[i] , color, l);
        }
    }
}

/**
*   get , set prerain cache
*   @param {string} text - province name
*   @param {string} color - สี
*   @param {string} level - ระดับ
*   @return cache.prerain
*/
var prerain_cache = function(text , color , level){
    if (arguments.length == 0) { return JH.GetJsonValue(srvTH , "cache.prerain"); }
    if (typeof srvTH["cache"]["prerain"] == "undefined"){
        srvTH["cache"]["prerain"] = {};
        srvTH["cache"]["prerain_province"] = [];
    }
    if (typeof srvTH["cache"]["prerain"][level] == "undefined"){
        srvTH["cache"]["prerain"][level] = "";
    }
    srvTH["cache"]["prerain_province"].push(text);
    srvTH["cache"]["prerain"][level] += LabelBg(text , color);
}

/**
*   generate control-box-clock
*   @return {controlBox}
*/
var control_topleft_icon_clock = function(){
    var headDate = prerain_headText();
    var bodyText = prerain_bodyText();

    var sumValue = "";
    var prerainC = prerain_cache();
    var sum = 0;
    var _LevelText = srvTHF.GetPreRain_LevelText();
    var i = 0;

    // ตัวเลขแจ้งเตือนคาดการณ์ฝน
    // if (prerainC){
    //     for (var l in prerainC){
    //         var provs = prerainC[l];
    //         i++;
    //         sum += i;
    //     }
    //     sumValue += '<span class="badge badge-danger">' + sum + "</span>";
    // }

    return controlBoxPredictRain( headDate, bodyText , sumValue);
};

/**
*   get prerain head text
*   @return prerain head text
*/
var prerain_headText = function(){
    // return srvTH.DATE_TIME;
    return '';
}

/**
*   get prerain body text
*   @return prerain body text
*/
var prerain_bodyText = function(){
    var text = "";
    var prerainC = prerain_cache();
    var _LevelText = srvTHF.GetPreRain_LevelText();
    var i = 0;
    if (prerainC){
        for (var l in prerainC){
            if ( i != 0){ text += "<br/>";}
            var provs = prerainC[l];
            var levelText = TRANSLATOR[ JH.GetJsonValue(_LevelText, l+".trans") ];
            // text += '<b>' + levelText + "</b> : " + provs;
            text += "<b>" + levelText + "</b> : " + provs;
            i++;
        }
    }else{
        text = TRANSLATOR["normal"];
        srvTH.isNormalSituation["prerain"] = true;
    }
    return text;
}

/**
*   handler service wave
*   @param {object} rs - result ในส่วนของ wave
*/
srvTH.handlerWave = function(rs){
    var wave_setting = JH.GetJsonValue(rs , "setting");
    if (Array.isArray(wave_setting)) {
        wave_setting = wave_setting[0]; // ใช้ตัวแรก
    }
    srvTHF.SetWave_Setting( wave_setting );
    srvTHF.renderModalWaveTable();
    srvTH["cache"]["wave_date"] = JH.GetJsonValue( rs , "date");

    if ( JH.GetJsonValue(rs , "data.result") == "OK" ){
        var data = JH.GetJsonValue(rs , "data.data");
        for (var i = 0 ; i < data.length ; i++){
            var d = data[i];
            var station = JH.GetJsonValue(d , "swan_station");
            var station_lat = JH.GetJsonValue(station , "lat");
            var station_long = JH.GetJsonValue(station , "long");
            var station_province_code = JH.GetJsonValue_Float(station , "province_code");
            var station_province_name = JH.GetJsonLangValue(station , "province_name");

            wave_cache(station_province_code);

            if (station_lat == "" || station_long == ""){ continue; }

            var color = JH.GetJsonValue( wave_setting , "colorname" );
            var m = srvTHF.Wave_Marker([station_lat , station_long] , d , color);
            srvTH.map.addLayer(m);
        }
    }
}

/**
*   generate control-box-wave
*   @return {controlBox}
*/
var control_topleft_icon_wave = function(rs){
    var headDate = wave_headText();
    var bodyText = wave_bodyText()

    var sumValue = "";
    if (wave_cache()){
        var arr = $.unique( wave_cache() ).sort(function(a, b){return a-b}) ;
        console.log(arr);
        if(arr.length){

            sumValue += '<span class="badge badge-danger">' + arr.length + "</span>";
        }
    }

    return controlBoxPredictWave( headDate , bodyText , sumValue);
};

/**
*   get , set wave cache
*   @param {string} province_code - province code
*   @return cache..wave
*/
var wave_cache = function(province_code){
    if (arguments.length == 0) { return JH.GetJsonValue(srvTH , "cache.wave") ;}
    if (typeof srvTH["cache"]["wave"] == "undefined"){
        srvTH["cache"]["wave"] = [];
    }
    srvTH["cache"]["wave"].push( parseInt(province_code) );
}

/**
*   get wave head text
*   @return wave head text
*/
var wave_headText = function(){
    return srvTH.TIME;
}

/**
*   get wave body text
*   @return wave body text
*/
var wave_bodyText = function(){
    var text = "";
    var wave_setting = srvTHF.GetWave_Setting();
    var province = province_cache();
    if ( !wave_cache() ){
        srvTH.isNormalSituation["wave"] = true;
        return TRANSLATOR["normal"];
    }
    var arr = $.unique( wave_cache() ).sort(function(a, b){return a-b}) ;
    for (var i = 0 ; i < arr.length ; i++){
        var d = arr[i];
        text += LabelBg( JH.GetJsonLangValue(province , d+".province_name"), JH.GetJsonValue(wave_setting,"color") );
    }
    if ( text != ""){
        // text = TRANSLATOR["wave_body_head_text"] + "<br/>" + text;
        // add total sum
        text = TRANSLATOR["wave_body_head_text"] + " (" + arr.length + ")<br/>" + text;
    }
    return text;
}

/**
*   handler service warning
*   @param {object} rs - result ในส่วนของ warning
*/
srvTH.handlerWarning = function(rs){
    var warning_setting = JH.GetJsonValue(rs , "setting");

    //  ถ้า drought result เป็น ok และ มี data ให้เก็บ data ไว้
    var drought = JH.GetJsonValue(rs , "drought");
    if ( JH.GetJsonValue(drought, "result") == "OK"){
        var data = JH.GetJsonValue(drought, "data");
        if ( data.length > 0){
            srvTH["cache"]["warning_drought"] = data
        }
    }
    //  ถ้า flood result เป็น ok และ มี data ให้เก็บ data ไว้
    var flood = JH.GetJsonValue(rs , "flood");
    if ( JH.GetJsonValue(flood, "result") == "OK"){
        var data = JH.GetJsonValue(flood, "data");
        if ( data.length > 0){
            srvTH["cache"]["warning_flood"] = data
        }
    }

    srvTHF.SetWarning_Setting( warning_setting );
}

/**
*   generate control-box-warning
*   @return {controlBox}
*/
var control_topleft_icon_warnning = function(){
    var headDate = warning_headText();
    var bodyText = warning_bodyText();

    var setting = srvTHF.GetWarning_Setting();
    var rain_color = JH.GetJsonValue(setting , "rain");
    var drought_color = JH.GetJsonValue(setting , "drought");
    var flood_color = JH.GetJsonValue(setting , "flood");
    var text = "";
    var rain = rain_cacheProvinceLevel();
    var prerain = JH.GetJsonValue( srvTH["cache"],"prerain_province");
    var drought = JH.GetJsonValue( srvTH["cache"],"warning_drought");
    var flood = JH.GetJsonValue( srvTH["cache"],"warning_flood");
    var sumValue = "";
    var sum = 0;

    // if ( prerain.length > 0 ){
    //     console.log(prerain);
    //   for (var i = 0 ; i < prerain.length ; i++){
    //       var d = prerain[i];

    //       if (JH.GetJsonValue_Int(rain, d) != 0){
    //           sum++;;
    //       }
    //   }
    // }
    if ( drought.length > 0 ){

        sum += drought.length;
    }
    if ( flood.length > 0 ){
        sum += flood.length;
    }
    if(sum > 0){
        sumValue += '<span class="badge badge-danger">' + sum + "</span>";
    }

    // add count risk by peerapong srisom 13/03/2020
    sumValue += '<span class="badge badge-danger">29</span>"';

    bodyText = warning_provinceHandler();

    return controlBoxRisk( headDate , bodyText , sumValue);
};

/**
 *  by Peerapong 20/08/2018
*   get warning province from api http://portal.disaster.go.th/portal/wsjson?queryCode=DPM010&user=xws-0010&password=xws0010
*   @return warning province text
*/
var warning_provinceHandler = function() {
  var disasterUrl = self._HOST_ + '/proxy.php?url=http%3A%2F%2Fportal.disaster.go.th%2Fportal%2Fwsjson%3FqueryCode%3DDPM010%26user%3Dxws-0010%26password%3Dxws0010';
  var data = '--';
  
  // load data and render
  $.ajax({
      type: "GET",
      crossDomain: true,
      url: disasterUrl,
      dataType: "json",
      //success: warning_provinceXmlParser,
      error:function(err){
        console.log('Connection to disaster.go.th fail');
      }
  });

  var data = '<span class="label" style="background-color:#b0621d;line-height:">เชียงราย</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">พะเยา</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">น่าน</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">อุตรดิตถ์</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">สุโขทัย</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">เพชรบูรณ์</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">หนองคาย</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">บึงกาฬ</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">นครพนม</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">สกลนคร</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">กาฬสินธุ์</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">มหาสารคาม</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">ชัยภูมิ</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">นครราชสีมา</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">บุรีรัมย์</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">นครสวรรค์</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">อุทัยธานี</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">ชัยนาท</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">กาญจนบุรี</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">สุพรรณบุรี</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">ฉะเชิงเทรา</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">ศรีสะเกษ</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">ปราจีนบุรี</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">สงขลา</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">จันทบุรี</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">เชียงใหม่</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">ชลบุรี</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">ตาก</span>';
  data += '<span class="label" style="background-color:#b0621d;line-height: normal;">พิษณุโลก</span>';

  return data;
}

/**
 * parseXML
 * @method text xml
 * @return text warning_data
 */
var warning_provinceXmlParser = function(json) {

    var warning_data = [];
    var data_list = json.contents.rows;

    if(data_list.length > 0){
        $.each(data_list, function( i, v ) {
            var province_id =  v.PROVINCE_ID; 
            var province =  v.PROVINCE_NAME; 
            var status= v.STATUS_NAME;

            if(status == 'เกิดเหตุการณ์'){
                warning_data[province_id] = province;
            }
        });
    }

  // reset array key warning_data
  warning_data = warning_data.filter(function(){return true;});

  return warning_provinceShowLabel(warning_data);
}

/**
 * fetch label warning
 * @method arry warning_data
 * @return text warning_label
 */
var warning_provinceShowLabel = function(warning_data) {
  var list = '';
  if(warning_data.length>0){
    $.each(warning_data, function( index, name ) {
      list += '<span class="label" style="background-color:#FF0000;line-height: normal;">' + name + '</span>';
    });
  }else{
    list += '--';
  }
  $('.control-box-warning').find('.control-body').html(list);
}

/**
*   get warning head text
*   @return warning head text
*/
var warning_headText = function(){
    // return prerain_headText();
    return '';
}

/**
*   get warning body text
*   @return warning body text
*/
var warning_bodyText = function(){
    var setting = srvTHF.GetWarning_Setting();
    var rain_color = JH.GetJsonValue(setting , "rain");
    var drought_color = JH.GetJsonValue(setting , "drought");
    var flood_color = JH.GetJsonValue(setting , "flood");
    var text = "";
    var rain = rain_cacheProvinceLevel();
    // var prerain = JH.GetJsonValue( srvTH["cache"],"prerain_province");
    var drought = JH.GetJsonValue( srvTH["cache"],"warning_drought");
    var flood = JH.GetJsonValue( srvTH["cache"],"warning_flood");
    //แบบเดิม
    // if ( !prerain && !drought && !flood){
    //     srvTH.isNormalSituation["warning"] = true;
    //     return TRANSLATOR["normal"];
    // }
    //เงื่อนไขที่เปลี่ยน
    if ( !drought && !flood){
        srvTH.isNormalSituation["warning"] = true;
        // return TRANSLATOR["normal"];
        return '-';
    }
    //edit by Werawan 09/07/2018
    //เอาพื้นที่ประสบอุทกภัยและดินโคลนถล่มออกและเปลี่ยนเงื่อนไขบรรทัดที่ 1221
    // พื้นที่ประสบอุทกภัยและดินโคลนถล่ม
    // if ( prerain ) {
    //     text += TRANSLATOR["risk_text_rain"] + TRANSLATOR["ambit"] + TRANSLATOR["province"] ;
    //     for (var i = 0 ; i < prerain.length ; i++){
    //         var d = prerain[i];
    //         // remove if, think it's bugs 2018-06-03
    //         if (JH.GetJsonValue_Int(rain, d) != 0){
    //             text += LabelBg(d , rain_color);
    //             var _layer = JH.GetJsonValue(srvTH.FEATURE_PROVINCE["province"], d);
    //             if ( _layer ){
    //                 _layer.setStyle({color: rain_color, weight: 2, opacity: 1});
    //             }
    //         }
    //     }
    // }else{
    //     text += TRANSLATOR["no_risk"] + TRANSLATOR["risk_text_rain"];
    // }

    // ภัยแล้ง
    if ( drought ){
        text += "<br/>" + TRANSLATOR["risk_text_drought"] + TRANSLATOR["ambit"] + TRANSLATOR["province"] ;
        for (var i = 0 ; i < drought.length ; i++){
            var d = drought[i];
            var _name = JH.GetJsonLangValue(d, "province_name");
            var _code = JH.GetJsonLangValue(d, "province_code");
            text += LabelBg(_name, drought_color);
            var _layer =  JH.GetJsonLangValue(srvTH.FEATURE_PROVINCE["province"], _code);
            if ( _layer ){
                _layer.setStyle({color: drought_color, weight: 2, opacity: 1});
            }
        }
    }else{
        // text += "<br/>" + TRANSLATOR["no_risk"] + TRANSLATOR["risk_text_drought"];
        text += "<br/> - ";
    }

    // อุทกภัย
    if ( flood ){
        text += "<br/>" + TRANSLATOR["risk_text_warning"] + TRANSLATOR["ambit"] + TRANSLATOR["province"] ;
        for (var i = 0 ; i < flood.length ; i++){
            var d = flood[i];
            var _name = JH.GetJsonLangValue(d, "province_name");
            var _code = JH.GetJsonLangValue(d, "province_code");
            text += LabelBg(_name , drought_color);
            var _layer =  JH.GetJsonLangValue(srvTH.FEATURE_PROVINCE["province"], _code);
            if ( _layer ){
                _layer.setStyle({color: drought_color, weight: 2, opacity: 1});
            }
        }
    }else{
        // text += "<br/>" + TRANSLATOR["no_risk"] + TRANSLATOR["risk_text_warning"];
        text += "<br/> - ";
    }

    return text;
}

/**
*   ====== Flood Block ======
*/
/**
*   generate control-box-flood
*   @return {controlBox}
*/
var control_topleft_icon_flood = function(){
    var sum = 0;
    var sumValue = "";
    var headDate = flood_headText();
    var bodyText = "";

    flood_bodyText();

    return controlBoxFloodWarning( headDate , bodyText , sumValue);
};

/**
*   get flood head text
*   @return flood head text
*/
var flood_headText = function(){
    return '';
}

/**
*   chack UrlExists
*   @return status
*/
var UrlExists = function(url) {
    var xhr = new XMLHttpRequest();
    xhr.open('HEAD', url, false);
    xhr.send();

    if (xhr.status == "404") {
        return false;
    } else {
        return true;
    }
}

function gethtml(content,tag_start,tag_end) 
{ 
   var x = content.indexOf(tag_start);
   x = content.indexOf(">", x);    
   var y = content.lastIndexOf(tag_end); 
   return content.slice(x + 1, y);
} 

function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function groupBy( array , f )
{
  var groups = {};
  array.forEach( function( o )
  {
    var group = JSON.stringify( f(o) );
    groups[group] = groups[group] || [];
    groups[group].push( o );  
  });
  return Object.keys(groups).map( function( group )
  {
    return groups[group]; 
  })
}
/**
*  by Permporn 21/08/2018
*   get flood body text
*   @return flood body text
*/
var flood_bodyText = function() {

    var url = self._HOST_ + "/dowload_datas_warning";
    var url_file = self._HOST_ + "/datas/FFPI_Table.html";

    /* download file .html */
    $.ajax({
        type: "GET",
        crossDomain: true,
        url: url,
            error:function(err){
            console.log('Connection datas/dwr_data_lastest.xlsx fail');
        }
    });
    
    $.ajax({
        type: "GET",
        url: url_file,
        dataType: "text",
        success: function(data) {
            var body =gethtml(data,"<body","</body>");
            var data = gethtml(body,'<script','[]}</script>');
            var ck = IsJsonString(data+"[]}");
            var obj;
            if(ck === true){
                obj = JSON.parse(data+"[]}");
            }
            var myArray = [];
            if(typeof(obj) != 'undefined' && typeof(obj.x.data) != 'undefined' ){
                if( obj.x.data.length > 0){

                    for(var j=0 ; j < obj.x.data[0].length ; j++){
                        myArray.push([]);
                    }

                    var datas, d = [];
                    for(var i=0 ; i < obj.x.data.length ; i++){// 
                        datas = obj.x.data;
                        var e = [];
                        if(datas[i].length > 0){
                            for(var j=0 ; j < datas[i].length ; j++){
                                myArray[j].push(datas[i][j]);
                            }
                        }
                    }
                    if(myArray.length > 0){
                        var list = '';
                        var sum = 0;
                        var arr_province = [];
                        var a = 0;
                        for(var k=0 ; k < myArray.length ; k++){
                            var station = myArray[k][6];
                            var province =  myArray[k][1];
                            arr_province.push(province);
                        }
                        var result = groupBy(arr_province, function(item){ return item;});
                        for(var j=0 ; j < result.length ; j++){
                            list += '<span class="label" style="background-color:#FFA500;line-height: normal;">' + result[j][0] + '</span>';
                        }
                        $('.control-box-flood-warning').find('.control-body').html(list);
                        $('.control-box-flood-warning').find('.icon').html('<span class="badge badge-danger">'+result.length+'</span>' );
                    }else{
                        $('.control-box-flood-warning').find('.control-body').html("ปกติ");
                    }
                }else{
                    $('.control-box-flood-warning').find('.control-body').html("ปกติ");
                }
            }else{
                $('.control-box-flood-warning').find('.control-body').html("ปกติ");
            }
            
        }
    });

    // read file .xlxs
    // if(UrlExists(url_file) == true){

    //     var oReq = new XMLHttpRequest();
    //     oReq.open("GET", url_file, true);
    //     oReq.responseType = "arraybuffer";
    //     var datas = '';

    //     /* onload read .xlxs */
    //     oReq.onload = function(e) {

    //         var arraybuffer = oReq.response;
    //         /* convert data to binary string */
    //         var data = new Uint8Array(arraybuffer);

    //         var arr = new Array();

    //         for(var i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);

    //         var bstr = arr.join("");

    //         /* Call XLSX */
    //         var workbook = XLSX.read(bstr, {type:"binary"});

    //         /* DO SOMETHING WITH workbook HERE */
    //         var first_sheet_name = workbook.SheetNames[0];
    //         /* Get worksheet */
    //         var worksheet = workbook.Sheets[first_sheet_name];

    //         var datas = XLSX.utils.sheet_to_json(worksheet,{raw:true})

    //         var array_yellow = [];
    //         var array_red = [];
    //         var arr_all = [];
    //         var k = 0;
    //         var list_red = '';
    //         var list_yellow = '';
    //         var monthNamesThai = ["ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
    //         var date_now = moment(new Date().toLocaleString('en-US', {timeZone: "Asia/Bangkok"})).format('YYYY-MM-DD');

    //             for(var i = 1; i <= datas.length-1 ; i++){
    //                 /* check column date */
    //                 if(typeof datas[i]["__EMPTY_8"] !== 'undefined'){

    //                     var s = datas[i]["__EMPTY_8"].split(" ")
    //                     var find = monthNamesThai.indexOf(s[1])+1;
    //                     /* conver Thai month */
    //                     if(find >=0 && find <= 11){
    //                         find = find+"";
    //                         if(find.length == 1){
    //                             find = "0"+find;
    //                         }
    //                         var date = moment(new Date("2018-"+find+"-"+s[0]).toLocaleString('en-US', {timeZone: "Asia/Bangkok"})).format('YYYY-MM-DD');
    //                         var diff_date = moment.duration(moment(date_now).diff(moment(date))).asDays()

    //                         /* check no more than 1 day */
    //                         if(diff_date <= 1){
    //                             if(typeof datas[i]["__EMPTY_7"] !== 'undefined'){

    //                                 if(typeof datas[i]["__EMPTY_1"] == 'undefined'){
    //                                     datas[i]["__EMPTY_1"] = datas[i-1]["__EMPTY_1"]
    //                                 }
    //                                 if(typeof datas[i]["__EMPTY_4"] == 'undefined'){
    //                                     datas[i]["__EMPTY_4"] = datas[i-1]["__EMPTY_4"]
    //                                 }

    //                                 var str     = datas[i]["__EMPTY_7"];
    //                                 var station =  datas[i]["__EMPTY_1"];
    //                                 var prov    = datas[i]["__EMPTY_4"];
    //                                 var str_red = "สีแดง";
    //                                 var str_yellow = "สีเหลือง";

    //                                 /* selcet status red & yellow */
    //                                 if(str.search(str_red) > 0){

    //                                     array_red.push({ status: "เตือนภัยสีแดง", status: str, station:station, province:prov});

    //                                     list_red += '<span class="label" style="background-color:#b0621d">' + station + " จ."+ prov + '</span>';
    //                                 }

    //                                 if(str.search(str_yellow) > 0){

    //                                     array_yellow.push({ status: "เตือนภัยสีเหลือง",status: str, station:station, province:prov});

    //                                     list_yellow += '<span class="label" style="background-color:#FFA500">' + station + " จ."+ prov + '</span>';
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 }
    //             }
    //             if(array_red.length > 0 || array_yellow.length > 0){
    //                 oReq.datas = '<div><b>เตือนภัยสีแดง : </b> '+list_red+'<br>'+'<b>เตือนภัยสีเหลือง : </b> '+list_yellow+'</div>';
    //                 $('.control-box-flood-warning').find('.control-body').html(oReq.datas);
    //             }else{
    //                 $('.control-box-flood-warning').find('.control-body').html("ปกติ");
    //             }
    //             if(array_red.length > 0){
    //                  $('.control-box-flood-warning').find('.icon').html('<span class="badge badge-danger">'+array_red.length+'</span>' );
    //             }

    //             var controlBox = $('.control-box-flood-warning');
    //             var controlBody = controlBox.find('.control-body');
    //             var controlDiv = controlBody.find('div');

    //             var controlBodyHeight = controlBody.height();
    //             var controlDivHeight = controlDiv.height();

    //             if (controlDivHeight > controlBodyHeight){
    //                 controlBox.find('.control-arrow').addClass('hasDown');
    //             }
    //     }
    //     oReq.send();
    // }else{
    //     return "ปกติ"
    // }
}

/**
*   ====== // Flood Block ======
*/

/**
*   สร้าง element control-box
*   @param {string} controlClass - class
*   @param {string} headText - header text
*   @param {string} headDate - header date
*   @param {string} bodyText - body text
*   @return {element}
*/
var controlBox = function(colClass, controlClass, headText , headDate , bodyText , sumValue){
    var row = document.createElement('div');
    row.className = "row";

    var div = document.createElement('div');
    div.className = "col-md-7 " + colClass;

    var control = document.createElement('div');
    control.className="control-box control-box-"+controlClass;

    var div_control_head = document.createElement('div');
    div_control_head.className='control-head';

    var div_icon = document.createElement('div');
    div_icon.className='icon';
    div_icon.innerHTML = sumValue;
    // add event icon click to expand control-box
    div_icon.addEventListener("click", function(){
        var targetRow = $(this).closest('div.row');
        if ( srvTH.currentRow ){
            srvTH.currentRow.removeClass('active');
            if ( targetRow.index() == srvTH.currentRow.index() ){
                srvTH.currentRow = null;
                return false;
            }
        }
        targetRow.addClass('active');
        srvTH.currentRow = targetRow;
    });
    var div_info = document.createElement('div');
    div_info.className='info';
    // add event info click to open modal
    div_info.addEventListener("click", function(){
        $('#modal-'+controlClass).modal();
    });
    // div header text
    var div_control_head_text = document.createElement('div');
    div_control_head_text.className='control-head-text';
    div_control_head_text.innerHTML = headText + "<span>"+headDate+"</span>";

    // add icon, info, header text into div
    div_control_head.appendChild(div_icon);
    div_control_head.appendChild(div_info);
    div_control_head.appendChild(div_control_head_text);

    // div body text
    var div_control_body = document.createElement('div');
    div_control_body.className='control-body';
    div_control_body.innerHTML = '<div style="">'+bodyText+'</div>';

    // div arrow down, up
    var div_control_arrow = document.createElement('div');
    div_control_arrow.className='control-arrow';
    div_control_arrow.innerHTML = '<span class="fa fa-angle-down"></span><span class="fa fa-angle-up"></span>';

    control.appendChild(div_control_head);
    control.appendChild(div_control_body);
    control.appendChild(div_control_arrow);

    div.appendChild(control);
    row.appendChild(div);
    return row;
}

/**
*   สร้าง a tag
*   @param {string} text - ชื่อที่จะแสดง
*   @param {string} href - url
*   @return {string}
*/
var genTagA = function(text , href){
    s = '<a ';
    if (href){
        s += 'href="'+href+'" ';
    }
    s += '> ' + text + '</a>';
    return s
}

var genTagA_blank = function(text , href){
    s = '<a ';
    if (href){
        s += 'href="'+href+'" target="_blank"';
    }
    s += '> ' + text + '</a>';
    return s
}

/**
*   สร้าง element control-box-rain
*   @param {string} headDate - header date
*   @param {string} bodyText - body text
*   @return {controlBox}
*/
var controlBoxRain = function(headDate , bodyText , sumValue){
    return controlBox('offset-md-2','rain' , genTagA(JH.GetJsonValue(TRANSLATOR, "rain") , srvTH._MAIN_PAGE_+'#box-rain') , headDate , bodyText , sumValue)
}

/**
*   สร้าง element control-box-Waterlevel
*   @param {string} headDate - header date
*   @param {string} bodyText - body text
*   @return {controlBox}
*/
var controlBoxWaterlevel = function(headDate , bodyText , sumValue){
    return controlBox('offset-md-1', 'waterlevel' , genTagA(JH.GetJsonValue(TRANSLATOR, "waterlevel") , srvTH._MAIN_PAGE_+'#box-waterlevel') , headDate , bodyText , sumValue)
}

/**
*   สร้าง element control-box-dam
*   @param {string} headDate - header date
*   @param {string} bodyText - body text
*   @return {controlBox}
*/
var controlBoxDam = function(headDate , bodyText , sumValue){
    return controlBox('offset-md-1', 'dam' , genTagA(JH.GetJsonValue(TRANSLATOR, "dam") , srvTH._MAIN_PAGE_+'#box-dam') , headDate , bodyText , sumValue)
}

/**
*   สร้าง element control-box-Waterquality
*   @param {string} headDate - header date
*   @param {string} bodyText - body text
*   @return {controlBox}
*/
var controlBoxWaterquality = function(headDate , bodyText , sumValue){
    return controlBox('offset-md-2', 'waterquality' , genTagA(JH.GetJsonValue(TRANSLATOR, "waterquality") , srvTH._MAIN_PAGE_+'#box-waterquality') , headDate , bodyText , sumValue)
}

/**
*   สร้าง element control-box-Storm
*   @param {string} headDate - header date
*   @param {string} bodyText - body text
*   @return {controlBox}
*/
var controlBoxStorm = function(headDate , bodyText , sumValue){
    return controlBox('offset-md-3', 'storm' , genTagA(JH.GetJsonValue(TRANSLATOR, "storm") , srvTH._MAIN_PAGE_+'#box-storm') , headDate , bodyText , sumValue )
}

/**
*   สร้าง element control-box-PredictRain
*   @param {string} headDate - header date
*   @param {string} bodyText - body text
*   @return {controlBox}
*/
var controlBoxPredictRain = function(headDate , bodyText , sumValue){
    return controlBox('offset-md-4', 'clock' , genTagA(JH.GetJsonValue(TRANSLATOR, "predict_rain") , srvTH._MAIN_PAGE_+'#box-predict_rain') , headDate , bodyText , sumValue)
}

/**
*   สร้าง element control-box-PredictWave
*   @param {string} headDate - header date
*   @param {string} bodyText - body text
*   @return {controlBox}
*/
var controlBoxPredictWave = function(headDate , bodyText , sumValue){
    return controlBox('offset-md-4', 'wave' , genTagA(JH.GetJsonValue(TRANSLATOR, "predict_wave") , srvTH._MAIN_PAGE_+'#box-predict_wave') , headDate , bodyText , sumValue)
}

/**
*   สร้าง element control-box-Risk
*   @param {string} headDate - header date
*   @param {string} bodyText - body text
*   @return {controlBox}
*/
var controlBoxRisk = function(headDate , bodyText , sumValue){
    // return controlBox('offset-md-3', 'warning' , genTagA(JH.GetJsonValue(TRANSLATOR, "risk") , srvTH._MAIN_PAGE_+'#box-risk') , headDate , bodyText , sumValue)
    return controlBox('offset-md-3', 'warning' , genTagA_blank(JH.GetJsonValue(TRANSLATOR, "risk") , 'http://portal.disaster.go.th/portal/ext/nirapai/2020040907.pdf') , headDate , bodyText , sumValue)
}

/**
*   สร้าง element control-box-flood
*   @param {string} headDate - header date
*   @param {string} bodyText - body text
*   @return {controlBox}
*/
var controlBoxFlood = function(headDate , bodyText , sumValue){
    return controlBox('offset-md-3', 'flood' , genTagA(JH.GetJsonValue(TRANSLATOR, "flood_forecast") , srvTH._MAIN_PAGE_+'#box-flood') , headDate , bodyText , sumValue)
}

/**
*   สร้าง element control-box-flood
*   @param {string} headDate - header date
*   @param {string} bodyText - body text
*   @return {controlBox}
*/
var controlBoxFloodWarning = function(headDate , bodyText , sumValue){
    return controlBox('offset-md-3', 'flood-warning' , genTagA(JH.GetJsonValue(TRANSLATOR, "flood_warning") , srvTH._MAIN_PAGE_+'#box-flood') , headDate , bodyText , sumValue)
    //return controlBox('offset-md-3', 'flood-warning' , genTagA(JH.GetJsonValue(TRANSLATOR, "flood_warning") , 'http://live1.haii.or.th/product/latest/flashflood/FFPI_Table.html') , headDate , bodyText , sumValue)
}


/**
*   เลื่อนกล่อง ลง ตอนกดลูกศร ลง
*   @param {element} i - element ลูกศรขึ้น
*/
var arrowDownClick = function(i){
    var controlArrow = $(i).closest('.control-arrow');
    var controlBody = $(i).closest('.control-box').find('.control-body');
    var controlDiv = controlBody.find('div');
    var bodyHeight = controlBody.height();
    var divHeight = controlDiv.height();

    var divDif = divHeight - bodyHeight;

    var top = parseInt(controlDiv.css('top'), 10);
    var fsize = parseInt(controlDiv.css('font-size'), 10);
    top -= fsize;
    if (divDif + top + fsize >= 0){
        controlArrow.addClass('hasUp');
    }else{
        controlArrow.removeClass('hasDown');
        clearInterval(srvTH["cache"]["interval"]);
        if (srvTH["cache"]["interval"]){
            srvTH["cache"]["interval"] = null;
        }
    }
    controlDiv.css('top' , top+'px');
};
/**
*   เลื่อนกล่อง ขึ้น ตอนกดลูกศร ขึ้น
*   @param {element} i - element ลูกศรลง
*/
var arrowUpClick =function(i){
    var controlArrow = $(i).closest('.control-arrow');
    var controlBody = $(i).closest('.control-box').find('.control-body');
    var controlDiv = controlBody.find('div');
    var bodyHeight = controlBody.height();
    var divHeight = controlDiv.height();
    var divDif = divHeight - bodyHeight;

    var top = parseInt(controlDiv.css('top'), 10);
    var fsize = parseInt(controlDiv.css('font-size'), 10);
    top += fsize;
    if (top < 0){
        controlArrow.addClass('hasDown');
    }else{
        controlArrow.removeClass('hasUp');
        clearInterval(srvTH["cache"]["interval"]);
        if (srvTH["cache"]["interval"]){
            srvTH["cache"]["interval"] = null;
        }
        top = 0;
    }
    controlDiv.css('top' , top+'px');
};
