<?php
    session_start();
    include("db.php");
    
  $sql = "  CREATE TABLE IF NOT EXISTS tblUser (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    emri VARCHAR(50) NOT NULL,
    mbiemri VARCHAR(50) NOT NULL,
    emaili VARCHAR(50) NOT NULL UNIQUE,
    passwordHash VARCHAR(300) NOT NULL
  ) ENGINE = InnoDB;";

  if (mysqli_query($conn, $sql)) {
      echo "Tabela u krijua me sukses";
  } else {
      echo "Error: " . mysqli_error($conn);
  }



  /*
  $sql_shto = "INSERT INTO tblUser (emri, mbiemri, emaili, passwordHash) 
  VALUES ('niko', 'vertis', 'niko@gmail.com', 'pass123')";

  if (mysqli_query($conn, $sql_shto)) {
  //echo "u shtua";
  } else {
  echo "Error: " . mysqli_error($conn);
  }
  */
/*
  $sql_perditeso = "UPDATE tblUser SET emri = 'nikolo' WHERE id = 8";

  if (mysqli_query($conn, $sql_perditeso)) {
      echo "u perditesua";
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }

  */
  /*
  $sql_fshij = "DELETE FROM tblUser WHERE id = 8";

if (mysqli_query($conn, $sql_fshij)) {
    echo "u fshi";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
*/

/*
  function insertUser($emri, $mbiemri, $emaili, $passwordi, $conn) {

    $sql = "INSERT INTO tblUser (emri, mbiemri, emaili, passwordHash) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $hashedPassword = password_hash($passwordi, PASSWORD_DEFAULT);
    $stmt->bind_param("ssss", $emri, $mbiemri, $emaili, $hashedPassword);
    $stmt->execute();
    $stmt->close();

}

// Update function
function updateUser($id, $emri, $mbiemri, $emaili, $passwordi, $conn) {

    $sql = "UPDATE tblUser SET emri = ?, mbiemri = ?, emaili = ?, passwordHash = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $hashedPassword = password_hash($passwordi, PASSWORD_DEFAULT);
    $stmt->bind_param("ssssi", $emri, $mbiemri, $emaili, $hashedPassword, $id);
    $stmt->execute();
    $stmt->close();
}

// Delete function
function deleteUser($conn, $id) {

    $sql = "DELETE FROM tblUser WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

}
    insertUser('John', 'Doe', 'john.doe@example.com', 'password123', $conn);
   // updateUser(2, 'John', 'Doe', 'john.doe@example.com', 'newpassword123', $conn);
    //deleteUser(2);
*/
 
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
  $first_name = sanitizeInput($_POST["first-name"]);
  $last_name = sanitizeInput($_POST["last-name"]);
  $email = sanitizeInput($_POST["email"]);
  $password = $_POST["password"]; 
  $confirm_password = $_POST["confirm-password"]; 

  if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password) && !empty($confirm_password)){
      if (validateEmail($email)) {
        if (strlen($password) > 8 && $password == $confirm_password){
          $_SESSION["first-name"] = $first_name;
          $_SESSION["last-name"] = $last_name;
          $_SESSION["email"] = $email;

          $hashed_password = password_hash($password, PASSWORD_DEFAULT);

          header("Location: ballina.php");
          exit;
        } else {
          echo "Invalid passwords.";
        }
          
      } else {
          echo "Invalid email format.";
      }
  } else {
      // Missing required fields
      echo "All fields are required.";
  } 
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UP Student Toolkit</title>
    <link rel="stylesheet" href="sign-up/sign-up.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="./login_check.php" autocomplete="off" class="sign-in-form" method="POST">
              <div class="logo">
                <img src="./images/logo1.png" alt="easyclass" />
                <h4>UP Student Toolkit</h4>
              </div>

              <div class="heading">
                <h2>Mirësevini</h2>
                <h6>Nuk keni llogari?</h6>
                <a href="#" class="toggle">KRIJO KËTU</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="email"
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="password"

                  />
                  <label>Fjalëkalimi</label>
                </div>

                <input type="submit" name="log-in" value="Kyçu" class="sign-btn" />

                <p class="text">
                  Keni harruar fjalëkalimin? <br>
                  Na kontaktoni në 
                  <a href="#">uptoolkit@gmail.com.</a>
                </p>
              </div>
            </form>

            <form action="signup.php" method="POST" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="./images/logo1.png" alt="easyclass" />
                <h4>UP Student Toolkit</h4>
              </div>

              <div class="heading">
                <h2>Krijo Llogari</h2>
                <h6>Keni llogari?</h6>
                <a href="#" class="toggle">KYÇUNI KËTU</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="first-name"
                  />
                  <label>Emri</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="last-name"
                  />
                  <label>Mbiemri</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="email"
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="password"
                  />
                  <label>Fjalëkalimi</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="confirm-password"
                  />
                  <label>Konfirmo fjalëkalimin</label>
                </div>

                <input type="submit" name="sign-up" value="Krijo" class="sign-btn" />

                <p class="text">
                  Duke klikuar butonin ju pajtoheni me
                  <a href="#">Kushtet dhe Shërbimet tona.</a> 
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./images/TEKNIKU.jpg" class="image img-1 show" alt="" />
              <img src="./images/FIEK-FOTO.JPG" class="image img-2" alt="" />
              <img src="./images/FIEK-FOTO.JPG" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Ndihmë akademike</h2>
                  <h2>Argëtim dhe mësim</h2>
                  <h2>Konektim me të gjithë</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>


    <script src="sign-up/sign-up.js"></script>
  </body>
</html>
<?php


?>
