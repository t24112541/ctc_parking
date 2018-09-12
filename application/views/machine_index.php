

<div class="container-fluid"><br>

  <h2 style="float:left;font-size:16px">พบ <strong><?=$num;?> </strong>คัน  </h2><p>
  <a href="<?=base_url()."ctrl_admin/open_frm_add/pk_machine";?>" style="float:right;font-size:16px" class="btn btn-success"><i class="fas fa-plus"></i></a>
  <center>        
  <table class="table table-hover" style="width:80%">
    <thead>
      <tr>
        <th></th>
        <th width="1%">ลำดับ</th>
        <th>ทะเบียนรถ</th>
        <th>ยี่ห้อ</th>  
        <th>รุ่น</th>  

      </tr>
    </thead>
    <tbody>
    <?php if($num==0){echo "<center>ไม่พบข้อมูล</center>";}else{ $i=0; foreach($row as $sh){$i++; ?>
    
      <tr>
        <td>
          <?=anchor ('ctrl_admin/sh_edit_machine/'.$sh['mc_id'],"<button class='btn btn-info'><i class='fas fa-book'></i></button>");?></td>
        <td><?=$i;?></td>
        <td><?=$sh['mc_code'];?></td>
        <td><?=$sh['mc_brand'];?></td>
        <td><?=$sh['mc_series'];?></td>

      </tr>
    
    <?php } }?>
    </tbody>
  </table>
</div>




