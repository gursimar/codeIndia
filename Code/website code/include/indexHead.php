<?php 
define('REGISTER_INCLUDE_CHECK',true);
require 'include/connect.php';
?>
<script type="text/javascript">
/***********************************************************
*                       CODE@INDIA                         *
*       This notice MUST stay intact for legal use         *
*  Authors: Junaid Hamza, Sukhwinder Singh, Sanjeev Kumar  *
***********************************************************/
</script>
<title>
<?php
$row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info"));
echo $row[College_Title];
?>
</title>
<link rel="icon" type="image/png" href="images/logo.png" />

<link rel="stylesheet" href="css/style.css"  type="text/css"/>
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
<link rel="stylesheet" href="css/ticker.css" type="text/css" />
<link rel="stylesheet" href="css/fontSize.css" type="text/css" />
<link rel="stylesheet" href="css/colorScheme.css" type="text/css" />
<link rel="stylesheet" href="css/theme-<?php echo $row[Theme]?>.css" type="text/css" />

<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/jquery.totemticker.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
<script>
function resetMenu(){
document.getElementById('about').style.display='none';
document.getElementById('academics').style.display='none';
document.getElementById('faculty').style.display='none';
}
</script>
<script type="text/javascript">
$(function(){
$('#vertical-ticker').totemticker({
				row_height	:	'100px',
				next		:	'#ticker-next',
				previous	:	'#ticker-previous',
				stop		:	'#stop',
				start		:	'#start',
				mousestop	:	true,
});
});
</script>