
<div class="container-fluid"><br>
 <center style="font-size:20px">กลุ่มการเรียนที่เกี่ยวข้อง</p>
<?php //var_dump($head);
  echo $head[0]->d_name;
?>
  </center>

       <h2 style="float:left;font-size:16px">พบ <strong><?=$num;?> </strong>กลุ่ม  </h2><p>
      <a href="<?=base_url()."ctrl_admin/open_frm_add/pk_class";?>" style="float:right;font-size:16px" class="btn btn-success"><i class="fas fa-plus"></i></a>
      <center>        
      <table class="table table-hover" style="width:80%">
        <thead>
          <tr>
            <th width="1%">ลำดับ</th>
            <th>รหัสกลุ่ม</th>
            <th>กลุ่ม</th>    
            <th>แผนก</th>      
            <th colspan="2"><center>จัดการ</center></th>
          </tr>
        </thead>


        <tbody>
        <?php if($num!=0){ $i=0; foreach($row as $sh){$i++; ?>
        
          <tr>
            <td><?=$i;?></td>
            <td><?=$sh['c_code'];?></td>
            <td><?=$sh['c_name'];?></td>
            <td><?=$sh['d_name'];?></td>
            <td><center><?=anchor ('ctrl_admin/join_pk_class_pk_dep_id_cid/pk_class/c_id/'.$sh['c_id']."/".$sh['d_id'],"<button class='btn btn-info'><i class='fas fa-book'></i></button>");?></td>
            <td><center><?=anchor ('ctrl_admin/del_class/pk_class/c_id/'.$sh['c_id']."/".$sh['d_id'],"<button class='btn btn-danger'><i class='fas fa-user-times'></i></button>",array("onclick"=>"return confirm('ยืนยันการลบ?');"));?></td>
          </tr>
        
        <?php }}else{echo "ไม่พบข้อมูล";}  ?>
        </tbody>
      </table>  
</div>







  