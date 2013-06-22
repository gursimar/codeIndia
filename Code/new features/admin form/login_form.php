<center>
<div width="400" align="left"><?php echo $App['login_instructions']; ?></div>


<form name=frmLoginForm action="index.php" method="POST">
<div><span class="title2">Login Form</span></div>
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
						<td width="40%" align="right" nowrap><strong>Registration No.</strong></td>
						<td width="60%"><input name="txtUserName" class="flat" type="text" value="<?php echo $_POST['txtUserName']; ?>" size="30"></td>
					</tr>
					<tr>
						<td align="right" nowrap><strong>Password</strong></td>
						<td><input name="txtPassword" class="flat" type="password" value="" size="30"></td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input name="btnLogin" class="flat" type="submit" value="Login"></td>
					</tr>
					<tr>
						<td width="10%">&nbsp;</td>
						<td>&nbsp;</td>
						<td width="10%">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2" align="right">
							<a href="register.php" class="text12"><strong>Register</strong></a>&nbsp;|&nbsp;
							<a href="forgotPwd.php" class="text12"><strong>Forgot Password</strong></a>
						</td>
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
