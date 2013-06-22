<?php
 	session_start();
	include_once("config.php");
	global $App;

	// include header
 	require_once("header.php");
	//echo "in account"; exit;
	
	if(!isset($_SESSION['user']) || !$_SESSION['user']->registrationID > 0){
		header("Location: index.php");
		exit;
	}
	
	
 
 // include login form
 require_once("account_template.php");

 // include footer
 require_once("footer.php"); 

?>
