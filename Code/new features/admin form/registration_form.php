<script language="javascript" type="text/javascript">

function changeCategoryList(val){
	document.frmRegister.hid_post.value = val;
	document.frmRegister.submit();
}

function resetDate(elementID){
	document.getElementById(elementID).value='';
}

function doValidate(){
	//alert('hi');
	var err = "";
	
	if(document.frmRegister.optPostAppliedFor.value == "")
		err += "* Please select the Post you are applying for\n";
	if(document.frmRegister.txtName.value == "")
		err += "* Please enter Applicant's Name\n";
	if(document.frmRegister.txtFName.value == "")
		err += "* Please enter Applicant's Father Name\n";
	if(document.frmRegister.txtDOB.value == "")
		err += "* Please enter Date of Birth\n";
	if(document.frmRegister.optCategory.value == "")
		err += "* Please select the Category\n";
	if(document.frmRegister.txtMobile.value == "")
		err += "* Please enter Mobile No.\n";
	if(document.frmRegister.txtEmailID.value != "" && !validateEmail(document.frmRegister.txtEmailID.value))
		err += "* Email Address is not valid\n";
	if(document.frmRegister.txtDD.value == "")
		err += "* Please enter DD No.\n";
	if(document.frmRegister.txtDDDate.value == "")
		err += "* Please enter DD Date\n";
	if(document.frmRegister.txtDDAmount.value == "")
		err += "* Please enter DD Amount\n";
	if(document.frmRegister.txtDDBank.value == "")
		err += "* Please enter DD Issuing Bank Name\n";

	//alert(err);
	if(err == ""){
		document.frmRegister.hid_post.value = '';
		return true;
	}
	else{
		alert(err);
		return false;
	}
}

function validateEmail(email) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
		return true;
	else
		return false;
}

function printForm(regNo) { 
  var LeftPosition=(screen.width)?(screen.width-500)/2:100;
  var TopPosition=(screen.height)?(screen.height-400)/2:100;
  var settings='width=850,height=650,top='+TopPosition+',left='+LeftPosition+',scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
 
  win=window.open('printable_reg_form.php?regNo='+regNo,"RegistrationForm",settings);
 
}

</script>

<center>

<?php


if($msg != ""){
	echo '<div align="center"><span class="text11red">'.$msg.'</span></div>';
	echo '<br />';
	echo '<input type="button" class="flat" name="btnPrint" value="Print Registration Form" onclick="printForm('.$regNo.')" />';
	echo '&nbsp; &nbsp;<input type="button" class="flat" name="btnLogin" value="Login" onclick="javascript: document.location.href=\'index.php\'" />';
}
else{
?>

<div width="400" align="left"><?php echo $App['registration_instructions_top']; ?></div>


<form name=frmRegister action="register.php" method="POST">
<div><span class="title2">New Registeration</span></div>
<br>
<div align="center"><span class="text11red"><?php if($msg!= "") echo $msg; ?></span></div>
<br />

	<table border="0" cellpadding="1" cellspacing="0" width="800" summary="" class="text11" bgcolor="#CCCCCC">
		<tr>
			<td>
				<table border="0" cellpadding="5" cellspacing="0" width="100%" summary="" class="text12" bgcolor="#FFFFFF">
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Post Applied for<span class="text11red">*</span> : </strong></td>
						<td width="60%">
							<input type="hidden" name="hid_post" value="" />
							<select name="optPostAppliedFor" class="flat" onchange="javascript:changeCategoryList(this.value)">
								<option value="">--Select--</option>
								<?php
									foreach($App['post_applied_for'] as $key => $val){
										echo '<option value="'.$key.'">'.$val.'</option>';
									}
								?>
							</select>
						</td>
					</tr>

					<tr><td colspan="2" height="5"></td></tr>
					<tr><td colspan="2"><strong><u>PERSONAL DETAILS</u></strong></td></tr>

					<tr>
						<td width="40%" align="right" nowrap><strong>Applicant's Name<span class="text11red">*</span> : </strong></td>
						<td width="60%"><input name="txtName" class="flat" type="text" value="" size="40"></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Father's Name<span class="text11red">*</span> : </strong></td>
						<td width="60%"><input name="txtFName" class="flat" type="text" value="" size="40"></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Date of Birth<span class="text11red">*</span> : </strong></td>
						<td width="60%">
							<input name="txtDOB" id="txtDOB" class="flat" type="text" value="" size="15" readonly />
							<input type="button"  class="formButton" value="--" onclick="displayCalendar(document.getElementById('txtDOB'),'dd-mm-yyyy',this,false);
                            " />&nbsp;&nbsp;&nbsp;
							<input type="button" name="reset" value="Clear" onclick="javascript: resetDate('txtDOB');" /></td>
						</td>
					</tr>
					<tr>
						<td width="30%" align="right" nowrap><strong>Age<span class="text11red">*</span> : </strong></td>
						<td> Years - <input name="txtAGE_YR" id="txtAGE_YR" class="flat" type="text" value="" size="5" readonly />, 
                        Months - <input name="txtAGE_MON" id="txtAGE_MON" class="flat" type="text" value="" size="5" readonly /></td>
                        
                        
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Gender<span class="text11red">*</span> : </strong></td>
						<td width="60%">
							<input name="rdoGender" class="flat" type="radio" value="Male" checked />&nbsp;Male&nbsp; &nbsp;
							<input name="rdoGender" class="flat" type="radio" value="Female" />&nbsp;Female
						</td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Category<span class="text11red">*</span> : </strong></td>
						<td width="60%">
							<select name="optCategory" class="flat">
								<option value="">--Select--</option>
								<?php
									foreach($App['category'] as $key => $val){
										echo '<option value="'.$key.'">'.$val.'</option>';
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Mobile<span class="text11red">*</span> : </strong></td>
						<td width="60%"><input name="txtMobile" class="flat" type="text" value="" size="15"></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Email Address : </strong></td>
						<td width="60%"><input name="txtEmailID" class="flat" type="text" value="" size="30"></td>
					</tr>
					<tr>
						<td width="40%" align="right" valign="top" nowrap><strong>Address : </strong></td>
						<td width="60%"><textarea name="txtAddress" class="flat" rows="3" cols="27"></textarea></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>City : </strong></td>
						<td width="60%"><input name="txtCity" class="flat" type="text" value="" size="30"></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>State : </strong></td>
						<td width="60%"><input name="txtState" class="flat" type="text" value="" size="30"></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Punjab Domicile : </strong></td>
						<td width="60%">
							<input name="rdoPDomicile" class="flat" type="radio" value="Yes" />&nbsp;Yes&nbsp; &nbsp;
							<input name="rdoPDomicile" class="flat" type="radio" value="No" />&nbsp;No
						</td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Punjabi in Matric : </strong></td>
						<td width="60%">
							<input name="rdoPMetric" class="flat" type="radio" value="Yes" />&nbsp;Yes&nbsp; &nbsp;
							<input name="rdoPMetric" class="flat" type="radio" value="No" />&nbsp;No

							&nbsp; &nbsp; &nbsp;
							<strong>If Yes, Percentage : </strong><input name="txtPMetricPercent" class="flat" type="text" value="" size="10">%
						</td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Pubjabi in Equivalent  : </strong></td>
						<td width="60%">
							<input name="rdoPEquivalent" class="flat" type="radio" value="Yes" />&nbsp;Yes&nbsp; &nbsp;
							<input name="rdoPEquivalent" class="flat" type="radio" value="No" />&nbsp;No
						</td>
					</tr>

					<tr><td colspan="2" height="5"></td></tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Experience From : </strong></td>
						<td width="60%"><input name="txtExpFrom" class="flat" type="text" value="" size="30"></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Experience Duration : </strong></td>
						<td width="60%"><input name="txtExpDuration" class="flat" type="text" value="" size="10">&nbsp;Months</td>
					</tr>
					
					<tr><td colspan="2" height="5"></td></tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Computer Course Name : </strong></td>
						<td width="60%"><input name="txtCompCourseName" class="flat" type="text" value="" size="40"></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Computer Course Institute : </strong></td>
						<td width="60%"><input name="txtCompCourseInstitute" class="flat" type="text" value="" size="40"></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Computer Course Duration : </strong></td>
						<td width="60%">
							<select name="CompCourseDuration" class="flat">
								<option value="">--Select--</option>
								<?php
									foreach($App['computer_course_duration'] as $key => $val){
										echo '<option value="'.$key.'">'.$val.'</option>';
									}
								?>
							</select>
						</td>
					</tr>
				
					<tr><td colspan="2" height="5"></td></tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Whether belonging to rural area  : </strong></td>
						<td width="60%">
							<input name="rdoRural" class="flat" type="radio" value="Yes" />&nbsp;Yes&nbsp; &nbsp;
							<input name="rdoRural" class="flat" type="radio" value="No" />&nbsp;No
						</td>
					</tr>
					<tr>
						<td width="40%" align="right" valign="top" nowrap><strong>Have you ever been suspended from Govt. job :<br />Found guilty by court </strong></td>
						<td width="60%">
							<input name="rdoGuilty" class="flat" type="radio" value="Yes" />&nbsp;Yes&nbsp; &nbsp;
							<input name="rdoGuilty" type="radio" value="No" />&nbsp;No
						</td>
					</tr>
					
					<tr><td colspan="2" height="5"></td></tr>
					<tr><td colspan="2"><strong><u>QUALIFICATION DETAILS</u></strong></td></tr>
					<tr>
						<td colspan="2">
							<table width="100%" border="1" cellpadding="3" cellspacing="0" class="text11">
								<tr bgcolor="#CCCCCC">
									<td><strong><i>Name of the exam Passed with discipline</i></strong></td>
									<td><strong><i>University / Board</i></strong></td>
									<td><strong><i>Passing year</i></strong></td>
									<td><strong><i>Marks obtained</i></strong></td>
									<td><strong><i>Total Marks</i></strong></td>
								</tr>
								<tr>
									<td><input name="txtExamName1" class="flat" type="text" value="" size="30"></td>
									<td><input name="txtBoard1" class="flat" type="text" value="" size="20"></td>
									<td><input name="txtPassingYr1" class="flat" type="text" value="" size="20"></td>
									<td><input name="txtMarks1" class="flat" type="text" value="" size="15"></td>
									<td><input name="txtTotalMarks1" class="flat" type="text" value="" size="15"></td>
								</tr>
								<tr>
									<td><input name="txtExamName2" class="flat" type="text" value="" size="30"></td>
									<td><input name="txtBoard2" class="flat" type="text" value="" size="20"></td>
									<td><input name="txtPassingYr2" class="flat" type="text" value="" size="20"></td>
									<td><input name="txtMarks2" class="flat" type="text" value="" size="15"></td>
									<td><input name="txtTotalMarks2" class="flat" type="text" value="" size="15"></td>
								</tr>
								<tr>
									<td><input name="txtExamName3" class="flat" type="text" value="" size="30"></td>
									<td><input name="txtBoard3" class="flat" type="text" value="" size="20"></td>
									<td><input name="txtPassingYr3" class="flat" type="text" value="" size="20"></td>
									<td><input name="txtMarks3" class="flat" type="text" value="" size="15"></td>
									<td><input name="txtTotalMarks3" class="flat" type="text" value="" size="15"></td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr><td colspan="2" height="5"></td></tr>
					<tr><td colspan="2"><strong><u>EXPERIENCE</u></strong></td></tr>
					<tr>
						<td colspan="2">
							<table width="100%" border="1" cellpadding="3" cellspacing="0" class="text11">
								<tr bgcolor="#CCCCCC">
									<td><strong><i>Name & address(es) of the Employer(s) in chronological order</i></strong></td>
									<td><strong><i>Period with Dates</i></strong></td>
									<td><strong><i>Nature of Duties</i></strong></td>
								</tr>
								<tr>
									<td><textarea name="txtEmployer1" class="flat" rows="3" cols="37"></textarea></td>
									<td><textarea name="txtEmpPeriod1" class="flat" rows="3" cols="37"></textarea></td>
									<td><textarea name="txtEmpDuties1" class="flat" rows="3" cols="37"></textarea></td>
								</tr>
								<tr>
									<td><textarea name="txtEmployer2" class="flat" rows="3" cols="37"></textarea></td>
									<td><textarea name="txtEmpPeriod2" class="flat" rows="3" cols="37"></textarea></td>
									<td><textarea name="txtEmpDuties2" class="flat" rows="3" cols="37"></textarea></td>
								</tr>
								<tr>
									<td><textarea name="txtEmployer3" class="flat" rows="3" cols="37"></textarea></td>
									<td><textarea name="txtEmpPeriod3" class="flat" rows="3" cols="37"></textarea></td>
									<td><textarea name="txtEmpDuties3" class="flat" rows="3" cols="37"></textarea></td>
								</tr>
							</table>
						</td>
					</tr>
				
					<tr><td colspan="2" height="5"></td></tr>
					<tr><td colspan="2"><strong><u>DETAILS OF FEE PAID</u></strong></td></tr>
					<tr>
						<td colspan="2">
							<table width="100%" border="1" cellpadding="3" cellspacing="0" class="text11">
								<tr bgcolor="#CCCCCC">
									<td><strong><i>DD No<span class="text11red">*</span></i></strong></td>
									<td><strong><i>Date<span class="text11red">*</span></i></strong></td>
									<td><strong><i>Amount<span class="text11red">*</span></i></strong></td>
									<td><strong><i>Name of the issuing Bank<span class="text11red">*</span></i></strong></td>
								</tr>
								<tr>
									<td><input name="txtDD" class="flat" type="text" value="" size="15"></td>
									<td>
	                                    <input name="txtDDDate" id="txtDDDate" class="flat" type="text" value="" size="13" readonly />
                                    	<input type="button2"  class="formButton" value="--" size="1" onclick="displayCalendar(document.getElementById('txtDDDate'),'dd-mm-yyyy',this,false);"  />&nbsp;&nbsp;&nbsp;
										<input type="button" name="reset" value="Clear" onclick="javascript: resetDate('txtDDDate');" /></td>
									<td><input name="txtDDAmount" class="flat" type="text" value="" size="20"></td>
									<td><input name="txtDDBank" class="flat" type="text" value="" size="40"></td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr><td colspan="2" height="20"></td></tr>
					<tr><td colspan="2">
						<strong>DECLARATION</strong><br />
						<p align="justify">
							I hereby declare that information filled in above is true to the best of my knowledge and has been filled up by me. In case of any information found incorrect, I will be held responsible.
						</p>
					</td></tr>
					<tr>
						<td align="left"><strong>DATED</strong>:</td>
						<td align="right"><strong>CANDIDATE's SIGNATURE</strong>&nbsp; &nbsp;</td>
					<tr>
					<tr><td colspan="2" height="20"></td></tr>

					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input name="btnLogin" class="flat" type="submit" onclick="javascript: return doValidate()" value="Register"></td>
					</tr>
					<tr>
						<td width="10%">&nbsp;</td>
						<td>&nbsp;</td>
						<td width="10%">&nbsp;</td>
					</tr>
									

				</table>
			</td>
		</tr>
	</table>
</form>

<div width="400" align="left"><?php echo $App['registration_instructions_bottom']; ?></div>


	<script language="javascript">
		document.frmRegister.optPostAppliedFor.focus();
	</script>

<?php } ?>
</center>	
