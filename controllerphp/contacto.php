<?php
 use PHPMailer\PHPMailer\PHPMailer;

  if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['message']) && !empty($_POST['message'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = "ENVIO DE EMAIL";
    
    require_once "PHPMailer-8.1/src/PHPMailer.php";
    require_once "PHPMailer-8.1/src/SMTP.php";
    require_once "PHPMailer-8.1/src/Exception.php";
   
    $mail = new PHPMailer();
    $mail->IsSMTP(); // habilita SMTP
    $mail->SMTPDebug = false; // debugging: 1 = errores y mensajes, 2 = sólo mensajes
    $mail->SMTPAuth = true; // auth habilitada
    $mail->SMTPSecure = 'ssl'; // transferencia segura REQUERIDA para Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "pruebaenviomailweb@gmail.com";
    $mail->Password = "Temporal.2022";
    $mail->SetFrom("pruebaenviomailweb@gmail.com");
    $mail->Subject = "Contacto";
    $mail->Body = $message;
    $mail->AddAddress($email);

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
        header('../index.html');
        exit();
     }

  }
?>