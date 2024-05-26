<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

//Shfaqen error-at
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'uptoolkit@gmail.com';
        $mail->Password   = 'awjhggxtqmijmueg';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';

        $mail->setFrom($_POST["email"], $_POST["email"]);
        $mail->addAddress('uptoolkit@gmail.com');
        $mail->addReplyTo($_POST["email"], $_POST["email"]);

        // Përmbajtja e email-it
        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body    = $_POST["message"];

        // Dërgo email-in
        $mail->send();
        echo "<script>
        alert('Email-i u dërgua me sukses.');
        document.location.href = 'rreth-nesh.php';
        </script> ";
    } catch (Exception $e) {
        echo "Email-i nuk mund të dërgohej. Gabim: {$mail->ErrorInfo}";
    }
}
?>
