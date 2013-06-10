<html>
<head>
<?php include 'include/indexHead.php'; ?>
</head>
<body onClick="resetMenu();">
<div id="container">
<?php include 'include/menuBar.php' ?>
<div id="content">
<div id="academicsHeading">Admission Rules</div>
<div id="academicsDetails"><?php
$row=mysql_fetch_assoc(mysql_query("SELECT Admission_Rules from College_Info"));
echo $row[Admission_Rules];
?></div>
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