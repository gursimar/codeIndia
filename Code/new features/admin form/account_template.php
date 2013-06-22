<script language="javascript" type="text/javascript">

function printAdmitCard() { 
  var LeftPosition=(screen.width)?(screen.width-500)/2:100;
  var TopPosition=(screen.height)?(screen.height-400)/2:100;
  var settings='width=800,height=650,top='+TopPosition+',left='+LeftPosition+',scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
 
  win=window.open('printable_admitCard_template.php',"AdmitCard",settings);
 
}

</script>

<center>

<?php include_once("menu.php"); ?>


<?php 
	if ($_SESSION['user']->userType == "GEN"){
		if($_SESSION['user']->admitcardIssued == 1){
			// display admit card
			//echo '<div><span class="title2">Admit Card</span></div><br /><br />';
			echo '<div align="center"><input type="button" class="flat" name="btnPrint" value="Print Admit Card" onclick="javascript: printAdmitCard()" /></div><br />';
			include_once("admitCard_template.php");
			
		}
		else{
			echo '<div><span class="title2">Admit Card has not been issued yet.</span></div>';
		}
	}
	else{
		echo '<div><span class="title2">Welcome Admin!</span></div>';
	}
?>
</center>	
