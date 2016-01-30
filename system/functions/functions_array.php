<?php
function slidephoto($url){
	include '@backend/include/config.php';
	$slide = array();
	$btn = array();
	$i = 0;
	$sql = "SELECT * FROM album WHERE status = 1 ORDER BY date_create DESC LIMIT 0,8";
	$q = $dbCon->query($sql);
	while($re = $q->fetch_object()){
		
		if($i==0){
			$class = "active";	
		}else{
			$class = "";
		}
		$img = "<div class='$class item'>
					<div class=\"container slide-element\" style='height:430px;width: 100%; over-flow:hidden;'>
						<img src=\"$url/images/album/$re->album_img\" width='100%'  alt=\"$re->name\">
						<p><a href=\"$url/photography/$re->album_id\">$re->name</a></p>
					</div>
				</div>";

		array_push($slide,$img);
		$i++;
	}
	
	//shuffle($advert2); 
	return implode(' ',$slide);
}


function slidephotobtn($url){
	include '@backend/include/config.php';
	$btn = array();
	$i = 0;
	$sql = "SELECT * FROM album WHERE status = 1 ORDER BY date_create DESC LIMIT 0,8";
	$q = $dbCon->query($sql);
	while($re = $q->fetch_object()){
		
		
		if($i==0){
			$class = "active";	
		}else{
			$class = "";
		}
		$text = "<li data-target=\"#ccr-slide-main\" data-slide-to=\"$i\" class=\"$class\"></li>";
		array_push($btn,$text);
		$i++;
	}
	
	//shuffle($advert2); 
	return implode(' ',$btn);
}


//slide video
function slidevideo($url){
	include '@backend/include/config.php';
	$slide = array();
	$btn = array();
	$i = 0;
	$sql = "SELECT * FROM video WHERE status = 1 ORDER BY dateadd DESC LIMIT 0,4";
	$q = $dbCon->query($sql);
	while($re = $q->fetch_object()){
		
		if($i==0){
			$class = "active";	
		}else{
			$class = "";
		}
		$img = "<div class='$class item'>
					<div class=\"container slide-element\" style='height:430px;width: 100%; over-flow:hidden;'>
						<img src=\"http://img.youtube.com/vi/$re->videocode/hqdefault.jpg\" width='100%'  alt=\"$re->videotitle\">
						<p><a href=\"$url/video/$re->videoid\">$re->videotitle</a></p>
					</div>
				</div>";

		array_push($slide,$img);
		$i++;
	}
	
	//shuffle($advert2); 
	return implode(' ',$slide);
}

function slidevideobtn($url){
	include '@backend/include/config.php';
	$btn = array();
	$i = 0;
	$sql = "SELECT * FROM video WHERE status = 1 ORDER BY dateadd DESC LIMIT 0,4";
	$q = $dbCon->query($sql);
	while($re = $q->fetch_object()){
		
		
		if($i==0){
			$class = "active";	
		}else{
			$class = "";
		}
		$text = "<li data-target=\"#ccr-slide-main\" data-slide-to=\"$i\" class=\"$class\"></li>";
		array_push($btn,$text);
		$i++;
	}
	
	//shuffle($advert2); 
	return implode(' ',$btn);
}

//slide gallery
function slidegallery($url){
	include '@backend/include/config.php';
	$slide = array();
	$btn = array();
	$i = 0;
	$sql = "SELECT * FROM gallery WHERE status = 1 ORDER BY dateadd DESC LIMIT 0,8";
	$q = $dbCon->query($sql);
	while($re = $q->fetch_object()){
		
		if($i==0){
			$class = "active";	
		}else{
			$class = "";
		}
		$img = "<div class='$class item'>
					<div class=\"container slide-element\" style='height:430px;width: 100%; over-flow:hidden;'>
						<img src=\"$url/images/gallery/$re->gallimg\" width='100%'  alt=\"$re->gallname\">
						<p><a href=\"$url/gallery/$re->gallid\">$re->gallname</a></p>
					</div>
				</div>";

		array_push($slide,$img);
		$i++;
	}
	
	//shuffle($advert2); 
	return implode(' ',$slide);
}

function slidegallerybtn($url){
	include '@backend/include/config.php';
	$btn = array();
	$i = 0;
	$sql = "SELECT * FROM gallery WHERE status = 1 ORDER BY dateadd DESC LIMIT 0,8";
	$q = $dbCon->query($sql);
	while($re = $q->fetch_object()){
		
		
		if($i==0){
			$class = "active";	
		}else{
			$class = "";
		}
		$text = "<li data-target=\"#ccr-slide-main\" data-slide-to=\"$i\" class=\"$class\"></li>";
		array_push($btn,$text);
		$i++;
	}
	
	//shuffle($advert2); 
	return implode(' ',$btn);
}

?>