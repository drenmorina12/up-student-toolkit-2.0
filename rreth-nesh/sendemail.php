<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// Shfaqen error-at
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Kontrollo nëse emaili është valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Emaili nuk është valid.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'uptoolkit@gmail.com';
        $mail->Password   = 'awjhggxtqmijmueg';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom($email, $email);
        $mail->addAddress('uptoolkit@gmail.com');
        $mail->addReplyTo($email, $email);

        // Përmbajtja e email-it
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Dërgo email-in
        $mail->send();
        echo "<script>
        alert('Email-i u dërgua me sukses.');
        document.location.href = 'rreth-nesh.php';
        </script> ";
    } catch (Exception $e) {
        echo "Email-i nuk mund të dërgohej. Gabim: {$mail->ErrorInfo}";
    }
} else {
    echo "Nuk keni aksesuar këtë faqe si duhet.";
}
?>