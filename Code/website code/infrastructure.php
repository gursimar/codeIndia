<html>
<head>
<?php include 'include/indexHead.php'; ?>
</head>
<body onClick="resetMenu();">
<div id="container">
<?php include 'include/menuBar.php' ?>
<div id="content">
<div id="aboutHeading">Infrastructure</div>
<div id="aboutDetails"><?php
$row=mysql_fetch_assoc(mysql_query("SELECT Infrastructure from College_Info"));
echo $row[Infrastructure];
?></div>
<div id="aboutPhotos">
<img src=""/>
<img src=""/>
</div>
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