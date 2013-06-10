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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
var map;
function initialize() {
  var mapOptions = {
    zoom: 17,
    center: new google.maps.LatLng(<?php
$row=mysql_fetch_assoc(mysql_query('SELECT College_Latitude from College_Info'));
echo $row[College_Latitude];
?>, <?php
$row=mysql_fetch_assoc(mysql_query('SELECT College_Longitude from College_Info'));
echo $row[College_Longitude];
?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
<body>
<div id="container">
<?php include 'include/adminHeader.php';?>
<div id="workarea">
<?php include 'include/contactLeftNav.php';?>
<div id="rightPane">
<?php
$row=mysql_fetch_assoc(mysql_query('SELECT * from College_Info'));

?>
<div id="rightHead">CONTACT US<span><?php $row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info")); echo $row['College_Domain'];?>/contact.php</span></div>
<div id="rightSubHead">Last Updated:</div>
<div id="rightText">College Mailing Address:
<div id="textMain">
<form action="update/updateContact.php" method="post">
<table id="contactForm">
<tr>
<td>State:</td><td><input type="text" name="state" value="<?php echo $row['College_Address_State']?>"/></td>
</tr>
<tr>
<td>City:</td><td><input type="text" name="city" value="<?php echo $row['College_Address_City']?>"/></td>
</tr>
<tr>
<td>Pincode:</td><td><input type="text" name="pincode" value="<?php echo $row['College_Address_Pincode']?>"/></td>
</tr>
<tr>
<td>Email:</td><td><input type="text" name="email" value="<?php echo $row['College_Contact_Email']?>"/></td>
</tr>
<tr>
<td>Phone:</td><td><input type="text" name="phone" value="<?php echo $row['College_Contact_No']?>"/></td>
</tr>
<tr>
<td>Fax:</td><td><input type="text" name="fax" value="<?php echo $row['College_Contact_Fax']?>"/></td>
</tr>
<tr>
<td>Facebook:</td><td><input type="text" name="college_facebook" value="<?php echo $row['College_Facebook']?>"/></td>
</tr>
<tr>
<td>Twitter:</td><td><input type="text" name="college_twitter" value="<?php echo $row['College_Twitter']?>"/></td>
</tr>
<tr>
<td>Latitude:</td><td><input type="text" name="college_latitude" value="<?php echo $row['College_Latitude']?>"/></td>
</tr>
<tr>
<td>Longitude:</td><td><input type="text" name="college_longitude" value="<?php echo $row['College_Longitude']?>"/></td>
</tr>
<tr>
<td></td><td><center><a href="http://itouchmap.com/latlong.html" target="_blank" style="font-size:10px;">Click here for Geolocation Help</a></center></td>
</tr>
<tr>
<td colspan=2><center><input type="submit" value="UPDATE"/></center></td>
</tr>
</table>
</form>
<div id="contactDetails">
<div id="contactCollegeTitle"><strong><?php
$row=mysql_fetch_assoc(mysql_query("SELECT College_Title from College_Info"));
echo $row[College_Title];?></strong></div>
<div id="contactMailingAddress">
<strong>Mailing Address:</strong><br/>
<?php
$row=mysql_fetch_assoc(mysql_query("SELECT College_Title,College_Address_City,College_Address_State,College_Address_Pincode from College_Info"));
echo $row[College_Title].'<br/>'.$row[College_Address_City].',<br/>'.$row[College_Address_State].',<br/>Pincode:'.$row[College_Address_Pincode].'<br/>India';
?>
</div>
<div id="contactEmail"><strong>Email:</strong> <?php
$row=mysql_fetch_assoc(mysql_query("SELECT College_Contact_Email from College_Info"));
echo $row[College_Contact_Email];?></div>
<div id="contactNo"><strong>Phone:</strong> <?php
$row=mysql_fetch_assoc(mysql_query("SELECT College_Contact_No from College_Info"));
echo $row[College_Contact_No];?></div>
<div id="contactFax"><strong>Fax:</strong> <?php
$row=mysql_fetch_assoc(mysql_query("SELECT College_Contact_Fax from College_Info"));
echo $row[College_Contact_Fax];?></div>
<div id="collegeSocialLinks"><strong> <a href="<?php echo $row['College_Facebook'];?>">Facebook</a> </strong> <strong> <a href="<?php echo $row['College_Twitter'];?>">Twitter</a> </strong></div>
</div>
<div id="contactMap"><div id="map-canvas"></div></div>
</div>
</div>

</div>
</div>
</div>
</body>
</html>