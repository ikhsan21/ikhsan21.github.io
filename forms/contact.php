<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('../library/PHPMailer.php');
require_once('../library/Exception.php');
require_once('../library/OAuth.php');
require_once('../library/POP3.php');
require_once('../library/SMTP.php');

 
	$mail = new PHPMailer;
 
	$nama = $_POST['nama'];
	// menangkap data usia dengan method post
	$email = $_POST['email'];
	


	//Enable SMTP debugging. 
	$mail->SMTPDebug = 3;                               
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = "tls://smtp.gmail.com"; //host mail server
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = "ikhsan.misaki19@gmail.com";   //nama-email smtp          
	$mail->Password = "Haseo132";           //password email smtp
	//If SMTP requires TLS encryption then set it
	$mail->SMTPSecure = "tls";                           
	//Set TCP port to connect to 
	$mail->Port = 587;                                   
 
	$mail->From = $_POST['email']; //email pengirim
	$mail->FromName = $nama; //nama pengirim
 
	 $mail->addAddress('ikhsan.misaki19@gmail.com'); //email penerima
 
	$mail->isHTML(true);
 
	$mail->Subject = $_POST['subjek'] ; //subject
    $mail->Body    = $email .$_POST['pesan']; //isi email
        $mail->AltBody = "PHP mailer"; //body email (optional)
 
	if(!$mail->send()) 
	{
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	    echo "Message has been sent successfully";
	}
  error_reporting(0);
?>
