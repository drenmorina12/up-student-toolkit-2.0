<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// Shfaqen error-at
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = 'uptoolkit@gmail.com';
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Kontrollo nëse emaili është valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Emaili nuk është valid.";
        exit;
    }


    $headers = "From: " .$email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=ITF-8\r\n";

    $to = 'uptoolkit@gmail.com';


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
        $mail->addAddress($to);
        $mail->addReplyTo($email, $email);

        // Përmbajtja e email-it
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Dërgo email-in
        $mail->send();
        $_SESSION['info-message'] = "dërgimi të emailit";
        $_SESSION['message'] = "emaili u dërgua!";
        $_SESSION['go-back'] = "./rreth-nesh/rreth-nesh.php";
       /* echo "<script>
        document.location.href = '../confirmation.php';
        </script> ";*/
    } catch (Exception $e) {
        $_SESSION['info-message'] = "Gabim: {$mail->ErrorInfo}";
        $_SESSION['message'] = "";
        //echo "Email-i nuk mund të dërgohej. Gabim: {$mail->ErrorInfo}";
    }

    //Funksioni mail()
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>
        alert('Email-i u dërgua me sukses (me funksionin mail()).');
        document.location.href = 'rreth-nesh.php';
        </script> ";
    } else {
        echo "Email-i nuk mund të dërgohej (me funksionin mail()).";
    }
} else {
    echo "Nuk keni aksesuar këtë faqe si duhet.";
}
?>