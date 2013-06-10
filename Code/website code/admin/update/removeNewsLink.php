<?php


define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';


mysql_query("delete from News_Update where News_Id=".$_REQUEST['NewsLink']);


header("Location: ../dashboard-news.php?msg=NewsDeleted");
?>