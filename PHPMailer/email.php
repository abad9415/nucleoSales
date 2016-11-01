<?php
$mensaje = $_POST['mensaje'];
$Prospecto = $_POST['Prospecto'];
$Correo = $_POST['Correo'];
$RFC=$_POST['rfc'];
$Ciudad=$_POST['ciudad'];
require_once('PHPMailerAutoload.php');

$mail = new PHPMailer();

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "mail.red-7.com.mx";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "sistemaventas@red-7.com.mx";                 
$mail->Password = "@246810";                           
//Set TCP port to connect to 
$mail->Port = 787;                                   

$mail->From = "sistemaventas@red-7.com.mx";
$mail->FromName = "Ventas Red7";

$mail->addAddress($Correo, "Recepient Name");

$mail->isHTML(true);

$mail->Subject = "Nueva Alta";
$mail->Body = $mensaje."<br> Prospecto: ".$Prospecto."<br> RFC: ".$RFC."<br> Ciudad: ".$Ciudad;
$mail->AltBody ="";

if(!$mail->send()) 
{
   echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}



?>