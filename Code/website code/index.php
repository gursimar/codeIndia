<html>
<head>
<?php include 'include/indexHead.php'; ?>
</head>
<body onClick="resetMenu();">
<div id="container">
<?php include 'include/menuBar.php' ?>
<div id="slide">
<div id="images">
<?php
$result=mysql_query("SELECT * from Images where Location='slider' and Visibility='show'");
?>
<div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
            <?php 
while($row=mysql_fetch_assoc($result))
echo ' <img src="'.$row['Image_Path'].'" data-thumb="'.$row['Image_Path'].'" />';
?>
               
            </div>
            
        </div>
		</div>
</div>
<div id="news">
<?php include 'include/newsTicker.php';?>
</div>

<div id="main" onmouseover="resetMenu();">
<div id="home-msg">
<span id="msg-title">
<?php
$row=mysql_fetch_assoc(mysql_query("SELECT Homepage_Mainpane_Heading from College_Info"));
echo $row[Homepage_Mainpane_Heading];
?>
</span>
<?php
$row=mysql_fetch_assoc(mysql_query("SELECT Homepage_Mainpane_Content from College_Info"));
echo $row[Homepage_Mainpane_Content];
?>
</div>
</div>
<div id="null-space"></div>
<div id="updates" onmouseover="resetMenu();"><?php include 'include/externalLinks.php';?></div>
<?php include 'include/footer.php'; ?>
</div>
</body>
</html>