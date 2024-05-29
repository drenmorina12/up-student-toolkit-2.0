<?php
session_start();
include("db.php");

function sanitizeInput($data) {
  $data = trim($data); 
  $data = stripslashes($data); 
  $data = htmlspecialchars($data);
  return filter_var($data, FILTER_SANITIZE_STRING);
}

function validateEmail($email) {

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      return false;
    }
  
    $regex = '/^[^@]+@[^@]+\.[^@]+$/';
  
    return preg_match($regex, $email) === 1;
  
  }


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign-up'])) {
    $emri = sanitizeInput($_POST['first-name']);
    $mbiemri = sanitizeInput($_POST['last-name']);
    $emaili = sanitizeInput($_POST['email']);
    $passwordi = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];


    if (empty($emri) && empty($mbiemri) && empty($emaili) && empty($passwordi) && empty($confirm_password)){
        echo "All fields are required.";
        exit;
      }
    
    if (!validateEmail($emaili)) {
        echo "Invalid email format.";
        exit;
    }


    if (strlen($passwordi) < 8 && $passwordi !== $confirm_password) {
        $_SESSION['signup_error'] = 'Fjalëkalimi dhe konfirmimi i fjalëkalimit nuk përputhen';
        // header("Location: index.php");
        exit;
    }


    $hashed_password = password_hash($passwordi, PASSWORD_DEFAULT);

    //parandalimi i sql ijection
    $stmt = $conn->prepare("INSERT INTO tblUser (emri, mbiemri, emaili, passwordHash) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $emri, $mbiemri, $emaili, $hashed_password);

    try{
        $stmt->execute();

        $new_user_id = $conn->insert_id;

        $_SESSION['first-name'] = $emri;
        $_SESSION['last-name'] = $mbiemri;
        $_SESSION['email'] = $emaili;
        $_SESSION['user-id'] = $new_user_id;
        

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