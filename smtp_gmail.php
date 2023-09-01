<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$username = "dps";
$password = "dps123";
$hostname = "172.16.1.4"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) ;
$selected = mysqli_select_db($dbhandle,"boxdrop") ;
if($dbhandle->connect_errno > 0)
    {
        die('Unable to connect to database' . $dbhandle->connect_error);
    }
$sql = "SELECT * from users where mobile!=0";

$result = mysqli_query($dbhandle,$sql);
while ($usermail = mysqli_fetch_assoc($result))
{
  $user[]=$usermail;
}
mysqli_close($dbhandle);

for ($a=0;$a<count($user);$a++){
//for ($a=0;$a<1;$a++){
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'donotreply@boxdrop.ae';                     //SMTP username
        $mail->Password   = 'lyyokxlfiaqyhcxo';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('donotreply@boxdrop.ae', 'BoxDrop');
        $mail->addAddress(strtolower($user[$a]['email']));     //Add a recipient
        //$mail->addAddress('shareef@emcode.ae');               //Name is optional
        //$mail->addAddress('manish.j@emcode.ae');               //Name is optional
        $mail->addReplyTo('donotreply@boxdrop.ae', 'Information');
        //$mail->addCC('');
        //$mail->addBCC('zainudheen.f@emcode.ae');
        //$mail->addBCC('shareef@emcode.ae');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'BoxDrop Login Information';
        $mail->Body    = 'Dear Customer,<br>'
                         .'<p>Under the initiative of SIRA ( Security Industry Regulatory Agency), to improve the security of valuable goods delivery services in Dubai, We are delighted to extend an exclusive invitation to you and your esteemed company to join our new and groundbreaking Last Minute Deliver App for Precious Items, called BoxDrop.</p>'
                         .'<p>You can use the following information to login:</p>'
                         .'<p>Registered mobile number: '.$user[$a]['mobile'].'</p>'
                         .'<p>Registered email ID: '.$user[$a]['email'].'</p>'
                         .'<p>During Phase 1, we are excited to offer this service exclusively in the Gold Souk area, catering specifically to the transfer of goods within the souk. This localized approach guarantees efficient and reliable delivery within the designated zone.</p>'
                         .'<p>Please do not hesitate to reach out to us at care@boxdrop.ae, if you have any questions or require further assistance. We are here to support you every step of the way.</p>'
                         .'<p>Thank you for considering our invitation. We look forward to welcoming your esteemed company to our exclusive network of trusted money exchange and jewelers.</p>'
                         .'<p>Best regards,<br><br>Team BoxDrop</p>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        print_r($user[$a]['email']);
        echo ' - Message has been sent <br> \n ';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    sleep(3);
}
?>