<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

    require 'special_features/vendor/autoload.php';
    require 'special_features/vendor/phpmailer/phpmailer/src/Exception.php';
    require 'special_features/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'special_features/vendor/phpmailer/phpmailer/src/SMTP.php';
    


function send_mail($recipient,$subject,$message)
{

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPAuth   = TRUE;
//   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port       = 587;
  $mail->SMTPDebug = 2;
  $mail->Host       = 'smtp.hostinger.com';
  $mail->Username   = 'jobportals@hr1.alegariocurehms.com';
  $mail->Password   = '#Jobportal123';

  $mail->IsHTML(true);
  $mail->AddAddress($recipient, "esteemed customer");
  $mail->SetFrom("jobportals@hr1.alegariocurehms.com", "Job Portal");
  $mail->Subject = $subject;
  $mail->body = "Do not share this to others";
  $content = $message;

  $mail->MsgHTML($content); 
  if(!$mail->Send()) { 
    return false;
  } else {
    echo "Email sent successfully";
    return true;
  }

}

?>