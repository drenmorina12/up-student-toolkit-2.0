<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="images/logo1.png">
  <title>Sign Up - UP Student Toolkit</title>
  <link rel="stylesheet" href="sign-up/sign-up.css">
</head>

<body>
  <!-- Main text -->
  <main class="main-container">
    <!-- Second text -->
    <section class="info-section">
      <img src="images/logo1.png" alt="UP Student Toolkit Logo" class="sign-up-logo">
      <h1> UP Student Toolkit</h1>
      <p>  Faqja zyrtare e krijuar nga student&#235t e Fakultetit t&#235 Inxhinieris&euml Elektrike dhe Kompjuterike - FIEK.</p>
    </section>
    <section class="form-section">
      <!-- Forma -->
      <form action="index.php" method="post" class="main-form">
        <!-- Emri-->
        <div class="input-field">

          <input class="first-name" id="first-name" name="first-name" type="text" placeholder="Emri">
          <label for="first-name" class="name-label"></label>
        </div>
        <!-- Mbiemri -->
        <div class="input-field">
          <input class="last-name" type="text" name="last-name" placeholder="Mbiemri">
          <label for="last-name" class="lastname-label"></label>
        </div>
        <!-- Email -->
        <div class="input-field">
          <input class="user-email" type="email" name="email" placeholder="Email" value="@student.uni-pr.edu">
          <label for="user-email" class="email-label"></label>
        </div>
        <!-- Passwordi -->
        <div class="input-field">
          <input class="user-pass" type="password" name="password" placeholder="Passwordi" >
          <label for="user-pass" class="pass-label"></label>
        </div>
        <!-- Kyquni -->
        <!-- <a href="ballina.php" class="submit-info" id="submit-info">Kyquni</a> -->
        <button type="submit" class="submit-info" id="submit-info" name="kyquni">Kyquni</button>
        <!-- Kushtet dhe Sherbimet -->
        </div>
        <label class="tnc" for="submit-info"> Duke klikuar butonin ju pajtoheni <a href=""><i><u>me Kushtet dhe Shërbimet tona.</u></i></a></label>
      </form>
    </section>
  </main>




  <script src="sign-up/sign-up.js"></script>

</body>
</html>

<?php

// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate email format
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if (isset($_POST["kyquni"])) {
    // Validate and sanitize input
    $first_name = sanitizeInput($_POST["first-name"]);
    $last_name = sanitizeInput($_POST["last-name"]);
    $email = sanitizeInput($_POST["email"]);
    $password = $_POST["password"]; 

    // Perform validation
    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {
        if (validateEmail($email)) {
            // Save sanitized input to session
            $_SESSION["first-name"] = $first_name;
            $_SESSION["last-name"] = $last_name;
            $_SESSION["email"] = $email;

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            header("Location: ballina.php");
            exit;
        } else {
            // Invalid email format
            echo "Invalid email format.";
        }
    } else {
        // Missing required fields
        echo "All fields are required.";
    }
}
?>

<?php
  // if (isset($_POST["kyquni"])) {
    
  //   if (!empty($_POST["first-name"]) && !empty($_POST["last-name"]) && !empty($_POST["password"])) {
  //     $_SESSION["first-name"] = $_POST["first-name"];
  //     $_SESSION["last-name"] = $_POST["last-name"];
  //     $_SESSION["email"] = $_POST["email"];

  //     header("Location: ballina.php");
  //   }
  // }
?>