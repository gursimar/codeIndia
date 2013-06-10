<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';

if($_REQUEST['imageupdate']!=null and $_REQUEST['submit']=="Save"){
$sel=implode(',', array_filter($_REQUEST['imageselect']));

mysql_query("update Images set Visibility='show' where id in ($sel) and Location='imageGallery'");
mysql_query("update Images set Visibility='hide' where id not in ($sel) and Location='imageGallery'");
}

if($_REQUEST['imageupdate']!=null and $_REQUEST['submit']=="Delete"){
//delete from folder here
$sel=implode(',', array_filter($_REQUEST['imageselect']));
mysql_query("delete from Images where id in ($sel)");

}

header("Location: ../dashboard-gallery.php");
?>