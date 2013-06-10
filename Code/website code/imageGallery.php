
<html>
<head>
<?php include 'include/indexHead.php'; ?>
<link rel="stylesheet" href="css/colorbox.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1'});
			});
		</script>
</head>
<body onClick="resetMenu();">
<div id="container">
<?php include 'include/menuBar.php' ?>
<div id="imageGallery">
<?php
$result=mysql_query("SELECT * from Images where Location='imageGallery' and Visibility='show' ORDER BY id DESC LIMIT 24");
while($row=mysql_fetch_assoc($result))
echo '<div id="imageSlot"><a class="group1" href="'.$row['Image_Path'].'"><img src="'.$row['Image_Path'].'" data-thumb="'.$row['Image_Path'].'" height="120px" width="194px" /></a></div>';
?>
</div>
<?php include 'include/footer.php'; ?>
</div>
</body>
</html>