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
<?php include 'include/emailLeftNav.php';?>
<div id="rightPane">
<form action="update/sendEmail.php" method="post" enctype='multipart/form-data'>
<div id="rightHead">EMAIL SERVER<span>Send Email</span></div>
<div id="rightSubHead">Last Updated:</div>

<div id="recipient"><table><tr><td width="160px">Recipient Address:</td><td><input type="text" name="recipientEmail"/></td></tr></table></div>

<div id="emailSubject"><table><tr><td width="160px">Mail Subject:</td><td><input type="text" name="subject"/></td></tr></table></div>
<!--<div id="attachments"><input type="file" name="file[]" multiple/></div>-->
<div id="mailArea">

<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	theme:"modern",
	width:1000,
	height:800,
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
    <textarea name="content" style="width:100%"></textarea>
<div id="sendMail"><input type="submit" value="SEND"/></div>	
</div>
</form>
</div>
</div>
</div>
</body>
</html>