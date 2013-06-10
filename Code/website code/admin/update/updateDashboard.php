<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';


$collegeTitle=$_POST['collegeTitle'];
$collegeSubTitle=$_POST['collegeSubTitle'];
$webAdmin=$_POST['webAdmin'];
$webAdminEmail=$_POST['webEmail'];
$fontSize=$_POST['fontSize'];
$themeColor=$_POST['theme'];
$domain=$_POST['collegeDomain'];
$result = mysql_query("select * from College_Info");
if (mysql_num_rows($result) == 0) {
$query="insert into College_Info(College_Title,College_Title_Font_Size,College_Sub_Title,Web_Admin,Web_Admin_Email,Theme,College_Domain) values('".$collegeTitle."','".$fontSize."','".$collegeSubTitle."','".$webAdmin."','".$webAdminEmail."','".$themeColor."','".$domain."')";
}else{
$query="UPDATE College_Info SET College_Title='".$collegeTitle."',College_Sub_Title='".$collegeSubTitle."',Web_Admin='".$webAdmin."',Web_Admin_Email='".$webAdminEmail."',College_Title_Font_Size='".$fontSize."',Theme='".$themeColor."',College_Domain='".$domain."'";
}
if(!mysql_query($query))
{
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}
header("Location: ../dashboard.php");
?>