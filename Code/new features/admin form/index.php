<?php
 	session_start();
	include_once("config.php");
	global $App;

		
	if(isset($_SESSION['user']) && $_SESSION['user']->registrationID > 0){
		// user is already logged in
		$redirectUrl = "account.php";
			
		header("Location: {$redirectUrl}");
		exit;
	}

	
	
	if(isset($_POST) && isset($_POST['txtUserName'])){
		//echo 'in'; exit;
		// authenticate user
		mysql_connect(HOST, USERNAME, PASSWORD);
		mysql_select_db(DBNAME);
		$query	= "select * from tblUser WHERE registrationID = '".$_POST['txtUserName']."' AND password = '".$_POST['txtPassword']."'";
		$result = mysql_query($query);
		
		$row = mysql_fetch_object($result);
		$user	= $row;
		//mysql_free_result($result);
		
		if($user){
			// start session & keep user info in session
			//session_start();
			$_SESSION['user'] = $user;
			
			echo "hello";
		}
		else{
			echo ("Invalid Username or Password");
		}
	}

// include header
 	require_once("header.php");
 
 // include login form
 require_once("login_form.php");

 // include footer
 require_once("footer.php"); 

?>
