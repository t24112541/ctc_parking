

<div class="container-fluid"><br>
   <?php $conn=mysqli_connect("localhost","root","","ctc_parking");$conn->set_charset("utf8"); if(isset($error)) { echo $error; }; ?>
  <?=form_open("ctrl_admin/add_class_process",array("class"=>"form-horizontal")); ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="d_code">แผนก:<?php echo form_error('d_code'); ?></label>
        <div class="col-sm-8">
           <select class="form-control" name="d_id">
            <option value="">---------- เลือกแผนก ----------</option>
            <?php $que=mysqli_query($conn,"select * from pk_dep");while($sh=mysqli_fetch_Array($que)){ ?>
            <option value="<?=$sh['d_id']?>" <?php echo set_select('d_id',$sh['d_id'], ( !empty($data) && $data == $sh['d_id'] ? TRUE : FALSE )); ?>><?=$sh['d_name']?></option>
            <?php }?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="c_code">รหัสกลุ่มการเรียน:<?php echo form_error('c_code'); ?></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="c_code" placeholder="กรอกรหัสกลุ่มการเรียนที่นี่" name="c_code" value="<?php echo set_value('c_code'); ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="c_name">ชื่อกลุ่มการเรียน:<?php echo form_error('c_name'); ?></label>
        <div class="col-sm-8">          
          <input type="text" class="form-control" id="c_name" placeholder="กรอกชื่อกลุ่มการเรียนที่นี่" name="c_name" value="<?php echo set_value('c_name'); ?>">
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



