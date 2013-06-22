<?php
 	session_start();
	include_once("config.php");
	global $App;


	// include header
 	require_once("header.php");
	
	if(!isset($_SESSION['user']) || !$_SESSION['user']->registrationID > 0 || $_SESSION['user']->userType != 'SA'){
		header("Location: index.php");
		exit;
	}
	
?>


<script language="javascript">
	function showInfo(url) { 
	  var LeftPosition=(screen.width)?(screen.width-500)/2:100;
	  var TopPosition=(screen.height)?(screen.height-400)/2:100;
	  var settings='width=800,height=650,top='+TopPosition+',left='+LeftPosition+',scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
	 
	  win=window.open(url,"CandidateDetails",settings);
	 
	}
</script>

<?php	
	echo '<center>';
	include_once("menu.php");

	if(isset($_GET['issued']) && ($_GET['issued'] == 1 || $_GET['issued'] == 0))
		$issued = $_GET['issued'];
	else
		$issued = 0;

	// get candidate list
	mysql_connect(HOST, USERNAME, PASSWORD);
	mysql_select_db(DBNAME);
	$query	= "select * from tblUser WHERE admitcardIssued = ".$issued." AND userType = 'GEN'";
	$result = mysql_query($query);
		
	if(mysql_num_rows($result) > 0){
		// display list
?>
		
		<?php 
			if(isset($_GET['msg'])){
				if($_GET['msg'] == 1)
					$msg = "Admit Card/s have been issued for selected candidates.";
				else if($_GET['msg'] == 2)
					$msg = "No Candidate seleted";
				
				echo '<div align="center"><span class="text11red">'.$msg.'</span></div><br />';
			}
		?>
			

		
		
		<form name=frmRegister action="issueAdmitCard.php" method="POST">
		

		<table width="100%" class="text12" cellpadding="5" cellspacing="0">
			<tr height="20" bgcolor="#CCCCCC">
				<td><?php if($issued == 0) echo '<input type="submit" class="flat" value="Issue Admit Cards" name="submit" />'; ?></td>
				<td><strong>Applicant's Name</strong></td>
				<td><strong>Registration No</strong></td>
				<td><strong>Post Applied for</strong></td>
				<td><strong>Category</strong></td>
				<td><strong>Gender</strong></td>
				<td><strong>Mobile</strong></td>
				<td><strong>DD No</strong></td>
				<td><strong>DD Date</strong></td>
				<td><strong>DD Amount</strong></td>
				<td><strong>DD Bank</strong></td>
				<td><strong>Created</strong></td>
				<td><strong>Action</strong></td>
			</tr>
		
<?php
		while($row = mysql_fetch_object($result)){

			echo '<tr height="20" bgcolor="#FFFFFF">';
				echo '<td><input type="checkbox" class="flat" name="chk_issue[]" value="'.$row->registrationID.'" /></td>';
				echo '<td>'.$row->name.'</td>';
				echo '<td>'.$row->registrationID.'</td>';
				echo '<td>'.$row->postAppliedFor.'</td>';
				echo '<td>'.$row->category.'</td>';
				echo '<td>'.$row->gender.'</td>';
				echo '<td>'.$row->mobile.'</td>';
				echo '<td>'.$row->ddNo.'</td>';
				echo '<td>'.$row->ddDate.'</td>';
				echo '<td>'.$row->ddAmount.'</td>';
				echo '<td>'.$row->ddBank.'</td>';
				echo '<td>'.$row->dateCreated.'</td>';
				echo '<td><a href="#" onclick=\'javascript: showInfo("viewCandidate.php?id='.$row->registrationID.'");\'><img src="img/doc_desktop.png" align="absmiddle" alt="View Detail" title="View Detail" border="0" /></a></td>';
			echo '</tr>';
			echo '<tr><td colspan="13" height="1"><hr color="#CCCCCC" width="100%" /></td></tr>';
		}
		
		echo '</table>';
	}
	else{
		if($issued == 0)
			echo '<div><span class="title2">No Candidate has been registered yet or Admit Card for all candidates have been issued.</span></div>';
		else
			echo '<div><span class="title2">Admit Card has not been issued for candidates.</span></div>';
	}

	echo '</center>';
 
 // include footer
 require_once("footer.php"); 

?>
