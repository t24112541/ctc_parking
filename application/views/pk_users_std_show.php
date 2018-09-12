<?php $conn=mysqli_connect("localhost","root","","ctc_parking");$conn->set_charset("utf8"); if(isset($error)) { echo $error; }; foreach ($row as $sh) {
  $us_id=$sh['us_id'];
  $d_id=$sh['d_id'];
?>

<div class="container-fluid">
   <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#general">ข้อมูลทั่วไป</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#security">ความปลอดภัย</a>
    </li>
  </ul>
  <div class="tab-content">
    <div id="general" class="container tab-pane active"><br>
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 box_shadows box_content">
          <?php  if(isset($error)) { echo $error; };$tab="general"; ?>
          <?=form_open("ctrl_admin/edit_user_std/$us_id/$tab/$d_id",array("class"=>"form-horizontal")); ?><p>

            <h4 align="center">ข้อมูลนักเรียน / นักศึกษา</h4></p>
             <div class="form-group">

    <!-- *******************  -->
                <?php echo form_error('c_id'); ?>

                <div class="col-sm-11">
                  <label>กลุ่มการเรียน</label>
                   <select class="form-control" name="c_id" id="c_id">
                    <option value="<?=$sh['c_id']?>"><?=$sh['c_name']?></option>
                    <option value="">---------- เลือกกลุ่มการเรียน ----------</option>
                    <?php foreach ($dep as $sh_class) {?>
                    <option value="<?=$sh_class['c_id']?>" <?php echo set_select('c_id',$sh_class['c_id'], ( !empty($data) && $data == $sh_class['c_id'] ? TRUE : FALSE )); ?>><?=$sh_class['c_name']?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
    <!-- *******************  -->
              <div class="form-group">
                <?php echo form_error('us_std_id'); ?>
                <div class="col-sm-11">  
                <label>รหัสนักเรียน / นักศึกษา</label>        
                  <input type="text" class="form-control" id="us_std_id" placeholder="กรอกรหัสประจำตัวนักเรียน / นักศึกษา" name="us_std_id" value="<?php echo $sh['us_std_id']; set_value('us_std_id'); ?>">
                </div>
              </div>

              <div class="form-group">
                <?php echo form_error('us_name'); ?><?php echo form_error('us_lname'); ?>

                 <div class="col-sm-12">
                  <label>ชื่อ</label>
                  <input type="text" class="cv_frm_control cv_frm_control-width-mn" id="us_name" placeholder="กรอกชื่อนักเรียน / นักศึกกษา" name="us_name" value="<?php echo $sh['us_name']; echo set_value('us_name'); ?>">
                  <label>นามสกุล</label>
                   <input type="text" class="cv_frm_control cv_frm_control-width-mn" id="us_lname" placeholder="กรอก นามสกุล นักเรียน / นักศึกกษา" name="us_lname" value="<?php echo $sh['us_lname']; echo set_value('us_lname'); ?>">
                 </div>
              </div>

             

<center><p><br>
              <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success" name="btn_add">บันทึก</button>
                </div>
              </div>
          <?=form_close();?>
        </div>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div id="security" class="container tab-pane "><br>
        <div class="row">
          <div class="col-sm-2"></div>
            <div class="col-sm-8 box_shadows box_content">
              <?php $tab="security"; ?>
            <?=form_open("ctrl_admin/edit_user_std/$us_id/$tab/$d_id",array("class"=>"form-horizontal","onsubmit"=>"return con_pass()")); ?><p>
             

            <h4 align="center">ข้อมูลนักเรียน / นักศึกษา</h4></p>
              <div class="form-group">
                <label>username</label><?php echo form_error('us_username'); ?>
                <div class="col-sm-12">    <br>    
                <input type="hidden" name="step_2" value="">  
                  <input type="text" class="form-control" id="us_username" placeholder="สร้าง username" name="us_username" value="<?php echo $sh['us_username']; echo set_value('us_username'); ?>">
                </div>
              </div>

              <div class="form-group">
                 <label>password</label><?php echo form_error('us_password'); ?>
                <div class="col-sm-12">          
                  <input type="password" class="form-control" placeholder="สร้าง password" name="us_password" id="us_password" value="<?php echo set_value('us_password'); ?>">
                </div>
              </div>

              <div class="form-group">
                 <label>confirm password</label><?php echo form_error('us_password_conf'); ?>
                <div class="col-sm-12">          
                  <input type="password" class="form-control" placeholder="ยืนยัน password" name="us_password_conf" id="us_password_conf" onkeyup="confirm_pass()" value="<?php echo set_value('us_password_conf'); ?>">

                </div>
              </div>

<center><p><br>
              <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                  <button id="btn_edit" type="submit" class="btn btn-success" name="btn_edit">บันทึก</button>
                </div>
              </div>
              <?=form_close();?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?php } ?>

<script>
function con_pass() {
    var pass1 = document.getElementById("us_password").value;
    var pass2 = document.getElementById("us_password_conf").value;
    if (pass1 != pass2) {
      alert("Passwords ไม่ตรงกัน");  
      return false;
    }
}

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>



