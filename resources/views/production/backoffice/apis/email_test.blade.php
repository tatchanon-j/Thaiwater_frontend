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
    'text' => 'Email Test'
    )
  ));
  $view->option('js-init','srvMeta.init(group_Translator)');
  $view->option('page_name', 'Email Test');
  ?>

{!! $view->resource('theme-css','css/backoffice/apis/monitor.css') !!}

{!!
$view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper','moment','bootstrap-datetimepicker')
!!}
{!! $view->resource('js','js/backoffice/apis/monitor_server.js') !!}

@section('content')
<script type="text/js" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/th.js"></script>

<!-- Search -->
<div class="text-center">
    <form role="form" id="dlgEditEventsubtype-form" class="form-horizontal">
        <input type="hidden" id="dlgEditEventsubtype-id" name="id" />
        <input type="hidden" id="dlgEditEventsubtype-category" name="category" />

        <div class="form-group row">

            <label class="control-label col-sm-3 text-sm-right"><span
                    class="color-red">*</span>To : </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="code"
                    data-parsley-required />
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-sm-3 text-sm-right"><span
                    class="color-red">*</span>Subject : </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="code"
                    data-parsley-required />
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-sm-3 text-sm-right"><span
                    class="color-red">*</span>Text : </label>
            <div class="col-sm-9">
                <textarea style="width:100%" rows="20"></textarea>
            </div>
        </div>
    </form>
</div>
<button type="button" class="btn btn-primary float-right">Send</button>
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