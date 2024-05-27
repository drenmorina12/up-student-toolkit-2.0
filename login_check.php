<?php
session_start();
include "./db.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $user_password = $_POST['password'];

    $stmt = $conn->prepare("SELECT passwordHash FROM tblUser WHERE emaili = ?");
    $stmt->bind_param("s", $email);

    $stmt->execute();

    $stmt->bind_result($stored_password);

    if ($stmt->fetch()) {

        if (password_verify($user_password, $stored_password)) {
            echo "User exists and password is correct.";
            header("Location: ballina.php");
            exit();  
        } else {
            $_SESSION['error'] = "Email ose fjalëkalim i pavlefshëm";
        }
    } else {
        $_SESSION['error'] = "Email ose fjalëkalim i pavlefshëm";
    }

    $stmt->close();
    $conn->close();
} else {
    $_SESSION['error'] = "Shënoni emailin dhe fjalëkalimin";
}
header("Location: index.php");
exit();
?>
