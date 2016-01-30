<form role="form" name="frm" method="post"  onsubmit="return chkdata();" action="<?=$url2;?>/@cmd/action_posts.php?select=edit"  enctype="multipart/form-data">
<input type="hidden" name="userid" value="<?=$userid;?>"/>
<input type="hidden" name="id" value="<?=$redata->postid;?>"/>
	<div class="col-md-9">
		<div class="box-body">
			<div class="form-group">
				<label for="exampleInputEmail1">ชื่อบทความ</label>
				<input type="text" class="form-control" name="txtname" value="<?=$redata->postname;?>" >
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">รายละเอียด</label>
				<textarea class="form-control" id="editor1" rows="10" cols="80" name="txtdetail"><?=$redata->postdetail;?></textarea>
				<script>
					CKEDITOR.replace('editor1');
				</script>
			</div>
			

		</div><!-- /.box-body -->
	</div>
	
	<div class="col-md-3" style="background-color: #E8F7FF;">
		<div class="box-body">
			
			<div class="form-group">
				<label for="exampleInputEmail1">ผู้สร้างบทความ</label>
				<input type="text" class="form-control" value="<?=$createname;?>" readonly>
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">อัพเดทบทความ</label>
				<input type="text" class="form-control" value="<?=$redata->dateadd;?>" readonly>
			</div>
			
			
			<div class="form-group">
				<label for="exampleInputEmail1">สถานะสินค้า</label>
				<select class="form-control" name="status">
					<?php
					if($redata->status==1){
						echo "<option value='1' selected>เปิดแสดงโพส";
					}else{
						echo "<option value='1'>เปิดแสดงโพส";
					}
					if($redata->status==0){
						echo "<option value='0' selected>ปิดแสดงโพส";
					}else{
						echo "<option value='0'>ปิดแสดงโพส";
					}
					
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">รูปภาพ</label>
				<div>

					<div class="fileinput fileinput-new" data-provides="fileinput">
						<div class="fileinput-new thumbnail" style="width: 100%; min-height: 200px;">
							<?php
						    	if($redata->postimg!=''){
									echo "<img src='$urlweb/images/post/tmp/$redata->postimg'  />";
									echo "<a onclick=\"delimg('$redata->postid','$redata->postname','$redata->postimg');\" class='btn btn-xs btn-danger fa fa-trash'></a>";
								}
							?>
						</div>	
							<div class="fileinput-preview fileinput-exists thumbnail" style="width: 100%; min-height: 200px;"></div>
					        
					        <div>
					          <span class="btn btn-default btn-file"><span class="fileinput-new">เลือกรูป</span><span class="fileinput-exists">เปลี่ยนรูป</span><input type="file"  name="fle"></span>
					          <a href='' class='btn btn-default fileinput-exists' data-dismiss='fileinput'>ลบ</a>
					        </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" value=" บันทึก ">
				<input type="button" onclick="history.back();" class="btn btn-danger" value=" ยกเลิก ">
			</div>
			
		</div>
	</div>

</form>



