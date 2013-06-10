<?php 
define('REGISTER_INCLUDE_CHECK',true);
require '../include/connect.php';
?>
<html>
<head>
<title>Admin:
<?php
$row=mysql_fetch_assoc(mysql_query("SELECT College_Title from College_Info"));
echo $row[College_Title];
?>
</title>
<link rel="stylesheet" type="text/css" href="css/loginStyle.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(window).resize(function(){
$('.className').css({
position:'absolute',
left: ($(window).width() - $('.className').outerWidth())/2,
top: ($(window).height() - $('.className').outerHeight())/2
});
});
// To initially run the function:
$(window).resize();
});
</script>
</head>

<body id="exampleBody">
<div class="className">
<div class="window">
<div id="loader">
<form method="post" action="update/login.php" class="form-1">
<p class="field">
<input type="text" name="user" placeholder="Username">
<i class="icon-user icon-large"></i>
</p>
<p class="field">
<input type="password" name="password" placeholder="Password">
<i class="icon-lock icon-large"></i>
</p>
<p class="submit">
<button type="submit" name="Login"><i class="icon-arrow-right icon-large"></i></button>
</p>
</form>
</div>
</div>
</div>
</body>
</html>
