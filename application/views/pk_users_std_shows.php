

<div class="container-fluid"><br>

  <h2 style="float:left;font-size:16px">พบ <strong><?=$num;?> </strong>คน  </h2><p>
  <a href="<?=base_url()."ctrl_admin/open_frm_add/pk_users_std_d_id";?>" style="float:right;font-size:16px" class="btn btn-success"><i class="fas fa-plus"></i></a>
  <center>        
  <table class="table table-hover" style="width:80%">
    <thead>
      <tr>
        <th width="1%">ลำดับ</th>
        <th>แผนก</th>
        <th>รหัสนักศึกษา</th>  
        <th>ชื่อนักศึกษา</th>  
        <th>นามสกุลนักศึกษา</th>     
        <th colspan="2"><center>จัดการ</center></th>
      </tr>
    </thead>
    <tbody>
    <?php $i=0; foreach($row as $sh){$i++; ?>
    
      <tr>
        <td><?=$i;?></td>
        <td><?=$sh['d_name'];?></td>
        <td><?=$sh['us_std_id'];?></td>
        <td><?=$sh['us_name'];?></td>
        <td><?=$sh['us_lname'];?></td>

        <td><center><?=anchor ('ctrl_admin/select_where/pk_dep/d_id/'.$sh['us_id'],"<button class='btn btn-info'><i class='fas fa-book'></i></button>");?></td>
        <td><center><?=anchor ('ctrl_admin/del_std/pk_users_std/us_id/'.$sh['us_id'],"<button class='btn btn-danger'><i class='far fa-trash-alt'></i></button>",array("onclick"=>"return confirm('ยืนยันการลบ?');"));?></td>

        <!--
        <td><?php if($sh['ad_status']=="mn"){$ad_status="ดูอย่างเดียว";}
                  elseif($sh['ad_status']=="md"){$ad_status="ดูและแก้ไข";}
                  elseif($sh['ad_status']=="mx"){$ad_status="ทั้งหมด";}
                  echo $ad_status;?></td>-->
      </tr>
    
    <?php } ?>
    </tbody>
  </table>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>



