<?php
//-------------------------------------------
// default smtp(phpmailer)
// change to clients smtp settings when launched
//-------------------------------------------
$host 		= 'smtp.ipage.com';
$username 	= 'onlineform@comfortcarehospice.us';
$password 	= 'ProW3@veR!@';
// set to false when using mail() function
$smtp = true;
// set true for testing otherwise for live
$testform = false;

if($testform){	
	$to_email 	= 'onlineform@comfortcarehospice.us';
	$cc 		= '';
}else{
	$to_email 	= 'info@comfortcarehospice.us';
	//$to_email 	= 'sajith.comfort@gmail.com';
	$cc 		= '';
}

$dcomp = 'Comfort Care Hospice';
$to_name 	= 'Info';
$bcc 		= 'nsproweaver@gmail.com';
$from_email = 'onlineform@comfortcarehospice.us';
$from_name 	= 'Message From Your Site';
/*
	If not hosted by us and email not send or receive uncomment code below.
	Note: If still does not send or receive $from_email value should the same on domain name.
		e.g. Website Link: www.mydomain.com, $from_email value should be email@mydomain.com
*/
//ini_set('sendmail_from', $from_email);
?>
