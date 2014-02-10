<?php

echo 'envoi du mail';
//include the file
require_once('lib/phpmailer/class.phpmailer.php');

$phpmailer          = new PHPMailer();


$phpmailer->IsSMTP(); // telling the class to use SMTP
$phpmailer->Host       = "smtp.gmail.com"; // SMTP server
$phpmailer->SMTPAuth   = true;                  // enable SMTP authentication
$phpmailer->Port       = 587;          // set the SMTP port for the GMAIL server; 465 for ssl and 587 for tls
$phpmailer->Username   = "tiritchi@gmail.com"; // Gmail account username
$phpmailer->Password   = "12030657";        // Gmail account password

$phpmailer->SetFrom('tiritchi@gmail.com', 'cedric pillet'); //set from name

$phpmailer->Subject    = "test";
$phpmailer->MsgHTML("blobloblbolbo");

$phpmailer->AddAddress("tiritchi@gmail.com", "cedric pillet");

if(!$phpmailer->Send()) {
  echo "Mailer Error: " . $phpmailer->ErrorInfo;
} else {
  echo "Message sent!";
}
?>