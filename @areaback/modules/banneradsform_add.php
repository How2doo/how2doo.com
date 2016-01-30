<form role="form" name="frm" method="post"  onsubmit="return chkdata();" action="<?=$url2;?>/@cmd/action_bannerads.php?select=add"  enctype="multipart/form-data">
	<div class="box-body">
		<div class="form-group">
			<label for="exampleInputEmail1">ชื่อโฆษณา</label>
			<input type="text" class="form-control" name="txtname" required>
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">สคริป (Code) โฆษณา</label>
			<textarea class="form-control" name="txtcode"></textarea>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">ไฟล์รูปภาพโฆษณา</label>
			<input type="file" class="form-control" name="fle" >
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">ลิงค์แบนเนอร์</label>
			<input type="url" class="form-control" name="txtlink" required>
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">ตำแหน่งโฆษณา</label>
			<select class="form-control" name="txtposision">
				<?php
				foreach($arrposision as $key => $value){
					if($redata->baposition==$key){
						$selectedposition = "selected";
					}else{
						$selectedposition = "";
					}
					echo "<option value='$key' $selectedposition>$value";
				}
				?>
			</select>
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">ลำดับ</label>
			<select class="form-control" name="txtline">
				<?php
				foreach($arrlineads as $value){
					if($redata->baline==$key){
						$selectedline = "selected";
					}else{
						$selectedline = "";
					}
					echo "<option value='$value' $selectedline>$value";
				}
				?>
			</select>
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">เริ่มแสดง</label>
			<input type="date" class="form-control" name="datestart" >
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">สิ้นสุดการแสดง</label>
			<input type="date" class="form-control" name="dateend" >
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">สถานะ</label>
			<select class="form-control" name="status">
				<option value="1">เปิดแสดง
				<option value="0">ปิดแสดง
			</select>
		</div>

	</div><!-- /.box-body -->

	<div class="box-footer">
		<input type="submit" class="btn btn-primary" value=" บันทึก ">
	</div>
</form>