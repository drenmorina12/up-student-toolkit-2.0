<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Krijo'])) {
    $emri = $_POST['first-name'];
    $mbiemri =$_POST['last-name'];
    $emaili = $_POST['email'];
    $passwordi =$_POST['password'];
    $confirm_password =$_POST['confirm-password'];

    /*
    if ($passwordi !== $konfirmo_passwordin) {
        die('Password and confirm password do not match');
    }*/


    $hashed_password = password_hash($passwordi, PASSWORD_DEFAULT);


    $insert_sql = "
    INSERT INTO tblUser (emri, mbiemri, emaili, passwordHash) 
    VALUES ('$emri', '$mbiemri', '$emaili', '$hashed_password')
    ";

    try{
        mysqli_query($conn, $insert_sql);
        header("Location:ballina.php");

    }
       catch(mysqli_sql_exception){
        echo "nuk u regjistrua";
    }
}

mysqli_close($conn);
?>