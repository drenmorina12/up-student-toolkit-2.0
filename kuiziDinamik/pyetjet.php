<?php
include "db.php";
include "header.php";

if(isset($_POST) && !empty($_POST)){
    $pyetja = $_POST['pyetja'];
    $query = "INSERT INTO pyetjet (pyetja) VALUES ('$pyetja')";
    $rezultati = mysqli_query($db, $query);
}

$query = "select * from pyetjet";
$rezultati = mysqli_query($db, $query);
?>  

<body style="background-color: #D8BFD8;">
  <div class="col-7 mt-5 mx-auto bg-light border rounded container-fluid">
    
    <div class="mx-auto mt-3" style="width: 50%">
      <h3 >Krijo pyetje për të shtuar në kuiz</h3>
    </div>

      <form class="table table-hover table-striped mx-auto mt-3" style="width: 65%" action="pyetjet.php" method="post">
        <div>Shkruani pyetjen tuaj këtu:</div>
        <input class="form-control" type="text" name="pyetja"/>
        <br>
        
        <div class="d-flex">
            <button type="submit" class="btn btn-success">Ruaj</button>
          </div>
          <br>
      </form>

    <table class="table table-hover table-striped mx-auto" style="width: 65%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Pyetja</th>
          <th></th>
        </tr>
      </thead>

    <tbody>
      <?php while($vendi = mysqli_fetch_array($rezultati))
      {
          echo "<tr>";
          echo "<td>".$vendi['id']."</td>";
          echo "<td>".$vendi['pyetja']."</td>";
          echo"<td><button type='button' class='ms-5 btn btn-warning'><a href='./opsionet.php?pyetja_id=".$vendi['id']." 'style='text-decoration:none; color: white'>Opsionet</a></button></td>";
          echo "</tr>";
      }
      ?>
    </tbody>
    </table>
</div>
</body>