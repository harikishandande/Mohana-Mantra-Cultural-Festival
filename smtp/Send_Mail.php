<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';

$mail       = new PHPMailer();
$mail->SMTPDebug = 1;
$mail->IsSMTP(true);            
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  
$mail->Host       = "smtpout.asia.secureserver.net"; 
$mail->Port       =  25;                   
$mail->Username   = "support@mohanamantra.com";  
$mail->Password   = "kishanking360";  
$mail->SetFrom('support@mohanamantra.com', 'Mohana Mantra 2k14');
$mail->AddReplyTo('support@mohanamantra.com','Mohana Mantra 2k14');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();   
}
?>