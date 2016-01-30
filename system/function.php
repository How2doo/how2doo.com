<?php
function Database(){
	include("databases.php");
	return $connect;
}
function select_data($table,$field,$where=1){
	$connect=Database();
	$data_query=mysqli_query($connect,"SELECT $field FROM $table WHERE $where ;");
	if($data_query) $data=mysqli_fetch_row($data_query);
	if(isset($data[0])) return $data[0]; else return null;
}

function encode($string,$key) {
	$j=null;
	$hash=null;
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string,$i,1));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
    }
    return $hash;
}

function decode($string,$key) {
	$j=null;
	$hash=null;
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i+=2) {
        $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    return $hash;
}function image_resize(array $file, $width, $height ,$path){
	/* Get original image x y*/
	list($w, $h) = getimagesize($file['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	//$path = '../gallery/products/thumb/'.$_FILES['image']['name'];
	/* read binary data from image file */
	$imgString = file_get_contents($file['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagealphablending($tmp, false);
	$transparency = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
	imagefill($tmp, 0, 0, $transparency);
	imagesavealpha($tmp, true);
	imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
	/* Save image */
	switch ($file['type']) {
	case 'image/jpeg':
		imagejpeg($tmp, $path, 100);
		break;
	case 'image/png':
		imagepng($tmp, $path, 0);
		break;
	case 'image/gif':
		imagegif($tmp, $path);
		break;
    default:
		exit;
		break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}


function me($setting){ 
	$connect=Database();
	isset($_SESSION['me_login'])?$me_login=$_SESSION['me_login'] : $me_login=null;
	if(!empty($me_login)){
		$query=mysqli_query($connect,"SELECT value FROM members_settings WHERE setting='$setting' AND member_id='$me_login';");
		$result=mysqli_fetch_assoc($query);
		$value=$result['value'];
	}else{
		$value=null;
	}
	return $value;
}
function country($attribute){
	if($_SESSION['currency_code']!=""){
		$currency_code=$_SESSION['currency_code'];
	}else{
		$currency_code=me('currency_code');
	}
	if($currency_code==""){
		$currency_code="usd";
	}
	$value=mysql_result(mysql_query("SELECT $attribute FROM country WHERE currency_code='$currency_code'"),0);
	return $value;
}
function currency($amount=0,$decimal=0){
	$connect=Database();
	isset($_SESSION['currency_code'])?$currency_code=$_SESSION['currency_code'] : $currency_code=me('currency_code');
	if(empty($currency_code)){
		$currency_code="usd";
	}
	if(empty($decimal)){
		if($currency_code=="usd"){
			$decimal=2;
		}else{
			$decimal=0;
		}
	}
	$query=mysqli_query($connect,"SELECT currency_symbol,currency_rate FROM country WHERE currency_code='$currency_code'");
	$result=mysqli_fetch_assoc($query);
	$symbol=$result['currency_symbol'];
	$value=$result['currency_rate']*$amount;
	return $symbol.number_format($value,$decimal);
}
function wordvar($wordvar){
	$connect=Database();
	isset($_SESSION['language_code'])?$language_code=$_SESSION['language_code'] : $language_code=me('language_code');
	if(empty($language_code)) $language_code="en";
	
	$query=mysqli_query($connect,"SELECT word FROM wordvars WHERE wordvar='$wordvar' AND language_code='$language_code'");
	if(mysqli_num_rows($query)>0){
		$result=mysqli_fetch_assoc($query);
		$word=$result['word'];
		return $word;
	}else{
		return $wordvar;
	}
}






//function get country new by pu 18/01/59
function getcountry($ipaddress){
	$connect=Database();
	
	$query = mysqli_query($connect,"select country_code from geoIP where '$ipaddress' between  ip_long_from and ip_long_to limit 0,1");
	$result = mysqli_fetch_object($query);
	
	return $result->country_code;
}
?>