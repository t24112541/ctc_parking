<?php $conn=mysqli_connect("localhost","root","","ctc_parking");$conn->set_charset("utf8"); if(isset($error)) { echo $error; }; ?>
<head>

</head>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 box_shadows box_content">

      <?=form_open("ctrl_admin/add_machine",array("class"=>"form-horizontal")); ?><p>
        <h4 align="center">ข้อมูลรถนักเรียน / นักศึกษา</h4></p>
         <div class="form-group">
<p id="sh_rs"></p>
          <div class="form-group">
            <?php echo form_error('us_id'); ?>
            <div class="col-sm-12">          
              <input type="text" class="form-control" id="us_id" placeholder="กรอกรหัสนักเรียน / นักศึกษา" name="us_id" value="<?php echo set_value('us_id'); ?>">
            </div>
          </div>
          <div class="form-group">
            <?php echo form_error('mc_code'); ?>
            <div class="col-sm-12">          
              <input type="text" class="form-control" id="mc_code" placeholder="กรอกทะเบียนรถ เช่น  กกก 111 ชัยภูมิ" name="mc_code" value="<?php echo set_value('mc_code'); ?>">
            </div>
          </div>

          <div class="form-group">
            <?php echo form_error('mc_brand'); ?><?php echo form_error('mc_series'); ?>
             <div class="col-sm-12">
            
              <input type="text" class="cv_frm_control cv_frm_control-width-mn" id="mc_brand" placeholder="กรอกยี่ห้อรถ เชน่ honda, yamaha, suzuki" name="mc_brand" value="<?php echo set_value('mc_brand'); ?>">
            
               <input type="text" class="cv_frm_control cv_frm_control-width-mn" id="mc_series" placeholder="กรอกรุ่นรถ เช่น wave 110, click 125" name="mc_series" value="<?php echo set_value('mc_series'); ?>">
             </div>
          </div>
<center>

          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success" name="btn_add">บันทึก</button>
            </div>
          </div>
      <?=form_close();?>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>






