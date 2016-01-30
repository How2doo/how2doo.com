<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>ชื่อวีดีโอ</th>
      <th class="hidden-xs">เปิดดู</th>
      <th class="hidden-xs">ผู้เพิ่มวีดีโอ</th>
      <th class="hidden-xs">วันที่สร้าง</th>
      <th class="hidden-xs">สถานะ</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php
  while ($redata = $query->fetch_object()) {
	if($redata->status==1){
		$statusname = "<buttom class='btn btn-xs btn-success fa fa-check'> เปิดแสดง</buttom>";
	}else{
		$statusname = "<buttom class='btn btn-xs btn-danger fa fa-check'> ปิดแสดง</buttom>";
	}

	if(SUBSTR($redata->user_id,0,1) == "M"){
		$createname = selectdata('member_register','ufullname','uid',$redata->user_id);
	}else{
		$createname = selectdata('user','fullname','user_id',$redata->user_id);
		
	}
	
  ?>
    <tr>
      <td align="left">
      	<div><?=$redata->videotitle;?></div>
      </td>
      <td class="hidden-xs"><?=$redata->rating;?></td>
      <td class="hidden-xs"><?=$createname;?></td>
      <td class="hidden-xs"><?=$redata->dateadd;?></td>
      <td class="hidden-xs"><?=$statusname;?></td>
      <td width="70">
        <div align="right">
          <a href="<?=$url2.'/'.$get_part0.'/edit/'.$redata->videoid;?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
          <a onclick="deldata('<?=$redata->videoid;?>','<?=$redata->videotitle;?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
        </div>
      </td>
    </tr>
  <?php }?>                
  </tbody>

</table>