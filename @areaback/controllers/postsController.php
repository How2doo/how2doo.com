<?php
        if($get_part1=="add"){

          $pagename3 = "เพิ่มบทความ";
          $pageroot3 = "modules/postform_add.php";
            
        }elseif($get_part1=="edit"){
        	
          if($get_part1=="edit" and $get_part2!=''){
          	
			$qdata = $dbCon->query("select * from post where postid = '$get_part2' ") or die($dbCon->error);
			$redata = $qdata->fetch_object();
			
			$createname = selectdata('user','fullname','user_id',$redata->user_id);
		    
		  }	
        
          $pagename3 = "แก้ไขบทความ";
          $pageroot3 = "modules/postform_edit.php";

        }else{
          
          $query = $dbCon->query("select * from post order by dateadd ASC");
          
          $pagename3 = "ข้อมูลบทความ";
          $pageroot3 = "views/posts.php";
        }
?>
<script type="text/javascript">
	function chkdata(){
		with(frm){
			if(txtname.value==''){
				sweetAlert('ผิดพลาด...', 'กรุณากรอกหัวข้อบทความด้วยครับ!!', 'error');
				return false;
			}

			
		}
	}
	
	function deldata(id,object){
		
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
				window.location = "<?=$url2;?>/@cmd/action_posts.php?select=del&id=" + id  ;	  
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
				window.location = "<?=$url2;?>/@cmd/action_posts.php?select=delimg&id=" + id + "&img=" + img;
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
      <a href="<?=$url.$get_part0.'/add';?>/" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> เพิ่มบทความใหม่</a>

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