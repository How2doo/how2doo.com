<form role="form" name="frm" method="post"  onsubmit="return chkdata();" action="<?=$url2;?>/@cmd/action_user.php?select=add"  enctype="multipart/form-data">
	<div class="box-body">
		<div class="form-group">
			<label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
			<input type="text" class="form-control" name="txtname" id="exampleInputEmail1" placeholder="Fullname...">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
			<input type="text" class="form-control" name="txtusername" id="exampleInputEmail1" placeholder="Username...">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">รหัสผ่าน</label>
			<input type="text" class="form-control" name="txtuserpass" id="exampleInputEmail1" placeholder="Password...">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">ระดับการใช้งาน</label>
			<select class="form-control" name="txtlevel" size="2">
				<option value="1">ผู้ดูแลระบบ</option>
				<option value="2">ผู้ใช้งานทั่วไป</option>
			</select>
		</div>
		
		<div class="form-group">
			<label for="exampleInputFile">รูปภาพ</label>
			<input type="file" name="fle" id="exampleInputFile">
			<p class="help-block">อัพโหลดรูปภาพขนาดไม่เกิน 500x500px;</p>
		</div>
		<div class="form-group">
			<label>
			<input type="checkbox" class="flat-red" name="status" value="1"> ติ๊กเพื่อเปิดให้ใช้งาน
			</label>
		</div>
	</div><!-- /.box-body -->

	<div class="box-footer">
		<input type="submit" class="btn btn-primary" value=" บันทึก ">
	</div>
</form>