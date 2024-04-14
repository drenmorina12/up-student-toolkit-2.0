<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/logo1.png" />
    <title>Up Student Toolkit</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="rreth-nesh.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

  <body>
    <?php
      include("../header.php")
    ?>
    
    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <ul class="carousel">
        <li class="card">
          <div class="img"><img src="../images/cpp.jpg" alt="img" draggable="false"></div>
          <h2>Dren Morina</h2>
          <span>DEV</span>
        </li>
        <li class="card">
          <div class="img"><img src="../images/cpp.jpg" alt="img" draggable="false"></div>
          <h2>Dituri Kodra</h2>
          <span>DEV</span>
        </li>
        <li class="card">
          <div class="img"><img src="../images/cpp.jpg" alt="img" draggable="false"></div>
          <h2>Edon Gashi</h2>
          <span>DEV</span>
        </li>
        <li class="card">
          <div class="img"><img src="../images/cpp.jpg" alt="img" draggable="false"></div>
          <h2>Blerta Lutolli</h2>
          <span>DEV</span>
        </li>
        <li class="card">
          <div class="img"><img src="../images/cpp.jpg" alt="img" draggable="false"></div>
          <h2>Endrit Kastrati</h2>
          <span>DEV</span>
        </li>
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>


    <?php
      include("../footer.php");
    ?>
    
    <script src="rreth-nesh.js" defer></script>
  </body>
</html>
