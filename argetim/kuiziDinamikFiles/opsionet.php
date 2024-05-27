<?php
include "../../db.php";
include "../argetim.php";

if (isset($_POST) && !empty($_POST)) {
    if (empty($_POST["1"]) || empty($_POST["2"]) || empty($_POST["3"]) || empty($_POST["4"]) || empty($_POST["5"])) {
    ?>
      <div class="alert alert-danger">
      Plotësoni Alternativat.
      </div>;
    <?php
      } else if (empty($_POST["sakte"])) {
    ?>
      <div class="alert alert-danger">
      Zgjidhni një alternativ të saktë.
      </div>;
    <?php
  } else {
    $opsioni1 = $_POST["1"];
    $opsioni2 = $_POST["2"];
    $opsioni3 = $_POST["3"];
    $opsioni4 = $_POST["4"];
    $opsioni5 = $_POST["5"];

    $btnSakte = $_POST["sakte"];
            $sakte1=0;
            $sakte2=0;
            $sakte3=0;
            $sakte4=0;
            $sakte5=0;
    switch ($btnSakte) {
        case '1': $sakte1=1; break;
        case '2': $sakte2=1; break;
        case '3': $sakte3=1; break;
        case '4': $sakte4=1; break;
        case '5': $sakte5=1; break;
    }

    $pyetja_id = $_POST['pyetja_id'];
    $query = "insert into opsionet(opsioni, pyetja_id, sakte)values";
    $vlera1 = "('$opsioni1',$pyetja_id, $sakte1)";
    $vlera2 = "('$opsioni2',$pyetja_id, $sakte2)";
    $vlera3 = "('$opsioni3',$pyetja_id, $sakte3)";
    $vlera4 = "('$opsioni4',$pyetja_id, $sakte4)";
    $vlera5 = "('$opsioni5',$pyetja_id, $sakte5)";
    $query = $query.$vlera1.",".$vlera2.",".$vlera3.",".$vlera4.",".$vlera5;
   // echo $query;
   $rezultati = mysqli_query($db, $query);
}}

if(isset($_GET["pyetja_id"]) && !empty($_GET["pyetja_id"])){
  $pyetja_id = $_GET["pyetja_id"];
  $query = "select * from pyetjet where id = $pyetja_id";
  $rezultati = mysqli_query($db,$query);

  $pyetja = mysqli_fetch_array($rezultati)["pyetja"];

  $query = "select * from opsionet where pyetja_id = ".$pyetja_id;
  $rezultatiOpsionet = mysqli_query($db,$query);

} else{
  //  header("Location: pyetjet.php");
}
?>

<body style="background-color: #D8BFD8;">
  <div class="col-5 mt-5 mx-auto bg-light border rounded container-fluid">
    
    <div class="mx-auto mt-3" style="width: 60%">
      <h5> <?php echo $pyetja; ?> </h5>
    </div>

    <div class="mx-auto mt-3" style="width: 60%">
      <p>Futni alternativa dhe zgjidhni një të saktë.</p>
    </div>

        <form class="mx-auto mt-3" style="width: 40%" action="opsionet.php?pyetja_id=<?php echo $_GET["pyetja_id"]; ?>" method="post" >
          <input type="hidden" name="pyetja_id" value="<?php echo $_GET["pyetja_id"]; ?>"/>

          <div class="d-flex">
            <input  class="form-control border rounded container-fluid" type="text" name="1"/>
            <input type="radio" name="sakte" value="1">
          </div>
          <br>

          <div class="d-flex">
            <input class="form-control border rounded container-fluid" type="text" name="2"/>
            <input type="radio" name="sakte" value="2">
            <br>
          </div>
          <br>

          <div class="d-flex">
            <input class="form-control border rounded container-fluid" type="text" name="3"/>
            <input type="radio" name="sakte" value="3">
          </div>
          <br>

          <div class="d-flex">
            <input  class="form-control border rounded container-fluid" type="text" name="4"/>
            <input type="radio" name="sakte" value="4">
          </div>
          <br>

          <div class="d-flex">
            <input class="form-control border rounded container-fluid" type="text" name="5"/>
            <input type="radio" name="sakte" value="5">
          </div>
          <br>

          <div class="d-flex">
            <button type="submit" class="ms-3 btn btn-success">Ruaj</button>
            <button type="button" class="ms-3 btn btn-warning"><a href="pyetjet.php" style="text-decoration:none; color: white">Kthehu pas</a></button>
          </div>
          <br>
        </form>
      </div>
</div>
</body>
</div>