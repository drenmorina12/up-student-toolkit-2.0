<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/logo1.png" />
    <title>Up Student Toolkit</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap"
      rel="stylesheet"
    />
    <script defer src="app.js"></script>
  </head>
  <body>
    <?php
      include("header.php");
    ?>
    <main id="main" style="margin-bottom: -110px">
      <div is="video" class="row">
        <video autoplay muted loop id="video-1" width="100%" height="100%">
          <source src="videos/UP.mp4" type="" />
        </video>
        <!-- <div id="selfAddingText"></div> -->
      </div>

      <div class="about">
        <p class="why">MIRËSEVINI NË UP STUDENT TOOLKIT</p>
        <br /><br />
        <img
          class="first-photo"
          data-aos="fade-up"
          data-aos-duration="1000"
          src="images/first-photo.jpg"
          alt="Foto1FADE"
        />
        <img
          class="second-photo"
          data-aos="fade-up"
          data-aos-duration="1000"
          src="images/second-photo.jpeg"
          alt="Foto2FADE"
        />
        <p class="about-text">
          Projekti i web faqes ka për qëllim të ofrojë një mjedis të
          përshtatshëm dhe efikas për studentët. Kjo faqe synon të sjellë
          informacion të rëndësishëm në një mënyrë të qartë dhe të lehtë për tu
          naviguar. Përveçse këtyre, faqja do të përfshijë edhe një platformë
          interaktive ku përdoruesit mund ta kalojnë edhe kohën e lirë.
          <br /><br />
          Qëllimi kryesor është të krijohet një platformë e përshtatshme dhe
          inovative që ndihmon në përmirësimin e përvojës së studentëve në
          aspektin akademik dhe social.
        </p>
      </div>

      <div class="three-icons" data-aos="fade-up" data-aos-duration="1000">
        <div class="small-box">
          <img class="icon" src="images/laptop-icon.png" alt="Laptop Icon" />
          <p class="big-text">Qasje e<br />lehtë</p>
          <p class="small-text">
            UP Student Toolkit është faqe jashtëzakonisht e lehtë për qasje dhe
            mund të përdoret nga te gjithë.
          </p>
        </div>
        <div class="small-box">
          <img
            class="icon"
            src="images/joystick-icon.png"
            alt="Joystick Icon"
          />
          <p class="big-text">Argëtim dhe<br />mësim</p>
          <p class="small-text">
            Përveç pjesës së mësimit mundësohet edhe argëtimi me lojëra dhe
            teste të ndryshme.
          </p>
        </div>
        <div class="small-box">
          <img class="icon" src="images/pen-icon.png" alt="Pen Icon" />
          <p class="big-text">Ndihmë<br />Akademike</p>
          <p class="small-text">
            Si më me rëndësi faqja dukëshëm do përmisojë dhe ndihmojë në
            aspektin akademik të gjithë studentët.
          </p>
        </div>
      </div>
    </main>

  <?php
    include("footer.php")
  ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <script>
      var selfAddingTextElement = document.getElementById("selfAddingText");

      // Initial text content

      var originalText = "MIRËSEVINI";
      // Function to add a letter to the text
      function addLetter() {
        var currentText = selfAddingTextElement.textContent;

        var nextLetter = originalText[currentText.length];
        currentText += nextLetter;

        selfAddingTextElement.textContent = currentText;

        // Stop the animation when all letters are added
        if (currentText.length === originalText.length) {
          clearInterval(intervalId);
        }
      }

      var intervalId = setInterval(addLetter, 200);
    </script>

    <script src="app.js"></script>
  </body>
</html>
