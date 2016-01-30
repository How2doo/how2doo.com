<form role="form" name="frm" method="post"  onsubmit="return chkdata();" action="<?=$url2;?>/@cmd/action_posts.php?select=add"  enctype="multipart/form-data">
<input type="hidden" name="userid" value="<?=$userid;?>"/>
	<div class="col-md-9">
		<div class="box-body">
			<div class="form-group">
				<label for="exampleInputEmail1">ชื่อบทความ</label>
				<input type="text" class="form-control" name="txtname" placeholder="ชื่อบทความ...">
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">รายละเอียด</label>
				<textarea class="form-control" id="editor1" rows="10" cols="80" name="txtdetail"></textarea>
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
				<input type="text" class="form-control" value="<?=$userfullname;?>" readonly>
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">อัพเดทบทความ</label>
				<input type="text" class="form-control" value="<?=date("Y-d-m");?>" readonly>
			</div>
			
			
			<div class="form-group">
				<label for="exampleInputEmail1">สถานะสินค้า</label>
				<select class="form-control" name="status">
					<option value="1">เปิดแสดงโพส
					<option value="0">ปิดแสดงโพส
				</select>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">รูปภาพ</label>
				<div>

					<div class="fileinput fileinput-new" data-provides="fileinput">
						<div class="fileinput-new thumbnail" style="width: 100%; min-height: 200px;"></div>
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



