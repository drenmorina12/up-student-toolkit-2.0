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


  if (isset($_SESSION['visit_counts'])) {
    $visit_data_str = serialize($_SESSION['visit_counts']);

    $file_path = 'visit_data.txt';

    $file_handle = fopen($file_path, 'w');

    if ($file_handle) {
        fwrite($file_handle, $visit_data_str);

        fclose($file_handle);
    } else {
        echo "Error: Unable to open file for writing.";
    }
} else {
    echo "Error: visit_counts session array doesn't exist.";
}
?>