<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once 'mailer/src/Exception.php';
    require_once 'mailer/src/PHPMailer.php';
    require_once 'mailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }

?>
