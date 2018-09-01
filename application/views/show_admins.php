

<div class="container-fluid"><br>

  <h2>ADMIN <strong><?=$num;?> </strong>คน  </h2><p>
          
  <table class="table table-hover">
    <thead>
      <tr>
        <th width="1%">ลำดับ</th>
        <th>ชื่อ</th>
        <th>นามสกุล</th>
        <th>username</th>
      
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php $i=0; foreach($row as $sh){$i++; ?>
    
      <tr>
        <td><?=$i;?></td>
        <td><?=$sh['ad_name'];?></td>
        <td><?=$sh['ad_lname'];?></td>
        <td><?=$sh['ad_username'];?></td>
        <td><?=anchor ('ctrl_admin/sh_admin/'.$sh['ad_id'],"<button class='btn btn-info'><i class='fas fa-book'></i></button>");?></td>
        <td><?=anchor ('ctrl_admin/del_admin/'.$sh['ad_id'],"<button class='btn btn-danger'><i class='fas fa-user-times'></i></button>",array("onclick"=>"return confirm('ยืนยันการลบ?');"));?></td>

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

</body>
</html>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>



