<?php
function parse_path() {
  $path = array();
  if (isset($_SERVER['REQUEST_URI'])) {
    $request_path = explode('?', $_SERVER['REQUEST_URI']);

    $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
    $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
    $path['call'] = utf8_decode($path['call_utf8']);
    if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
      $path['call'] = '';
    }
    $path['call_parts'] = explode('/', $path['call']);

    $path['query_utf8'] = urldecode($request_path[1]);
    $path['query'] = utf8_decode(urldecode($request_path[1]));
    $vars = explode('&', $path['query']);
    foreach ($vars as $var) {
      $t = explode('=', $var);
      $path['query_vars'][$t[0]] = $t[1];
    }
  }
return $path;
}

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/how2doo.com";
  //$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"];
 }
 return $pageURL;
}


$path_info = parse_path();
//echo '<pre>'.print_r($path_info, true).'</pre>';
$dir= curPageURL()."/$site_domain/site/assets";
$url= curPageURL()."/$site_domain/site";
$url2= curPageURL();
$urlimg = curPageURL()."/$site_domain/site";
$urlweb = "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$token = urlencode($urlweb);
//$urlimg = "http://".$_SERVER["SERVER_NAME"]."/pretty/";

$get_part0 = $path_info['call_parts'][0];
$get_part1 = $path_info['call_parts'][1];
$get_part2 = $path_info['call_parts'][2];
$get_part3 = $path_info['call_parts'][3];
$get_part4 = $path_info['call_parts'][4];
$get_part5 = $path_info['call_parts'][5];

//funvtions if

if($get_part0=="contact"){
	$pagename = "ติดต่อเรา";
	$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
	$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
	$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
	$pageroot = "controllers/contactusController.php";
	
}elseif($get_part0=="post"){
	
	if($get_part1!=''){
		$sqltext = "SELECT * FROM post WHERE post_id = '$get_part1' ";
		$qtext = $dbCon->query($sqltext) or die($dbCon->error);
		$retext = $qtext->fetch_object();
		$txtname = $retext->postname;
		$txtdesc = truncateStr(strip_tags($retext->postdetail),600);
		$imageurl = $urlimg.'/images/post/'.$retext->postimg;
		$postid = $retext->postid;
		
		//seo
		$title = $txtname;
		$description = $txtdesc;
		$keyword = $txtdesc."";
		//end seo
	
		$pageroot = "controllers/postController.php"; 
	}else{
		$pagename = "บล็อก บทความ";
		$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
		$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
		$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		
		$pageroot = "controllers/postController.php";
	}
	
}elseif($get_part0=="gallery"){
	
	if($get_part1!=''){
		$sqltext = "SELECT * FROM gallery WHERE gallid = '$get_part1' ";
		$qtext = $dbCon->query($sqltext) or die($dbCon->error);
		$retext = $qtext->fetch_object();
		$txtname = $retext->gallname;
		$txtdesc = truncateStr(strip_tags($retext->gallname),600);
		$imageurl = $urlimg.'/images/gallery/'.$retext->gallimg;
		$postid = $retext->gallid;
		
		if(SUBSTR($retext->user_id,0,1) == "M"){
			$createname = selectdata('member_register','member_name','member_id',$retext->user_id);
			$createname2 = selectdata('member_register','member_surname','member_id',$retext->user_id);
			$img2 = selectdata('member_register','member_img','member_id',$retext->user_id);
			$rootimg = "$url2/images/member/tmp/$img2";
		
		}else{
			$createname = selectdata('user','fullname','user_id',$retext->user_id);
			$img2 = selectdata('user','img','user_id',$retext->user_id);
			$rootimg = "$url2/@backend/images/user/tmp/$img2";
		}
		
		//seo
		$title = $txtname;
		$description = $txtdesc;
		$keyword = $txtdesc."พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		//end seo
	
		$pageroot = "controllers/galleryController.php";
	}else{
		$pagename = "แกลอรี่ รูปภาพ อัลบั้มรูปภาพ";
		$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
		$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
		$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		$pageroot = "controllers/galleryController.php";
	
	}

	

}elseif($get_part0=="video"){
	
	if($get_part1!=''){
		$sqltext = "SELECT * FROM video WHERE videoid = '$get_part1' ";
		$qtext = $dbCon->query($sqltext) or die($dbCon->error);
		$retext = $qtext->fetch_object();
		$txtname = $retext->videotitle;
		$txtdesc = truncateStr(strip_tags($retext->videodetail),600);
		$imageurl = "http://img.youtube.com/vi/$retext->videocode/hqdefault.jpg";
		$postid = $retext->videoid;
		
		if(SUBSTR($retext->user_id,0,1) == "M"){
			$createname = selectdata('member_register','member_name','member_id',$retext->user_id);
			$createname2 = selectdata('member_register','member_surname','member_id',$retext->user_id);
			$img2 = selectdata('member_register','member_img','member_id',$retext->user_id);
			$rootimg = "$url2/images/member/tmp/$img2";
		
		}else{
			$createname = selectdata('user','fullname','user_id',$retext->user_id);
			$img2 = selectdata('user','img','user_id',$retext->user_id);
			$rootimg = "$url2/@backend/images/user/tmp/$img2";
		}
		
		//seo
		$title = $txtname;
		$description = $txtdesc;
		$keyword = $txtdesc."พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		//end seo
	
		$pageroot = "controllers/videoController.php";
	}else{
		$pagename = "วีดีโอ video clip video คลิปวีดีโอ ผลงานที่ผ่านมา";
		$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
		$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
		$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		$pageroot = "controllers/videoController.php";
	
	}

}elseif($get_part0=="news"){
	if($get_part1!=''){
		$sqltext = "SELECT * FROM news WHERE newsid = '$get_part1' ";
		$qtext = $dbCon->query($sqltext) or die($dbCon->error);
		$retext = $qtext->fetch_object();
		$txtname = $retext->newstopic;
		$txtdesc = truncateStr(strip_tags($retext->newsdetail),600);
		$imageurl = $urlimg.'/images/news/'.$retext->newsimg;
		$postid = $retext->newsid;
		
		//seo
		$title = $txtname;
		$description = $txtdesc;
		$keyword = $txtdesc."พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		//end seo
	
		$pageroot = "controllers/newsController.php"; 
	}else{
		$pagename = "ข่าว ประสัมพันธ์ ผลงานที่ผ่านมา";
		$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
		$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
		$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		
		$pageroot = "controllers/newsController.php";
	}

}elseif($get_part0=="merge"){
	
	if($get_part1=="history"){
		$pagename = "ประวัติบริษัท";
		//seo
		$title = $pagename;
		$description = "";
		$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		//end seo
		$pageroot = "controllers/pagesController.php";
	}elseif($get_part1=="service"){
		$pagename = "บริการของเรา";
		$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
		$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
		$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		$pageroot = "controllers/pagesController.php";
	}elseif($get_part1=="portfolio"){
		$pagename = "ผลงานที่ผ่านมา";
		$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
		$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
		$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		$pageroot = "controllers/pagesController.php";
	}
	
	
}elseif($get_part0=="about"){
	$pagename = "รู้จักเรา";
	$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
	$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
	$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
	$pageroot = "controllers/pagesController.php";
	
}elseif($get_part0=="howgood"){
	
	$pagename = "พริตตี้เอ็มซีดีอย่างไร";
	$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
	$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
	$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
	$pageroot = "controllers/pagesController.php"; 
	
}elseif($get_part0=="model"){
	if($get_part1!=''){
		$sqltext = "SELECT * FROM pretty WHERE pretty_id = '$get_part1' ";
		$qtext = $dbCon->query($sqltext) or die($dbCon->error);
		$retext = $qtext->fetch_object();
		$txtname = $retext->nickname.' '.$retext->name.' '.$retext->surname;
		$txtdesc = truncateStr(strip_tags($retext->portfolio),600);
		$imageurl = $urlimg.'/images/model/'.$retext->pretty_img;
		$prettyid = $retext->pretty_id;
		
		//seo
		$title = $txtname;
		$description = $txtdesc;
		$keyword = $txtdesc."พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		//end seo
	
		$pageroot = "controllers/modelController.php";  
	}else{
		$pagename = "พริตตี้ เอ็มซี";
		$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
		$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
		$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		$pageroot = "controllers/modelController.php"; 
	
	}
	
}elseif($get_part0=="job"){
	
	if($get_part1!=''){
		$sqltext = "SELECT * FROM job WHERE jobid = '$get_part1' ";
		$qtext = $dbCon->query($sqltext) or die($dbCon->error);
		$retext = $qtext->fetch_object();
		$txtname = $retext->jobname;
		$txtdesc = truncateStr(strip_tags($retext->jobdetail),600);
		$imageurl = $urlimg.'/images/job/'.$retext->jobimg;
		$postid = $retext->jobid;
		
		if(SUBSTR($retext->uid,0,1) == "M"){
			$createname = selectdata('member_register','member_name','member_id',$retext->uid);
			$createname2 = selectdata('member_register','member_surname','member_id',$retext->uid);
			$img2 = selectdata('member_register','member_img','member_id',$retext->uid);
			$rootimg = "$url2/images/member/tmp/$img2";
		
		}else{
			$createname = selectdata('user','fullname','user_id',$retext->uid);
			$img2 = selectdata('user','img','user_id',$retext->uid);
			$rootimg = "$url2/@backend/images/user/tmp/$img2";
		}
		
		//seo
		$title = $txtname;
		$description = $txtdesc;
		$keyword = $txtdesc."พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		//end seo
	
		$pageroot = "controllers/jobController.php"; 
	}else{
		$pagename = "หางาน / ประกาศงาน พริตตี้ เอ็มซี";
		$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
		$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
		$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		$pageroot = "controllers/jobController.php"; 
	
	} 

}elseif($get_part0=="postjob"){
	$pagename = "ลงประกาศงาน";
	$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
	$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
	$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
	$pageroot = "controllers/postjobController.php"; 
	
}elseif($get_part0=="photography"){
	
	if($get_part1!=''){
		$sqltext = "SELECT * FROM album WHERE album_id = '$get_part1' ";
		$qtext = $dbCon->query($sqltext) or die($dbCon->error);
		$retext = $qtext->fetch_object();
		$txtname = $retext->name;
		$txtdesc = truncateStr(strip_tags($retext->detail),600);
		$imageurl = $urlimg.'/images/album/'.$retext->album_img;
		$postid = $retext->album_id;
		
		if(SUBSTR($retext->member_id,0,1) == "M"){
			$createname = selectdata('member_register','member_name','member_id',$retext->member_id);
			$createname2 = selectdata('member_register','member_surname','member_id',$retext->member_id);
			$img2 = selectdata('member_register','member_img','member_id',$retext->member_id);
			$rootimg = "$url2/images/member/tmp/$img2";
		
		}else{
			$createname = selectdata('user','fullname','user_id',$retext->member_id);
			$img2 = selectdata('user','img','user_id',$retext->member_id);
			$rootimg = "$url2/@backend/images/user/tmp/$img2";
		}
		
		//seo
		$title = $txtname;
		$description = $txtdesc;
		$keyword = $txtdesc."พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		//end seo
	
		$pageroot = "controllers/photographyController.php"; 
	}else{
		$pagename = "มุมช่างภาพ ลงโปรไฟล์ ลงภาพผลงาน";
		$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
		$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
		$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		$pageroot = "controllers/photographyController.php";
	
	} 
	
}elseif($get_part0=="stylish"){
	
	if($get_part1!=''){
		$sqltext = "SELECT * FROM portfolio_stylish WHERE ps_id = '$get_part1' ";
		$qtext = $dbCon->query($sqltext) or die($dbCon->error);
		$retext = $qtext->fetch_object();
		$txtname = $retext->ps_name;
		$txtdesc = truncateStr(strip_tags($retext->ps_detail),600);
		$imageurl = $urlimg.'/images/stylish/portfolio/'.$retext->ps_img;
		$postid = $retext->ps_id;
		
		if(SUBSTR($retext->member_id,0,1) == "M"){
			$createname = selectdata('member_register','member_name','member_id',$retext->member_id);
			$createname2 = selectdata('member_register','member_surname','member_id',$retext->member_id);
			$img2 = selectdata('member_register','member_img','member_id',$retext->member_id);
			$rootimg = "$url2/images/member/tmp/$img2";
		
		}else{
			$createname = selectdata('user','fullname','user_id',$retext->member_id);
			$img2 = selectdata('user','img','user_id',$retext->member_id);
			$rootimg = "$url2/@backend/images/user/tmp/$img2";
		}
		
		//seo
		$title = $txtname;
		$description = $txtdesc;
		$keyword = $txtdesc."พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
		//end seo
	
		$pageroot = "controllers/stylishController.php"; 
	}else{
		$pagename = "ข่าว ประสัมพันธ์ ผลงานที่ผ่านมา";
		$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
		$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
		$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
	
		$pagename = "สไตลิส เมคอัพ แต่งหน้า ทำผม ผลงานที่ผ่านมา";
		$pageroot = "controllers/stylishController.php"; 
	
	}
	
}elseif($get_part0=="postprofile"){
	$pagename = "ฝากโปรไฟล์พริตตี้ เอ็มซี โมเดล นางแบบ นายแบบ";
	$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
	$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
	$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
	$pageroot = "controllers/postprofileController.php"; 
	
}elseif($get_part0=="login"){
	$pagename = "เข้าสู่ระบบ";
	$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
	$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
	$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
	$pageroot = "controllers/loginController.php"; 
	
}elseif($get_part0=="myaccount"){
	$pagename = "ส่วนสมาชิก";
	$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
	$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
	$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
	$pageroot = "controllers/myaccountController.php"; 
	
}elseif($get_part0=="register"){
	$pagename = "สมัครสมาชิก";
	$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
	$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
	$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
	$pageroot = "controllers/registerController.php"; 

}elseif($get_part0=="searchpretty"){
	$pagename = "ค้นหาพริตตี้ เอ็มซี";
	$title = $pagename.' : '."Pretty Mc Thailand พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ";
	$description = "พริตตี้เอ็มซี ไทยแลนด์ ฝากโปรไฟล์พริตตี้ สมัครสมาชิก ลงประกาศข่าว ช่างภาพ งานพริตตี้,หาพริตตี้,เอ็มซี pretty modeling โมเดลลิ่ง";
	$keyword = "พริตตี้เอ็มซีไทยแลนด์,pretty,modeling,mc,pretty,พริตตี้,ฝากโปรไฟล์พริตตี้ ,สมัครสมาชิก ,ลงประกาศข่าว ,ช่างภาพ";
	$pageroot = "controllers/searchprettyController.php"; 
	
}else{
	$pagename = "หน้าแรก";
	$title = $pagename.' : '."How2Doo";
	$description = "Find out how to do everything";
	$keyword = "Find out how to do everything";
	$pageroot = "controllers/mainController.php";
}



?>