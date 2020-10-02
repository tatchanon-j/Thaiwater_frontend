<?php
$view = \App\Helpers\ViewHelper::getInstance();
$locale = \App\Helpers\LocaleHelper::getInstance();
?>

<!DOCTYPE html>
<html lang="{{ $locale->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ trans('site.title') }}</title> {!!
$view->asset('favicon','bootstrap','bootbox','apiservice'); !!} {!!
$view->resource('theme-css','css/styles.css') !!}
@yield('extra_head') {!! $view->flushAsset(false); !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
</head>

<body class="login bg">
    <header class="login-header"></header>
    <div class="container-fluid">
        <div class="col-sm-12 ">
            @yield('content')
        </div>
    </div>
    <footer class="login-footer fixed-bottom" id="test">
        <div class="container-fluid">
            <div id="imageContainer"></div>
            <div class="row justify-content-center">
                <div class="col-xs-12 text-center">
                    <div class="copyright">© {{ trans('site.copyright') }}</div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xs-12 text-center">
                    <div class="locale-switcher">{!! $locale->buildSwitcher('dropup','CHANGE LANGUAGE') !!}</div>
                </div>
            </div>
        </div>
    </footer>
    {!! $view->flushAsset(true); !!}
    <script>
//chang- change all script get logo
$( document ).ready(function() {
    apiService.init('{!! env("API_SERVER") !!}','',apiService_Translator)
    {!! $view->option('js-init'); !!}
    apiService.SendRequest("GET","thaiwater30/backoffice/api/logo",{},function(rs){
        if(rs.result == "OK"){
            var src = document.getElementById("imageContainer");
            for(var i=0;i<rs.data.length;i++){
                var img = document.createElement("img");
                img.src = "data:image/png;base64,"+rs.data[i].logo;
                img.style.width = 'auto';
                img.style.height = '50px';
                img.style.margin = '5px';
                src.appendChild(img);
            }
        }
    });
})
    </script>
</body>

</html>

<style>
body, html {
	height: 100%
}

.bg {
  background-image: linear-gradient(to bottom, rgba(0, 195, 255, 0.52),rgba(255, 255, 255, 0.52)),
  url("https://www.egat.co.th/en/images/Media/PD/bhumibol/a_7.jpg");
	height: 100%;

	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}

#test div {
    text-align: center;

    -webkit-animation: fadein 2s;
    /* Safari, Chrome and Opera > 12.1 */
    -moz-animation: fadein 2s;
    /* Firefox < 16 */
    -ms-animation: fadein 2s;
    /* Internet Explorer */
    -o-animation: fadein 2s;
    /* Opera < 12.1 */
    animation: fadein 2s;
}

@keyframes fadein {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}
</style>