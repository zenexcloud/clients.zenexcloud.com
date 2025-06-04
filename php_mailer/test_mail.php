<?php
require_once './phpmailer/PHPMailerAutoload.php';


$host = "mail.betopiagroup.com";
$username = "admin@bdcalling.com";
$password = "},91,ItuAll";

$port = 465;
$type = "ssl";

$subject = "Test email from PHP Mailer";
$message = "This is a test email sent from cPanel hosting via PHP Mailer.";


$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = $host;
$mail->SMTPAuth = true;
$mail->Username = $username;
$mail->Password = $password;
$mail->SMTPSecure = $type;
$mail->Port = $port;
$mail->Debugoutput = 'html';
$mail->setFrom($username, "Test Sender");
$mail->addAddress("mdsherazhowlader@gmail.com");
$mail->Subject = $subject;
$mail->Body = $message;
  
  
try {
  if ($mail->send()) {
    echo '✅ Message has been sent';
  } else {
    echo '❌ Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
} catch (Exception $e) {
  echo "❌  Error: " . $e->getMessage();
}
