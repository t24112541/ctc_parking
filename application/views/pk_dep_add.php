

<div class="container-fluid"><br>
   <?php if(isset($error)) { echo $error; }; ?>
  <?=form_open("ctrl_admin/add_dep_process",array("class"=>"form-horizontal")); ?>
      <div class="form-group">
        <label class="control-label col-sm-2" for="d_code">รหัสแผนก:<?php echo form_error('d_code'); ?></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="d_code" placeholder="กรอกรหัสแผนกที่นี่" name="d_code" value="<?php echo set_value('d_code'); ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="d_name">ชื่อแผนก:<?php echo form_error('d_name'); ?></label>
        <div class="col-sm-8">          
          <input type="text" class="form-control" id="d_name" placeholder="กรอกชื่อแผนกที่นี่" name="d_name" value="<?php echo set_value('d_name'); ?>">
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



