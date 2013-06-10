<html>
<head>
<?php include 'include/indexHead.php'; ?>

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
</head>
<body onClick="resetMenu();">
<div id="container">
<?php include 'include/menuBar.php' ?>
<div id="content">
<div id="contactHeading">Contact Us</div>
<div id="contactDetails">
<div id="contactCollegeTitle"><strong><?php
$row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info"));
echo $row[College_Title];?></strong></div>
<div id="contactMailingAddress">
<strong>Mailing Address:</strong><br/>
<?php

echo $row[College_Title].'<br/>'.$row[College_Address_City].',<br/>'.$row[College_Address_State].',<br/>Pincode:'.$row[College_Address_Pincode].'<br/>India';
?>
</div>
<div id="contactEmail"><strong>Email:</strong> <?php
echo $row[College_Contact_Email];?></div>
<div id="contactNo"><strong>Phone:</strong> <?php
echo $row[College_Contact_No];?></div>
<div id="contactFax"><strong>Fax:</strong> <?php
echo $row[College_Contact_Fax];?></div>
<div id="collegeSocialLinks"><strong> <a href="<?php echo $row['College_Facebook'];?>">Facebook</a> </strong> <strong> <a href="<?php echo $row['College_Twitter'];?>">Twitter</a> </strong></div>
</div>
<div id="contactMap"><div id="map-canvas"></div></div>
</div>

<div id="content-right">
<div id="news"><?php include 'include/newsTicker.php';?></div>
<div id="null-space"></div>
<div id="updates"><?php include 'include/externalLinks.php';?></div>
</div>
<?php include 'include/footer.php'; ?>
</div>
</body>
</html>