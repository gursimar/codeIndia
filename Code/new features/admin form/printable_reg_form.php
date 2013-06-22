<?php
 	session_start();
	include_once("config.php");
	global $App;

		
	if(isset($_GET['regNo']) && $_GET['regNo'] > 0){
		// get user info
		mysql_connect(HOST, USERNAME, PASSWORD);
		mysql_select_db(DBNAME);
		$query	= "select * from tblUser WHERE registrationID = ".$_GET['regNo'];
		$result = mysql_query($query);
		
		$row = mysql_fetch_object($result);
		
		// include login form
		require_once("printable_reg_form_template.php");	
	}

 
 


?>
