

<div class="container-fluid"><br>

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
      <h3>ข้อมูลทั่วไป</h3>
       <?=form_open("ctrl_admin/edit_admin/",array("class"=>"form-horizontal")); ?>
          <?php if(isset($error)){echo $error;} ?>
          <?php $i=0; foreach($row as $sh){$i++; ?>          
            <div class="form-group">
              <label class="control-label col-sm-2" for="ad_name">ชื่อ:</label>
              <div class="col-sm-10">
                <input type="hidden" name="ad_id" value="<?=$sh['ad_id'];?>">
                <input type="text" class="form-control" id="ad_name" name="ad_name" value="<?=$sh['ad_name'];?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="ad_lname">นามสกุล:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="ad_lname" name="ad_lname" value="<?=$sh['ad_lname'];?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="ad_username">username:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="ad_username" name="ad_username" value="<?=$sh['ad_username'];?>">
              </div>
            </div>
           
            <div class="form-group">
              <label class="control-label col-sm-2" for="ad_status">สิทธิการเข้าถึง:</label>
              <div class="col-sm-10">
                <select class="form-control" id="ad_status" name="ad_status">
                  <option value="<?=$sh['ad_status'];?>"><?php if($sh['ad_status']=="mn"){$ad_status="ดูอย่างเดียว";}
                            elseif($sh['ad_status']=="md"){$ad_status="ดูและแก้ไข";}
                            elseif($sh['ad_status']=="mx"){$ad_status="ทั้งหมด";}
                            echo $ad_status;?></option>
                    <option value="" <?php echo set_select('ad_status','', ( !empty($data) && $data == "" ? TRUE : FALSE )); ?>">---------- เลือกสิทธิการเข้าถึง ----------</option>
                      <option value="mn" <?php echo set_select('ad_status','mn', ( !empty($data) && $data == "mn" ? TRUE : FALSE )); ?>>ดูอย่างเดียว</option>
                      <option value="md" <?php echo set_select('ad_status','md', ( !empty($data) && $data == "md" ? TRUE : FALSE )); ?>>ดูและแก้ไข</option>
                      <option value="mx" <?php echo set_select('ad_status','mx', ( !empty($data) && $data == "mx" ? TRUE : FALSE )); ?>>ทั้งหมด</option>
                  </select>
              </div>
            </div>

            <div class="form-group"> 
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">บันทึก</button>
              </div>
            </div>
            <?php } ?>
          <?=form_close();?>
    </div>
    <div id="security" class="container tab-pane fade"><br>
      <h3>ความปลอดภัย</h3>
       <?=form_open("ctrl_admin/edit_admin_pass/",array("class"=>"form-horizontal")); ?>
          <?php if(isset($error)){echo $error;} ?>
          <?php $i=0; foreach($row as $sh){$i++; ?>   
           <input type="hidden" name="ad_id" value="<?=$sh['ad_id'];?>">       
            <div class="form-group">
              <label class="control-label col-sm-2" for="ad_password">password:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="ad_password" name="ad_password" value="">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="con_password">confirm password:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="con_password" name="con_password" value="">
              </div>
            </div>
           
            <div class="form-group"> 
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">บันทึก</button>
              </div>
            </div>
            <?php } ?>
          <?=form_close();?>
    </div>

  </div>
 </div>






  