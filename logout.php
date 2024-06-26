<?php

  session_start();

  if (isset($_POST["log-out"])) {
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit;
  }

  if (isset($_POST["clear-cookies"])) {
    var_dump($_COOKIE);
    // Iterate over each cookie and set its expiration time to a past date
    foreach ($_COOKIE as $cookie_name => $cookie_value) {
      setcookie($cookie_name, '', time() - 3600, '/');
    }
    header("Location: ballina.php");

  }

  if (isset($_POST["delete-account"])) {
    header("Location: delete_account.php");
    exit;
  }
  
  if (isset($_POST["update-password"])) {
    header("Location: update_password.php");
    exit;
  }
?>