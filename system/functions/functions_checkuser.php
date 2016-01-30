<?php
//session_start();

function checkUser()
{
	// if the session id is not set, redirect to login page
	if (!isset($_SESSION['member_id'])) {
		header('Location: ' . WEB_ROOT . '../../login');
		exit;
	}
	
	// the user want to logout
	if (isset($_GET['logout'])) {
		doLogout();
	}
	
}



function doLogin()
{
	require "@backend/include/config.php";

	// if we found an error save the error message in this variable
	$errorMessage = '';
	
	$userName = $_POST['txtUserName'];
	$password = $_POST['txtPassword'];
    
    $mdpass = md5($password);
	
	// first, make sure the username & password are not empty
	if ($userName == '') {
		$errorMessage = 'กรุณากรอกชื่อผู้ใช่งาน';
	} else if ($password == '') {
		$errorMessage = 'กรุณากรอกรหัสผ่าน';
	} else {
		// check the database and see if the username and password combo do match

		$sql = "SELECT member_id,member_username 
				FROM member_register
				WHERE member_username = '$userName' AND member_pass = '$mdpass' and status_active = '1' ";
		$result = $dbCon->query($sql) or die($dbCon->error);
		if($result->num_rows == 1){
			$row = $result->fetch_assoc();
			$_SESSION['member_id'] = $row['member_id'];
			
			// log the time when the user last login
			$sql = $dbCon->query("UPDATE member_register
			        SET user_last_login = NOW() 
					WHERE member_id = '{$row['member_id']}'");

			// now that the user is verified we move on to the next page
            // if the user had been in the admin pages before we move to
			// the last page visited
			if (isset($_SESSION['login_return_url'])) {
				header('Location: ' . $_SESSION['login_return_url']);
				exit;
			} else {
				//print $_SESSION['member_id'];
				header('Location: myaccount');
				exit;
			}
		}else{
			$errorMessage = 'ชื่อผู้ใช้และรหัสผ่านผิด';
		}		
			
	}
	return $errorMessage;
	
}

/*
	Logout a user
*/
function doLogout()
{
	if (isset($_SESSION['member_id'])) {
		unset($_SESSION['member_id']);
		session_unset('member_id');
	}
		
	header('Location: login');
	exit;
}




?>