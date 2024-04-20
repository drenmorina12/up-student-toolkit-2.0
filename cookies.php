<?php
  $color = $_POST['color'];

  setcookie('colorPreference', $color, time() + 1000, "/");
?>