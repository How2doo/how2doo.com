<form role="form" name="frm" method="post"  onsubmit="return chkdata();" action="<?=$url2;?>/@cmd/action_typenews.php?select=add"  enctype="multipart/form-data">
	<div class="box-body">
		<div class="form-group">
			<label for="exampleInputEmail1">ชื่อหมวดหมู่ (TH)</label>
			<input type="text" class="form-control" name="txtnameth" id="exampleInputEmail1" placeholder="ชื่อหมวดหมู่ ไทย...">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">ชื่อหมวดหมู่ (EN)</label>
			<input type="text" class="form-control" name="txtnameen" id="exampleInputEmail1" placeholder="catagory name...">
		</div>

	</div><!-- /.box-body -->

	<div class="box-footer">
		<input type="submit" class="btn btn-primary" value=" บันทึก ">
	</div>
</form>