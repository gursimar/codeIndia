<?php

define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';

session_name('College_Administrator');
session_start();

date_default_timezone_set('Asia/Kolkata');
//if($_POST['submit']=='Login')
//{
$err = array();
if(!$_POST['user'] || !$_POST['password'])
	{
		
		$err[] = 'Empty Fields';
	}
	if(!count($err))
	{
	$_POST['user'] = mysql_real_escape_string($_POST['user']);
	$_POST['password'] = mysql_real_escape_string($_POST['password']);


$row = mysql_fetch_assoc(mysql_query("SELECT College_Title FROM College_Info WHERE Web_Admin='".$_POST['user']."' AND Web_Admin_Password='".md5($_POST['password'])."'"));
		
		if($row['College_Title'])
		{
                $_SESSION['College_Title'] = $row['College_Title'];

		}
		
		else $err[]="loginerror";
		
	}
	if($err)
	{
	header("Location: ../index.php?msg=$err[0]");
	}
	else
	{
             //$timestamp= date('d/m/Y h:i:s a', time());
            // mysql_query("UPDATE supervisors SET lastlogin='".$timestamp."' WHERE username='".$_POST['username']."'");
             header("Location: ../dashboard.php");
	}
   
//}
?>