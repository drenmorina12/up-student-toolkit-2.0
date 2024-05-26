<?php
  session_start();
  include("../db.php");

  $sql = " CREATE TABLE IF NOT EXISTS `up_studenttoolkit`.`tblasociacioni` (
    `aId` INT AUTO_INCREMENT PRIMARY KEY , `userId` INT NOT NULL , `titulli` VARCHAR(50) NOT NULL , `A1` VARCHAR(50) NOT NULL , `A2` VARCHAR(50) NOT NULL , `A3` VARCHAR(50) NOT NULL , `Afinal` VARCHAR(50) NOT NULL , `B1` VARCHAR(50) NOT NULL , `B2` VARCHAR(50) NOT NULL , `B3` VARCHAR(50) NOT NULL , `B4` VARCHAR(50) NOT NULL , `Bfinal` VARCHAR(50) NOT NULL , `C1` VARCHAR(50) NOT NULL , `C2` VARCHAR(50) NOT NULL , `C3` VARCHAR(50) NOT NULL , `C4` VARCHAR(50) NOT NULL , `Cfinal` VARCHAR(50) NOT NULL , `D1` VARCHAR(50) NOT NULL , `D2` VARCHAR(50) NOT NULL , `D3` VARCHAR(50) NOT NULL , `D4` VARCHAR(50) NOT NULL , `Dfinal` VARCHAR(50) NOT NULL , `final` VARCHAR(50) NOT NULL, FOREIGN KEY (userId) REFERENCES tblUser(userId)) ENGINE = InnoDB;";

  if (mysqli_query($conn, $sql)) {
   //echo "Tabela u krijua me sukses";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/logo1.png" />
    <title>Up Student Toolkit</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="argetim.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- Jquery import -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script defer src="asosacioni.js"></script>
    <script defer src="tic-tac-toe.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <?php
      include("../header.php");
      include("../counter.php");
    ?>
    <main id="main">
      <!-- Sidebar -->
      <div class="sidebar">
        <ul>
          <li>
            <a
              href="javascript:void(0);"
              onclick="scrollToSection('asosacioni')"
            >
              <span>Asosacioni</span>
            </a>
          </li>
          <li class="sidebar-active">
            <a href="javascript:void(0);" onclick="scrollToSection('kuizi')">
              <span>Kuizi</span>
            </a>
          </li>
          <li>
            <a
              href="javascript:void(0);"
              onclick="scrollToSection('tic-tac-toe')"
            >
              <span>Tic Tac Toe</span>
            </a>
          </li>
          <li>
            <a
              href="javascript:void(0);"
              onclick="scrollToSection('memory-game')"
            >
              <span>Memory Game</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="main-content">
        <!-- Asosacioni -->
        <div id="asosacioni">
          <div class="heading-text">
            <h3></h3>
          </div>
          <div class="asosacioni-content">
            <div class="asosacioni-buttons">
              <button class="asosacioni-button active" data-name="pergjithshem">
                Përgjithshëm
              </button>
              <button class="asosacioni-button" data-name="web">Web</button>
              <button class="asosacioni-button" data-name="fizika">
                Fizikë
              </button>
              <button class="asosacioni-button" data-name="matematika">
                Matematikë
              </button>

              <button class="reset-button">Fshij</button>
              <button class="create-asosacion">Create</button>
            </div>
            <div class="asosacioni-table-container">
              <div id="asosacioni-table"></div>
            </div>
            <button class="save-asosacion">Save</button>
          </div>
        </div>

        <!-- Kuizi -->
        <div id="kuizi">
          <div class="heading-text">
            <h2>KUIZI TEXT</h2>
          </div>
          <div class="start-screen">
            <div id="button-container">
              <button id="start-button" onclick="playAudio1()">Fillo !</button>
            </div>
          </div>
          <div id="display-container">
            <div class="header">
              <div class="number-of-count">
                <span class="number-of-question" style="color: white"
                  >1 nga 3 pyetje</span
                >
              </div>
              <div class="timer-div">
                <img src="../images/timer-icon.svg" />
                <span class="time-left">10s</span>
              </div>
            </div>
            <div id="container"></div>
            <button id="next-button">Pyetja Tjeter</button>
          </div>

          <div class="score-container hide">
            <div id="user-score">Demo Score</div>
            <button id="restart" onclick="playAudio2()">Luaj Perseri</button>
          </div>

          <audio id="restartAudio">
            <source src="../audio/finishAudio.mp3" type="audio/mp3" />
            Your browser does not support the audio element.
          </audio>
          <audio id="startAudio">
            <source src="../audio/clapAudio.mp3" type="audio/mp3" />
            Your browser does not support the audio element.
          </audio>
        </div>

        <!-- Tic Tac Toe -->
        <div id="tic-tac-toe">
          <div class="x-score-container">
            <div class="x-logo"></div>
            <h3>Fitore:</h3>
            <h3 class="x-score">0</h3>
          </div>
          <div class="main-container">
            <div class="heading-text">
              <h2>Tic Tac Toe</h2>
            </div>
            <div id="board" class="board">
              <div class="cells" data-cell></div>
              <div class="cells" data-cell></div>
              <div class="cells" data-cell></div>
              <div class="cells" data-cell></div>
              <div class="cells" data-cell></div>
              <div class="cells" data-cell></div>
              <div class="cells" data-cell></div>
              <div class="cells" data-cell></div>
              <div class="cells" data-cell></div>
            </div>
          </div>

          <div class="circle-score-container">
            <div class="circle-logo"></div>
            <h3>Fitore:</h3>
            <h3 class="circle-score">0</h3>
          </div>
          <div class="winning-message" id="winningMessage">
            <div class="winning-message-text">X WINS</div>
            <button id="restartButton">Restart</button>
          </div>
        </div>

        <!-- Loja 2 -->
        <div id="memory-game">
          <div class="heading-text">
            <h2>Memory Game</h2>
          </div>
          <div id="grid"></div>
          <div class="memory-score-container">
            <h3>Pikët: <span id="result"></span></h3>
            <button id="memory-game-button">Luaj Përsëri</button>
          </div>

          <div id="notification" class="notification"></div>
        </div>
      </div>
    </main>

    <?php
      include("../footer.php");
    ?>

    <script src="asosacioni.js"></script>
    <script src="kuizi.js"></script>
    <script src="memory-game.js"></script>
    <script src="../app.js"></script>
  </body>
</html>
