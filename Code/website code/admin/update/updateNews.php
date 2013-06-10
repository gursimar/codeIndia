<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';
date_default_timezone_set('Asia/Kolkata');
$title=$_POST['title'];
$content=$_POST['content'];
$time=date('Y-m-d', time());

$query="INSERT INTO `News_Update`( `News_Heading`, `News_Description`, `News_Date`) VALUES ('".$title."','".$content."','".$time."')";

if(!mysql_query($query))
{
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

header("Location: ../dashboard-news.php");
?>