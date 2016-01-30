<?php

$query = $dbCon->query("select * from user  order by user_id ASC");

?>

<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>รูปภาพ</th>
      <th>ชื่อ</th>
      <th class="hidden-xs">Username</th>
      <th class="hidden-xs">ระดับสิทธิ์</th>
      <th class="hidden-xs">วันที่สร้าง</th>
      <th class="hidden-xs">เข้าใช้งานล่าสุด</th>
      <th>สถานะ</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php
  while ($redata = $query->fetch_object()) {
    if($redata->img!=''){
      $img = $redata->img;  
    }else{
      $img = "nopic.png";
    }

    if($redata->levelid==1){
      $policyname = "ผู้ดูแลระบบ";
    }else{
      $policyname = "ผู้ใช้งานทั่วไป";
    }
    
    if($redata->status==1){
		$status = "<font color='green'><i class='fa fa-check-circle'></i></font>";
	}else{
		$status = "<i class='fa fa-check-circle'></i>";
	}
  ?>
    <tr>
      <td><img src="<?=$urlimg;?>/images/user/tmp/<?=$img;?>" width="30" height="30" class="img-circle"></td>
      <td align="left"><?=$redata->fullname;?></td>
      <td class="hidden-xs"><?=$redata->username;?></td>
      <td class="hidden-xs"><?=$policyname;?></td>
      <td class="hidden-xs"><?=$redata->dateadd;?></td>
      <td class="hidden-xs"><?=$redata->user_last_login;?></td>
      <td><?=$status;?></td>
      <td>
        <div align="right">
          <a href="<?=$url2.'/'.$get_part0.'/'.$get_part1.'/edit/'.$redata->user_id;?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
          <a onclick="deldata('<?=$redata->user_id;?>','<?=$redata->fullname;?>','<?=$img;?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
        </div>
      </td>
    </tr>
  <?php }?>                
  </tbody>

</table>