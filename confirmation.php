<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmimi</title>
    <link rel="stylesheet" href="sign-up/sign-up.css">
</head>
<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                <form class="sign-in-form">
                    <div class="logo">
                        <img src="./images/logo1.png" alt="easyclass">
                        <h4>UP Student Toolkit</h4>
                    </div>

                    <div class="heading">
                        <h2> Konfirmimi i 
                        <?php
                            if (isset($_SESSION['info-message'])) {
                                echo htmlspecialchars($_SESSION['info-message']);
                                unset($_SESSION['info-message']);
                            }
                            ?>
                        </h2>
                    </div>

                    <div class="actual-form">
                        <h4 >
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo htmlspecialchars($_SESSION['message']);
                                unset($_SESSION['message']);
                            }
                            ?>
                        </h4>
                        <?php if (isset($_SESSION['message'])){
                            if(htmlspecialchars($_SESSION['message'])!='Llogaria juaj është fshirë!' || htmlspecialchars($_SESSION['message'])!='Fjalëkalimi u përditësua.'){ ?>
                        <a href="<?php
                                if (isset($_SESSION['go-back'])) {
                                    echo htmlspecialchars($_SESSION['go-back']);
                                    unset($_SESSION['go-back']);
                                }
                            ?>" class="toggle">Kthehu mbrapa</a><br>
                        <?php }}?>
                        <a href="index.php" class="toggle">Kthehu në fillim</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </main>
    <script src="sign-up/sign-up.js"></script>
</body>
</html>
