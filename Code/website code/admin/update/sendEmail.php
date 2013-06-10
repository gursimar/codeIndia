<?php
error_reporting(0);
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';
date_default_timezone_set('Asia/Kolkata');

function checkEmail($str)
{
	return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
}
function send_mail($from,$to,$subject,$body)
{
	$headers = '';
	$headers .= "From: $from\n";
	$headers .= "Reply-to: $from\n";
	$headers .= "Return-Path: $from\n";
	$headers .= "Message-ID: <" . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . ">\n";
	$headers .= "MIME-Version: 1.0\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "Date: " . date('r', time()) . "\n";

	mail($to,$subject,$body,$headers);
}

if(!checkEmail($_POST['recipientEmail']))
	{
		$err[]='Your registrant email is not valid!';
                header("Location: ../dashboard-email.php");
                exit;
	}

if(!count($err))
	{
	$subject=strtoupper($_POST['subject']);
	$registrant_email=strtolower($_POST['recipientEmail']);
        $content=$_POST['content'];
    mysql_query("INSERT INTO groupsong (registrant,registrant_email,registrant_mobile,college,participants,timestamp)
	VALUES ('".$registrant."','".$registrant_email."','".$registrant_mobile."','".$college."','".$participants."','".$timestamp."')");


send_mail('admin@cancercrycare.com',$registrant_email,$subject,'<html><body>'.$content.'</body></html>');
	header("Location: ../dashboard-email.php");
	}
?>