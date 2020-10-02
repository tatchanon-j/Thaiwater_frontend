@section('extra_head')
@extends('backoffice/layout/master')
<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('main-menu-mode', 'admin');
$view->option('breadcrumb',
    array(
        array(
            'href' => $l->httpUrl("backoffice/admin/group"),
            'text' => 'บริหารจัดการสิทธิ์'
        ),
        array(
            'text' => 'API Test'
        )
    ));
$view->option('js-init', 'apiTester.init();');
$view->option('page_name', 'API Test');
?>


{!! $view->resource('theme-css','css/backoffice/admin/admin.css') !!}
@stop @section('content')
<div class="form-group">
        <label for="test-service">Service URL</label> <span id="test-api-url-prefix"></span>
		<input id="test-service" class="form-control"/>

		<lable for="test-params">FORM/JSON Parameter</label>
		<textarea class="form-control" id="test-params" rows="5"></textarea>
<label for="test-method">Method</label>
<div id="test-method">
		<button type="button" class="btn btn-primary" id="test-get">GET</button>
  <button type="button" class="btn btn-primary" id="test-post" >POST</button>
  <button type="button" class="btn btn-primary" id="test-put">PUT</button>
<button type="button" class="btn btn-primary" id="test-delete">DELETE</button>
<button type="button" class="btn btn-primary" id="test-patch">PATCH</button>
</div>
<lable for="test-result">JSON Result</label>
                <textarea class="form-control" id="test-result" rows="10"></textarea>
</div>
</div>
<h3>Test Dataimport/Download/UploadFile</h3>
<div class="form-group">
<form method="POST" enctype="multipart/form-data" id="send-file-form">
<input id="test-file"  type="file"  name="file" >
<button type="button" class="btn btn-primary" id="test-file-post" >UPLOAD FILE</button>
</form>
</div>

<h3>Nonce</h3>
<div>
<p>
<button id="test-nonce-btn" type="button" class="btn btn-primary">Generate Nonce</button> 
</p>
<textarea type="text" id="test-nonce-value" readonly rows="3" cols="80"></textarea>
</div>

@stop

{!! $view->resource('js','js/backoffice/admin/apitest.js') !!}
