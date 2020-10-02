<!-- Modal for wave_setting -->
<div class="modal fade" id="wave_setting" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">{{ trans('/backoffice/tools/display_setting.title_wave_forcast') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" id="wave_form" class="form-inline justify-content-center"">
          <input type="text" id="setting-code" style="display:none"/>
          <div class="form-group color">
            <label for="wave_color"  class="control-label col-sm-6" >{{ trans('backoffice/tools/display_setting.value_wave') }}:</label>
            <div class="col-sm-6">
              <input id="wave_color" class="form-control jscolor {hash:true}" data-key="color" style="width:100%"/>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('master.btn_close') }}</button>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal">{{ trans('master.btn_save') }}</button>
      </div>
    </div>
  </div>
</div>
