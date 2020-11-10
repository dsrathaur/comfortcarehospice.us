<?php
//-------------------------------------------
// default smtp(phpmailer)
// change to clients smtp settings when launched
//-------------------------------------------
$host 		= 'smtp.mailgun.org';
$username 	= 'postmaster@mailgun.proweaver.com';
$password 	= '5b7c0c074cf27306ce725201b20afb78';
// set to false when using mail() function
$smtp = true;
// set true for testing otherwise for live
$testform = false;

if($testform){	
	$to_email 	= 'qatest@proweaver.net';
	$cc 		= '';
}else{
	$to_email 	= 'sajith.comfort@gmail.com';
	$cc 		= '';
}

$dcomp = 'Comfort Care Hospice';
$to_name 	= 'Info';
$bcc 		= '';
$from_email = (!empty($_POST['Email'])) ? $_POST['Email'] : $to_email;
$from_name 	= 'Message From Your Site';
/*
	If not hosted by us and email not send or receive uncomment code below.
	Note: If still does not send or receive $from_email value should the same on domain name.
		e.g. Website Link: www.mydomain.com, $from_email value should be email@mydomain.com
*/
//ini_set('sendmail_from', $from_email);
?>
