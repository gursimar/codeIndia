<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';

mysql_query("update Faculty_Details set Faculty_Name='".$_REQUEST['name']."',Faculty_Designation='".$_REQUEST['designation']."',Faculty_Department='".$_REQUEST['department']."',Faculty_Contact='".$_REQUEST['contact']."' where Faculty_Id=".$_REQUEST['id']);

header("Location: ../dashboard-faculty.php");
?>