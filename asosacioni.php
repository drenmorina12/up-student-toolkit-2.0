<?php

session_start();

include('db.php');

const MAX_ASOSACIONES = 7;

$data = file_get_contents('php://input');
$decoded_data = json_decode($data, true);

$asosacioni = $decoded_data['asosacioni'];

$userId = $_SESSION["user-id"];

$query = "SELECT COUNT(*) as total FROM tblasociacioni WHERE userId = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$currentCount = $row['total'];
$stmt->close();

if ($currentCount < MAX_ASOSACIONES){
  // Using references to access individual elements
  $a1 = &$asosacioni['A'][0];
  $a2 = &$asosacioni['A'][1];
  $a3 = &$asosacioni['A'][2];
  $a4 = &$asosacioni['A'][3];
  $zgjidhjaA = &$asosacioni['A'][4];
  $zgjidhjaPerfundimtare = &$asosacioni['A'][5];
  $titulli = &$asosacioni['A'][6];

  $b1 = &$asosacioni['B'][0];
  $b2 = &$asosacioni['B'][1];
  $b3 = &$asosacioni['B'][2];
  $b4 = &$asosacioni['B'][3];
  $zgjidhjaB = &$asosacioni['B'][4];

  $c1 = &$asosacioni['C'][0];
  $c2 = &$asosacioni['C'][1];
  $c3 = &$asosacioni['C'][2];
  $c4 = &$asosacioni['C'][3];
  $zgjidhjaC = &$asosacioni['C'][4];

  $d1 = &$asosacioni['D'][0];
  $d2 = &$asosacioni['D'][1];
  $d3 = &$asosacioni['D'][2];
  $d4 = &$asosacioni['D'][3];
  $zgjidhjaD = &$asosacioni['D'][4];

  $stmt = $conn->prepare("INSERT INTO tblasociacioni (userId, titulli, A1, A2, A3, A4, Afinal, B1, B2, B3, B4, Bfinal, C1, C2, C3, C4, Cfinal, D1, D2, D3, D4, Dfinal, final) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("issssssssssssssssssssss",
      $userId,
      $titulli,
      $a1, $a2, $a3, $a4, $zgjidhjaA,
      $b1, $b2, $b3, $b4, $zgjidhjaB,
      $c1, $c2, $c3, $c4, $zgjidhjaC,
      $d1, $d2, $d3, $d4, $zgjidhjaD,
      $zgjidhjaPerfundimtare
  );

  if ($stmt->execute()) {
      echo "New records created successfully";
  } else {
      echo "Error: " . $stmt->error;
  }

  $stmt->close();
} else {
    echo "You already have 7 asosaciones. You cannot add more.";
}


$conn->close();

?>
