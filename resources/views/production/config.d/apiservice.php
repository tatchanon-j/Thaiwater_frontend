<?php

function ApiService_Translator_JS()
{
    return "var apiService_Translator = {\nERR_NOTCONNECTED:'" . trans("/master.apiService_ERR_NOTCONNECTED") .
         "',\n" . "ERR_PARSERERROR:'" . trans("/master.apiService_ERR_PARSERERROR") . "',\n" . "ERR_TIMEOUT:'" .
         trans("/master.apiService_ERR_TIMEOUT") . "',\n" . "ERR_ABORT:'" .
         trans("/master.apiService_ERR_ABORT") . "',\n" . "REQ_ERROR:'" .
         trans("/master.apiService_REQ_ERROR") . "',\n" . "CLOSE:'" . trans("/master.apiService_CLOSE") .
         "'}\n";
}

return [
    'asset' => array(
        'apiservice' => array(
            'use' => array(
            		'jquery'
            ),
            'content' => array(
            	array(
            		'vendor-js',
            		'crypto-js/aes.js',
            		'',
            	    true
            	),
            	array(
            		'vendor-js',
            		'crypto-js/hmac-sha256.js',
            		'',
            		true
            	),
                array(
                    'js',
                    'js/apiservice.min.js',
                    '',
                    true
                ),
            	array(
                    'static-js',
                    ApiService_Translator_JS()
                )
            )
        )
    )
];
