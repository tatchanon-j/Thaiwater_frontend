<?php
$view = \App\Helpers\ViewHelper::getInstance();
// dd($view);
$l = \App\Helpers\LocaleHelper::getInstance();
$csrf = \Request::cookie(\App\Helpers\ApiServiceHelper::CSRF_COOKIE);

$view->asset('Font-Kanit', 'bootbox', 'apiservice', 'adminLTE', 'jquery', 'leaflet', 'FontAwesome', 'moment', 'JsonHelper');
$view->resource('theme-css', 'css/main.css');
$view->resource('css', 'themes/default/css/frontoffice/home/leaflet.css');
$view->resource('css', 'themes/default/css/frontoffice/home/main.css');

if ($p && $p == 'index2') {
	$view->resource('js', 'js/frontoffice/home/NewUserThailand.js');
} else {
    $view->resource('js', 'js/frontoffice/home/userThailand.js');
	$view->resource('js', 'js/frontoffice/home/xlsx.full.min.js');
}

$view->resource('js', 'js/frontoffice/home/thailandFunc.min.js');
$view->resource('js', 'js/frontoffice/home/geojson/main-river.js');
?>
<!DOCTYPE html>
<html >
<head>
    <title>{{ trans('frontoffice/home/master.main-menu-thailand') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        .btn-primary-index{
            color: #fff!important;
            background: #063475;
            border-radius: 35px!important;
        }
        .info.date {
            background-color: #063575!important;
            font-size: 1.5em;
        }



        .badge-danger {
            background-color: #ff0000!important;
        }

            .icon {
            position : relative;
        }


        .badge {
            position: absolute;
            right: -10px;
            top: -8px;
            font-size: 11px!important;
            font-weight: 300;
            height: 18px;
            color: #fff;
            padding: 3px 6px;
            -webkit-border-radius: 12px!important;
            -moz-border-radius: 12px!important;
            border-radius: 12px!important;
            text-shadow: none!important;
            text-align: center;
        }

    </style>
</head>
<body>
    {!! $view->flushAsset(false); !!}
    <style>

    </style>
    <!-- modal -->
    <div class="bootbox modal fade" id="modal-rain" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table border="1" class="normal-table" id="modal-rain-table">
                        <tbody>
                            <tr>
                                <th width="10%">{{ trans("frontoffice/home/index._color") }}</th>
                                <th >{{ trans("frontoffice/home/index._meaning") }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="bootbox modal fade" id="modal-waterlevel" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table border="1" class="normal-table" id="modal-waterlevel-table">
                        <tbody>
                            <tr>
                                <th width="10%">{{ trans("frontoffice/home/index._color") }}</th>
                                <th >{{ trans("frontoffice/home/index._meaning") }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="bootbox modal fade" id="modal-dam" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table border="1" class="normal-table" id="modal-dam-table">
                        <tbody>
                            <tr>
                                <th width="10%">{{ trans("frontoffice/home/index._color") }}</th>
                                <th >{{ trans("frontoffice/home/index._meaning") }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

		<!-- Flood forecast DWR Modal -->
		<div class="bootbox modal fade" id="modal-flood-warning" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table border="1" class="normal-table" id="modal-flood-warning-table">
                        <tbody>
                            <tr>
                                <th width="10%">{{ trans("frontoffice/home/index._color") }}</th>
                                <th >{{ trans("frontoffice/home/index._meaning") }}</th>
                            </tr>
														<tr>
                                <td style="background-color:red"></td>
                                <td>{{ trans("frontoffice/home/index.flood_warning_red") }}</td>
                            </tr>
														<tr>
                                <td style="background-color:yellow"></td>
                                <td>{{ trans("frontoffice/home/index.flood_warning_yellow") }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
		<!-- // Flood forecast DWR Modal -->

    <div class="bootbox modal fade" id="modal-waterquality" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table border="1" class="normal-table" id="modal-waterquality-salinity-table">
                        <tbody>
                            <tr>
                                <th colspan="3">{{ str_replace("<br/>", " ", trans("frontoffice/home/index.salinity") )}}</th>
                            </tr>
                            <tr>
                                <th width="10%">{{ trans("frontoffice/home/index._color") }}</th>
                                <th width="40%">{{ trans("frontoffice/home/index._value") }}</th>
                                <th width="40%">{{ trans("frontoffice/home/index._meaning") }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <table border="1" class="normal-table" id="modal-waterquality-do-table">
                        <tbody>
                            <tr>
                                <th colspan="3">{{ str_replace("<br/>", " " , trans("frontoffice/home/index.do") ) }}</th>
                            </tr>
                            <tr>
                                <th width="10%">{{ trans("frontoffice/home/index._color") }}</th>
                                <th width="40%">{{ trans("frontoffice/home/index._value") }}</th>
                                <th width="40%">{{ trans("frontoffice/home/index._meaning") }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <table border="1" class="normal-table" id="modal-waterquality-ph-table">
                        <tbody>
                            <tr>
                                <th colspan="3">{{ str_replace("<br/>", " " , trans("frontoffice/home/index.ph") ) }}</th>
                            </tr>
                            <tr>
                                <th width="10%">{{ trans("frontoffice/home/index._color") }}</th>
                                <th width="40%">{{ trans("frontoffice/home/index._value") }}</th>
                                <th width="40%">{{ trans("frontoffice/home/index._meaning") }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <table border="1" class="normal-table" id="modal-waterquality-turbid-table">
                        <tbody>
                            <tr>
                                <th colspan="3">{{ str_replace("<br/>", " " , trans("frontoffice/home/index.turbid") ) }}</th>
                            </tr>
                            <tr>
                                <th width="10%">{{ trans("frontoffice/home/index._color") }}</th>
                                <th width="40%">{{ trans("frontoffice/home/index._value") }}</th>
                                <th width="40%">{{ trans("frontoffice/home/index._meaning") }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <table border="1" class="normal-table" id="modal-waterquality-tds-table">
                        <tbody>
                            <tr>
                                <th colspan="3">{{ str_replace("<br/>", " " , trans("frontoffice/home/index.tds") ) }}</th>
                            </tr>
                            <tr>
                                <th width="10%">{{ trans("frontoffice/home/index._color") }}</th>
                                <th width="40%">{{ trans("frontoffice/home/index._value") }}</th>
                                <th width="40%">{{ trans("frontoffice/home/index._meaning") }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- modal storm -->
    @include('frontoffice/home/modal.storm')
    <div class="bootbox modal fade" id="modal-clock" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table border="1" class="normal-table" id="modal-clock-table">
                        <tbody>
                            <tr>
                                <th width="10%">{{ trans("frontoffice/home/index._color") }}</th>
                                <th >{{ trans("frontoffice/home/index._meaning") }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="bootbox modal fade" id="modal-wave" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table border="1" class="normal-table" id="modal-wave-table">
                        <tbody>
                            <tr>
                                <th width="10%">{{ trans("frontoffice/home/index._color") }}</th>
                                <th >{{ trans("frontoffice/home/index._meaning") }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="bootbox modal fade" id="modal-warning" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
    <!-- info -->
    <div id="info" style="" class="form-row">
        <div class="normalsituation">
            {{ trans("frontoffice/home/index.normal_situation") }}
        </div>
    </div>
    <!-- map -->
    <div style="width:100%; height:100%" id="map" class="leaflet-thailland"></div>

    <div class="ajax-loading-modal"><!-- Place at bottom of page --></div>
    {!! $view->flushAsset(true); !!}
    <script>
    $(function(){
        var body = $('body')
        $(document).ajaxStart(function() {
            body.addClass("ajax-loading")
        })
        $(document).ajaxStop(function() {
            body.removeClass("ajax-loading");
        })

        apiService.init('{!! env("API_SERVER") !!}','{{ $csrf }}',apiService_Translator);
        TRANSLATOR = {

            'info_legend' : '{{ trans("frontoffice/home/index.info_legend") }}',
            'normal' : '{{ trans("frontoffice/home/index.normal") }}',
            'normal_situation' : '{{ trans("frontoffice/home/index.normal_situation") }}',

            'rain' : '{{ trans("frontoffice/home/index.rain") }}',
            'waterlevel' : '{{ trans("frontoffice/home/index.waterlevel") }}',
            'dam' : '{{ trans("frontoffice/home/index.dam") }}',
            'waterquality' : '{{ trans("frontoffice/home/index.waterquality") }}',
            'storm' : '{{ trans("frontoffice/home/index.storm") }}',
            'no_storm' : '{{ trans("frontoffice/home/index.no_storm") }}',
            'predict_rain' : '{{ trans("frontoffice/home/index.predict_rain") }}',
            'no_predict_rain' : '{{ trans("frontoffice/home/index.no_predict_rain") }}',
            'predict_wave' : '{{ trans("frontoffice/home/index.predict_wave") }}',
            'risk' : '{{ trans("frontoffice/home/index.risk") }}',

            'standard': '{{ trans("frontoffice/home/index.standard") }}',
            'standard_>': '{{ trans("frontoffice/home/index.standard_>") }}',
            'standard_<': '{{ trans("frontoffice/home/index.standard_<") }}',

            'rain_level_4' : '{{ trans("frontoffice/home/index.rain_level_4") }}',
            'rain_level_3' : '{{ trans("frontoffice/home/index.rain_level_3") }}',
            'rain_level_0' : '{{ trans("frontoffice/home/index.rain_level_0") }}',

            'waterlevel_level_1' : '{{ trans("frontoffice/home/index.waterlevel_level_1") }}',
            'waterlevel_level_2' : '{{ trans("frontoffice/home/index.waterlevel_level_2") }}',
            'waterlevel_level_3' : '{{ trans("frontoffice/home/index.waterlevel_level_3") }}',
            'waterlevel_level_4' : '{{ trans("frontoffice/home/index.waterlevel_level_4") }}',
            'waterlevel_level_5' : '{{ trans("frontoffice/home/index.waterlevel_level_5") }}',
            'waterlevel_level_0' : '{{ trans("frontoffice/home/index.waterlevel_level_0") }}',

            'dam_high_text': '{{ trans("frontoffice/home/index.dam_high_text") }}',
            'dam_low_text': '{{ trans("frontoffice/home/index.dam_low_text") }}',

            'salinity_value_>': '{{ trans("frontoffice/home/index.salinity_value_>") }}',
            'salinity_value_<': '{{ trans("frontoffice/home/index.salinity_value_<") }}',
            'salinity_2': '{{ trans("frontoffice/home/index.salinity_2") }}',
            'salinity_0.5': '{{ trans("frontoffice/home/index.salinity_0.5") }}',
            'salinity_0.25': '{{ trans("frontoffice/home/index.salinity_0.25") }}',

            'do_value_>': '{{ trans("frontoffice/home/index.do_value_>") }}',
            'do_value_<': '{{ trans("frontoffice/home/index.do_value_<") }}',
            'do_3': '{{ trans("frontoffice/home/index.do_3") }}',

            'waterquality_popuptext_ph': '{{ trans("frontoffice/home/index.waterquality_popuptext_ph") }}',
            'waterquality_popuptext_salinity': '{{ trans("frontoffice/home/index.waterquality_popuptext_salinity") }}',
            'waterquality_alert_salinity': '{{ trans("frontoffice/home/index.waterquality_alert_salinity") }}',
            'waterquality_popuptext_turbid': '{{ trans("frontoffice/home/index.waterquality_popuptext_turbid") }}',
            'waterquality_popuptext_ec': '{{ trans("frontoffice/home/index.waterquality_popuptext_ec") }}',
            'waterquality_popuptext_tds': '{{ trans("frontoffice/home/index.waterquality_popuptext_tds") }}',
            'waterquality_popuptext_chlorophyll': '{{ trans("frontoffice/home/index.waterquality_popuptext_chlorophyll") }}',
            'waterquality_popuptext_do': '{{ trans("frontoffice/home/index.waterquality_popuptext_do") }}',
            'waterquality_alert_do': '{{ trans("frontoffice/home/index.waterquality_alert_do") }}',
            'waterquality_popuptext_temp': '{{ trans("frontoffice/home/index.waterquality_popuptext_temp") }}',
            'waterquality_popuptext_depth': '{{ trans("frontoffice/home/index.waterquality_popuptext_depth") }}',

            'wave_body_head_text' : '{{ trans("frontoffice/home/index.wave_body_head_text") }}',

            'predict_rain_level_5' : '{{ trans("frontoffice/home/index.predict_rain_level_5") }}',
            'predict_rain_level_4' : '{{ trans("frontoffice/home/index.predict_rain_level_4") }}',

            'predict_wave_text' : '{{ trans("frontoffice/home/index.predict_wave_text") }}',

            'ambit' : '{{ trans("frontoffice/home/index.ambit") }}',
            'province' : '{{ trans("frontoffice/home/index.province") }}',
            'no_risk' : '{{ trans("frontoffice/home/index.no_risk") }}',
            'risk_text_rain' : '{{ trans("frontoffice/home/index.risk_text_rain") }}',
            'risk_text_drought' : '{{ trans("frontoffice/home/index.risk_text_drought") }}',
            'risk_text_warning' : '{{ trans("frontoffice/home/index.risk_text_warning") }}',
            'risk_text_flood' : '{{ trans("frontoffice/home/index.risk_text_flood") }}',

						'flood_warning': '{{ trans("frontoffice/home/index.flood_warning") }}',
						'flood_warning_red': '{{ trans("frontoffice/home/index.flood_warning") }}',
						'flood_warning_yellow': '{{ trans("frontoffice/home/index.flood_warning") }}',
        };
        LANG = '{{ $l->getLocale() }}';
        srvTH.Init('{{ URL::to("/") }}' , '/resources/images/', GEOJSON);
    });
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-83737647-4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-83737647-4');
    </script>
</body>
