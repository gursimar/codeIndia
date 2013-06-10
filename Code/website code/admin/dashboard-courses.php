<?php 
define('REGISTER_INCLUDE_CHECK',true);
require '../include/connect.php';
session_name('College_Administrator');
session_start();
if (!isset($_SESSION['College_Title']))
{
header("Location: index.php");
	exit;
}
date_default_timezone_set('Asia/Kolkata');
if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location: index.php");
	exit;
}

?>
<html>
<?php include 'include/dashboardHead.php';?>
        
       <script type="text/javascript">
       function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("content").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","update/getCoursesAjax.php?course="+str,true);
xmlhttp.send();
}



       
        </script>

 
</head>
<body>

<div id="container">
<?php include 'include/adminHeader.php';?>
<div id="workarea">
<?php include 'include/coursesLeftNav.php';?>
<div id="rightPane">
<div id="rightHead">COURSES<span><?php $row=mysql_fetch_assoc(mysql_query("SELECT * from College_Info")); echo $row['College_Domain'];?>/courses.php</span></div>
<div id="rightSubHead">Last Updated:</div>
<script type="text/javascript">
function change(){
     var i=0,j=0;
j=document.getElementById("course");
document.getElementById('subcourse').innerHTML='';
while(i<j.value)
 {

    document.getElementById('subcourse').innerHTML +='<input type="text" name="subcourse[]" placeholder="Sub Course Name"/><br/>';    
    i=i+1;  

 }
   
}

</script>
<div id="courseAdd">
ADD COURSE AND SUB COURSE:
<form action="update/addcourse.php" method="post">
<div id="courseAddTitle"><table><tr><td>Course Title:</td><td><input type="text" name="course_title" placeholder="Course Name"><select name="noOfSubcourses" id="course" onchange="change()"><?php for($i=0;$i<15;$i++) echo '<option value="'.$i.'">'.$i.'</option>'; ?></select></td></tr></table></div>
<div id="courseAddSubTitle"><table><tr><td></td><td><span id="subcourse"></span></td></tr></table></div>
<div id="courseAddDesc"><table><tr><td>Course Description:</td><td><textarea rows="5" cols="17" name="description"></textarea></td></tr></table></div>
<div id="courseAddSubmit"><table><tr><td></td><td><input type="submit" name="sbtn" value="Update"></td></tr></table></div>
</form>
</div>

<div id="courseRemove">
REMOVE COURSE AND SUB COURSE:
<form action="update/deleteCourse.php" method="get">
<div id="courseRemoveTitle"><table><tr><td>Course Title:</td><td><select name="course" id="course" onchange="showHint(this.value)"><option></option>
<?php 
$result=mysql_query("select * from Course");
while($row=mysql_fetch_assoc($result)){
echo "<option value='".$row['Course_Id']."'>".$row['Course_Title']."</option>";
}
?>
</select></td></tr></table></div>
<div id="courseRemoveSubTitle"><span id="content"/></span></div>
<div id="courseRemoveSubmit"><table><tr><td></td><td><input type="submit" value="Delete"/></td></tr></table></div>
</form>
</div>
<!--
<form action="update/addcourse.php" method="post">
<table><tr><td>
  Course Title:-</td><td><input type="text" name="course_title">
</td><td>
<select name="noOfSubcourses" id="course" onchange="change()">
<?php for($i=0;$i<15;$i++) echo '<option value="'.$i.'">'.$i.'</option>'; ?>

</select></td></tr>
<tr><td>

<span id="subcourse"></span>
</td><td><textarea name="description" resize=no-resize></textarea></td></tr>
<tr><td><input type="submit" name="sbtn" value="Update"></td><td></td></tr>
</table>       
</form>
<form action="update/deleteCourse.php" method="get">
           
            Enter Course Name<select name="course" id="course" onchange="showHint(this.value)"><option></option>
            <?php 
            $result=mysql_query("select * from Course");
            while($row=mysql_fetch_assoc($result)){
            echo "<option value='".$row['Course_Id']."'>".$row['Course_Title']."</option>";
            }
             ?>
            </select>
           <span id="content"/>

        </span>
        <br/><input type="submit" value="Delete"/>
</form>
-->
</div>
</div>
</div>



</body>
</html>