<?php
 	session_start();
	include_once("config.php");
	global $App;

	
	if(!isset($_SESSION['user']) || !$_SESSION['user']->registrationID > 0 || $_SESSION['user']->userType != 'SA'){
		header("Location: index.php");
		exit;
	}
	
	
	if(isset($_GET['id']) && $_GET['id'] > 0)
	{

		// get candidate detail
		mysql_connect(HOST, USERNAME, PASSWORD);
		mysql_select_db(DBNAME);
		$query	= "select * from tblUser WHERE registrationID = ".$_GET['id'];
		$result = mysql_query($query);
		if($row = mysql_fetch_object($result)){
		
			// display detail
			include_once('candidate_detail_template.php');
		}
		else{
			echo '<div><span class="title2">No Candidate exists with this ID.</span></div>';
		}
		
	}
	else{
		echo '<div><span class="title2">No Candidate exists with this ID.</span></div>';
	}
 

?>
