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
<div id="container">
<?php include 'include/adminHeader.php';?>
<div id="workarea">
<?php include 'include/admissionLeftNav.php';?>
<div id="rightPane">
<div id="rightHead">ADMISSION RULES<span><?php $row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info")); echo $row['College_Domain'];?>/admissionRules.php</span></div>
<div id="rightSubHead">Last Updated:</div>

<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	theme:"modern",
	width:1000,
	height:1000,
        statusbar : false,
	resize:false,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link"
});
</script>
<form method="post" action="update/updateAdmissionRules.php">

<div id="rightText">Admission Rules Page Content:
<div id="textMain">
<div id= "editor" >
<input type="hidden" name="homepage_mainpane" value="true"/>
    <textarea name="content" style="width:100%"><?php
$row=mysql_fetch_assoc(mysql_query("SELECT Admission_Rules from College_Info"));
echo $row[Admission_Rules];
?></textarea>
	
<div id="save"><input type="submit" value="Save"/></div>
</div>

</div>

</div>

</form>

</div>
</div>
</div>
</body>
</html>