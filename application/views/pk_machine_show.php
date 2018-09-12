<?php $conn=mysqli_connect("localhost","root","","ctc_parking");$conn->set_charset("utf8"); if(isset($error)) { echo $error; }; foreach ($row as $sh) {
$mc_id=$sh['mc_id'];
?>

<div class="container-fluid">
   <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#general">ข้อมูลรถ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#user">ข้อมูลเจ้าของรถ</a>
    </li>
    
  </ul>
  <div class="tab-content">
    <div id="general" class="container tab-pane active"><br>
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 box_shadows box_content">
          <?php  if(isset($error)) { echo $error; };$tab="general"; ?>
          <?=form_open("ctrl_admin/edit_pk_machine/$mc_id/$tab",array("class"=>"form-horizontal")); ?><p>

            <h4 align="center">ข้อรถมูลนักเรียน / นักศึกษา</h4></p>
             <div class="form-group">


              <div class="form-group">
                <?php echo form_error('mc_code'); ?>
                <div class="col-sm-11">  
                <label>ทะเบียนรถ</label>        
                  <input type="text" class="form-control" id="mc_code"  name="mc_code" value="<?php echo $sh['mc_code']; set_value('mc_code'); ?>">
                </div>
              </div>
              <div class="form-group">
                <?php echo form_error('mc_brand'); ?>
                <div class="col-sm-11">  
                <label>ยี่ห้อ</label>        
                  <input type="text" class="form-control" id="mc_brand"  name="mc_brand" value="<?php echo $sh['mc_brand']; set_value('mc_brand'); ?>">
                </div>
              </div>
              <div class="form-group">
                <?php echo form_error('mc_series'); ?>
                <div class="col-sm-11">  
                <label>รุ่น</label>        
                  <input type="text" class="form-control" id="mc_series"  name="mc_series" value="<?php echo $sh['mc_series']; set_value('mc_series'); ?>">
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



      </div>
      <div id="user" class="container tab-pane">
        <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 box_shadows box_content">
          <?php  if(isset($error)) { echo $error; };$tab="user"; ?>
          <?=form_open("ctrl_admin/edit_pk_machine/$mc_id/$tab",array("class"=>"form-horizontal")); ?><p>
              <div class="form-group">
                 <div class="col-sm-12">
                    <label>แผนก : <?php echo $sh['d_name']; ?></label>
                    <label>กลุ่ม : <?php echo $sh['c_name']; ?></label>
                  
                 </div>
              </div>
              <div class="form-group">
                 <div class="col-sm-12">
                    <label>ชื่อ : <?php echo $sh['us_name']; ?>
                    <?php echo $sh['us_lname']; ?></label>
                  
                 </div>
              </div>
             
              <div class="form-group">
                <?php echo form_error('us_std_id'); ?>
                <div class="col-sm-11">  
                <label>รหัสนักเรียน / นักศึกษา</label>        
                  <input type="text" class="form-control" id="us_std_id"  name="us_std_id" value="<?php echo $sh['us_std_id']; set_value('us_std_id'); ?>">
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


      </div>
    </div>
  </div>
</div>
<?php } ?>





