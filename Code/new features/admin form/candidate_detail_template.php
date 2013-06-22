<center>
<div><span class="title2">Candidate Detail</span></div>
<br>
<br />

	<table border="0" cellpadding="1" cellspacing="0" width="800" summary="" class="text11" bgcolor="#CCCCCC">
		<tr>
			<td>
				<table border="0" cellpadding="5" cellspacing="0" width="100%" summary="" class="text12" bgcolor="#FFFFFF">
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Registration No. : </strong></td>
						<td width="60%"><?php echo $row->registrationID; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Post Applied for : </strong></td>
						<td width="60%"><?php echo $row->postAppliedFor; ?></td>
					</tr>

					<tr><td colspan="2" height="5"></td></tr>
					<tr><td colspan="2"><strong><u>PERSONAL DETAILS</u></strong></td></tr>

					<tr>
						<td width="40%" align="right" nowrap><strong>Applicant's Name : </strong></td>
						<td width="60%"><?php echo $row->name; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Father's Name : </strong></td>
						<td width="60%"><?php echo $row->fatherName; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Date of Birth : </strong></td>
						<td width="60%"><?php echo $row->dob; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Gender : </strong></td>
						<td width="60%"><?php echo $row->gender; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Category : </strong></td>
						<td width="60%"><?php echo $row->category; ?></select>
						</td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Mobile : </strong></td>
						<td width="60%"><?php echo $row->mobile; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Email Address : </strong></td>
						<td width="60%"><?php echo $row->emailID; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" valign="top" nowrap><strong>Address : </strong></td>
						<td width="60%"><?php echo nl2br($row->address); ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>City : </strong></td>
						<td width="60%"><?php echo $row->city; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>State : </strong></td>
						<td width="60%"><?php echo $row->state; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Punjab Domicile : </strong></td>
						<td width="60%"><?php echo $row->punjabDomicile; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Punjabi in Matric : </strong></td>
						<td width="60%"><?php echo $row->punjabiInMatric; ?>

							&nbsp; &nbsp; &nbsp;
							<strong>If Yes, Percentage : </strong><?php echo $row->punjabiInMatricPercent; ?>%
						</td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Pubjabi in Equivalent  : </strong></td>
						<td width="60%"><?php echo $row->pubjabiInEquivalent; ?></td>
					</tr>

					<tr><td colspan="2" height="5"></td></tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Experience From : </strong></td>
						<td width="60%"><?php echo $row->experienceFrom; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Experience Duration : </strong></td>
						<td width="60%"><?php echo $row->experienceDuration; ?>&nbsp;Months</td>
					</tr>
					
					<tr><td colspan="2" height="5"></td></tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Computer Course Name : </strong></td>
						<td width="60%"><?php echo $row->compCourse; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Computer Course Institute : </strong></td>
						<td width="60%"><?php echo $row->compInstitute; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Computer Course Duration : </strong></td>
						<td width="60%"><?php echo $row->compDuration; ?></td>
					</tr>
				
					<tr><td colspan="2" height="5"></td></tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Whether belonging to rural area  : </strong></td>
						<td width="60%"><?php echo $row->ruralFlag; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" valign="top" nowrap><strong>Have you ever been suspended from Govt. job :<br />Found guilty by court </strong></td>
						<td width="60%"><?php echo $row->guiltyFlag; ?></td>
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
									<td><?php echo $row->examName1; ?></td>
									<td><?php echo $row->boardName1; ?></td>
									<td><?php echo $row->passingYear1; ?></td>
									<td><?php echo $row->marks1; ?></td>
									<td><?php echo $row->totalMarks1; ?></td>
								</tr>
								<tr>
									<td><?php echo $row->examName2; ?></td>
									<td><?php echo $row->boardName2; ?></td>
									<td><?php echo $row->passingYear2; ?></td>
									<td><?php echo $row->marks2; ?></td>
									<td><?php echo $row->totalMarks2; ?></td>
								</tr>
								<tr>
									<td><?php echo $row->examName3; ?></td>
									<td><?php echo $row->boardName3; ?></td>
									<td><?php echo $row->passingYear3; ?></td>
									<td><?php echo $row->marks3; ?></td>
									<td><?php echo $row->totalMarks3; ?></td>
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
									<td><?php echo nl2br($row->employer1); ?></td>
									<td><?php echo nl2br($row->empPeriod1); ?></td>
									<td><?php echo nl2br($row->empDuties1); ?></td>
								</tr>
								<tr>
									<td><?php echo nl2br($row->employer2); ?></td>
									<td><?php echo nl2br($row->empPeriod2); ?></td>
									<td><?php echo nl2br($row->empDuties2); ?></td>
								</tr>
								<tr>
									<td><?php echo nl2br($row->employer3); ?></td>
									<td><?php echo nl2br($row->empPeriod3); ?></td>
									<td><?php echo nl2br($row->empDuties3); ?></td>
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
									<td><strong><i>DD No</i></strong></td>
									<td><strong><i>Date</i></strong></td>
									<td><strong><i>Amount</i></strong></td>
									<td><strong><i>Name of the issuing Bank</i></strong></td>
								</tr>
								<tr>
									<td><?php echo $row->ddNo; ?></td>
									<td><?php echo $row->ddDate; ?></td>
									<td><?php echo $row->ddAmount; ?></td>
									<td><?php echo $row->ddBank; ?></td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr><td colspan="2" height="20"></td></tr>
					
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input name="btnClose" class="flat" type="button" value="Close" onclick="javascript: window.close()"></td>
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

</center>	
