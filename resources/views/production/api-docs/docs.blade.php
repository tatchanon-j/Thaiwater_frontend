<?php
	$view = \App\Helpers\ViewHelper::getInstance();
	$lang = \App\Helpers\LocaleHelper::getInstance ();

	$doc_title = trans ( 'api-docs/api-docs.docs_' . $doc_name );
	$view->option ( 'page_name', $doc_title );
	$view->option ( 'bodyclass', "swagger-section" );

	$agent_docs = array (
			"agent"
	);
	$login_docs = array (
			"webservice" => true,
      "test" => true
  );
  $token_docs = array(
    "mobile" => true
  );

	$need_api_key = array_search ( $doc_name, $agent_docs ) !== false;
	$need_token = array_search ( $doc_name, $token_docs ) !== false;
	if (array_search ( $doc_name, $login_docs ) !== false) {
		$csrf = \Request::cookie ( \App\Helpers\ApiServiceHelper::CSRF_COOKIE );
	} else {
		$csrf = "";
	}

	$api_url = env ( "API_SERVER" ) . "/apidoc/" . urlencode ( $doc_name );
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $doc_title }}</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Source+Code+Pro:300,600|Titillium+Web:400,600,700" rel="stylesheet">
  {!! $view->resourceHTML('link','/vendor/swagger-ui/3.1.6/swagger-ui.css','rel="stylesheet" type="text/css"',false) !!}
  {!! $view->resourceHTML('link','/vendor/swagger-ui/3.1.6/favicon-32x32.png','type="image/png"  sizes="32x32"',false ) !!}
  {!! $view->resourceHTML('link','/vendor/swagger-ui/3.1.6/favicon-16x16.png','type="image/png"  sizes="16x16"' ,false) !!}
  <style>
    html
    {
      box-sizing: border-box;
      overflow: -moz-scrollbars-vertical;
      overflow-y: scroll;
    }
    *,
    *:before,
    *:after
    {
      box-sizing: inherit;
    }

    body {
      margin:0;
      background: #fafafa;
    }

    .curl {
      display: none;
    }
	.microlight{
		max-height: 450px;
		overflow: auto;
	}
  </style>
</head>

<body>

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="position:absolute;width:0;height:0">
  <defs>
    <symbol viewBox="0 0 20 20" id="unlocked">
          <path d="M15.8 8H14V5.6C14 2.703 12.665 1 10 1 7.334 1 6 2.703 6 5.6V6h2v-.801C8 3.754 8.797 3 10 3c1.203 0 2 .754 2 2.199V8H4c-.553 0-1 .646-1 1.199V17c0 .549.428 1.139.951 1.307l1.197.387C5.672 18.861 6.55 19 7.1 19h5.8c.549 0 1.428-.139 1.951-.307l1.196-.387c.524-.167.953-.757.953-1.306V9.199C17 8.646 16.352 8 15.8 8z"></path>
    </symbol>

    <symbol viewBox="0 0 20 20" id="locked">
      <path d="M15.8 8H14V5.6C14 2.703 12.665 1 10 1 7.334 1 6 2.703 6 5.6V8H4c-.553 0-1 .646-1 1.199V17c0 .549.428 1.139.951 1.307l1.197.387C5.672 18.861 6.55 19 7.1 19h5.8c.549 0 1.428-.139 1.951-.307l1.196-.387c.524-.167.953-.757.953-1.306V9.199C17 8.646 16.352 8 15.8 8zM12 8H8V5.199C8 3.754 8.797 3 10 3c1.203 0 2 .754 2 2.199V8z"/>
    </symbol>

    <symbol viewBox="0 0 20 20" id="close">
      <path d="M14.348 14.849c-.469.469-1.229.469-1.697 0L10 11.819l-2.651 3.029c-.469.469-1.229.469-1.697 0-.469-.469-.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-.469-.469-.469-1.228 0-1.697.469-.469 1.228-.469 1.697 0L10 8.183l2.651-3.031c.469-.469 1.228-.469 1.697 0 .469.469.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c.469.469.469 1.229 0 1.698z"/>
    </symbol>

    <symbol viewBox="0 0 20 20" id="large-arrow">
      <path d="M13.25 10L6.109 2.58c-.268-.27-.268-.707 0-.979.268-.27.701-.27.969 0l7.83 7.908c.268.271.268.709 0 .979l-7.83 7.908c-.268.271-.701.27-.969 0-.268-.269-.268-.707 0-.979L13.25 10z"/>
    </symbol>

    <symbol viewBox="0 0 20 20" id="large-arrow-down">
      <path d="M17.418 6.109c.272-.268.709-.268.979 0s.271.701 0 .969l-7.908 7.83c-.27.268-.707.268-.979 0l-7.908-7.83c-.27-.268-.27-.701 0-.969.271-.268.709-.268.979 0L10 13.25l7.418-7.141z"/>
    </symbol>


    <symbol viewBox="0 0 24 24" id="jump-to">
      <path d="M19 7v4H5.83l3.58-3.59L8 6l-6 6 6 6 1.41-1.41L5.83 13H21V7z"/>
    </symbol>

    <symbol viewBox="0 0 24 24" id="expand">
      <path d="M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z"/>
    </symbol>

  </defs>
</svg>

<div id="swagger-ui"></div>
<div id="swg-note" style="display:none"></div>
<div id="api-agent-key-div" style="display:none">
<form id="api-agent-key" style="margin-top: 10px; border: 1px solid gray; border-radius: 8px;" >
<div style="display:inline; margin-left: 10px">
	<lable for="input_agent">Agent Name</lable>
	<input placeholder="AGENT-NAME" id="input_agent" type="text" value="" />
</div>
<div style="display:inline; margin-left: 10px">
    <lable for="input_apikey">API Key</lable>
	<input placeholder="API-KEY" id="input_apikey" type="text" value="" maxlength=64 size=67/>
</div>
</form>
</div>
<div id="api-token-div" style="display:none">
<form id="api-token" style="margin-top: 10px; border: 1px solid gray; border-radius: 8px;" >
<div style="display:inline; margin-left: 10px">
	<lable for="input_agent">TOKEN</lable>
	<input placeholder="TOKEN" id="input_token" type="text" value="" size="67"/>
</div>
</form>
</div>
{!! $view->resourceHTML('script','/vendor/swagger-ui/3.1.6/swagger-ui-bundle.js','' ,false) !!}
{!! $view->resourceHTML('script','/vendor/swagger-ui/3.1.6/swagger-ui-bundle.js','' ,false) !!}
{!! $view->resourceHTML('script','/vendor/swagger-ui/3.1.6/swagger-ui-standalone-preset.js','' ,false) !!}
{{ $view->asset('jquery','forge') }}
{!! $view->flushAsset(true); !!}
{!! $view->resourceHTML('script','js/api-docs/api-docs.js') !!}
<script>
window.onload = function() {

  // Build a system
  const ui = SwaggerUIBundle({
    url: "{{ $api_url }}",
    dom_id: '#swagger-ui',
    deepLinking: true,
    presets: [
      SwaggerUIBundle.presets.apis,
      SwaggerUIStandalonePreset
    ],
    plugins: [
      SwaggerUIBundle.plugins.DownloadUrl
    ],
    layout: "StandaloneLayout",
	docExpansion: "none",
	tagsSorter: "alpha",
	requestInterceptor: APIDoc.requestInterceptor,
	responseInterceptor: APIDoc.responseInterceptor,
	validatorUrl: null
  })

  window.ui = ui

  APIDoc.init({
	  needAPIKey: {!! json_encode($need_api_key) !!},
	  needToken: {!! json_encode($need_token) !!},
	  apiCSRF: "{{ $csrf }}",
	  haiiImage: "{!! $view->buildResourceSrc('/resources/images/banner-haii.jpg',false) !!}",
	  docsURL: "{{ $lang->httpUrl('/api-docs') }}"
  })
}

</script>
</body>

</html>
