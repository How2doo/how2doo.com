<form role="form" name="frm" method="post"  onsubmit="return chkdata();" action="<?=$url2;?>/@cmd/action_bannerads.php?select=edit"  enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?=$redata->baid;?>"/>
	<div class="box-body">
		<div class="form-group">
			<label for="exampleInputEmail1">ชื่อโฆษณา</label>
			<input type="text" class="form-control" name="txtname" value="<?=$redata->baname;?>" required>
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">สคริป (Code) โฆษณา</label>
			<textarea class="form-control" name="txtcode"><?=$redata->bacode;?></textarea>
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">ไฟล์รูปภาพโฆษณา</label>
			<label for="exampleInputEmail1">รูปภาพ</label><br />
			<?php
			if($redata->baimg!=''){
				echo "<img src='$img' class='img-thumbnail' onclick=\"delimg('$redata->baid','$redata->baname','$redata->baimg');\" />";
				echo "<p class='help-block'>คลิกภาพหากต้องการลบภาพ!</p>";
			}else{
			?>
			<input type="file" name="fle" class="form-control" id="exampleInputFile">
			<p class="help-block">อัพโหลดรูปภาพขนาดเท่ากับขนาดแบนเนอร์จริง</p>
			<?php
			}
			?>
			<?php
			
			
			
			?>
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">ลิงค์แบนเนอร์</label>
			<input type="url" class="form-control" name="txtlink" value="<?=$redata->balink;?>" required>
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
			<input type="date" class="form-control" value="<?=$redata->datestart;?>" name="datestart" >
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">สิ้นสุดการแสดง</label>
			<input type="date" class="form-control" value="<?=$redata->dateend;?>" name="dateend" >
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">สถานะ</label>
			<select class="form-control" name="status">
					<?php
					if($redata->status==1){
						echo "<option value='1' selected>เปิดแสดง";
					}else{
						echo "<option value='1'>เปิดแสดง";
					}
					if($redata->status==0){
						echo "<option value='0' selected>ปิดแสดง";
					}else{
						echo "<option value='0'>ปิดแสดง";
					}
					
					?>
				</select>
		</div>

	</div><!-- /.box-body -->

	<div class="box-footer">
		<input type="submit" class="btn btn-primary" value=" บันทึก ">
	</div>
</form>