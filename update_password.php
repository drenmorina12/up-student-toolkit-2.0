<?php
session_start();
include("db.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recover-password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    $_SESSION['info-message'] = "përditësimit të fjalëkalimit";
    $_SESSION['go-back'] = "update_password.php";

    if ($password !== $confirmPassword) {
        $_SESSION['message'] = "Passwords do not match.";
        header("Location: confirmation.php");
        exit();
    }

    // kontollimi i ekzsitences se emailit
    $stmt = $conn->prepare("SELECT userId FROM tblUser WHERE emaili = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // perditesimi i passwordit ne databaze
        $stmt->close();
        $stmt = $conn->prepare("UPDATE tblUser SET passwordHash = ? WHERE emaili = ?");
        $stmt->bind_param("ss", $passwordHash, $email);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Fjalëkalimi u përditësua.";
        } else {
            $_SESSION['message'] = "Dështim për të përditësuar fjalëkalimin.";
        }
    } else {
        $_SESSION['message'] = "Nuk u gjet asnjë llogari me këtë adresë emaili: $email";
    }


    $stmt->close();
    $conn->close();

    header("Location: confirmation.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UP Student Toolkit</title>
    <link rel="stylesheet" href="sign-up/sign-up.css">
</head>
<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off" class="sign-in-form">
                        <div class="logo">
                            <img src="./images/logo1.png" alt="easyclass">
                            <h4>UP Student Toolkit</h4>
                        </div>

                        <div class="heading">
                            <h2>Ndrysho fjalëkalimin</h2>
                            
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="email" id="email" minlength="4" class="input-field" autocomplete="off" required name="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-wrap">
                                <input type="password" minlength="4" class="input-field" autocomplete="off" required id="pass" name="password"/>
                                <label>Fjalëkalimi i ri</label>
                            </div>                
                            <div class="input-wrap">
                                <input type="password" minlength="4" class="input-field" autocomplete="off" required id="conpass" onkeyup='checkpass();' name="confirm-password"/>
                                <label>Konfirmo fjalëkalimin e ri</label>
                                <br>
                                <div class="input-wrap" style="margin-top: 3px; margin-bottom: 0">
                                    <label id="msg"></label>
                                </div>
                                <br>
                                <input type="submit" name="recover-password" value="Përditëso" class="sign-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        var checkpass = function() {
            if(document.getElementById('pass').value == document.getElementById('conpass').value) {
                document.getElementById('msg').innerHTML='Fjalëkalimet përputhen!';
                document.getElementById('msg').style.color='green';
            } else {
                document.getElementById('msg').innerHTML='Fjalëkalimet nuk përputhen!';
                document.getElementById('msg').style.color='red';
            }
        }
    </script>
    <script src="sign-up/sign-up.js"></script>
</body>
</html>
