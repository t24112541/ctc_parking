
<div class="container-fluid"><br>

 <center style="font-size:20px">ข้อมูลกลุ่มการเรียน</center></p>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#general">ข้อมูลทั่วไป</a>
    </li>
</ul>

  <div class="tab-content">
    <div id="general" class="container tab-pane active"><br>
      <h3>ข้อมูลทั่วไป</h3>
      <?php if(isset($error)) { echo $error; };?>
       <?=form_open("ctrl_admin/edit_class_process",array("class"=>"form-horizontal")); ?>
      <?php foreach ($row as $sh) {?>
        <div class="form-group">
          <input type="hidden" name="call_back_id" value="<?=$call_back_id;?>"> <input type="hidden" name="c_id" value="<?=$sh['c_id'];?>">
          <div class="col-sm-12">
            <label class="control-label col-sm-4" for="d_name">แผนกวิชา: <?=$sh['d_name'];?></label>
          </div>

            <div class="col-sm-12">
              <label class="control-label col-sm-4" for="c_code">รหัสกลุ่มการเรียน: <?=$sh['c_code'];?></label>
            </div>
            <div class="col-sm-5">
              <label class="control-label col-sm-4" for="c_name">ชื่อกลุ่มการเรียน:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="c_name" name="c_name" value="<?=$sh['c_name'];?>">
            </div>

        </div>

        <div class="form-group" style="text-align: center"> 
          <div class="col-sm-offset-2 col-sm-6">
            <button style="margin-right:10%" type="submit" class="btn btn-success"><i class="far fa-save fa-2x"></i></button>
            <?=anchor ('ctrl_admin/join_pk_class_pk_dep/pk_class/d_id/'.$sh['d_id'],"<button class='btn btn-default' type='button'><i class='far fa-times-circle fa-2x'></i></button>");?>
          </div>
          <div class="col-sm-offset-2 col-sm-6">
            
          </div>
        </div>

      <?php } ?>
      <?=form_close();?>
    </div>
  </div>


  
</div>







  