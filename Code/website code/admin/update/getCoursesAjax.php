<?php
define('REGISTER_INCLUDE_CHECK',true);
require '../../include/connect.php';
$flag=0;
$courses=$_GET['course'];

  $sqlquery="select Sub_Course_Title from Sub_Course where Course_Id=".$courses;
 
  $sqlresult=mysql_query($sqlquery);
  if($sqlrow=mysql_fetch_assoc($sqlresult)){
  $flag=1;
  
  echo '<table><tr><td>Select Sub Course:</td><td><select name="subcourse"><option>'.$sqlrow['Sub_Course_Title'].'</option>';
  
  while($sqlrow=mysql_fetch_assoc($sqlresult)){
            echo "<option>".$sqlrow['Sub_Course_Title']."</option>";
            }
        
         echo "</select></td></tr></table>";
         }

?>