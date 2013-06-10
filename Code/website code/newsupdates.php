<?php 
define('REGISTER_INCLUDE_CHECK',true);
require 'include/connect.php';
?>

<html>
<head>
<?php include 'include/indexHead.php'; ?>
</head>
<body onClick="resetMenu();">
<div id="container">
<?php include 'include/menuBar.php' ?>
<div id="content">
<?php 
$row=mysql_fetch_assoc(mysql_query("SELECT * from News_Update where News_Id=".$_REQUEST['newsId']));
?> 
<div id="newsLeftHeading"><?php echo $row['News_Heading']; ?></div>
<div id="newsLeftDetails"><?php echo $row['News_Description']; ?>
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