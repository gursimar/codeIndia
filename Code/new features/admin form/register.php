<?php
 	session_start();
	include_once("config.php");
	global $App;

	// include header
 	require_once("header.php");
	
		
	if(isset($_POST) && isset($_POST['optPostAppliedFor'])){
		// save user info , register user & send mail with registration_no & password
		
		$link = mysql_connect(HOST, USERNAME, PASSWORD);
		mysql_select_db(DBNAME);

		$password					= createRandomPassword();
		$postAppliedFor				= $_POST['optPostAppliedFor'];
		$name						= stripslashes(trim($_POST['txtName']));
		$fatherName					= stripslashes(trim($_POST['txtFName']));
		$dob						= date("Y-m-d", strtotime($_POST['txtDOB']));
		$gender						= $_POST['rdoGender'];
		$category					= $_POST['optCategory'];
		$address					= stripslashes(trim($_POST['txtAddress']));
		$city						= stripslashes(trim($_POST['txtCity']));
		$state						= stripslashes(trim($_POST['txtState']));
		$mobile						= trim($_POST['txtMobile']);
		$emailID					= trim($_POST['txtEmailID']);
		$punjabDomicile				= $_POST['rdoPDomicile'];
		$punjabiInMatric			= $_POST['rdoPMetric'];
		$punjabiInMatricPercent		= trim($_POST['txtPMetricPercent']);
		$pubjabiInEquivalent		= $_POST['rdoPEquivalent'];
		$experienceFrom				= stripslashes(trim($_POST['txtExpFrom']));
		$experienceDuration			= stripslashes(trim($_POST['txtExpDuration']));
		$compCourse					= stripslashes(trim($_POST['txtCompCourseName']));
		$compInstitute				= stripslashes(trim($_POST['txtCompCourseInstitute']));
		$compDuration				= stripslashes(trim($_POST['CompCourseDuration']));
		$ruralFlag					= $_POST['rdoRural'];
		$guiltyFlag					= $_POST['rdoGuilty'];
		$examName1					= stripslashes(trim($_POST['txtExamName1']));
		$examName2					= stripslashes(trim($_POST['txtExamName2']));
		$examName3					= stripslashes(trim($_POST['txtExamName3']));
		$boardName1					= stripslashes(trim($_POST['txtBoard1']));
		$boardName2					= stripslashes(trim($_POST['txtBoard2']));
		$boardName3					= stripslashes(trim($_POST['txtBoard3']));
		$passingYear1				= stripslashes(trim($_POST['txtPassingYr1']));
		$passingYear2				= stripslashes(trim($_POST['txtPassingYr2']));
		$passingYear3				= stripslashes(trim($_POST['txtPassingYr3']));
		$marks1						= trim($_POST['txtMarks1']);
		$marks2						= trim($_POST['txtMarks2']);
		$marks3						= trim($_POST['txtMarks3']);
		$totalMarks1				= stripslashes(trim($_POST['txtTotalMarks1']));
		$totalMarks2				= stripslashes(trim($_POST['txtTotalMarks2']));
		$totalMarks3				= stripslashes(trim($_POST['txtTotalMarks3']));
		$employer1					= stripslashes(trim($_POST['txtEmployer1']));
		$employer2					= stripslashes(trim($_POST['txtEmployer2']));
		$employer3					= stripslashes(trim($_POST['txtEmployer3']));
		$empPeriod1					= stripslashes(trim($_POST['txtEmpPeriod1']));
		$empPeriod2					= stripslashes(trim($_POST['txtEmpPeriod2']));
		$empPeriod3					= stripslashes(trim($_POST['txtEmpPeriod3']));
		$empDuties1					= stripslashes(trim($_POST['txtEmpDuties1']));
		$empDuties2					= stripslashes(trim($_POST['txtEmpDuties2']));
		$empDuties3					= stripslashes(trim($_POST['txtEmpDuties3']));
		$ddNo						= stripslashes(trim($_POST['txtDD']));
		$ddDate						= trim($_POST['txtDDDate']);
		$ddAmount					= trim($_POST['txtDDAmount']);
		$ddBank						= stripslashes(trim($_POST['txtDDBank']));
		$userType					= 'GEN';
		$dateCreated				= date("Y-m-d H:i:s");
		$admitcardIssued			= 0;
		$status						= 1;
		


		$query	= "INSERT INTO tblUser VALUES ('','$password', '$postAppliedFor', '$name', '$fatherName', '$dob', '$gender', '$category', '$address', '$city', '$state', '$mobile', '$emailID', '$punjabDomicile', '$punjabiInMatric', '$punjabiInMatricPercent', '$pubjabiInEquivalent', '$experienceFrom', '$experienceDuration', '$compCourse', '$compInstitute', '$compDuration', '$ruralFlag', '$guiltyFlag', '$examName1', '$examName2', '$examName3', '$boardName1', '$boardName2', '$boardName3', '$passingYear1', '$passingYear2', '$passingYear3', '$marks1', '$marks2', '$marks3', '$totalMarks1', '$totalMarks2', '$totalMarks3', '$employer1', '$employer2', '$employer3', '$empPeriod1', '$empPeriod2', '$empPeriod3', '$empDuties1', '$empDuties2', '$empDuties3', '$ddNo', '$ddDate', '$ddAmount', '$ddBank', '$userType', '$dateCreated', '$admitcardIssued', '$status')";
		//echo $query; exit;
		$result = mysql_query($query);
		//mysql_free_result($result);
		$regNo	= mysql_insert_id($link);

		## send mail
		if($emailID != ""){
			$txt = "You have registered to ".$App['site_name'].". Login Detail is - Username : ".$regNo." and Password : ".$password;
			$headers = 'From: '.$App['from_email'] . "\r\n";
    		mail($emailID,$App['site_name']." - Login Detail",$txt, $headers);
		}

		$msg = "You have been registered. Your registration Number is <strong>".$regNo."</strong> & Password is <strong>".$password."</strong><br />Kindly, note it down for future reference.  Plz Send Your Demand Draft at The Earliest, Once We received it your Admit card will automatically get generated in your login.";
		
}

 
 // include login form
 require_once("registration_form.php");

 // include footer
 require_once("footer.php"); 

/***************************************************************************************************/
/* function to return random password
/* The letter l (lowercase L) and the number 1
/* have been removed, as they can be mistaken
/* for each other.
/***************************************************************************************************/
function createRandomPassword(){
	$chars = "abcdefghijkmnopqrstuvwxyz023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
		while ($i <= 7) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
	  }
	return $pass;
}

?>
