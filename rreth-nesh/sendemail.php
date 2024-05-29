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
    $email = filter_var($_POST['email']);
    $subject = filter_var($_POST['subject']);
    $message = filter_var($_POST['message']);

    // Kontrollo nëse emaili është valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['info-message'] = "validimit i emailit";
        $_SESSION['message'] = "Emaili nuk është valid.";
        $_SESSION['go-back'] = "./rreth-nesh/rreth-nesh.php";
        echo "<script>document.location.href = '../confirmation.php';</script>";
        exit;
    }


    $headers = "From: " .$email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=ITF-8\r\n";


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
        $_SESSION['info-message'] = "Dërgimi të email-it";
        $_SESSION['message'] = "Email-i u dërgua!";
        $_SESSION['go-back'] = "./rreth-nesh/rreth-nesh.php";
       echo "<script>
        document.location.href = '../confirmation.php';
        </script> ";
    } catch (Exception $e) {
        $_SESSION['info-message'] = "Gabim: {$mail->ErrorInfo}";
        $_SESSION['message'] = "";
        //echo "Email-i nuk mund të dërgohej. Gabim: {$mail->ErrorInfo}";
    }
} else {
    echo "Nuk keni aksesuar këtë faqe si duhet.";
}
?>