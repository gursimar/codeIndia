<?php

define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';

session_name('College_Administrator');
session_start();
if (!isset($_SESSION['College_Title']))
{
header("Location: ../index.php");
	exit;
}

date_default_timezone_set('Asia/Kolkata');

$err = array();
if(!$_POST['currentPassword'] || !$_POST['newPassword']|| !$_POST['renewPassword'])
	{
		
		$err[] = 'Empty Fields';
	}
	if(!count($err))
	{
	$_POST['currentPassword'] = mysql_real_escape_string($_POST['currentPassword']);
	$_POST['newPassword'] = mysql_real_escape_string($_POST['newPassword']);
	$_POST['renewPassword'] = mysql_real_escape_string($_POST['renewPassword']);

$row = mysql_fetch_assoc(mysql_query("SELECT College_Title FROM College_Info WHERE Web_Admin_Password='".md5($_POST['currentPassword'])."'"));
		
                if($row['College_Title'])
		{
                if($_POST['newPassword']!=$_POST['renewPassword'])
		{
                $err[]="passwordMismatch";
		}
		}
                else $err[]="loginerror";
	
		
	}
	if($err)
	{
	header("Location: ../dashboard.php?msg=$err[0]");
	}
	else
	{
           $newPass=md5($_POST['renewPassword']);
             //$timestamp= date('d/m/Y h:i:s a', time());
             mysql_query("UPDATE College_Info SET Web_Admin_Password='".$newPass."' WHERE College_Title='".$_SESSION['College_Title']."'");
             header("Location: ../dashboard.php?msg=passwordChanged");
	}
   
//}
?>