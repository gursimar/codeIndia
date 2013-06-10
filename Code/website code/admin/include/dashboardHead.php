<head>
<script type="text/javascript">
/***********************************************************
*                       CODE@INDIA                         *
*       This notice MUST stay intact for legal use         *
*  Authors: Junaid Hamza, Sukhwinder Singh, Sanjeev Kumar  *
***********************************************************/
</script>
<title><?php
$row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info"));
echo $row[College_Title];
?>
</title>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="../../css/theme-<?php echo $row[Theme]?>.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="icon" type="image/png" href="../../images/logo.png" />
<style>
::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    background:#ededed;
    border-radius:0px;
}
 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background:#C0C6CC;
    border-radius:10px;
}
</style>
</head>