<?php
 	session_start();
	include_once("config.php");
	global $App;

	
	if(!isset($_SESSION['user']) || !$_SESSION['user']->registrationID > 0 || $_SESSION['user']->userType != 'SA'){
		header("Location: index.php");
		exit;
	}
	
	//echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
	if(isset($_POST['chk_issue']) && is_array($_POST['chk_issue']) && count($_POST['chk_issue']) > 0)
	{

		// get candidate detail
		mysql_connect(HOST, USERNAME, PASSWORD);
		mysql_select_db(DBNAME);

		foreach($_POST['chk_issue'] as $regID){
			// set admitcardIssued =1
			$query	= "UPDATE tblUser SET admitcardIssued = 1 WHERE registrationID = ".$regID;
			$result = mysql_query($query);

			// get candidate's emailID
			$query	= "SELECT emailID FROM tblUser WHERE registrationID = ".$regID;
			//echo $query; exit;
			$result1 = mysql_query($query);
			$row = mysql_fetch_object($result1);

			// send mail
			//echo $row->emailID; exit;
			if($row->emailID){
				$txt = "Your admit card has been issued.";
				$headers = 'From: '.$App['from_email'] . "\r\n";
				mail($row->emailID,$App['site_name']." - Admit Card",$txt, $headers);
			}
		}
		
		header("Location: candidateList.php?issued=0&msg=1");
		exit;
		
	}
	else{
		header("Location: candidateList.php?issued=0&msg=2");
		exit;		
		//echo '<div><span class="title2">No Candidate selected.</span></div>';
	}
 

?>
