<?php


if (!isset($_SESSION['visit_counts'])) {
  $_SESSION['visit_counts'] = array();
}

  $current_page = basename($_SERVER['PHP_SELF'], '.php');
  $parts = explode('/', $current_page);
  $last_word = end($parts);

  if (isset($_SESSION['visit_counts'][$last_word])) {
    $_SESSION['visit_counts'][$last_word]++;
  } else {
      $_SESSION['visit_counts'][$last_word] = 1;
  }

  echo "<br><br><br><br> TESTT <br><br><br>";

  print_r($_SESSION["visit_counts"]);
?>