<?php
session_start();

function checkUser()
{
	// if the session id is not set, redirect to login page
	if (!isset($_SESSION['admin_id'])) {
		header('Location: ' . WEB_ROOT . '../login.php');
		exit;
	}
	
	// the user want to logout
	if (isset($_GET['logout'])) {
		doLogout();
	}
	
}



function doLogin()
{
	require "include/config.php";

	// if we found an error save the error message in this variable
	$errorMessage = '';
	
	$userName = $_POST['txtUserName'];
	$password = $_POST['txtPassword'];
    
    $mdpass = md5($password);
	
	// first, make sure the username & password are not empty
	if ($userName == '') {
		$errorMessage = 'You must enter your username';
	} else if ($password == '') {
		$errorMessage = 'You must enter the password';
	} else {
		// check the database and see if the username and password combo do match

		$sql = "SELECT admin_id,admin_username 
				FROM admin
				WHERE admin_username = '$userName' AND admin_password = '$mdpass' and status = '1' ";
		$result = $dbCon->query($sql) or die($dbCon->error);
		if($result->num_rows == 1){
			$row = $result->fetch_assoc();
			$_SESSION['admin_id'] = $row['admin_id'];
			
			// log the time when the user last login
			$sql = $dbCon->query("UPDATE admin
			        SET  last_login = NOW() 
					WHERE admin_id = '{$row['admin_id']}'");

			// now that the user is verified we move on to the next page
            // if the user had been in the admin pages before we move to
			// the last page visited
			if (isset($_SESSION['login_return_url'])) {
				header('Location: ' . $_SESSION['login_return_url']);
				exit;
			} else {
				$_SESSION['admin_id'];
				header('Location: main');
				exit;
			}
		}else{
			$errorMessage = 'Wrong username or password';
		}		
			
	}
	return $errorMessage;
	
}

/*
	Logout a user
*/
function doLogout()
{
	if (isset($_SESSION['admin_id'])) {
		unset($_SESSION['admin_id']);
		session_unset('admin_id');
	}
		
	header('Location: login.php');
	exit;
}




?>