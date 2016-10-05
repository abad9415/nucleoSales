<?php
require_once('PHPMailerAutoload.php');
$mail = new PHPMailer();

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "edgar.nok@gmail.com";                 
$mail->Password = "TETRIS13";                           
//If SMTP requires TLS encryption then set it
 $mail->SMTPSecure = 'tls';            
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "edgar.nok@gmail.com";
$mail->FromName = "Edgar Hernandez";

$mail->addAddress("marcos@red-7.com.mx", "Recepient Name");

$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
   echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}



?>