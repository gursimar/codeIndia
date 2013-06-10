<div id="updateHeading">NOTICE BOARD</div>
<div id="updateLinks">
<table width=100%>
<?php
$result=mysql_query("select * from External_Links order by Link_Id LIMIT 6");
while($row=mysql_fetch_assoc($result)){
echo "<tr><td><a href='".$row['Link_Address']."' target='_blank'>".$row['Link_Title']."</a></td></tr>";
}
?>
</table>
</div>
<div id="updateFooter"><center>Show All</center></div>