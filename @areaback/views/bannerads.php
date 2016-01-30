<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th width="20" class="hidden-xs"><i class="fa fa-image"></i></th>
      <th>ชื่อ</th>
      <th class="hidden-xs">ตำแหน่ง</th>
      <th class="hidden-xs" width="20%">การแสดง</th>
      <th width="15%"></th>
    </tr>
  </thead>
  <tbody>
  <?php
  while ($redata = $query->fetch_object()) {
    	
    	
    	if($redata->baimg!=''){
      		$img = "$urlweb/images/banner/ads/tmp/$redata->baimg";  
	    }else{
	      	$img = "$urlweb/images/banner/ads/tmp/nopic.jpg";
	    }
    
    if($redata->status==1){
		$status = "<a class='btn btn-xs btn-success'><i class='fa fa-check-circle'></i></a>";
	}else{
		$status = "<a class='btn btn-xs btn-danger'><i class='fa fa-check-circle'></i></a>";
	}
	
  ?>
    <tr>
      <td class="hidden-xs"><img src="<?=$img;?>"  height="25" class="img"></td>
      <td align="left"><?=$redata->baname;?></td>
      <td class="hidden-xs" align="center"><?=$arrposision[$redata->baposition];?></td>
      <td class="hidden-xs"><?=$redata->datestart.' ถึง '.$redata->dateend;?></td>
      <td>
        <div align="right">
         <?=$status;?>
          <a href="<?=$url2.'/'.$get_part0.'/'.$get_part1.'/edit/'.$redata->baid;?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
          <a onclick="deldata('<?=$redata->baid;?>','<?=$redata->baname;?>','<?=$redata->baimg;?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
        </div>
      </td>
    </tr>
  <?php }?>                
  </tbody>

</table>