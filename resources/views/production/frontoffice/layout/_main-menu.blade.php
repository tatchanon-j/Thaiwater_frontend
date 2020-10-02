<?php
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getLocale();
$view = \App\Helpers\ViewHelper::getInstance();

$user_menu = array(
/* Menu in NHC Thaiwater 30++*/
    // Metadata Menu
    array(
        //'srv' => 'autoreport',
        'text' => trans('frontoffice/metadata/ManipulateMeta.page_name'),
        'icon' => 'fa-pencil-square-o',
        'items' => array(
            array(
                'text' => 'Metadata',
                'href' => $l->httpUrl('/metadata/ManipulateMeta')
            ),
            array(
                'text' => trans('frontoffice/metadata/SummaryMeta.page_name'),
                'href' => $l->httpUrl('/metadata/SummaryMeta')
            ),
            array(
                'text' => trans('frontoffice/metadata/ManipulateCategory.page_name'),
                'href' => $l->httpUrl('/metadata/ManipulateCategory')
            ),
            array(
                'text' => trans('frontoffice/metadata/ManipulateSubcat.page_name'),
                'href' => $l->httpUrl('/metadata/ManipulateSubcat')
            ),
            array(
                'text' => trans('frontoffice/metadata/ManipulateFrequncy.page_name'),
                'href' => $l->httpUrl('/metadata/ManipulateFrequncy')
            ),
            array(
                'text' => trans('frontoffice/metadata/ManipulateAgency.page_name'),
                'href' => $l->httpUrl('/metadata/ManipulateAgency')
            ),
            array(
                'text' => trans('frontoffice/metadata/ManipulateDepartment.page_name'),
                'href' => $l->httpUrl('/metadata/ManipulateDepartment')
            ),
            array(
                'text' => trans('frontoffice/metadata/ManipulateMinistry.page_name'),
                'href' => $l->httpUrl('/metadata/ManipulateMinistry')
            ),
            array(
                'text' => trans('frontoffice/metadata/ManipulateShopping.page_name'),
                'href' => $l->httpUrl('/metadata/ManipulateShopping')
            )
        )
    ),
    // Event Menu
    array(
        // 'srv' => 'export',
        'text' => trans('frontoffice/event/ManipulateEventtype.header_menu'),
        'icon' => 'fa-files-o',
        'items' => array(
            array(
                'text' => trans('frontoffice/event/ManipulateEventtype.page_name'),
                'href' => $l->httpUrl('/event/ManipulateEventtype')
            ),
            array(
                'text' => trans('frontoffice/event/ManipulateEventsubtype.page_name'),
                'href' => $l->httpUrl('/event/ManipulateEventsubtype')
            ),
            array(
                'text' => trans('frontoffice/event/ManipulateEventmethod.page_name'),
                'href' => $l->httpUrl('/event/ManipulateEventmethod')
            ),
            array(
                'text' => trans('frontoffice/event/ManipulateEventtarget.page_name'),
                'href' => $l->httpUrl('/event/ManipulateEventtarget')
            ),
            array(
                'text' => trans('frontoffice/event/data.page_name'),
                'href' => $l->httpUrl('/event/data')
            )
        )
    ),
    //Report Menu
    array(
        // 'srv' => 'export',
        'text' => trans('frontoffice/report/ReportEvent.header_menu'),
        'icon' => 'fa-table',
        'items' => array(
            array(
                'text' => trans('frontoffice/report/ReportEvent.page_name'),
                'href' => $l->httpUrl('/report/ReportEvent')
            ),
            array(
                'text' => trans('frontoffice/report/ReportImporbyyear.page_name'),
                'href' => $l->httpUrl('/report/ReportImporbyyear')
            ),
            array(
                'text' => trans('frontoffice/report/ReportImportbymonth.page_name'),
                'href' => $l->httpUrl('/report/ReportImportbymonth')
            ),
            array(
                'text' => trans('frontoffice/report/ReportImportbydate.page_name'),
                'href' => $l->httpUrl('/report/ReportImportbydate')
            ),
            array(
                'text' => trans('frontoffice/report/ReportImport.page_name'),
                'href' => $l->httpUrl('/report/ReportImport')
            )
        )
    ),
    // Monitor Menu
    array(
        // 'srv' => 'export',
        'text' => trans('frontoffice/monitor/MonitorData.header_menu'),
        'icon' => 'fa-laptop',
        'items' => array(
            array(
                'text' => trans('frontoffice/monitor/MonitorData.page_name'),
                'href' => $l->httpUrl('/monitor/MonitorData')
            ),
            array(
                'text' => trans('frontoffice/monitor/RecordData.page_name'),
                'href' => $l->httpUrl('/monitor/RecordData')
            ),
            array(
                'text' => trans('frontoffice/monitor/ErrorData.page_name'),
                'href' => $l->httpUrl('/monitor/ErrorData')
            ),
            array(
                'text' => trans('frontoffice/monitor/RecordErrorData.page_name'),
                'href' => $l->httpUrl('/monitor/RecordErrorData')
            ),
            array(
                'text' => trans('frontoffice/monitor/MonErrorDgmt.page_name'),
                'href' => $l->httpUrl('/monitor/MonErrorDgmt')
            ),
            array(
                'text' => trans('frontoffice/monitor/ImportData.page_name'),
                'href' => $l->httpUrl('/monitor/ImportData')
            ),
            array(
                'text' => trans('frontoffice/monitor/CheckMetadata.page_name'),
                'href' => $l->httpUrl('/monitor/CheckMetadata')
            ),
            array(
                'text' => trans('frontoffice/monitor/CheckDataError.page_name'),
                'href' => $l->httpUrl('/monitor/CheckDataError')
            ),
            array(
                'text' => trans('frontoffice/monitor/CheckLatestData.page_name'),
                'href' => $l->httpUrl('/monitor/CheckLatestData')
            ),
        )
    ),
    // Shopping Menu
    array(
        // 'srv' => 'export',
        'text' => trans('frontoffice/shopping/ShoppingRegister.header_menu'),
        'icon' => 'fa-shopping-cart',
        'items' => array(
          array(
            'text' => trans('frontoffice/shopping/ShoppingRegister.page_name'),
            'href' => $l->httpUrl('/shopping/ShoppingRegister')
          ),
          array(
            'text' => trans('frontoffice/shopping/ShoppingtoAgency.page_name'),
            'href' => $l->httpUrl('/shopping/ShoppingtoAgency')
          ),
          array(
            'text' => trans('frontoffice/shopping/ShoppingManagement.page_name'),
            'href' => $l->httpUrl('/shopping/ShoppingManagement')
          ),
          array(
            'text' => trans('frontoffice/shopping/ShoppingSummary.page_name'),
            'href' => $l->httpUrl('/shopping/ShoppingSummary')
          )
        )
      ),
    //DBA Menu
    array(
        // 'srv' => 'export',
        'text' => trans('frontoffice/DBA/DeleteData.header_menu'),
        'icon' => 'fa-database',
        'items' => array(
          array(
            'text' => trans('frontoffice/DBA/DeleteData.page_name'),
            'href' => $l->httpUrl('/DBA/DeleteData')
          ),
          array(
            'text' => trans('frontoffice/DBA/ManagePartition.page_name'),
            'href' => $l->httpUrl('/DBA/ManagePartition')
          )
        )
      ),
    //Datalnk Menu
    array(
        // 'srv' => 'export',
        'text' => trans('frontoffice/datalink/MgmtScript.header_menu'),
        'icon' => 'fa-clock-o',
        'items' => array(
          array(
            'text' => trans('frontoffice/datalink/MgmtScript.page_name'),
            'href' => $l->httpUrl('/Datalink/MgmtScript')
          ),
          array(
            'text' => trans('frontoffice/datalink/HiScript.page_name'),
            'href' => $l->httpUrl('/Datalink/HiScript')
          )
        )
      ),
    //Displaydata Menu
    array(
        // 'srv' => 'export',
        'text' => trans('frontoffice/displaydata/MgmtCache.header_menu'),
        'icon' => 'fa-pie-chart',
        'items' => array(
          array(
            'text' => trans('frontoffice/displaydata/MgmtCache.page_name'),
            'href' => $l->httpUrl('/displaydata/MgmtCache')
          ),
          array(
            'text' => trans('frontoffice/displaydata/MgmtDisplay.page_name'),
            'href' => $l->httpUrl('/displaydata/MgmtDisplay')
          ),
          array(
            'text' => trans('frontoffice/displaydata/IgnorData.page_name'),
            'href' => $l->httpUrl('/displaydata/IgnorData')
          ),
          array(
            'text' => trans('frontoffice/displaydata/CheckImage.page_name'),
            'href' => $l->httpUrl('/displaydata/CheckImage')
          )
        )
      )
);

$admin_menu = array(
    array(
        'srv' => 'admin',
        'text' => trans('frontoffice/master.main-menu-admin'),
        'icon' => 'fa-lock',
        'items' => array(
            array(
                'text' => trans('frontoffice/admin/group.page_name'),
                'href' => $l->httpUrl('/admin/group')
            ),
            array(
                'text' => trans('frontoffice/admin/user.page_name'),
                'href' => $l->httpUrl('/admin/user')
            )
        )
    )
);

if ($view->option('main-menu-mode') == 'admin') {
    $dsp_menu = $admin_menu;
} else {
    $dsp_menu = $user_menu;
}

// Remove menu that user can not access
$menu = \App\Helpers\ApiServiceHelper::getInstance()->filterServiceTree(
    $dsp_menu);

function buildMenuItemA($m)
{
    $current_url = $_SERVER['REQUEST_URI'];
    if (($pos = strpos($current_url, '?')) !== false) {
        $current_url = substr($current_url, 0, $pos);
    }

    if (isset($m['href'])) {
        $href = $m['href'];
    } else {
        $href = '#';
    }

    $msg = '';
    if ($href != '#') {
        $msg .= '<span class="menu-item';
        if ($href == $current_url) {
            $msg .= ' menu-item-selected';
        }

        $msg .= '">';
    }
    $msg .= '<i class="fa ';

    if (isset($m['icon'])) {
        $msg .= $m['icon'];
    } else {
        if ($href == $current_url) {
            $msg .= 'fa-dot-circle-o';
        } else {
            $msg .= 'fa-circle-o';
        }
    }
    $msg .= '"></i><span class="menu-item-text">';
    $msg .= $m['text'];
    $msg .= '</span>';
    if ($href != '#') {
        $msg .= '</span>';
    }

    if (isset($m['items']) && count($m['items']) > 0) {
        $msg .= '<i class="fa fa-angle-left pull-right"></i>';
    }

    return '<a href="' . $href . '">' . $msg . '</a>';
}
?>

<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			@foreach($menu as $m)
			<li class="treeview active">{!! buildMenuItemA($m) !!} @if (
				isset($m['items']) && count($m['items']) > 0 )
				<ul class="treeview-menu ">
					@foreach($m['items'] as $item)
					<li>{!! buildMenuItemA($item) !!}</li> @endforeach
				</ul>@endif
			</li> @endforeach
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
