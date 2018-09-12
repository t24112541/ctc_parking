

<div class="container-fluid"><br>

  <h2 style="float:left;font-size:16px">พบ <strong><?=$num;?> </strong>คัน  </h2><p>
  <a href="<?=base_url()."ctrl_admin/open_frm_add/pk_machine";?>" style="float:right;font-size:16px" class="btn btn-success"><i class="fas fa-plus"></i></a>
  <center>        
  <table class="table table-hover" style="width:80%">
    <thead>
      <tr>
        <th width="1%">ลำดับ</th>
        <th>ทะเบียนรถ</th>
        <th>ยี่ห้อ</th>  
        <th>รุ่น</th>  
        <th colspan="2"><center>จัดการ</center></th>
      </tr>
    </thead>
    <tbody>
    <?php if($num==0){echo "<center>ไม่พบข้อมูล</center>";}else{ $i=0; foreach($row as $sh){$i++; ?>
    
      <tr>
        <td><?=$i;?></td>
        <td><?=$sh['mc_code'];?></td>
        <td><?=$sh['mc_brand'];?></td>
        <td><?=$sh['mc_series'];?></td>
      

        <td><center><?=anchor ('ctrl_admin/sh_edit_machine/'.$sh['mc_id'],"<button class='btn btn-info'><i class='fas fa-book'></i></button>");?></td>
        <td><center><?=anchor ('ctrl_admin/del_data/pk_machine/mc_id/'.$sh['mc_id'],"<button class='btn btn-danger'><i class='far fa-trash-alt'></i></button>",array("onclick"=>"return confirm('ยืนยันการลบ?');"));?></td>

        <!--
        <td><?php if($sh['ad_status']=="mn"){$ad_status="ดูอย่างเดียว";}
                  elseif($sh['ad_status']=="md"){$ad_status="ดูและแก้ไข";}
                  elseif($sh['ad_status']=="mx"){$ad_status="ทั้งหมด";}
                  echo $ad_status;?></td>-->
      </tr>
    
    <?php } }?>
    </tbody>
  </table>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>



