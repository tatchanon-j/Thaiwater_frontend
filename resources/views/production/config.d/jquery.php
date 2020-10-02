<?php
return [
    'asset' => array(
        'jquery' => array(
            'content' => array(
                array(
                    'vendor-script',
                    'bower_components/jquery/dist/jquery.min.js'
                )
            )
        ),
        'jquery-minicolors' => array(
            'use' => 'jquery',
            'content' => array(
                array(
                    'vendor-script',
                    'bower_components/jquery-minicolors/jquery.minicolors.js'
                ),
                array(
                    'vendor-css',
                    'bower_components/jquery-minicolors/jquery.minicolors.css'
                ),
                array(
                    'static-js',
                    "$(function(){
                      $.minicolors.defaults = $.extend($.minicolors.defaults, {
                        theme: 'bootstrap'
                        });
                    });"
                )
            )
        )
    )
];
