<?php
$l = \App\Helpers\LocaleHelper::getInstance();
$locale = $l->getLocale();
if ($locale == "jp") { $locale = "ja"; }
return [
    'asset' => array(
        'bootbox' => array(
            'use' => array(
                'bootstrap'
            ),
            'content' => array(
                array(
                    'vendor-js',
                    'misc/js/bootbox.min.js'
                )
            )
        ),
        'Font-Kanit' => array(
            'content' => array(
                array(
                    'vendor-css',
                    'Font-Kanit/Kanit.css'
                )
            )
        ),
        'parsley' => array(
            'use' => array(
                'bootstrap'
            ),
            'content' => array(
                array(
                    'vendor-js',
                    'parsley/2.3.11/js/parsley.min.js'
                ),
                array(
                    'vendor-js',
                    'parsley/2.3.11/js/i18n/'. $locale .'.js'
                ),
                array(
                    'static-js',
                    'var g_parsleyOptions={successClass:\'has-success\',errorClass:\'has-error\',classHandler: function(_el){return _el.$element.closest(\'.form-group\')}}'
                ),
                array(
                    'static-js',
                    'window.Parsley.setLocale("'. $locale .'");'
                )
            )
        ),
        'moment' => array(
            'content' => array(
                array(
                    'vendor-js',
                    'bower_components/moment/min/moment-with-locales.min.js'
                ),
                array(
                    'static-js',
                    'moment.locale("'. $locale .'")'
                ),
            )
        ),
        'jsencrypt' => array(
            'content' => array(
                array(
                    'vendor-js',
                    'misc/js/jsencrypt.min.js'
                )
            )
        ),
        'forge' => array(
            'content' => array(
                array(
                    'vendor-js',
                    'misc/js/forge.all.min.js'
                )
            )
        ),
        'numeral' => array(
            'content' => array(
                array(
                    'vendor-js',
                    'numeral/numeral.min.js'
                )
            )
        )
    )
];
