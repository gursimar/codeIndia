<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';


if($_REQUEST['homepage_mainpane']!=null){
$result = mysql_query("select * from College_Info");
if (mysql_num_rows($result) == 0) {
$query="insert into College_Info(Homepage_Mainpane_Heading,HomePage_Mainpane_Content) values('".$_REQUEST['heading']."','".$_REQUEST['content']."')";
}else{
$query="update College_Info set Homepage_Mainpane_Content='".$_REQUEST['content']."',Homepage_Mainpane_Heading='".$_REQUEST['heading']."'";
}
if(!mysql_query($query))
{
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}
}


if($_REQUEST['imageupdate']!=null and $_REQUEST['submit']=="Save"){
$sel=implode(',', array_filter($_REQUEST['imageselect']));

mysql_query("update Images set Visibility='show' where id in ($sel) and Location='slider'");
mysql_query("update Images set Visibility='hide' where id not in ($sel) and Location='slider'");
}

if($_REQUEST['imageupdate']!=null and $_REQUEST['submit']=="Delete"){
//delete from folder here
$sel=implode(',', array_filter($_REQUEST['imageselect']));
mysql_query("delete from Images where id in ($sel)");

}

header("Location: ../dashboard-home.php");
?>