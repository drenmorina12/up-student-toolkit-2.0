<?php
  session_start();

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
    <script defer src="kuiziDinamik.js"></script>
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
