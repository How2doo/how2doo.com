<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ชื่อบทความ</th>
      <th class="hidden-xs">การเปิดชม</th>
      <th class="hidden-xs">ผู้สร้างหน้า</th>
      <th class="hidden-xs">วันที่สร้าง</th>
      <th class="hidden-xs">สถานะ</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php
  while ($redata = $query->fetch_object()) {
	if($redata->status==1){
		$statusname = "<buttom class='btn btn-xs btn-success fa fa-check'> เปิดแสดงโพส</buttom>";
	}else{
		$statusname = "<buttom class='btn btn-xs btn-danger fa fa-check'> ปิดแสดงโพส</buttom>";
	}
	
	$createname = selectdata('user','fullname','user_id',$redata->user_id);
  ?>
    <tr>
      <td><?=$redata->postname;?></td>
      <td class="hidden-xs"><?=$redata->rating;?></td>
      <td class="hidden-xs"><?=$createname;?></td>
      <td class="hidden-xs"><?=$redata->dateadd;?></td>
      <td class="hidden-xs"><?=$statusname;?></td>
      <td>
        <div align="right">
          <a href="<?=$url2.'/'.$get_part0.'/edit/'.$redata->postid;?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
          <a onclick="deldata('<?=$redata->postid;?>','<?=$redata->postname;?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
        </div>
      </td>
    </tr>
  <?php }?>                
  </tbody>

</table>