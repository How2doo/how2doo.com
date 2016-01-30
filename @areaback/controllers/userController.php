<?php
        if($get_part2=="add"){

          $pagename3 = "เพิ่มผู้ใช้งาน";
          $pageroot3 = "modules/userform_add.php";
            
        }elseif($get_part2=="edit"){
          $pagename3 = "แก้ไขผู้ใช้งาน";
          $pageroot3 = "modules/userform_edit.php";

        }else{
          $pagename3 = "ข้อมูลผู้ใช้งาน";
          $pageroot3 = "views/user.php";
        }
?>
<script type="text/javascript">
	function chkdata(){
		with(frm){
			if(txtname.value==''){
				sweetAlert('ผิดพลาด...', 'กรุณากรอกชื่อนามสกุลด้วยครับ!!', 'error');
				return false;
			}

			if(txtusername.value==''){
				sweetAlert('ผิดพลาด...', 'กรุณากรอกชื่อผู้ใช้งานระบบด้วยครับ!!', 'error');
				return false;
			}
			/*
			if(txtuserpass.value==''){
				sweetAlert('ผิดพลาด...', 'กรุณาใส่รหัสผ่านด้วยครับด้วยครับ!!', 'error');
				return false;
			}
			*/
			if(txtlevel.value==''){
				sweetAlert('ผิดพลาด...', 'กรุณาระบบระดับการใช้งานด้วยครับ!!', 'error');
				return false;
			}
			
		}
	}
	
	function deldata(id,object,img){
		
		swal({   
		title: 'คุณแน่ใจนะว่าจะลบ?',   
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
				window.location = "<?=$url2;?>/@cmd/action_user.php?select=del&id=" + id + "&img=" + img  ;	  
			} else {     
				swal('Cancelled','Your imaginary file is safe :)','error');   
			}
		});
		
		
	}
	
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
				window.location = "<?=$url2;?>/@cmd/action_user.php?select=delimg&id=" + id + "&img=" + img;
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
    <h3 class="box-title"><?=$pagename3;?></h3>
    <div class="pull-right box-tools">
      <a onclick="history.back();" class="btn btn-info btn-sm"><i class="fa fa-undo"></i> ย้อนกลับ</a>
      <a href="<?=$url.$get_part0.'/'.$get_part1.'/add';?>/" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> เพิ่มผู้ใช้งาน</a>

    </div>
    </div><!-- /.box-header -->
  
    <div class="box-body pad">
    <?php
      include($pageroot3);
    ?>  

    </div>  
        
  </div>

</div>	

</div>