<?php
        if($get_part2=="add"){

          $pagename3 = "เพิ่ม โฆษณา";
          $pageroot3 = "modules/banneradsform_add.php";
            
        }elseif($get_part2=="edit"){
          
          $qdata = $dbCon->query("select * from banner_ads where baid = '$get_part3' ") 
          or die($dbCon->error);
		  $redata = $qdata->fetch_object();
		  
		  if($redata->status==1){
			$checked = 'checked';
		  }else{
			$checked = '';
		  }
		  
		  if($redata->baimg!=''){
      			$img = "$urlweb/images/banner/ads/$redata->baimg";  
		    }else{
		      	$img = "$urlweb/images/banner/ads/tmp/nopic.jpg";
		    }
        	
          $pagename3 = "แก้ไข โฆษณา";
          $pageroot3 = "modules/banneradsform_edit.php";

        }else{
          //select data memeber_regis
          $query = $dbCon->query("select * from banner_ads  order by baid ASC");
          $pagename3 = "ข้อมูลภาพสไลน์";
          $pageroot3 = "views/bannerads.php";
        }
?>
<script type="text/javascript">
	function chkdata(){
		with(frm){
			if(txtname.value==''){
				sweetAlert('ผิดพลาด...', 'กรุณากรอกชื่อสไลน์ด้วยครับด้วยครับ!!', 'error');
				return false;
			}

			if(fle.value==''){
				sweetAlert('ผิดพลาด...', 'กรุณาอัพโหลดภาพด้วยครับ!!', 'error');
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
				window.location = "<?=$url2;?>/@cmd/action_bannerads.php?select=del&id=" + id + "&img=" + img  ;	  
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
				window.location = "<?=$url2;?>/@cmd/action_bannerads.php?select=delimg&id=" + id + "&img=" + img;
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
      <a href="<?=$url.$get_part0.'/'.$get_part1.'/add';?>/" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> เพิ่มสไลน์</a>

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