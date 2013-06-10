<?php


define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';

if($_REQUEST[subcourse]!=null){
mysql_query("delete from Sub_Course where Course_Id=".$_REQUEST['course']." and Sub_Course_Title='".$_REQUEST['subcourse']."'");


}else{
mysql_query("delete from Course where Course_Id=".$_REQUEST['course']);
}

header("Location: ../dashboard-courses.php");
?>