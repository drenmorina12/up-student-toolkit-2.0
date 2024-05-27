<?php
  
  $data = file_get_contents('php://input');
  $decoded_data = json_decode($data, true);

  $asosacioni = $decoded_data['asosacioni'];
  
  echo "Start here <br>";
  echo "Asosacioni eshte:   " . json_encode($asosacioni, JSON_PRETTY_PRINT);
  echo "<br>";
  

?>