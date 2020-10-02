@section('extra_head')

@extends('backoffice/layout/master')

<?php
$view = \App\Helpers\ViewHelper::getInstance();
$l = \App\Helpers\LocaleHelper::getInstance();
$lang = $l->getAllLocales();
$getLocal = $l->getLocale();
$page_name = trans('backoffice/metadata/method.page_name');

// $view->option('main-menu-mode', 'admin');
$view->option('breadcrumb',
array(
    array(
        'href' => $l->httpUrl("backoffice/metadata/metadata"),
        'text' => trans('backoffice/metadata/metadata.main-menu-mode')
    ),
    array(
        'text' => trans('backoffice/metadata/method.page_name')
    ),
));
$view->option('js-init','mm.init(group_Translator)');
$view->option('page_name', $page_name);
?>

{!! $view->asset('DataTables','DataTables-buttons','parsley','bootstrap-multiselect','JsonHelper') !!}
{!! $view->resource('js','js/backoffice/metadata/method.js') !!}
{!! $view->resource('theme-css','css/backoffice/metadata/method.css') !!}

@stop

@section('content')

<div class="data-filters">
  <a class="color-red" style="text-decoration: underline;" href="{!! $view->buildResourceSrc('pdf/method_manual.pdf') !!}" target="_bank">{{ trans('/master.method_manual') }}</a>
</div>

<div class="table-responsive">
    <table id="tbl-method" class="display admin-datatables" width="100%">
        <thead>
            <tr>
              <th>{{ trans('/master.col_order')}}</th>
              <th>{{ trans('/backoffice/metadata/method.page_name') }}</th>
              <th>{{ trans('/master.col_edit_del')}}</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="dlgMethod" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="dlgMethod-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form" id="dlgMethod-form" class="form-horizontal">
                    <input type="hidden" id="dlgMethod-id" name="id" />

                    <!-- @foreach( $lang as $k => $v)
                      @if($v == 'th')
                      <div class="form-group">
                        <label for="form-name-{{ $v }}" class="control-label col-sm-3">
                            <span class="color-red">*</span>
                            {{ $page_name." (".strtoupper($v).")" }}:
                        </label>
                        <div class="col-sm-9">
                          <input type="text" id="dlgMethod-name-{{ $v }}" class="form-control" data-parsley-required data-parsley-error-message="{{trans('master.msg_err_require')}}" />
                        </div>
                      </div>
                      @else
                      <div class="form-group">
                        <label for="form-name-{{ $v }}" class="control-label col-sm-3">
                            {{ $page_name." (".strtoupper($v).")" }}:
                        </label>
                        <div class="col-sm-9">
                          <input type="text" id="dlgMethod-name-{{ $v }}" class="form-control"/>
                        </div>
                      </div>
                      @endif
                    @endforeach -->

                    <div class="form-group form-row">
                        <label for="form-name-{{ $v }}" class="control-label col-sm-3 m-auto text-right">
                            <span class="color-red">*</span>
                            {{ $page_name }}:
                        </label>
                        <div class="col-sm-8">
                            <input type="text" id="dlgMethod-name" class="form-control"
                            data-parsley-required data-parsley-error-message="{{trans('master.msg_err_require')}}" />
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('/master.btn_cancel')}}</button>
                <button type="button" class="btn btn-primary" id="dlgMethod-save-btn">{{trans('/master.btn_save')}}</button>
            </div>
        </div>
    </div>
</div>

<script>
</script>

@stop
