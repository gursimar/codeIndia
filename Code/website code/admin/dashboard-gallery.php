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
<?php include 'include/galleryLeftNav.php';?>
<div id="rightPane">
<div id="rightHead">IMAGE GALLERY</div>
<div id="rightSubHead">Last Updated:</div>
<div id="rightImage">Choose images for About Us: Image Gallery page:
<div id="imageMain">
<form method="get" action="update/updateimageGallery.php">
<input type="hidden" name="imageupdate" value="true"/>

<div id="imageSelect">
<?php
$result = mysql_query("select * from Images where Location='imageGallery'");
while ($row=mysql_fetch_assoc($result)) {


echo '<img height="100" src="../'.$row['Image_Path'].'" data-id="'.$row['id'].'"/> <input type="hidden" name="imageselect[]" />';
}
?>
</div>

<div id="imageUpdate">
<input type="submit" value="Save" name="submit"/>
<input type="submit" value="Delete" name="submit"/>
</form>
<form action="upload/imageGallery.php"  name="photo" enctype="multipart/form-data"  method="post">
<input type="file" name="image" size="30" /> <input type="submit" name="upload" value="Upload" />
	</form>
</div>
</div>
</div>


<div id="rightImage">Choose images for Academics: Achiever's Gallery page:
<div id="imageMain">
<form method="get" action="update/updateachieverGallery.php">
<input type="hidden" name="imageupdate" value="true"/>

<div id="imageSelect">
<?php
$result = mysql_query("select * from Images where Location='achieverGallery'");
while ($row=mysql_fetch_assoc($result)) {


echo '<img height="100" src="../'.$row['Image_Path'].'" data-id="'.$row['id'].'"/> <input type="hidden" name="imageselect[]" />';
}
?>
</div>

<div id="imageUpdate">
<input type="submit" value="Save" name="submit"/>
<input type="submit" value="Delete" name="submit"/>
</form>
<form action="upload/achieverGallery.php"  name="photo" enctype="multipart/form-data"  method="post">
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