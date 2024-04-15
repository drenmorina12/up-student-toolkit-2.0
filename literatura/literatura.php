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
        include("../header.php")
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

            <div class="container-literatura">
              <div class="slider-wrapper">
                <button
                  id="prev-slide"
                  class="slide-button material-symbols-rounded"
                >
                  chevron_left
                </button>
                <ul class="lista-figurave">
                  <img class="image-item" src="imag1.jpg" alt="img-2" />
                  <img class="image-item" src="image2.jpg" alt="img-3" />
                  <img class="image-item" src="image3.jpg" alt="img-4" />
                  <img class="image-item" src="image4.jpg" alt="img-5" />
                  <img class="image-item" src="image5.jpg" alt="img-6" />
                  <img class="image-item" src="image6.jpg" alt="img-7" />
                  <img class="image-item" src="image7.jpg" alt="img-8" />
                  <img class="image-item" src="image8.jpg" alt="img-9" />
                  <img class="image-item" src="image9.jpg" alt="img-10" />
                  <img class="image-item" src="image10.jpg" alt="img-11" />
                </ul>
                <button
                  id="slide-ardhshem"
                  class="slide-button material-symbols-rounded"
                >
                  chevron_right
                </button>
              </div>
              <div class="slider-scrollbar">
                <div class="scrollbar-track">
                  <div class="scrollbar-thumb"></div>
                </div>
              </div>
            </div>

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
