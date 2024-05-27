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
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Email and Password must be provided.";
}
?>
