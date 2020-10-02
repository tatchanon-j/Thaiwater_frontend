<!-- Modal for waterquality_setting -->
<div id="waterquality_setting" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ trans('/backoffice/tools/display_setting.title_waterquarity') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" id="#" data-toggle="tab" href="#criteria" role="tab" aria-controls="home" aria-selected="true">{{ trans('backoffice/tools/display_setting.scale_notification') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="#" data-toggle="tab" href="#scale" role="tab" aria-controls="profile" aria-selected="false">{{ trans('backoffice/tools/display_setting.scale_display') }}</a>
          </li>
        </ul>

        <div class="tab-content">
          <br />
          <div id="criteria" class="tab-pane fade show active">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" id="#" data-toggle="tab" href="#144" role="tab" aria-controls="home" aria-selected="true"><span data-key="criteria.144.name"></span></a>
              </li>
            </ul>
            <div class="tab-content">
              <div id="144" class="tab-pane fade show active">
                <h5><span data-key="scale.3.situation"></span></h5>
                <form for="form" id="form_criteria_setting">

                  <div class="criteria_sub do" style="display: none;">
                    <h5>{{ trans('/backoffice/tools/display_setting.do') }}</h5>
                    <form class="form-inline" for="form">
                      <div class="form-group col-sm-4">
                        <label class="control-label col-sm-4" for="criteria-do-term">{{ trans('/backoffice/tools/display_setting.do_value_>') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="criteria-do-term" name="term" data-key="criteria.144.do.0.term">
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label class="control-label col-sm-4" for="criteria-do-color">Color:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control jscolor {hash:true}" id="criteria-do-color" name="color" data-key="criteria.144.do.0.color">
                        </div>
                      </div>
                      <div class="form-group"></div>
                    </form>
                  </div>

                  <!-- Conductivity -->
                  <div class="criteria_sub conductivity">
                    <h5>{{ trans('/backoffice/tools/display_setting.conductivity') }}</h5>
                    <input type="text" id="setting-code" style="display:none" />

                    <form class="form-inline">
                      <div class="form-group col-sm-4">
                        <label class="control-label col-sm-4" for="criteria-conduct-term">{{ trans('/backoffice/tools/display_setting.conduc_value_<') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="term" data-key="criteria.144.conductivity.0.term" style="width: 100%;" />
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label class="control-label col-sm-4" for="criteria-conduct-color">{{ trans('/backoffice/tools/display_setting.tag_color') }}:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="criteria.144.conductivity.0.color" style="width: 100%;">
                        </div>
                      </div>
                      <div class="form-group"></div>
                    </form>
                  </div>
                  <!-- Do -->
                  <div class="criteria_sub do">
                    <h5>{{ trans('/backoffice/tools/display_setting.do') }}</h5>
                    <form class="form-inline" for="form">
                      <div class="form-group col-sm-4">
                        <label class="control-label col-sm-4" for="criteria-do-term">{{ trans('/backoffice/tools/display_setting.do_value_>') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="criteria-do-term" name="term" data-key="criteria.144.do.0.term" style="width: 100%;">
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label class="control-label col-sm-4" for="criteria-do-color">Color:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control jscolor {hash:true}" id="criteria-do-color" name="color" data-key="criteria.144.do.0.color" style="width: 100%;">
                        </div>
                      </div>
                      <div class="form-group"></div>
                    </form>
                  </div>
                  <!-- PH -->
                  <div class="criteria_sub ph">
                    <h5>{{ trans('/backoffice/tools/display_setting.ph') }}</h5>
                    <div class="col-sm-12 ph_sub">
                      <form class="form-inline">
                        <div class="form-group col-sm-4">
                          <label class="control-label col-sm-4" for="criteria-ph-term">{{ trans('/backoffice/tools/display_setting.ph_value_>=') }}</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="term" data-key="criteria.144.ph.0.term" style="width: 100%;">
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-sm-4" for="criteria-ph-term-2">{{ trans('/backoffice/tools/display_setting.ph_value_<=') }}</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="term-2" data-key="criteria.144.ph.0.term_2" style="width: 100%;">
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-sm-4" for="color">{{ trans('/backoffice/tools/display_setting.tag_color') }}</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="criteria.144.ph.0.color" style="width: 100%;">
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="col-sm-12 ph_sub" style="margin-top:1rem">
                      <form class="form-inline">
                        <div class="form-group col-sm-4">
                          <label class="control-label col-sm-4" for="criteria-ph-term-2">{{ trans('/backoffice/tools/display_setting.ph_value_>') }}</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="term" data-key="criteria.144.ph.1.term" style="width: 100%;">
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-sm-4">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="criteria.144.ph.1.color" style="width: 100%;">
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-sm-12 ph_sub" style="margin-top:1rem">
                      <form class="form-inline">
                        <div class="form-group col-sm-4">
                          <label class="control-label col-sm-4" for="criteria-ph-term-2">{{ trans('backoffice/tools/display_setting.ph_value_<') }}</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="term" data-key="criteria.144.ph.2.term" style="width: 100%;">
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-sm-4" for="color">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="criteria.144.ph.2.color" style="width: 100%;">
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="form-group"></div>
                  </div>

                  <!-- Serinity -->
                  <div class="criteria_sub salinity">
                    <h5>{{ trans('/backoffice/tools/display_setting.salinity') }}</h5>
                    <form class="form-inline">
                      <div class="form-group col-sm-4">
                        <label class="control-label col-sm-4" for="criteria-selinity-term">{{ trans('backoffice/tools/display_setting.salt_value_<') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="term" data-key="criteria.144.salinity.0.term" style="width: 100%;">
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label class="control-label col-sm-4" for="criteria-selinity-color">{{ trans('backoffice/tools/display_setting.tag_color') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="criteria.144.salinity.0.color" style="width: 100%;">
                        </div>
                      </div>
                      <div class="form-group"></div>
                    </form>
                  </div>

                  <!-- Not today -->
                  <div class="form-group default col-sm-6">
                    <h5>{{ trans('/backoffice/tools/display_setting.default') }}</h5>
                    <form class="form-inline">
                      <label class="control-label col-sm-4" for="tag_color">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="not_today.color" style="width: 100%;">
                      </div>
                    </form>
                  </div>

                  <div class="form-group"></div>

                </form>
              </div>
            </div>
          </div>
          <div id="scale" class="tab-pane fade">
            <!-- <form class="form-horizontal" for="form"> -->
            <!-- Do -->
            <div class="scale_sub do">
              <h5>{{ trans('/backoffice/tools/display_setting.do')}}</h5>
              <div class="col-sm-12 sub">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4" for="scale-do-term">{{ trans('/backoffice/tools/display_setting.do_value_<')}}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="term" data-key="scale.do.0.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4" for="scale-do-color">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.do.0.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- PH -->
            <div class="scale_sub ph">
              <h5>{{ trans('/backoffice/tools/display_setting.ph')}}</h5>
              <div class="col-sm-12 sub">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.ph_value_=')}} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.ph.0.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4" for="scale-ph-term-0">ถึง:</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term_2" data-key="scale.ph.0.term_2" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.ph.1.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-12 sub" style="margin-top:1rem">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.ph_value_<')}} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.ph.1.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.ph.1.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-12 sub" style="margin-top:1rem">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.ph_value_>')}} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.ph.2.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.ph.2.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- salinity -->
            <div class="scale_sub salinity">
              <h5>{{ trans('/backoffice/tools/display_setting.salinity')}}</h5>
              <div class="col-sm-12 sub">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.salinity_>')}}</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.salinity.0.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.salinity.0.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-12 sub" style="margin-top:1rem">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.salinity_>')}}</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.salinity.1.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.salinity.1.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-12 sub" style="margin-top:1rem">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.salinity_>')}}</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.salinity.2.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.salinity.2.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- tds -->
            <div class="scale_sub tds">
              <h5>{{ trans('/backoffice/tools/display_setting.tds') }}</h5>
              <div class="col-sm-12 sub">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tds_<=')}}</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.tds.0.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.tds.0.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-12 sub">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tds_>')}}</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.tds.1.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.tds.1.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- turbid -->
            <div class="scale_sub turbid">
              <h5>{{ trans('/backoffice/tools/display_setting.turbid') }}</h5>
              <div class="col-sm-12 sub">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.turbid_=')}}</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.turbid.0.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.turbid.0.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-12 sub" style="margin-top:1rem">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.turbid_>')}} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.turbid.1.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.turbid.1.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-12 sub" style="margin-top:1rem">
                <form class="form-inline">
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.turbid_<')}} </label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="term" data-key="scale.turbid.2.term" style="width: 100%;">
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control jscolor {hash:true}" name="color" data-key="scale.turbid.2.color" style="width: 100%;">
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Default -->
            <div class="form-group not_today color col-sm-6">
              <h5>{{ trans('/backoffice/tools/display_setting.waterquality_not_today') }}</h5>
              <form class="form-inline">
                <label for="default-color" class="control-label col-sm-4">{{ trans('/backoffice/tools/display_setting.tag_color')}}:</label>
                <div class="col-sm-8">
                  <input id="default-color" class="form-control jscolor {hash:true}" name="color" data-key="not_today.color" style="width: 100%;" />
                </div>
              </form>
            </div>

            <div class="form-group"></div>
            <!-- </form> -->
            <!-- </form> -->
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

  input.form-control.jscolor {
    width: 100%;
  }

  input.form-control {
    width: 100%;
  }
</style>