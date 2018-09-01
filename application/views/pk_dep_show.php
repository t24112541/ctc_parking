
<div class="container-fluid"><br>
 <center style="font-size:20px">ข้อมูลแผนกวิชา</center></p>
<ul class="nav nav-tabs" role="tablist">

    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#general">ข้อมูลทั่วไป</a>
    </li>
</ul>

  <div class="tab-content">
    <div id="general" class="container tab-pane active"><br>
      <h3>ข้อมูลทั่วไป</h3>
       <?=form_open("ctrl_admin/edit_dep",array("class"=>"form-horizontal")); ?>
      <?php foreach ($row as $sh) {?>
        <div class="form-group">
          <input type="hidden" name="d_id" value="<?=$sh['d_id'];?>">
          <label class="control-label col-sm-2" for="d_code">รหัสแผนก:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="d_code" name="d_code" value="<?=$sh['d_code'];?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="d_name">ชื่อแผนก:</label>
          <div class="col-sm-10"> 
            <input type="text" class="form-control" id="d_name" name="d_name" value="<?=$sh['d_name'];?>">
          </div>
        </div>
        <div class="form-group" style="text-align: center">
          <div class="col-sm-offset-2 col-sm-10">
            <button style="margin-right:10%" type="submit" class="btn btn-success"><i class="far fa-save fa-2x"></i></button>
            <?=anchor ('ctrl_admin/join_pk_class_pk_dep/pk_class/d_id/'.$sh['d_id'],"<button type='button' class='btn btn-default '>กลุ่มการเรียน</button>",array("style"=>"margin-right:10%"));?>
            <?=anchor ('ctrl_admin/select_all/pk_dep/d_id/'.$sh['d_id'],"<button class='btn btn-default' type='button'><i class='far fa-times-circle fa-2x'></i></button>");?>
          </div>
          <div class="col-sm-offset-2 col-sm-6">
             
          </div>
        </div>

      <?php } ?>
      <?=form_close();?>
    </div>
  </div>


  
</div>







  