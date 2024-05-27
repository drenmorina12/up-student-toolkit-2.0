<?php
  
  $data = file_get_contents('php://input');
  $decoded_data = json_decode($data, true);

  $asosacioni = $decoded_data['asosacioni'];
  
  echo "Start here <br>";
  // echo "Asosacioni eshte:   " . json_encode($asosacioni, JSON_PRETTY_PRINT);
  echo "<br>";
  
  // Access individual elements
  $a1 = $asosacioni['A'][0];
  $a2 = $asosacioni['A'][1];
  $a3 = $asosacioni['A'][2];
  $a4 = $asosacioni['A'][3];
  $zgjidhjaA = $asosacioni['A'][4];
  $zgjidhjaPerfundimtare = $asosacioni['A'][5];

  $b1 = $asosacioni['B'][0];
  $b2 = $asosacioni['B'][1];
  $b3 = $asosacioni['B'][2];
  $b4 = $asosacioni['B'][3];
  $zgjidhjaB = $asosacioni['B'][4];

  $c1 = $asosacioni['C'][0];
  $c2 = $asosacioni['C'][1];
  $c3 = $asosacioni['C'][2];
  $c4 = $asosacioni['C'][3];
  $zgjidhjaC = $asosacioni['C'][4];

  $d1 = $asosacioni['D'][0];
  $d2 = $asosacioni['D'][1];
  $d3 = $asosacioni['D'][2];
  $d4 = $asosacioni['D'][3];
  $zgjidhjaD = $asosacioni['D'][4];

  // Print individual elements for debugging purposes
  // echo "A1: " . $a1 . "<br>";
  // echo "A2: " . $a2 . "<br>";
  // echo "A3: " . $a3 . "<br>";
  // echo "A4: " . $a4 . "<br>";
  // echo "Zgjidhja A: " . $zgjidhjaA . "<br>";
  // echo "Zgjidhja Perfundimtare: " . $zgjidhjaPerfundimtare . "<br>";

  // echo "B1: " . $b1 . "<br>";
  // echo "B2: " . $b2 . "<br>";
  // echo "B3: " . $b3 . "<br>";
  // echo "B4: " . $b4 . "<br>";
  // echo "Zgjidhja B: " . $zgjidhjaB . "<br>";

  // echo "C1: " . $c1 . "<br>";
  // echo "C2: " . $c2 . "<br>";
  // echo "C3: " . $c3 . "<br>";
  // echo "C4: " . $c4 . "<br>";
  // echo "Zgjidhja C: " . $zgjidhjaC . "<br>";

  // echo "D1: " . $d1 . "<br>";
  // echo "D2: " . $d2 . "<br>";
  // echo "D3: " . $d3 . "<br>";
  // echo "D4: " . $d4 . "<br>";
  // echo "Zgjidhja D: " . $zgjidhjaD . "<br>";

?>