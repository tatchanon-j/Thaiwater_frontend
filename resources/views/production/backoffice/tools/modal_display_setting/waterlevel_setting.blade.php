<!-- Modal for waterlevel_setting -->
<div id="waterlevel_setting" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ trans('/backoffice/tools/display_setting.title_waterlevel') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <br/>
        <ul class="nav nav-tabs">
          <!-- <li class="active"><a data-toggle="tab" href="#waterlevel-level">{{ trans('backoffice/tools/display_setting.scale_notification') }}</a></li>
          <li><a data-toggle="tab" href="#waterlevel-scale">{{ trans('backoffice/tools/display_setting.scale_display') }}</a></li> -->
          <!-- <li><a data-toggle="tab" href="#waterlevel-not_today">{{ trans('backoffice/tools/display_setting.not_today') }}</a></li> -->
          <li class="nav-item">
                <a class="nav-link active" id="#" data-toggle="tab" href="#waterlevel-level" role="tab" aria-controls="home" aria-selected="true">{{ trans('backoffice/tools/display_setting.scale_notification') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="#" data-toggle="tab" href="#waterlevel-scale" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.scale_display') }}</a>
              </li>
        </ul>
        <div class="tab-content">
          <div id="waterlevel-level" class="tab-pane fade show active">
            <div class="waterlevel_level_sub">
              <h5>{{ trans('/backoffice/tools/display_setting.level_1') }}</h5>
              <div class="form-group col-sm-12 sub-content-rain-scale">
                <form class="form-inline">
                <input type="text" id="setting-code" style="display:none"/>
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" style="justify-content: flex-end;"> {{ trans('/backoffice/tools/display_setting.value_<=') }} </label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="term" data-key="rule.1.term" style="width: 100%;" />
                    </div>
                  <div class="form-group col-sm-2">
                    <label class="control-label col-sm-12" >{{ trans('backoffice/tools/display_setting.value_unit_notification') }}</label>
                  </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="waterlevel-level-1-color" style="justify-content: flex-end;">{{ trans('/backoffice/tools/display_setting.tag_color') }}:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control jscolor {hash:true}" id="waterlevel-level-2-color" name="color" data-key="level.1.color" style="width: 100%;" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="waterlevel_level_sub">
              <h5>{{ trans('/backoffice/tools/display_setting.level_2') }}</h5>
              <div class="form-group col-sm-12 sub-content-rain-scale">
                <form class="form-inline">
                <input type="text" id="setting-code" style="display:none"/>
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" style="justify-content: flex-end;"> {{ trans('/backoffice/tools/display_setting.value_<=') }} </label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="term" data-key="rule.0.term" style="width: 100%;" />
                    </div>
                  <div class="form-group col-sm-2">
                    <label class="control-label col-sm-12" >{{ trans('backoffice/tools/display_setting.value_unit_notification') }}</label>
                  </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="waterlevel-level-1-color" style="justify-content: flex-end;">{{ trans('/backoffice/tools/display_setting.tag_color') }}:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control jscolor {hash:true}" id="waterlevel-level-1-color" name="color" data-key="level.2.color" style="width: 100%;" />
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
          <div id="waterlevel-scale" class="tab-pane fade">
            <div class="waterlevel-scale">
              <h5><span data-key="scale.4.situation"></span></h5>
              <form class="form-inline" for="form">
                <div class="form-group col-sm-6">
                  <label class="control-label col-sm-4" for=""> {{ trans('backoffice/tools/display_setting.value_<=') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id=""  name="term" data-key="scale.4.term" style="width: 100%;">
                  </div>
                </div>
                <div class="form-group color col-sm-6">
                  <label class="control-label col-sm-4" for="">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control jscolor {hash:true}" id="" name="color" data-key="scale.4.color" style="width: 100%;">
                  </div>
                </div>
                <div class="form-group"></div>
              </form>
            </div>
            <div class="waterlevel-scale">
              <h5><span data-key="scale.3.situation"></span></h5>
              <form class="form-inline" for="form">
                <div class="form-group col-sm-6">
                  <label class="control-label col-sm-4" for=""> {{ trans('backoffice/tools/display_setting.value_>') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id=""  name="term" data-key="scale.3.term" style="width: 100%;">
                  </div>
                </div>
                <div class="form-group color col-sm-6">
                  <label class="control-label col-sm-4" for="">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control jscolor {hash:true}" id="" name="color" data-key="scale.3.color" style="width: 100%;">
                  </div>
                </div>
                <div class="form-group"></div>
              </form>
            </div>
            <div class="waterlevel-scale">
              <h5><span data-key="scale.2.situation"></span></h5>
              <form class="form-inline" for="form">
                <div class="form-group col-sm-6">
                  <label class="control-label col-sm-4" for=""> {{ trans('backoffice/tools/display_setting.value_>') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id=""  name="term" data-key="scale.2.term" style="width: 100%;">
                  </div>
                </div>
                <div class="form-group color col-sm-6">
                  <label class="control-label col-sm-4" for="">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control jscolor {hash:true}" id="" name="color" data-key="scale.2.color" style="width: 100%;">
                  </div>
                </div>
                <div class="form-group"></div>
              </form>
            </div>
            <div class="waterlevel-scale">
              <h5><span data-key="scale.1.situation"></span></h5>
              <form class="form-inline" for="form">
                <div class="form-group col-sm-6">
                  <label class="control-label col-sm-4" for=""> {{ trans('backoffice/tools/display_setting.value_>') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id=""  name="term"  data-key="scale.1.term" style="width: 100%;">
                  </div>
                </div>
                <div class="form-group color col-sm-6">
                  <label class="control-label col-sm-4" for="">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control jscolor {hash:true}" id="" name="color"  data-key="scale.1.color" style="width: 100%;">
                  </div>
                </div>
                <div class="form-group"></div>
              </form>
            </div>
            <div class="waterlevel-scale">
              <h5><span data-key="scale.0.situation"></span></h5>
              <form class="form-inline" for="form">
                <div class="form-group col-sm-6">
                  <label class="control-label col-sm-4" for=""> {{ trans('backoffice/tools/display_setting.value_>') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id=""  name="term"  data-key="scale.0.term"style="width: 100%;">
                  </div>
                </div>
                <div class="form-group color col-sm-6">
                  <label class="control-label col-sm-4" for="">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control jscolor {hash:true}" id="" name="color"  data-key="scale.0.color"style="width: 100%;">
                  </div>
                </div>
                <div class="form-group"></div>
              </form>
            </div>
            <div class="waterlevel-nottoday">
              <h5>{{ trans('backoffice/tools/display_setting.not_today') }}</h5>
              <form class="form-inline" for="form">
                <div class="form-group col-sm-6">
                  <label class="control-label col-sm-4" for="waterlevel-level-1-color">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control jscolor {hash:true }" id="" name="color" data-key="not_today.color" style="width: 100%;"/>
                  </div>
                </div>
                <div class="form-group"></div>
              </form>
            </div>
            <!-- <div class="form-group color col-sm-6">
              <form class="form-inline" for="form">
                <label class="control-label col-sm-4" for="waterlevel-level-1-color">{{ trans('backoffice/tools/display_setting.tag_color') }}:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control jscolor {hash:true }" id="" name="color" data-key="not_today.color"/>
                </div>
              </form>
            </div> -->
            <!-- <div class="col-sm-12"></div> -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('master.btn_close') }}</button>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal">{{ trans('master.btn_save') }}</button>
      </div>
    </div>

  </div>
</div>
<style>

  h5 {
    margin-top: 1rem;
  }
</style>