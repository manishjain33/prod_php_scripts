<?php
require "PHPMailer/PHPMailerAutoload.php";

$mail = new PHPMailer();
  $mail->IsSMTP();                                      // set mailer to use SMTP
  $mail->Host = "exmail.emirates.net.ae";  // specify main and backup server
  $mail->Port = "25";
  $mail->SMTPAuth = true;     // turn on SMTP authentication
  //$mail->SMTPSecure = 'ssl';
  $mail->Username = "alert@securepath.ae";  // SMTP username
  $mail->Password = "9004321"; // SMTP password

  $mail->From = "alert@securepath.ae";
  $mail->FromName = "SHAHIN Services";
  //$mail->AddAddress(strtolower($maildata[$i]['email']));
  $mail->AddAddress("manish.j@emcode.ae");
  //$mail->AddAddress("zainvptnr@gmail.com");                  // name is optional
  $mail->AddReplyTo("noreply@securepath.ae", "Information");

  $mail->WordWrap = 50;                                 // set word wrap to 50 characters
  $mail->IsHTML(true);                                  // set email format to HTML

  $mail->Subject = "Compliance with Standard Procedures (SP) and Installation of SecurePath Premium Tracking Devices, to comply with SHAHIN regulations.";

  $body="Hi this is test,<br>";

  $mail->Body    = $body;
  //$mail->AltBody = "This is the test mail for checking the SMTP settings.";
  if(!$mail->Send())
  {
     echo "Message could not be sent. <p>";
     echo "Mailer Error: " . $mail->ErrorInfo;
     exit;
  }
  echo " - Message has been sent <br>";
?>
