<?php
if($get_part2=="edit" and $get_part3!=''){
	$qdata = $dbCon->query("select * from type_news where type_id = '$get_part3' ") or die($dbCon->error);
	$redata = $qdata->fetch_object();
	
}
?>
<form role="form" name="frm" method="post"  onsubmit="return chkdata();" action="<?=$url2;?>/@cmd/action_typenews.php?select=edit"  enctype="multipart/form-data">
	<input type="hidden" value="<?=$redata->type_id;?>" name="id">
	<div class="box-body">
		<div class="form-group">
			<label for="exampleInputEmail1">ชื่อหมวดหมู่ (TH)</label>
			<input type="text" class="form-control" name="txtnameth" value="<?=$redata->type_name_th;?>" id="exampleInputEmail1" placeholder="ชื่อหมวดหมู่ ไทย...">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">ชื่อหมวดหมู่ (EN)</label>
			<input type="text" class="form-control" name="txtnameen" value="<?=$redata->type_name_en;?>" id="exampleInputEmail1" placeholder="catagory name...">
		</div>

	</div><!-- /.box-body -->

	<div class="box-footer">
		<input type="submit" class="btn btn-primary" value=" บันทึก ">
	</div>
</form>