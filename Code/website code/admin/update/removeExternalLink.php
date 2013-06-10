<?php


define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';


mysql_query("delete from External_Links where Link_Id=".$_REQUEST['ExternalLink']);


header("Location: ../dashboard-news.php?msg=LinkDeleted");
?>