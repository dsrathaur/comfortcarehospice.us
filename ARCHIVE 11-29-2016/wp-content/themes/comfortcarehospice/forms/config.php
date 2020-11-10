<?php
ini_set('display_errors', 'off');
error_reporting(E_ALL);
define('COMP_EMAIL', 'sajith.comfort@gmail.com'); // company email, CIENTS EMAIL HERE
define('MAIL_METHOD', 'PHPMAIL'); // SMTP or PHPMAIL (PHP Mail Function)
define('SMTP_SERVER', 'smtp.mailgun.org'); // SMTP server
define('SMTP_USER', 'postmaster@mailgun.proweaver.com'); // SMTP username
define('SMTP_PASSWD', '5b7c0c074cf27306ce725201b20afb78'); // SMTP password
define('SMTP_ENCRYPTION', 'off'); // TLS, SSL or off
define('SMTP_PORT', 587); // SMPT port number 587 or default
define('COMP_NAME', 'Comfort Care Hospice'); // company name
define('MAIL_TYPE', 1); // 1 - html, 2 - txt
define('MAIL_DOMAIN', 'http://www.comfortcarehospice.us/'); // company domain

// do not edit
$subject = COMP_NAME . " [" . $formname . "]";
$template = 'template';
$to_name = NULL;
$from_email = NULL;
$from_name = 'Message From Your Site';
$attachments = array();

// testing here
$testform = false;
if($testform){	
	$to_email 	= 'pdqapw5@gmail.com';
}else{
	$to_email 	= 'sajith.comfort@gmail.com';  // CIENTS EMAIL HERE
}