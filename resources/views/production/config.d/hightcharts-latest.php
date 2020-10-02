<?php
return [
    'asset' => array(
        'highcharts-latest' => array(
            'use' => array(
                'jquery',
                'JsonHelper',
                'moment'
            ),
            'content' => array(
                array(
                    'vendor-script',
                    'bower_components/highcharts-latest/highcharts.js',
                    '',
                    true
                ),
                array(
                    'vendor-script',
                    'bower_components/highcharts-latest/modules/exporting.js',
                    '',
                    true
                ),
                array(
                    'vendor-script',
                    'highcharts/grouped-categories.js',
                    '',
                    true
                ),
                array(
                    'vendor-script',
                    'numeral/numeral.min.js',
                    '',
                    true
                ),
                array(
                    'script',
                    'js/highchart.js',
                    '',
                    true
                ),
                array(
                    'static-js',
                    'srvHighchart.init()'
                )
            )
        )
    )
];
