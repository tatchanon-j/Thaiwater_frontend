<?php
/******************************
* script check status dr-site
* by peerapong@hii.or.th
* 12/02/2020
*******************************/

// check site ip
function siteIP($site,$domain){
    $site_ip = [
        'DC-SITE' => [
            'api2.thaiwater.net' => [
                '203.150.4.156',    // api2 public
                '192.168.12.191',   // api2
            ],
            'ldap.hii.or.th' => [
                '203.150.4.139',    // ldap public
                '192.168.12.10',    // ldap
            ],
            'backoffice.thaiwater.net' => [
                '203.150.4.168',    // backoffice mobile public
                '192.168.12.250',   // backoffice mobile
            ]
        ],
        'DR-SITE' => [
            'api2.thaiwater.net' => [
                '159.192.147.229',  // api2 public
                '192.168.201.191',  // api2
            ],
            'ldap.hii.or.th' => [
                '159.192.102.99',   // ldap public
                '192.168.201.10',   // ldap
            ],
            'backoffice.thaiwater.net' => [
                '159.192.102.100',  // backoffice mobile public
                '192.168.201.192',  // backoffice mobile
                '192.168.201.250',  // backoffice mobile
            ]
        ],
        'F5' => [
            'api2.thaiwater.net' => [
                '203.151.225.195',    // api2 public
            ],
            'ldap.hii.or.th' => [
                '203.151.225.197',    // ldap public
            ],
            'backoffice.thaiwater.net' => [
                '203.151.225.196',    // backoffice mobile public
            ]
        ],
    ];
    return $site_ip[$site][$domain];
}

// check status server
function serverStatus($domain,$site,$ip,$url_status){
    // $current_ip = gethostbyname($domain);
	$current_ip = gethostbyurl($url_status);
    $server = $site;
    $icon = 'fa-tasks';
    $background = 'background-color:#dcdcdc; color:#343a40;';

    if ($current_ip != '' && in_array($current_ip, siteIP($site,$domain))) {
        $server = 'DC-SITE';
        $icon = 'fa-check';
        $background = 'background-color:green; color:#fff;';
        $badge = 'badge';
        $current_ip = '<a href="'.$url_status.'" class="site-text badge badge-info" style="color:#fff" title="click view api" target="_blank">'.$current_ip.'</a>';
    }else {
        $current_ip = '<a href="#" class="site-text badge" style="color:#343a40">Service Offline</a>';
        $url_status = '#';
        $badge = '';
    }

    echo '<div class="col-lg-12" style="margin-bottom:26px;">
                <div class="site" style="'.$background.'">
                <i class="fa '.$icon.' fa-2x fa-4x"></i>
                    <h2 class="site-title ">'.$domain.'</h2>
                    <p class="site-text">( Public IP : '.$ip.' ) ( Local IP : '.$current_ip.' )</p>
                </div>
            </div>';
}

function serverStatusDC($domain,$ip,$url_status){
    return serverStatus($domain,'DC-SITE',$ip,$url_status);
}

function serverStatusDR($domain,$ip,$url_status){
    return serverStatus($domain,'DR-SITE',$ip,$url_status);
}

function pingAddress($ip) {
    $status = exec("/bin/ping -n 3 $ip", $outcome, $status);
    if (0 == $status) {
        $status = "alive";
    } else {
        $status = "dead";
    }
    echo "The IP address, $ip, is  ".$status;
}
 
function gethostbyurl($url){
	$output = '';
	if($url){
		$headers = get_headers($url);
		$status_code = substr($headers[0], 9, 3);
		if($status_code == 200){

			$contents = file_get_contents($url);
            $json = json_decode($contents);
            
            if($url == 'http://api2.thaiwater.net:9200/api/v1/test/werawan') {
                $json = $json[0];
            }

			$output = isset($json->current_ip) ? str_replace(':9200','',$json->current_ip) :'';
		}
	}
	return $output;
}

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<style>
body { margin: 30px 0px; background-color: #efefef29; }
.site { background-color:#f5f5f5; padding: 20px 0; border-radius: 5px; }
.site-title { font-size: 25px; font-weight: normal; margin-top: 10px; margin-bottom: 0; text-align: center; }
.site-text { font-size: 15px; font-weight: normal; margin-top: 10px; margin-bottom: 0; text-align: center; }
.fa-2x { margin: 0 auto; float: none; display: table; }
.dos-bg {  background-color: #000; padding: 20px; color: #A9A9A9; font-size: 1.3em; line-height: 1.5em; font-family: monospace; }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 style="font-weight: bold;">THAIWATER</h1>
            <p>API Monitor Status (<?=date('Y-m-d H:i:s')?>)</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col text-center">
                    <h2 style="font-weight: bold;">DC-SITE</h2>
                </div>
            </div>
            <div class="row text-center">
                <?=serverStatusDC('api2.thaiwater.net','203.150.4.156','http://api2.thaiwater.net:9200/api/v1/test/werawan')?>
                <?=serverStatusDC('backoffice.thaiwater.net','203.150.4.168','https://backoffice.thaiwater.net/mobile/v1/status.php')?>
                <? //serverStatusDC('ldap.hii.or.th','203.150.4.139','')?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col text-center">
                    <h2 style="font-weight: bold;">DR-SITE</h2>
                </div>
            </div>
            <div class="row text-center">
                <?=serverStatusDR('api2.thaiwater.net','159.192.147.229','http://api2.thaiwater.net:9200/api/v1/test/werawan')?>
                <?=serverStatusDR('backoffice.thaiwater.net','159.192.102.100','https://backoffice.thaiwater.net/mobile/v1/status.php')?>
                <? //serverStatusDR('ldap.hii.or.th','159.192.102.99','')?>
            </div>
        </div>
    </div>
</div>


<!---- debug ip ---->
<script>
fetch('http://api2.thaiwater.net:9200/api/v1/test/werawan')
    .then(res => res.json())
    .then((out) => {
        document.getElementById("api2").innerHTML = 'api2 : ' + out[0].current_ip.replace(':9200','');
}).catch(err => console.error(err));

fetch('https://backoffice.thaiwater.net/mobile/v1/status.php')
    .then(res => res.json())
    .then((out) => {
        document.getElementById("backoffice").innerHTML = 'backoffice : ' + out.current_ip;
}).catch(err => console.error(err));
</script>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <section class="dos-bg">
                <?php 
                echo '<h2>DEBUG</h2><br/>';
                echo '> fetch json current ip with php : <br/>----------------------------------------<br/>';
                echo 'api2 : ';
                print_r(gethostbyurl('http://api2.thaiwater.net:9200/api/v1/test/werawan'));
                echo '<br/>';
                echo 'backoffice : ';
                print_r(gethostbyurl('https://backoffice.thaiwater.net/mobile/v1/status.php'));
                echo '<br /><br/><br/>';
                echo '> fetch json current ip with javascript : <br/>-----------------------------------------------<br/>';
                echo '<div id="api2"></div>';
                echo '<div id="backoffice"></div>';
                ?>
            </section>
        </div>
    </div>
</div>