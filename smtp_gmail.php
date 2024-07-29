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

//for ($a=0;$a<count($user);$a++){
for ($a=0;$a<1;$a++){
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
        //$mail->addAddress(strtolower($user[$a]['email']));     //Add a recipient
        //$mail->addAddress('shareef@emcode.ae');               //Name is optional
        $mail->addAddress('manish.j@emcode.ae');               //Name is optional
        $mail->addReplyTo('donotreply@boxdrop.ae', 'Information');
        //$mail->addCC('');
        //$mail->addBCC('zainudheen.f@emcode.ae');
        //$mail->addBCC('shareef@emcode.ae');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Exciting News: BoxDrop 2.0 is Here!';
        $mail->Body    = 'Dear Valued User,<br>'
                         .'<p>We are thrilled to announce the launch of BoxDrop 2.0! With your invaluable feedback, we have made several enhancements to ensure an even better experience for delivering valuables such as jewelry, gold, money, and watches from one shop to another.</p>'
                         .'<p>Attached to this email is a comprehensive "How to Use" document that will guide you through the features and functionalities of BoxDrop 2.0. We encourage you to go review it to make the most out of the new version.</p>'
                         .'<p><li><a href=http://securepath.ae/boxdrop/Admin_Onboarding.pdf>Admin Onboarding</a></li><li><a href=http://securepath.ae/boxdrop/How_to_use.pdf>How to Use</a></li></p>'
                         .'<p>Kindly note that all users of BoxDrop 1.0 will need to reinstall the app. You can use the same login credentials you used during BoxDrop 1.0.</p>'
                         .'<p>Should you have any questions or need further assistance, please do not hesitate to reach out to us at care@boxdrop.ae. Our support team is always ready to help you.</p>'
                         .'<p>Thank you for choosing BoxDrop. We look forward to continuing to serve you with excellence.</p>'
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