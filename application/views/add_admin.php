

<div class="container-fluid"><br>
   <?php if(isset($error)) { echo $error; }; ?>
  <?=form_open("ctrl_admin/add_admin_process",array("class"=>"form-horizontal")); ?>
      <div class="form-group">
        <label class="control-label col-sm-2" for="ad_name">ชื่อ:<?php echo form_error('ad_name'); ?></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="ad_name" placeholder="กรอกชื่อที่นี่" name="ad_name" value="<?php echo set_value('ad_name'); ?>">
         
        </div>
        
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="ad_lname">นามสกุล:<?php echo form_error('ad_lname'); ?></label>
        <div class="col-sm-8">          
          <input type="text" class="form-control" id="ad_lname" placeholder="กรอกนามสกุลที่นี่" name="ad_lname" value="<?php echo set_value('ad_lname'); ?>">
         
        </div>
        
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="ad_username">username:<?php echo form_error('ad_username'); ?></label>
        <div class="col-sm-8">          
          <input type="text" class="form-control" id="ad_username" placeholder="สร้าง username ที่นี่" name="ad_username" value="<?php echo set_value('ad_username'); ?>">
         
        </div>
        
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="ad_password">password:<?php echo form_error('ad_password'); ?></label>
        <div class="col-sm-8">          
          <input type="password" class="form-control" id="ad_password" placeholder="สร้าง password ที่นี่" name="ad_password" value="<?php echo set_value('ad_password'); ?>">

        </div>
        
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="ad_status">สิทธิการเข้าถึง:<?php echo form_error('ad_status'); ?></label>
        <div class="col-sm-8">     
          <select class="form-control" name="ad_status">
            <option value="" <?php echo set_select('ad_status','', ( !empty($data) && $data == "" ? TRUE : FALSE )); ?>">---------- เลือกสิทธิการเข้าถึง ----------</option>
            <option value="mn" <?php echo set_select('ad_status','mn', ( !empty($data) && $data == "mn" ? TRUE : FALSE )); ?>>ดูอย่างเดียว</option>
            <option value="md" <?php echo set_select('ad_status','md', ( !empty($data) && $data == "md" ? TRUE : FALSE )); ?>>ดูและแก้ไข</option>
            <option value="mx" <?php echo set_select('ad_status','mx', ( !empty($data) && $data == "mx" ? TRUE : FALSE )); ?>>ทั้งหมด</option>
          </select>
         
        </div>
        
      </div>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success" name="btn_add">บันทึก</button>
        </div>
      </div>
  <?=form_close();?>
</div>


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>



