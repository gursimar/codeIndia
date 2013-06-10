<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';
session_start();

$noOfSubcourses=0;
if(!empty($_REQUEST['noOfSubcourses'])){
$noOfSubcourses=$_REQUEST['noOfSubcourses'];
}
$result = mysql_query("select * from Course where Course_Title='".$_REQUEST['course_title']."'");
if (mysql_num_rows($result) == 0) {
$query="insert into Course(Course_Title,Course_Description) values('".$_REQUEST['course_title']."','".$_REQUEST['description']."')";

mysql_query($query);

$courseid=mysql_insert_id();
}else{
$row=mysql_fetch_assoc($result);
$courseid=$row['Course_Id'];
}

if($noOfSubcourses>0){
for($i=0;$i<$noOfSubcourses;$i++){
$query="insert into Sub_Course(Course_Id,Sub_Course_Title) values('".$courseid."','".$_REQUEST['subcourse'][$i]."')";
mysql_query($query);
}
}

header('Location: ../dashboard-courses.php');

?>