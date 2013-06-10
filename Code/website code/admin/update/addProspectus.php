<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';

    
    
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../../uploads/" . $_FILES["file"]["name"]);
     mysql_query("update College_Info set Prospectus_Link='uploads/".$_FILES["file"]["name"]."'");
    
   



header("Location: ../dashboard.php");

?>