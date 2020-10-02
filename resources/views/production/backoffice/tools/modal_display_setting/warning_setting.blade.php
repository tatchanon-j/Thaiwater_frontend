<!-- Modal for warning_setting -->
<div id="warning_setting" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ trans('/backoffice/tools/display_setting.title_warning') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" id="form_warning_setting" class="form-inline">
          <input type="text" id="setting-code" style="display:none">
          <div class="form-group col-sm-6" style="display:none">
            <label for="warning-drought" class="control-label col-md-4">{{ trans('backoffice/tools/display_setting.color_drought') }}:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control jscolor {hash:true}" id="warning-drought" name="warning-drought" data-key="drought">
            </div>
          </div>
          <div class="form-group col-sm-6" style="display:none">
            <label for="pre_rain_level_color" class="control-label col-sm-6"><span class="trans" data-key="level-text.5.trans"></span></label>
            <div class="col-sm-6">
              <input id="pre_rain_level_color" class="form-control jscolor {hash:true}" data-key="level-text.5.color" />
            </div>
          </div>
          <div class="form-group"></div>
        </form>

        <form class="form-inline" for="form" id="form_warning_setting">
          <input type="text" id="setting-code" style="display:none" />
          <div class="form-group color col-md-6">
            <label for="warning-drought" class="control-label col-md-4">{{ trans('backoffice/tools/display_setting.color_drought') }}:</label>
            <div class="col-md-8">
              <input type="text" class="form-control jscolor {hash:true}" id="warning-drought" name="warning-drought" data-key="drought">
            </div>
          </div>
          <div class="form-group color col-md-6">
            <label for="warning-flood" class="control-label col-md-4">{{ trans('backoffice/tools/display_setting.color_flood') }}:</label>
            <div class="col-md-8">
              <input type="text" class="form-control jscolor {hash:true}" id="warning-flood" name="warning-flood" data-key="flood">
            </div>
          </div>
          <div class="form-group color col-md-6">
            <label for="warning-rain" class="control-label col-md-4">{{ trans('backoffice/tools/display_setting.color_rain') }}:</label>
            <div class="col-md-8">
              <input type="text" class="form-control jscolor {hash:true}" id="warning-rain" name="warning-rain" data-key="rain">
            </div>
          </div>
          <div class="form-group color col-md-6">
            <label for="warning-warning" class="control-label col-md-4">{{ trans('backoffice/tools/display_setting.color_warning') }}:</label>
            <div class="col-md-8">
              <input type="text" class="form-control jscolor {hash:true}" id="warning-warning" name="warning-warning" data-key="warning">
            </div>
          </div>
          <div class="form-group"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('master.btn_close') }}</button>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal">{{ trans('master.btn_save') }}</button>
      </div>
    </div>

  </div>
</div>