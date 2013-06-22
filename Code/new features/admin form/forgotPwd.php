<?php
 	session_start();
	include_once("config.php");
	global $App;

	// include header
 	require_once("header.php");
	//echo "in account"; exit;
	
	
	if(isset($_POST) && (isset($_POST['txtUserName']) || isset($_POST['txtName']))){
		// authenticate regno
		mysql_connect(HOST, USERNAME, PASSWORD);
		mysql_select_db(DBNAME);
		
		if($_POST['txtUserName'] != "")
			$query	= "select * from tblUser WHERE registrationID = '".$_POST['txtUserName']."'";
		else{
			$query	= "select * from tblUser WHERE name = '".$_POST['txtName']."' AND dob = '".date("Y-m-d", strtotime($_POST['txtDOB']))."'";
		}
		
		//echo $query; exit;
		$result = mysql_query($query);

		if(mysql_num_rows($result) > 0){
			$row = mysql_fetch_object($result);
			$txt = "Your Account Password is - $row->password";

			// send password in mail
			if($row->emailID){
				$headers = 'From: '.$App['from_email'] . "\r\n";
				mail($row->emailID,$App['site_name']." - Account Password",$txt, $headers);
			}

			// show msg
			//$msg = "Your account password has been mailed to youe email ID";
			$msg = $txt;
			
		}
		else{
			$msg = "Registration No. or Name / DOB does not exists";
		}

	}

 
 // include login form
 require_once("forgotPwd_form.php");

 // include footer
 require_once("footer.php"); 

?>
