<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

    require '../special_features/vendor/autoload.php';
    require '../special_features/vendor/phpmailer/phpmailer/src/Exception.php';
    require '../special_features/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../special_features/vendor/phpmailer/phpmailer/src/SMTP.php';
    


function send_mail($recipient,$subject,$message)
{

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port       = 465;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = 'jphigomera19@gmail.com';
  $mail->Password   = 'lavhavwsxxlzvhyw';

  $mail->IsHTML(true);
  $mail->AddAddress($recipient, "esteemed customer");
  $mail->SetFrom("jphigomera19@gmail.com", "Alegario Cure Hospital");
  $mail->Subject = $subject;
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