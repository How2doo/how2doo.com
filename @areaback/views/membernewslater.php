<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>รหัส</th>
      <th>ชื่อ</th>
      <th class="hidden-xs">อีเมล์</th>
      <th class="hidden-xs">วันที่สร้าง</th>
      <th>สถานะ</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php
  while ($redata = $query->fetch_object()) {
    
    if($redata->status==1){
		$status = "<font color='green'><i class='fa fa-check-circle'></i></font>";
	}else{
		$status = "<i class='fa fa-check-circle'></i>";
	}
  ?>
    <tr>
      <td align="center"><?=$redata->member_id;?></td>
      <td align="left"><?=$redata->member_name;?></td>
      <td class="hidden-xs"><?=$redata->member_email;?></td>
      <td class="hidden-xs"><?=$redata->member_add;?></td>
      <td><?=$status;?></td>
      <td>
        <div align="right">
          <a href="<?=$url2.'/'.$get_part0.'/'.$get_part1.'/edit/'.$redata->member_id;?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
          <a onclick="deldata('<?=$redata->member_id;?>','<?=$redata->member_name;?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
        </div>
      </td>
    </tr>
  <?php }?>                
  </tbody>

</table>