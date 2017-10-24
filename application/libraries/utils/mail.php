<?php
// konfigurasi
//$connection = new Db_connection();
//$connection->open_database();
//$user = new Pelaporan();
//$user->get_mail();
$set_smtp_host = "mail.suryatimur.net";
$set_smtp_user = "yogi@suryatimur.net";
$set_smtp_pass = "101007";

require_once ('class.smtp.php');
require_once ('class.phpmailer.php');
 
$PHPMAILER_LANG = array();
 
$PHPMAILER_LANG["provide_address"] = 'You must provide at least one ' .
                                     'recipient email address.';
$PHPMAILER_LANG["mailer_not_supported"] = ' mailer is not supported.';
$PHPMAILER_LANG["execute"] = 'Could not execute: ';
$PHPMAILER_LANG["instantiate"] = 'Could not instantiate mail function.';
$PHPMAILER_LANG["authenticate"] = 'SMTP Error: Could not authenticate.';
$PHPMAILER_LANG["from_failed"] = 'The following From address failed: ';
$PHPMAILER_LANG["recipients_failed"] = 'SMTP Error: The following ' .
                                       'recipients failed: ';
$PHPMAILER_LANG["data_not_accepted"] = 'SMTP Error: Data not accepted.';
$PHPMAILER_LANG["connect_host"] = 'SMTP Error: Could not connect to SMTP host.';
$PHPMAILER_LANG["file_access"] = 'Could not access file: ';
$PHPMAILER_LANG["file_open"] = 'File Error: Could not open file: ';
$PHPMAILER_LANG["encoding"] = 'Unknown encoding: ';
 
$mail = new PHPMailer();
 
// setting SMTP
$mail->IsSMTP();  // send via SMTP
$mail->Host     = $set_smtp_host; // SMTP servers
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = $set_smtp_user;  // SMTP username
$mail->Password = $set_smtp_pass; // SMTP password\
$mail->Port       = "26";  
?>