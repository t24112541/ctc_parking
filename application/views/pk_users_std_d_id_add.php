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
      <?=form_open("ctrl_admin/add_class_process",array("class"=>"form-horizontal")); ?><p>
        <h4 align="center">ข้อมูลนักเรียน / นักศึกษา</h4></p>
         <div class="form-group">
            <?php echo form_error('d_code'); ?>
            <div class="col-sm-12">
               <select class="form-control" name="d_id" id="d_id">
                <option value="">---------- เลือกแผนก ----------</option>
                <?php $que=mysqli_query($conn,"select * from pk_dep");while($sh=mysqli_fetch_Array($que)){ ?>
                <option value="<?=$sh['d_id']?>" <?php echo set_select('d_id',$sh['d_id'], ( !empty($data) && $data == $sh['d_id'] ? TRUE : FALSE )); ?>><?=$sh['d_name']?></option>
                <?php }?>
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
    <div class="col-sm-2"></div>
  </div>
</div>


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>



