@section('extra_head')

@extends('backoffice/layout/master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();

$view->option('breadcrumb',
array(
  array(
    'href' => $l->httpUrl("backoffice/apis/monitor"),
    'text' => trans('backoffice/apis/key_access_mgmt.main-menu-mode')
  ),
  array(
    'text' => trans('backoffice/apis/monitor.page_name')
    )
  ));
  $view->option('js-init','srvMeta.init(group_Translator)');
  $view->option('page_name', 'Monitor Server');
  ?>

{!! $view->resource('theme-css','css/backoffice/apis/monitor.css') !!}

{!!
$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper','moment','bootstrap-datetimepicker')
!!}
{!! $view->resource('js','js/backoffice/apis/monitor_server.js') !!}

@section('content')
<script type="text/js" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/th.js"></script>

<!-- Search -->
<div>
    <div class="form text-right">
        <button type="button" class="btn btn-outline-success btn-md pl-5 pr-5" style="border-color:green"
            data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle color-green"
                aria-hidden="true"></i> เพิ่ม</button>
    </div>

    <div class="card text-center">
        <div class="card-body">
            <div class="card w-25 mx-auto">
                <div class="card-header">
                    <p>Gate Way 1</p>
                </div>
                <img class="card-img-top w-10"
                    src="http://localhost/thaiwater30/public/resources/images/server_machine.png" alt="Card image cap">
                <div class="card-body row mx-auto">
                    <p>127.0.0.1 : </p>
                    <p style="color: green"> [Online]</p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class=" mx-auto">
                        <button type="button" class="btn btn-outline-danger btn-md" style="border-color:red">
                            Restart</button>
                        <button type="button" class="btn btn-outline-secondary btn-md"
                            style="border-color:gray">Stop</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body row m-1 h-25">

            <div class="card w-25 m-1 text-center">
                <p>Data Service</p>
                <img class="card-img-top w-10"
                    src="http://localhost/thaiwater30/public/resources/images/server_machine.png" alt="Card image cap">
                <div class="card-body row mx-auto">
                    <p>127.0.0.1 : </p>
                    <p style="color: green"> [Online]</p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class=" mx-auto">
                        <button type="button" class="btn btn-outline-danger btn-md" style="border-color:red">
                            Restart</button>
                        <button type="button" class="btn btn-outline-secondary btn-md"
                            style="border-color:gray">Stop</button>
                    </div>
                </div>
            </div>


            <div class="card w-25 m-1 text-center">
                <p>API Service</p>
                <img class="card-img-top w-10"
                    src="http://localhost/thaiwater30/public/resources/images/server_machine.png" alt="Card image cap">
                <div class="card-body row mx-auto">
                    <p>127.0.0.1 : </p>
                    <p style="color: green"> [Online]</p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class=" mx-auto">
                        <button type="button" class="btn btn-outline-danger btn-md" style="border-color:red">
                            Restart</button>
                        <button type="button" class="btn btn-outline-secondary btn-md"
                            style="border-color:gray">Stop</button>
                    </div>
                </div>
            </div>


            <div class="card w-25 m-1 text-center">
                <p>Download Service</p>
                <img class="card-img-top w-10"
                    src="http://localhost/thaiwater30/public/resources/images/server_machine.png" alt="Card image cap">
                <div class="card-body row mx-auto">
                    <p>127.0.0.1 : </p>
                    <p style="color: red"> [Offline]</p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class=" mx-auto">
                        <button type="button" class="btn btn-outline-success btn-md" style="border-color:green">
                            Start</button>
                        <button type="button" class="btn btn-outline-secondary btn-md"
                            style="border-color:gray">Stop</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end search -->

<!-- icon loading -->
<!-- <div id="div_loading">
	<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
</div> -->
<!-- end icon loadding-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row col-12">
                    <label class="control-label col-sm-5">Gate way</label>
                    <div class="col-sm-7">
                        <select class="form-control">
                            <option value="" class="default">Gate way 1</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row col-12">
                    <label class="control-label col-sm-5">Service name</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group row col-12">
                    <label class="control-label col-sm-5">Host name</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
@stop