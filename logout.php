<?php

  session_start();


  if (isset($_POST["log-out"])){
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
  }
  
  exit;

?>