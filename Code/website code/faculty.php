<html>
<head>
<?php include 'include/indexHead.php'; ?>
</head>
<body onClick="resetMenu();">
<div id="container">
<?php include 'include/menuBar.php' ?>
<div id="facultyContent">
<?php
$page=1;
if($_REQUEST['q']!=null )
$page=$_REQUEST['q'];
$result=mysql_query("SELECT * from Faculty_Details");
$maxresults=mysql_num_rows($result);
$totalpages=ceil($maxresults/18);
$min=18*($page-1);
$result=mysql_query("SELECT Faculty_Name,Faculty_Designation,Faculty_Department,Faculty_Contact,Faculty_Image_Path from Faculty_Details LIMIT ".$min.",18");

while($row=mysql_fetch_assoc($result)){
echo '<div id="faculty-list">
<div id="faculty-photo"><img height="100px" width="100px" src="'.$row[Faculty_Image_Path].'"/></div>
<div id="faculty-details">
<div id="faculty-name"><strong>'.$row[Faculty_Name].'</strong></div>
<div id="faculty-text">'.$row[Faculty_Designation].'</div>
<div id="faculty-text">'.$row[Faculty_Department].'</div>
<div id="faculty-text">'.$row[Faculty_Contact].'</div>
</div>
</div>';
}
?>
</div>
<?php echo '<div id="pagination">';

echo '<span id="prev">';
if($page!=1){
echo ' <a href="faculty.php?q='.($page-1).'">PREV</a> ';
}
echo '</span><center>';
echo '<span id="pageNo">';
for($i=1;$i<=$totalpages;$i++){
if($i==$page){
echo '<span id="selected"> '.$i.' </span>';

}else{
echo '<span class="pages"><a href="faculty.php?q='.$i.'"> '.$i.' </a></span>';
}
}
echo '</span>';

echo '</center><span id="next">';
if($page!=$totalpages){
echo ' <a href="faculty.php?q='.($page+1).'">NEXT</a> ';
}
echo '</span>';
echo '</div>'; 
?>
<?php include 'include/footer.php'; ?>
</div>
</body>
</html>