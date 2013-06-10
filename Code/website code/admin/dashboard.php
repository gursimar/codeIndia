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
<?php include 'include/dashboardLeftNav.php';?>
<div id="rightPane">
<div id="rightHead">GENERAL INFORMATION<span><?php $row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info")); echo $row['College_Domain'];?></span></div>
<div id="rightSubHead">Last Updated:</div>
<div id="genCollegeTitle">
<div id="dashboardTable">
<table>
<form method="post" action="update/updateDashboard.php">
<input type="hidden" name="updateDashboard" value="true"/>
<tr>
<?php
$row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info"));


?>
<td>Enter your College Name:</td><td><input type="text" name="collegeTitle" value="<?php echo $row['College_Title'];?>" required/></td><td><select name="fontSize"><?php for($i=18;$i<50;$i=$i+3){ echo'<option ';
if($row['College_Title_Font_Size']==$i) echo "selected";
echo '>'.$i.'</option>'; } ?></select></td>
</tr>
<tr>
<td>Enter your College Subtitle:</td><td colspan="2"><input type="text" name="collegeSubTitle" value="<?php echo $row['College_Sub_Title'];?>" /></td>
</tr>
<tr>
<td>Web Administrator Name:</td><td colspan="2"><input type="text" name="webAdmin" value="<?php echo $row['Web_Admin'];?>"/></td>
</tr>
<tr>
<td>Web Administrator Email:</td><td colspan="2"><input type="text" name="webEmail" value="<?php echo $row['Web_Admin_Email'];?>"/></td>
</tr>
<tr>
<td>Enter Your College Domain:</td><td colspan="2"><input type="text" name="collegeDomain" value="<?php echo $row['College_Domain'];?>"/></td>
</tr>
<tr>
<td>Select Website Theme:</td>
<td colspan="2">
<div id="theme-db281c" onclick="selectTheme('db281c');"></div>
<div id="theme-0f68ac" onclick="selectTheme('0f68ac');"></div>
<div id="theme-70b135" onclick="selectTheme('70b135');"></div>
<div id="theme-880634" onclick="selectTheme('880634');"></div>
<div id="theme-8f8f8f" onclick="selectTheme('8f8f8f');"></div>
<input id="theme" name="theme" type="hidden" value="<?php  echo $row['Theme'];?>"/>
</td>
<script>
function selectTheme(x){
var themeColor=x;
document.getElementById('theme').value=themeColor;
}
</script>
</tr>
<tr>
<td></td><td colspan="2"><input type="submit" value="Update"/></td>
</tr>
</form>
</table>
</div>
<div id="changeLogo">
<center>COLLEGE LOGO</center>
<div id="logoPreview"><img src="../<?php echo $row['Logo_Path'] ?>"/></div>
<form action="upload/logoupload.php"  name="photo" enctype="multipart/form-data"  method="post">
<input type="file" name="image" size="30" /><input type="submit" name="upload" value="Upload" />
	</form>
</div>
<div id="previewTitle">College Banner Preview:</div>
<div id="preview">
<div id="logo"><img src="../<?php echo $row['Logo_Path']?>"/></div>
<div id="title">
<div id="college" style="font-size:<?php echo $row['College_Title_Font_Size']; ?>"><?php
$row=mysql_fetch_assoc(mysql_query("SELECT College_Title from College_Info"));
echo $row[College_Title];
?></div>
<div id="affiliation"><?php
$row=mysql_fetch_assoc(mysql_query("SELECT College_Sub_Title from College_Info"));
echo $row[College_Sub_Title];
?></div>
</div>
</div>
<div id="changePasswordTitle">Change Web Administrator's Password:</div>
<div id="changePassword">
<table>
<form method="post" action="update/update_password.php">
<tr>
<td>Current Password:</td><td><input type="text" name="currentPassword" placeholder="Current Password"/></td>
</tr>
<tr>
<td>Enter New Password:</td><td><input type="text" name="newPassword" placeholder="New Password"/></td>
</tr>
<tr>
<td>Re-Enter New Password:</td><td><input type="text" name="renewPassword" placeholder="Re-Enter New Password"/></td>
</tr>
<tr>
<td></td><td><input type="submit" value="Change Password"/></td>
</tr>
</form>
</table>
</div>
<div id="prospectus">
Upload College Prospectus:
<form method="post" action="update/addProspectus.php" enctype="multipart/form-data">
<div id="uploadProspectus"><table><tr><td>Select Prospectus:</td><td><input type="file" name="file" /></td><td><input type="submit" value="Upload Prospectus"/></tr></table></div>
</div>

</div>
</div>
</div>
</div>
</body>
</html>