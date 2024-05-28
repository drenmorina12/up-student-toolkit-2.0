<?php
session_start();
include "./db.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT emri, mbiemri, emaili, passwordHash FROM tblUser WHERE emaili = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name, $email, $stored_password);

    if ($stmt->fetch()) {

        if (password_verify($password, $stored_password)) {
            $_SESSION['first-name'] = $first_name;
            $_SESSION['last-name'] = $last_name;
            $_SESSION['email'] = $email;
            header("Location: ballina.php");
            exit();  
        } else {
            $_SESSION['error'] = "Kredenciale të gabuara!";
        }
    } else {
        $_SESSION['error'] = "Kredenciale të gabuara!";
    }

    $stmt->close();

} else {
    $_SESSION['error'] = "Shënoni emailin dhe fjalëkalimin";
}  
$conn->close();
header("Location: index.php");
exit();
?>
