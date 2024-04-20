<?php
  $color = $_POST['color'];

  setcookie('colorPreference', $color, time() + (86400 * 30), "/");
?>