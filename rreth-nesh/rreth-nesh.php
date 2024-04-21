<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/logo1.png" />
    <title>Up Student Toolkit</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="rreth-nesh.css" />
    <link rel="stylesheet" href="messageUs.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <style>
      #footer {
      /* gap: 90px;  */
      /* margin-bottom: 20px; */
      margin-top: -70px;
      }
    </style>
</head>

  <body>
    <?php
      include("../header.php");
      include("../counter.php");
    ?>
    
    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <ul class="carousel">
        <li class="card">
          <div class="img"><img src="../images/cpp.jpg" alt="img" draggable="false"></div>
          <h2>Dren Morina</h2>
          <span>DEV<a href="https://github.com/drenmorina12">Github</a></span>
        </li>
        <li class="card">
          <div class="img"><img src="../images/cpp.jpg" alt="img" draggable="false"></div>
          <h2>Dituri Kodra</h2>
          <span>DEV<a href="https://github.com/diturikodra">Github</a></span>
        </li>
        <li class="card">
          <div class="img"><img src="../images/cpp.jpg" alt="img" draggable="false"></div>
          <h2>Edon Gashi</h2>
          <span>DEV<a href="https://github.com/EdonFGashi">Github</a></span>
        </li>
        <li class="card">
          <div class="img"><img src="../images/cpp.jpg" alt="img" draggable="false"></div>
          <h2>Blerta Lutolli</h2>
          <span>DEV<a href="https://github.com/Blerta-Lutolli">Github</a></span>
        </li>
        <li class="card">
          <div class="img"><img src="../images/cpp.jpg" alt="img" draggable="false"></div>
          <h2>Endrit Kastrati</h2>
          <span>DEV<a href="https://github.com/EndritKastrati">Github</a></span>
        </li>
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>

    <section>
            <div class="container">
                <div class="contactInfo"> 
                    <div>
                        <h2>INFO</h2> <br><br>
                        <ul class="info">
                            <li>
                                <span><img src="../images/logo1.png"></span>
                                <span>FIEK - Prishtine, KS  10000</span>
                                </span>
                            </li>
                            <li>
                                <span><img src="../images/mail.png"></span>
                                <span><a href = "mailto: endritkastrati8@gmail.com">uptoolkit@gmail.com</a></span>
                            </li>
                        </ul>
                    </div>
                    
                <form method="POST" action="rreth-nesh.php">
                </div>
                    <div class="contactForm">
                        <h2>Na Kontaktoni!</h2>
                        <div class="formBox">
                        <div class="inputBox w50">
                            <input type="text" name="name" required>
                            <span>Emri</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" name="surname" required>
                            <span>Mbiemri</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="email" name="email" required>
                            <span>Email</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" name="tel" required>
                            <span>Tel</span>
                        </div>
                        <div class="inputBox w100">
                            <textarea required></textarea>
                            <span>Mesazhi...</span>
                        </div>
                        <div class="inputBox w100">
                            <input type="submit" value="Send">
                        </div>
                    </div>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = $_POST['name'];
                        $surname = $_POST['surname'];
                        $email = $_POST['email'];
                        $tel = $_POST['tel'];
                        $message = $_POST['message'];

                        $name_regex = "/^[a-zA-Z\s]+$/";
                        $email_regex = "/^\S+@\S+\.\S+$/";
                        $tel_regex = "/^\d{9}$/";

                        $errors = array();

                        if (!preg_match($name_regex, $name)) {
                            $errors['name'] = "Emri duhet të përmbajë vetëm shkronja dhe hapësira";
                        }

                        if (!preg_match($name_regex, $surname)) {
                            $errors['surname'] = "Mbiemri duhet të përmbajë vetëm shkronja dhe hapësira";
                        }

                        if (!preg_match($email_regex, $email)) {
                            $errors['email'] = "Email-i nuk është në formatin e duhur";
                        }

                        if (!preg_match($tel_regex, $tel)) {
                            $errors['tel'] = "Ju lutem jepni 9 numra tek telefoni";
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
        </section>

    <?php
      include("../footer.php");
    ?>
    <script src="../app.js"></script>
    <script src="rreth-nesh.js" defer></script>
  </body>
</html>
