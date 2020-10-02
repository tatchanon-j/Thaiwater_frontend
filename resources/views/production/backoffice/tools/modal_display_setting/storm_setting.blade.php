<!-- Modal for storm_setting -->
<div id="storm_setting" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ trans('/backoffice/tools/display_setting.title_strom') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <!-- <form class="form-horizontal" for="form"> -->
          <input type="text" id="setting-code" style="display:none" />
          <h4>{{ trans('/backoffice/tools/display_setting.tropical_depression') }}</h4>
          <form class="form-inline">
            <div class="form-group col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.value_<') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="term" data-key="6.term" style="width: 100%;">
              </div>
            </div>
            <div class="form-group color col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="6.color" style="width: 100%;">
              </div>
            </div>
            <!-- <div class="form-group col-sm-4">
              <p><b>kmh_text:</b><span name="kmh_text"></span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>knots_text:</b><span name="knots_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>mph_text:</b><span name="mph_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>scale_text:</b><span name="scale_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>strength:</b><span name="strength">128</span></p>
            </div> -->
            <div class="form-group"></div>
          </form>
        </div>
        <div class="form-group">
          <h4>{{ trans('/backoffice/tools/display_setting.tropical_storm') }}</h4>
          <form class="form-inline" for="form">
            <div class="form-group col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.value_>=') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="term" data-key="5.term" style="width: 100%;">
              </div>
            </div>
            <div class="form-group color col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="5.color" style="width: 100%;">
              </div>
            </div>
            <!-- <div class="form-group col-sm-4">
              <p><b>kmh_text:</b><span name="kmh_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>knots_text:</b><span name="knots_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>mph_text:</b><span name="mph_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>strength:</b><span name="strength">128</span></p>
            </div> -->
            <div class="form-group"></div>
          </form>
        </div>
        <div class="form-group">
          <h4>{{ trans('/backoffice/tools/display_setting.typhoon_level_1') }}</h4>
          <form class="form-inline" for="form">
            <div class="form-group col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.value_>=') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="term" data-key="4.term" style="width: 100%;">
              </div>
            </div>
            <div class="form-group color col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="4.color" style="width: 100%;">
              </div>
            </div>
            <!-- <div class="form-group col-sm-4">
              <p><b>kmh_text:</b><span name="kmh_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>knots_text:</b><span name="knots_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>mph_text:</b><span name="mph_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>strength:</b><span name="strength">128</span></p>
            </div> -->
            <div class="form-group"></div>
          </form>
        </div>
        <div class="form-group">
          <h4>{{ trans('/backoffice/tools/display_setting.typhoon_level_2') }}</h4>
          <form class="form-inline" for="form">
            <div class="form-group col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.value_>=') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="term" data-key="3.term" style="width: 100%;">
              </div>
            </div>
            <div class="form-group color col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="3.color" style="width: 100%;">
              </div>
            </div>
            <!-- <div class="form-group col-sm-4">
              <p><b>kmh_text:</b><span name="kmh_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>knots_text:</b><span name="knots_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>mph_text:</b><span name="mph_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>strength:</b><span name="strength">128</span></p>
            </div> -->
            <div class="form-group"></div>
          </form>
        </div>
        <div class="form-group">
          <h4>{{ trans('/backoffice/tools/display_setting.typhoon_level_3') }}</h4>
          <form class="form-inline" for="form">
            <div class="form-group col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.value_>=') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="term" data-key="2.term" style="width: 100%;">
              </div>
            </div>
            <div class="form-group color col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="2.color" style="width: 100%;">
              </div>
            </div>
            <!-- <div class="form-group col-sm-4">
              <p><b>kmh_text:</b><span name="kmh_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>knots_text:</b><span name="knots_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>mph_text:</b><span name="mph_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>strength:</b><span name="strength">128</span></p>
            </div> -->
            <div class="form-group"></div>
          </form>
        </div>
        <div class="form-group">
          <h4>{{ trans('/backoffice/tools/display_setting.typhoon_level_4') }}</h4>
          <form class="form-inline" for="form">
            <div class="form-group col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.value_>=') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="term" data-key="1.term" style="width: 100%;">
              </div>
            </div>
            <div class="form-group color col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="1.color" style="width: 100%;">
              </div>
            </div>
            <!-- <div class="form-group col-sm-4">
              <p><b>kmh_text:</b><span name="kmh_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>knots_text:</b><span name="knots_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>mph_text:</b><span name="mph_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>strength:</b><span name="strength">128</span></p>
            </div> -->
            <div class="form-group"></div>
          </form>
        </div>
        <div class="form-group">
          <h4>{{ trans('/backoffice/tools/display_setting.typhoon_level_5') }}</h4>
          <form class="form-inline" for="form">
            <div class="form-group col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.value_>') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="term" data-key="0.term" style="width: 100%;">
              </div>
            </div>
            <div class="form-group color col-sm-6">
              <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color') }}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="0.color" style="width: 100%;">
              </div>
            </div>
            <!-- <div class="form-group col-sm-4">
              <p><b>kmh_text:</b><span name="kmh_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>knots_text:</b><span name="knots_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>mph_text:</b><span name="mph_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>scale_text:</b><span name="scale_text">128</span></p>
            </div>
            <div class="form-group col-sm-4">
              <p><b>strength:</b><span name="strength">128</span></p>
            </div> -->
            <div class="form-group"></div>
            <!-- </form> -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('master.btn_close') }}</button>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal">{{ trans('master.btn_save') }}</button>
      </div>
    </div>

  </div>
</div>