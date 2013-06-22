<script language="javascript" type="text/javascript">

function resetDate(elementID){
	document.getElementById(elementID).value='';
}

function doValidate(){
	//alert('hi');
	var err = "";
	
	if(document.frmLoginForm.txtUserName.value == "" && (document.frmLoginForm.txtName.value != "" && document.frmLoginForm.txtDOB.value != ""))
	{ }
	else if(document.frmLoginForm.txtUserName.value != "")
	{ }
	else
		err += "* Please enter Registration No or Name and DOB\n";
	
	//alert(err);
	if(err == "")
		return true;
	else{
		alert(err);
		return false;
	}
}
</script>
<center>

<div>
	<a href="index.php" class="text14"><strong>Login</strong></a>&nbsp; &nbsp;|&nbsp; &nbsp;
	<a href="register.php" class="text14"><strong>Register</strong></a>
</div>

<br />
<br />

<form name=frmLoginForm action="forgotPwd.php" method="POST">
<div><span class="title2">Forgot Password</span></div>
<br>
<div align="center"><span class="text11red"><?php if($msg!= "") echo $msg; ?></span></div>
<br />

	<table border="0" cellpadding="1" cellspacing="0" width="400" summary="" class="text11" bgcolor="#CCCCCC">
		<tr>
			<td>
				<table border="0" cellpadding="5" cellspacing="0" width="100%" summary="" class="text12" bgcolor="#FFFFFF">
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Enter your Registration No.</strong></td>
						<td width="60%"><input name="txtUserName" class="flat" type="text" value="<?php echo $_POST['txtUserName']; ?>" size="30"></td>
					</tr>
					<tr><td colspan="2" align="center">or</td></tr>
					
					<tr>
						<td width="40%" align="right" nowrap><strong>Enter your Name</strong></td>
						<td width="60%"><input name="txtName" class="flat" type="text" value="<?php echo $_POST['txtName']; ?>" size="30"></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Enter your Date of Birth</strong></td>
						<td width="60%">
							<input name="txtDOB" id="txtDOB" class="flat" type="text" value="<?php echo $_POST['txtDOB']; ?>" size="15" readonly />
							<input type="button"  class="formButton" value="--" onclick="displayCalendar(document.getElementById('txtDOB'),'dd-mm-yyyy',this,true);" />&nbsp;&nbsp;&nbsp;
							<input type="button" name="reset" value="Clear" onclick="javascript: resetDate('txtDOB');" /></td>
						</td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input name="btnSubmit" class="flat" type="submit" value="Send Password" onclick="return doValidate();"></td>
					</tr>
									

				</table>
			</td>
		</tr>
	</table>
					

</form>


	<script language="javascript">
		document.frmLoginForm.txtUserName.focus();
	</script>

</center>	
