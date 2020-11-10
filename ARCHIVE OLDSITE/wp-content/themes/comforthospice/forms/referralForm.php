<?php
session_save_path($_SERVER['DOCUMENT_ROOT'].'/tmp');
@session_start();
require_once 'FormsClass.php';
$input = new FormsClass();

include 'form_details.php';
if($smtp)
include 'phpmailer/sendmail.php';

$formname = 'Send Your Referral Form';
$prompt_message = '<span style="color:#ff0000;">* = Required Information</span>';

if ($_POST){

	if ($_FILES["attachment"]["error"] > 0) {
		echo "";
	}
	else {
		//echo "Upload: " . $_FILES["attachment"]["name"] . "<br />";
		//echo "Type: " . $_FILES["attachment"]["type"] . "<br />";
		//echo "Size: " . ($_FILES["attachment"]["size"] / 1024) . " Kb<br />";
		//echo "Stored in: " . $_FILES["attachment"]["tmp_name"];
		
		if (file_exists("upload/" . $_FILES["file"]["name"])) {
			echo $_FILES["file"]["name"] . " already exists. ";
		} 
		else {
			move_uploaded_file($_FILES["file"]["tmp_name"],
			"upload/" . $_FILES["file"]["name"]);
		}
	}
	
	if(empty($_POST['Name_of_Patient']) ||		
		empty($_POST['Patient_Date_of_Birth']) ||
		empty($_POST['Patient_Address']) ||
		empty($_POST['Primary_Caregiver_Name']) ||
		empty($_POST['Attending_Physician_Name']) ||
		empty($_POST['Name_of_Person_giving_the_referral']) ||
		empty($_POST['secode'])) {
				
	
	$asterisk = '<span style="color:#FF0000; font-weight:bold;">*&nbsp;</span>';
	$asteriskEmail = '<span style="color:#FF0000;">Please enter a valid email address</span>';
	$prompt_message = $asterisk . '<span style="color:#FF0000;"> Required Fields are empty</span>';
	}
	/*else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",stripslashes(trim($_POST['Email']))))
		{ $prompt_message = '<span style="color:#FF0000;">Please enter a valid email address</span>';}*/
	else if($_SESSION['security_code'] != htmlspecialchars(trim($_POST['secode']), ENT_QUOTES)){
		$prompt_message = '<span style="color:#CC0000;">Invalid Security Code</span>';
	}else{
	
		$body = '<div align="left" style="width:900px; height:auto; font-size:12px; color:#333333; letter-spacing:1px; line-height:20px;">
			<div style="border:8px double #c3c3d0; padding:12px;">
			<div align="center" style="font-size:22px; font-family:Times New Roman, Times, serif; color:#051d38;">'.$dcomp.'</div>
			<div align="center" style="color:#990000; font-style:italic; font-size:13px; font-family:Arial;">('.$formname.')</div>
			<p>&nbsp;</p>
			<table width="90%" cellspacing="2" cellpadding="5" align="center" style="font-family:Verdana; font-size:13px">
				';
		
			foreach($_POST as $key => $value){
				if($key == 'secode') continue;
				elseif($key == 'submit') continue;
				
				if(!empty($value)){
					$key2 = str_replace('_', ' ', $key);
					if($value == ':') {
						$body .= '<tr><td colspan="2" style="background:#F0F0F0; line-height:30px"><b>'.$key2.'</b></td></tr>';
					}else {				
						$body .= '<tr><td><b>'.$key2.'</b>:</td> <td>'.htmlspecialchars(trim($value), ENT_QUOTES).'</td></tr>';
					}
				}
			}
			$body .= '
			</table>

			</div>
			</div>';	
	
		$subject = $dcomp . " [" . $formname . "]";		
		
		/************** for smtp ***********/
		if($smtp) { 
			if(!empty($_FILES['attachment']['name'])){
				$attachment_path = $_FILES['attachment']['tmp_name'];
			   $attachment_name = basename($_FILES['attachment']['name']);
			}else{
			   $attachment_path = 'none';
			   $attachment_name = 'none';
			  }
			   
			  // send email  
			  $mail = new SendMail($host, $username, $password);
			  $trysend = $mail->sendNow($to_email, $to_name, $cc, $bcc, $from_email, $from_name, $subject, $body, $attachment_path, $attachment_name);
			  if ($trysend == 'ok')
				$sent = true;
			  else
				$sent = false;
		}else {
		/************** for mail function ***********/
			$headers  = "MIME-Version: 1.0\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
			$headers .= "From: ".$from_name." <".$from_email.">\n";
			$headers .= "Cc: ".$cc."\n";
			$headers .= "Bcc: ".$bcc;
			
			//file attachment
			if(!empty($_FILES['attachment']['name'])){
				$magic_quotes = get_magic_quotes_runtime();
				set_magic_quotes_runtime(0);	
				$attach_name = basename($_FILES['attachment']['name']);
				$uid = md5(uniqid(time()));
				$headers = "From: ".$from_name." <".$from_email.">\n";
				$headers .= "Cc: ".$cc."\n";
				$headers .= "Bcc: ".$bcc."\n";
				$headers .= "MIME-Version: 1.0\n";
				$headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\n\n";
				$headers .= "--".$uid."\n";
				$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
				$headers .= "Content-Transfer-Encoding: 8bit\n\n";
				$headers .= $body;
				$headers .= "\n\n";
				$headers .= "--".$uid."\n";
				$headers .= "Content-Type: application/octet-stream; name=\"".$attach_name."\"\n";
				$headers .= "Content-Transfer-Encoding: base64\n";
				$headers .= "Content-Disposition: attachment; filename=\"".$attach_name."\"\n\n"; 
				$headers .= chunk_split(base64_encode(file_get_contents($_FILES['attachment']['tmp_name'])),76,"\n");
				$headers .= "\n\n";
				$headers .= "--".$uid."--\n";
				set_magic_quotes_runtime($magic_quotes);
			}	
			
			if(mail($to_email, $subject, $body, $headers)) {
				$sent = true;				
			}else {
				$sent = false;
			}
			
		}
		
		if($sent) {
				$success_msg = 'We appreciate your referrals. Thank you for your time.';
				$prompt_message ="<div style=\"width:auto; height:auto; padding-top:15x; padding-right:20px; padding-left:20px; margin:0 auto 0 auto; font-family:Times New Roman, Times, serif; font-weight:bold; border:6px #BABABA ridge; background:#F2F5F7\">
								<p align=\"center\" style=\"color:green; font-size:16px; font-style:italic;\">{$success_msg}</p></div>";
				unset($_POST);
		}else {
				$success_msg = 'Failed to send email. Please try again.';
				$prompt_message ="<div style=\"width:auto; height:auto; padding-top:15x; padding-right:20px; padding-left:20px; margin:0 auto 0 auto; font-family:Times New Roman, Times, serif; font-weight:bold; border:6px #BABABA ridge; background:#F2F5F7\">
								<p align=\"center\" style=\"color:#FF0000; font-size:16px; font-style:italic;\">{$success_msg}</p></div>";
		}
	}	
}
/*************declaration starts here************/

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php $dcomp; ?></title>

<link rel="stylesheet" type="text/css" media="screen" href="../scripts/jquery-ui.css" />
<link rel="stylesheet" type="text/css" media="screen" href="../scripts/ui.button.css" />

<script src="../scripts/lib/jquery.js" type="text/javascript"></script>
<script src="../scripts/jquery.validate.js" type="text/javascript"></script>
<script src="../scripts/jquery.ui.core.js" type="text/javascript"></script>
<script src="../scripts/jquery.ui.widget.js" type="text/javascript"></script>
<script src="../scripts/jquery.ui.button.js" type="text/javascript"></script>
<!--<script src="../scripts/themeswitchertool" type="text/javascript" ></script>-->

<script type="text/javascript">
$.validator.setDefaults({
	//submitHandler: function() { alert("submitted!"); },
	highlight: function(input) {
		$(input).addClass("ui-state-highlight");
	},
	unhighlight: function(input) {
		$(input).removeClass("ui-state-highlight");
	}
});

$().ready(function() {
	$.fn.themeswitcher && $('<div/>').css({
		position: "absolute",
		right: 10,
		top: 10
	}).appendTo(document.body).themeswitcher();
	
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			Name_of_Patient: "required",
			Patient_Date_of_Birth: "required",
			Patient_Address: "required",
			Primary_Caregiver_Name: "required",
			Attending_Physician_Name: "required",
			Name_of_Person_giving_the_referral: "required",
			secode: "required"

		
		},
		messages: {
			Name_of_Patient: "Required",
			Patient_Date_of_Birth: "Required",
			Patient_Address: "Required",
			Primary_Caregiver_Name: "Required",
			Attending_Physician_Name: "Required",
			Name_of_Person_giving_the_referral: "Required",
			secode: "Required"
		}
	});
	
	//$("#signupForm input:not(:submit)").addClass("");
	//$("#signupForm input:not(:submit)").addClass("form");
	//$(":submit").button();
	
	
});
</script>

<style type="text/css">
	body { font-size: 6px;; }
	label { display: inline-block; width: 200px; font-size:13px; }
	legend { padding: 0.5em; }
	fieldset fieldset label { display: block; color: red; }
	#signupForm { width: 100%; }
	#signupForm label.error {
		width: auto;
		display: block;
		font-size:11px;
		font-weight:bold;
	}
	.ui-state-highlight, .ui-widget-content .ui-state-highlight{
		border:1px solid red;
	}
	.ui-widget input, select, textarea{
		border-radius:5px;
		border:1px solid #999999;
		padding:5px 5px;
	}
</style>

</head>
<body style="font-family:Arial; font-size:12px; color:#333333; margin:0;"><a name="top" id="top"></a>
<form class="cmxform" id="signupForm" method="post" action="#top" enctype="multipart/form-data" onsubmit="parent.scrollTo(0, 500); return true">
<fieldset class="ui-widget ui-widget-content ui-corner-all">
	<table border="0" width="100%"  align="center"  cellpadding="5px;">	
		<tr><td colspan="4" align="left"><?php echo $prompt_message; ?></td></tr>
		<tr><td>&nbsp;</td></tr>
		<!--tr>
			<td>Name of Referer <span style="color:#FF0000; font-weight:bold;">*</span></td>
			<td class="ui-widget ui-widget-header2"><?php $input->fields('Name_of_referer','width: 150px;'); ?></td>
			<td>Email <span style="color:#FF0000; font-weight:bold;">*</span></td>
			<td class="ui-widget ui-widget-header2"><?php $input->fields('Email','width: 150px;'); ?></td>
		</tr>
		<tr><td colspan="4"><hr size="1" noshade="noshade" color="#B2AD80" /></td></tr-->
		
				<tr>
					<td align="left">Name of Patient <span style="color:#FF0000; font-weight:bold;">*</span></td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Name_of_Patient','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Date of Birth <span style="color:#FF0000; font-weight:bold;">*</span></td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Patient_Date_of_Birth','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Address <span style="color:#FF0000; font-weight:bold;">*</span></td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Patient_Address','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Phone Number</td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Phone_Number','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Primary Caregiver Name <span style="color:#FF0000; font-weight:bold;">*</span></td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Primary_Caregiver_Name','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Contact Information</td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Primary_Caregiver_Name_Contact_Information','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Insurance or Medicare Number</td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Insurance_or_Medicare_Number','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Attending Physician Name <span style="color:#FF0000; font-weight:bold;">*</span></td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Attending_Physician_Name','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Contact Numbers</td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Attending_Physician_Name_Contact_Numbers','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Fax</td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Attending_Physician_Name_Fax','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Hospice Diagnosis</td>
					<td align="left"><?php $input->fields('Hospice_Diagnosis','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Name of Person giving the referral <span style="color:#FF0000; font-weight:bold;">*</span></td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Name_of_Person_giving_the_referral','width: 250px;'); ?></td>
				</tr>
				<tr>
					<td align="left">Contact Number of Person giving the referral</td>
					<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('Contact_Number_of_Person_giving_the_referral','width: 250px;'); ?></td>
				</tr>
			
		<!--tr><td colspan="4"><hr size="1" noshade="noshade" color="#B2AD80" /></td></tr>
		<tr>
			<td colspan="4">
			<table align="center" width="90%">
				<tr>
					<td align="center"><strong>Name</strong></td>
					<td align="center"><strong>Email</strong></td>
					<td align="center"><strong>Phone</strong></td>
					<td align="left" width="1%">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Name_1','width: 150px;'); ?></td>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Email_1','width: 150px;'); ?></td>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Phone_1','width: 150px;'); ?></td>
					<td align="left" width="1%">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Name_2','width: 150px;'); ?></td>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Email_2','width: 150px;'); ?></td>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Phone_2','width: 150px;'); ?></td>
					<td align="left" width="1%">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Name_3','width: 150px;'); ?></td>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Email_3','width: 150px;'); ?></td>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Phone_3','width: 150px;'); ?></td>
					<td align="left" width="1%">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Name_4','width: 150px;'); ?></td>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Email_4','width: 150px;'); ?></td>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Phone_4','width: 150px;'); ?></td>
					<td align="left" width="1%">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Name_5','width: 150px;'); ?></td>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Email_5','width: 150px;'); ?></td>
					<td align="center" class="ui-widget ui-widget-header2"><?php $input->fields('Phone_5','width: 150px;'); ?></td>
					<td align="left" width="1%">&nbsp;</td>
				</tr>
			</table>
			</td>
			</tr-->	
			<tr>
				<td align="left">Attach Medical Record/s</td>
				<td align="left"><input type="file" name="attachment" size="30" /></td>
			</tr>
			<tr><td colspan="2"><hr size="1" noshade="noshade" color="#B2AD80" /></td></tr>
			<tr>
				<td >Security Code <span style="color:#FF0000; font-weight:bold;">*</span> </td>
				<td align="left" class="ui-widget ui-widget-header2"><?php $input->fields('secode','width: 250px;'); ?></td>
			</tr>
			<tr>
				<td >&nbsp;</td>
				<td align="left"><img src="../securitycode/SecurityImages.php?characters=5" border="0" /></td>	
			</tr>
			<tr><td colspan="2"><hr size="1" noshade="noshade" color="#B2AD80" /></td></tr>
			<tr>
				<td colspan="2" align="center"><?php $input->buttons('submit','submit','Submit','cursor: pointer;'); ?></td>
			</tr>
		</table>
	</table>
</fieldset>	
</form>
</body>
</html>