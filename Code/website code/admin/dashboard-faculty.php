<?php 
define('REGISTER_INCLUDE_CHECK',true);
require '../include/connect.php';
session_name('College_Administrator');
session_start();
if (!isset($_SESSION['College_Title']))
{
header("Location: index.php");
	exit;
}
date_default_timezone_set('Asia/Kolkata');
if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location: index.php");
	exit;
}
?>
<html>
<?php include 'include/dashboardHead.php';?>
<body>
<div id="container">
<?php include 'include/adminHeader.php';?>
<div id="workarea">
<?php include 'include/facultyLeftNav.php';?>
<div id="rightPane">
<div id="rightHead">FACULTY<span><?php $row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info")); echo $row['College_Domain'];?>/faculty.php</span></div>
<div id="rightSubHead">Last Updated:</div>
<div id="FacultyPane">
<span>ADD FACULTY</span>
<div id="addFaculty">
<div id="faculty_Upload">

</div>
<div id="faculty_Desc">
<strong>ADD DETAILS</strong>
<form action="upload/addfacultyimage.php"  method="post" >
<table>
<tr>
<td>NAME:</td><td><input type="text" name="facname" required/></td>
</tr>
<tr>
<td>Designation:</td><td><input type="text" name="facdes" required/></td>
</tr>
<tr>
<td>Department:</td><td><input type="text" name="facdept" required/></td>
</tr>
<tr>
<td>Contact:</td><td><input type="text" name="faccontact"/></td>
</tr>
<tr>
<td></td><td><center><input type="submit" value="ADD FACULTY"/></center></td>
</tr>
</table>
</form>
</div>
<div id="faculty_preview">
<center>LAST FACULTY ADDED</center>
<?php
$result=mysql_query("SELECT Faculty_Name,Faculty_Designation,Faculty_Department,Faculty_Contact,Faculty_Image_Path from Faculty_Details ORDER BY Faculty_Id DESC");
$row=mysql_fetch_assoc($result);
echo '
<div id="faculty-list">
<div id="faculty-photo"><img height="100px" width="100px" src="../'.$row[Faculty_Image_Path].'"/></div>
<div id="faculty-details">
<div id="faculty-name"><strong>'.$row[Faculty_Name].'</strong></div>
<div id="faculty-text">'.$row[Faculty_Designation].'</div>
<div id="faculty-text">'.$row[Faculty_Department].'</div>
<div id="faculty-text">'.$row[Faculty_Contact].'</div>
</div>
</div>';
?>
</div>
</div>
<span>EDIT/REMOVE FACULTY</span>
<div id="editFacultyArea">
<div id="facultyList">
<?php
$result=mysql_query("SELECT * from Faculty_Details");

while($row=mysql_fetch_assoc($result)){
echo '<form action="update/editfaculty.php" method="post"/>
<div id="faculty-list">
<div id="faculty-photo"><img height="100px" width="100px" src="../'.$row[Faculty_Image_Path].'"/></div>
<div id="faculty-details">
<input name="facid" type="hidden" value="'.$row[Faculty_Id].'"/>
<div id="faculty-name"><strong>'.$row[Faculty_Name].'</strong></div>
<div id="faculty-text">'.$row[Faculty_Designation].'</div>
<div id="faculty-text">'.$row[Faculty_Department].'</div>
<div id="faculty-text"><center><input type="submit" value="EDIT" name="submit"/><a href="update/deletefaculty.php?facid='.$row[Faculty_Id].'"><button type=button>DELETE</button></a></center></div>
</div>
</div></form>';
}
?>
</div>
<!--<div id="facultypageFooter">
PREVIOUS NEXT
</div>-->


</div>
</div>
</div>
</div>
</div>
</body>
</html>