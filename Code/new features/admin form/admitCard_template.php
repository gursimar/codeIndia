<center>

	<table border="0" cellpadding="1" cellspacing="0" width="700" summary="" class="text14black" bgcolor="#CCCCCC">
		<tr>
			<td>
				<table border="0" cellpadding="5" cellspacing="0" width="100%" summary="" class="text14black" bgcolor="#FFFFFF">
					<tr>
						<td colspan="2" height="2">&nbsp;</td>
					</tr>

					<tr>
						<td>
							<table style="border:1px solid black; width:150px; height:150px;">
								<tr><td valign="middle" align="center">Your recent passport size photograph</td></tr>
							</table>
						</td>
						<td align="right">
							<img src="img/tu1.jpg" border="0" /><br />
							<big>Thapar University</big><br />
							Patiala Punjab - 147004
						</td>
					</tr>
					
					<tr><td colspan="2" height="10"></td></tr>
					<tr><td colspan="2" align="center" class="title2"><strong>Admit Card</strong></td></tr>
					<tr><td colspan="2" height="10"></td></tr>

					<tr>
						<td width="40%" align="right" nowrap><strong>Registration Number: </strong></td>
						<td width="60%"><?php echo $_SESSION['user']->registrationID; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Test Date: </strong></td>
						<td width="60%"><?php echo $App['test_date']; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Test Time: </strong></td>
						<td width="60%"><?php echo $App['test_time']; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Candidate's Name: </strong></td>
						<td width="60%"><?php echo $_SESSION['user']->name; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Father Name: </strong></td>
						<td width="60%"><?php echo $_SESSION['user']->fatherName; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" valign="top" nowrap><strong>Candidate's Address: </strong></td>
						<td width="60%">
							<?php echo nl2br($_SESSION['user']->address); ?><br />
							<?php echo $_SESSION['user']->city." - ".$_SESSION['user']->state; ?>
						</td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Category: </strong></td>
						<td width="60%"><?php echo $_SESSION['user']->category; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" nowrap><strong>Birth Date: </strong></td>
						<td width="60%"><?php echo date("d-m-Y", strtotime($_SESSION['user']->dob)); ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" valign="top" nowrap><strong>Test Centre: </strong></td>
						<td width="60%"><?php echo $App['test_centre']; ?></td>
					</tr>
					<tr>
						<td width="40%" align="right" valign="top" nowrap><strong>Test Centre Address: </strong></td>
						<td width="60%"><?php echo $App['test_centre_address']; ?></td>
					</tr>
		
					<tr><td colspan="2" height="30"></td></tr>
					<tr><td colspan="2">
						<ol>Instructions
							<li>You will need to bring at least one photo identification to the test centre. Acceptable forms of photo identification are Driver's license, Passport, PAN Card, Voter ID, College ID, Employee identification card, or a notarized Affidavit with Photo, Signature, Date of Birth and Residential Address. Candidates will not be permitted to take the test if photo identification is not presented</li>
							<li>If you are a candidate belonging to the SC/ST category and paid the discount fees, then please bring a valid document as proof of your SC/ST eligibility. Without proper documentation, you may not be permitted to take the test.</li>
							<li>You should bring a printed copy of this Admit Card with you to the test center.</li>
							<li>You must arrive 30 minutes before the test is scheduled to start in order to begin the check in process.</li>
						</ol>
					</td></tr>

				</table>
			</td>
		</tr>
	</table>

</center>	
