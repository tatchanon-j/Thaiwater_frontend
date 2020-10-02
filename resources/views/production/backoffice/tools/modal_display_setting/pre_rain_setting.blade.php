<!-- Modal for pre_rain_setting -->
<div class="modal fade" id="pre_rain_setting" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">{{ trans('/backoffice/tools/display_setting.title_rain_forcast') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" id="pre_rain_form" class="form-inline">
          <input type="text" id="setting-code" style="display:none"/>
          <div class="form-group col-sm-6">
              <label for="pre_rain_level_color"  class="control-label col-sm-6" ><span class="trans" data-key="level-text.4.trans"></span></label>
              <div class="col-sm-6">
                <input id="pre_rain_level_color" class="form-control jscolor {hash:true}" data-key="level-text.4.color"/>
              </div>
          </div>
          <div class="form-group col-sm-6">
              <label for="pre_rain_level_color"  class="control-label col-sm-6" ><span class="trans" data-key="level-text.5.trans"></span></label>
              <div class="col-sm-6">
                <input id="pre_rain_level_color" class="form-control jscolor {hash:true}" data-key="level-text.5.color"/>
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
