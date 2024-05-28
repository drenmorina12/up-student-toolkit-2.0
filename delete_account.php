<?php
session_start();
include("db.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete-account'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION['info-message'] = "fshirjes së llogarisë";
    $_SESSION['go-back'] = "delete_account.php";
    // kontollimi i ekzsitences se emailit
    $stmt = $conn->prepare("SELECT userId, passwordHash FROM tblUser WHERE emaili = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    

    if ($stmt->num_rows > 0) {

        $stmt->bind_result($userId, $passwordHash);
        $stmt->fetch();
        //verifikimi i passwordit
        if (password_verify($password, $passwordHash)) {

        $stmt->close();

        // fshirja e userit
        $stmt = $conn->prepare("DELETE FROM tblUser  WHERE userId = ?");
        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Llogaria juaj është fshirë!";
        } else {
            $_SESSION['message'] = "Dështim për të fshirë llogarinë.";
        }}
        else{
            $_SESSION['message'] = "Fjalëkalimi është i pasaktë.";
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
                            <h2>Fshij llogarinë</h2>
                            <a href="./index.php" class="toggle">Krijo llogari</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="email" id="email" minlength="4" class="input-field" autocomplete="off" required name="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-wrap">
                                <input type="password" minlength="4" class="input-field" autocomplete="off" required id="pass" name="password"/>
                                <label>Fjalëkalimi</label>
                            </div>                
                            <div class="input-wrap">
                                <br>
                                <input type="submit" name="delete-account" value="FSHIJ" class="sign-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="sign-up/sign-up.js"></script>
</body>
</html>
