<?php
  session_start();
?>
<!--DB CONNECT-->
<?php

// // Database configuration
// $dbHost     = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName     = "dbphoto";

// // Create database connection
// $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

include("../db.php");

// Check connection
if(!$conn){
    echo 'Connection failed !';
}

if(isset($_POST['submit'])){
    $imageCount = count($_FILES['image']['name']);
    for($i = 0 ; $i < $imageCount ; $i++){
        $imageName = $_FILES['image']['name'][$i];
        $imageTempName = $_FILES['image']['tmp_name'][$i];
        $targetPath = "./upload/".$imageName;
        if(move_uploaded_file($imageTempName, $targetPath)){
            $sql = "INSERT INTO photos (image) VALUES ('$imageName')";
            $result = mysqli_query($conn, $sql);
        }//if move close
    }
        if($result){
            header('location:literatura.php?msg=ins');
        }
}

?>

<?php
if(isset($_POST['delete'])){
    // $sql = "DELETE * FROM photos WHERE";
    // $result = mysqli_query($conn, $sql);

        $inputValue = $_POST['deleteField']; // The value from the text box
        
        // Prepare the statement with a placeholder
        $stmt = $conn->prepare("DELETE FROM photos WHERE image = ?");
        
        // Bind the parameter to the placeholder
        $stmt->bind_param("s", $inputValue); // "s" denotes the type (string)
        
        // Execute the statement
        $stmt->execute();
        
        // Close the statement
        $stmt->close();
    
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/logo1.png" />
    <title>Up Student Toolkit</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="literatura.css" />

    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    
<div class="row" style="margin-right: 0px;">
    <div class="container-fluid">
      <!-- <div class="row"> -->
      <div >
      <?php
        include("../header.php");
        include("../counter.php");
      ?>

      </div>
    </div>
    <!-- Header with bootstrap -->
    <div class="row">
      
      <div class="container-fluid">
        <div class="row" style="min-height: 70px"></div>
        <div class="row">
          <div
            class="col-"
            style="width: 230px; padding-left: 0px; position: sticky"
          >
            <!--sidebar-->
            <div class="sidebar">
              <!-- <header>Argetimi</header> -->
              <ul id="listaEsidebar" style="width: 14%">
                <li>
                  <a href="#divmatematika">
                    <span>Matematikë</span>
                  </a>
                </li>
                <li>
                  <a href="#divelektronika">
                    <span>Elektronikë</span>
                  </a>
                </li>
                <li>
                  <a href="#divarkitektura">
                    <span>Arkitektura</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md" id="main-container">
            <div class="row" id="pershkrimi-literatura">
              <h2 id="divmatematika">Matematikë 2</h2>
              <p>
                Këtu gjeni material nga Matematikë 2, të shpjeguar në slidet e
                FIEK.
              </p>
            </div>

            <!-- <div class="container-literatura"> -->
              


  <div class="literaturaFoto">

        <h2 align="center">Multiple Image Uploading in PHP with Mysql</h2>
        <?php
            if(isset($_GET['msg']) AND $_GET['msg'] == 'ins'){
                echo '<h4 align = center> Image Uploaded Successfully. </h4>';
            }
        ?>
        
      
        <div class="formdesign">
            <form class="chooseFileDiv" action="literatura.php" method="post" enctype="multipart/form-data">
                <p>Please select image</p><br><br>
                <div class="rreshti">
                <input class = "chooseFile" type="file" name="image[]" multiple><br><br>
                <input class="chooseFile" type="submit" name="submit" value="Upload">
                </div>
                <div class="rreshti">
                <input class="chooseFile" type="text" name="deleteField">
                <input class="chooseFile"type="submit" name="delete" value="Delete">
                </div>
            </form><br>
            </div>
            <div class="scroll-bg">
            <div class="scroll-div">
        <div class="scroll-object">
            <?php
                $sql = "SELECT * FROM photos";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($fetch = mysqli_fetch_assoc($result)){
                        ?>
                        <img src = "upload/<?php echo $fetch['image']; ?>" width = 850 height = 490 >
                        <?php
                    }
                }
            ?>
        </div>
        </div>
        </div>
        </div>







        


            <!-- </div> -->

            <div id="video-container">
              <div class="row" id="pershkrimi-literatura">
                <h2 id="divelektronika">Elektronikë</h2>
                <p>
                  Këtu gjeni material nga Elektronika, video të ilustruara të marra nga interneti.
                </p>
              </div>
              <div id="video" class="row">
                <video width="100%" height="100%" controls>
                  <source
                    src="../videos/what-is-a-diode.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support this video tag.
                </video>
              </div>
            </div>

            <div id="video-container row">
              <div id="pershkrimi-literatura">
                <h2 id="divarkitektura">Arkitektura e kompjuterëve</h2>
                <p>
                  Këtu gjeni material nga Arkitektura Kompjuterëve, video të ilustruara të marra nga interneti.
                </p>
              </div>
              <div id="video" class="row">
                <video width="100%" height="100%" controls>
                  <source
                    src="../videos/an-intuitive-approach-for-understanding-the-CPU-and-RAM.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support this video tag.
                </video>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <?php
      include("../footer.php");
    ?>
    <script src="../app.js"></script>
    <script src="literatura.js"></script>
  </body>
</html>
