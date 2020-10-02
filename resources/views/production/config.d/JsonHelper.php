<?php
$l = \App\Helpers\LocaleHelper::getInstance();

$arr[] = $l->getLocale();
$arr[] = env('SITE_LOCALE_FALLBACK');
$arr[] = env('SITE_LOCALES');

return [
    'asset' => array(
        'JsonHelper' => array(
            'content' => array(
                array(
                    'js',
                    'js/jsonHelper.min.js',
                    '',
                    true
                ),
                array(
                    'static-js',
                    'JH.SetLang("'. $l->getLocale() .'","'. env('SITE_LOCALE_FALLBACK') .'",'. json_encode($l->getAllLocales()) .')'
                ),
                array(
                    'vendor-script',
                    'numeral/numeral.min.js',
                    '',
                    true
                )
            )
        )
    )
];
