<?php

//define(HOST, "localhost");
//define(USERNAME, "root");
//define(PASSWORD, "");
//define(DBNAME, "dbForum");
error_reporting(0);

define(HOST, "localhost");
define(USERNAME, "counsell_admit");
define(PASSWORD, "admitCard123");
define(DBNAME, "counsell_admitCard");

## setting global variable
$App['site_name']	= "Online Application";
$App['site_title']	= "Online Application";
$App['from_email']  = "etppcb2011@gmail.com";

//$App['login_instructions'] = '<ul class="text12"><li>Instructions 1</li><li>Instructions 2</li><li>Instructions 3</li></ul>';
$App['login_instructions'] 					= '';
$App['registration_instructions_top'] 		= '';
$App['registration_instructions_bottom'] 	= '';

$App['post_applied_for']			= array('Assistant Environmental Engineer'	=> 'Assistant Environmental Engineer',
											'Junior Environmental Engineer'		=> 'Junior Environmental Engineer',
											'Scientific Assistant'	          	=> 'Scientific Assistant'
                                           );

$App['category']['Assistant Environmental Engineer']		= array('Scheduled Caste'			=> 'Scheduled Caste',
																	'Backward Classes'			=> 'Backward Classes',
																	'Ex-serviceman - General'	=> 'Ex-serviceman - General',
																	'Ex serviceman-SC'			=> 'Ex serviceman-SC',
																	'Sportsman -SC'				=> 'Sportsman -SC',
																	'sportsman-general'			=> 'sportsman-general',
																	'Deaf / Partial Deaf'		=> 'Deaf / Partial Deaf',
																	'General Category'			=> 'General Category',
											                       );
$App['category']['Junior Environmental Engineer']			= array('Scheduled Caste'			=> 'Scheduled Caste',
																	'Backward Classes'			=> 'Backward Classes',
																	'Ex-serviceman'				=> 'Ex-serviceman',
																	'General Category'			=> 'General Category',
																   );
$App['category']['Scientific Assistant']					= array('Scheduled Caste'			=> 'Scheduled Caste',
																	'Backward Classes'			=> 'Backward Classes',
																	'Ex-serviceman'				=> 'Ex-serviceman',
																	'General Category'			=> 'General Category',
											                       );

$App['computer_course_duration']	= array('1 Year'	=> '1 Year',
											'6 Months'	=> '6 Months'
											);

$App['test_date']				= '25/07/2011';
$App['test_time']				= '02:30 PM';
$App['test_centre']				= 'Thapar University';
$App['test_centre_address']		= 'Thapar University<br />P.O Box 32, Patiala, Pin - 14700';

?>
