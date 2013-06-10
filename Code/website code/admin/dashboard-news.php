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
<body>
<script>
function disableunit(unit){
if(unit==1){
document.getElementById("LinkAddress").value="";
document.getElementById("LinkAddress").disabled=true;
}
else{
if(document.getElementById("LinkAddress").value=="")
document.getElementById("LinkUpload").disabled=false;
else
document.getElementById("LinkUpload").disabled=true;
}
}
</script>
<div id="container">
<?php include 'include/adminHeader.php';?>
<div id="workarea">
<?php include 'include/newsLeftNav.php';?>
<div id="rightPane">
<form action="update/updateNews.php" method="post">
<div id="rightHead">NEWS AND UPDATES<span><?php $row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info")); echo $row['College_Domain'];?>/newsupdates.php</span></div>
<div id="rightSubHead">Last Updated:</div>

<div id="newsHeader"><center><table><tr><td><input type="text" placeholder="News Headline (This Will Appear On News Ticker)" autofocus="autofocus" name="title"/></td></tr></table></center></div>
<div id="newsContent">

<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	theme:"modern",
	width:1000,
	height:490,
	resize:false,
        statusbar : false,
        menubar: false,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link"
});
</script>
<center style="margin-bottom:10px;">Full Page Description</center>
    <textarea name="content" style="width:100%"></textarea>
<div id="addNews"><input type="submit" value="ADD"/></div>	
</div>


</form>
<div id="externalLinks">
Add External Links/Downloadables:
<form method="post" action="update/addLink.php"  enctype="multipart/form-data">
<div id="externalLinkTitle"><table><tr><td>Link Title:</td><td><input type="text" name="LinkTitle" id="LinkTitle" placeholder="Link Title to be displayed on website" /></td></tr></table></div>
<div id="externalLinkAddress"><table><tr><td>Link Address:</td><td><input type="text" name="LinkAddress" id="LinkAddress" placeholder="Link Address to which the above link points" onchange="disableunit(2)" /></td></tr></table></div>
<div id="externalLinkUpload"><table><tr><td>File Upload:</td><td><input type="file" name="file" id="LinkUpload" onchange="disableunit(1)"/></td></tr></table></div>
<div id="externalLinkSubmit"><table><tr><td></td><td><input type="submit" value="Add Link"/></td></tr></table></div>
</form>
</div>

<div id="removeExternalLinks">
Remove External Links/Downloadables:
<div id="selectExternalLink">
<form method="post" action="update/removeExternalLink.php">
<select name="ExternalLink" id="ExternalLink"><option></option>
<?php 
$result=mysql_query("select * from External_Links");
while($row=mysql_fetch_assoc($result)){
echo "<option value='".$row['Link_Id']."'>".$row['Link_Title']."</option>";
}
?>
</select>
<input type="submit" value="Delete"/>
</form>
</div>
</div>


<div id="removeNewsLinks">
Remove News:
<div id="selectNewsLink">
<form method="post" action="update/removeNewsLink.php">
<select name="NewsLink" id="NewsLink"><option></option>
<?php 
$result=mysql_query("select * from News_Update");
while($row=mysql_fetch_assoc($result)){
echo "<option value='".$row['News_Id']."'>".$row['News_Heading']."</option>";
}
?>
</select>
<input type="submit" value="Delete"/>
</form>
</div>
</div>



</div>

</div>
</div>
</body>
</html>