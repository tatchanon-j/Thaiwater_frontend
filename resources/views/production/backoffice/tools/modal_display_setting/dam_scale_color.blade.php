<!-- Modal for dam_scale_color -->
<div id="dam_scale_color" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ trans('/backoffice/tools/display_setting.title_dam') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#scale_notification" role="tab" aria-controls="home" aria-selected="true">{{ trans('/backoffice/tools/display_setting.scale_notification') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#scale_display" role="tab" aria-controls="profile" aria-selected="false">{{ trans('/backoffice/tools/display_setting.scale_display') }}</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div id="scale_notification" class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
            <form class="form-inline" for="form" style="margin-top : 1rem">
              <input type="text" id="setting-code" style="display:none" />
              <br />
              <div class="form-group col-sm-6 div-dam-scale-low">
                <label class="control-label col-sm-6"><span class="trans" data-key="low.trans"></span></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="low.color" style="width: 100%;">
                </div>
              </div>
              <div class="form-group col-sm-6 div-dam-scale-high">
                <label class="control-label col-sm-6" for="dam-scale-high-color"><span class="trans" data-key="high.trans"></span></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control jscolor {hash:true}" id="dam-scal-high-color" name="color" data-key="high.color" style="width: 100%;">
                </div>
              </div>
              <div class="form-group"></div>
            </form>
          </div>
          <div class="tab-pane fade" id="scale_display" role="tabpanel" aria-labelledby="profile-tab">
            <form class="form-inline" for="form">
              <div class="dam_scale">
                <div class="dam_scale_sub">
                  <br />
                  <h5>{{ trans('/backoffice/tools/display_setting.level_1') }}</h5>
                  <div class="form-group dam-scale-scale-4">
                    <div class="form-group col-sm-6">
                      <label class="control-label col-sm-4" for="dam-scale-scale-4-term">{{ trans('backoffice/tools/display_setting.value') }}
                        <=</label> <div class="col-sm-6">
                          <input type="text" class="form-control" id="dam-scale-scale-4-term" name="term" data-key="scale.4.term" style="width: 100%;">
                    </div>
                    <div class="form-group col-sm-2">
                      <label class="control-label col-sm-6"> % </label>
                    </div>
                  </div>
                  <div class="form-group color col-sm-6">
                    <label class="control-label col-sm-4" for="dam-scale-scale-color">{{ trans('backoffice/tools/display_setting.tag_color') }}:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control jscolor {hash:true}" id="dam-scale-scale-color" name="color" data-key="scale.4.color" style="width: 100%;">
                    </div>
                  </div>
                </div>
              </div>
              <div class="dam_scale_sub">
                <br />
                <h5>{{ trans('/backoffice/tools/display_setting.level_2') }}</h5>
                <div class="form-group dam-scale-scale-3">
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="dam-scale-scale-3-term">{{ trans('backoffice/tools/display_setting.value') }} > </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="dam-scale-scale-3-term" name="term" data-key="scale.3.term" style="width: 100%;">
                    </div>
                    <div class="form-group col-sm-2">
                      <label class="control-label col-sm-6"> % </label>
                    </div>
                  </div>
                  <div class="form-group color col-sm-6">
                    <label class="control-label col-sm-4" for="dam-scale-scale-color">{{ trans('backoffice/tools/display_setting.tag_color') }}:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control jscolor {hash:true}" id="dam-scale-scale-color" name="color" data-key="scale.3.color" style="width: 100%;">
                    </div>
                  </div>
                </div>
              </div>
              <div class="dam_scale_sub">
                <br />
                <h5>{{ trans('/backoffice/tools/display_setting.level_3') }}</h5>
                <div class="form-group dam-scale-scale-2">
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="dam-scale-scale-2-term">{{ trans('backoffice/tools/display_setting.value') }} > </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="dam-scale-scale-2-term" name="term" data-key="scale.2.term" style="width: 100%;">
                    </div>
                    <div class="form-group col-sm-2">
                      <label class="control-label col-sm-6"> % </label>
                    </div>
                  </div>
                  <div class="form-group color col-sm-6">
                    <label class="control-label col-sm-4" for="dam-scale-scale-color">{{ trans('backoffice/tools/display_setting.tag_color') }}:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control jscolor {hash:true}" id="dam-scale-scale-color" name="color" data-key="scale.2.color" style="width: 100%;">
                    </div>
                  </div>
                </div>
              </div>
              <div class="dam_scale_sub">
                <br />
                <h5>{{ trans('/backoffice/tools/display_setting.level_4') }}</h5>
                <div class="form-group dam-scale-scale-1">
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="dam-scale-scale-1-term">{{ trans('backoffice/tools/display_setting.value') }} > </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="dam-scale-scale-1-term" name="term" data-key="scale.1.term" style="width: 100%;">
                    </div>
                    <div class="form-group col-sm-2">
                      <label class="control-label col-sm-6"> % </label>
                    </div>
                  </div>
                  <div class="form-group color col-sm-6">
                    <label class="control-label col-sm-4" for="dam-scale-scale-color">{{ trans('backoffice/tools/display_setting.tag_color') }}:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control jscolor {hash:true}" id="dam-scale-scale-color" name="color" data-key="scale.1.color" style="width: 100%;">
                    </div>
                  </div>
                </div>
              </div>
              <div class="dam_scale_sub">
                <br />
                <h5>{{ trans('/backoffice/tools/display_setting.level_5') }}</h5>
                <div class="form-group dam-scale-scale-0">
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">{{ trans('backoffice/tools/display_setting.value') }} > </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="term" data-key="scale.0.term" style="width: 100%;">
                    </div>
                    <div class="form-group col-sm-2">
                      <label class="control-label col-sm-6"> % </label>
                    </div>
                  </div>
                  <div class="form-group color col-sm-6">
                    <label class="control-label col-sm-4" for="dam-scale-scale-color">{{ trans('backoffice/tools/display_setting.tag_color') }}:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control jscolor {hash:true}" id="dam-scale-scale-color" name="color" data-key="scale.0.color" style="width: 100%;">
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('master.btn_close') }}</button>
      <button type="button" class="btn btn-primary btn-save" data-dismiss="modal">{{ trans('master.btn_save') }}</button>
    </div>
  </div>

</div>
</div>
<style>
/* 
  label {
    justify-content: fle;
  } */
</style>