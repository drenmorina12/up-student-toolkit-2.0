<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Krijo'])) {
    $emri = $_POST['emri'];
    $mbiemri =$_POST['mbiemri'];
    $emaili = $_POST['emaili'];
    $passwordi =$_POST['passwordi'];
    $confirm_passwordi =$_POST['konfirmo_passwordin'];

    /*
    if ($passwordi !== $konfirmo_passwordin) {
        die('Password and confirm password do not match');
    }*/


    $hashed_password = password_hash($passwordi, PASSWORD_DEFAULT);


    $insert_sql = "
    INSERT INTO shfrytezuesit (emri, mbiemri, emaili, passwordi) 
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