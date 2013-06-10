<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';

if($_REQUEST['updateInfrastructure']!=null){
$result = mysql_query("select * from College_Info");
if (mysql_num_rows($result) == 0) {
$query="insert into College_Info(Infrastructure) values('".$_REQUEST['content']."')";
}else{
$query="UPDATE College_Info SET Infrastructure='".$_REQUEST['content']."'";
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

mysql_query("update Images set Visibility='show' where id in ($sel) and Location='infrastructue'");
mysql_query("update Images set Visibility='hide' where id not in ($sel) and Location='infrastructure'");
}

if($_REQUEST['imageupdate']!=null and $_REQUEST['submit']=="Delete"){
//delete from folder here
$sel=implode(',', array_filter($_REQUEST['imageselect']));
mysql_query("delete from Images where id in ($sel)");

}

header("Location: ../dashboard-infrastructure.php"); 
?>