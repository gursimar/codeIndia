<?php 
$row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info"));?>
<div id="logo" onmouseover="resetMenu();" onclick="window.location.href='index.php';"><img src="<?php echo $row['Logo_Path'];?>"/></div>
<div id="title" onmouseover="resetMenu();">
<div id="college" style="font-size:<?php
echo $row['College_Title_Font_Size']; ?>">
<?php
echo $row[College_Title];
?>
</div>
<div id="affiliation">
<?php
echo $row[College_Sub_Title];
?>
</div>
</div>
<div id="menu-top">
<div id="menu-button" onClick="window.location.href='index.php';">HOME</div>
<div id="menu-button" onmouseover="resetMenu();document.getElementById('about').style.display='block';">ABOUT US
<div id="about">
<div id="list" onClick="window.location.href='history.php';">History</div>
<div id="list" onClick="window.location.href='mission.php';">Mission/Vision</div>
<div id="list" onClick="window.location.href='infrastructure.php';">Infrastructure</div>
<div id="list" onClick="window.location.href='societies.php';">Societies</div>
<div id="list" onClick="window.location.href='imageGallery.php';">Image Gallery</div>
</div>
</div>
<div id="menu-button" onmouseover="resetMenu();document.getElementById('academics').style.display='block';">ACADEMICS
<div id="academics">
<div id="list" onClick="window.location.href='courses.php';">Courses</div>
<div id="list" onClick="window.location.href='admissionRules.php';">Admission Rules</div>
<div id="list" onClick="window.location.href='achieverGallery.php';">Achiever's Gallery</div>
<div id="list" onClick="window.location.href='<?php echo $row[Prospectus_Link]; ?>';">Download Prospectus</div>
</div>
</div>
<div id="menu-button" onmouseover="resetMenu();document.getElementById('faculty').style.display='none';" onClick="window.location.href='faculty.php';">FACULTY
<div id="faculty">
<div id="list">Link 1</div>
<div id="list">Link 2</div>
<div id="list">Link 3</div>
</div>
</div>
<div id="menu-buttonL" onClick="window.location.href='contact.php';">CONTACT US</div>
</div>