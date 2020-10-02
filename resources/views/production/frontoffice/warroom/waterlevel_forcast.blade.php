@extends('frontoffice.layout.warroom-admin')

<div class="row">
   <div class="col-md-12">
      <header>น้ำในลำน้ำ</header>
      <form class="form-inline">
         <div class="form-group">
            <label for="exampleInputEmail2">ลุ่มน้ำ</label>
            <select name="" id="">
               <option value="">สาละวิน</option>
            </select>
         </div>
         <div class="form-group">
            <label for="exampleInputEmail2">หน่วยงาน</label>
            <select name="" id="">
               <option value="">การไฟฟ้าฝ่ายผลิต</option>
            </select>
         </div>
         <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>
         ค้นหา</button>
      </form>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
         <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">น้ำในลำน้ำ</a></li>
         <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">น้ำที่ ปตร./ฝ่าย</a></li>
         <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">CCTV</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
         <div role="tabpanel" class="tab-pane active" id="home">
            <div class="row">
               <div class="col-md-12">
                  <header>น้ำในลำน้ำ</header>
                  <table class="table table-striped table-hover">
                     <thead>
                        <tr>
                           <th>ขื่อสถานี</th>
                           <th>วันที่ </th>
                           <th>เวลา </th>
                           <th>น้ำลึก <br><em>(ม.)</em></th>
                           <th>ระดับน้ำ <br><em>(ม.รทก)</em></th>
                           <th>ความจุลำน้ำ <br><em>(ม.รทก)</em></th>
                           <th>สถานะการณ์น้ำ</th>
                           <th>สถานะ</th>
                        </tr>
                        <tr>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td><span style="color:#003CFA">text</span></td>
                           <td><span style="color:#00B050"><i class="fa fa-arrow-down" aria-hidden="true"></i>
                              ลดลง</span>
                           </td>
                        </tr>
                        <tr>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td><span style="color:#003CFA">text</span></td>
                           <td><span style="color:#FF0000"><i class="fa fa-arrow-up" aria-hidden="true"></i>
                              เพิ่มขึ้น</span>
                           </td>
                        </tr>
                        <tr>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td><span style="color:#003CFA">text</span></td>
                           <td><span style="color:#00B050"><i class="fa fa-arrow-down" aria-hidden="true"></i>
                              ลดลง</span>
                           </td>
                        </tr>
                        <tr>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td>test</td>
                           <td><span style="color:#003CFA">text</span></td>
                           <td><span style="color:#DB802B"><i class="fa fa-arrows-v" aria-hidden="true"></i>
                              ทรงตัว</span>
                           </td>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
         </div>
         <div role="tabpanel" class="tab-pane" id="profile">...2</div>
         <div role="tabpanel" class="tab-pane" id="messages">...3</div>
         <div role="tabpanel" class="tab-pane" id="settings">...4</div>
      </div>
   </div>
</div>
<div id="">
   %ความจุลำน้ำ
   <span class="label label-default btn-xs" style="background:#DB802B"><=10
   น้ำน้อยวิกฤติ</span>
   <span class="label label-default btn-xs" style="background:#FFC000">>10-30
   น้ำน้อย</span>
   <span class="label label-default btn-xs" style="background:#00B050">>30-70
   น้ำปกติ</span>
   <span class="label label-default btn-xs" style="background:#003CFA">>70-100
   น้ำมาก</span>
   <span class="label label-default btn-xs" style="background:#FF0000">>100
   น้ำล้นตลิ่ง</span>
</div>
<!--/  21 / 50 -->
<center style="margin-top:30px;">view 22/50 </center>
<hr style="margin:20px;border-color: #000;border-style: dotted;">