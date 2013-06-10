<?php

if(!defined('REGISTER_INCLUDE_CHECK')) die('You are not allowed to execute this file directly');


/* Database config */

$db_host		= 'localhost';
$db_user		= 'gcgpcixa_admin';
$db_pass		= 'GCG#Patiala';
$db_database		= 'gcgpcixa_college'; 

/* End config */



$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);

?>