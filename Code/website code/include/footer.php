<div id="footer" onmouseover="resetMenu();">
all rights reserved with <?php
$row=mysql_fetch_assoc(mysql_query("SELECT College_Title,College_Address_City,College_Address_State,College_Address_Pincode,College_Contact_No from College_Info"));
echo $row[College_Title].', '.$row[College_Address_City].', '.$row[College_Address_State].', Pincode:'.$row[College_Address_Pincode].', Phone:'.$row[College_Contact_No];
?>
</div>
<div id="banner" onmouseover="resetMenu();"><div id="bannerLogo"><img src="images/bannerLogo.jpg"/></div><div id="bannerDesc"><img src="images/ngoBanner.jpg"/></div><div id="bannerSocial"></div></div>