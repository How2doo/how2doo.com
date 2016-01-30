<?php
//module pretty
$sqlpretty = "select * from pretty where status_active = 1 order by pretty_id desc limit 0,8";
$qpretty = $dbCon->query($sqlpretty) or die($dbCon->error);

//module photographer
$sqlphotographer = "select * from member_register where status_active = 1 AND mphoto = 1 order by member_id desc limit 0,8";
$qphotographer = $dbCon->query($sqlphotographer) or die($dbCon->error);

//module stylish
$sqlstylish = "select * from member_register where status_active = 1 AND mstylish = 1 order by member_id desc limit 0,8";
$qstylish = $dbCon->query($sqlstylish) or die($dbCon->error);

//modules popnews
$sqlpopnews = "select * from news where status = 1 order by rating desc limit 0,5";
$qpopnews = $dbCon->query($sqlpopnews) or die($dbCon->error);

//modules popblog
$sqlpopblog = "select * from post where status = 1 order by rating desc limit 0,5";
$qpopblog = $dbCon->query($sqlpopblog) or die($dbCon->error);

//modules toppretty
$sqltoppretty = "select * from pretty where status_active = 1 order by rating desc limit 0,10";
$qtoppretty = $dbCon->query($sqltoppretty) or die($dbCon->error);

//modules activity
$sqlactivityone = "select * from news where typeid = 2 order by newsid desc limit 0,8";
$qactivityone = $dbCon->query($sqlactivityone) or die($dbCon->error);
$reactivityone = $qactivityone->fetch_object();

$sqlactivity = "select * from news where typeid = 2 and newsid != '".$reactivityone->newsid."' order by newsdate desc limit 0,8";
$qactivity = $dbCon->query($sqlactivity) or die($dbCon->error);


//modules lastupdate
$sqljobupdate = "select * from job where status = 1 order by dateadd DESC limit 0,5";
$qjobupdate = $dbCon->query($sqljobupdate) or die($dbCon->error);

//modules news
$sqlnewsone = "select * from news where typeid = 3 order by newsid desc limit 0,8";
$qnewsone = $dbCon->query($sqlnewsone) or die($dbCon->error);
$renewsone = $qnewsone->fetch_object();

$sqlnews = "select * from news where typeid =3 AND newsid != '".$renewsone->newsid."' order by newsdate desc limit 0,8";
$qnews = $dbCon->query($sqlnews) or die($dbCon->error);

//modules portfolio
$sqlportone = "select * from news where typeid = 6 order by newsdate desc limit 0,8";
$qportone = $dbCon->query($sqlportone) or die($dbCon->error);
$reportone = $qportone->fetch_object();

$sqlport = "select * from news where typeid =6 AND newsid != '".$reportone->newsid."' order by newsdate asc limit 0,8";
$qport = $dbCon->query($sqlport) or die($dbCon->error);

//modules movies
$sqlmovieone = "select * from news where typeid = 5 order by newsid desc limit 0,8";
$qmovieone = $dbCon->query($sqlmovieone) or die($dbCon->error);
$removieone = $qmovieone->fetch_object();

$sqlmovie = "select * from news where typeid =5 AND newsid != '".$removieone->newsid."' order by dateadd desc limit 0,6";
$qmovie = $dbCon->query($sqlmovie) or die($dbCon->error);

//modules job
$dd = date("Y-m-d");
//$sqljob = "select * from job where status = '1' and jobdate_end > '$dd' order by dateadd desc limit 0,10";
$sqljob = "select * from job where status = '1' order by dateadd desc limit 0,10";
$qjob = $dbCon->query($sqljob) or die($dbCon->error);

//province
$sqlprovince = "SELECT * FROM province";
$qprovince = $dbCon->query($sqlprovince) or die($dbCon->error);

$sqlprovince2 = "SELECT * FROM province";
$qprovince2 = $dbCon->query($sqlprovince2) or die($dbCon->error);

$sqlprovince3 = "SELECT * FROM province";
$qprovince3 = $dbCon->query($sqlprovince3) or die($dbCon->error);


//topvideo modules top video
$sqltopvideo = "select * from video where status = 1 order by rating DESC LIMIT 0,1";
$qtopvideo = $dbCon->query($sqltopvideo) or die($dbCon->error);
$retopvideo = $qtopvideo->fetch_object();

$sqltopvideo2 = "select * from video where videoid != '".$retopvideo->videoid."' and status = 1 order by rating DESC LIMIT 0,10";
$qtopvideo2 = $dbCon->query($sqltopvideo2) or die($dbCon->error);

//topgallery modules top gallery
$sqltopgallery = "select * from gallery where status = 1 order by rating DESC LIMIT 0,1";
$qtopgall = $dbCon->query($sqltopgallery) or die($dbCon->error);
$retopgall = $qtopgall->fetch_object();

$sqltopgall2 = "select * from gallery where gallid != '".$retopgall->gallid."' and status = 1 order by rating DESC LIMIT 0,10";
$qtopgall2 = $dbCon->query($sqltopgall2) or die($dbCon->error);


function sax($sex){
	if($sex=="1"){
		$sexname = "ชาย";
	}elseif($sex=="2"){
		$sexname = "หญิง";
	}elseif($sex=="3"){
		$sexname = "Ladyboy";
	}
	
	return $sexname;
}




//บันทึก static
function putstatic()
{
	include '@backend/include/config.php';
	
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    $date = date('Y-m-d');
    $month = date('m');
    $year = date('Y');
    
    $insert_ip = $dbCon->query("INSERT static_ip(date,ip) values('$date', '$ip')");
    
    
    $ckrating = $dbCon->query("SELECT date,crating FROM static_rate WHERE date = '$date'");
    $num = $ckrating->num_rows;
    $rerating = $ckrating->fetch_assoc();
    
    //print $rerating[crating];
    
    if($num>0){
        
        $posi = $rerating['crating']+1;
        $update_rate = $dbCon->query("UPDATE static_rate SET crating = '$posi' WHERE date = '$date'");
    }else{
        $posi = 1;
        $insert_rate = $dbCon->query("INSERT static_rate(date,month,crating) VALUES('$date', '$month', '$posi')");
    }
    
    
}


$arrshirt_size = array('SSS','SS','S','S/M','M','M/L','L','L/XL','XL');
$arrpants = array('S','S/M','M','M/L','L','L/XL','XL');
$arrskin = array('ขาว','ขาว/เหลือง','ขาว/ชมพู','แทน/น้ำผึ้ง');
$arrhair = array('ดำ','น้ำตาลอ่อน','น้ำตาลเข้ม','น้ำตาลแดง','ทอง','ทองแดง','ขาว','เขียว','เหลือง','แดง','Blond','Caramel','Chocolate Brown','Expresso','Red hot Cinnamon','Light Auburn','Light Brown','Dark Golden Brown','Medium Ash Brown','Pure Diamond','Ruby Fusion','Blowont Burgundy','Reddish Blonde');
$arreyes = array('ดำ','น้ำตาลอ่อน','น้ำตาลเข้ม','ฟ้า','เขียว','เขียวอมน้ำตาล','น้ำเงิน/ฟ้าเข้ม');
$arrcontactlens = array('ได้','ไม่ได้');
$arrmakeup = array('ได้','ไม่ได้');
$arrtattoo = array('ไม่มี','มี');
$arrorthodontics = array('ไม่มี','มี');
$arrnavel = array('ไม่มี','มี');
$arrpassport = array('ไม่มี','มี');

?>