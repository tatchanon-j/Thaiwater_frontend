<?php
$l = \App\Helpers\LocaleHelper::getInstance();
$locale = $l->getLocale();
if ($locale == "jp") {$locale = "ja";}
return [
    'asset' => array(
        'bootstrap' => array(
            'use' => array(
                'jquery',
            ),
            'content' => array(
                array(
                    'vendor-css',
                    'bower_components/bootstrap/dist/css/bootstrap.min.css',
                ),
                array(
                    'vendor-script',
                    'bower_components/bootstrap/dist/js/bootstrap.min.js',
                ),
                array(
                    'vendor-script',
                    'bower_components/bootstrap/dist/js/bootstrap.bundle.min.js',
                ),
                array(
                    'vendor-script',
                    'bower_components/bootstrap/dist/js/bootstrap.bundle.min.js',
                ),
                array(
                    'static-js',
                    "$(document).on('hidden.bs.modal', '.modal', function () {
                        $('.modal:visible').length && $(document.body).addClass('modal-open');
                        });",
                ),
            ),
        ),
        'bootstrap-multiselect' => array(
            'use' => 'bootstrap',
            'content' => array(
                // array(
                //     'vendor-css',
                //     'misc/css/bootstrap-multiselect.css',
                // ),
                // array(
                //     'vendor-js',
                //     'misc/js/bootstrap-multiselect.min.js',
                // ),
                array(
                    'vendor-css',
                    'bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css',
                ),
                array(
                    'vendor-js',
                    'bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js',
                ),
            ),
        ),
        'bootstrap-datepicker' => array(
            'use' => 'bootstrap',
            'content' => array(
                array(
                    'vendor-js',
                    'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                ),
                array(
                    'vendor-js',
                    'bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.' .
                    $locale . '.min.js',
                ),
                array(
                    'vendor-css',
                    'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css',
                ),
                array(
                    'static-js',
                    '$.fn.datepicker.defaults.format = "yyyy-mm-dd";
                        $.fn.datepicker.defaults.isBE = true;
                        $.fn.datepicker.defaults.autoclose = true;
                        $.fn.datepicker.defaults.todayHighlight = true;
                        $.fn.datepicker.defaults.language = "' . $locale . '";',

                ),
            ),
        ),
        'bootstrap-datetimepicker' => array(
            'use' => array(
                'bootstrap',
                'moment',
            ),
            'content' => array(
                array(
                    'vendor-js',
                    'bower_components/bootstrap4-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js',
                ),
                array(
                    'vendor-css',
                    'bower_components/bootstrap4-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css',
                ),
                array(
                    'static-js',
                    '$.fn.datetimepicker.defaults.locale = "' . $locale . '";',
                ),
            ),
        ),
        'bootstrap-duallist' => array(
            'use' => 'bootstrap',
            'content' => array(
                array(
                    'vendor-css',
                    'bower_components/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css'
                ),
                array(
                    'vendor-js',
                    'bower_components/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js'
                ),
            ),
        )
    ),
];
