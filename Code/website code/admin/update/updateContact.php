<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';


$phone=$_POST['phone'];
$city=$_POST['city'];
$state=$_POST['state'];
$fax=$_POST['fax'];
$email=$_POST['email'];
$pincode=$_POST['pincode'];
$facebook=$_POST['college_facebook'];
$twitter=$_POST['college_twitter'];
$latitude=$_POST['college_latitude'];
$longitude=$_POST['college_longitude'];

$result = mysql_query("select * from College_Info");
if (mysql_num_rows($result) == 0) {
$query="INSERT INTO `College_Info`( `College_Contact_Fax`, `College_Contact_Email`, `College_Contact_No`, `College_Address_State`, `College_Address_City`, `College_Address_Pincode`, `College_Facebook`, `College_Twitter`, `College_Latitude`, `College_Longitude`) VALUES ('".$fax."','".$email."','".$phone."','".$state."','".$city."','".$pincode."','".$facebook."','".$twitter."','".$latitude."','".$longitude."')";
}else{
$query="UPDATE College_Info SET College_Contact_Fax='".$fax."',College_Contact_Email='".$email."',College_Contact_No='".$phone."',College_Address_State='".$state."',College_Address_City='".$city."',College_Facebook='".$facebook."',College_Twitter='".$twitter."',College_Latitude='".$latitude."',College_Longitude='".$longitude."',College_Address_Pincode=".$pincode;
}
if(!mysql_query($query))
{
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

header("Location: ../dashboard-contact.php");
?>