<?php $conn=mysqli_connect("localhost","root","","ctc_parking");$conn->set_charset("utf8"); if(isset($error)) { echo $error; }; ?>
<head>
<!--
    <script type="text/javascript">        
        $(document).ready(function () {
            $('#d_id').change(function () {
                var selState = this.value; //value from dropdown tahun ajar
                console.log('get',selState);
                $.ajax({   
                    url: "<?php echo base_url(); ?>ctrl_admin/onchange/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: "state="+selState, //The variables which are going.
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data) 
                    {
                        //data is the html of the page where the request is made.
                        $('#result').html(data);
                    }
                })
            });
        });
    </script>
-->
</head>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 box_shadows box_content">
      <?php  if(isset($error)) { echo $error; }; ?>
      <?=form_open("ctrl_admin/add_users_std_process",array("class"=>"form-horizontal")); ?><p>
        <h4 align="center">ข้อมูลนักเรียน / นักศึกษา</h4></p>
         <div class="form-group">

<!-- *******************  -->
            <?php echo form_error('c_id'); ?>
            <div class="col-sm-12">
               <select class="form-control" name="c_id" id="c_id">
                <option value="">---------- เลือกกลุ่มการเรียน ----------</option>
                <?php foreach ($row as $sh) {?>
                <option value="<?=$sh['c_id']?>" <?php echo set_select('c_id',$sh['c_id'], ( !empty($data) && $data == $sh['c_id'] ? TRUE : FALSE )); ?>><?=$sh['c_name']?></option>
                <?php }?>
              </select>
            </div>
          </div>
<!-- *******************  -->
          <div class="form-group">
            <?php echo form_error('us_std_id'); ?>
            <div class="col-sm-12">          
              <input type="text" class="form-control" id="us_std_id" placeholder="กรอกรหัสประจำตัวนักเรียน / นักศึกษา" name="us_std_id" value="<?php echo set_value('us_std_id'); ?>">
            </div>
          </div>

          <div class="form-group">
            <?php echo form_error('us_name'); ?><?php echo form_error('us_lname'); ?>
             <div class="col-sm-12">
            
              <input type="text" class="cv_frm_control cv_frm_control-width-mn" id="us_name" placeholder="กรอกชื่อนักเรียน / นักศึกกษา" name="us_name" value="<?php echo set_value('us_name'); ?>">
            
               <input type="text" class="cv_frm_control cv_frm_control-width-mn" id="us_lname" placeholder="กรอก นามสกุล นักเรียน / นักศึกกษา" name="us_lname" value="<?php echo set_value('us_lname'); ?>">
             </div>
          </div>

          <div class="form-group">
            <?php echo form_error('us_username'); ?>
            <div class="col-sm-12">          
              <input type="text" class="form-control" id="us_username" placeholder="สร้าง username" name="us_username" value="<?php echo set_value('us_username'); ?>">
            </div>
          </div>

          <div class="form-group">
            <?php echo form_error('us_password'); ?>
            <div class="col-sm-12">          
              <input type="password" class="form-control" id="us_password" placeholder="สร้าง password" name="us_password" id="us_password" value="<?php echo set_value('us_password'); ?>">
            </div>
          </div>

          <div class="form-group">
            <?php echo form_error('us_password_conf'); ?>
            <div class="col-sm-12">          
              <input type="password" class="form-control" id="us_password_conf" placeholder="ยืนยัน password" name="us_password_conf" id="us_password_conf" onkeyup="myFunction()" value="<?php echo set_value('us_password_conf'); ?>">

            </div>
          </div>

          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-12">
              <center><button type="submit" class="btn btn-success" name="btn_add">บันทึก</button>
            </div>
          </div>
      <?=form_close();?>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>



