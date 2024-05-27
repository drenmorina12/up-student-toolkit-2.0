<?php
  include('db.php');

  $userId = 1;

  $query = "SELECT titulli, A1, A2, A3, A4, Afinal, B1, B2, B3, B4, Bfinal, C1, C2, C3, C4, Cfinal, D1, D2, D3, D4, Dfinal, final FROM tblasociacioni WHERE userId = ?";
  $stmt = $conn->prepare($query);

  $stmt->bind_param("i", $userId);
  if ($stmt->execute()) {
    echo "Records retrieved succesfully";
  } else {
    echo "Error: " . $stmt->error;
  }
  $result = $stmt->get_result();

  $asosaciones = array();

  while ($row = $result->fetch_assoc()){
    $asosacion = array(
      'A' => array($row['A1'], $row['A2'], $row['A3'], $row['A4'], $row['Afinal'], $row['final'], $row['titulli']),
      'B' => array($row['B1'], $row['B2'], $row['B3'], $row['B4'], $row['Bfinal']),
      'C' => array($row['C1'], $row['C2'], $row['C3'], $row['C4'], $row['Cfinal']),
      'D' => array($row['D1'], $row['D2'], $row['D3'], $row['D4'], $row['Dfinal'])
    );

    $asosaciones[$row['titulli']] = $asosacion;
  }

  // echo json_encode($asosaciones); 
  
  $stmt->close();
  $conn->close();


?>