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

  $body="Dear Customer,<br>"
         ."<p>Company Name : </br>
           Contact Person : </br>
           Email: </br>
           Contact No : </br>
           Vehicle Count : </br></br></p>" 
         ."<p>TIn our persistent drive to achieve the pinnacle of safety, security, and operational integrity standards, it is imperative that all specified vehicles align with the stipulated Standard Procedures (SP).</p>"
          ."<p>Furthering this objective, the SHAHIN regulations mandate that all individuals or entities owning freight transportation vehicles and trucks registered within the Emirates of Dubai, register their respective vehicles with the SHAHIN online portal system.</p>"
          ."<p>SHAHIN Portal Details: <a href='https://shahin.securepath.ae'>https://shahin.securepath.ae</a></p>"
          ."<p><b>Action Items:</b></p>"
          ."<p><ol><li>Review the status of each vehicle vis-à-vis our Standard Procedures (SP).</li>"
          ."<br>Vehicles Requiring GPS Tracking by 15th September 2023:<br>"
          ."<table><tr><td>S.No</td><td>License Plate</td><td>Emirates</td></tr><tr></tr></table>"
          ."<p>SecurePath Premium Vendors:<br><a href='http://securepath.ae/securepathpremium'>http://securepath.ae/securepathpremium</a></p>"
          ."<p>For all questions and complaints, kindly contact: care@securepath.ae.</p>"
          ."<p>Regards,<br><br>Team Shahin</p>";

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
