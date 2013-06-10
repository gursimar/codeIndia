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
<?php include 'include/missionLeftNav.php';?>
<div id="rightPane">
<div id="rightHead">MISSION/VISION<span><?php $row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info")); echo $row['College_Domain'];?>/mission.php</span></div>
<div id="rightSubHead">Last Updated:</div>

<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	theme:"modern",
	width:1000,
	height:600,
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
<form method="post" action="update/updateVision.php">

<div id="aboutRightText">Mission/Vision Page Content:
<div id="aboutTextMain">
<div id= "editor" >
    <textarea name="content" style="width:100%"><?php
$row=mysql_fetch_assoc(mysql_query("SELECT Vision from College_Info"));
echo $row[Vision];
?></textarea>
<input type="hidden" name="updateVision" value="true"/>
	<div id="save"><input type="submit" value="Save"/></div>

</div>
</div>
</div>
</form>
<div id="rightImage">Choose images for Mission/Vision page:
<div id="imageMain">
<form method="get" action="update/updateHomepage.php">
<input type="hidden" name="imageupdate" value="true"/>

<div id="imageSelect">
<?php
$result = mysql_query("select * from Images where Location='mission'");
while ($row=mysql_fetch_assoc($result)) {


echo '<img height="100" src="../'.$row['Image_Path'].'" data-id="'.$row['id'].'"/> <input type="hidden" name="imageselect[]" />';
}
?>
</div>

<div id="imageUpdate">
<input type="submit" value="Save" name="submit"/>
<input type="submit" value="Delete" name="submit"/>
</form>
<form action="upload/missionupload.php"  name="photo" enctype="multipart/form-data"  method="post">
<input type="file" name="image" size="30" /> <input type="submit" name="upload" value="Upload" />
	</form>
</div>
</div>
</div>
<script>
var count=0;
$('img').on('click', function(){

    var $this = $(this);
    
	$this.toggleClass('selected');
	
    if($this.hasClass('selected') ){
	if(count<2){
	    count=count+1;
        $this.next(':hidden').val($this.data('id'));
		$this.css('opacity',1);
		}
    else {
        $this.toggleClass('selected');
		$this.next(':hidden').val('');
		$this.css('opacity',0.6);
		}
	}
	else{
		count--;
		$this.next(':hidden').val('');
		$this.css('opacity',0.6);
	}
});
</script>
</div>

</div>
</div>
</body>
</html>