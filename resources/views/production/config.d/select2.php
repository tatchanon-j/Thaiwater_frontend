<?php
return [
    'asset' => array(
        'select2' => array(
            'content' => array(
                array(
                    'vendor-css',
                    'bower_components/select2/dist/css/select2.min.css'
                ),
                array(
                    'vendor-js',
                    'bower_components/select2/dist/js/select2.min.js'
                ),
                array(
                    'static-js',
                    '$.fn.select2.defaults.set("width", "100%");'
                )
            )
        )
    )
];
