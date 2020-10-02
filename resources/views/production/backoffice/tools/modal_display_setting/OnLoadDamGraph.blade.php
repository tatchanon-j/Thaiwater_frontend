<!-- Modal for OnLoadDamGraph -->
<div id="OnLoadDamGraph" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">{{ trans('/backoffice/tools/display_setting.title_dam_scale') }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="tab-content" style="padding-top:2%;">
          <div class="tab-pane fade show active">
            <p>กาตั้งต่าการแสดงผลของกราฟเขื่อน โดยให้ผู้ใช้งานเลือกเขื่อนที่ต้องการแสดงกราฟ</p>
            <form id="form-dam-graph" class="form-inline" for="form">
              <input type="text" id="setting-code" style="display:none"/>
              <div class="form-group col-sm-12">
                <label class="col-sm-2 control-label">เขื่อน</label>
                <div class="col-sm-10">
                  <select id="filters-dam" class="form-control" multiple="multiple">
                    <!-- <option value="20">หนองค้อ</option>
                    <option value="24">หนองปลาไหล</option>
                    <option value="28">ศรีนครินทร์-วชิราลงกรณ์</option>
                    <option value="37">นฤบดินทรจินดา</option> -->
                  </select>
                </div>
              </div>

                <!-- <input class="check_dam" type="checkbox" value="20" data-key="20"> หนองค้อ<br>
                <input class="check_dam" type="checkbox" value="24" data-key="24"> หนองปลาไหล<br>
                <input class="check_dam" type="checkbox" value="28" data-key="28"> ศรีนครินทร์-วชิราลงกรณ์<br>
                <input class="check_dam" type="checkbox" value="37" data-key="37"> นฤบดินทรจินดา<br> -->
              <div class="form-group"></div>
            </form>
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
