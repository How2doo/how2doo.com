<?php
        if($get_part2=="add"){
        	
          $pagename3 = "เพิ่มสมาชิกรับข่าวสาร";
          $pageroot3 = "modules/membernewslaterform_add.php";
            
        }elseif($get_part2=="edit"){
        	
        	
          if($get_part2=="edit" and $get_part3!=''){
          	
          	
			$qdata = $dbCon->query("select * from member where member_id = '$get_part3' ") or die($dbCon->error);
			$redata = $qdata->fetch_object();
			
			if($redata->status==1){
				$checked = 'checked';
			}else{
				$checked = '';
			}
		    
		  }	
        
          $pagename3 = "แก้ไขสมาชิกรับข่าวสาร";
          $pageroot3 = "modules/membernewslaterform_edit.php";

        }else{
          
          $query = $dbCon->query("select * from member order by member_id DESC") or die($dbCon->error);
          
          $pagename3 = "สมาชิกรับข่าวสาร";
          $pageroot3 = "views/membernewslater.php";
        }
?>
<script type="text/javascript">
	function chkdata(){
		with(frm){
			if(txtname.value==''){
				sweetAlert('ผิดพลาด...', 'กรุณากรอกชื่อสมาชิก!!', 'error');
				return false;
			}
			if(txtmail.value==''){
				sweetAlert('ผิดพลาด...', 'กรุณากรอกอีเมล์สมาชิก!!', 'error');
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
				window.location = "<?=$url2;?>/@cmd/action_member.php?select=del&id=" + id  ;	  
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
      <a href="<?=$url.$get_part0.'/'.$get_part1.'/add';?>/" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> เพิ่มสมาชิกรับข่าวสาร</a>

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