<?php
if($get_part2=="edit" and $get_part3!=''){
	$qdata = $dbCon->query("select * from user where user_id = '$get_part3' ") or die($dbCon->error);
	$redata = $qdata->fetch_object();
	
	if($redata->img!=''){
      $img = $redata->img;  
    }else{
      $img = "nopic.png";
    }
    
    if($redata->status==1){
		$checked = 'checked';
	}else{
		$checked = '';
	}
}
?>
<form role="form" name="frm" method="post"  onsubmit="return chkdata();" action="<?=$url2;?>/@cmd/action_user.php?select=edit"  enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?=$redata->user_id;?>"/>
	<div class="box-body">
		<div class="form-group">
			<label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
			<input type="text" class="form-control" name="txtname" value="<?=$redata->fullname;?>" id="exampleInputEmail1" placeholder="Fullname...">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
			<input type="text" class="form-control" name="txtusername" value="<?=$redata->username;?>" id="exampleInputEmail1" placeholder="Username...">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">รหัสผ่าน</label>
			<input type="text" class="form-control" name="txtuserpass" id="exampleInputEmail1" placeholder="Password...">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">ระดับการใช้งาน</label>
			<select class="form-control" name="txtlevel" size="2">
				<?php
				if($redata->levelid=='1'){echo "<option value='1' selected>ผู้ดูแลระบบ</option>";}else{echo "<option value='1'>ผู้ดูแลระบบ</option>";}
				if($redata->levelid=='2'){echo "<option value='2' selected>ผู้ใช้งานทั่วไป</option>";}else{echo "<option value='2'>ผู้ใช้งานทั่วไป</option>";}
				
				?>
			</select>
		</div>
		
		<div class="form-group">
			<label for="exampleInputFile">รูปภาพ</label><br />
			<?php
			if($redata->img!=''){
				echo "<img src='$urlimg/images/user/tmp/$img' class='img-thumbnail' onclick=\"delimg('$redata->user_id','$redata->img','$redata->img');\" width='150'/>";
				echo "<p class='help-block'>คลิกภาพหากต้องการลบภาพ!</p>";
			}else{
			?>
			<input type="file" name="fle" id="exampleInputFile">
			<p class="help-block">อัพโหลดรูปภาพขนาดไม่เกิน 500x500px;</p>
			<?php
			}
			?>
			
		</div>
		<div class="checkbox">
			<label>
			<input type="checkbox" name="status" value="1" <?=$checked;?>> ติ๊กเพื่อเปิดให้ใช้งาน
			</label>
		</div>
	</div><!-- /.box-body -->

	<div class="box-footer">
		<input type="submit" class="btn btn-primary" value=" บันทึก ">
	</div>
</form>