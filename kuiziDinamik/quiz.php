<?php
include "db.php";
include "header.php";

$query = "select * from pyetjet";
$rezultati = mysqli_query($db, $query);
?>  

<body style="background-color: #D8BFD8;">
  <div class="col-6 mt-5 mx-auto bg-light border rounded container-fluid">
    
    <div class="mx-auto mt-3" style="width: 60%">
      <h3>Përgjigju në pytjet e mëposhtme:</h3>
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
      while($pergjigjet = mysqli_fetch_array($rezultatiOpsionet))
    {

      echo"<input type='radio' name='sakte".$vendi['id']."' value=".$pergjigjet['opsioni']."> ".$pergjigjet['opsioni']."";
      echo "<br>";
      
      ?>
      <?php
    }
      ?><br>
      <?php
    }?>
    
    <div class="d-flex">
      <button type="submit" class="ms-3 btn btn-success">Shiko Rezultatin</button>
      <button type="button" class="ms-3 btn btn-warning"><a href="index.php" style="text-decoration:none; color: white">Ktheu pas</a></button>
    </div>
    <?php
    echo "</form>";
  ?>
</div>
</body>