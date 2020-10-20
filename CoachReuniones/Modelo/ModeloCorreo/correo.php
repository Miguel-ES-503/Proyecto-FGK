<?php 
include "../../../Conexion/conexion.php";
include "../../../BaseDatos/conexion.php";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try{
    session_start();
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();     
    $mail->CharSet = 'UTF-8';                                       // Send using SMTP
    $mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sidebyside@oportunidades.org.sv';                     // SMTP username
    $mail->Password   = 'Kriete123';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sidebyside@oportunidades.org.sv', 'Side by Side');
    $mail->addAddress($correo,$nombre);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    //$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    =  $mensaje;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $mysql = "UPDATE renovacion SET estado = 'rechazada' WHERE idRenovacion = :id";
    $actualizar = $dbh->prepare($mysql);
    $actualizar->bindParam(":id",$id,PDO::PARAM_STR);
    if ( $actualizar->execute()) {
      $_SESSION['noti'] = "<script>swal({
  title: 'Exito!',
  text: 'Renovacion rechazada con exito!',
  icon: 'success',
  button: 'Cerrar',
});</script>";
header("Location:../../listadoRenovacion.php");
    }

    
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




?>