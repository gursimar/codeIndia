<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';
$id=$_REQUEST['facid'];
$row=mysql_fetch_assoc(mysql_query("SELECT * from Faculty_Details where Faculty_Id=".$id));

?>
<div>
<form action="editfacultyaction.php" method="post">
<input type="hidden" name="id" value="<?php echo $_REQUEST['facid']; ?>"/>
<table border="0">
<tr><td>Name </td><td><input type="text" name="name" value="<?php echo $row['Faculty_Name']; ?>"/></td></tr>
<tr><td>Designation </td><td><input type="text" name="designation" value="<?php echo $row['Faculty_Designation']; ?>"/></td></tr>
<tr><td>Department</td><td><input type="text" name="department" value="<?php echo $row['Faculty_Department']; ?>"/></td></tr>
<tr><td>Contact</td><td><input type="text" name="contact" value="<?php echo $row['Faculty_Contact']; ?>"/></td></tr>
<tr><td><input type="submit" value="Save"</td></tr>
</table>
</form>
</div>

<div>
<a href="../upload/facultypicupdate.php?facid=<?php echo $_REQUEST['facid'];?>"><img src="../../<?php echo $row['Faculty_Image_Path'];?>" /></a>
</div>