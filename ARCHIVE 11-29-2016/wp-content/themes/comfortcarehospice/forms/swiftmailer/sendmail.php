<?php
class SendMail
{
	private function isEmail($email)
	{
		return !empty($email) && preg_match('/^[a-z\p{L}0-9!#$%&\'*+\/=?^`{}|~_-]+[.a-z\p{L}0-9!#$%&\'*+\/=?^`{}|~_-]*@[a-z\p{L}0-9]+[._a-z\p{L}0-9-]*\.[a-z0-9]+$/ui', $email);
	}

	private function isMailName($mailName)
	{
		return preg_match('/^[^<>;=#{}]*$/u', $mailName);
	}

	private function isMailSubject($mailSubject)
	{
		return preg_match('/^[^<>]*$/u', $mailSubject);
	}

	private function isGenericName($name)
	{
		return empty($name) OR preg_match('/^[^<>;=#{}]*$/u', $name);
	}
	
	public function sendNow($domainname, $body, $subject, $to, $toName = null, $from = null, $fromName = null, $cc = null, $bcc = null, $SMTP = null, $fileAttachment = null, $type = 'text/html')
	{
		// include swift files
		include_once('swift/Swift.php');
		include_once('swift/Swift/Connection/SMTP.php');
		include_once('swift/Swift/Connection/NativeMail.php');
		include_once('swift/Swift/Plugin/Decorator.php');
		
		if (!isset($domainname)){
			return false;
		}
		
		if (!isset($from)) $from = 'no-reply@domain.com';
		if (!isset($fromName)) $fromName = 'no reply';

		if (!empty($from) && !$this->isEmail($from))
		{
			return false;
		}
		
		if (!empty($fromName) && !$this->isMailName($fromName))
		{
			return false;
		}
		
		if (is_string($toName))
		{
			if (!empty($toName) && !$this->isMailName($toName))
				$toName = null;
		}

		if (!$this->isMailSubject($subject))
		{
			return false;
		}

		if (is_array($to))
		{
			$to_list = new Swift_RecipientList();
			foreach ($to as $key => $addr)
			{
				$to_name = null;
				$addr = trim($addr);
				if (!$this->isEmail($addr))
				{
					return false;
				}
				if (is_array($toName))
				{
					if ($toName && is_array($toName) && $this->isGenericName($toName[$key]))
						$to_name = $toName[$key];
				}
				if ($to_name == null)
					$to_name = $addr;
				$to_list->addTo($addr, '=?UTF-8?B?'.base64_encode($to_name).'?=');
			}
			$to_plugin = $to[0];
			$to = $to_list;
		} else {
			$to_plugin = $to;
			if ($toName == null)
				$toName = $to;
			$to = new Swift_Address($to, '=?UTF-8?B?'.base64_encode($toName).'?=');
		}
		try {
			if ($SMTP && is_array($SMTP))
			{
				if (empty($SMTP['SERVER']) || empty($SMTP['PORT']))
				{
					return false;
				}
				$connection = new Swift_Connection_SMTP($SMTP['SERVER'], $SMTP['PORT'],
								($SMTP['ENCRYPTION'] == 'ssl') ? Swift_Connection_SMTP::ENC_SSL :
								(($SMTP['ENCRYPTION'] == 'tls') ? Swift_Connection_SMTP::ENC_TLS : Swift_Connection_SMTP::ENC_OFF));
				$connection->setTimeout(20);
				if (!$connection)
					return false;
				if (!empty($SMTP['USER']))
					$connection->setUsername($SMTP['USER']);
				if (!empty($SMTP['PASSWORD']))
					$connection->setPassword($SMTP['PASSWORD']);
			}
			else
				$connection = new Swift_Connection_NativeMail();

			if (!$connection)
				return false;
			
			$swift = new Swift($connection, $domainname);
			
			$message = new Swift_Message($subject);
			$message->headers->setEncoding('Q');
			if(!empty($cc)){
				if(!is_array($cc)){
					$data_cc = $cc;
					$cc = array();
					$cc[] = $data_cc;
				}
			}
			if(!empty($bcc)){
				if(!is_array($bcc)){
					$data_bcc = $bcc;
					$bcc = array();
					$bcc[] = $data_bcc;
				}
			}
			$message->attach(new Swift_Message_Part($body, $type, '8bit', 'utf-8'));
			if ($fileAttachment && isset($fileAttachment['content']) && isset($fileAttachment['name']))
				$message->attach(new Swift_Message_Attachment($fileAttachment['content'], $fileAttachment['name']));
			/* Send mail */
			$send = $swift->send($message, $to, new Swift_Address($from, $fromName), $cc, $bcc);
			$swift->disconnect();
			return $send;
		}

		catch (Swift_ConnectionException $e)
		{
			return false;
		}
	}
}
?>