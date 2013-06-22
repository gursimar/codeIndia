<div>
	<?php
		if ($_SESSION['user']->userType == "SA"){
			echo '<a href="candidateList.php?issued=0" class="text14"><strong>Issue Admit Card/s</strong></a>&nbsp; &nbsp;|&nbsp; &nbsp;';
			echo '<a href="candidateList.php?issued=1" class="text14"><strong>Issued Admit Cards</strong></a>&nbsp; &nbsp;|&nbsp; &nbsp;'; 
		}
		else{
			echo 'Welcome <strong>'.$_SESSION['user']->name.'! &nbsp; &nbsp;';
		}
		echo '<a href="logout.php" class="text14"><strong>Logout</strong></a>';
	?>
</div>

<br />
<br />

