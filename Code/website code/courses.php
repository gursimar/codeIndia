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
<div id="courseContent">
<div id="academicsHeading">Courses</div>
<div id="academicsDetails">

<?php 
$result=mysql_query("Select * from Course");
while($row=mysql_fetch_assoc($result)){
?>
<div id="courseSlot">
<div id="courseLeftPane">
<div id="courseTitle"><strong><?php echo $row['Course_Title']; ?></strong></div>
<div id="courseSubTitle"><?php
$result2=mysql_query("Select * from Sub_Course where Course_Id=".$row['Course_Id']);
while($row2=mysql_fetch_assoc($result2)){
echo "&bull;".$row2['Sub_Course_Title']."<br/>";
}

?></div>
</div>

<div id="courseDesc"><?php echo $row['Course_Description'];?></div>
</div>

<?php }?>

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