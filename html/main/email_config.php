<?php



function kirim_email($to,$namaTo,$subject,$pesan) {

	global $config;

	//ini_set( 'display_errors', 1 );

	//require_once('/home/pbpgri/anggota.pgri.or.id/PHPMailer-master/PHPMailerAutoload.php');

	require_once($config['basepath'].'PHPMailer-master/PHPMailerAutoload.php');

	

	$mail = new PHPMailer;

	$mail->isSMTP();                                      		// Set mailer to use SMTP

	$mail->Host     = "ssl://smtp.gmail.com"; 

$mail->Mailer   = "smtp";

$mail->SMTPAuth = true; 

 					// Specify main and backup SMTP servers

	

	$mail->Username 	= "noviriansyah@gmail.com";                 // SMTP username

	$mail->Password 	= "";                           // SMTP password

	$mail->SMTPSecure 	= "tls";                            // Enable TLS encryption, `ssl` also accepted

//	$mail->Port 		= 587;                                    // TCP port to connect to

	$mail->From 		= "noviriansyah@gmail.com";

	$mail->FromName 	= "Administrator PGRI";

	$mail->addAddress($to, $namaTo);     // Add a recipient

	$mail->addReplyTo("noviriansyah@gmail.com", "Administrator elite");

	$mail->isHTML(true);                                  // Set email format to HTML



    $mail->Subject = $subject;

    $mail->Body    = $pesan;

	if(!$mail->send()) {

            echo 'Message could not be sent.';

            echo 'Mailer Error: ' . $mail->ErrorInfo;

            //return false;

    } else {

		echo 'Email Sukses Terkirim';

	}

}	



?>

