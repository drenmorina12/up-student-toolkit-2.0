<?php
session_start();
include "./db.php";

if (isset($_POST['emaili']) && isset($_POST['passwordi'])) {
    $email = $_POST['emaili'];
    $user_password = $_POST['passwordi'];

    $stmt = $conn->prepare("SELECT passwordi FROM shfrytezuesit WHERE emaili = ?");
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
