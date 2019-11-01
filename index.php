<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//print_r($_POST);
error_reporting(E_ALL);
session_start();
ini_set('max_execution_time', 300);
$subject = "Testing";
$header = "Naresh : Testing ";
$msg ="Hi <br> Thank you for registering with us.<br> Explore more by logging into your account.<br><br><br> Regards <br>Agribuz.";
//Sending Email
/**************
 * If Mail is not sent
 * need to give less access permissions
 * https://myaccount.google.com/lesssecureapps?pli=1
 *
 * https://support.google.com/accounts/answer/6010255
 *
 * by
 * visiting the link
 *
 */
include ('mailer/PHPMailer.php');
include ('mailer/SMTP.php');
$email = "naresh.dishaa@gmail.com";
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 1;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.office365.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'yeddunaresh@outlook.com';
$mail->Password = '';
$mail->setFrom('yeddunaresh@outlook.com', 'Naresh');
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $msg;
$mail->addAddress($email);
try {
if($mail->send()) {echo "sent";} else {echo  "Not Sent".$mail->ErrorInfo;;}
} catch (Exception $e) {
		print_r($mail);
}
exit();