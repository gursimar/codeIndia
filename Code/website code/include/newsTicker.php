<div id="newsevents">NEWS AND UPDATES</div>
<ul id="vertical-ticker">
<?php
$result=mysql_query("SELECT News_Id,News_Heading,News_Description,News_Date from News_Update ORDER BY News_Id DESC LIMIT 10");
while($row=mysql_fetch_assoc($result)){
echo '<li><a href="newsupdates.php?newsId='.$row['News_Id'].'"><div id="newsColumn"><div id="newsHead">'.$row['News_Heading'].'</div><div id="newsFoot">'.implode('/', array_reverse(explode('-', $row['News_Date']))).'</div></div></a></li>';
}
?>			
</ul>