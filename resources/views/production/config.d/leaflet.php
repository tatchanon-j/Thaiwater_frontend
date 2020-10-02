<?php
return [
    'asset' => array(
        'leaflet' => array(
            'use' => array(
                'jquery',
                'JsonHelper',
            ),
            'content' => array(
                array(
                    'vendor-css',
                    'leaflet/leaflet.min.css',
                    '',
                    true
                ),
                array(
                    'vendor-js',
                    'leaflet/leaflet.min.js',
                    '',
                    true
                ),
                array(
                    'js',
                    'js/frontoffice/home/geojson/thailand.js',
                    '',
                    true
                ),
                array(
                    'js',
                    'js/frontoffice/home/geojson/basin.js',
                    '',
                    true
                ),
                array(
                    'js',
                    'js/leaflet.min.js',
                    '',
                    true
                ),
                array(
                    'static-js',
                    "LL.init()"
                )

            )
        )
    )
];
?>
