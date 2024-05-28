<?php
session_start();

if (isset($_POST['send-fp'])) {
    $_SESSION['info-message'] = "dërgimi të emailit";
    $_SESSION['go-back'] = "index.php";
    header("Location: confirmation.php");
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
                    <form action="./rreth-nesh/sendemail.php" method="POST" autocomplete="off" class="sign-in-form">
                        <div class="logo">
                            <img src="./images/logo1.png" alt="easyclass">
                            <h4>UP Student Toolkit</h4>
                        </div>

                        <div class="heading">
                            <h2>Rimerr fjalëkalimin</h2>
                            <a href="./index.php" class="toggle">Kthehu mbrapa</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                            <p>To:</p> <input type="text" name="email" required readonly value="uptoolkit@gmail.com">
                            </div>
                            <div class="input-wrap">
                                <input type="email" id="email" minlength="4" class="input-field" autocomplete="off" required name="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-wrap">
                                <input type="text" minlength="4" class="input-field" autocomplete="off" required id="pass" name="subject"/>
                                <label>Titulli i emailit</label>
                            </div>                
                            <div class="input-wrap">
                                <input type="text"  class="input-field" autocomplete="off" required id="conpass" name="message"/>
                                <label>Mesazhi</label>
                                <br><br>
                                <input type="submit" name="send-fp" value="Dërgo" class="sign-btn">
                            </div>
                            <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $email = $_POST['email'];
                        $message = $_POST['message'];
                        $email_regex = "/^\S+@\S+\.\S+$/";

                        $errors = array();

                        if (!preg_match($email_regex, $email)) {
                            $errors['email'] = "Email-i nuk është në formatin e duhur";
                        }
                        if (count($errors) > 0) {
                            print_r($errors);
                        } else {
                            echo "Ju faleminderit, mesazhi u dergua me sukses :)";
                        }
                    }
                ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="sign-up/sign-up.js"></script>
</body>
</html>
