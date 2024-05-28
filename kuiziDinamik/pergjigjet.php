<?php
include "db.php";
include "header.php";

$query = "select * from pyetjet";
$rezultati = mysqli_query($db, $query);
?>  

<body style="background-color: #D8BFD8;">
  <div class="col-6 mt-5 mx-auto bg-light border rounded container-fluid">
    
    <div class="mx-auto mt-3" style="width: 20%">
      <h3>Përgjigje</h3>
    </div>

    <form class="p-3 m-4 p-5 mx-auto" action="pergjigjet.php" method="post" >
      <?php while($vendi = mysqli_fetch_array($rezultati))
        {
          echo "<td>".$vendi['id']."- </td>";
          echo "<td>".$vendi['pyetja']."</td><br>";
      ?> 
    <?php
      $queryOpsionet = "select * from opsionet where pyetja_id=".$vendi['id']."";
      $rezultatiOpsionet = mysqli_query($db, $queryOpsionet);

      $queryRezSakte = "select * from opsionet where pyetja_id=".$vendi['id']." and sakte = 1";
      $rezSakte = mysqli_query($db, $queryRezSakte);

     while($pergjigjet = mysqli_fetch_array($rezultatiOpsionet))
      {
             echo "<p>" .$pergjigjet['opsioni']."</p>";
        while($sakte = mysqli_fetch_array($rezSakte))
        {
          if ( $_POST['sakte'.$vendi['id']] != $sakte['opsioni'] ) { 
            echo "<p style = 'background-color: red'> " .$pergjigjet['opsioni']. "</p>";
          }
          else{
            echo "<p style = 'background-color: green;margin-bottom:0 '> " .$sakte['opsioni']. "</p>";
          }
        }}
      ?><br>
      <?php
        }?>
    
    <div class="d-flex">
      <button type="submit" class="ms-3 btn btn-success">Ruaj</button>
      <button type="button" class="ms-3 btn btn-warning"><a href="quiz.php" style="text-decoration:none; color: white">Kthehu pas</a></button>
    </div>
    <?php
    echo "</form>";
  ?>
</div>
</body>