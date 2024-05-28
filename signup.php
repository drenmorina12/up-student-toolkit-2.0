<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign-up'])) {
    $emri = $_POST['first-name'];
    $mbiemri =$_POST['last-name'];
    $emaili = $_POST['email'];
    $passwordi =$_POST['password'];
    $confirm_password =$_POST['confirm-password'];


    if ($passwordi !== $confirm_password) {
        $_SESSION['signup_error'] = 'Fjalëkalimi dhe konfirmimi i fjalëkalimit nuk përputhen';
        header("Location: index.php");
        exit();
    }


    $hashed_password = password_hash($passwordi, PASSWORD_DEFAULT);

    //parandalimi i sql ijection
    $stmt = $conn->prepare("INSERT INTO tblUser (emri, mbiemri, emaili, passwordHash) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $emri, $mbiemri, $emaili, $hashed_password);

    try{
        $stmt->execute();

        $_SESSION['first-name'] = $emri;
        $_SESSION['last-name'] = $mbiemri;
        $_SESSION['email'] = $emaili;

        $_SESSION['signup_error'] = '';
        header("Location:ballina.php");
        exit();

    } catch(mysqli_sql_exception $e){
        $_SESSION['signup_error'] = "Nuk u regjistrua: " . $e->getMessage();
        header("Location: index.php");
        exit();
    }
}

mysqli_close($conn);
?>