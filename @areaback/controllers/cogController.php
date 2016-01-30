<?php
$qdata = $dbCon->query("select * from setting where setting_id = '1'");
$redata = $qdata->fetch_object();

if($redata->setting_status==1){
	$checked = "checked";
}else{
	$checked = "";
}

?>
<script type="text/javascript">
	
	function delimg(id,object,img){
		
		swal({   
		title: 'คุณแน่ใจนะว่าจะลบรูปภาพนี้?',   
		text: object,   
		type: 'warning',   
		showCancelButton: true,   
		confirmButtonColor: '#3085d6',   
		cancelButtonColor: '#d33',   
		confirmButtonText: 'Yes, delete it!',   
		cancelButtonText: 'No, cancel!',   
		confirmButtonClass: 'confirm-class',   
		cancelButtonClass: 'cancel-class',   
		closeOnConfirm: false,   
		closeOnCancel: false }, 
		function(isConfirm) {   
			if (isConfirm) {     
				swal('Deleted!','Your file has been deleted.','success'); 
				window.location = "<?=$url2;?>/@cmd/action_cog.php?select=delimg&id=" + id + "&img=" + img;
			} else {     
				swal('Cancelled','Your imaginary file is safe :)','error');   
			}
		});

	}

	function delimgfavi(id,object,img){
		
		swal({   
		title: 'คุณแน่ใจนะว่าจะลบรูปภาพนี้?',   
		text: object,   
		type: 'warning',   
		showCancelButton: true,   
		confirmButtonColor: '#3085d6',   
		cancelButtonColor: '#d33',   
		confirmButtonText: 'Yes, delete it!',   
		cancelButtonText: 'No, cancel!',   
		confirmButtonClass: 'confirm-class',   
		cancelButtonClass: 'cancel-class',   
		closeOnConfirm: false,   
		closeOnCancel: false }, 
		function(isConfirm) {   
			if (isConfirm) {     
				swal('Deleted!','Your file has been deleted.','success'); 
				window.location = "<?=$url2;?>/@cmd/action_cog.php?select=delimgfavi&id=" + id + "&img=" + img;
			} else {     
				swal('Cancelled','Your imaginary file is safe :)','error');   
			}
		});

	}
	
	
</script>
<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">ตั้งค่าระบบเว็บไซต์</h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		<form role="form" name="frm" method="POST" onsubmit="return chkdata();" action="<?=$url2;?>/@cmd/action_cog.php?select=update" enctype="multipart/form-data">
			<div class="box-body">
				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-home"></i> ชื่อเว็บไซต์/ชื่อบริษัท</label>
					<input type="text" class="form-control" name="txtname" value="<?=$redata->setting_name;?>" id="exampleInputEmail1" >
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-home"></i> ที่อยู่</label>
					<textarea name="txtaddress" class="form-control"><?=$redata->setting_address;?></textarea>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-phone"></i> เบอร์โทร</label>
					<input type="text" class="form-control" name="txttel1" value="<?=$redata->setting_tel1;?>" id="exampleInputEmail1" >
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-phone"></i> เบอร์โทร</label>
					<input type="text" class="form-control" name="txttel2" value="<?=$redata->setting_tel2;?>" id="exampleInputEmail1" >
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-fax"></i> แฟกส์</label>
					<input type="text" class="form-control" name="txtfax" value="<?=$redata->setting_fax;?>" id="exampleInputEmail1" >
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-envelope-o"></i> อีเมล์</label>
					<input type="text" class="form-control" name="txtemail" value="<?=$redata->setting_email;?>" id="exampleInputEmail1" >
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-facebook-official"></i> facebook Page</label>
					<input type="text" class="form-control" name="txtfacebook" value="<?=$redata->setting_facebook;?>" id="exampleInputEmail1" >
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-google-plus-square"></i> google+</label>
					<input type="text" class="form-control" name="txtgoogle" value="<?=$redata->setting_google;?>" id="exampleInputEmail1" >
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-whatsapp"></i> LINE ID</label>
					<input type="text" class="form-control" name="txtline" value="<?=$redata->setting_line;?>" id="exampleInputEmail1" >
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-globe"></i> Website</label>
					<input type="text" class="form-control" name="txtwebsite" value="<?=$redata->setting_website;?>" id="exampleInputEmail1" >
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-instagram"></i> Instagram</label>
					<input type="text" class="form-control" name="txtinstagram" value="<?=$redata->setting_instagram;?>" id="exampleInputEmail1" >
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-youtube-square"></i> Youtube</label>
					<input type="text" class="form-control" name="txtyoutube" value="<?=$redata->setting_youtube;?>" id="exampleInputEmail1" >
				</div>
                
				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-youtube-square"></i> keyword</label>
					<textarea class="form-control" name="txtkeyword"><?=$redata->setting_keyword;?></textarea>
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-youtube-square"></i> Description</label>
					<textarea class="form-control" name="txtdescription"><?=$redata->setting_description;?></textarea>
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-youtube-square"></i> Tag</label>
					<textarea class="form-control" name="txttag"><?=$redata->setting_tag;?></textarea>
				</div>
				
                <div class="form-group">
					<label for="exampleInputFile"><i class="fa fa-file-photo-o"></i> LOGO</label><br />
					<?php
					if($redata->setting_logo!=''){
						echo "<img src='../../images/$redata->setting_logo' class='img-thumbnail' onclick=\"delimg('1','$redata->setting_logo','$redata->setting_logo');\" width='200'/>";
						echo "<p class='help-block'>คลิกภาพหากต้องการลบภาพ!</p>";
					}else{
					?>
					<input type="file" name="fle" id="exampleInputFile">
					<p class="help-block">อัพโหลดภาพ LOGO</p>
					<?php
					}
					?>
					
				</div>
				
				<div class="form-group">
					<label for="exampleInputFile"><i class="fa fa-file-photo-o"></i> Favicon</label><br />
					<?php
					if($redata->setting_favicon!=''){
						echo "<img src='../../images/$redata->setting_favicon' class='img-thumbnail' onclick=\"delimgfavi('1','$redata->setting_favicon','$redata->setting_favicon');\" width='200'/>";
						echo "<p class='help-block'>คลิกภาพหากต้องการลบภาพ!</p>";
					}else{
					?>
					<input type="file" name="flefavi" id="exampleInputFile">
					<p class="help-block">อัพโหลดภาพ LOGO Favicon</p>
					<?php
					}
					?>
					
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"><i class="fa fa-calendar"></i> Update</label>
					<input type="text" class="form-control" name="txtupdate" value="<?=$redata->setting_update;?>" id="exampleInputEmail1"  readonly>
				</div>

				<div class="checkbox">
					<label>
					<input type="checkbox" name="status" value="1" <?=$checked;?> > ติ๊กเพื่อเปิดเว็บไซต์/ติ๊กออกเพื่อปิดปรับปรุง
					</label>
            	</div>
			</div><!-- /.box-body -->
			<div class="box-footer">
				<input type="submit" value=" Save " class="btn btn-primary">
			</div>
    	</form>
	</div>

</div>	

</div>