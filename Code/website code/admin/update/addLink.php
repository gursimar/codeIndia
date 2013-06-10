<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';

if(!empty($_REQUEST['LinkAddress'])){
mysql_query("insert into External_Links(Link_Title,Link_Address) values('".$_REQUEST['LinkTitle']."','".$_REQUEST['LinkAddress']."')");

}else{

    
    if (file_exists("../../uploads/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../../uploads/" . $_FILES["file"]["name"]);
     mysql_query("insert into External_Links(Link_Title,Link_Address) values('".$_REQUEST['LinkTitle']."','uploads/".$_FILES["file"]["name"]."')");
      }
   

}

header("Location: ../dashboard-news.php");

?>