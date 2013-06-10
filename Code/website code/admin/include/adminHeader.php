<div id="header"><?php
$row=mysql_fetch_assoc(mysql_query("SELECT College_Title from College_Info"));
echo $row[College_Title];
?> Website Manager<span style="float:right"><a href="?logoff">Sign Out</a></span></div>