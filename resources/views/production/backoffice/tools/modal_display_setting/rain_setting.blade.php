<!-- Modal for rain_setting -->
<div id="rain_setting" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ trans('/backoffice/tools/display_setting.title_rain') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#rain-rule" role="tab" aria-controls="home" aria-selected="true">{{ trans('backoffice/tools/display_setting.scale_notification') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#rain-scale" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.scale_display') }}</a>
          </li>
        </ul>

        <div class="tab-content">
          <div id="rain-rule" class="tab-pane fade show active">
            <h5 style="margin-top:1rem">{{ trans('backoffice/tools/display_setting.scale_color') }}</h5>
            <div class="form-group col-sm-12">
              <form class="form-inline">
                <input type="text" id="setting-code" style="display:none" />
                <div class="form-group col-sm-6 div-dam-scale-low">
                  <label class="control-label col-sm-6 level_color_name_3" style="justify-content : flex-end;"><span data-key="level_color.3.name"></span></label>
                  <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="level_color.3.color">
                </div>
                <div class="form-group col-sm-6 div-dam-scale-high">
                  <label class="control-label col-sm-6" for="level_color_name_4" style="justify-content : flex-end;"><span data-key="level_color.4.name"></span></label>
                  <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="level_color.4.color">
                </div>
              </form>
            </div>
            <h5 style="margin-top:1rem">{{ trans('backoffice/tools/display_setting.rule_rain') }}</h5>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="#" data-toggle="tab" href="#rain_rule1" role="tab" aria-controls="home" aria-selected="true">{{ trans('backoffice/tools/display_setting.rain_rule_1') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="#" data-toggle="tab" href="#rain_rule2" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.rain_rule_2') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="#" data-toggle="tab" href="#rain_rule3" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.rain_rule_3') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="#" data-toggle="tab" href="#rain_rule4" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.rain_rule_4') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="#" data-toggle="tab" href="#rain_rule5" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.rain_rule_5') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="#" data-toggle="tab" href="#rain_rule6" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.rain_rule_6') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="#" data-toggle="tab" href="#rain_rule7" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.rain_rule_7') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="#" data-toggle="tab" href="#rain_rule8" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.rain_rule_8') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="#" data-toggle="tab" href="#rain_rule9" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.rain_rule_9') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="#" data-toggle="tab" href="#rain_rule10" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.rain_rule_10') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="#" data-toggle="tab" href="#rain_rule11" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.rain_rule_11') }}</a>
              </li>
            </ul>
            <div class="tab-content">
              <div id="rain_rule1" class="tab-pane fade show active">
                <h5 class="rain_rule_level_color_3" style="margin-top:1rem"><span data-key="level_color.3.name"></span></h5>

                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.01.1.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.01.1.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.01.1.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>

                <h5 class="rain_rule_level_color_4"><span data-key="level_color.4.name"></span></h5>

                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.01.0.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.01.0.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.01.0.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div id="rain_rule2" class="tab-pane fade">
                <h5 class="rain_rule_level_color_3"><span data-key="level_color.3.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.02.1.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.02.1.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.02.1.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>

                <h5 class="rain_rule_level_color_4"><span data-key="level_color.4.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.02.0.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.02.0.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.02.0.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div id="rain_rule3" class="tab-pane fade">
                <h5 class="rain_rule_level_color_3"><span data-key="level_color.3.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.03.1.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.03.1.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.03.1.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>

                <h5 class="rain_rule_level_color_4"><span data-key="level_color.4.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.03.0.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.03.0.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.03.0.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div id="rain_rule4" class="tab-pane fade">
                <h5 class="rain_rule_level_color_3"><span data-key="level_color.3.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.04.1.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.04.1.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.04.1.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>

                <h5 class="rain_rule_level_color_4"><span data-key="level_color.4.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.04.0.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.04.0.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.04.0.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div id="rain_rule5" class="tab-pane fade">
                <h5 class="rain_rule_level_color_3"><span data-key="level_color.3.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.05.1.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.05.1.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.05.1.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
                <h5 class="rain_rule_level_color_4"><span data-key="level_color.4.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.05.0.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.05.0.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.05.0.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div id="rain_rule6" class="tab-pane fade">
                <h5 class="rain_rule_level_color_3"><span data-key="level_color.3.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.06.1.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.06.1.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.06.1.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
                <h5 class="rain_rule_level_color_4"><span data-key="level_color.4.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.06.0.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.06.0.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.06.0.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div id="rain_rule7" class="tab-pane fade">
                <h5 class="rain_rule_level_color_3"><span data-key="level_color.3.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.07.1.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.07.1.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.07.1.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
                <h5 class="rain_rule_level_color_4"><span data-key="level_color.4.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.07.0.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.07.0.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.07.0.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div id="rain_rule8" class="tab-pane fade">
                <h5 class="rain_rule_level_color_3"><span data-key="level_color.3.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.08.1.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.08.1.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.08.1.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
                <h5 class="rain_rule_level_color_4"><span data-key="level_color.4.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.08.0.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.08.0.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.08.0.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div id="rain_rule9" class="tab-pane fade">
                <h5 class="rain_rule_level_color_3"><span data-key="level_color.3.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.09.1.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.09.1.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.09.1.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
                <h5 class="rain_rule_level_color_4"><span data-key="level_color.4.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.09.0.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.09.0.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.09.0.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div id="rain_rule10" class="tab-pane fade">
                <h5 class="rain_rule_level_color_3"><span data-key="level_color.3.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.10.1.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.10.1.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.10.1.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
                <h5 class="rain_rule_level_color_4"><span data-key="level_color.4.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.10.0.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.10.0.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.10.0.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div id="rain_rule11" class="tab-pane fade">
                <h5 class="rain_rule_level_color_3"><span data-key="level_color.3.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.11.1.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.11.1.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.11.1.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
                <h5 class="rain_rule_level_color_4"><span data-key="level_color.4.name"></span></h5>
                <div class="form-group col-sm-12 sub-content-rule">
                  <form class="form-inline">
                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain1h" data-key="rule.11.0.rain1h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain1h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain24h" data-key="rule.11.0.rain24h" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label col-sm-4" style="justify-content: flex-start">rain24h >= </label>
                      <div class="form-group col-sm-6">
                        <input type="number" class="form-control" name="rain3d" data-key="rule.11.0.rain3d" style="width:100%" />
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="control-label col-sm-12">{{ trans('/backoffice/tools/display_setting.ml') }}</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div id="rain-scale" class="tab-pane fade">
            <br />

            <div class="rain-scale-level">
              <h5>{{ trans('/backoffice/tools/display_setting.level_1') }}<span data-key=""></span></h5>

              <div class="form-group col-sm-12 sub-content-rain-scale">
                <form class="form-inline">
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4"> {{ trans('backoffice/tools/display_setting.value_>') }} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.6.term" style="width: 100%;" />
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.6.color" style="width: 100%;" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="rain-scale-level">
              <h5>{{ trans('/backoffice/tools/display_setting.level_2') }}<span data-key=""></span></h5>
              <div class="form-group col-sm-12 sub-content-rain-scale">
                <form class="form-inline">
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4"> {{ trans('backoffice/tools/display_setting.value_>') }} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.5.term" style="width: 100%;" />
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.5.color" style="width: 100%;" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="rain-scale-level">
              <h5>{{ trans('/backoffice/tools/display_setting.level_3') }}<span data-key=""></span></h5>
              <div class="form-group col-sm-12 sub-content-rain-scale">
                <form class="form-inline">
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4"> {{ trans('backoffice/tools/display_setting.value_>') }} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.4.term" style="width: 100%;" />
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.4.color" style="width: 100%;" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="rain-scale-level">
              <h5>{{ trans('/backoffice/tools/display_setting.level_4') }}<span data-key=""></span></h5>
              <div class="form-group col-sm-12 sub-content-rain-scale">
                <form class="form-inline">
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4"> {{ trans('backoffice/tools/display_setting.value_>') }} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.3.term" style="width: 100%;" />
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.3.color" style="width: 100%;" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="rain-scale-level">
              <h5>{{ trans('/backoffice/tools/display_setting.level_5') }}<span data-key=""></span></h5>
              <div class="form-group col-sm-12 sub-content-rain-scale">
                <form class="form-inline">
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4"> {{ trans('backoffice/tools/display_setting.value_>') }} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.2.term" style="width: 100%;" />
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.2.color" style="width: 100%;" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="rain-scale-level">
              <h5>{{ trans('/backoffice/tools/display_setting.level_6') }}<span data-key=""></span></h5>
              <div class="form-group col-sm-12 sub-content-rain-scale">
                <form class="form-inline">
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4"> {{ trans('backoffice/tools/display_setting.value_>') }} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.1.term" style="width: 100%;" />
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.1.color" style="width: 100%;" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="rain-scale-level">
              <h5>{{ trans('/backoffice/tools/display_setting.level_7') }}<span data-key=""></span></h5>
              <div class="form-group col-sm-12 sub-content-rain-scale">
                <form class="form-inline">
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4"> {{ trans('backoffice/tools/display_setting.value_>') }} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.0.term" style="width: 100%;" />
                    </div>
                  </div>
                  <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.0.color" style="width: 100%;" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="form-group"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('master.btn_close') }}</button>
          <button type="button" class="btn btn-primary btn-save" data-dismiss="modal">{{ trans('master.btn_save') }}</button>
        </div>
      </div>
    </div>

  </div>
</div>
<style>

  h5 {
    margin-top: 1rem;
  }
</style>