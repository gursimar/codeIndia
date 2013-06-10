<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';
//unlink("../../".mysql_result(mysql_query("select Faculty_Image_Path from Faculty_Details where Faculty_Id=".$_SESSION['facid']),0));
mysql_query("delete from Faculty_Details where Faculty_Id=".$_REQUEST['facid']);

header("Location: ../dashboard-faculty.php");
?>