<?php

function DataTables_Translator_JS() {
	return 'var g_dataTablesTranslator = {' . 'sEmptyTable:     \'' . trans("datatables.sEmptyTable") . '\',' .
	'sInfo:           \'' . trans("datatables.sInfo") . '\',' . 'sInfoEmpty:      \'' .
	trans("datatables.sInfoEmpty") . '\',' . 'sInfoFiltered:   \'' . trans("datatables.sInfoFiltered") . '\',' .
	'sInfoPostFix:    \'' . trans("datatables.sInfoPostFix") . '\',' . 'sInfoThousands:  \'' .
	trans("datatables.sInfoThousands") . '\',' . 'sLengthMenu:     \'' . trans("datatables.sLengthMenu") . '\',' .
	'sLoadingRecords: \'' . trans("datatables.sLoadingRecords") . '\',' . 'sProcessing:     \'' .
	trans("datatables.sProcessing") . '\',' . 'sSearch:         \'' . trans("datatables.sSearch") . '\',' .
	'sZeroRecords:    \'' . trans("datatables.sZeroRecords") . '\',' . 'oPaginate: { ' . 'sFirst:    \'' .
	trans("datatables.oPaginate_sFirst") . '\',' . 'sLast:     \'' . trans("datatables.oPaginate_sLast") . '\',' .
	'sNext:     \'' . trans("datatables.oPaginate_sNext") . '\',' . 'sPrevious: \'' .
	trans("datatables.oPaginate_sPrevious") . '\',' . '},' . 'oAria: { ' . 'sSortAscending:  \'' .
	trans("datatables.oAria_sSortAscending") . '\',' . 'sSortDescending: \'' .
	trans("datatables.oAria_sSortDescending") . '\',' . '}' . '}';
}

return [
	'asset' => array(
		'DataTables' => array(
			'use' => array(
				'bootstrap',
			),
			'content' => array(
				array(
					'vendor-css',
					'bower_components/datatables.net-dt/css/jquery.dataTables.min.css',
				),
				array(
					'vendor-css',
					'bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
				),
				// array(
				// 	'vendor-js',
				// 	'bower_components/datatables.net-bs4/js/dataTables.bootsrap4.js',
				// ),
				// array(
				// 	'vendor-css',
				// 	'bower_components/datatables.net-bs/js/dataTables.bootstrap4.mincss',
				// ),
				array(
					'vendor-js',
					'bower_components/datatables.net/js/jquery.dataTables.min.js',
				),
				// array(
				// 	'vendor-js',
				// 	'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
				// ),
				array(
					'static-js',
					DataTables_Translator_JS(),
				),
				array(
					'static-js',
					'$.extend( true, $.fn.dataTable.defaults, {iDisplayLength: 15} );',
				),array(
					'vendor-css',
					'bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css',
				)
			),
		),
		'DataTables-buttons' => array(
			'use' => array(
				'DataTables',
			),
			'content' => array(
				array(
					'vendor-js',
					'bower_components/jszip/dist/jszip.min.js',
				),
				array(
					'vendor-js',
					'bower_components/datatables.net-buttons/js/dataTables.buttons.min.js',
				),
				array(
					'vendor-js',
					'bower_components/datatables.net-buttons/js/buttons.flash.min.js',
				),
				array(
					'vendor-js',
					'bower_components/datatables.net-buttons/js/buttons.html5.min.js',
				),
				array(
					'vendor-js',
					'bower_components/datatables.net-buttons/js/buttons.print.min.js',
				),
				// bootstrap
				array(
					'vendor-js',
					'bower_components/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
				),
				array(
					'vendor-css',
					'bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css',
				),
				// bootstrap
				array(
					'vendor-css',
					'bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
				),
			),
		),
		'DataTables-select' => array(
			'use' => array(
				'DataTables',
			),
			'content' => array(
				array(
					'vendor-css',
					'bower_components/datatables.net-select-dt/css/select.dataTables.min.css',
				),
				array(
					'vendor-js',
					'bower_components/datatables.net-select/js/dataTables.select.min.js',
				),
			),
		),
		'DataTables-fixedheader' => array(
			'use' => array(
				'DataTables',
			),
			'content' => array(
				array(
					'vendor-css',
					'bower_components/datatables.net-fixedheader-dt/css/fixedHeader.dataTables.min.css',
				),
				array(
					'vendor-js',
					'bower_components/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
				),
				array(
					'vendor-js',
					'bower_components/datatables.net-fixedheader-dt/js/fixedHeader.dataTables.min.js',
				),
			),
		),
	),
];
